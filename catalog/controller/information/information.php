<?php
class ControllerInformationInformation extends Controller {
    public function index() {
        $this->load->language('information/information');

        $this->load->model('catalog/information');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        if (isset($this->request->get['information_id'])) {
            $information_id = (int)$this->request->get['information_id'];
        } else {
            $information_id = 0;
        }

        $information_info = $this->model_catalog_information->getInformation($information_id);

        if ($information_info) {

            if ($information_info['meta_title']) {
                $this->document->setTitle($information_info['meta_title']);
            } else {
                $this->document->setTitle($information_info['title']);
            }

            $code = $this->language->get('code');
            if($code){
                $lng = $code;
            } else {
                $lng = 'ua';
            }

            $this->document->setDescription($information_info['meta_description']);
            $this->document->setKeywords($information_info['meta_keyword']);
            $this->document->addScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyBbr0ysJ3IvHiPJ3fPX5ZfnKyEJSPDtxpw&language='.$lng); //AIzaSyBIvy5GA_NXbZ1HqYlGbIjrNKnM8vzBT20
			$this->document->addScript('catalog/view/javascript/jquery.tekmap.0.7.js');

            $this->document->addStyle('catalog/view/theme/new/stylesheet/chosen/chosen.min.css');
            $this->document->addScript('catalog/view/javascript/jquery/chosen.jquery.min.js');


            $data['breadcrumbs'][] = array(
                'text' => $information_info['title'],
                'href' => $this->url->link('information/information', 'information_id=' .  $information_id)
            );

            if ($information_info['meta_h1']) {
                $data['heading_title'] = $information_info['meta_h1'];
            } else {
                $data['heading_title'] = $information_info['title'];
            }

            $data['meta_h1'] = $information_info['meta_h1'];
            $data['title'] = $information_info['title'];

            switch($information_id){
                case 3:
                    $add_class = 'stores';
                break;
                case 14:
                    $add_class = '';
                break;
                case 16:
                    $add_class = 'contacts';
                break;
                default:
                    $add_class = '';
            }
            $data['events'] = $data['shops']= array();

            $data['add_class'] = $add_class;

            $data['button_continue'] = $this->language->get('button_continue');

            $data['description'] = html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');

            $data['continue'] = $this->url->link('common/home');

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            if($information_id ==11||$information_id ==3|| $information_id ==23){
                $data['events'] = $this->load->controller('common/events');
            }

            if($information_id ==3 || $information_id ==23) {
                $d['text_stores'] = $this->language->get('text_stores');
                $d['text_info'] = $this->language->get('text_info');
                $d['text_conditions'] = $this->language->get('text_conditions');
                $d['text_offline'] = $this->language->get('text_offline');
                $d['text_online'] = $this->language->get('text_online');
                $d['shops'] = array(
                  'offline' => $data['events'],
                  'online' => $this->load->controller('extension/module/shops_info')
                  //'online' => _DEV_ ? $this->load->controller('extension/module/shops_info') : $this->load->controller('extension/module/shop')
                );
                if ($information_id ==23) {
                    $d['shops']['online'] = '';
                }
                $sh = $this->load->view('information/stores', $d);

                if(strpos($data['description'],'{%shops%}')){
                    $data['description'] = str_replace('{%shops%}',$sh,$data['description']);
                }

                if(isset($this->adata->headercategories)){
                    $headercategories  = $this->adata->headercategories;
                    //shuffle($headercategories);
                    $headercategories = array_values($headercategories);
                    $data_popular = array(
                        'text_all' => $this->language->get('text_all'),
                        'popular' => array(
                            'p1' => array(
                                'name' => $headercategories[0]['name'],
                                'href' => $this->url->link('product/category', 'path=' . $headercategories[0]['category_id'])
                            ),
                            'p2' => array(
                                'name' => $headercategories[3]['name'],
                                'href' => $this->url->link('product/category', 'path=' . $headercategories[3]['category_id'])
                            )
                        )
                    );
                    $popular = $this->load->view('information/popular', $data_popular);
                } else {
                    $popular = '';
                }
                if(strpos($data['description'],'{%popular%}')){
                    $data['description'] = str_replace('{%popular%}',$popular,$data['description']);
                }
            }
            /** adress story**/

            /*$data['locations'] = array();

            $this->load->model('localisation/location');
            foreach((array)$this->config->get('config_location') as $location_id) {
                $location_info = $this->model_localisation_location->getLocation($location_id);
                if ($location_info) {
                    if ($location_info['image']) {
                        $image = $this->model_tool_image->resize($location_info['image'], $this->config->get($this->config->get('config_theme') . '_image_location_width'), $this->config->get($this->config->get('config_theme') . '_image_location_height'));
                    } else {
                        $image = false;
                    }

                    $data['locations'][] = array(
                        'location_id' => $location_info['location_id'],
                        'name'        => $location_info['name'],
                        'address'     => nl2br($location_info['address']),
                        'geocode'     => $location_info['geocode'],
                        'telephone'   => $location_info['telephone'],
                        'fax'         => $location_info['fax'],
                        'image'       => $image,
                        'open'        => nl2br($location_info['open']),
                        'comment'     => $location_info['comment']
                    );
                }
            }*/

            /**END adress story END**/

            /***/
            //$this->load->model('catalog/category');

            //$this->load->model('catalog/product');

            /*$data['categories'] = array();

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
            /*** slider information id 10
            if($information_id == 10){
                $data['inform_id'] = $information_id;
                $set = array(
                    "name"=>"Слайдер",
                    "banner_id"=> "9",
                    "width"=> "1900",
                    "height"=> "1900",
                    "status"=> "1"
                );
                $data['slideshow'] = $this->load->controller('extension/module/slideshow',$set);
            }else{
                $data['inform_id'] = $information_id;
            }*/
            /*** slider information id 10 **/

if ($information_id == 17) { //Новинки
            $this->response->setOutput($this->load->view('information/information_latest', $data));
} else if ($information_id == 18) { //Promocode
    $this->response->setOutput($this->load->view('information/information_promo', $data));
} else if ($information_id == 21) { //Promocode
    $ver = ( $lng == 'ru' ) ? 'andre_tan_ru' : 'andre_tan_ua' ;
    $this->response->setOutput($this->load->view('information/static_pages/' . $ver, $data));
} else if ( in_array( $information_id, array(19, 20, 22) )) {
    $this->response->setOutput($this->load->view('information/information_simple', $data));
} else {
            $this->response->setOutput($this->load->view('information/information', $data));
}
        } else {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_error'),
                'href' => $this->url->link('information/information', 'information_id=' . $information_id)
            );

            $this->document->setTitle($this->language->get('text_error'));

            $data['heading_title'] = $this->language->get('text_error');

            $data['text_error'] = $this->language->get('text_error');

            $data['button_continue'] = $this->language->get('button_continue');

            $data['continue'] = $this->url->link('common/home');


            $this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('error/not_found', $data));
        }
    }

    public function agree() {
        $this->load->model('catalog/information');

        if (isset($this->request->get['information_id'])) {
            $information_id = (int)$this->request->get['information_id'];
        } else {
            $information_id = 0;
        }

        $output = '';

        $information_info = $this->model_catalog_information->getInformation($information_id);

        if ($information_info) {
            $output .= html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8') . "\n";
        }

        $this->response->setOutput($output);
    }
}