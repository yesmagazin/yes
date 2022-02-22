<?php

class ControllerExtensionModuleSearchEngine extends Controller {

	private $a = array();

	public function index() {

		$b = $this->load->language('extension/module/search_engine');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');
		$this->load->model('extension/module/search_engine');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_setting_setting->editSetting('search_engine', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

					}

		if (isset($this->error['warning'])) {
			$b['error_warning'] = $this->error['warning'];
		} else {
			$b['error_warning'] = '';
		}

		if (isset($this->error['new_fields'])) {
			$b['error_new_fields'] = $this->error['new_fields'];
		} else {
			$b['error_new_fields'] = '';
		}
		
    if (isset($this->session->data['success'])) {
      $b['success'] = $this->session->data['success'];
      unset($this->session->data['success']);
    } else {
      $b['success'] = '';
    }

		$b['breadcrumbs'] = array();

		$b['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
		);

		$b['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'),
		);

		$b['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/search_engine', 'token=' . $this->session->data['token'], 'SSL'),
		);

		$b['action'] = $this->url->link('extension/module/search_engine', 'token=' . $this->session->data['token'], 'SSL');
		$b['delete'] = $this->url->link('extension/module/search_engine/delete', 'token=' . $this->session->data['token'], 'SSL');
		$b['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL');

		$this->load->model('localisation/language');
		$b['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['search_engine_status'])) {
			$b['search_engine_status'] = $this->request->post['search_engine_status'];
		} else {
			$b['search_engine_status'] = $this->config->get('search_engine_status');
		}

		if (isset($this->request->post['search_engine_options'])) {
			$b['options'] = $this->request->post['search_engine_options'];
		} elseif ($this->config->get('search_engine_options')) {
			$b['options'] = $this->config->get('search_engine_options');
		}

		$b['fields'] = $this->model_extension_module_search_engine->getFields($b['options']);
		
		$b['total_indexed'] = $this->model_extension_module_search_engine->getTotalIndexed();
		$b['total_not_indexed'] = $this->model_extension_module_search_engine->getTotalNotIndexed();
		
		$b['token'] = $this->session->data['token'];
		
		$b['header'] = $this->load->controller('common/header');
		$b['column_left'] = $this->load->controller('common/column_left');
		$b['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/search_engine.tpl', $b));
	}

	public function install() {

		$this->load->model('setting/setting');
		$this->load->model('extension/module/search_engine');

		$this->model_extension_module_search_engine->install();

		$this->model_setting_setting->deleteSetting('search_engine');

		$c['search_engine_options'] = $this->model_extension_module_search_engine->getDefaultOptions();
		
		$this->model_setting_setting->editSetting('search_engine', $c);		
	}

	public function uninstall() {

		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('search_engine');
		$this->load->model('extension/module/search_engine');
		$this->model_extension_module_search_engine->uninstall();
	}

	public function add() {
		
		$this->load->language('extension/module/search_engine');
		
		$this->load->model('extension/module/search_engine');
		
		$d = array();
		
		$e = 100;
		
		if ($this->validate()) {
			
			$f = $this->model_extension_module_search_engine->getTotalNotIndexed();
			
			if ($f == 0) {

				$d['progress'] = 100;
				$d['success'] = $this->language->get('text_success_index');
				
				unset($this->session->data['indexing_process']);				
				
			} else {
			
				if (!isset ($this->session->data['indexing_process'])) {
					$this->session->data['indexing_process'] = array();
					$this->session->data['indexing_process']['start_not_indexed'] = $f;
				}

				$g = $this->session->data['indexing_process'];

				$h = number_format(($g['start_not_indexed'] - $f) * 100 / $g['start_not_indexed'], 2);
				
				if ($h < 100) {

					$a = $this->model_extension_module_search_engine->addIndexes($e);														
					if ($a) {
						$d['error'] = $a;
					}
					
					$f = $this->model_extension_module_search_engine->getTotalNotIndexed();				
					$h = number_format(($g['start_not_indexed'] - $f) * 100 / $g['start_not_indexed'], 2);										
				}	
				
				$d['progress'] = $h;
				
				if ($h >= 100) {
					$d['success'] = $this->language->get('text_success_index');;					
				} else {
					$d['text'] = sprintf($this->language->get('text_index_progress'), $h);
				}
			}
		} else {
			$d['error'] = $this->error['warning'];
		}		
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($d));
	}
	
	public function stop() {		
		unset($this->session->data['indexing_process']);				
	}
	
	public function getTotals() {		
		$this->load->model('extension/module/search_engine');
		
		$d = array();
		
		$d['total_indexed'] = $this->model_extension_module_search_engine->getTotalIndexed();
		$d['total_not_indexed'] = $this->model_extension_module_search_engine->getTotalNotIndexed();
	
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($d));
	}
	
	public function delete() {
		
		if ($this->validate()) {
			$this->load->model('extension/module/search_engine');
			$this->model_extension_module_search_engine->deleteIndexes();
		}
		
		$this->response->redirect($this->url->link('extension/module/search_engine', 'token=' . $this->session->data['token'], 'SSL'));
	}
	
	private function validate() {

		if (!$this->user->hasPermission('modify', 'extension/module/search_engine')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!empty($this->request->post['search_engine_options']['new_fields'])) {
			foreach ($this->request->post['search_engine_options']['new_fields'] as $i) {
				if ((utf8_strlen(trim($i['field'])) < 1)) {
					$this->error['new_fields'][$i['field']] = $this->language->get('error_field');
					$this->error['warning'] = $this->language->get('error_warning');
				}
			}
		}

		return!$this->error ? true : false;
	}

}
//author sv2109 (sv2109@gmail.com) license for 1 product copy granted for lexkom (oleksii.komlev@gmail.com yes-tm.com,www.yes-tm.com)
