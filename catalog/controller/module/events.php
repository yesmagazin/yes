<?php
class ControllerModuleEvents extends Controller {
	public function index() {
		$this->load->language('module/events');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_contact'] = $this->language->get('text_contact');
		$data['text_sitemap'] = $this->language->get('text_sitemap');
		$data['select_your_nearest_store'] = $this->language->get('select_your_nearest_store');


	

		$data['categories'] = array();

	$categories=$this->db->query("select * from ". DB_PREFIX ."event_categories where language_id=" . (int)$this->config->get('config_language_id') . " order by sortorder,category_name");
		if($categories->num_rows){
			$data['categories']=$categories->rows;
		}
		
		$data['events']=array();
		
		$events=$this->db->query("SELECT * FROM ". DB_PREFIX ."events where 1 limit 5");
		
		if($events->num_rows){
			
			$data['events']=$events->rows;
		}
		

		$data['contact'] = $this->url->link('events/contact');
		$data['sitemap'] = $this->url->link('events/sitemap');

		return $this->load->view('module/events', $data);
	}
}