<?php
class ControllerModuleEvents extends Controller {
	private $error = array();
    private $module='events';
	private $primary_key='event_id';
	private $table='events';
	private $fields=array('title','start_date','end_date','start_time','end_time','address','information','latitude','longitude','sort_order');
	
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
		
		
		$this->load->language('module/events');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('events', $this->request->post);

			$sql.=DB_PREFIX .$this->table;
			$sql.= " set ";
			$sql_columns=array();
			foreach($this->fields as $field)
			{
				
				$sql_columns[]=$field."='".$this->db->escape($this->request->post[$field])."'";
			}
			$sql.=implode(",",$sql_columns);
			$sql.=$sql_where;
			
			$this->db->query($sql);
			$eventlastId= $this->db->getLastId();
			if(isset($this->request->get[$this->primary_key]))
			{
				$this->db->query("DELETE FROM ". DB_PREFIX ."event_to_category where ".$this->primary_key ."=".$this->request->get[$this->primary_key]);
				foreach($this->request->post['event_category_id'] as $cats_id){
				$this->db->query("INSERT INTO ". DB_PREFIX ."event_to_category set event_id=".$this->request->get[$this->primary_key].", category_id=".$cats_id);
			    }
			}
			else {
				foreach($this->request->post['event_category_id'] as $cats_id){
				$this->db->query("INSERT INTO ". DB_PREFIX ."event_to_category set event_id=".$eventlastId.", category_id=".$cats_id."");
			    }
			}
			
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('module/'.$this->module, 'token=' . $this->session->data['token'], true));
		}
		$data['eventscategory']=array();
		$eventcategory=$this->db->query("select * from ". DB_PREFIX ."event_categories where language_id = '" . (int)$this->config->get('config_language_id') . "' order by category_name ASC");
		if($eventcategory->num_rows){
		$data['eventscategory']=$eventcategory->rows;	
		}
		if(isset($this->request->get[$this->primary_key])){
		$data['eventcategoryids']=array();
		$categorydataids=$this->db->query("select category_id from ". DB_PREFIX ."event_to_category WHERE ".$this->primary_key ."=".$this->request->get[$this->primary_key] ."");
		if($categorydataids->num_rows){
			
			$data['eventcategoryids']=$categorydataids->rows;
		}
		}
		
		if(isset($this->request->get[$this->primary_key])){
			$categorydata=$this->db->query("select * from ". DB_PREFIX ."".$this->table." WHERE ".$this->primary_key ."=".$this->request->get[$this->primary_key] ."");
			
			if($categorydata->num_rows){
				
				$data['eventname']=$categorydata->row['title'];
				$data['start_date']=$categorydata->row['start_date'];
				$data['end_date']=$categorydata->row['end_date'];
				$data['start_time']=$categorydata->row['start_time'];
				$data['end_time']=$categorydata->row['end_time'];
				$data['address']=$categorydata->row['address'];
				$data['information']=$categorydata->row['information'];
				$data['latitude']=$categorydata->row['latitude'];
				$data['longitude']=$categorydata->row['longitude'];
                $data['sort_order']=$categorydata->row['sort_order'];
                				
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
		$query=$this->db->query("SELECT * from ". DB_PREFIX ."".$this->table);
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
			'href' => $this->url->link('module/events', 'token=' . $this->session->data['token'], true)
		);

		if(isset($this->request->get[$this->primary_key]))
		$data['action'] = $this->url->link('module/'.$this->module,'&'.$this->primary_key.'='.$this->request->get[$this->primary_key].'&token=' . $this->session->data['token'], true);
		else
		$data['action'] = $this->url->link('module/'.$this->module, 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], true);

		if (isset($this->request->post['events_status'])) {
			$data['events_status'] = $this->request->post['events_status'];
		} else if($this->config->get('events_status')) {
			$data['events_status'] = $this->config->get('events_status');
		}else{
            $data['events_status'] = 0;
        }

		if (isset($this->request->post['event_category_id'])) {
			$data['event_category_id'] = $this->request->post['event_category_id'];
		} else {
			$data['event_category_id'] = array();
		}

		$data['header'] = $this->load->controller('common/header');
		
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/events', $data));
	}
	
	
	
	public function delete(){
		$id=$this->request->get[$this->primary_key];
		$this->db->query("delete from ". DB_PREFIX ."". $this->table ." where ".$this->primary_key ."='". $id ."'");

		$this->response->redirect($this->url->link('module/events', 'token=' . $this->session->data['token'], true));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/events')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if(!$this->request->post['event_category_id']){
			$this->error['warning']="select event categories";
		}

		return !$this->error;
	}
}