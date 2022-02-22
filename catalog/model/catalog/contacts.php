<?php

class ModelCatalogContacts extends Model {

    public function getContacts() {

        if($city_contacts = $this->cache->get('city_contacts')){
            return $city_contacts;
        } else {
            $contacts = $this->db->query("SELECT * FROM `". DB_PREFIX ."city_contacts` cc
                                          LEFT JOIN `" . DB_PREFIX . "event_categories` ec ON ec.category_id = cc.cid 
                                          ORDER BY cc.`city_name`");
            if ($contacts->num_rows) {
                $city_contacts = array();
                foreach($contacts->rows as $row){
                    $city_contacts[$row['cid']] = $row;
                }
                $this->cache->set('city_contacts',$city_contacts,2592000);
                return $city_contacts;
            }
        }
        return false;
    }
}