<?php

class ControllerExtensionModuleMatrositeLooked extends Controller {
	public function index() {
		
		$this->load->language('extension/module/matrosite/looked');
        $this->load->language('product/category');
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_tax'] = $this->language->get('text_tax');
		$data['button_cart'] = $this->language->get('button_cart');
		$data['button_wishlist'] = $this->language->get('button_wishlist');
		$data['button_compare'] = $this->language->get('button_compare');
		
		$this->load->model('setting/setting');
		
		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		$this->load->model('design/stikers');
		
		$setting = $this->model_setting_setting->getSetting('matrosite_looked');
		
		if ( !isset($setting['matrosite_looked_limit']) ) {
			$setting['matrosite_looked_limit'] = 4;
		}
		
		if ( (int)$setting['matrosite_looked_status'] == 1 ) {
			
			$data['heading_title'] = $this->language->get('matrosite_looked_title');
			
			if (isset($this->session->data['matrosite']['looked'])) {
				$products = $this->session->data['matrosite']['looked'];
			} else {
				$products = array();
			}
			
			if (isset($this->request->get['product_id'])) {
				
				$isset = false; // Флаг присутствия текущего товара в списке
			
				foreach($products as $key => $product_id){
					if ($product_id == $this->request->get['product_id']) {
						$isset = true;
						unset($products[$key]);
					}
				}
				
				if (!$isset) {
					$this->session->data['matrosite']['looked'][] = $this->request->get['product_id'];
				}
				
				// Удаляем излишки
				if (count($this->session->data['matrosite']['looked']) > (int)$setting['matrosite_looked_limit']) {
					$iteration = count($this->session->data['matrosite']['looked']) - (int)$setting['matrosite_looked_limit'];
					for ($i=0; $i<$iteration; $i++){
						array_shift($this->session->data['matrosite']['looked']);
					}
				}
			
			}
			
			$data['products'] = array();
			foreach(array_reverse($products) as $key => $product_id){
                $result = $this->model_catalog_product->getProduct($product_id);
                if($result) {

                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    }
                    if(empty($image)) {
                        $image = $this->model_tool_image->resize('placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    }

                    if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
                        $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $price = false;
                    }

                    if ((float)$result['special']) {
                        $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $special = false;
                    }

                    if ($this->config->get('config_tax')) {
                        $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
                    } else {
                        $tax = false;
                    }

                    $product_stickers = array();

                    if (isset($result['product_stickers']) && $result['product_stickers']) {
                        $p_stickers = str_replace('&quot;', '"', $result['product_stickers']);
                        $stickers = unserialize($p_stickers);
                    } else {
                        $stickers = array();
                    }

                    if ($stickers) {
                        foreach ($stickers as $product_sticker_id) {
                            $sticker_info = $this->model_design_stikers->getProductSticker($product_sticker_id);

                            if ($sticker_info) {
                                $product_stickers[] = array(
                                    'text' => $sticker_info['text'],
                                    'color' => $sticker_info['color'],
                                    'background' => $sticker_info['background']
                                );
                            }
                        }

                        $sticker_sort_order = array();

                        foreach ($stickers as $key => $product_sticker_id) {
                            $sticker_info = $this->model_design_stikers->getProductSticker($product_sticker_id);

                            if ($sticker_info) {
                                $sticker_sort_order[$key] = $sticker_info['sort_order'];
                            }
                        }

                        array_multisort($sticker_sort_order, SORT_ASC, $product_stickers);
                    }


                    if ($this->config->get('config_review_status')) {
                        $rating = $result['rating'];
                    } else {
                        $rating = false;
                    }
                    if (utf8_strlen($result['name']) < 80) {
                        $sub_name = $result['name'];
                    } else {
                        $sub_name = utf8_substr($result['name'], 0, 80) . '..';
                    }
                    $data['products'][] = array(
                        'product_id' => $result['product_id'],
                        'sku' => $result['model'],
                        'thumb' => $image,
                        'name' => $sub_name,
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
                        'price' => $price,
                        'special' => $special,
                        'tax' => $tax,
                        'rating' => $rating,
                        'stock_status' => $result['stock_status'],
                        'stock_status_id' => $result['stock_status_id'],
                        'href' => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                        'product_stickers' => $product_stickers
                    );
                }
			}
			
			$data['count'] = count($data['products']);
            $data['text_model'] = $this->language->get('text_model');
            $data['text_price'] = $this->language->get('text_price');
            $data['text_open_product'] = $this->language->get('text_open_product');
            $data['text_wheretobuy'] = $this->language->get('text_wheretobuy');
			
			if ($data['products']) {
				return $this->load->view('extension/module/matrosite_looked', $data);
			}
		
		}
	}
}