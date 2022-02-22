<?php
class ControllerExtensionModuleSlideshow extends Controller {
	public function index($setting) {
	//	var_dump($setting);
		static $module = 0;		
		$this->load->model('design/banner');
		$this->load->model('tool/image');

		$this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');
		$this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');
		
		$this->load->language('extension/module/slideshow');
		$data['text_learn_more'] = $this->language->get('text_learn_more');
		$data['text_learn_more_alternate'] = $this->language->get('text_learn_more_alternate');

		$data['banners'] = array();

		$results = $this->model_design_banner->getBanner($setting['banner_id']);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
				$data['banners'][] = array(
					'title' => $result['title'],
					'link'  => $result['link'],
					'image' => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height'])
				);
			}
		}
		//var_dump($setting["banner_id"]); exit();
		if($setting["banner_id"] == 9){
			$data['module'] = 1;
		}else{
			$data['module'] = $module++;
		}
		

		return $this->load->view('extension/module/slideshow', $data);
	}
}
