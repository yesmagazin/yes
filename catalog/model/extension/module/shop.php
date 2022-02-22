<?php
class ModelExtensionModuleShop extends Model {
	public function getShopProduct($product_id) {
		
		$sql = "SELECT sd.price, sd.model, sd.shop_id, sd.url, s.image, s.sort, s.status_price, s.name, s.conditions FROM " . DB_PREFIX . "shop_description sd LEFT JOIN " . DB_PREFIX . "shop s  ON (sd.shop_id = s.shop_id) LEFT JOIN " . DB_PREFIX . "product p  ON (sd.product_id = p.product_id) WHERE ";

		$sql.= $product_id?"sd.product_id = '" . (int)$product_id . "' AND s.status = '1' ORDER BY s.sort ASC":"s.status = '1' ORDER BY s.sort ASC";
		$query = $this->db->query($sql);
		
		return $query->rows;
	}

	public function getAllShops($extended = false) {
        $where = ($extended) ? '' : '';
		$sql = "SELECT * FROM `oc_shop_description` sd
                LEFT JOIN `oc_shop` s ON s.shop_id = sd.shop_id
                {$where}
                GROUP BY sd.shop_id ORDER BY s.sort, s.name";

		$query = $this->db->query($sql);
		return $query->rows;
	}

}

