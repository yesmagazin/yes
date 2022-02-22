<?php
class ControllerCommonFooter extends Controller {
    public function index() {

        $this->load->language('common/footer');
        $this->load->language('product/product');

        $data['scripts'] = $this->document->getScripts('footer');

        $data['text_information'] = $this->language->get('text_information');
        $data['text_service'] = $this->language->get('text_service');
        $data['text_extra'] = $this->language->get('text_extra');
        $data['text_contact'] = $this->language->get('text_contact');
        $data['text_return'] = $this->language->get('text_return');
        $data['text_sitemap'] = $this->language->get('text_sitemap');
        $data['text_manufacturer'] = $this->language->get('text_manufacturer');
        $data['text_voucher'] = $this->language->get('text_voucher');
        $data['text_affiliate'] = $this->language->get('text_affiliate');
        $data['text_special'] = $this->language->get('text_special');
        $data['text_account'] = $this->language->get('text_account');
        $data['text_order'] = $this->language->get('text_order');
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['text_newsletter'] = $this->language->get('text_newsletter');
        $data['text_catalog'] = $this->language->get('text_catalog');
        $data['text_powered'] = $this->language->get('text_powered');
        $data['text_collections'] = $this->language->get('text_collections');
        $data['text_sotrudnichestvo'] = $this->language->get('text_sotrudnichestvo');
        $data['text_v_kurse'] = $this->language->get('text_v_kurse');
        $data['text_subscribe_ph'] = $this->language->get('text_subscribe_ph');
        $data['text_subscribe'] = $this->language->get('text_subscribe');
        $data['text_subscribe_email'] = $this->language->get('text_subscribe_email');
        $data['text_where_to_buy_button'] = $this->language->get('text_where_to_buy_button');
        $data['text_show_shops'] = $this->language->get('text_show_shops');
        $data['text_can_buy'] = $this->language->get('text_can_buy');

        $data['text_social_1'] = $this->language->get('text_social_1');
        $data['text_social_2'] = $this->language->get('text_social_2');
        $data['text_social_3'] = $this->language->get('text_social_3');
        $data['text_social_4'] = $this->language->get('text_social_4');
        $data['text_promo_popup'] = $this->language->get('text_promo_popup');
        $data['text_promo_popup_but'] = $this->language->get('text_promo_popup_but');

        /*$data['tab_01'] = $this->language->get('tab_01');
        $data['tab_02'] = $this->language->get('tab_02');
        $data['tab_03'] = $this->language->get('tab_03');
        $data['tab_04'] = $this->language->get('tab_04');
        $data['tab_05'] = $this->language->get('tab_05');*/

        $this->adata->infolinks = array(
            'catalog' => array(
                'name'=> $this->language->get('text_catalog'),
                'href' => $this->url->link('product/allcategory', '', true)
            ),
            'andrelanding' => array(
                'name'=> $this->language->get('text_andre_menu'),
                'href' => $this->url->link('information/information', 'information_id=21', true)
            ),
            'aboutus' => array(
                'name'=> $this->language->get('text_about_brand'),
                'href' => $this->url->link('information/information', 'information_id=14', true)
            ),
            'blog' => array(
                'name'=> $this->language->get('text_blog'),
                'href' => $this->url->link('newsblog/category', 'newsblog_path=1', true)//$this->url->link('newsblog/all', '', true)
            ),
            'kontakty' => array(
                'name'=> $this->language->get('text_contacts'),
                'href' => $this->url->link('information/contact', '', true)
            ),
            'wheretobuy' => array(
                'name'=> $this->language->get('text_where_to_buy'),
                'href' => $this->url->link('information/information', 'information_id=3', true)
            ),
            'information' => array(
                'name'=> $this->language->get('text_information'),
                'href' => '#'
            ),
            'tips' => array(
                'name'=> $this->language->get('text_tips'),
                'href' => $this->url->link('newsblog/category', 'newsblog_path=4', true)
            ),
            'presentation' => array(
                'name'=> $this->language->get('text_presentation'),
                'href' => $this->url->link('newsblog/category', 'newsblog_path=5', true)
            ),
            'teenagers' => array(
                'name'=> $this->language->get('text_teenagers'),
                'href' => $this->url->link('newsblog/category', 'newsblog_path=6', true)
            ),
            'warranty' => array(
                'name'=> $this->language->get('text_warranty'),
                'href' => $this->url->link('information/information', 'information_id=22', true)
            ),
            'sertif' => array(
                'name'=> $this->language->get('text_sertif'),
                'href' => $this->url->link('information/information', 'information_id=19', true)
            ),
            'ortoped' => array(
                'name'=> $this->language->get('text_ortoped'),
                'href' => $this->url->link('information/information', 'information_id=20', true)
            ),
            'news' => array(
                'name'=> $this->language->get('text_news'),
                'href' => $this->url->link('newsblog/category', 'newsblog_path=7', true)
            ),
            'shops_online' => array(
                'name'=> $this->language->get('text_shops_online'),
                'href' => $this->url->link('information/information', 'information_id=3', true) . '#online'
            ),
            'shops_offline' => array(
                'name'=> $this->language->get('text_shops_offline'),
                'href' => $this->url->link('information/information', 'information_id=3', true) . '#offline'
            ),
            'shops_andre' => array(
                'name'=> $this->language->get('text_shops_andre'),
                'href' => $this->url->link('information/information', 'information_id=23', true)
            ),
            'sitemap' => array(
                'name'=> $this->language->get('text_sitemap'),
                'href' => $this->url->link('information/sitemap', '', true)
            )
        );

        $data['infolinks'] = $this->adata->infolinks;

        /** adress story**/

        $data['locations'] = array();

        $this->load->model('localisation/location');

        if($locations = $this->model_localisation_location->getLocationsByIDs((array)$this->config->get('config_location'))){
            foreach($locations as $location_info) {
                $data['locations'][] = array(
                    'location_id' => $location_info['location_id'],
                    'name'        => $location_info['name'],
                    'comment'     => $location_info['comment']
                );
            }
        }
        /**END adress story END**/

        $this->load->model('catalog/information');

        $data['informations'] = array();

        foreach ($this->model_catalog_information->getInformations() as $result) {
            if ($result['bottom']) {
                $data['informations'][] = array(
                    'title' => $result['title'],
                    'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
                );
            }
        }

        $this->load->language('information/information');
        $this->load->model('catalog/information');
        $information_9 = $this->model_catalog_information->getInformation((int)9);
        if ($information_9) {
            $data['description_9'] = html_entity_decode($information_9['description'], ENT_QUOTES, 'UTF-8');
        }

        $data['routeprod'] = $this->request->get['route'] == 'product/product';
        $data['contact'] = $this->url->link('information/contact');
        $data['return'] = $this->url->link('account/return/add', '', true);
        $data['sitemap'] = $this->url->link('information/sitemap');
        $data['manufacturer'] = $this->url->link('product/manufacturer');
        $data['voucher'] = $this->url->link('account/voucher', '', true);
        $data['affiliate'] = $this->url->link('affiliate/account', '', true);
        $data['special'] = $this->url->link('product/special');
        $data['account'] = $this->url->link('account/account', '', true);
        $data['order'] = $this->url->link('account/order', '', true);
        $data['wishlist'] = $this->url->link('account/wishlist', '', true);
        $data['newsletter'] = $this->url->link('account/newsletter', '', true);
//        $this->document->addScript('catalog/view/javascript/jquery/jquery.cookie.min.js');
        $this->document->addScript('catalog/view/javascript/js.cookies.min.js');
        $this->document->addScript('catalog/view/javascript/swal.js');
        //$data['subscribe_me'] = $this->load->model('module/callback');
        $data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

        // Whos Online
        if ($this->config->get('config_customer_online')) {
            $this->load->model('tool/online');

            if (isset($this->request->server['REMOTE_ADDR'])) {
                $ip = $this->request->server['REMOTE_ADDR'];
            } else {
                $ip = '';
            }

            if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
                $url = 'http://' . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
            } else {
                $url = '';
            }

            if (isset($this->request->server['HTTP_REFERER'])) {
                $referer = $this->request->server['HTTP_REFERER'];
            } else {
                $referer = '';
            }

            $this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
        }

        if(isset($this->request->cookie['popup_city']) && $this->request->cookie['popup_city']){
            $this->adata->user_city = (int)$this->request->cookie['popup_city'];
        } else {
            $this->adata->user_city = 0;
        }

        $data['user_city'] = $this->adata->user_city;

        if(isset($this->adata->ocfilter) && $this->adata->ocfilter){
            $data['ocfilter_script'] = $this->adata->ocfilter;
        } else {
            $data['ocfilter_script'] = false;
        }
        $data['changing_contacts'] = $this->load->controller('common/changing_contacts');

        $data['scripts'] = $this->document->getScripts();

        return $this->load->view('common/footer', $data);
    }
}
