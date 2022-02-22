<?php

class ModelCatalogEvents extends Model {

    public function getEventsCategories($extended = false) {
        $where = ($extended) ? ' e.extended = 1 AND ' : ' e.extended != 1 AND ';
//        if($events_categories = $this->cache->get('events_categories'.(int)$this->config->get('config_language_id'))){
//            return $events_categories;
//        } else {
            $events_categories = $this->db->query("SELECT * FROM ". DB_PREFIX ."event_categories ec LEFT JOIN ". DB_PREFIX ."event_to_category etc ON(ec.category_id=etc.category_id) LEFT JOIN ". DB_PREFIX ."events e ON(etc.event_id=e.event_id) where {$where} language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY ec.`category_name` ORDER BY ec.`sortorder`,  ec.`category_id`, ec.`category_name`");
            if ($events_categories->num_rows) {
//                $this->cache->set('events_categories'.(int)$this->config->get('config_language_id'),$events_categories->rows,2592000);
                return $events_categories->rows;
            }
//        }
        return false;
    }

    public function getEvents($extended = false) {
        $where = ($extended) ? ' WHERE e.extended = 1 ' : ' WHERE e.extended != 1 ';
//        if($events = $this->cache->get('events')){
//            return $events;
//        } else {
            $events = $this->db->query("SELECT e.*, etc.category_id FROM ". DB_PREFIX ."events e inner join ". DB_PREFIX ."event_to_category etc ON(e.event_id=etc.event_id) {$where} ORDER BY e.sort_order DESC, e.event_id ASC");
            if ($events->num_rows) {
//                $this->cache->set('events',$events->rows,2592000);
//                $this->cache->set('events',$events->rows,260);
                return $events->rows;
            }
//        }
        return false;
    }
}