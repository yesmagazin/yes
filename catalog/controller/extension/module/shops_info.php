<?php
class ControllerExtensionModuleShopsInfo extends Controller {
	public function index() {

		$this->load->language('extension/module/shop');
		
		$this->load->model('extension/module/shop');
		
		$this->load->model('tool/image');
		
		// Language
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_button'] = $this->language->get('text_button');
		$data['text_to_shop'] = $this->language->get('text_to_shop');

		$data['shops'] = array();
		$product_id = isset($this->request->get['product_id'])?$this->request->get['product_id']:null;
        $results = $product_id ? $this->model_extension_module_shop->getShopProduct($product_id) : $this->model_extension_module_shop->getAllShops();

		foreach ($results as $result) {
            if(!$result['status'])
                continue;
            if($result['shop_id'] == 33) continue;
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], 300, 150);
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', 300, 150);
			}
			
            /*
			if ($result['price']) {
				$price = $this->currency->format($result['price'], $this->session->data['currency']);
			} else {
				$price = false;
			}
            */
            
            preg_match('/^(?:https?:\/\/)?(?:[^@\/\n]+@)?(?:www\.)?([^:\/?\n]+)/',$result['url'],$matches);

            $href = $matches&&is_array($matches)?$matches:false;
            //var_dump($results);exit;
			$data['shops'][] = array(
				'model'       => $result['model'],
				'name'       => trim($result['name']),
				'href'       => $href,
				'price'       => $result['price'],
				'cond'       => trim($result['conditions']),
				'url'         => $product_id ? $result['url'] : $href[0],
                'status_price'=> $result['status_price'],
				'image'       => $image
			);
			
		}
		return $this->load->view('extension/module/shops_info', $data);
	}
}
