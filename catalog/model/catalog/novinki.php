<?php
define('NEW_PRODUCTS_DAYS', 365);

class ModelCatalogNovinki extends Model {
	public function updateViewed($product_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET viewed = (viewed + 1) WHERE product_id = '" . (int)$product_id . "'");
	}

	public function clearViewed() {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET viewed = '0'");
	}

	public function updateShop($product_id,$shop_id,$customer_id) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "shop_visit` (`product_id`,`shop_id`,`customer_id`) VALUES (".$product_id.",".$shop_id.",".$customer_id.")");
	}

	public function getProductStockStatuses( $language_id = 0 ){
        if($stock_statuses = $this->cache->get('stock_statuses')){
            if($language_id) {
                $statuses = array();
                foreach($stock_statuses as $sid=>$ss){
                    $statuses[$sid] = $ss[$language_id];
                }
                return $statuses;
            } else {
                return $stock_statuses;
            }
        } else {
            $stock_statuses = $this->db->query("SELECT * FROM `". DB_PREFIX ."stock_status` ORDER BY `stock_status_id`,`language_id`");
            if ($stock_statuses->num_rows) {
                $s_statuses = $statuses = array();
                foreach($stock_statuses->rows as $row){
                    $s_statuses[$row['stock_status_id']][$row['language_id']] = trim($row['name']);
                    if($language_id && $row['language_id'] == $language_id) {
                        $statuses[$row['stock_status_id']] = trim($row['name']);
                    }
                }
                $this->cache->set('stock_statuses',$s_statuses,2592000);
                return $language_id && $statuses ? $statuses : $s_statuses;
            }
        }
        return false;
    }

    public function getPromoProducts() {
        $query = $this->db->query("SELECT DISTINCT p.`product_id` FROM `" . DB_PREFIX . "promotions_content` pc
                    LEFT JOIN `" . DB_PREFIX . "promotions` pr ON pr.`promo_id` = pc.`promo_id`
                    LEFT JOIN `" . DB_PREFIX . "product` p ON p.`product_id` = pc.`product_id`
                    WHERE pr.`active` = 1 AND p.`product_id` IS NOT NULL AND p.`price` > 0 ORDER BY RAND() LIMIT 10");
        if($query->rows){
            $data = array();
            foreach($query->rows as $row){
                $data[] = $row['product_id'];
            }
            return $data;
        }
        return false;
    }

    public function getProductsIDsByStatusId( $status_id = 0 ) {
        if($status_id){
            $query = $this->db->query("SELECT DISTINCT `product_id` FROM `" . DB_PREFIX . "product` WHERE `stock_status_id` = ".(int)$status_id." AND `price` > 0 ORDER BY RAND() LIMIT 10");
            if($query->rows){
                $data = array();
                foreach($query->rows as $row){
                    $data[] = $row['product_id'];
                }
                return $data;
            }
        }
        return false;
    }

	public function getProduct($product_id) {
		$query = $this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, p.image_hover, (SELECT md.name FROM " . DB_PREFIX . "manufacturer_description md WHERE md.manufacturer_id = p.manufacturer_id AND md.language_id = '" . (int)$this->config->get('config_language_id') . "') AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id = '" . (int)$product_id . "' AND p.status = 1 AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return array(
				'product_id'       => $query->row['product_id'],
                'video'            => trim($query->row['video']),
				'name'             => trim($query->row['name']),
				'description'      => trim($query->row['description']),
				'meta_title'       => trim($query->row['meta_title']),
				'meta_h1'          => trim($query->row['meta_h1']),
				'meta_description' => trim($query->row['meta_description']),
				'meta_keyword'     => trim($query->row['meta_keyword']),
				'tag'              => $query->row['tag'],
				'model'            => $query->row['model'],
				'sku'              => $query->row['sku'],
				'upc'              => $query->row['upc'],
				'ean'              => $query->row['ean'],
				'jan'              => $query->row['jan'],
				'isbn'             => $query->row['isbn'],
				'mpn'              => $query->row['mpn'],
				'location'         => $query->row['location'],
				'quantity'         => $query->row['quantity'],
				'stock_status'     => $query->row['stock_status'],
				'stock_status_id'  => $query->row['stock_status_id'],
				'image'            => $query->row['image'],
				'image_hover'      => $query->row['image_hover'],
				'infografika'      => $query->row['infografika'],
				'manufacturer_id'  => $query->row['manufacturer_id'],
				'manufacturer'     => $query->row['manufacturer'],
				'price'            => ($query->row['discount'] ? $query->row['discount'] : $query->row['price']),
				'special'          => $query->row['special'],
				'reward'           => $query->row['reward'],
				'points'           => $query->row['points'],
				'tax_class_id'     => $query->row['tax_class_id'],
				'date_available'   => $query->row['date_available'],
				'weight'           => $query->row['weight'],
				'weight_class_id'  => $query->row['weight_class_id'],
				'length'           => $query->row['length'],
				'width'            => $query->row['width'],
				'height'           => $query->row['height'],
				'length_class_id'  => $query->row['length_class_id'],
				'subtract'         => $query->row['subtract'],
				'rating'           => round($query->row['rating']),
				'reviews'          => $query->row['reviews'] ? $query->row['reviews'] : 0,
				'minimum'          => $query->row['minimum'],
				'sort_order'       => $query->row['sort_order'],
				'status'           => $query->row['status'],
				'date_added'       => $query->row['date_added'],
				'date_modified'    => $query->row['date_modified'],
				'viewed'           => $query->row['viewed']
			);
		} else {
			return false;
		}
	}

    public function getProductsSphinx($data = array()) {
        $ajax = isset($data["ajax"]) && $data["ajax"];
        $data["ajax"] = $ajax;
        $tmp = explode(" ", $data["filter_name"]);
        $searchstrings = array();
        foreach( $tmp as $key => $val )
            if ( mb_strlen( trim($val), 'UTF-8' ) >= 3 )
                $searchstrings[] = $val;
        $filtervals = implode(' ',$searchstrings);
        $search = new SphinxClient();

        $search->setSelect("*,ssort AS sort, status AS sts,yesprice AS yesprs, weight()*ssort AS ves");

        $default_sort = 'yesprs DESC,ves DESC';

        if(isset($data["sort"]) && isset($data["order"])){
            $dir = $data["order"];
            $orderby = $data["sort"];
            switch($orderby){
                case 'pd.name':
                    $orderby = 'name';
                    break;
                case 'p.sort_order':
                    $orderby = 'sort';
                    break;
                case 'p.model':
                    $orderby = 'model';
                    break;
                case 'p.price':
                    $orderby = 'price';
                    break;
                case 'rating':
                    $orderby = 'rating';
                    break;
            }
            if(in_array($orderby,array('name','model','sort','price','rating')) &&
                in_array($dir,array('ASC','DESC'))){
                if($orderby=='sort'&&$dir=='ASC'){
                    $search->SetSortMode(SPH_SORT_EXTENDED, $default_sort);
                }else{
                    $search->SetSortMode(SPH_SORT_EXTENDED, 'yesprs DESC,'.$orderby.' '.$dir.', ves DESC');
                }
            } else {
                $search->SetSortMode(SPH_SORT_EXTENDED, $default_sort);
            }
        } else {
            $search->SetSortMode(SPH_SORT_EXTENDED, $default_sort);
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }
            if ($data['limit'] < 1) {
                $data['limit'] = 16;
            }
            $offset = (int)$data['start'];
            $CountRowOnPage = (int)$data['limit'];
        } else {
            $offset = 0;
            $CountRowOnPage = 16;
        }

        $limits = 500;

        if ($ajax) $search->SetLimits(0, 5, $limits, $limits);
        else $search->SetLimits(0, $limits, $limits, $limits);

        $search->SetRankingMode(SPH_RANK_SPH04);
        $search->SetFieldWeights(array('model'=>100,'name'=>50));
        $search->SetFilter('sts',array('1'));
        $search->SetFilter('language_id', array($this->config->get('config_language_id')));
        
        $res = $search->Query('@(model,name) '.$filtervals, 'productsyes');

        $this->product_ids = $res;
        if($res && isset($res['matches']) && ($product_ids = array_keys($res['matches']))) {
            $this->product_ids = $product_ids;
            $prds = $ajax ? $this->getProductsByIDsSphinxAjax($product_ids) : $this->getProductsByIDsSphinxTest($product_ids,$data);
            if($prds && ($res_ids = array_keys($prds))){
                if($ajax ){
                    foreach($prds as $id=>$p){
                        if(isset($res['matches'][$id])){
                            $res['matches'][$id] = $p;
                        }
                    }
                    return $res['matches'];
                } elseif ($intersect = array_intersect($product_ids,$res_ids)) {
                    $total = count($intersect);
                    $intersect = array_slice($intersect,$offset,$CountRowOnPage,true);
                    $products = array();
                    foreach($intersect as $key){
                        if(isset($res['matches'][$key]) && isset($prds[$key])){
                            $products[] = $prds[$key];
                        }
                    }
                    return array(
                        'total'=>(int)$total,
                        'products' => $products
                    );
                }
            }
        }
        return $ajax ? false : array('total'=>0,'products'=>false);
    }

    public function getProductsByIDsSphinxTest($product_ids,$data) {

        if(!$product_ids || !is_array($product_ids)) return false;
        $sort = '';
        /*$sort_data = array(
            'pd.name',
            'p.model',
            'p.quantity',
            'p.price',
            'rating',
            'p.sort_order',
            'p.date_added'
        );
        $sort .= " ORDER BY ";
        //$pdname = false;
        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
                $sort .= "LCASE(" . $data['sort'] . ") ";
                //$pdname = true;
            } elseif ($data['sort'] == 'p.sort_order') {
                $sort .= "p.stock_status_id ";
            } else {
                $sort .= $data['sort']." ";
            }
        } else {
            $sort .= "p.stock_status_id ";
        }

        if (isset($data['order']) && $data['order'] && in_array($data['order'],array('DESC','ASC'))) {
            if ($data['sort'] == 'p.sort_order') {
                $sort .= "DESC";
            } else {
                $sort .= $data['order'];
            }
        } else {
            $sort .= "DESC";
        }*/

        /*if(!$pdname)
            $sort .= " , LCASE(pd.name) ASC";

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sort .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }*/

        $sql = "SELECT *, pd.name AS name, p.image, p.image_hover, (SELECT md.name FROM " . DB_PREFIX . "manufacturer_description md WHERE md.manufacturer_id = p.manufacturer_id AND md.language_id = '" . (int)$this->config->get('config_language_id') . "') AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p";

        $sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id IN (" . implode(',', $product_ids) . ") AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
        }

        $sql .= " GROUP BY p.product_id ";

        //vardump($sql,1);

        $query = $this->db->query($sql);
        if ($query->num_rows) {
            $products = array();
            foreach ($query->rows as $row) {
                $products[$row['product_id']] = array(
                    'product_id' => $row['product_id'],
                    'name' => trim($row['name']),
                    'description' => trim($row['description']),
                    'meta_title' => trim($row['meta_title']),
                    'meta_h1' => trim($row['meta_h1']),
                    'meta_description' => trim($row['meta_description']),
                    'meta_keyword' => trim($row['meta_keyword']),
                    'tag' => $row['tag'],
                    'model' => trim($row['model']),
                    'sku' => $row['sku'],
                    'upc' => $row['upc'],
                    'ean' => $row['ean'],
                    'jan' => $row['jan'],
                    'isbn' => $row['isbn'],
                    'mpn' => $row['mpn'],
                    'location' => $row['location'],
                    'quantity' => $row['quantity'],
                    'stock_status' => $row['stock_status'],
                    'stock_status_id' => $row['stock_status_id'],
                    'image' => $row['image'],
                    'image_hover' => $row['image_hover'],
                    'manufacturer_id' => $row['manufacturer_id'],
                    'manufacturer' => $row['manufacturer'],
                    'price'            => ($row['discount'] ? $row['discount'] : $row['price']),
                    'special' => $row['special'],
                    'reward' => $row['reward'],
                    'points' => $row['points'],
                    'tax_class_id' => $row['tax_class_id'],
                    'date_available' => $row['date_available'],
                    'weight' => $row['weight'],
                    'weight_class_id' => $row['weight_class_id'],
                    'length' => $row['length'],
                    'width' => $row['width'],
                    'height' => $row['height'],
                    'length_class_id' => $row['length_class_id'],
                    'subtract' => $row['subtract'],
                    'rating' => round($row['rating']),
                    'reviews' => $row['reviews'] ? $row['reviews'] : 0,
                    'minimum' => $row['minimum'],
                    'sort_order' => $row['sort_order'],
                    'status' => $row['status'],
                    'date_added' => $row['date_added'],
                    'date_modified' => $row['date_modified'],
                    'viewed' => $row['viewed']
                );
            }
            return $products;
        } else {
            return false;
        }
    }

    public function getProductsByIDsSphinx($product_ids,$data=array()) {

        if(!$product_ids || !is_array($product_ids)) return false;
        $sort = '';
        $sort_data = array(
            'pd.name',
            'p.model',
            'p.quantity',
            'p.price',
            'rating',
            'p.sort_order',
            'p.date_added'
        );
        $sort .= " ORDER BY ";
        //$pdname = false;
        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
                $sort .= "LCASE(" . $data['sort'] . ") ";
                //$pdname = true;
            } elseif ($data['sort'] == 'p.sort_order') {
                $sort .= "p.stock_status_id ";
            } else {
                $sort .= $data['sort']." ";
            }
        } else {
            $sort .= "p.stock_status_id ";
        }

        if (isset($data['order']) && $data['order'] && in_array($data['order'],array('DESC','ASC'))) {
            if ($data['sort'] == 'p.sort_order') {
                $sort .= "DESC";
            } else {
                $sort .= $data['order'];
            }
        } else {
            $sort .= "DESC";
        }

        /*if(!$pdname)
            $sort .= " , LCASE(pd.name) ASC";*/

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sort .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $sql = "SELECT *, pd.name AS name, p.image, p.image_hover, (SELECT md.name FROM " . DB_PREFIX . "manufacturer_description md WHERE md.manufacturer_id = p.manufacturer_id AND md.language_id = '" . (int)$this->config->get('config_language_id') . "') AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id GROUP BY r2.product_id) AS reviews, p.sort_order";

        $sql .= " FROM " . DB_PREFIX . "product p";

        $sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id IN (" . implode(',', $product_ids) . ") AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ";

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
        }

        $sql .= " GROUP BY p.product_id";

        $sql .=  $sort;

        //vardump($sql,1);

        $query = $this->db->query($sql);
        if ($query->num_rows) {
            $products = array();
            foreach ($query->rows as $row) {
                $products[] = array(
                    'product_id' => $row['product_id'],
                    'name' => trim($row['name']),
                    'description' => trim($row['description']),
                    'meta_title' => trim($row['meta_title']),
                    'meta_h1' => trim($row['meta_h1']),
                    'meta_description' => trim($row['meta_description']),
                    'meta_keyword' => trim($row['meta_keyword']),
                    'tag' => $row['tag'],
                    'model' => trim($row['model']),
                    'sku' => $row['sku'],
                    'upc' => $row['upc'],
                    'ean' => $row['ean'],
                    'jan' => $row['jan'],
                    'isbn' => $row['isbn'],
                    'mpn' => $row['mpn'],
                    'location' => $row['location'],
                    'quantity' => $row['quantity'],
                    'stock_status' => $row['stock_status'],
                    'stock_status_id' => $row['stock_status_id'],
                    'image' => $row['image'],
                    'image_hover' => $row['image_hover'],
                    'manufacturer_id' => $row['manufacturer_id'],
                    'manufacturer' => $row['manufacturer'],
                    'price' => $this->tax->getPersonalPrice(($row['discount'] ? $row['discount'] : $row['price']), ($row['discount'] ? $row['discount'] : $row['price_2']), $row['group_id'], $row['product_id']),
                    'special' => $row['special'],
                    'reward' => $row['reward'],
                    'points' => $row['points'],
                    'tax_class_id' => $row['tax_class_id'],
                    'date_available' => $row['date_available'],
                    'weight' => $row['weight'],
                    'weight_class_id' => $row['weight_class_id'],
                    'length' => $row['length'],
                    'width' => $row['width'],
                    'height' => $row['height'],
                    'length_class_id' => $row['length_class_id'],
                    'subtract' => $row['subtract'],
                    'rating' => round($row['rating']),
                    'reviews' => $row['reviews'] ? $row['reviews'] : 0,
                    'minimum' => $row['minimum'],
                    'sort_order' => $row['sort_order'],
                    'status' => $row['status'],
                    'date_added' => $row['date_added'],
                    'date_modified' => $row['date_modified'],
                    'viewed' => $row['viewed']
                );
            }
            return $products;
        } else {
            return false;
        }
    }

    public function getProductsByIDsSphinxAjax($product_ids,$data=array()) {

        if(!$product_ids || !is_array($product_ids)) return false;
        $sort = '';

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sort .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $sql = "SELECT p.product_id, p.image, p.image_hover, pd.name FROM " . DB_PREFIX . "product p
                LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "')
                LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON p.product_id = p2s.product_id
                WHERE p.product_id IN (" . implode(',', $product_ids) . ") AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'
                GROUP BY p.product_id" . $sort;

        $query = $this->db->query($sql);
        if ($query->num_rows) {
            $products = array();
            foreach ($query->rows as $row) {
                $products[$row['product_id']] = array(
                    'product_id' => $row['product_id'],
                    'name' => trim($row['name']),
                    'image' => $row['image'],
                    'image_hover' => $row['image_hover'],
                );
            }
            return $products;
        } else {
            return false;
        }
    }

	public function getHomeProductsByIDs($product_ids) {
	    if(!$product_ids || !is_array($product_ids)) return false;
		$query = $this->db->query("SELECT DISTINCT p.*, pd.name AS name, pd.language_id FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.product_id IN (" . implode(',',$product_ids) . ") AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");
		if ($query->num_rows) {
		    $products = array();
		    foreach ($query->rows as $row){
                $products[$row['language_id']][$row['product_id']] = array(
                    'product_id'       => $row['product_id'],
                    'name'             => trim($row['name']),
                    'stock_status_id'  => $row['stock_status_id'],
                    'tax_class_id'     => $row['tax_class_id'],
                    'price'            => $row['price'],
                    'image'            => $row['image'],
                    'image_hover'      => $row['image_hover']
                );
            }
		    return $products;
		} else {
			return false;
		}
	}

	public function getProductsByIDs($product_ids,$data=array()) {

	    if(!$product_ids || !is_array($product_ids)) return false;
        $actionsSQL = '';
        if ($data['actions']) {
            $actionsSQL .= " LEFT JOIN " . DB_PREFIX . "product_special ps ON (p.product_id = ps.product_id AND CURRENT_DATE() >= ps.date_start AND CURRENT_DATE() <= ps.date_end)";
        }
        $sort = '';
        $sort_data = array(
            'pd.name',
            'p.model',
            'p.quantity',
            'p.price',
            'rating',
            'p.sort_order',
            'p.date_added',
            'p.product_id',
            'FIELD(p.stock_status_id, 7, 11, 21, 12)',
            'FIELD(p.stock_status_id, 7, 11, 21, 12) DESC, p.product_id',
            'FIELD(p.stock_status_id, 7, 21, 12, 11) DESC, p.product_id',
            'FIELD(p.stock_status_id, 7, 21, 12, 11) DESC, p.product_id',
            'FIELD(p.stock_status_id, 7, 21, 12, 11, 23) DESC, p.product_id',
            'ps.product_special_id DESC, FIELD(p.stock_status_id, 7, 21, 12, 11) DESC, p.product_id',
        );
        $sort .= " ORDER BY ";
        $pdname = false;
        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
                $sort .= "LCASE(" . $data['sort'] . ") ";
                $pdname = true;
            } elseif ($data['sort'] == 'p.sort_order') {
                $sort .= "ss.sort ";
            } else {
                $sort .= $data['sort']." ";
            }
        } else {
            $sort .= "ss.sort ";
        }

        if (isset($data['order']) && $data['order'] && in_array($data['order'],array('DESC','ASC'))) {
            if ($data['sort'] == 'p.sort_order') {
                $sort .= "ASC";
            } else {
                $sort .= $data['order'];
            }
        } else {
            $sort .= "DESC";
        }

        if(!$pdname){
            //$sort .= " , LCASE(pd.name) ASC";
        }
