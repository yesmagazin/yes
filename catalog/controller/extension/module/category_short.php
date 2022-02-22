<?php
class ControllerExtensionModuleCategoryShort extends Controller {
    public function index($category_id, $newProducts = false, $selecteds = false) {

        $data['categories'] = array();
        $data['category_name'] = utf8_ucfirst(trim($this->adata->cat_name));

        if(($categories = $this->cache->get('subcategories'.$category_id))){
            if($newProducts)
                $data['categories'] = $this->makeCategoriesNewpage($categories);
            else
                $data['categories'] = $this->makeCategories($categories);

            //var_dump($data);
        } else {
            $this->load->model('catalog/category');
            if($categories = $this->model_catalog_category->getCategoriesModLang($category_id)){
                $this->cache->set('subcategories'.$category_id,$categories,86400);
                if($newProducts)
                    $data['categories'] = $this->makeCategoriesNewpage($categories);
                else
                    $data['categories'] = $this->makeCategories($categories);
            }
        }
        $selecteds = $this->load->controller('extension/module/ocfilter/getSelectedOptions');
        $data['selectedsFilters'] = $selecteds;
        return $this->load->view('extension/module/category_short', $data);
    }

    public function makeCategories($data){
        $language_id = (int)$this->config->get('config_language_id');
        if(isset($data[$language_id])){
            $categories = array();
            foreach ($data[$language_id] as $category) {
                $categories[] = array(
                    'name' => trim($category['name']),
                    'href' => $this->url->link('product/category', 'path=' . $category['category_id'])
                );
            }
            return $categories;
        }
        return false;
    }

    public function makeCategoriesNewpage($data){
        $language_id = (int)$this->config->get('config_language_id');
        if(isset($data[$language_id])){
            $categories = array();
            foreach ($data[$language_id] as $category) {
                $categories[] = array(
                    'name' => trim($category['name']).'test',
                    'href' => $this->url->link('product/newproducts', 'path_new=' . $category['category_id'])
                );
            }
            return $categories;
        }
        return false;
    }
}