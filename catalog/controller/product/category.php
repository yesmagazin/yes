<?php

class ControllerProductCategory extends Controller
{

    public function index()
    {
        static $actnew_cache = array();

        $this->load->language('product/category');

        $this->load->model('catalog/category');
        $this->load->model('actnew/category');

        $this->load->model('catalog/product');

        $this->load->model('tool/image');

        $language_id = (int) $this->config->get('config_language_id');

        if (isset($this->request->get['filter'])) {
            $filter = $this->request->get['filter'];
        } else {
            $filter = '';
        }

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'default';
        }

        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
        } else {
            $order = 'DESC';
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
            $limit = (int) $this->request->get['limit'];
        } else {
            $limit = $this->config->get($this->config->get('config_theme') . '_product_limit');
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        if (isset($this->request->get['path'])) {
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

            $path = '';

            $parts = explode('_', (string) $this->request->get['path']);

            $category_id = (int) array_pop($parts);

            foreach ($parts as $path_id) {
                if (!$path) {
                    $path = (int) $path_id;
                } else {
                    $path .= '_' . (int) $path_id;
                }

                $category_info = $this->model_catalog_category->getCategory($path_id);

                if ($category_info) {
                    $data['breadcrumbs'][] = array(
                        'text' => $category_info['name'],
                        'href' => $this->url->link('product/category', 'path=' . $path . $url)
                    );
                }
            }
        } else {
            $category_id = 0;
        }

        $is_backpackCategory = (in_array(2, $parts) || $category_id == 2 || $category_id == 209) ? true : false;
        $is_sheetsCategory = (in_array(28, $parts) || $category_id == 28) ? true : false;

        $category_info = $this->model_catalog_category->getCategory($category_id);

        if ($category_info) {
///zzz 2020-02-19
            $this->document->addScript('catalog/view/javascript/showmore.js');
            $this->document->addStyle('catalog/view/theme/default/stylesheet/showmore.css');

            if ($category_info['meta_title']) {
                $this->document->setTitle(trim($category_info['meta_title']) . ($page > 1 ? " | " . $this->language->get('text_page') . " " . $page : ''));
            } else {
                $this->document->setTitle(trim($category_info['name']) . ($page > 1 ? " | " . $this->language->get('text_page') . " " . $page : ''));
            }

            if ($page == 1 && isset($category_info['meta_description']) && $category_info['meta_description']) {
                $this->document->setDescription(trim($category_info['meta_description']));
            }

            //$this->document->setKeywords($category_info['meta_keyword']);

            $data['h1'] = trim($category_info['meta_h1'] ? $category_info['meta_h1'] : $category_info['name']);

            $this->adata->cat_name = trim($category_info['name']);

            $data['cat_name'] = $category_info['name'];
            $metaTagsTemplate = $this->load->controller('common/header/customMetaTagsTemplate');
            if ( ! empty( $metaTagsTemplate['h1'] ) ) $data['cat_name'] = $metaTagsTemplate['h1'];
            $data['catID'] = $category_id;
            $data['heading_title'] = $category_info['name'];
            $data['is_backpackCategory'] = $is_backpackCategory;

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

            $data['content_bottom'] = $this->load->controller('common/content_bottom');

            // Set the last category breadcrumb
            $data['breadcrumbs'][] = array(
                'text' => $category_info['name'],
                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'])
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

            /*             * */

            /* $data['categories_all'] = array();

              $categories_all = $this->model_catalog_category->getCategories(0); */
            /* $this->load->language('product/product');
              $attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
              var_dump($attribute_groups); */
            //'attribute_groups' =>  $this->model_catalog_product->getProductAttributes($result['product_id']),

            /* foreach ($categories_all as $category) {
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
              $data['categories_all'][] = array(
              'name'     => $category['name'],
              'children' => $children_data,
              'column'   => $category['column'] ? $category['column'] : 1,
              'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
              );
              }
              } */
            /*             * */

            /* $data['categories'] = array();

              $results = $this->model_catalog_category->getCategories($category_id);

              foreach ($results as $result) {
              $filter_data = array(
              'filter_category_id'  => $result['category_id'],
              'filter_sub_category' => true
              );

              $data['categories'][] = array(
              'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
              'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
              );
              } */

            $data['products'] = array();

            switch ($sort) {
                case 'price' : $sortTable = 'p.price'; break;
                case 'popular' : $sortTable = 'FIELD(p.stock_status_id, 7, 11, 21, 12) DESC, p.product_id'; break;
                case 'actions' : $sortTable = 'ps.product_special_id DESC, FIELD(p.stock_status_id, 7, 21, 12, 11) DESC, p.product_id'; break;
                case 'newible' :
                case 'default' : $sortTable = 'FIELD(p.stock_status_id, 7, 21, 12, 11, 23) DESC, p.product_id'; break; // FIELD( ptc.category_id, 4, 12, 169, 3 ) DESC,
                default :
                    $sortTable = 'FIELD(p.stock_status_id, 7, 21, 12, 11, 23) DESC, p.product_id';
            }
            $actions = $sort == 'actions' ? true : false;
            $filter_data = array(
                'filter_category_id' => $category_id,
                'filter_filter' => $filter,
                'sort' => $sortTable,
                'order' => $order,
                'start' => ($page - 1) * $limit,
                'limit' => $limit,
                'actions' => $actions
            );
//var_dump($filter_data);
            //$product_total = $this->model_catalog_product->getTotalProducts($filter_data);
            $results = $this->model_catalog_product->getProductsCalc($filter_data);//var_dump($results);
            $product_total = $results['total'];
            $stock_statuses = $this->model_catalog_product->getProductStockStatuses($language_id);
            $a_statuses = array(11, 12, 21);
            //if($results = $this->model_catalog_product->getProducts($filter_data)){
            //foreach ($results as $result) {
//            var_dump($results); exit;
            if ($results['products']) {
                foreach ($results['products'] as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                    }

                    $productImages = $this->model_catalog_product->getProductImages($result['product_id']);
                    if ($result['image_hover']) {
                        $image_hover = $this->model_tool_image->resize($result['image_hover'], $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                    } elseif($is_backpackCategory && !empty($productImages)) {
                        $image_hover = '';
                        foreach($productImages as $imageItem) {
                            if(strpos($imageItem['image'], '-2') !== false) {
                                $image_hover = $this->model_tool_image->resize($imageItem['image'], $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                                break;
                            }
                        }
                    } elseif($is_sheetsCategory && !empty($productImages)) {
                        $image_hover = '';
                        foreach($productImages as $imageItem) {
                            if(strpos($imageItem['image'], '-3') !== false) {
                                $image_hover = $this->model_tool_image->resize($imageItem['image'], $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                                break;
                            }
                        }
                    } else {
                        $image_hover = '';
                    }

                    if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                        $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'], '', true, $this->language->get('grn'));
                    } else {
                        $price = false;
                    }

                    if ((float) $result['special']) {
                        $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $special = false;
                    }

                    if ($this->config->get('config_tax')) {
                        $tax = $this->currency->format((float) $result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
                    } else {
                        $tax = false;
                    }

                    if ($this->config->get('config_review_status')) {
                        $rating = (int) $result['rating'];
                    } else {
                        $rating = false;
                    }
                    //print_r $result;
///!!!
                    $actnew = false;
                    if (!empty($result['upc'])) {
                        if (!isset($actnew_cache[$result['upc']])) {
                            $category_info = $this->model_actnew_category->getCategoryBySeourl($result['upc']);
                            if ($category_info) {
                                $actnew = array();
                                $set = unserialize($category_info['settings']);
                                $actnew['label'] = $category_info['name'];
                                $actnew['link'] = $this->url->link('actnew/category', 'actnew_path=' . $category_info['category_id']);
                                $actnew['sticker'] = $this->model_tool_image->resize($category_info['image'], $set['image_size_width'], $set['image_size_height']);
                                unset($set);
                                $actnew_cache[$result['upc']] = array('label' => $actnew['label'], 'link' => $actnew['link'], 'sticker' => $actnew['sticker']);
                            } else {
                                $actnew_cache[$result['upc']] = false;
                            }
                        }
                        if ($actnew_cache[$result['upc']]) {
                            $actnew['label'] = $actnew_cache[$result['upc']]['label'];
                            $actnew['link'] = $actnew_cache[$result['upc']]['link'];
                            $actnew['sticker'] = $actnew_cache[$result['upc']]['sticker'];
                        }
                    }
///
                    $attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
                    $actionPrices = $this->load->controller('product/product/actionPrices');
                    $actionPrice = '';
                    if ( $actionPrices && is_array( $actionPrices ) && ! empty( $actionPrices[ $result['model'] ] ) ) {
                        $actionPrice = $actionPrices[ $result['model'] ];
                    }
                    /**
                     * Check if product is designed by Andre Tan
                     */
                    $byAndre = false;
                    if ( in_array( $result['product_id'], $this->model_catalog_product->productsByAndreTan() ) ) {
                        $byAndre = true;
                    }


                    $data['products'][] = array(
                        'product_id' => $result['product_id'],
                        'actnew' => $actnew,
//                        'actnew_sticker' => $actnew_sticker,
//                        'actnew_link' => $actnew_link,
//                        'actnew_label' => $actnew_label,
                        'isBackpack' => $this->model_catalog_product->isBackpack($result['product_id']),
                        'video' => ($result['video'] && $result['video'] != 'NULL') ? $result['video'] : false,
                        'stock_status_id' => $result['stock_status_id'],
                        'stock_status' => in_array($result['stock_status_id'], $a_statuses) && isset($stock_statuses[$result['stock_status_id']]) ? $stock_statuses[$result['stock_status_id']] : false,
                        'thumb' => $image,
                        'thumb_hover' => $image_hover,
                        'name' => $result['name'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
                        'attribute_groups' => $attribute_groups,
                        'sku' => $result['sku'],
                        'price' => $price,
                        'special' => $special,
                        'tax' => $tax,
                        'minimum' => ($result['minimum'] > 0) ? $result['minimum'] : 1,
                        'rating' => $rating,
                        'href' => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url),
                        'actionPrice' => $actionPrice,
                        'byAndre' => $byAndre,
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
                'text' => $this->language->get('text_default'),
                'value' => 'default-DESC',
                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=default&order=DESC' . $url)
            );

            $data['sorts'][] = array(
                'text' => $this->language->get('text_popular'),
                'value' => 'popular-DESC',
                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=popular&order=DESC' . $url)
            );

            $data['sorts'][] = array(
                'text' => $this->language->get('text_actions'),
                'value' => 'actions-DESC',
                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=actions&order=DESC' . $url)
            );

//            $data['sorts'][] = array(
//                'text' => $this->language->get('text_newible'),
//                'value' => 'newible-DESC',
//                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=newible&order=DESC' . $url)
//            );

            $data['sorts'][] = array(
                'text' => $this->language->get('text_price_asc'),
                'value' => 'price-ASC',
                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=price&order=ASC' . $url)
            );

            $data['sorts'][] = array(
                'text' => $this->language->get('text_price_desc'),
                'value' => 'price-DESC',
                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=price&order=DESC' . $url)
            );

            /* if ($this->config->get('config_review_status')) {
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
              } */

//            $data['sorts'][] = array(
//                'text' => $this->language->get('text_model_asc'),
//                'value' => 'p.model-ASC',
//                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=ASC' . $url)
//            );
//
//            $data['sorts'][] = array(
//                'text' => $this->language->get('text_model_desc'),
//                'value' => 'p.model-DESC',
//                'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=DESC' . $url)
//            );

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

            foreach ($limits as $value) {
                $data['limits'][] = array(
                    'text' => $value,
                    'value' => $value,
                    'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=' . $value)
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
            $pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');

            $data['pagination'] = $pagination->renderNew();

            $data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

            $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'], true), 'canonical');

            if ($page == 2) {
                $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'], true), 'prev');
            } elseif ($page > 2) {
                $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page=' . ($page - 1), true), 'prev');
            }

            if ($limit && ceil($product_total / $limit) > $page) {
                $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page=' . ($page + 1), true), 'next');
            }

            $data['sort'] = $sort;
            $data['order'] = $order;
            $data['limit'] = $limit;

            $data['continue'] = $this->url->link('common/home');

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $data['category_reviews'] = '';//$this->load->controller('extension/module/dlx_category_reviews');

            $data['infolinks'] = $this->adata->infolinks;

            if ( ! empty( $metaTagsTemplate[ 'seo_text' ] ) ) {
                $data['description'] = $metaTagsTemplate[ 'seo_text' ];
            }

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
