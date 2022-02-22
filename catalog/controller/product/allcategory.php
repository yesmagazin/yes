<?php

class ControllerProductAllCategory extends Controller
{
    public function index()
    {
        $this->load->language('product/allcategory');

        $this->load->model('catalog/category');
        $this->load->model('tool/image');

        $this->document->setTitle($this->language->get('page_title'));
        $this->document->setDescription($this->language->get('meta_description'));
        $this->document->setKeywords($this->language->get('meta_keyword'));

        $data['text_catalog'] = $this->language->get('text_catalog');
        $data['text_main'] = $this->language->get('text_main');

        $data['categories'] = $this->getAllCategories();
        $data['tan_category'] = $this->url->link('product/category', 'path=216' );
        $data['continue'] = $this->url->link('common/home');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');
        $this->response->setOutput($this->load->view('product/allcategory', $data));
    }

    public function getAllCategories(){
        $language_id = (int)$this->config->get('config_language_id');
        if($categories = $this->cache->get('headercategories')){
            return $categories[$language_id];
        } else {
            $this->load->model('catalog/category');
            if($categories = $this->model_catalog_category->getCategoriesMod()){
                $this->load->model('tool/image');
                $all_cats = $cat_data = $parents = array();
                foreach ($categories as &$category) {
                    if ($category['top']) {
                        $all_cats[$category['language_id']][$category['category_id']] = array(
                            'image' => $this->model_tool_image->resize($category['image'], 456, 234),
                            'name'  => trim($category['name']),
                            'href'  => $this->url->link('product/category', 'path=' . $category['category_id']),
                            'children' => array()
                        );
                    }
                }
                $parents = array_keys($all_cats[1]);
                $cat_data = $all_cats[$language_id];
                if($parents && ($children = $this->model_catalog_category->getChildrenCategoriesByParentIDs($parents))) {
                    foreach ($children as $child) {
                        if (isset($all_cats[$child['language_id']][$child['parent_id']])) {
                            $all_cats[$child['language_id']][$child['parent_id']]['children'][] = array(
                                'name' => trim($child['name']),
                                'href' => $this->url->link('product/category', 'path=' . $child['category_id'])
                            );
                        }
                        if ($child['language_id'] == $language_id && isset($cat_data[$child['parent_id']])) {
                            $cat_data[$child['parent_id']]['children'][] = array(
                                'name' => trim($child['name']),
                                'href' => $this->url->link('product/category', 'path=' . $child['category_id'])
                            );
                        }
                    }
                }
                $this->cache->set('headercategories',$all_cats,86400);
                return $cat_data;
            }
        }
        return false;
    }
}
