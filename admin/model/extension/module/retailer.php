<?php
class ModelExtensionModuleRetailer extends Model {
	public function addRetailer($data) {
        $this->db->query("INSERT INTO " . DB_PREFIX . "retailer SET city_id = '" . (int)$data['city'] . "', phone = '" . $this->db->escape($data['phone']) . "', site = '" . $this->db->escape($data['site']) . "', lat = '" . $this->db->escape($data['lat']) . "', lng = '" . $this->db->escape($data['lng']) . "',  status = '" . (int)$data['status'] . "',  extended = '" . (int)$data['extended'] . "'");

		$retailer_id = $this->db->getLastId();

        foreach ($data['retailer_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "retailer_description SET retailer_id = '" . (int)$retailer_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', address = '" . $this->db->escape($value['address']) . "', work_time = '" . $this->db->escape($value['work_time']) . "'");
        }

		return $retailer_id;
    }
	
	public function getTotalRetailers($data = array()){
		
		$sql = "SELECT COUNT(DISTINCT r.retailer_id) AS total FROM " . DB_PREFIX . "retailer r";

		$query = $this->db->query($sql);
		
		return $query->row['total'];
		
	}

	public function getRetailers($data = array()){
		
		$sql = "SELECT * FROM " . DB_PREFIX . "retailer";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function deleteRetailer($retailer_id){
		$this->db->query("DELETE FROM " . DB_PREFIX . "retailer WHERE retailer_id = '" . (int)$retailer_id . "'");
	}
	
	
	public function editRetailer($retailer_id, $data){
		
		$this->db->query("UPDATE " . DB_PREFIX . "retailer SET city_id = '" . (int)$data['city'] . "', phone = '" . $this->db->escape($data['phone']) . "', site = '" . $this->db->escape($data['site']) . "', lat = '" . $this->db->escape($data['lat']) . "', lng = '" . $this->db->escape($data['lng']) . "',  status = '" . (int)$data['status'] . "',  extended = '" . (int)$data['extended'] . "' WHERE retailer_id = '" . (int)$retailer_id . "'");

        foreach ($data['retailer_description'] as $language_id => $value) {
            $this->db->query("UPDATE " . DB_PREFIX . "retailer_description SET title = '" . $this->db->escape($value['title']) . "', address = '" . $this->db->escape($value['address']) . "', work_time = '" . $this->db->escape($value['work_time']) . "' WHERE retailer_id = '" . (int)$retailer_id . "' AND language_id = '" . (int)$language_id . "'");
        }
	}

	public function getRetailer($retailer_id){
		
		$sql = "SELECT * FROM " . DB_PREFIX . "retailer r LEFT JOIN " . DB_PREFIX . "retailer_description rd ON (rd.retailer_id = r.retailer_id) LEFT JOIN " . DB_PREFIX . "retailer_city_description rcd ON (rcd.city_id = r.city_id) WHERE r.retailer_id = '" . (int)$retailer_id . "' AND rd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		
		$query = $this->db->query($sql);
		
		return $query->row;
	}
}
