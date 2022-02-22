<?php
class ControllerExtensionModuleChangingcontacts extends Controller {
    private $error = array();
    private $module='changing_contacts';
    private $primary_key='city_id';
    private $table='city_contacts';
    private $fields=array('city_name', 'contact_ml', 'contact_mb');

    public function index() {

        if(isset($this->request->get[$this->primary_key]))
        {
            $sql="update ";
            $sql_where=" where ".$this->primary_key."=".$this->request->get[$this->primary_key];
        }
        else {
            $sql="insert into ";
            $sql_where="";
        }


        $this->load->language('extension/module/changing_contacts');
        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');
       // $this->load->model('extension/module');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('changing_contacts', $this->request->post);

            $sql.=DB_PREFIX .$this->table;
            $sql.= " set ";
            $sql_columns=array();
            foreach($this->fields as  $field)
            {

                $sql_columns[]=$field."='".$this->db->escape($this->request->post[$field])."'";
               /* $sql_columns[]=$field."='".$this->db->escape($this->request->post['contact_ml'])."'";
                $sql_columns[]=$field."='".$this->db->escape($this->request->post['contact_mb'])."'";*/
            }
           // var_dump($sql_columns); exit();
            $sql.=implode(",",$sql_columns);
            $sql.=$sql_where;



            $this->db->query($sql);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/module/'.$this->module, 'token=' . $this->session->data['token'], true));
        }
        if(isset($this->request->get[$this->primary_key])){
            $categorydata=$this->db->query("select * from ". DB_PREFIX .$this->table." WHERE ".$this->primary_key ."=".$this->request->get[$this->primary_key] ."");

            if($categorydata->num_rows){
                $data['city_name']=$categorydata->row['city_name'];
                $data['contact_ml']=$categorydata->row['contact_ml'];
                $data['contact_mb']=$categorydata->row['contact_mb'];

            }

        }

        $data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_status'] = $this->language->get('entry_status');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['lists']=array();
        $query=$this->db->query("SELECT * from ". DB_PREFIX .$this->table);
        if($query->num_rows){
            $data['lists']=$query->rows;
        }
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/changing_contacts', 'token=' . $this->session->data['token'], true)
        );

        if(isset($this->request->get[$this->primary_key]))
            $data['action'] = $this->url->link('extension/module/'.$this->module,'&'.$this->primary_key.'='.$this->request->get[$this->primary_key].'&token=' . $this->session->data['token'], true);
        else
            $data['action'] = $this->url->link('extension/module/'.$this->module, 'token=' . $this->session->data['token'], true);

        $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], true);

        if (isset($this->request->post['changingcontacts_status'])) {
            $data['changing_contacts_status'] = $this->request->post['changing_contacts_status'];
        } else {
            $data['changing_contacts_status'] = $this->config->get('changing_contacts_status');
        }

        $data['header'] = $this->load->controller('common/header');

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/changing_contacts', $data));
    }



    public function delete(){
        $id=$this->request->get[$this->primary_key];
        $this->db->query("delete from ". DB_PREFIX ."". $this->table ." where ".$this->primary_key ."='". $id ."'");

        $this->response->redirect($this->url->link('extension/module/changing_contacts', 'token=' . $this->session->data['token'], true));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/changing_contacts')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }
}
