<?php
class ControllerProductCompare extends Controller {
	public function index() {
		$this->load->language('product/compare');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (!isset($this->session->data['compare'])) {
			$this->session->data['compare'] = array();
		}
        $language_id = (int)$this->config->get('config_language_id');


		if (isset($this->request->get['remove_all'])) {
            if(isset($this->session->data['compare']))
            unset($this->session->data['compare']);

            $this->session->data['success'] = $this->language->get('text_remove');

			$this->response->redirect($this->url->link('product/compare'));
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('product/compare')
		);

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_product'] = $this->language->get('text_product');
		$data['text_name'] = $this->language->get('text_name');
		$data['text_image'] = $this->language->get('text_image');
		$data['text_price'] = $this->language->get('text_price');
		$data['text_model'] = $this->language->get('text_model');
		$data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$data['text_availability'] = $this->language->get('text_availability');
		$data['text_rating'] = $this->language->get('text_rating');
		$data['text_summary'] = $this->language->get('text_summary');
		$data['text_weight'] = $this->language->get('text_weight');
		$data['text_dimension'] = $this->language->get('text_dimension');
		$data['text_empty'] = $this->language->get('text_empty');
		$data['text_clear'] = $this->language->get('text_clear');
		$data['text_article'] = $this->language->get('text_article');
		$data['text_no_products'] = $this->language->get('text_no_products');

        $data['text_where_to_buy_button'] = $this->language->get('text_where_to_buy_button');
        $data['text_show_shops'] = $this->language->get('text_show_shops');
        $data['text_can_buy'] = $this->language->get('text_can_buy');

		$data['button_continue'] = $this->language->get('button_continue');
		$data['button_cart'] = $this->language->get('button_cart');
		$data['button_remove'] = $this->language->get('button_remove');

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['review_status'] = $this->config->get('config_review_status');

		$data['products'] = array();

		$data['all_attributes'] = array();


		if(isset($this->session->data['compare']) && is_array($this->session->data['compare']) && ($product_infos = $this->model_catalog_product->getProductsByIDs($this->session->data['compare']))){

            $data['all_attributes'] = $this->model_catalog_product->getProductAttributesMod($this->session->data['compare'],$language_id);
            $products_attributes = $this->model_catalog_product->getAllProductAttributesMod($this->session->data['compare'],$language_id);
            $langstr = array(
                'n' => 0,
                'n1' => $this->language->get('r1'),
                'n2' => $this->language->get('r2'),
                'n5' => $this->language->get('r5')
            );
            foreach ($product_infos as $key => $product_info) {

                $product_id = (int)$product_info['product_id'];
                if ($product_info['image']) {
                    $image = $this->model_tool_image->resize($product_info['image'], $this->config->get($this->config->get('config_theme') . '_image_compare_width'), $this->config->get($this->config->get('config_theme') . '_image_compare_height'));
                } else {
                    $image = false;
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn'));
                } else {
                    $price = false;
                }
                $langstr['n'] = $product_info['reviews'];
                $data['products'][$product_id] = array(
                    'product_id'   => $product_info['product_id'],
                    'name'         => $product_info['name'],
                    'thumb'        => $image,
                    'price'        => $price,
                    'model'        => $product_info['model'],
                    'rating'       => (int)$product_info['rating'],
                    'reviews'      => $product_info['reviews'].'&nbsp;'.$this->language->calcTrueEnd($langstr),
                    'weight'       => $this->weight->format($product_info['weight'], $product_info['weight_class_id']),
                    'length'       => $this->length->format($product_info['length'], $product_info['length_class_id']),
                    'width'        => $this->length->format($product_info['width'], $product_info['length_class_id']),
                    'height'       => $this->length->format($product_info['height'], $product_info['length_class_id']),
                    'attributes'   => isset($products_attributes[$product_id]) ? $products_attributes[$product_id] : array(),
                    'href'         => $this->url->link('product/product', 'product_id=' . $product_id),
                    'remove'       => $this->url->link('product/compare', 'remove=' . $product_id)
                );
            }
        }

		$data['remove_all'] = $this->url->link('product/compare', 'remove_all=true');
		$data['continue'] = $this->url->link('common/home');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('product/compare', $data));
	}

	public function add() {
		$this->load->language('product/compare');
		$json = array();
		if (!isset($this->session->data['compare'])) {
			$this->session->data['compare'] = array();
		}
		if (isset($this->request->post['product_id']) && ($product_id = (int)$this->request->post['product_id'])) {
            $this->load->model('catalog/product');
            if (!in_array($this->request->post['product_id'], $this->session->data['compare'])) {
                if (count($this->session->data['compare']) >= 3) {
                    array_shift($this->session->data['compare']);
                }
                $product_info = $this->model_catalog_product->getProduct($product_id);
                if ($product_info) {
                    $this->session->data['compare'][] = $product_id;
                    $json['success'] = sprintf($this->language->get('text_success'), $this->url->link('product/product', 'product_id=' . $product_id), $product_info['name'], $this->url->link('product/compare'));
                    $json['total'] = (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0);
                } else {
                    $json['error'] = true;
                    $json['str'] = $this->language->get('comp_err_product');
                }
            }
		} else {
            $json['error'] = true;
            $json['str'] = $this->language->get('comp_err_wrong');
        }
        $this->response->jsonOutput($json);
	}

	public function remove() {
		$this->load->language('product/compare');
		$json = array();
        $json['success'] = $json['error'] = false;
		if (!isset($this->session->data['compare'])) {
			$this->session->data['compare'] = array();
		}
		if (isset($this->request->post['product_id']) && ($product_id = (int)$this->request->post['product_id'])) {
            $ref = false;
            $key = array_search($product_id, $this->session->data['compare']);
            if ($key !== false) {
                unset($this->session->data['compare'][$key]);
                $cnt = count($this->session->data['compare']);
                if($cnt==0 && isset($this->request->post['ref']) && ($referrer = $this->request->post['ref'])){
                    if(strpos($referrer,'compare')){
                        $this->load->model('catalog/product');
                        $ref = $this->model_catalog_product->getProductCategoryRef($product_id);
                    } else {
                        $ref = $referrer;
                    }
                }
                $json['cnt'] = $cnt;
                $json['ref'] = $ref;
                $json['success'] = true;
            } else {
                $cnt = isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0;
                $json['cnt'] = $cnt;
                $json['str'] = $this->language->get('comp_err_noproduct').(!$cnt?' '.$this->language->get('comp_err_nothing'):'');
                $json['pid'] = $product_id;
                $json['error'] = true;
            }
		} else {
            $json['cnt'] = isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0;
            $json['error'] = true;
            $json['pid'] = false;
            $json['str'] = $this->language->get('comp_err_wrong');
        }
		$this->response->jsonOutput($json);
	}

	public function removeall() {
		$this->load->language('product/compare');
		$json = array();
		$json['success'] = $json['error'] = false;
		if (!isset($this->session->data['compare'])) {
			$this->session->data['compare'] = array();
            $json['error'] = true;
            $json['str'] = $this->language->get('comp_err_nothing');
		} else {
            $product_id = array_pop($this->session->data['compare']);
            $json['success'] = true;
            $ref = false;
            unset($this->session->data['compare']);
            if (isset($this->request->post['ref']) && ($referrer = $this->request->post['ref'])){
                if(strpos($referrer,'compare')){
                    $this->load->model('catalog/product');
                    $ref = $this->model_catalog_product->getProductCategoryRef($product_id);
                } else {
                    $ref = $referrer;
                }
            }
            $json['ref'] = $ref;
        }
        $this->response->jsonOutput($json);
	}
}
