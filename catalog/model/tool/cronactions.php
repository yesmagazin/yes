<?php
class ModelToolCronactions extends Model {
	public function reasignProducts() {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_store`");

		$this->db->query("INSERT INTO `" . DB_PREFIX . "product_to_store` (product_id, store_id) SELECT product_id, 0 FROM `" . DB_PREFIX . "product`");
		exit(1);
	}
}
