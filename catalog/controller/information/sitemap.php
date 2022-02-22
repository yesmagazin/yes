<?php
class ControllerInformationSitemap extends Controller {
	public function index() {
		$this->load->language('information/sitemap');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => ''
		);

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_special'] = $this->language->get('text_special');
		$data['text_account'] = $this->language->get('text_account');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_password'] = $this->language->get('text_password');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_history'] = $this->language->get('text_history');
		$data['text_download'] = $this->language->get('text_download');
		$data['text_cart'] = $this->language->get('text_cart');
		$data['text_checkout'] = $this->language->get('text_checkout');
		$data['text_search'] = $this->language->get('text_search');
		$data['text_information'] = $this->language->get('text_information');
		$data['text_contact'] = $this->language->get('text_contact');

		$this->load->model('catalog/category');

        $data['categories'] = array();

        $language_id = (int)$this->config->get('config_language_id');

        if($tree = $this->cache->get('catstree'.$language_id)){
            $data['categories'] = $tree;
        } elseif ($categories = $this->model_catalog_category->getAllCategoriesLangTree()){
            $cats = $ret_tree = array();
            foreach($categories as $row){
                $cats[$row['language_id']][] = $row;
            }
            if($cats){
                foreach($cats as $lid=>$tree){
                    $new = $cats_tree = array();
                    foreach($tree as $tr){
                        $tr['name'] = trim($tr['name']);
                        $tr['href'] = $this->url->link('product/category', 'path=' . $tr['category_id']);
                        unset($tr['language_id']);
                        $new[$tr['parent_id']][] = $tr;
                    }
                    $cats_tree = self::createTree($new,array(array('category_id'=>0,'parent_id'=>0)));
                    $cats_tree = $cats_tree[0]['children'];
                    $this->cache->set('catstree'.$lid, $cats_tree, 86400);
                    if($lid == $language_id){
                        $ret_tree = $cats_tree;
                    }
                }
                $data['categories'] = $ret_tree;
            }
        }

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$links = $this->adata->infolinks;
        array_pop($links);
        foreach($links as $link){
            $data['categories'][] = $link;
        }
		$this->response->setOutput($this->load->view('information/sitemap', $data));
	}

    function createTree(&$list, $parent){
        $tree = array();
        foreach ($parent as $k=>$l){
            if(isset($list[$l['category_id']])){
                $l['children'] = self::createTree($list, $list[$l['category_id']]);
            }
            unset($l['parent_id'],$l['category_id']);
            $tree[] = $l;
        }
        return $tree;
    }
}