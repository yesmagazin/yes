<?php
class ControllerProductProduct extends Controller {
	private $error = array();

	public function index() {

        $language_id = (int)$this->config->get('config_language_id');

		$this->load->language('product/product');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$this->load->model('catalog/category');
        $this->load->model('actnew/category');
//        $this->load->model('actnew/article');

        $rootPath = '';
        $rpi = 0;
		if (isset($this->request->get['path'])) {
			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);
            if (empty($parts) && $category_id) {
                $rootPath = $category_id;
                $rpi++;
            }
			foreach ($parts as $path_id) {
				if (!$path) {
					$path = $path_id;
				} else {
					$path .= '_' . $path_id;
				}


				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
                    if (++$rpi === 1) {
                        $rootPath = $path;
                    }
					$data['breadcrumbs'][] = array(
						'text' => trim($category_info['name']),
						'href' => $this->url->link('product/category', 'path=' . $path)
					);
				}
			}

			// Set the last category breadcrumb
			$category_info = $this->model_catalog_category->getCategory($category_id);
            $data['product_cat'] = '';
			if ($category_info) {
				$url = '';

				if (isset($this->request->get['sort'])) {
					$url .= '&sort=' . $this->request->get['sort'];
				}

				if (isset($this->request->get['order'])) {
					$url .= '&order=' . $this->request->get['order'];
				}

				if (isset($this->request->get['page'])) {
					$url .= '&page=' . $this->request->get['page'];
				}

				if (isset($this->request->get['limit'])) {
					$url .= '&limit=' . $this->request->get['limit'];
				}

				$data['product_cat'] = trim($category_info['name']);
				$data['breadcrumbs'][] = array(
					'text' => $category_info['name'],
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url)
				);
			}
		}

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->get['manufacturer_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_brand'),
				'href' => $this->url->link('product/manufacturer')
			);

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($this->request->get['manufacturer_id']);

			if ($manufacturer_info) {
				$data['breadcrumbs'][] = array(
					'text' => $manufacturer_info['name'],
					'href' => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . $url)
				);
			}
		}
		
										/***/
		$this->load->model('catalog/category');


		$data['categories'] = array();
		$data['load_reviews'] = $this->review();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);

					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}

				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}
        /***/

		if (isset($this->request->get['search']) || isset($this->request->get['tag'])) {
			$url = '';

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_search'),
				'href' => $this->url->link('product/search', $url)
			);
		}

		if (isset($this->request->get['product_id'])) {
			$product_id = (int)$this->request->get['product_id'];
		} else {
			$product_id = 0;
		}

		$this->load->model('catalog/product');

		$product_info = $this->model_catalog_product->getProduct($product_id);

        $have_360 = false;
		if ($product_info) {
			$url = '';
///!!!zzz2020-04-06
            $reel_count = 0;
            $reel_zoomimages = '';
            $reel_dir = DIR_IMAGE . '360/' . $product_id;
            if (file_exists($reel_dir) && is_dir($reel_dir)) {
                $a = glob($reel_dir . '/image_*.jpg');
                if (count($a) > 0) {
                    $have_360 = true;
                    preg_match('/image_(.*)\.jpg/', $a[0], $aa);
                    $reel_first = $aa[1];
                    unset($aa);
                    $reel_count = count($a);
                    $a = glob($reel_dir . '/zoom_image_*.jpg');
                    $reel_zoomimages = "'" . implode("','", $a) . "'";
                    $reel_zoomimages = str_replace(DIR_ROOT, '/', $reel_zoomimages);
                    $reel_images = str_replace('/zoom_image_', '/image_', $reel_zoomimages);
                }
            }

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $product_info['name'],
				'href' => $this->url->link('product/product', $url . '&product_id=' . $this->request->get['product_id'])
			);

            if ($product_info['meta_title']) {
                $this->document->setTitle($product_info['meta_title']);
            } elseif ($meta_title_prod = $this->config->get('config_meta_title_prod')) {
                $rep = array(
                    '{name}' => $product_info['name'],
                    '{code}' => $product_info['model']
                );
                $this->document->setTitle(strtr($meta_title_prod,$rep));
            } else {
                $this->document->setTitle($product_info['name'] . ', ' . $product_info['model']);
            }

            if ($product_info['meta_description']) {
                $this->document->setDescription($product_info['meta_description']);
            } elseif ($meta_description_prod = $this->config->get('config_meta_description_prod')) {
                $rep = array(
                    '{name}' => $product_info['name'],
                    '{code}' => $product_info['model'],
                    '{blockprice}' => $product_info['price'] > 0 ? $this->config->get('config_po_cene') : $this->config->get('config_po_cene_empty')
                );
                $prc = $product_info['price'] > 0 ? number_format($product_info['price'],2,'.','') : '';
                $this->document->setDescription(str_replace('{price}',$prc,strtr($meta_description_prod,$rep)));
            } else {
                $this->document->setDescription($product_info['name']);
            }

            if ($product_info['meta_keyword']) {
                $this->document->setKeywords($product_info['meta_keyword']);
            } elseif ($meta_keyword_prod = $this->config->get('config_meta_keyword_prod')) {
                $rep = array(
                    '{name}' => $product_info['name'],
                    '{code}' => $product_info['model'],
                    '{blockprice}' => $product_info['price'] > 0 ? $this->config->get('config_po_cene') : $this->config->get('config_po_cene_empty')
                );
                $prc = $product_info['price'] > 0 ? number_format($product_info['price'],2,'.','') : '';
                $this->document->setKeywords(str_replace('{price}',$prc,strtr($meta_keyword_prod,$rep)));
            }

			$this->document->addLink($this->url->link('product/product', 'product_id=' . $this->request->get['product_id']), 'canonical');
			$this->document->addScript('catalog/view/javascript/share.js');
            if ($have_360) {
                $this->document->addScript('/catalog/view/javascript/jquery/jquery-ui.custom.min.js');
                $this->document->addScript('/catalog/view/javascript/jquery/jquery.reel.withzoom.js');
                $this->document->addScript('/catalog/view/javascript/jquery/jquery.mousewheel.min.js');
            }
            $this->document->addScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyBbr0ysJ3IvHiPJ3fPX5ZfnKyEJSPDtxpw'); //AIzaSyBIvy5GA_NXbZ1HqYlGbIjrNKnM8vzBT20
            $this->document->addScript('https://www.google.com/recaptcha/api.js');
			$this->document->addScript('catalog/view/javascript/jquery.tekmap.0.7.js');
            $this->document->addStyle('catalog/view/theme/new/stylesheet/chosen/chosen.min.css');
            $this->document->addScript('catalog/view/javascript/jquery/chosen.jquery.min.js?v1');
            $this->document->addScript('catalog/view/javascript/jquery/jquery.scrollTo.min.js');

			if ($product_info['meta_h1']) {
				$data['heading_title'] = $product_info['meta_h1'];
			} else {
                $data['heading_title'] = $product_info['name']; //.' '.$product_info['sku']
			}

			$data['text_select'] = $this->language->get('text_select');
			$data['text_more'] = $this->language->get('text_more');
			$data['to_compare'] = $this->language->get('to_compare');
			$data['text_promo_link'] = $this->language->get('text_promo_link');
			$data['text_promo_link_but'] = $this->language->get('text_promo_link_but');
			$data['promoActive'] = (in_array($category_id, array(2,169,12,4,3,23,175,179,178,210))) ? true : false;
			$data['text_total_reviews'] = $this->language->get('text_total_reviews');
			$data['text_article'] = $this->language->get('text_article');
			$data['text_ask'] = $this->language->get('text_ask');
			$data['text_share'] = $this->language->get('text_share');
			$data['text_to_buy'] = $this->language->get('text_to_buy');
			$data['text_buy'] = $this->language->get('text_buy');
			$data['text_manufacturer'] = $this->language->get('text_manufacturer');
			$data['text_model'] = $this->language->get('text_model');
			$data['text_reward'] = $this->language->get('text_reward');
			$data['text_show_setka'] = $this->language->get('text_show_setka');
			$data['text_points'] = $this->language->get('text_points');
			$data['text_stock'] = $this->language->get('text_stock');
			$data['text_discount'] = $this->language->get('text_discount');
			$data['text_tax'] = $this->language->get('text_tax');
			$data['text_option'] = $this->language->get('text_option');
			$data['text_minimum'] = sprintf($this->language->get('text_minimum'), $product_info['minimum']);
			$data['text_write'] = $this->language->get('text_write');
			$data['text_login'] = sprintf($this->language->get('text_login'), $this->url->link('account/login', '', true), $this->url->link('account/register', '', true));
			$data['text_note'] = $this->language->get('text_note');
			$data['text_tags'] = $this->language->get('text_tags');
			$data['text_related'] = $this->language->get('text_related');
			$data['text_related_hit'] = $this->language->get('text_related_hit');
			$data['text_payment_recurring'] = $this->language->get('text_payment_recurring');
			$data['text_loading'] = $this->language->get('text_loading');
			$data['text_stores'] = $this->language->get('text_stores');
			$data['text_info'] = $this->language->get('text_info');
			$data['text_all'] = $this->language->get('text_all');
			$data['text_conditions'] = $this->language->get('text_conditions');

			$data['entry_qty'] = $this->language->get('entry_qty');
			$data['entry_name'] = $this->language->get('entry_name');
			$data['entry_review'] = $this->language->get('entry_review');
			$data['entry_rating'] = $this->language->get('entry_rating');
			$data['entry_good'] = $this->language->get('entry_good');
			$data['entry_bad'] = $this->language->get('entry_bad');
			$data['placeholder_name'] = $this->language->get('placeholder_name');
			$data['placeholder_review'] = $this->language->get('placeholder_review');

			$data['button_cart'] = $this->language->get('button_cart');
			$data['button_wishlist'] = $this->language->get('button_wishlist');
			$data['button_compare'] = $this->language->get('button_compare');
			$data['button_compare_in'] = $this->language->get('button_compare_in');
			$data['button_upload'] = $this->language->get('button_upload');
			$data['button_continue'] = $this->language->get('button_continue');
            $data['buy_online'] = $this->language->get('buy_online');
            $data['button_write'] = $this->language->get('button_write');
			$this->load->model('catalog/review');

			$data['tab_description'] = $this->language->get('tab_description');
			$data['tab_attribute'] = $this->language->get('tab_attribute');
			$data['tab_online'] = $this->language->get('tab_online');
			$data['tab_offline'] = $this->language->get('tab_offline');
			$data['tab_review'] = $this->language->get('tab_review');
			$data['another_color'] = $this->language->get('another_color');
            $data['tab_video_review'] = $this->language->get('tab_video_review');
            $data['tab_infografika'] = $this->language->get('tab_infografika');
            $data['video'] = $product_info['video'] ? str_replace('watch?v=','embed/', $product_info['video']) : false;

            $data['product_id'] = (int)$this->request->get['product_id'];
            $data['isBackpack'] = $this->model_catalog_product->isBackpack($product_id);
            $data['old_price_backpack'] = $this->language->get('old_price_backpack');
            $data['buy_discount_backpack'] = $this->language->get('buy_discount_backpack');
            $data['text_from'] = $this->language->get('text_from');

            /**
             * Alternate colors
             */
            $alternate = array();
            switch ( $product_id ) {
                case 558875 : $alternate[] = [ 'id' => 558874, 'color' => 'light', 'link' => $this->url->link('product/product', 'path=&product_id=558874' ), 'color_entry' => $this->language->get('color_light') ]; break;
                case 558874 : $alternate[] = [ 'id' => 558875, 'color' => 'dark', 'link' => $this->url->link('product/product', 'path=&product_id=558875' ), 'color_entry' => $this->language->get('color_dark') ]; break;
                case 558876 : $alternate[] = [ 'id' => 558877, 'color' => 'dark', 'link' => $this->url->link('product/product', 'path=&product_id=558877' ), 'color_entry' => $this->language->get('color_dark') ]; break;
                case 558877 : $alternate[] = [ 'id' => 558876, 'color' => 'light', 'link' => $this->url->link('product/product', 'path=&product_id=558876' ), 'color_entry' => $this->language->get('color_light') ]; break;
                case 558878 : $alternate[] = [ 'id' => 558879, 'color' => 'dark', 'link' => $this->url->link('product/product', 'path=&product_id=558879' ), 'color_entry' => $this->language->get('color_dark') ]; break;
                case 558879 : $alternate[] = [ 'id' => 558878, 'color' => 'light', 'link' => $this->url->link('product/product', 'path=&product_id=558878' ), 'color_entry' => $this->language->get('color_light') ]; break;
            }

            $data['alternate'] = $alternate;


            /**
             * Check if product is designed by Andre Tan
             */
            $byAndre = false;
            if ( in_array( $product_id, $this->model_catalog_product->productsByAndreTan() ) ) {
                $byAndre = true;
            }
            $data['byAndre'] = $byAndre;

        $product_cats = $this->model_catalog_product->getCategories($product_id);
        $productz_catz = array();
        foreach ($product_cats as $zzz) {
            $productz_catz[] = $zzz['category_id'];
        }
        $data['category_idz'] = $productz_catz;
        $data['language_code'] = substr($this->session->data['language'], 0, 2);

			$data['manufacturer'] = $product_info['manufacturer'];
			$data['manufacturers'] = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id']);
			$data['url_compare'] = $this->url->link('product/compare', '', true);
			$data['cnt_compare'] = isset($this->session->data['compare'])&&is_array($this->session->data['compare']) ? count($this->session->data['compare']) : 0;
			$data['in_compare'] = isset($this->session->data['compare'])&&is_array($this->session->data['compare'])&&in_array($product_id,$this->session->data['compare']);
			$data['model'] = $product_info['model'];
			$data['sku'] = $product_info['sku'];
			$data['reward'] = $product_info['reward'];
			$data['points'] = $product_info['points'];
			$data['description'] = html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8');

            $actionPrices = $this->load->controller('product/product/actionPrices');
            if ( $actionPrices && is_array( $actionPrices ) && ! empty( $actionPrices[ $product_info['model'] ] ) ) {
                $data['newPriceAction'] = $actionPrices[ $product_info['model'] ];
            }
