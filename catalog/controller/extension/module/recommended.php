<?php
class ControllerExtensionModuleRecommended extends Controller {
	public function index($setting) {

		$this->load->language('extension/module/recommended');
		
		$this->load->model('design/stikers');

		/*$data['heading_title'] = $this->language->get('heading_title');
		$data['text_tax'] = $this->language->get('text_tax');
		$data['text_more_new'] = $this->language->get('text_more_new');
		$data['text_more_special'] = $this->language->get('text_more_special');
		$data['button_details'] = $this->language->get('button_details');
		$data['button_buy'] = $this->language->get('button_buy');
		$data['button_wait'] = $this->language->get('button_wait');
		$data['button_quick_view'] = $this->language->get('button_quick_view');
        $data['button_preorder'] = $this->language->get('button_preorder');*/
        $data['text_hit'] = $this->language->get('text_hit');
        $data['text_new'] = $this->language->get('text_new');
        $data['text_model'] = $this->language->get('text_model');
        $data['text_where_to_buy'] = $this->language->get('text_where_to_buy');
        $data['href_wheretobuy'] = $this->url->link('information/information', 'information_id=3');
        $data['text_podrobnee'] = $this->language->get('text_podrobnee');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

        $language_id = (int)$this->config->get('config_language_id');

        $yesprice = ($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price');

		if(isset($setting['modules1']['status']) && $setting['modules1']['status'] && $this->config->get('config_promo_actions')) {
            $data['modules1'] = $setting['modules1'];
            $data['modules1']['title'] = $setting['modules1']['module_description'][$this->config->get('config_language_id')]['name'];
            var_dump($setting['modules1']['product']);
            if (isset($setting['modules1']['product'])) {
                $products = $setting['modules1']['product'];
            } else {
                $products = $this->model_catalog_product->getPromoProducts();
            }
            if (!empty($products)) {
                $modules1_product = array();
                foreach ($products as $product_id) {
                    $product_info = $this->model_catalog_product->getProduct($product_id);
                    if ($product_info) {
                        if ($product_info['image']) {
                            $image = $this->model_tool_image->resize($product_info['image'], 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'
                        } else {
                            $image = $this->model_tool_image->resize('placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                        }
                        if(empty($image)) {
                            $image = $this->model_tool_image->resize('placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                        }
                        if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
                            $price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                        } else {
                            $price = false;
                        }
                        if(utf8_strlen($product_info['name']) < 80){
                            $sub_name = $product_info['name'];
                        }else{
                            $sub_name = utf8_substr($product_info['name'], 0, 80) . '..';
                        }
                        $modules1_product[] = array(
                            'product_id'  => $product_info['product_id'],
                            'thumb'       => $image,
                            'name'        => $sub_name ,
                            'price'       => $price,
                            'stock_status_id'=> $product_info['stock_status_id'],
                            'href'        => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
                        );
                    }
                }
                $data['modules1']['product'] = $modules1_product;
            } else {
                $data['modules1']['product'] = array();
            }
        } else {
            $data['modules1'] = false;
        }

        if(isset($setting['modules2']['status']) && $setting['modules2']['status']) {
            $data['modules2'] = $setting['modules2'];
            $data['modules2']['title'] = $setting['modules2']['module_description'][$this->config->get('config_language_id')]['name'];
            if(!empty($data['modules2']['product'])) {
                $product_infos = $this->model_catalog_product->getHomeProductsByIDs($data['modules2']['product']);
                $prods = array();
                foreach($product_infos[1] as $product_id=>&$product){
                    $product['image'] = $this->model_tool_image->resize($product['image']?$product['image']:'placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    $product['href'] = $this->url->link('product/product', 'product_id=' . $product['product_id']);
                    $product_infos[2][$product_id]['image'] = $product_infos[3][$product_id]['image'] = $product['image'];
                    $product_infos[2][$product_id]['href']  = $product_infos[3][$product_id]['href']  = $product['href'];
                    $prod = $product;
                    $name = $product_infos[$language_id][$product_id]['name'];
                    $prod['name'] = utf8_strlen($name) > 80 ? utf8_substr($name, 0, 80).'..' : $name;
                    $prod['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod['price'], $prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                    $prods[] = $prod;
                }
                $this->cache->set('products2',$product_infos,86400);
                $data['modules2']['product'] = $prods;
            }/*elseif(($products2 = $this->cache->get('products2')) && isset($products2[$language_id])) {
                $prods = $products2[$language_id];
                foreach($prods as &$prod2){
                    $prod2['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod2['price'], $prod2['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                }
                $data['modules2']['product'] = $prods;
            }*/ elseif (($products2 = $this->model_catalog_product->getProductsIDsByStatusId(11)) && ($product_infos = $this->model_catalog_product->getHomeProductsByIDs($products2)) && isset($product_infos[$language_id])) {
                $prods = array();
                foreach($product_infos[1] as $product_id=>&$product){
                    $product['image'] = $this->model_tool_image->resize($product['image']?$product['image']:'placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    $product['href'] = $this->url->link('product/product', 'product_id=' . $product['product_id']);
                    $product_infos[2][$product_id]['image'] = $product_infos[3][$product_id]['image'] = $product['image'];
                    $product_infos[2][$product_id]['href']  = $product_infos[3][$product_id]['href']  = $product['href'];
                    $prod = $product;
                    $name = $product_infos[$language_id][$product_id]['name'];
                    $prod['name'] = utf8_strlen($name) > 80 ? utf8_substr($name, 0, 80).'..' : $name;
                    $prod['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod['price'], $prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                    $prods[] = $prod;
                }
                $this->cache->set('products2',$product_infos,86400);
                $data['modules2']['product'] = $prods;
            } else {
                $data['modules2']['product'] = array();
            }
        } else {
            $data['modules2'] = false;
        }

        if($setting['modules3']['status']) {
            $data['modules3']['title'] = $setting['modules3']['module_description'][$this->config->get('config_language_id')]['name'];

            if (isset($this->session->data['products_id'])) {
                $limit = 8;
                $result = array_reverse ($this->session->data['products_id']);
                foreach ($result as $result_id) {
                    if($result_id) {
                        if (!$limit) break;
                        $result = $this->model_catalog_product->getProduct($result_id);
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
                            $modules3_product[] = array(
                                'product_id' => $result['product_id'],
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
                            $limit--;
                        }
                    }
                }
                $data['modules3']['product'] = isset($modules3_product) ? $modules3_product : array();
            } else {
                $data['modules3']['product'] = array();
            }
        } else {
            $data['modules3'] = false;
        }

        if(isset($setting['modules4']['status']) && $setting['modules4']['status']) {
            $data['modules4'] = $setting['modules4'];
            $data['modules4']['title'] = $setting['modules4']['module_description'][$this->config->get('config_language_id')]['name'];
            if(!empty($data['modules4']['product'])) {
                $product_infos = $this->model_catalog_product->getHomeProductsByIDs($data['modules4']['product']);
                $prods = array();
                foreach($product_infos[1] as $product_id=>&$product){
                    $product['image'] = $this->model_tool_image->resize($product['image']?$product['image']:'placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    $product['href'] = $this->url->link('product/product', 'product_id=' . $product['product_id']);
                    $product_infos[2][$product_id]['image'] = $product_infos[3][$product_id]['image'] = $product['image'];
                    $product_infos[2][$product_id]['href']  = $product_infos[3][$product_id]['href']  = $product['href'];
                    $prod = $product;
                    $name = $product_infos[$language_id][$product_id]['name'];
                    $prod['name'] = utf8_strlen($name) > 80 ? utf8_substr($name, 0, 80).'..' : $name;
                    $prod['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod['price'], $prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                    $prods[] = $prod;
                }
                $this->cache->set('products2',$product_infos,86400);
                $data['modules4']['product'] = $prods;
            }elseif(($products4 = $this->cache->get('products4')) && isset($products4[$language_id])) {
                $prods = $products4[$language_id];
                foreach($prods as &$prod4){
                    $prod4['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod4['price'], $prod4['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                }
                $data['modules4']['product'] = $prods;
            } elseif (($products4 = $this->model_catalog_product->getProductsIDsByStatusId(6)) && ($product_infos = $this->model_catalog_product->getHomeProductsByIDs($products4)) && isset($product_infos[$language_id])) {
                $prods = array();
                foreach($product_infos[1] as $product_id=>&$product){
                    $product['image'] = $this->model_tool_image->resize($product['image']?$product['image']:'placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    $product['href'] = $this->url->link('product/product', 'product_id=' . $product['product_id']);
                    $product_infos[2][$product_id]['image'] = $product_infos[3][$product_id]['image'] = $product['image'];
                    $product_infos[2][$product_id]['href']  = $product_infos[3][$product_id]['href']  = $product['href'];
                    $prod = $product;
                    $name = $product_infos[$language_id][$product_id]['name'];
                    $prod['name'] = utf8_strlen($name) > 80 ? utf8_substr($name, 0, 80).'..' : $name;
                    $prod['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod['price'], $prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                    $prods[] = $prod;
                }
                $this->cache->set('products4',$product_infos,86400);
                $data['modules4']['product'] = $prods;
            } else {
                $data['modules4']['product'] = array();
            }
        } else {
            $data['modules4'] = false;
        }

        if(isset($setting['modules5']['status']) && $setting['modules5']['status']) {
            $data['modules5'] = $setting['modules5'];
            $data['modules5']['title'] = $setting['modules5']['module_description'][$this->config->get('config_language_id')]['name'];
            if(!empty($data['modules5']['product'])) {
                $product_infos = $this->model_catalog_product->getHomeProductsByIDs($data['modules5']['product']);
                $prods = array();
                foreach($product_infos[1] as $product_id=>&$product){
                    $product['image'] = $this->model_tool_image->resize($product['image']?$product['image']:'placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    $product['href'] = $this->url->link('product/product', 'product_id=' . $product['product_id']);
                    $product_infos[2][$product_id]['image'] = $product_infos[3][$product_id]['image'] = $product['image'];
                    $product_infos[2][$product_id]['href']  = $product_infos[3][$product_id]['href']  = $product['href'];
                    $prod = $product;
                    $name = $product_infos[$language_id][$product_id]['name'];
                    $prod['name'] = utf8_strlen($name) > 80 ? utf8_substr($name, 0, 80).'..' : $name;
                    $prod['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod['price'], $prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                    $prods[] = $prod;
                }
                $this->cache->set('products2',$product_infos,86400);
                $data['modules5']['product'] = $prods;
            }elseif(($products5 = $this->cache->get('products5')) && isset($products5[$language_id])) {
                $prods = $products5[$language_id];
                foreach($prods as &$prod5){
                    $prod5['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod5['price'], $prod5['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                }
                $data['modules5']['product'] = $prods;
            } elseif (($products5 = $this->model_catalog_product->getProductsIDsByStatusId(12)) && ($product_infos = $this->model_catalog_product->getHomeProductsByIDs($products5)) && isset($product_infos[$language_id])) {
                $prods = array();
                foreach($product_infos[1] as $product_id=>&$product){
                    $product['image'] = $this->model_tool_image->resize($product['image']?$product['image']:'placeholder.png', 248, 248); //$this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height')
                    $product['href'] = $this->url->link('product/product', 'product_id=' . $product['product_id']);
                    $product_infos[2][$product_id]['image'] = $product_infos[3][$product_id]['image'] = $product['image'];
                    $product_infos[2][$product_id]['href']  = $product_infos[3][$product_id]['href']  = $product['href'];
                    $prod = $product;
                    $name = $product_infos[$language_id][$product_id]['name'];
                    $prod['name'] = utf8_strlen($name) > 80 ? utf8_substr($name, 0, 80).'..' : $name;
                    $prod['price'] = $yesprice ? $this->currency->format($this->tax->calculate($prod['price'], $prod['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn')) : false;
                    $prods[] = $prod;
                }
                $this->cache->set('products5',$product_infos,86400);
                $data['modules5']['product'] = $prods;
            } else {
                $data['modules5'] = array();
            }
        } else {
            $data['modules5'] = false;
        }

        return $this->load->view('extension/module/recommended', $data);
	}
}
