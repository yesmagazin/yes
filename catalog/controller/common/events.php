<?php
class ControllerCommonEvents extends Controller {
	public function index() {
		//$this->document->setTitle($this->config->get('config_meta_title'));
		//$this->document->setDescription($this->config->get('config_meta_description'));
		//$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink(HTTP_SERVER, 'canonical');
		}

        $this->load->model('catalog/events');
		$this->load->language('module/events');

		$data['select_your_nearest_store'] = $this->language->get('select_your_nearest_store');
		$data['WHERE_CAN_I_BUY'] = $this->language->get('WHERE_CAN_I_BUY');
		$data['buy_online'] = $this->language->get('buy_online');
		$data['buy_online_title'] = $this->language->get('buy_online_title');
		$data['not_chosen'] = $this->language->get('not_chosen');
		$data['text_choose'] = $this->language->get('text_choose');

        $extended = false;
        if (in_array($this->request->get['product_id'], array(558874, 558875, 558876, 558877, 558878, 558879, 558880, 558881)) || (int)$this->request->get['information_id'] == 23) {
            $extended = true;
        }

        $data['categories'] = $this->model_catalog_events->getEventsCategories($extended);
		$data['events'] = $this->model_catalog_events->getEvents($extended);
        if(isset($this->request->cookie['popup_city']) && $this->request->cookie['popup_city']){
            $data['user_city'] = (int)$this->request->cookie['popup_city'];
        } else {
//            $data['user_city'] = 0;
            $data['user_city'] = 1; //Дніпро
        }
		//$data['column_left'] = $this->load->controller('common/column_left');
		//$data['column_right'] = $this->load->controller('common/column_right');
		//$data['content_top'] = $this->load->controller('common/content_top');
		//$data['content_bottom'] = $this->load->controller('common/content_bottom');
		//$data['footer'] = $this->load->controller('common/footer');
		//$data['header'] = $this->load->controller('common/header');
        $this->document->addScript('catalog/view/javascript/jquery.tekmap.0.7.js');
		return $this->load->view('common/events', $data);
	}
}