//            var_dump($actionPrices[ $product_info['model'] ]);
//            var_dump($product_info['model']);

			if ($product_info['quantity'] <= 0) {
				$data['stock'] = $product_info['stock_status'];
			} elseif ($this->config->get('config_stock_display')) {
				$data['stock'] = $product_info['quantity'];
			} else {
				$data['stock'] = $this->language->get('text_instock');
			}

            //$stock_statuses = $this->model_catalog_product->getProductStockStatuses();
            $stock_statuses = $this->model_catalog_product->getProductStockStatuses($language_id);
//            var_dump($stock_statuses);
            $a_statuses = array(11,12,21);
            //$data['stock'] = $stock_statuses[$product_info['stock_status_id']][$language_id];
            $data['product_url'] = $this->url->link('product/product', 'product_id=' . $product_info['product_id']);
            $statusID = ( in_array($product_info['stock_status_id'], $a_statuses) ) ? 7 : $product_info['stock_status_id'];
            //var_dump((int) $product_info['price']);
            if ( (int) $product_info['price'] < 1 ) {
                $statusID = 5;
                $product_info['stock_status_id'] = 5;
            }
            if ( $statusID == 23 ) {
                $statusID = 7;
            }
            $data['current_status'] = ( !empty($stock_statuses[$statusID]) ) ? $stock_statuses[$statusID] : '';
            $data['current_status_id'] = $product_info['stock_status_id'];
            $data['text_availability'] = $this->language->get('text_stock');
			$this->load->model('tool/image');


