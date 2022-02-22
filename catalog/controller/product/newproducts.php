<?php

class ControllerProductNewproducts extends Controller
{

    public function index()
    {
        static $actnew_cache = array();

        $this->load->model('actnew/category');

        $this->load->language('product/newproducts');

        $this->load->model('catalog/newproducts');

        $this->load->model('catalog/product');

        $this->load->model('tool/image');

        $language_id = (int) $this->config->get('config_language_id');

        $this->document->setTitle($this->language->get('page_title'));
        $this->document->setDescription($this->language->get('meta_description'));
        $this->document->setKeywords($this->language->get('meta_keyword'));

        $data['heading_title'] = $this->language->get('heading_title');
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

        /***/
        $this->load->model('catalog/category');

        //$this->load->model('catalog/product');

        $data['categories'] = array();

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



        $newproducts_info = $this->model_catalog_newproducts->getNewproducts();


            $data['cat_name'] = $this->language->get('page_title');
            $data['heading_title'] = $this->language->get('page_title');
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
            $data['text_wheretobuy'] = $this->language->get('text_wheretobuy');

            $data['button_cart'] = $this->language->get('button_cart');
            $data['button_wishlist'] = $this->language->get('button_wishlist');
            $data['button_compare'] = $this->language->get('button_compare');
            $data['button_continue'] = $this->language->get('button_continue');
            $data['button_list'] = $this->language->get('button_list');
            $data['button_grid'] = $this->language->get('button_grid');

            /*$data['cat_name'] = $category_info['name'];
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
            $data['button_grid'] = $this->language->get('button_grid');*/

// Set the last AllProduct breadcrumb
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('product/newproducts')
            );

            $url = '';

            $data['products'] = array();

            $filter_data = array(
                'filter_filter' => $filter,
                'sort' => $sort,
                'order' => $order,
                'start' => ($page - 1) * $limit,
                'limit' => $limit
            );

            $product_total = $this->model_catalog_newproducts->getTotalProducts($filter_data);

            $results = $this->model_catalog_newproducts->getNewproducts($filter_data);

        //$product_total = $results['total'];
        $stock_statuses = $this->model_catalog_product->getProductStockStatuses($language_id);
        $a_statuses = array(11, 12, 21);

            if ($results) {
                $this->document->addScript('catalog/view/javascript/showmore.js');
                $this->document->addStyle('catalog/view/theme/default/stylesheet/showmore.css');
                foreach ($results as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', $this->config->get($this->config->get('config_theme') . '_image_product_width'), $this->config->get($this->config->get('config_theme') . '_image_product_height'));
                    }

                    if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
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

                    if ($this->config->get('config_review_status')) {
                        $rating = (int)$result['rating'];
                    } else {
                        $rating = false;
                    }

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

                    $attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
                    $data['products'][] = array(
                        'product_id' => $result['product_id'],
                        'actnew' => $actnew,
//                        'actnew_sticker' => $actnew_sticker,
//                        'actnew_link' => $actnew_link,
//                        'actnew_label' => $actnew_label,
                        'stock_status_id' => $result['stock_status_id'],
                        'stock_status' => in_array($result['stock_status_id'], $a_statuses) && isset($stock_statuses[$result['stock_status_id']]) ? $stock_statuses[$result['stock_status_id']] : false,
                        'thumb' => $image,
                        'name' => $result['name'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
                        'attribute_groups' => $attribute_groups,
                        'sku' => $result['sku'],
                        'price' => $price,
                        'special' => $special,
                        'tax' => $tax,
                        'minimum' => ($result['minimum'] > 0) ? $result['minimum'] : 1,
                        'rating' => $rating,
                        'href' => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
                    );
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
                    'value' => 'p.sort_order-ASC',
                    'href' => $this->url->link('product/newproducts', '&sort=p.sort_order&order=ASC' . $url)
                );

                $data['sorts'][] = array(
                    'text' => $this->language->get('text_name_asc'),
                    'value' => 'pd.name-ASC',
                    'href' => $this->url->link('product/newproducts', '&sort=pd.name&order=ASC' . $url)
                );

                $data['sorts'][] = array(
                    'text' => $this->language->get('text_name_desc'),
                    'value' => 'pd.name-DESC',
                    'href' => $this->url->link('product/newproducts', '&sort=pd.name&order=DESC' . $url)
                );

                $data['sorts'][] = array(
                    'text' => $this->language->get('text_price_asc'),
                    'value' => 'p.price-ASC',
                    'href' => $this->url->link('product/newproducts', '&sort=p.price&order=ASC' . $url)
                );

                $data['sorts'][] = array(
                    'text' => $this->language->get('text_price_desc'),
                    'value' => 'p.price-DESC',
                    'href' => $this->url->link('product/newproducts', '&sort=p.price&order=DESC' . $url)
                );

                /*if ($this->config->get('config_review_status')) {
                    $data['sorts'][] = array(
                        'text' => $this->language->get('text_rating_desc'),
                        'value' => 'rating-DESC',
                        'href' => $this->url->link('product/newproducts', '&sort=rating&order=DESC' . $url)
                    );

                    $data['sorts'][] = array(
                        'text' => $this->language->get('text_rating_asc'),
                        'value' => 'rating-ASC',
                        'href' => $this->url->link('product/newproducts', '&sort=rating&order=ASC' . $url)
                    );
                }*/

                $data['sorts'][] = array(
                    'text' => $this->language->get('text_model_asc'),
                    'value' => 'p.model-ASC',
                    'href' => $this->url->link('product/newproducts', '&sort=p.model&order=ASC' . $url)
                );

                $data['sorts'][] = array(
                    'text' => $this->language->get('text_model_desc'),
                    'value' => 'p.model-DESC',
                    'href' => $this->url->link('product/newproducts', '&sort=p.model&order=DESC' . $url)
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

                foreach ($limits as $value) {
                    $data['limits'][] = array(
                        'text' => $value,
                        'value' => $value,
                        'href' => $this->url->link('product/newproducts', $url . '&limit=' . $value)
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


                $pagination = new Pagination();
                $pagination->total = $product_total;
                $pagination->page = $page;
                $pagination->limit = $limit;
                $pagination->url = $this->url->link('product/newproducts', $url . '&page={page}');

                $data['pagination'] = $pagination->renderNew();

                $data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));


    // http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
                if ($page == 1) {
                    $this->document->addLink($this->url->link('product/newproducts', '', true), 'canonical');
                } elseif ($page == 2) {
                    $this->document->addLink($this->url->link('product/newproducts', '', true), 'prev');
                } else {
                    $this->document->addLink($this->url->link('product/newproducts', '&page=' . ($page - 1), true), 'prev');
                }

                if ($limit && ceil($product_total / $limit) > $page) {
                    $this->document->addLink($this->url->link('product/newproducts', '&page=' . ($page + 1), true), 'next');
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
                $data['infolinks'] = $this->adata->infolinks;

                $this->response->setOutput($this->load->view('product/newproducts', $data));
        } else {
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

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_error'),
                'href' => $this->url->link('product/allproduct', $url)
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
