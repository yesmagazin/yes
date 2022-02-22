<?php

class ControllerCommonChangingcontacts extends Controller {
    public function index() {

        $this->load->language('common/contacts');
        $this->load->model('catalog/contacts');

        $data['city_contacts'] = $this->model_catalog_contacts->getContacts();
        $data['text_choose'] = $this->language->get('text_choose');
        $data['text_choose_city'] = $this->language->get('text_choose_city');
        $data['text_choose_close'] = $this->language->get('text_choose_close');
        $data['text_choose_select'] = $this->language->get('text_choose_select');
        $data['user_city'] = $this->adata->user_city;

        $this->adata->city_contacts = $data['city_contacts'];

        return $this->load->view('common/changing_contacts', $data);
    }
}