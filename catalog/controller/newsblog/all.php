<?php
class ControllerNewsBlogAll extends Controller {
    public function index()
    {

        $this->load->language('newsblog/category');

        $this->document->setTitle($this->config->get('config_meta_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));

        $this->load->model('newsblog/category');
        $this->load->model('newsblog/article');
        $this->load->model('tool/image');

        $data['og_url'] = (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1')) ? HTTPS_SERVER : HTTP_SERVER) . substr($this->request->server['REQUEST_URI'], 1, (strlen($this->request->server['REQUEST_URI'])-1));
        $data['continue'] = $this->url->link('common/home');

        $data['text_empty'] = $this->language->get('text_empty');
        $data['text_details'] = $this->language->get('text_details');
        $data['text_blog_info'] = $this->language->get('text_blog_info');
        $data['button_continue'] = $this->language->get('button_continue');
        $data['text_refine'] = $this->language->get('text_refine');
        $data['text_attributes'] = $this->language->get('text_attributes');
        $data['text_details'] = $this->language->get('text_details');
        $data['text_all'] = $this->language->get('text_all');
        $data['href_all'] = $this->url->link('product/allcategory');
        $months_replace = $this->language->get('months_replace');
        $date_format = 'j M Y'; //$this->language->get('date_format_short');

        $limit = 6;
        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_blog_info'),
            'href' => '' //$this->url->link('newsblog/all')
        );

        if (isset($this->request->get['route'])) {
            $this->document->addLink($this->config->get('config_url'), 'canonical');
        }

        //$header_category_info = $this->model_newsblog_category->getHeaderCategory();
        /*$categories = $this->model_newsblog_category->getCategories();
        foreach ($categories AS $k=>$category) {
            if(($header_category_info['category_id'] != $category['parent_id'] && $category['category_id'] != $header_category_info['category_id']) || $this->customer->getID()) {
                $data['categories'][] = array(
                    'href' => $this->url->link('newsblog/category', '&newsblog_path=' . $category['category_id']),
                    'name' => $category['name'],
                    'category_id' => $category['category_id']
                );
            }
        }*/

        $filter_data = array(
            'filter_category_id' => 0,
            'order'               => 'DESC',
            'start'              => ($page - 1) * $limit,
            'limit'              => $limit
        );
        $article_total = $this->model_newsblog_article->getTotalArticlesAll($filter_data, $this->customer->getID() ? 1 : 0);
        $results = $this->model_newsblog_article->getArticlesAll($filter_data, $this->customer->getID() ? 1 : 0);

        $data['articles'] = array();
        foreach ($results as $result) {

            if ($result['image']) {
                $original 	= HTTP_SERVER.'image/'.$result['image'];
                $thumb 		= $this->model_tool_image->resize($result['image'],496, 300);
            } else {
                $original 	= '';
                $thumb 		= '';	//or use 'placeholder.png' if you need
            }

            $data['articles'][] = array(
                'article_id'  		=> $result['article_id'],
                'original'			=> $original,
                'thumb'       		=> $thumb,
                'name'        		=> $result['name'],
                'cat_name'        	=> $result['cat_name'],
                'preview'     		=> html_entity_decode($result['preview'], ENT_QUOTES, 'UTF-8'),
                'attributes'  		=> $result['attributes'],
                'href'        		=> $this->url->link('newsblog/article',  'newsblog_article_id=' . $result['article_id']),
                'date'   			=> ($date_format ? strtr(date($date_format, strtotime($result['date_added'])),$months_replace) : false),
                'date_modified'		=> ($date_format ? date($date_format, strtotime($result['date_modified'])) : false),
                'viewed' 			=> $result['viewed']
            );
        }

        $pagination = new Pagination();
        $pagination->total = $article_total;
        $pagination->page = $page;
        $pagination->limit = $limit;
        $pagination->url = $this->url->link('newsblog/all', 'newsblog_path=' . '&page={page}');

        $data['pagination'] = $pagination->renderNew();

        //$data['results'] = sprintf($this->language->get('text_pagination'), ($article_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($article_total - $limit)) ? $article_total : ((($page - 1) * $limit) + $limit), $article_total, ceil($article_total / $limit));

        // http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html

        //$data['column_left'] = $this->load->controller('common/column_left');
        //$data['column_right'] = $this->load->controller('common/column_right');
        //$data['content_top'] = $this->load->controller('common/content_top');
        //$data['content_bottom'] = $this->load->controller('common/content_bottom');

        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');
        $this->response->setOutput($this->load->view('newsblog/category', $data));
    }
}
