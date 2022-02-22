<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));
        if (file_exists(DIR_IMAGE . 'og_logo2.jpg')) {
//            $image = $this->model_tool_image->resize('og_logo.jpg', $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
            $image = $this->model_tool_image->resize('og_logo2.jpg', 100, 100);
            $this->document->setOgImage($image);
        }
//		if (isset($this->request->get['route'])) {
//			$this->document->addLink($this->config->get('config_url'), 'canonical');
//		}
		/*** maps ***/
		
		$this->load->language('common/home');
		$this->load->model('catalog/information');
        $this->load->model('design/banner');

        $data['banners'] = array();

        if($results = $this->model_design_banner->getBannerImages(7)){
            foreach($results as $banner_image){
                if (is_file(DIR_IMAGE . $banner_image['image'])) {
                    $image = $banner_image['image'];
                } else {
                    $image = '';
                }
                $data['banners'][] = array(
                    'title'      => html_entity_decode($banner_image['title']),
                    'subtitle'   => html_entity_decode($banner_image['subtitle']),
                    'link'       => $banner_image['link'],
                    'image'      => $this->model_tool_image->resize($image, 942, 595),
                );
            }
        }
	    //	$information_info = $this->model_catalog_information->getInformation($information_id);
		$information_info = $this->model_catalog_information->getInformation(8);
		if ($information_info) {
			$data['button_continue'] = $this->language->get('button_continue');

			$data['description'] = html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');
		}
		$information_4 = $this->model_catalog_information->getInformation(4);
		if ($information_4) {
			$data['description_4'] = html_entity_decode($information_4['description'], ENT_QUOTES, 'UTF-8');
		}		
        $data['events'] = $this->load->controller('common/events');

		$metaTagsTemplate = $this->load->controller('common/header/customMetaTagsTemplate');
		if ( ! empty( $metaTagsTemplate['h1'] ) ) $data['h1'] = $metaTagsTemplate['h1'];
		
		/***end  maps end ***/
		
					/** adress story**/
			
					$data['locations'] = array();

		$this->load->model('localisation/location');
        $data['text_all'] = $this->language->get('text_all_home');

        $data['text_can_buy'] = $this->language->get('text_can_buy');
        $data['text_show_shops'] = $this->language->get('text_show_shops');
        $data['text_where_to_buy_button'] = $this->language->get('text_where_to_buy_button');


        $data['text_slider_1'] = $this->language->get('text_slider_1');
        $data['text_slider_2'] = $this->language->get('text_slider_2');
        $data['text_slider_3'] = $this->language->get('text_slider_3');
        $data['text_slider_4'] = $this->language->get('text_slider_4');
        $data['text_slider_5'] = $this->language->get('text_slider_5');
        $data['text_slider_6'] = $this->language->get('text_slider_6');

        $data['text_social_1'] = $this->language->get('text_social_1');
        $data['text_social_2'] = $this->language->get('text_social_2');
        $data['text_social_3'] = $this->language->get('text_social_3');
        $data['text_social_4'] = $this->language->get('text_social_4');

        $data['text_home_1'] = $this->language->get('text_home_1');
        $data['text_home_2'] = $this->language->get('text_home_2');
        $data['text_home_3'] = $this->language->get('text_home_3');
        $data['text_home_4'] = $this->language->get('text_home_4');
        $data['text_home_5'] = $this->language->get('text_home_5');
        $data['text_home_6'] = $this->language->get('text_home_6');
        $data['text_home_7'] = $this->language->get('text_home_7');
        $data['text_home_8'] = $this->language->get('text_home_8');
        $data['text_home_9'] = $this->language->get('text_home_9');
        $data['text_home_10'] = $this->language->get('text_home_10');
        $data['text_home_11'] = $this->language->get('text_home_11');
        $data['text_home_12'] = $this->language->get('text_home_12');
        $data['text_home_13'] = $this->language->get('text_home_13');
        $data['text_home_14'] = $this->language->get('text_home_14');
        $data['text_home_15'] = $this->language->get('text_home_15');
        $data['text_home_16'] = $this->language->get('text_home_16');
        $data['text_home_17'] = $this->language->get('text_home_17');
        $data['text_home_18'] = $this->language->get('text_home_18');
        $data['text_home_19'] = $this->language->get('text_home_19');


        $data['link_home_1'] = $this->language->get('link_home_1');
        $data['link_home_2'] = $this->language->get('link_home_2');
        $data['link_home_3'] = $this->language->get('link_home_3');
        $data['link_home_4'] = $this->language->get('link_home_4');
        $data['link_home_5'] = $this->language->get('link_home_5');
        $data['link_home_6'] = $this->language->get('link_home_6');

        $data['icon_1_descr'] = $this->language->get('icon_1_descr');
        $data['icon_2_descr'] = $this->language->get('icon_2_descr');
        $data['icon_3_descr'] = $this->language->get('icon_3_descr');
        $data['icon_4_descr'] = $this->language->get('icon_4_descr');
        $data['icon_5_descr'] = $this->language->get('icon_5_descr');
        $data['adv_but_title'] = $this->language->get('adv_but_title');
        $data['adv_title'] = $this->language->get('adv_title');

        $data['href_home_7'] = $this->url->link('product/category', 'path=28');
        $data['href_home_9'] = $this->url->link('product/category', 'path=64');
        $data['href_home_11'] = $this->url->link('product/category', 'path=163');

        $data['href_all'] = $this->url->link('product/allcategory');
		if($locations = $this->model_localisation_location->getLocationsByIDs((array)$this->config->get('config_location'))){
            foreach($locations as $location_info) {
                if ($location_info['image']) {
                    $image = $this->model_tool_image->resize($location_info['image'], $this->config->get($this->config->get('config_theme') . '_image_location_width'), $this->config->get($this->config->get('config_theme') . '_image_location_height'));
                } else {
                    $image = false;
                }
                $locationsyka = str_replace('&quot;', '`', $location_info['address']);
                $data['locations'][] = array(
                    'location_id' => $location_info['location_id'],
                    'name'        => $location_info['name'],
                    'address'     => $locationsyka,  //nl2br($location_info['address']),
                    'geocode'     => $location_info['geocode'],
                    'telephone'   => $location_info['telephone'],
                    'fax'         => $location_info['fax'],
                    'image'       => $image,
                    'open'        => nl2br($location_info['open']),
                    'comment'     => $location_info['comment']
                );
            }
        }

			
			/**END adress story END**/
		
		
		
		
		
				$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);
		//var_dump($categories);

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
					'image'     => $this->model_tool_image->resize($category['image'], 219, 155),
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
        if(isset($this->adata->infolinks)){
            $data['infolinks'] = $this->adata->infolinks;
        } else {
            $data['infolinks'] = false;
        }
		$this->response->setOutput($this->load->view('common/home', $data));
        //vardump($this->db->getLoggedQueries());
	}
}
