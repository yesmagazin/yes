<?php
class ControllerModuleEventcategories extends Controller {
	private $error = array();
    private $module='eventcategories';
	private $primary_key='category_id';
	private $table='event_categories';
	private $fields=array('category_name');
	private $fields_new=array('name');

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


		$this->load->language('module/eventcategories');
		$this->load->model('localisation/language');
        $languages = $this->model_localisation_language->getLanguages();

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			//$this->model_setting_setting->editSetting('eventcategories', $this->request->post);
///!!!zzz 2020-06-15 new variant with languages
            $true1 = false;
            foreach ($languages as $la) {
                foreach ($this->fields_new as $fn) {

                    if (isset($this->request->post[$fn . '_' . $la['language_id']])) {
                        if (!empty($this->db->escape($this->request->post[$fn . '_' . $la['language_id']]))) {
                      $true1 = true;
                      break;
                        }
                    }
                }
            }

if ($true1)            {
    $sql = "select max(category_id) as m from " . DB_PREFIX .$this->table;
    $q = $this->db->query($sql);
    $r = $q->row;
    $max_cat_id = intval($r['m']) + 1;
    foreach ($languages as $la) {
        $category_name = '';
        $sortorder = '100';
        if (isset($this->request->post['name_' . $la['language_id']])) {
            if (!empty($this->request->post['name_' . $la['language_id']])) {
                $category_name = $this->db->escape($this->request->post['name_' . $la['language_id']]);
            }
        }
        if (isset($this->request->post['sortorder_' . $la['language_id']])) {
            if (!empty($this->request->post['sortorder_' . $la['language_id']])) {
                $sortorder = $this->db->escape($this->request->post['sortorder_' . $la['language_id']]);
            }
        }
        if (!empty($category_name)) {
            $sql = "insert into " . DB_PREFIX . $this->table . " values(NULL,'$max_cat_id', '$category_name', '" . $la['language_id'] . "', '$sortorder')";
            $this->db->query($sql);
        }
    }
}
///!!!2020-06
elseif (isset($this->request->post['update_id'])) {
            if (!empty($this->request->post['update_id'])) {
                $cid = $this->db->escape($this->request->post['update_id']);
                $name = $this->db->escape($this->request->post['name']);
                $so = $this->db->escape($this->request->post['sortorder']);
                if (!empty($name)) {
                    $sql = "update " . DB_PREFIX . $this->table . " set category_name='$name', sortorder='$so' where id='$cid'";
                    $this->db->query($sql);
                }
            }
        }

else { //old style
///!!!2020-08-26
        foreach ($this->request->post as $k => $v) {
            if (preg_match('~city_id_(\d+)~', $k)) {
                $cid = $this->db->escape($v);
                $name = $this->db->escape($this->request->post['name_' . $v]);
                $so = $this->db->escape($this->request->post['sortorder_' . $v]);
                if (!empty($name) && !empty($so) && !empty($cid)) {
//echo $sql . "\n<br>";
                    $sql = "update " . DB_PREFIX . $this->table . " set category_name='$name', sortorder='$so' where id='$cid'";
                    $this->db->query($sql);
                }
            }
        }

			$sql = DB_PREFIX .$this->table;
			$sql.= " set ";
			$sql_columns=array();
			foreach($this->fields as $field)
			{
                if (!empty($this->db->escape($this->request->post['category']))) {
                    $sql_columns[]=$field."='".$this->db->escape($this->request->post['category'])."'";
                }
			}
            if (count($sql_columns) > 0) {
    			$sql.=implode(",",$sql_columns);
        		$sql.=$sql_where;
    			$this->db->query($sql);
            }
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('module/'.$this->module, 'token=' . $this->session->data['token'], true));
		} //POST
}
        
		if(isset($this->request->get[$this->primary_key])){
			$categorydata=$this->db->query("select * from ". DB_PREFIX .$this->table." WHERE ".$this->primary_key ."=".$this->request->get[$this->primary_key] ."");

			if($categorydata->num_rows){
				$data['categoryname']=$categorydata->row['category_name'];

			}

		}

		$this->load->model('localisation/language');
        $data['languages'] = $languages;
        
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
			'href' => $this->url->link('module/eventcategories', 'token=' . $this->session->data['token'], true)
		);

		if(isset($this->request->get[$this->primary_key]))
		$data['action'] = $this->url->link('module/'.$this->module,'&'.$this->primary_key.'='.$this->request->get[$this->primary_key].'&token=' . $this->session->data['token'], true);
		else
		$data['action'] = $this->url->link('module/'.$this->module, 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], true);

		if (isset($this->request->post['eventcategories_status'])) {
			$data['eventcategories_status'] = $this->request->post['eventcategories_status'];
		} else {
			$data['eventcategories_status'] = $this->config->get('eventcategories_status');
		}

		$data['header'] = $this->load->controller('common/header');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/eventcategories', $data));
	}



	public function delete(){
		$id=$this->request->get[$this->primary_key];
		$this->db->query("delete from ". DB_PREFIX ."". $this->table ." where ".$this->primary_key ."='". $id ."'");

		$this->response->redirect($this->url->link('module/eventcategories', 'token=' . $this->session->data['token'], true));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/eventcategories')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}
