<?php
class ModelExtensionModuleShop extends Model {
	public function addShop($data) {
        $this->db->query("INSERT INTO " . DB_PREFIX . "shop SET name = '" . $this->db->escape($data['name']) . "', phone = '" . $this->db->escape($data['phone']) . "', contact = '" . $this->db->escape($data['contact']) . "', conditions = '" . $this->db->escape($data['conditions']) . "', date_added = NOW(), image = '" . $this->db->escape($data['image']) . "',  status = '" . (int)$data['status'] . "',  status_price = '" . (int)$data['status_price'] . "', filename = '" . $this->db->escape($data['filename']) . "', sort = '" . $this->db->escape($data['sort']) . "', href = '" . $this->db->escape($data['href']) . "'");

		$shop_id = $this->db->getLastId();

		return $shop_id;
    }
	
	public function getTotalShops($data = array()){
		
		$sql = "SELECT COUNT(DISTINCT s.shop_id) AS total FROM " . DB_PREFIX . "shop s";

		$query = $this->db->query($sql);
		
		return $query->row['total'];
		
	}
	
	public function getProductModel($model) {
		
		$query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product WHERE model = '" . $this->db->escape($model) . "' LIMIT 1");
		
		return $query->row;
	}

	public function getProductModelSSD($model) {

		$query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product WHERE model = '" . $this->db->escape($model) . "' AND stock_status_id IN (7,11,21) LIMIT 1");

		return $query->row;
	}
	
	public function getFile($shop_id){
		$sql = "SELECT filename FROM " . DB_PREFIX . "shop WHERE shop_id = '" . (int)$shop_id . "'";
		
		$query = $this->db->query($sql);
		
		return $query->row['filename'];
	}

	public function getShops($data = array()){
		
		$sql = "SELECT * FROM " . DB_PREFIX . "shop";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function deleteShop($shop_id){
		$this->db->query("DELETE FROM " . DB_PREFIX . "shop WHERE shop_id = '" . (int)$shop_id . "'");

		$this->removeShopProdcut($shop_id);

	}
	
	
	public function editShop($shop_id, $data){
		
		$this->db->query("UPDATE " . DB_PREFIX . "shop SET name = '" . $this->db->escape($data['name']) . "', phone = '" . $this->db->escape($data['phone']) . "', contact = '" . $this->db->escape($data['contact']) . "', conditions = '" . $this->db->escape($data['conditions']) . "', image = '" . $this->db->escape($data['image']) . "',  status = '" . (int)$data['status'] . "', status_price = '" . (int)$data['status_price'] . "', sort = '" . $this->db->escape($data['sort']) . "', href = '" . $this->db->escape($data['href']) . "', filename = '" . $this->db->escape($data['filename']) . "' WHERE shop_id = '" . (int)$shop_id . "'");
	
	}

	public function getShop($shop_id){
		
		$sql = "SELECT * FROM " . DB_PREFIX . "shop WHERE shop_id = '" . (int)$shop_id . "'";
		
		$query = $this->db->query($sql);
		
		return $query->row;
	}

    public function removeShopProdcut($shop_id){

        $this->db->query("DELETE FROM " . DB_PREFIX . "shop_description WHERE shop_id = '" . (int)$shop_id . "'");
    }

    public function addShopProdcut($array){

        $i = 0;

        foreach ($array as $data) {
            $i++;

            $this->db->query("INSERT INTO " . DB_PREFIX . "shop_description SET shop_id = '" . (int)$data['shop_id'] . "', url = '" . $data['url'] . "', model = '" . $data['model'] . "', price = '" . (int)$data['price'] . "', product_id = '" . (int)$data['product_id'] . "'");

        }

        return $i;

    }
	
	public function getShopProducts($shop_id) {
		
		$sql = "SELECT price, model, url FROM " . DB_PREFIX . "shop_description  WHERE shop_id = '" . (int)$shop_id . "'";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
 
 
	
	
}
