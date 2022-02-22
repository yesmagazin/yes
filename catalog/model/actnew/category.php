<?php
class ModelActnewCategory extends Model {
	public function getCategory($category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "actnew_category c LEFT JOIN " . DB_PREFIX . "actnew_category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "actnew_category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . (int)$category_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row;
	}

	public function getCategoryBySeourl($upc) {
        $query = $this->db->query("SELECT `query` from " . DB_PREFIX . "url_alias where `keyword`='" . $this->db->escape($upc) . "'");
        $r = $query->row;
        $found = false;
        if (is_array($r) && !empty($r)) { //[query] => actnew_category_id=1
            if (strstr($r['query'], 'actnew_category_id=')) {
                $found = str_replace('actnew_category_id=', '', $r['query']);
            }
        }
        if ($found) {
            $query_sql = "SELECT DISTINCT * FROM (" . DB_PREFIX . "actnew_category c, " . DB_PREFIX . "url_alias ua) LEFT JOIN " . DB_PREFIX . "actnew_category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "actnew_category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . (int)$found . "' and ua.keyword = '" . $this->db->escape($upc) . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'";
            $res = $this->db->query($query_sql);
            return $res->row;
        }
        return false;
	}

	public function getSeourlByCategory($cid) {
        $query = $this->db->query("SELECT `keyword` from " . DB_PREFIX . "url_alias where `query`='actnew_category_id=" . (int)$cid . "'");
        if ($query->row) {
            $zzz = $query->row;
            return $zzz['keyword'];
        }
        return false;
    }
    
	public function getProductsCalcActnew($data = array()) {
        $sql = "FROM (" . DB_PREFIX . "product p, " . DB_PREFIX . "product_description pd, " . DB_PREFIX . "product_to_store p2s)
  WHERE p.product_id = pd.product_id AND p.product_id = p2s.product_id
  AND p.price > 0 AND p.status = 1 AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() 
  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' and p.upc = '" . $data['seourl'] . "'";

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
			'p.date_added'
		);

        $sql .= " ORDER BY ";
        $pdname = false;
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= "LCASE(" . $data['sort'] . ") ";
                $pdname = true;
//			} elseif ($data['sort'] == 'p.sort_order') {
//				$sql .= "ss.sort ";
			} else {
				$sql .= $data['sort']." ";
			}
		}
//        else {
//			$sql .= "ss.sort ";
//		}

		if (isset($data['order']) && $data['order'] && in_array($data['order'],array('DESC','ASC'))) {
            if ($data['sort'] == 'p.sort_order') {
                $sql .= "ASC";
            } else {
                $sql .= $data['order'];
            }
		} else {
			$sql .= "ASC";
		}

		if(!$pdname){
            $sql .= " , LCASE(pd.name) ASC";
        }

        $sql_limit = '';
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql_limit = " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query('SELECT p.product_id ' . $sql . $sql_limit);

		$totals = $this->db->query("SELECT count(p.product_id) as total " . $sql);

        $product_ids = array();
		foreach ($query->rows as $result) {
            $product_ids[] = $result['product_id'];
		}
//		return array();
		return array('total'=>(int)$totals->num_rows,'product_ids' => $product_ids);
	}

    
	public function getCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "actnew_category c
		LEFT JOIN " . DB_PREFIX . "actnew_category_description cd ON (c.category_id = cd.category_id)
		LEFT JOIN " . DB_PREFIX . "actnew_category_to_store c2s ON (c.category_id = c2s.category_id)
		WHERE c.parent_id = '" . (int)$parent_id . "'
		AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "'
		AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'
		AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)");

		return $query->rows;
	}

	public function getCategoriesTop() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "actnew_category c
		LEFT JOIN " . DB_PREFIX . "actnew_category_description cd ON (c.category_id = cd.category_id)
		LEFT JOIN " . DB_PREFIX . "actnew_category_to_store c2s ON (c.category_id = c2s.category_id)
		WHERE c.top = 1
		AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "'
		AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'
		AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)");

		return $query->rows;
	}

	public function getCategoryFilters($category_id) {
		$implode = array();

		$query = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "actnew_category_filter WHERE category_id = '" . (int)$category_id . "'");

		foreach ($query->rows as $result) {
			$implode[] = (int)$result['filter_id'];
		}

		$filter_group_data = array();

		if ($implode) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id) LEFT JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}

	public function getCategoryLayoutId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "actnew_category_to_layout WHERE category_id = '" . (int)$category_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return $query->row['layout_id'];
		} else {
			return 0;
		}
	}

	public function getTotalCategoriesByCategoryId($parent_id = 0) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "actnew_category c LEFT JOIN " . DB_PREFIX . "actnew_category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row['total'];
	}
}