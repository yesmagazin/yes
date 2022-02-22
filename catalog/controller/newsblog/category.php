<?php
class ControllerNewsBlogCategory extends Controller {
    public function index() {
        $this->load->language('newsblog/category');

        $this->load->model('newsblog/category');
        $this->load->model('newsblog/article');

        $this->load->model('tool/image');

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }
        $data['og_url'] = (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1')) ? HTTPS_SERVER : HTTP_SERVER) . substr($this->request->server['REQUEST_URI'], 1, (strlen($this->request->server['REQUEST_URI'])-1));
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );
//        $data['breadcrumbs'][] = array(
//            'text' => $this->language->get('text_blog_info'),
//            'href' => $this->url->link('newsblog/all')
//        );

        if (isset($this->request->get['newsblog_path'])) {
            $path = '';

            $parts = explode('_', (string)$this->request->get['newsblog_path']);

            $category_id = (int)array_pop($parts);

            foreach ($parts as $path_id) {
                if (!$path) {
                    $path = (int)$path_id;
                } else {
                    $path .= '_' . (int)$path_id;
                }

                $category_info = $this->model_newsblog_category->getCategory($path_id);

                if ($category_info) {
                    $data['breadcrumbs'][] = array(
                        'text' => $category_info['name'],
                        'href' => ''
                    );
                }
            }
        } else {
            $category_id = 0;
        }
        $category_info = $this->model_newsblog_category->getCategory($category_id);
        if ($category_info) {

            //for no errors with versions < 20160920
            $articles_image_size=array($this->config->get($this->config->get('config_theme') . '_image_product_width'),$this->config->get($this->config->get('config_theme') . '_image_product_height'));
            $category_image_size=array($this->config->get($this->config->get('config_theme') . '_image_category_width'),$this->config->get($this->config->get('config_theme') . '_image_category_height'));
            $date_format=$this->language->get('date_format_short');
            if ($category_info['settings']) {
                $settings=unserialize($category_info['settings']);
                $category_info=array_merge($category_info,$settings);

                $articles_image_size=array($settings['images_size_width'],$settings['images_size_height']);
                $category_image_size=array($settings['image_size_width'],$settings['image_size_height']);
                $date_format=$settings['date_format'];
            }

            if ($category_info['meta_title']) {
                if ( $page > 1 ) {
                    $category_info['meta_title'] = $category_info['meta_title'] . '. ' . $this->language->get('text_page') . ' ' . $page;
                }
                $this->document->setTitle($category_info['meta_title']);
            } else {
                if ( $page > 1 ) {
                    $category_info['name'] = $category_info['name'] . '. ' . $this->language->get('text_page') . ' ' . $page;
                }
                $this->document->setTitle($category_info['name']);
            }

            $this->document->setDescription($category_info['meta_description']);
            $this->document->setKeywords($category_info['meta_keyword']);

            if ($category_info['meta_h1']) {
                $data['heading_title'] = $category_info['meta_h1'];
            } else {
                $data['heading_title'] = $category_info['name'];
            }

            $data['text_empty'] = $this->language->get('text_empty');
            $data['button_continue'] = $this->language->get('button_continue');
            $data['text_refine'] = $this->language->get('text_refine');
            $data['text_attributes'] = $this->language->get('text_attributes');
//            $data['text_details'] = $this->language->get('text_details');
            $data['text_details'] = $category_info['meta_h1'];
            $data['href_all'] = $this->url->link('product/allcategory', '', true);
            $data['text_all'] = $this->language->get('text_all');

            $data['continue'] = $this->url->link('common/home');

            // Set the last category breadcrumb
            $data['breadcrumbs'][] = array(
                'text' => $category_info['name'],
                'href' => '' //$this->url->link('newsblog/category', 'newsblog_path=' . $this->request->get['newsblog_path'])
            );

            if ($category_info['image']) {
                $data['original']	= HTTP_SERVER.'image/'.$category_info['image'];
                $data['thumb'] 		= $this->model_tool_image->resize($category_info['image'], 411, 274);
            } else {
                $data['original'] 	= '';
                $data['thumb'] 		= '';
            }

            $data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');

            $data['categories'] = array();

            //$header_category_info = $this->model_newsblog_category->getHeaderCategory();
            //$categories = $this->model_newsblog_category->getCategories();
            //vardump($header_category_info);
            //            if($header_category_info['category_id'] == $category_info['category_id'] || $header_category_info['category_id'] == $category_info['parent_id']) {
            //                // Услуги
            //
            //                foreach ($categories AS $k=>$category) {
            //                    if($header_category_info['category_id'] == $category['parent_id'] && $category['category_id'] != $header_category_info['category_id']) {
            //                        $data['categories'][] = array(
            //                            'href' => $this->url->link('newsblog/category', 'newsblog_path=' . $header_category_info['category_id'] . '_' . $category['category_id']),
            //                            'name' => $category['name'],
            //                            'category_id' => $category['category_id']
            //                        );
            //                    }
            //                }
            //            } else {
                // Блог
                /*foreach ($categories AS $k=>$category) {
                    if (($header_category_info['category_id'] != $category['parent_id'] && $category['category_id'] != $header_category_info['category_id']) || $this->customer->getID()) {
                        $data['categories'][] = array(
                            'href' => $this->url->link('newsblog/category', '&newsblog_path=' . $category['category_id']),
                            'name' => $category['name'],
                            'category_id' => $category['category_id']
                        );
                    }
                }*/
            //            }



            $data['articles'] = array();

            $limit = $category_info['limit'];

            if ($limit>0) {

                $sort = $category_info['sort_by'];
                $order = $category_info['sort_direction'];

                $filter_data = array(
                    'filter_category_id' => $category_id,
                    'sort'               => $sort,
                    'order'              => $order,
                    'start'              => ($page - 1) * $limit,
                    'limit'              => $limit
                );

                //                if($header_category_info['category_id'] == $category_info['category_id'] || $header_category_info['category_id'] == $category_info['parent_id']) {
                //                    $article_total = $this->model_newsblog_article->getTotalArticles($filter_data, 1);
                //
                //                    $results = $this->model_newsblog_article->getArticles($filter_data, 1);
                //                } else {

                //$date_format = $this->language->get('date_format_relative');
                $months_replace = $this->language->get('months_replace');
                    $article_total = $this->model_newsblog_article->getTotalArticles($filter_data, $this->customer->getID() ? 1 : 0);

                    $results = $this->model_newsblog_article->getArticles($filter_data, $this->customer->getID() ? 1 : 0);
                //                }
                //vardump($results,1);

                foreach ($results as $result) {

                    if ($result['image']) {
                        $original 	= HTTP_SERVER.'image/'.$result['image'];
                        $thumb 		= $this->model_tool_image->resize($result['image'], 385, 210);
                    } else {
                        $original 	= '';
                        $thumb 		= '';	//or use 'placeholder.png' if you need
                    }
                    $category =  $this->model_newsblog_article->getArticleCategories($result['article_id']);

                    if ( in_array( $category_id, $category ) && isset( $category_info['name'] ) ) {
                        $result['cat_name'] = $category_info['name'];
                    }

                    $data['articles'][] = array(
                        'article_id'  		=> $result['article_id'],
                        'original'			=> $original,
                        'thumb'       		=> $thumb,
                        'name'        		=> $result['name'],
                        'cat_name'          => $result['cat_name'],
                        'preview'     		=> html_entity_decode($result['preview'], ENT_QUOTES, 'UTF-8'),
                        'attributes'  		=> $result['attributes'],
                        'category'   		=> $category,
                        'href'        		=> $this->url->link('newsblog/article', 'newsblog_path=' . $this->request->get['newsblog_path'] . '&newsblog_article_id=' . $result['article_id']),
                        'date'		  		=> ($date_format ? strtr(date($date_format, strtotime($result['date_added'])),$months_replace) : false),
                        'date_modified'		=> ($date_format ? strtr(date($date_format, strtotime($result['date_modified'])),$months_replace) : false),
                        'viewed' 			=> $result['viewed']
                    );
                }


                $pagination = new Pagination();
                $pagination->total = $article_total;
                $pagination->page = $page;
                $pagination->limit = $limit;
                $pagination->url = $this->url->link('newsblog/category', 'newsblog_path=' . $this->request->get['newsblog_path'] . '&page={page}');

                $data['pagination'] = $pagination->renderNew();

                $data['results'] = sprintf($this->language->get('text_pagination'), ($article_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($article_total - $limit)) ? $article_total : ((($page - 1) * $limit) + $limit), $article_total, ceil($article_total / $limit));

                // http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
                if ($page == 1) {
                    $this->document->addLink($this->url->link('newsblog/category', 'newsblog_path=' . $category_info['category_id'], 'SSL'), 'canonical');
                } elseif ($page == 2) {
                    $this->document->addLink($this->url->link('newsblog/category', 'newsblog_path=' . $category_info['category_id'], 'SSL'), 'prev');
                } else {
                    $this->document->addLink($this->url->link('newsblog/category', 'newsblog_path=' . $category_info['category_id'] . '&page='. ($page - 1), 'SSL'), 'prev');
                }

                if ($limit && ceil($article_total / $limit) > $page) {
                    $this->document->addLink($this->url->link('newsblog/category', 'newsblog_path=' . $category_info['category_id'] . '&page='. ($page + 1), 'SSL'), 'next');
                }
            }

            $data['canonical']=$this->url->link('newsblog/category', 'newsblog_path=' . $category_info['category_id'], 'SSL');

            //for no errors with versions < 20170906
            /*$data['comments_vk'] = false;
            $data['comments_fb'] = false;
            $data['comments_dq'] = false;
            if ($settings && isset($settings['show_comments_vk_id'])) {
                if ($settings && $settings['show_comments_vk_id'] && $settings['show_comments_vk_category']) {
                    $data['comments_vk'] = $settings['show_comments_vk_id'];
                    $this->document->addScript('//vk.com/js/api/openapi.js');
                }

                if ($settings && $settings['show_comments_fb_category'])
                    $data['comments_fb'] = true;

                if ($settings && $settings['show_comments_dq_id'] && $settings['show_comments_dq_category'])
                    $data['comments_dq'] = $settings['show_comments_dq_id'];
            }*/

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $template_default='category.tpl';
            if ($category_info['template_category']) $template_default=$category_info['template_category'];

            $this->response->setOutput($this->load->view('newsblog/'.$template_default, $data));
        } else {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_error'),
                'href' => $this->url->link('newsblog/category')
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

            $this->response->setOutput($this->load->view('error/not_found.tpl', $data));
        }
    }
}