///!!!actnew module from newsblog
if (!empty($product_info['upc'])) {
//    $actnew_info_article = $this->model_actnew_article->getArticleBySeourl($product_info['upc']);
    $actnew_info = $this->model_actnew_category->getCategoryBySeourl($product_info['upc']);
//    $actnew_info_category = $this->model_actnew_category->getCategoryBySeourl($product_info['upc']);
//    logg($product_info['upc'], $actnew_info);
    if ($actnew_info) {
        $set = unserialize($actnew_info['settings']);
        $data['actnew_sticker'] = $this->model_tool_image->resize($actnew_info['image'], $set['image_size_width'], $set['image_size_height']);
        $data['actnew_label'] = $actnew_info['name'];
        $data['actnew_link'] = '/action/' . $product_info['upc'] . '/';
    }
}
///
            if ($product_info['image']) {
				$data['popupf'] = 'https://yes-tm.com/image/'.$product_info['image'];
				$data['popup'] = $this->model_tool_image->resize($product_info['image'], $this->config->get($this->config->get('config_theme') . '_image_popup_width'), $this->config->get($this->config->get('config_theme') . '_image_popup_height'));
			} else {
				$data['popup'] = '';
			}

			if ($product_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($product_info['image'], $this->config->get($this->config->get('config_theme') . '_image_thumb_width'), $this->config->get($this->config->get('config_theme') . '_image_thumb_height'));
				$this->document->setOgImage($data['thumb']);
			} else {
				$data['thumb'] = '';
			}

            if($product_info['infografika']){
                $data['infografika_thumb'] = $this->model_tool_image->resize($product_info['infografika'], 500, 281);;
                $data['infografika_big'] = $this->model_tool_image->resize($product_info['infografika'], 1600, 900);;
            } else {
                $data['infografika_thumb'] = $data['infografika_big'] = false;
            }

			$data['images'] = array();

			$results = $this->model_catalog_product->getProductImages($this->request->get['product_id']);

			foreach ($results as $result) {
			    $popupTemp = $this->model_tool_image->resize($result['image'], $this->config->get($this->config->get('config_theme') . '_image_popup_width'), $this->config->get($this->config->get('config_theme') . '_image_popup_height'));
			    $thumbTemp = $this->model_tool_image->resize($result['image'], $this->config->get($this->config->get('config_theme') . '_image_additional_width'), $this->config->get($this->config->get('config_theme') . '_image_additional_height'));

			    // TODO: Костыль. Нужно разобраться почему вставляется абсолютный путь к картинке
			    if ( strpos( $popupTemp, '/var/www/top/data/www/yes-tm.com/image' ) !== false || strpos( $thumbTemp, '/var/www/top/data/www/yes-tm.com/image' ) !== false ) {
			        continue;
                }

				$data['images'][] = array(
					'popupf'  => 'https://yes-tm.com/image/'.$result['image'],
					'popup' => $popupTemp,
					'thumb' => $thumbTemp
				);
			}
            $data['price_old'] = (int)$product_info['price'];
            $data['priceValidUntil'] = date('Y-m-d H:i:s',strtotime('+ 1 year'));
			if ($product_info['price'] > 0 && ($this->customer->isLogged() || !$this->config->get('config_customer_price'))) {
				$data['price'] = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn'));
			} else {
				$data['price'] = 0;
			}

			if (isset($product_info['special']) && (float)$product_info['special'] > 0 && ($this->customer->isLogged() || !$this->config->get('config_customer_price'))) {
				$data['price_special'] = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn'));
			} else {
				$data['price_special'] = 0;
			}

			$data['review_status'] = $this->config->get('config_review_status');

			$data['reviews'] = (int)$product_info['reviews'];
			$data['rating'] = (int)$product_info['rating'];
			$data['related'] = array();

			$rel_prods = isset($category_id)? $this->model_catalog_product->getProductRelatedMod($category_id): array();
			foreach($rel_prods as $product){
			    if ($product['image']) {
					$image = $this->model_tool_image->resize($product['image'], 248, 248); // $this->config->get($this->config->get('config_theme') . '_image_related_width'), $this->config->get($this->config->get('config_theme') . '_image_related_height')
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', 248, 248); // $this->config->get($this->config->get('config_theme') . '_image_related_width'), $this->config->get($this->config->get('config_theme') . '_image_related_height')
				}

				if ($product['price'] > 0 && ($this->customer->isLogged() || !$this->config->get('config_customer_price'))) {
					$price = $this->currency->format($this->tax->calculate($product['price'], 0, $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn'));
				} else {
					$price = false;
				}

				$data['related'][] = array(
					'product_id'  => $product['product_id'],
					'thumb'       => $image,
					'name'        => $product['name'],
					'model' 	  =>  $product['model'],
					'stock' 	  =>  in_array($product_info['stock_status_id'],$a_statuses) && isset($stock_statuses[$product_info['stock_status_id']]) ? $stock_statuses[$product_info['stock_status_id']] : false,
					'stock_status_id' 	  =>  $product['stock_status_id'],
					'price'       => $price,
					'href'        => $this->url->link('product/product', 'product_id=' . $product['product_id'])
				);
            }


			$data['attribute_groups'] = $this->model_catalog_product->getProductAttributes($this->request->get['product_id'], false);

            /**
             * Add filter Links for attributes
             */
            foreach ($data['attribute_groups'] as $k => $dataAG) {
                foreach ($dataAG['attribute'] as $kk => $agItem) {
                    if ( ! empty($agItem['filters']) ) {
                        $optionID = $agItem['filters'][0]['option_id'];
                        $valueID = $agItem['filters'][0]['value_id'];
                        $url = '';

                        if ($rootPath) {
                            $url .= '&path=' . (string)$rootPath;
                        }

                        if ($optionID && $valueID) {
                            $url .= '&filter_ocfilter=' . $optionID . ':' . $valueID;
                        }
                        $url = 'https://yes-tm.com/index.php?route=extension/module/ocfilter/callback&path='.$rootPath.'&filter_ocfilter='.$optionID.':'.$valueID;
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        $getFilter = curl_exec($ch);
                        curl_close($ch);
                        $getFilter = json_decode($getFilter);
                        //$getFilter = file_get_contents( 'https://yes-tm.com/index.php?route=extension/module/ocfilter/callback&path='.$rootPath.'&filter_ocfilter='.$optionID.':'.$valueID );
                        $data['attribute_groups'][$k]['attribute'][$kk]['href'] = '/index.php?route=extension/module/ocfilter/callback&path='.$rootPath.'&filter_ocfilter='.$optionID.':'.$valueID;
//                        var_dump($getFilter);
//                        var_dump('https://yes-tm.com/index.php?route=extension/module/ocfilter/callback&path='.$rootPath.'&filter_ocfilter='.$optionID.':'.$valueID);
//                        var_dump($this->url->link('product/category', trim('&path='.$rootPath.'&filter_ocfilter='.$optionID.':'.$valueID, "&")));
                            //$this->load->controller('extension/module/shop');
                    }
                }
            }


			$this->model_catalog_product->updateViewed($this->request->get['product_id']);

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
            $data['events'] = $this->load->controller('common/events');
            $data['shops'] = $this->load->controller('extension/module/shop');
            $data['infolinks'] = $this->adata->infolinks;
            if (in_array($this->request->get['product_id'], $this->model_catalog_product->productsByAndreTan())) {
                $data['infolinks']['wheretobuy']['href'] = $this->url->link('information/information', 'information_id=23', true);
            }
            if(isset($this->adata->headercategories)){
                $headercategories  = $this->adata->headercategories;
                //shuffle($headercategories);
                $headercategories = array_values($headercategories);
                $data['popular'] = array(
                    'p1' => array(
                        'name' => $headercategories[0]['name'],
                        'href' => $this->url->link('product/category', 'path=' . $headercategories[0]['category_id'])
                    ),
                    'p2' => array(
                        'name' => $headercategories[3]['name'],
                        'href' => $this->url->link('product/category', 'path=' . $headercategories[3]['category_id'])
                    )
                );
            } else {
                $data['popular'] = false;
            }

//			$this->response->setOutput($this->load->view('product/product', $data));
            if (!$have_360) {
                $this->response->setOutput($this->load->view('product/product', $data));
            } else {
                $data['reel_zoomimages'] = $reel_zoomimages;
                $data['reel_images'] = $reel_images;
                $data['reel_count'] = $reel_count;
                $data['reel_first'] = $reel_first;
//                $this->document->addScript('/catalog/view/javascript/jquery/jquery.reel.withzoom.js');
//                $this->document->addScript('/catalog/view/javascript/jquery/jquery.mousewheel.min.js');
                $this->document->addScript('/catalog/view/javascript/jquery/jquery-ui.custom.min.js');
                $this->document->addStyle('/catalog/view/javascript/jquery/style.css');
                $this->response->setOutput($this->load->view('product/product_360', $data));
            }
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/product', $url . '&product_id=' . $product_id)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['heading_title'] = $this->language->get('text_error');

			$data['text_error'] = $this->language->get('text_error');
			$data['text_main'] = $this->language->get('text_main');

			$data['button_continue'] = $this->language->get('button_continue');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('product/product', $data));
		}
	}

	public function updateShop(){
        $this->model_catalog_product->updateShop((int)$this->request->post['pid'],(int)$this->request->post['sid'],(int)$this->customer->isLogged());
        die('1');
    }

	public function review() {
		$this->load->language('product/product');

		$this->load->model('catalog/review');
		$this->load->model('catalog/product');

        $months_replace = $this->language->get('months_replace');

		$start = 0;
		$data['text_no_reviews'] = $this->language->get('text_no_reviews');
		$data['text_more_reviews'] = $this->language->get('text_more_reviews');
		$data['reviews'] = array();

		$review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);

		$results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], $start, 3);
        $rest = $review_total-$start;
		$data['show_button'] = ($rest>3)?true:false;

        $product_info = $this->model_catalog_product->getProduct( $this->request->get['product_id'] );

		foreach ($results as $result) {
			$data['reviews'][] = array(
				'author'     => $result['author'],
				'text'       => nl2br($result['text']),
				'rating'     => (int)$result['rating'],
				'date_added' => strtr(date($this->language->get('date_format_reviews'), strtotime($result['date_added'])),$months_replace),
                'product_title' => $product_info['name'],
                'product_link' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
			);
		}

		return $this->load->view('product/review', $data);
	}

	public function reviewM() {
		$this->load->language('product/product');

		$this->load->model('catalog/review');
        $this->load->model('catalog/product');

        $months_replace = $this->language->get('months_replace');

		$start = $this->request->get['start'];
		$data['text_no_reviews'] = $this->language->get('text_no_reviews');
		$data['text_more_reviews'] = $this->language->get('text_more_reviews');
		$data['reviews'] = array();

		$review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);

		$results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], $start, 3);
        $rest = $review_total-$start;
		$data['show_button'] = ($rest>3)?true:false;

        $product_info = $this->model_catalog_product->getProduct( $this->request->get['product_id'] );

		foreach ($results as $result) {
			$data['reviews'][] = array(
				'author'     => $result['author'],
				'text'       => nl2br($result['text']),
				'rating'     => (int)$result['rating'],
				'date_added' => strtr(date($this->language->get('date_format_reviews'), strtotime($result['date_added'])),$months_replace),
                'product_title' => $product_info['name'],
                'product_link' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
			);
		}

		$this->response->setOutput($this->load->view('product/review', $data));
	}

	public function write() {
		$this->load->language('product/product');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
		    require_once DIR_SYSTEM.'library/recaptcha/autoload.php';
            $recaptcha = new \ReCaptcha\ReCaptcha($this->config->get('config_recaptcha_secret_key'));
            $res_captcha = false;
            if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
                $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                    ->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
                if($resp->isSuccess()) {
                    $res_captcha = true;
                }
            }

			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
				$json['error'] = $this->language->get('error_name');
			}

			if ((utf8_strlen($this->request->post['text']) < 25) || (utf8_strlen($this->request->post['text']) > 1000)) {
				$json['error'] = $this->language->get('error_text');
			}
			if (empty($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
				$json['error'] = $this->language->get('error_rating');
			}

			if (!$res_captcha) {
				$json['error'] = $this->language->get('error_captcha');
			}

			// Captcha
			/*if ($this->config->get($this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
				$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

				if ($captcha) {
					$json['error'] = $captcha;
				}
			}*/

			if (!isset($json['error'])) {
				$this->load->model('catalog/review');

				$this->model_catalog_review->addReview($this->request->get['product_id'], $this->request->post);

				$json['success'] = $this->language->get('text_success');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function getRecurringDescription() {
		$this->load->language('product/product');
		$this->load->model('catalog/product');

		if (isset($this->request->post['product_id'])) {
			$product_id = $this->request->post['product_id'];
		} else {
			$product_id = 0;
		}

		if (isset($this->request->post['recurring_id'])) {
			$recurring_id = $this->request->post['recurring_id'];
		} else {
			$recurring_id = 0;
		}

		if (isset($this->request->post['quantity'])) {
			$quantity = $this->request->post['quantity'];
		} else {
			$quantity = 1;
		}

		$product_info = $this->model_catalog_product->getProduct($product_id);
		$recurring_info = $this->model_catalog_product->getProfile($product_id, $recurring_id);

		$json = array();

		if ($product_info && $recurring_info) {
			if (!$json) {
				$frequencies = array(
					'day'        => $this->language->get('text_day'),
					'week'       => $this->language->get('text_week'),
					'semi_month' => $this->language->get('text_semi_month'),
					'month'      => $this->language->get('text_month'),
					'year'       => $this->language->get('text_year'),
				);

				if ($recurring_info['trial_status'] == 1) {
					$price = $this->currency->format($this->tax->calculate($recurring_info['trial_price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_text = sprintf($this->language->get('text_trial_description'), $price, $recurring_info['trial_cycle'], $frequencies[$recurring_info['trial_frequency']], $recurring_info['trial_duration']) . ' ';
				} else {
					$trial_text = '';
				}

				$price = $this->currency->format($this->tax->calculate($recurring_info['price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

				if ($recurring_info['duration']) {
					$text = $trial_text . sprintf($this->language->get('text_payment_description'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				} else {
					$text = $trial_text . sprintf($this->language->get('text_payment_cancel'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				}

				$json['success'] = $text;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

    public function relbuildNewestCategory() {
        $this->load->model('catalog/product');
        $this->model_catalog_product->relbuildNewestCategory();
        exit(1);
    }

    public function relbuildAndretanCategory() {
        $this->load->model('catalog/product');
        $this->model_catalog_product->relbuildAndretanCategory();
        exit(1);
    }

    public function relbuildAndretanDesignCategory() {
        $this->load->model('catalog/product');
        $this->model_catalog_product->relbuildAndretanDesignCategory();
        exit(1);
    }

    public function actionPrices() {
	    return array( 531430 => 79, 531442 => 79, 531935 => 83, 555375 => 314, 555376 => 314, 554754 => 299, 556042 => 956, 556024 => 956, 555946 => 956, 555938 => 956, 555948 => 956, 556034 => 956, 555960 => 956, 555950 => 956, 556038 => 956, 554581 => 956, 554579 => 956, 554593 => 956, 554575 => 956, 554587 => 956, 554623 => 956, 554605 => 956, 554607 => 956, 556195 => 1017, 555788 => 976, 556154 => 854, 556152 => 854, 555156 => 770, 555118 => 770, 555294 => 770, 555142 => 770, 555158 => 770, 555170 => 770, 555130 => 770, 555168 => 770, 555096 => 1281, 531838 => 104, 531818 => 64, 531793 => 102, 555971 => 561, 554545 => 561, 554551 => 561, 554549 => 561, 558635 => 518, 532675 => 282, 532224 => 86, 532240 => 68, 532230 => 68, 532222 => 86, 531436 => 79, 531931 => 86, 531933 => 83, 532708 => 161, 532707 => 161, 532677 => 161, 555072 => 226, 554756 => 237, 554730 => 101, 554750 => 122, 556539 => 262, 556535 => 304, 556547 => 430, 556543 => 308, 556541 => 332, 556537 => 332, 555307 => 277, 555312 => 211, 555302 => 277, 555309 => 211, 555500 => 267, 556446 => 274, 556509 => 215, 556505 => 220, 556507 => 213, 556895 => 233, 556831 => 241, 556829 => 253, 556849 => 378, 556851 => 364, 556847 => 378, 556853 => 413, 557647 => 261, 558536 => 463, 558539 => 486, 557817 => 221, 557820 => 230, 557819 => 275, 557818 => 181, 558525 => 478, 556529 => 490, 556527 => 490, 557636 => 398, 557622 => 398, 557632 => 398, 556477 => 133, 556479 => 133, 557828 => 840, 557832 => 1085, 557830 => 840, 554583 => 1016, 554495 => 944, 554585 => 996, 554599 => 1016, 554497 => 981, 554603 => 958, 554621 => 1016, 554615 => 1016, 552815 => 824, 556052 => 935, 555954 => 949, 555956 => 1002, 555964 => 952, 557624 => 1448, 556189 => 907, 557612 => 1282, 555371 => 869, 555373 => 869, 555370 => 912, 556183 => 881, 556179 => 881, 556185 => 881, 556187 => 881, 554567 => 807, 555086 => 807, 555154 => 751, 553304 => 744, 555134 => 751, 555144 => 751, 555202 => 771, 555160 => 879, 555136 => 751, 555184 => 879, 555200 => 751, 553294 => 716, 555128 => 751, 553310 => 716, 555216 => 751, 555196 => 751, 556321 => 1075, 557285 => 704, 557283 => 704, 557281 => 704, 555102 => 1012, 555112 => 1133, 555110 => 1088, 555523 => 777, 555521 => 777, 531990 => 100, 531750 => 114, 532634 => 145, 532532 => 123, 532534 => 123, 531813 => 49, 531833 => 89, 531847 => 86, 531843 => 86, 531846 => 86, 531824 => 51, 531839 => 95, 531849 => 86, 531840 => 83, 532359 => 84, 532357 => 84, 532361 => 81, 532365 => 91, 532377 => 104, 532379 => 174, 532540 => 64, 532538 => 64, 532544 => 59, 532542 => 68, 531525 => 73, 531527 => 73, 531318 => 104, 532673 => 122, 532683 => 122, 532685 => 122, 556475 => 142, 557143 => 183, 557139 => 183, 557147 => 183, 557149 => 216, 557141 => 204, 557153 => 183, 555350 => 425, 555348 => 425, 557816 => 166, 557329 => 151, 557337 => 151, 557331 => 151, 557333 => 151, 555567 => 260, 555515 => 299, 555561 => 209, 554728 => 376, 532679 => 101, 532427 => 46, 532220 => 46, 532264 => 48, 531776 => 159, 531519 => 134, 531517 => 134, 532158 => 134, 532101 => 139, 532107 => 159, 532681 => 183, 532687 => 183, 532421 => 103, 531976 => 94, 531783 => 87, 532139 => 90, 532194 => 89, 532133 => 94, 532131 => 92, 532190 => 117, 531800 => 124, 532184 => 137, 532178 => 137, 532188 => 122, 532425 => 135, 532423 => 119, 532154 => 104, 532152 => 104, 532160 => 104, 532156 => 105, 532254 => 104, 532147 => 104, 551915 => 574, 555744 => 813, 555748 => 813, 555752 => 813, 557784 => 736, 557783 => 736, 554024 => 756, 554023 => 756, 554054 => 723, 554037 => 723, 552956 => 913, 552954 => 913, 555626 => 977, 555693 => 1199, 553998 => 894, 553996 => 894, 554034 => 813, 554032 => 813, 554033 => 813, 554086 => 893, 554080 => 756, 554011 => 789, 553999 => 976, 554035 => 976, 554076 => 709, 554055 => 894, 554116 => 798, 553992 => 813, 554105 => 813, 554998 => 244, 555416 => 203, 555413 => 203, 555597 => 244, 551734 => 391, 552172 => 363, 551774 => 363, 552249 => 439, 551923 => 439, 555519 => 293, 555516 => 293, 555580 => 200, 555579 => 308, 555578 => 408, 557659 => 251, 557661 => 251, 555511 => 231, 555508 => 244, 555509 => 244, 555469 => 146, 556561 => 154, 556797 => 159, 556799 => 161, 556861 => 178, 556383 => 263, 556377 => 263, 556381 => 263, 532896 => 225, 532899 => 225, 557293 => 552, 557289 => 623, 557297 => 552, 557295 => 552, 557234 => 660, 555459 => 457, 555549 => 457, 555792 => 457, 555794 => 457, 557676 => 569, 557678 => 569, 557674 => 569, 555054 => 745, 555052 => 745, 557815 => 283, 554994 => 265, 558342 => 674, 558341 => 674, 558339 => 674, 558482 => 1076, 558480 => 1076, 558475 => 1126, 558477 => 895, 558479 => 895, 558465 => 1051, 558467 => 1051, 555498 => 493, 555497 => 527, 555770 => 390, 555772 => 390, 555768 => 390, 553931 => 406, 553933 => 406, 553935 => 406, 553940 => 406, 553957 => 338, 557502 => 306, 557504 => 306, 557165 => 194, 556759 => 324, 556754 => 324, 556761 => 324, 556757 => 324, 555060 => 286, 555418 => 286, 555062 => 286, 555419 => 286, 555540 => 286, 555546 => 404, 554796 => 885, 554792 => 826, 554930 => 671, 557222 => 726, 557182 => 211, 557180 => 211, 554878 => 704, 557012 => 719, 557484 => 871, 555424 => 495, 555425 => 495, 555429 => 495, 555427 => 495, 555426 => 495, 555421 => 495, 556615 => 315, 556595 => 315, 556603 => 315, 555439 => 233, 555437 => 233, 555432 => 233, 555435 => 233, 555438 => 233, 555434 => 233, 555433 => 233, 555464 => 233, 555440 => 233, 555452 => 389, 555450 => 389, 555449 => 389, 555445 => 389, 555455 => 389, 555448 => 389, 555451 => 389, 555495 => 366, 555494 => 366, 555447 => 389, 555446 => 389, 555463 => 389, 555453 => 389, 557649 => 310, 557653 => 323, 557651 => 337, 557655 => 501, 553568 => 301, 557175 => 192, 557171 => 192, 557177 => 192, 557169 => 192, 557173 => 192, 557255 => 898, 557257 => 898, 557360 => 699, 557309 => 707, 557307 => 707, 557194 => 707, 557482 => 746, 557496 => 787, 557490 => 732, 557388 => 711, 557430 => 924, 557433 => 924, 555010 => 508, 555024 => 407, 555014 => 508, 555012 => 407, 555020 => 508, 555016 => 407, 532586 => 113, 531640 => 111, 531924 => 111, 531638 => 111, 532576 => 102, 532572 => 102, 532716 => 150, 532715 => 150, 532714 => 150, 532650 => 93, 532644 => 93, 532665 => 102, 531471 => 142, 531469 => 142, 532648 => 91, 532655 => 102, 532663 => 66, 532657 => 93, 532667 => 87, 556912 => 980, 556916 => 980, 556918 => 980, 557353 => 980, 556920 => 980, 556926 => 980, 556924 => 980, 556922 => 980, 556932 => 980, 556930 => 980, 556934 => 980, 556928 => 980, 557356 => 980, 556948 => 980, 556962 => 846, 556964 => 846, 556960 => 846, 556898 => 636, 556900 => 636, 557323 => 541, 557325 => 485, 557311 => 554, 557313 => 554, 557548 => 629, 557532 => 580, 557540 => 629, 557550 => 650, 555182 => 1161, 555176 => 1161, 555844 => 980, 555848 => 980, 555880 => 895, 555884 => 895, 555878 => 895, 555882 => 895, 553231 => 722, 553229 => 722, 554415 => 960, 554411 => 960, 554430 => 854, 554428 => 854, 554413 => 960, 554426 => 854, 554942 => 433, 554948 => 433, 553519 => 474, 553523 => 474, 553517 => 474, 553521 => 474, 553544 => 474, 553527 => 474, 553546 => 474, 553534 => 474 );
    }
}
