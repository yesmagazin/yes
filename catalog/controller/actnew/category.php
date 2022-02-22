<?php
//echo '<!-- zzz ' . __FILE__ . ' -->';
class ControllerActnewCategory extends Controller {
    public function index() {

        $this->load->language('product/category');

        $this->load->model('catalog/category');
        $this->load->model('actnew/category');

        $this->load->model('catalog/product');

        $this->load->model('tool/image');

        $language_id = (int)$this->config->get('config_language_id');
//logg($this->request->get, $_SERVER['REQUEST_URI']);
        if (isset($this->request->get['filter'])) {
            $filter = $this->request->get['filter'];
        } else {
            $filter = '';
        }

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'p.sort_order';
        }

        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
        } else {
            $order = 'ASC';
        }

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }
        if (isset($this->request->get['ajax'])) {
            $data['ajax'] = true;
        } else {
            $data['ajax'] = false;
        }

        if (isset($this->request->get['limit'])) {
            $limit = (int)$this->request->get['limit'];
        } else {
            $limit = $this->config->get($this->config->get('config_theme') . '_product_limit');
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

//        if (isset($this->request->get['path'])) {
        if (isset($this->request->get['actnew_path'])) {
            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

//            $path = '';
            $actnew_path = '';

            $parts = explode('_', (string)$this->request->get['actnew_path']);

            $category_id = (int)array_pop($parts);
            $seourl = $this->model_actnew_category->getSeourlByCategory($category_id);

            foreach ($parts as $actnew_path_id) {
                if (!$actnew_path) {
                    $actnew_path = (int)$actnew_path_id;
                } else {
                    $actnew_path .= '_' . (int)$actnew_path_id;
                }

//                $category_info = $this->model_catalog_category->getCategory($path_id);
                $category_info = $this->model_actnew_category->getCategory($actnew_path_id);

                if ($category_info) {
                    $data['breadcrumbs'][] = array(
                        'text' => $category_info['name'],
//                        'href' => $this->url->link('product/category', 'path=' . $path . $url)
                        'href' => $this->url->link('action/' . $seourl, 'actnew_path=' . $actnew_path . $url)
                    );
                }
            }
        } else {
            $category_id = 0;
        }

//        $category_info = $this->model_catalog_category->getCategory($category_id);
        $seourl = $this->model_actnew_category->getSeourlByCategory($category_id);

        $category_info = $this->model_actnew_category->getCategoryBySeourl($seourl);
        if ($category_info) {
///zzz 2020-02-19
///2020-04-26
            $set = unserialize($category_info['settings']);
            $actnew_image_size_width = $set['image_size_width'];
            $actnew_image_size_height = $set['image_size_height'];
            $actnew_image = $category_info['image'];
            $actnew_name = $category_info['name'];
            $actnew_link = $category_info['keyword'];
            unset($set);
            
            $this->document->addScript('catalog/view/javascript/showmore.js');
            $this->document->addStyle('catalog/view/theme/default/stylesheet/showmore.css');

            if ($category_info['meta_title']) {
                $this->document->setTitle(trim($category_info['meta_title']).($page>1?" | ".$this->language->get('text_page')." ".$page:''));
            } else {
                $this->document->setTitle(trim($category_info['name']).($page>1?" | ".$this->language->get('text_page')." ".$page:''));
            }

            if($page==1 && isset($category_info['meta_description']) && $category_info['meta_description']){
                $this->document->setDescription(trim($category_info['meta_description']));
            }

            //$this->document->setKeywords($category_info['meta_keyword']);

            $data['h1'] = trim($category_info['meta_h1'] ? $category_info['meta_h1'] : $category_info['name']);

            $this->adata->cat_name = trim($category_info['name']);

            $data['cat_name'] = $category_info['name'];
            $data['heading_title'] = $category_info['name'];

            $data['text_refine'] = $this->language->get('text_refine');
            $data['text_empty'] = $this->language->get('text_empty');
            $data['text_quantity'] = $this->language->get('text_quantity');
            $data['text_manufacturer'] = $this->language->get('text_manufacturer');
            $data['text_model'] = $this->language->get('text_model');
            $data['text_price'] = $this->language->get('text_price');
            $data['text_tax'] = $this->language->get('text_tax');
            $data['text_points'] = $this->language->get('text_points');
            $data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
            $data['text_sort'] = $this->language->get('text_sort');
            $data['text_limit'] = $this->language->get('text_limit');
            $data['text_open_product'] = $this->language->get('text_open_product');
            $data['text_filters'] = $this->language->get('text_filters');
            $data['text_show_more'] = $this->language->get('text_show_more');
            $data['text_back'] = $this->language->get('text_back');

            $data['button_cart'] = $this->language->get('button_cart');
            $data['button_wishlist'] = $this->language->get('button_wishlist');
            $data['button_compare'] = $this->language->get('button_compare');
            $data['button_continue'] = $this->language->get('button_continue');
            $data['button_list'] = $this->language->get('button_list');
            $data['button_grid'] = $this->language->get('button_grid');

            // Set the last category breadcrumb
            $data['breadcrumbs'][] = array(
                'text' => $category_info['name'],
                'href' => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'])
            );

            if ($category_info['image']) {
                $data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get($this->config->get('config_theme') . '_image_category_width'), $this->config->get($this->config->get('config_theme') . '_image_category_height'));
                $this->document->setOgImage($data['thumb']);
            } else {
                $data['thumb'] = '';
            }

            $data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
            $data['compare'] = $this->url->link('product/compare');

            $url = '';

            if (isset($this->request->get['filter'])) {
                $url .= '&filter=' . $this->request->get['filter'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            $data['products'] = array();

            $filter_data = array(
                'filter_category_id' => $category_id,
                'filter_filter'      => $filter,
                'sort'               => $sort,
                'order'              => $order,
                'start'              => ($page - 1) * $limit,
                'limit'              => $limit,
                'seourl' => $seourl
            );

            //$product_total = $this->model_catalog_product->getTotalProducts($filter_data);
//            $results = $this->model_catalog_product->getProductsCalc($filter_data);
            $results = $this->model_actnew_category->getProductsCalcActnew($filter_data);
            $product_total = $results['total'];
            $filter_data['filter_category_id'] = '';
            $results['products'] = $this->model_catalog_product->getProductsByIDs($results['product_ids'],$filter_data);
            unset($results['product_ids']);
            $stock_statuses = $this->model_catalog_product->getProductStockStatuses($language_id);
            $a_statuses = array(11,12,21);
            //if($results = $this->model_catalog_product->getProducts($filter_data)){
                //foreach ($results as $result) {
            if($results['products']){
                foreach ($results['products'] as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                    }

                    if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                        $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn'));
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

                    if ($this->config->get('config_review_status')) {
                        $rating = (int)$result['rating'];
                    } else {
                        $rating = false;
                    }
                    //print_r $result;
///!!!
$actnew = array();
            $actnew['sticker'] = $this->model_tool_image->resize($actnew_image, $actnew_image_size_width, $actnew_image_size_height);
            $actnew['link'] = $data['breadcrumbs'][1]['href'] . $actnew_link;
            $actnew['label'] = $actnew_name;
///
                    $attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
                    $data['products'][] = array(
                        'product_id'  => $result['product_id'],
                        'actnew' => $actnew,
//                        'actnew_sticker' => $actnew_sticker,
//                        'actnew_link' => $actnew_link,
//                        'actnew_label' => $actnew_label,
                        'stock_status_id'  => $result['stock_status_id'],
                        'stock_status'  => in_array($result['stock_status_id'],$a_statuses) && isset($stock_statuses[$result['stock_status_id']]) ? $stock_statuses[$result['stock_status_id']] : false,
                        'thumb'       => $image,
                        'name'        => $result['name'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
                        'attribute_groups' => $attribute_groups,
                        'sku' 			=>  $result['sku'],
                        'price'       => $price,
                        'special'     => $special,
                        'tax'         => $tax,
                        'minimum'     => ($result['minimum'] > 0) ? $result['minimum'] : 1,
                        'rating'      => $rating,
                        'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
                    );
                }

            }

            $url = '';

            if (isset($this->request->get['filter'])) {
                $url .= '&filter=' . $this->request->get['filter'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            $data['sorts'] = array();

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_default'),
                'value' => 'p.sort_order-ASC',
                'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&sort=p.sort_order&order=ASC')
            );

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_name_asc'),
                'value' => 'pd.name-ASC',
                'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&sort=pd.name&order=ASC')
            );

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_name_desc'),
                'value' => 'pd.name-DESC',
                'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&sort=pd.name&order=DESC')
            );

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_price_asc'),
                'value' => 'p.price-ASC',
                'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&sort=p.price&order=ASC')
            );

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_price_desc'),
                'value' => 'p.price-DESC',
                'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&sort=p.price&order=DESC')
            );

            /*if ($this->config->get('config_review_status')) {
                $data['sorts'][] = array(
                    'text'  => $this->language->get('text_rating_desc'),
                    'value' => 'rating-DESC',
                    'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=DESC' . $url)
                );

                $data['sorts'][] = array(
                    'text'  => $this->language->get('text_rating_asc'),
                    'value' => 'rating-ASC',
                    'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=ASC' . $url)
                );
            }*/

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_model_asc'),
                'value' => 'p.model-ASC',
                'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&sort=p.model&order=ASC')
            );

            $data['sorts'][] = array(
                'text'  => $this->language->get('text_model_desc'),
                'value' => 'p.model-DESC',
                'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&sort=p.model&order=DESC')
            );

            $url = '';

            if (isset($this->request->get['filter'])) {
                $url .= '&filter=' . $this->request->get['filter'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            $data['limits'] = array();

            $limits = array_unique(array($this->config->get($this->config->get('config_theme') . '_product_limit'), 25, 50, 75, 100));

            sort($limits);

            foreach($limits as $value) {
                $data['limits'][] = array(
                    'text'  => $value,
                    'value' => $value,
                    'href'  => $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&limit=' . $value)
                );
            }

            $url = '';

            if (isset($this->request->get['filter'])) {
                $url .= '&filter=' . $this->request->get['filter'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }
            $data['page'] = $page;

            $pagination = new Pagination();
            $pagination->total = $product_total;
            $pagination->page = $page;
            $pagination->limit = $limit;
            $pagination->url = $this->url->link('action/' . $seourl, 'actnew_path=' . $this->request->get['actnew_path'] . $url . '&page={page}');

            $data['pagination'] = $pagination->renderNew();

            $data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

            $this->document->addLink($this->url->link('action/' . $seourl, 'actnew_path=' . $category_info['category_id'], true), 'canonical');

            if ($page == 2) {
                $this->document->addLink($this->url->link('action/' . $seourl, 'actnew_path=' . $category_info['category_id'], true), 'prev');
            } elseif ($page > 2) {
                $this->document->addLink($this->url->link('action/' . $seourl, 'actnew_path=' . $category_info['category_id'] . '&page='. ($page - 1), true), 'prev');
            }

            if ($limit && ceil($product_total / $limit) > $page) {
                $this->document->addLink($this->url->link('action/' . $seourl, 'actnew_path=' . $category_info['category_id'] . '&page='. ($page + 1), true), 'next');
            }

            $data['sort'] = $sort;
            $data['order'] = $order;
            $data['limit'] = $limit;

            $data['continue'] = $this->url->link('common/home');

//            $data['column_left'] = $this->load->controller('common/column_left');
//            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');
            $data['infolinks'] = $this->adata->infolinks;

            $this->response->setOutput($this->load->view('product/category', $data));
        } else {
            $url = '';

            if (isset($this->request->get['path'])) {
                $url .= '&path=' . $this->request->get['path'];
            }

            if (isset($this->request->get['filter'])) {
                $url .= '&filter=' . $this->request->get['filter'];
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
                'href' => $this->url->link('product/category', $url)
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
}