///!!!
        $sort = " ORDER BY UNIX_TIMESTAMP(p.date_added) DESC ";
        
		$query = $this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, p.image_hover, (SELECT md.name FROM " . DB_PREFIX . "manufacturer_description md WHERE md.manufacturer_id = p.manufacturer_id AND md.language_id = '" . (int)$this->config->get('config_language_id') . "') AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special psp WHERE psp.product_id = p.product_id AND psp.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((psp.date_start = '0000-00-00' OR psp.date_start < NOW()) AND (psp.date_end = '0000-00-00' OR psp.date_end > NOW())) ORDER BY psp.priority ASC, psp.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) LEFT JOIN " . DB_PREFIX . "stock_status ss ON (ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "')".$actionsSQL." WHERE p.product_id IN (" . implode(',',$product_ids) . ") AND p.price > 0 AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ".$sort);

		if ($query->num_rows) {
		    $products = array();
		    foreach ($query->rows as $row){
                $products[] = array(
                    'product_id'       => $row['product_id'],
                    'name'             => trim($row['name']),
                    'description'      => trim($row['description']),
                    'meta_title'       => trim($row['meta_title']),
                    'meta_h1'          => trim($row['meta_h1']),
                    'meta_description' => trim($row['meta_description']),
                    'meta_keyword'     => trim($row['meta_keyword']),
                    'tag'              => $row['tag'],
                    'model'            => trim($row['model']),
                    'sku'              => $row['sku'],
                    'upc'              => $row['upc'],
                    'ean'              => $row['ean'],
                    'jan'              => $row['jan'],
                    'isbn'             => $row['isbn'],
                    'mpn'              => $row['mpn'],
                    'location'         => $row['location'],
                    'quantity'         => $row['quantity'],
                    'stock_status'     => $row['stock_status'],
                    'stock_status_id'  => $row['stock_status_id'],
                    'image'            => $row['image'],
                    'image_hover'      => $row['image_hover'],
                    'manufacturer_id'  => $row['manufacturer_id'],
                    'manufacturer'     => $row['manufacturer'],
                    'price'            => (!empty($row['discount']) && (int)$row['discount'] > 0 ? $row['discount'] : $row['price']),
                    'special'          => $row['special'],
                    'reward'           => $row['reward'],
                    'points'           => $row['points'],
                    'tax_class_id'     => $row['tax_class_id'],
                    'date_available'   => $row['date_available'],
                    'weight'           => $row['weight'],
                    'weight_class_id'  => $row['weight_class_id'],
                    'length'           => $row['length'],
                    'width'            => $row['width'],
                    'height'           => $row['height'],
                    'length_class_id'  => $row['length_class_id'],
                    'subtract'         => $row['subtract'],
                    'rating'           => round($row['rating']),
                    'reviews'          => $row['reviews'] ? $row['reviews'] : 0,
                    'minimum'          => $row['minimum'],
                    'sort_order'       => $row['sort_order'],
                    'status'           => $row['status'],
                    'date_added'       => $row['date_added'],
                    'date_modified'    => $row['date_modified'],
                    'viewed'           => $row['viewed']
                );
            }
		    return $products;
		} else {
			return false;
		}
	}

	public function getProductCategoryRef($product_id){
	    if (!$product_id) return false;
        $query = $this->db->query("SELECT *  FROM `" . DB_PREFIX . "product_to_category` pc
                        LEFT JOIN " . DB_PREFIX . "category c ON c.category_id = pc.category_id
                        WHERE pc.`product_id` = ".$product_id." AND c.parent_id = 0");
        if($query->num_rows && ($category_id = (int)$query->row['category_id'])) {
            return $this->url->link('product/category', 'path=' . $category_id);
        }
        return false;
    }

	public function getProducts($data = array()) {
		$sql = "SELECT p.product_id, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id GROUP BY r1.product_id) AS rating, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";

		if (!empty($data['filter_category_id'])) {
			if (!empty($data['filter_sub_category'])) {
				$sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
			} else {
				$sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
			}

			if (!empty($data['filter_filter'])) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
			} else {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
			}
		} else {
			$sql .= " FROM " . DB_PREFIX . "product p";
		}

		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

		if (!empty($data['filter_category_id'])) {
			if (!empty($data['filter_sub_category'])) {
				$sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
			} else {
//				$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
				$sql .= " AND p2c.category_id IN (" . $data['filter_category_id'] . ")";
			}

			if (!empty($data['filter_filter'])) {
				$implode = array();

				$filters = explode(',', $data['filter_filter']);

				foreach ($filters as $filter_id) {
					$implode[] = (int)$filter_id;
				}

				$sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
			}
		}

		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
			$sql .= " AND (";

			if (!empty($data['filter_name'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}

				if (!empty($data['filter_description'])) {
					$sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
				}
			}

			if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
				$sql .= " OR ";
			}

			if (!empty($data['filter_tag'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

				foreach ($words as $word) {
					$implode[] = "pd.tag LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			if (!empty($data['filter_name'])) {
                $filter_name = $this->db->escape(utf8_strtolower($data['filter_name']));
                $sql .= " OR LCASE(pd.description) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.model) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.sku) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.upc) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.ean) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.jan) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.isbn) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.mpn) = '" . $filter_name . "'";
			}

			$sql .= ")";
		}

		if (!empty($data['filter_manufacturer_id'])) {
			$sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
		}

		$sql .= " GROUP BY p.product_id";

		$sort_data = array(
			'pd.name',
			'p.model',
			'p.quantity',
			'p.price',
			'rating',
			'p.sort_order',
			'p.date_added'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
			} elseif ($data['sort'] == 'p.price') {
				$sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special WHEN discount IS NOT NULL THEN discount ELSE p.price END)";
			} elseif ($data['sort'] == 'p.sort_order') {
				$sql .= " ORDER BY p.price!=0 DESC, p.stock_status_id";
			} else {
				$sql .= " ORDER BY " . $data['sort'];
			}
		} else {
			$sql .= " ORDER BY p.price!=0 DESC, p.stock_status_id ";
		}

		if (isset($data['order']) && $data['order'] && in_array($data['order'],array('DESC','ASC'))) {
            if ($data['sort'] == 'p.sort_order') {
                $sql .= " DESC";
            } else {
                $sql .= " ".$data['order'].", LCASE(pd.name) ".$data['order'];
            }
		} else {
			$sql .= " DESC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		//$product_data = array();

		$query = $this->db->query($sql);

        $product_ids = array();
		foreach ($query->rows as $result) {
            $product_ids[] = $result['product_id'];
			//$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
		}

		return $this->getProductsByIDs($product_ids,$data);
	}

	public function getProductsCalc($data = array()) {
		$sql = "SELECT SQL_CALC_FOUND_ROWS p.product_id";
//$sql .= " , UNIX_TIMESTAMP(p.date_added) as zzz, p.date_added";
		if (!empty($data['filter_category_id'])) {
			if (!empty($data['filter_sub_category'])) {
				$sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
			} else {
				$sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
			}

			if (!empty($data['filter_filter'])) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
			} else {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
			}
		} else {
			$sql .= " FROM " . DB_PREFIX . "product p";
		}

        if ($data['actions']) {
            $sql .= " LEFT JOIN " . DB_PREFIX . "product_special ps ON (p.product_id = ps.product_id AND CURRENT_DATE() >= ps.date_start AND CURRENT_DATE() <= ps.date_end)";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "stock_status ss ON (ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "')";
		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.price > 0 AND p.status = 1 AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";
        
///!!!2020-06
        $sql .= ' AND p.date_added >= NOW() - INTERVAL ' . NEW_PRODUCTS_DAYS . ' DAY';

		if (!empty($data['filter_category_id'])) {
			if (!empty($data['filter_sub_category'])) {
				$sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
			} else {
//				$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
				$sql .= " AND p2c.category_id IN (" . $data['filter_category_id'] . ")";
			}

			if (!empty($data['filter_filter'])) {
				$implode = array();

				$filters = explode(',', $data['filter_filter']);

				foreach ($filters as $filter_id) {
					$implode[] = (int)$filter_id;
				}

				$sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
			}
		}

		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
			$sql .= " AND (";

			if (!empty($data['filter_name'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}

				if (!empty($data['filter_description'])) {
					$sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
				}
			}

			if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
				$sql .= " OR ";
			}

			if (!empty($data['filter_tag'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

				foreach ($words as $word) {
					$implode[] = "pd.tag LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			if (!empty($data['filter_name'])) {
                $filter_name = $this->db->escape(utf8_strtolower($data['filter_name']));
				$sql .= " OR LCASE(p.model) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.sku) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.upc) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.ean) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.jan) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.isbn) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.mpn) = '" . $filter_name . "'";
			}

			$sql .= ")";
		}

		if (!empty($data['filter_manufacturer_id'])) {
			$sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
		}

		$sql .= " GROUP BY p.product_id";

		$sort_data = array(
			'pd.name',
			'p.model',
			'p.quantity',
			'p.price',
			'rating',
			'p.sort_order',
			'p.date_added',
			'p.product_id',
            'p.date_added DESC',
            'p.date_added DESC, pd.name ASC',
			'FIELD(p.stock_status_id, 7, 11, 21, 12)',
			'FIELD(p.stock_status_id, 7, 11, 21, 12) DESC, p.product_id',
			'FIELD(p.stock_status_id, 7, 21, 12, 11) DESC, p.product_id',
			'FIELD(p.stock_status_id, 7, 21, 12, 11) DESC, p.product_id',
			'FIELD(p.stock_status_id, 7, 21, 12, 11, 23) DESC, p.product_id',
			'ps.product_special_id DESC, FIELD(p.stock_status_id, 7, 21, 12, 11) DESC, p.product_id',
		);

//        $sql .= " ORDER BY ";
//        $sql .= " ORDER BY p.date_added ASC, ss.sort ASC ";
//        $sql .= " ORDER BY p.date_added DESC, p.date_modified ASC ";
        $sql .= " ORDER BY UNIX_TIMESTAMP(p.date_added) DESC ";
        
        $pdname = false;
        /*
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= "LCASE(" . $data['sort'] . ") ";
                $pdname = true;
			} elseif ($data['sort'] == 'p.sort_order') {
				$sql .= "ss.sort ";
			} else {
				$sql .= $data['sort']." ";
			}
		} else {
			$sql .= "p.product_id ";
		}

		if (isset($data['order']) && $data['order'] && in_array($data['order'],array('DESC','ASC', ' '))) {
            if ($data['sort'] == 'p.sort_order') {
                $sql .= "ASC";
            } else {
                $sql .= $data['order'];
            }
		} else {
			$sql .= "DESC";
		}

		if(!$pdname){
            //$sql .= " , LCASE(pd.name) ASC";
        }
*/
        
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
//var_dump($sql);
//logg($sql);
		$query = $this->db->query($sql);
		$totals = $this->db->query("SELECT FOUND_ROWS() as total");

        $product_ids = array();
		foreach ($query->rows as $result) {
            $product_ids[] = $result['product_id'];
		}
		return array('total'=>(int)$totals->row['total'],'products' => $this->getProductsByIDs($product_ids,$data));
	}

	public function getProductSpecials($data = array()) {
		$sql = "SELECT DISTINCT ps.product_id, (SELECT AVG(rating) FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = ps.product_id GROUP BY r1.product_id) AS rating FROM " . DB_PREFIX . "product_special ps LEFT JOIN " . DB_PREFIX . "product p ON (ps.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) GROUP BY ps.product_id";

		$sort_data = array(
			'pd.name',
			'p.model',
			'ps.price',
			'rating',
			'p.sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
			} else {
				$sql .= " ORDER BY " . $data['sort'];
			}
		} else {
			$sql .= " ORDER BY p.sort_order";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC, LCASE(pd.name) DESC";
		} else {
			$sql .= " ASC, LCASE(pd.name) ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$product_data = array();

		$query = $this->db->query($sql);

		foreach ($query->rows as $result) {
			$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
		}

		return $product_data;
	}

	public function getLatestProducts($limit) {
		$product_data = $this->cache->get('product.latest.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit);

		if (!$product_data) {
			$query = $this->db->query("SELECT p.product_id FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ORDER BY p.date_added DESC LIMIT " . (int)$limit);

			foreach ($query->rows as $result) {
				$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
			}

			$this->cache->set('product.latest.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit, $product_data);
		}

		return $product_data;
	}

	public function getPopularProducts($limit) {
		$product_data = $this->cache->get('product.popular.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit);

		if (!$product_data) {
			$query = $this->db->query("SELECT p.product_id FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ORDER BY p.viewed DESC, p.date_added DESC LIMIT " . (int)$limit);

			foreach ($query->rows as $result) {
				$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
			}

			$this->cache->set('product.popular.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit, $product_data);
		}

		return $product_data;
	}

	public function getBestSellerProducts($limit) {
		$product_data = $this->cache->get('product.bestseller.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit);

		if (!$product_data) {
			$product_data = array();

			$query = $this->db->query("SELECT op.product_id, SUM(op.quantity) AS total FROM " . DB_PREFIX . "order_product op LEFT JOIN `" . DB_PREFIX . "order` o ON (op.order_id = o.order_id) LEFT JOIN `" . DB_PREFIX . "product` p ON (op.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE o.order_status_id > '0' AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' GROUP BY op.product_id ORDER BY total DESC LIMIT " . (int)$limit);

			foreach ($query->rows as $result) {
				$product_data[$result['product_id']] = $this->getProduct($result['product_id']);
			}

			$this->cache->set('product.bestseller.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id') . '.' . $this->config->get('config_customer_group_id') . '.' . (int)$limit, $product_data);
		}

		return $product_data;
	}

	public function getProductAttributes($product_id) {
		$product_attribute_group_data = array();

		$product_attribute_group_query = $this->db->query("SELECT ag.attribute_group_id, agd.name FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_group ag ON (a.attribute_group_id = ag.attribute_group_id) LEFT JOIN " . DB_PREFIX . "attribute_group_description agd ON (ag.attribute_group_id = agd.attribute_group_id) WHERE pa.product_id = '" . (int)$product_id . "' AND agd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY ag.attribute_group_id ORDER BY ag.sort_order, agd.name");

		foreach ($product_attribute_group_query->rows as $product_attribute_group) {
			$product_attribute_data = array();

			$product_attribute_query = $this->db->query("SELECT a.attribute_id, ad.name, pa.text FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE pa.product_id = '" . (int)$product_id . "' AND a.attribute_group_id = '" . (int)$product_attribute_group['attribute_group_id'] . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND pa.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.sort_order, ad.name");

			foreach ($product_attribute_query->rows as $product_attribute) {
				$product_attribute_data[] = array(
					'attribute_id' => $product_attribute['attribute_id'],
					'name'         => mb_ucfirst(trim($product_attribute['name'])),
					'text'         => $product_attribute['text']
				);
			}

			$product_attribute_group_data[] = array(
				'attribute_group_id' => $product_attribute_group['attribute_group_id'],
				'name'               => mb_ucfirst(trim($product_attribute_group['name'])),
				'attribute'          => $product_attribute_data
			);
		}

		return $product_attribute_group_data;
	}

	public function getProductAttributesMod($product_ids,$language_id) {
	    if(!$product_ids || !is_array($product_ids)) return false;
        $product_attribute_data = array();

        $pa_query = $this->db->query("SELECT pa.*,ad.name FROM `" . DB_PREFIX . "product_attribute` pa
            LEFT JOIN `" . DB_PREFIX . "attribute_description` ad ON (ad.`attribute_id` = pa.`attribute_id` AND ad.`language_id` = ".$language_id.")
            WHERE pa.`product_id` IN (".implode(',',$product_ids).") AND pa.`language_id` = ".$language_id." GROUP BY pa.`attribute_id` ORDER BY ad.name ASC");

        if($pa_query->num_rows){
            foreach ($pa_query->rows as $pa) {
                $product_attribute_data[] = array(
                    'attribute_id' => $pa['attribute_id'],
                    'name'         => mb_ucfirst(trim($pa['name']))
                );
            }

            return $product_attribute_data;
        }
		return false;
	}

	public function getAllProductAttributesMod($product_ids,$language_id) {
	    if(!$product_ids || !is_array($product_ids)) return false;
        $product_attribute_data = array();

        $pa_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_attribute`
            WHERE `product_id` IN (".implode(',',$product_ids).") AND `language_id` = ".$language_id);

        if($pa_query->num_rows){
            foreach ($pa_query->rows as $pa) {
                $product_attribute_data[$pa['product_id']][$pa['attribute_id']] = trim($pa['text']);
            }
            return $product_attribute_data;
        }
		return false;
	}

	public function getProductOptions($product_id) {
		$product_option_data = array();

		$product_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY o.sort_order");

		foreach ($product_option_query->rows as $product_option) {
			$product_option_value_data = array();

			$product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_id = '" . (int)$product_id . "' AND pov.product_option_id = '" . (int)$product_option['product_option_id'] . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY ov.sort_order");

			foreach ($product_option_value_query->rows as $product_option_value) {
				$product_option_value_data[] = array(
					'product_option_value_id' => $product_option_value['product_option_value_id'],
					'option_value_id'         => $product_option_value['option_value_id'],
					'name'                    => $product_option_value['name'],
					'image'                   => $product_option_value['image'],
					'quantity'                => $product_option_value['quantity'],
					'subtract'                => $product_option_value['subtract'],
					'price'                   => $product_option_value['price'],
					'price_prefix'            => $product_option_value['price_prefix'],
					'weight'                  => $product_option_value['weight'],
					'weight_prefix'           => $product_option_value['weight_prefix']
				);
			}

			$product_option_data[] = array(
				'product_option_id'    => $product_option['product_option_id'],
				'product_option_value' => $product_option_value_data,
				'option_id'            => $product_option['option_id'],
				'name'                 => $product_option['name'],
				'type'                 => $product_option['type'],
				'value'                => $product_option['value'],
				'required'             => $product_option['required']
			);
		}

		return $product_option_data;
	}

	public function getProductDiscounts($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND quantity > 1 AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY quantity ASC, priority ASC, price ASC");

		return $query->rows;
	}

	public function getProductImages($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "' ORDER BY sort_order ASC");

		return $query->rows;
	}

	public function getProductRelated($product_id) {
		$product_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_related pr LEFT JOIN " . DB_PREFIX . "product p ON (pr.related_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pr.product_id = '" . (int)$product_id . "' AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

		foreach ($query->rows as $result) {
			$product_data[$result['related_id']] = $this->getProduct($result['related_id']);
		}

		return $product_data;
	}

	public function getProductLayoutId($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return $query->row['layout_id'];
		} else {
			return 0;
		}
	}

	public function getCategories($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");

		return $query->rows;
	}

	public function getTotalProducts($data = array()) {
		$sql = "SELECT COUNT(DISTINCT p.product_id) AS total";

		if (!empty($data['filter_category_id'])) {
			if (!empty($data['filter_sub_category'])) {
				$sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
			} else {
				$sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
			}

			if (!empty($data['filter_filter'])) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
			} else {
				$sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
			}
		} else {
			$sql .= " FROM " . DB_PREFIX . "product p";
		}

		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

		if (!empty($data['filter_category_id'])) {
			if (!empty($data['filter_sub_category'])) {
				$sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
			} else {
//				$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
				$sql .= " AND p2c.category_id = IN (" . $data['filter_category_id'] . ")";
			}

			if (!empty($data['filter_filter'])) {
				$implode = array();

				$filters = explode(',', $data['filter_filter']);

				foreach ($filters as $filter_id) {
					$implode[] = (int)$filter_id;
				}

				$sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
			}
		}

		if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
			$sql .= " AND (";

			if (!empty($data['filter_name'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

				foreach ($words as $word) {
					$implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}

				if (!empty($data['filter_description']) && $implode) {
					$sql .= " OR pd.description LIKE '%" . $implode . "%'";
				}
			}

			if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
				$sql .= " OR ";
			}

			if (!empty($data['filter_tag'])) {
				$implode = array();

				$words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

				foreach ($words as $word) {
					$implode[] = "pd.tag LIKE '%" . $this->db->escape($word) . "%'";
				}

				if ($implode) {
					$sql .= " " . implode(" AND ", $implode) . "";
				}
			}

			if (!empty($data['filter_name'])) {
                $filter_name = $this->db->escape(utf8_strtolower($data['filter_name']));
				$sql .= " OR LCASE(p.model) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.sku) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.upc) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.ean) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.jan) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.isbn) = '" . $filter_name . "'";
				$sql .= " OR LCASE(p.mpn) = '" . $filter_name . "'";
			}

			$sql .= ")";
		}

		if (!empty($data['filter_manufacturer_id'])) {
			$sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getProfile($product_id, $recurring_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "recurring r JOIN " . DB_PREFIX . "product_recurring pr ON (pr.recurring_id = r.recurring_id AND pr.product_id = '" . (int)$product_id . "') WHERE pr.recurring_id = '" . (int)$recurring_id . "' AND status = '1' AND pr.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "'");

		return $query->row;
	}

	public function getProfiles($product_id) {
		$query = $this->db->query("SELECT rd.* FROM " . DB_PREFIX . "product_recurring pr JOIN " . DB_PREFIX . "recurring_description rd ON (rd.language_id = " . (int)$this->config->get('config_language_id') . " AND rd.recurring_id = pr.recurring_id) JOIN " . DB_PREFIX . "recurring r ON r.recurring_id = rd.recurring_id WHERE pr.product_id = " . (int)$product_id . " AND status = '1' AND pr.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' ORDER BY sort_order ASC");

		return $query->rows;
	}

	public function getTotalProductSpecials() {
		$query = $this->db->query("SELECT COUNT(DISTINCT ps.product_id) AS total FROM " . DB_PREFIX . "product_special ps LEFT JOIN " . DB_PREFIX . "product p ON (ps.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.price > 0 AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW()))");

		if (isset($query->row['total'])) {
			return $query->row['total'];
		} else {
			return 0;
		}
	}

	public function getProductRelatedMod($cat_id) {

		$query = $this->db->query("SELECT p.`product_id`, pd.`name`, p.`model`,p.`image`, p.`image_hover`, p.`price`, p.`stock_status_id` FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_category pc ON (pc.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE pc.category_id = '" . (int)$cat_id . "' AND p.price > 0 AND p.`stock_status_id` IN (7,11,12,21) AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY p.`stock_status_id` DESC, RAND() LIMIT 8");

		return $query->rows;
	}
}
