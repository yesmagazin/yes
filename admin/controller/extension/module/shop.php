<?php
	class ControllerExtensionModuleShop extends Controller{
		
		private $error = array();
		
		public function install() {
			
			$this->load->model('user/user_group');
			
			$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'extension/module/shop');
			$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'extension/module/shop');
			
			$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "shop` (
			    `shop_id` int(11) NOT NULL AUTO_INCREMENT,
			    `name` varchar(128) NOT NULL,
			    `phone` varchar(255) NOT NULL,
			    `contact` varchar(255) NOT NULL,
			    `image` varchar(255) NOT NULL,
			    `status` tinyint(1) NOT NULL DEFAULT '0',
			    `date_added` datetime NOT NULL,
			    `filename` varchar(160) NOT NULL,
			    `conditions` varchar(255) NOT NULL,
                `sort` int(11) NOT NULL DEFAULT '0',
                PRIMARY KEY (`shop_id`)
            )");
			
			$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "shop_description` (
	            `id` int(11) NOT NULL AUTO_INCREMENT,
			    `shop_id` int(11) NOT NULL,
			    `model` varchar(255) NOT NULL,
			    `price` int(11) NOT NULL,
			    `url` varchar(255) NOT NULL,
			    `product_id` int(11) NOT NULL,
	            PRIMARY KEY (`id`)
            )");
		}
		
		public function uninstall() {
			$this->db->query("DROP TABLE IF EXISTS`" . DB_PREFIX . "shop`");
			$this->db->query("DROP TABLE IF EXISTS`" . DB_PREFIX . "shop_description`");
            
            $this->model_user_user_group->removePermission($this->user->getId(), 'access', 'extension/module/shop');
			$this->model_user_user_group->removePermission($this->user->getId(), 'modify', 'extension/module/shop');
            
		}
		
		
		public function index(){
			$this->load->language('extension/module/shop');
			
			$this->load->model('setting/setting');
			
			// Добавление в модуля в схемы
			$this->model_setting_setting->editSetting('shop', array('shop_status' => '1'));
			
			$this->document->setTitle($this->language->get('heading_title'));
			
			$this->getList();
			
		}
		
		public function add(){
			$this->load->language('extension/module/shop');
			
			$this->load->model('extension/module/shop');
			
			$this->document->setTitle($this->language->get('heading_title'));
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
				
				$this->model_extension_module_shop->addShop($this->request->post);
				
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true));
			}
			
			$this->getForm();
		}
		
		public function view(){
			$this->load->language('extension/module/shop');
			
			$this->document->setTitle($this->language->get('heading_title'));
			
			$this->getView();
		}
		
		public function edit(){
			$this->load->language('extension/module/shop');
			
			$this->document->setTitle($this->language->get('heading_title'));
			
			$this->load->model('extension/module/shop');
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
				$this->model_extension_module_shop->editShop($this->request->get['shop_id'], $this->request->post);
				
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true));
			}
			
			$this->getForm();
		}
		
		public function update(){
            $this->load->language('extension/module/shop');

            $this->load->model('extension/module/shop');

            $this->model_extension_module_shop->removeShopProdcut($this->request->get['shop_id']);
            
			$filename = DIR_DOWNLOAD . "exel/" . $this->model_extension_module_shop->getFile($this->request->get['shop_id']);
			
			if (!file_exists($filename)) {
				
				$this->session->data['warning'] = $this->language->get('error_no_file');
				
				$this->response->redirect($this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true));
			}
			
			// Подключаем класс
			require_once( DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php' );
            // Открываем файл
            $xls = PHPExcel_IOFactory::load($filename);
            // Устанавливаем индекс активного листа
            $xls->setActiveSheetIndex(0);
            // Получаем активный лист
            $sheet = $xls->getActiveSheet();
            
            // Поиск индекса колонки по имени
            function findColumn($name, $sheet){
	            $a = $sheet->getHighestColumn();
	            
	            $highestColumn = PHPExcel_Cell::columnIndexFromString($a);

                for ($i = 0; $i < $highestColumn; $i++){
                    if($sheet->getCellByColumnAndRow($i, 1)->getValue() == $name){
                        return $i;
                    }
                }
            }

            $highestRow = $sheet->getHighestRow();
			
			$data = array();
            
            for ($i = 2; $i <= $highestRow; $i++) {
            	
            	$model = $sheet->getCellByColumnAndRow(0, $i)->getValue();
	            $price = $sheet->getCellByColumnAndRow(1, $i)->getValue();
	            $url   = $sheet->getCellByColumnAndRow(2, $i)->getValue();

	            if(empty($model) || empty($price) || empty($url)) {
	            	continue;
	            }
	            
	            $currentModel = $this->model_extension_module_shop->getProductModel($model);
	            
	            if(isset($currentModel['product_id'])) {
		            $data[] = array(
			            'shop_id'    => (int)$this->request->get['shop_id'],
			            'model'      => $model,
			            'price'      => (int)$price,
			            'url'        => $url,
			            'product_id' => (int)$currentModel['product_id']
		            );
	            }
            }
            if(!$data){
            	
	            $this->session->data['warning'] = $this->language->get('error_bad_file');
	            
	            $this->response->redirect($this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true));
	            
            }
            
            $a = $this->model_extension_module_shop->addShopProdcut($data);

            $this->session->data['success'] = sprintf($this->language->get('text_update'), $a);
            
            $this->response->redirect($this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true));
            
		}
		
		protected function validateForm(){
			if (!$this->user->hasPermission('modify', 'extension/module/shop')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
			
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
				$this->error['name'] = $this->language->get('error_name');
			}
            
            if ((utf8_strlen($this->request->post['contact']) < 3) || (utf8_strlen($this->request->post['contact']) > 64)) {
				$this->error['contact'] = $this->language->get('error_contact');
			}

            if ((utf8_strlen($this->request->post['conditions']) < 3) || (utf8_strlen($this->request->post['conditions']) > 255)) {
				$this->error['conditions'] = $this->language->get('error_conditions');
			}
			
			
			if ((utf8_strlen($this->request->post['filename']) < 3) || (utf8_strlen($this->request->post['filename']) > 128)) {
				$this->error['filename'] = $this->language->get('error_filename');
			}
			
			if (!is_file(DIR_DOWNLOAD . "exel/" . $this->request->post['filename'])) {
				$this->error['filename'] = $this->language->get('error_exists');
			}
			
			return !$this->error;
		}
		
		protected function validateDelete() {
			if (!$this->user->hasPermission('modify', 'extension/module/shop')) {
				$this->error['warning'] = $this->language->get('error_permission');
			}
			
			return !$this->error;
		}
		
		public function delete() {
			$this->load->language('extension/module/shop');
			
			$this->document->setTitle($this->language->get('heading_title'));
			
			$this->load->model('extension/module/shop');
			
			if (isset($this->request->post['selected']) && $this->validateDelete()) {
				foreach ($this->request->post['selected'] as $shop_id) {
					$this->model_extension_module_shop->deleteShop($shop_id);
				}
				
				$this->session->data['success'] = $this->language->get('text_success');
				
				$this->response->redirect($this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true));
			}
			
			$this->getList();
		}
		
		public function upload(){
			
			$this->load->language('catalog/download');
			
			$json = array();
			
			if (!$json) {
				if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
					// Sanitize the filename
					$filename = basename(html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8'));
					
					// Validate the filename length
					if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 128)) {
						$json['error'] = $this->language->get('error_filename');
					}
					
					// Allowed file extension types
					$allowed = array();
					
					$extension_allowed = "xls,xlsx";
					
					$filetypes = explode(",", $extension_allowed);
					
					foreach ($filetypes as $filetype) {
						$allowed[] = trim($filetype);
					}
					
					if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
						$json['error'] = $this->language->get('error_filetype');
					}
					
					// Allowed file mime types
					$allowed = array();
					
					$mime_allowed = "application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
					
					$filetypes = explode(",", $mime_allowed);
					
					foreach ($filetypes as $filetype) {
						$allowed[] = trim($filetype);
					}
					
					if (!in_array($this->request->files['file']['type'], $allowed)) {
						$json['error'] = $this->language->get('error_filetype');
					}
					
					// Check to see if any PHP files are trying to be uploaded
					$content = file_get_contents($this->request->files['file']['tmp_name']);
					
					if (preg_match('/\<\?php/i', $content)) {
						$json['error'] = $this->language->get('error_filetype');
					}
					
					// Return any upload error
					if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
						$json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
					}
				} else {
					$json['error'] = $this->language->get('error_upload');
				}
			}
			
			if (!$json) {
				
				function getExtension($name) {
					return substr(strrchr($name, '.'), 1);
				}
				
				$file = date("mdyHis") . "." . getExtension($filename);
				
				// Проверка наличия папки
				if(!is_dir(DIR_DOWNLOAD . "exel")) mkdir(DIR_DOWNLOAD . "exel") ;
				
				move_uploaded_file($this->request->files['file']['tmp_name'], DIR_DOWNLOAD . "exel/" . $file);
				
				$json['filename'] = $file;
				
				$json['success'] = $this->language->get('text_upload');
			}
			
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
		
		protected function getForm(){
			if (isset($this->error['warning'])) {
				$data['error_warning'] = $this->error['warning'];
			} else {
				$data['error_warning'] = '';
			}
			
			if (isset($this->error['name'])) {
				$data['error_name'] = $this->error['name'];
			} else {
				$data['error_name'] = '';
			}
            
            if (isset($this->error['contact'])) {
				$data['error_contact'] = $this->error['contact'];
			} else {
				$data['error_contact'] = '';
			}

            if (isset($this->error['conditions'])) {
				$data['error_conditions'] = $this->error['conditions'];
			} else {
				$data['error_conditions'] = '';
			}
			
			if (isset($this->error['filename'])) {
				$data['error_filename'] = $this->error['filename'];
			} else {
				$data['error_filename'] = '';
			}
			
			// Breadcrumbs
			
			$data['breadcrumbs'] = array();
			
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
			);
			
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true)
			);
			
			// Language
			$data['heading_title'] = $this->language->get('heading_title');
			$data['button_save'] = $this->language->get('button_save');
			$data['button_cancel'] = $this->language->get('button_cancel');
			$data['text_form'] = !isset($this->request->get['magazin_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
			$data['text_none'] = $this->language->get('text_none');
			$data['text_yes'] = $this->language->get('text_yes');
			$data['text_no'] = $this->language->get('text_no');
			$data['text_plus'] = $this->language->get('text_plus');
			$data['text_minus'] = $this->language->get('text_minus');
			$data['text_default'] = $this->language->get('text_default');
			$data['text_enabled'] = $this->language->get('text_enabled');
			$data['text_disabled'] = $this->language->get('text_disabled');
			$data['entry_name'] = $this->language->get('entry_name');
			$data['entry_contact'] = $this->language->get('entry_contact');
			$data['entry_conditions'] = $this->language->get('entry_conditions');
			$data['entry_phone'] = $this->language->get('entry_phone');
			$data['entry_status'] = $this->language->get('entry_status');
            $data['entry_price'] = $this->language->get('entry_price');
			$data['entry_image'] = $this->language->get('entry_image');
			$data['entry_file'] = $this->language->get('entry_file');
			$data['entry_url'] = $this->language->get('entry_url');
			$data['button_upload'] = $this->language->get('button_upload');
            $data['entry_sort'] = $this->language->get('entry_sort');
			$data['text_loading'] = $this->language->get('text_loading');
			$data['token'] = $this->session->data['token'];
			
			$this->load->model('extension/module/shop');
			
			if (isset($this->request->get['shop_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
				$shop_info = $this->model_extension_module_shop->getShop($this->request->get['shop_id']);
			}
			
			if (isset($this->request->post['name'])) {
				$data['name'] = $this->request->post['name'];
			} elseif (!empty($shop_info)) {
				$data['name'] = $shop_info['name'];
			} else {
				$data['name'] = '';
			}
			
			if (isset($this->request->post['contact'])) {
				$data['contact'] = $this->request->post['contact'];
			} elseif (!empty($shop_info)) {
				$data['contact'] = $shop_info['contact'];
			} else {
				$data['contact'] = '';
			}
			
			if (isset($this->request->post['phone'])) {
				$data['phone'] = $this->request->post['phone'];
			} elseif (!empty($shop_info)) {
				$data['phone'] = $shop_info['phone'];
			} else {
				$data['phone'] = '';
			}

			if (isset($this->request->post['href'])) {
				$data['href'] = $this->request->post['href'];
			} elseif (!empty($shop_info)) {
				$data['href'] = $shop_info['href'];
			} else {
				$data['href'] = '';
			}

			if (isset($this->request->post['conditions'])) {
				$data['conditions'] = $this->request->post['conditions'];
			} elseif (!empty($shop_info)) {
				$data['conditions'] = $shop_info['conditions'];
			} else {
				$data['conditions'] = '';
			}
			
            if (isset($this->request->post['sort'])) {
				$data['sort'] = $this->request->post['sort'];
			} elseif (!empty($shop_info)) {
				$data['sort'] = $shop_info['sort'];
			} else {
				$data['sort'] = '0';
			}
            
			if (!isset($this->request->get['shop_id'])) {
				$data['action'] = $this->url->link('extension/module/shop/add', 'token=' . $this->session->data['token'], true);
			} else {
				$data['action'] = $this->url->link('extension/module/shop/edit', 'token=' . $this->session->data['token'] . '&shop_id=' . $this->request->get['shop_id'], true);
			}
			
			$this->load->model('tool/image');
			
			if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
				$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
			} else {
				$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
			}
			
			// Image
			if (isset($this->request->post['image'])) {
				$data['image'] = $this->request->post['image'];
			} elseif (!empty($shop_info)) {
				$data['image'] = $shop_info['image'];
			} else {
				$data['image'] = '';
			}
			
			if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
				$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
			} elseif (!empty($shop_info) && is_file(DIR_IMAGE . $shop_info['image'])) {
				$data['thumb'] = $this->model_tool_image->resize($shop_info['image'], 100, 100);
			} else {
				$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
			}
			
			if (isset($this->request->post['filename'])) {
				$data['filename'] = $this->request->post['filename'];
			} elseif (!empty($shop_info)) {
				$data['filename'] = $shop_info['filename'];
			} else {
				$data['filename'] = '';
			}
            
            if (isset($this->request->post['status_price'])) {
				$data['status_price'] = $this->request->post['status_price'];
			} elseif (!empty($shop_info)) {
				$data['status_price'] = $shop_info['status_price'];
			} else {
				$data['status_price'] = true;
			}
			
			if (isset($this->request->post['status'])) {
				$data['status'] = $this->request->post['status'];
			} elseif (!empty($shop_info)) {
				$data['status'] = $shop_info['status'];
			} else {
				$data['status'] = true;
			}
			
			$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
			
			$data['cancel'] = $this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true);
			
			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			
			$this->response->setOutput($this->load->view('extension/module/shop_form', $data));
		}
		
		protected function getView(){
			
			$this->load->language('extension/module/shop');
			
			$data['heading_title'] = $this->language->get('heading_title');
			$data['column_model'] = $this->language->get('column_model');
			$data['column_price'] = $this->language->get('column_price');
			$data['column_url'] = $this->language->get('column_url');
			$data['text_list'] = $this->language->get('text_list');
			$data['text_no_results'] = $this->language->get('text_no_results');
			$data['button_cancel'] = $this->language->get('button_cancel');
			
			$data['cancel'] = $this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true);
			
			$data['breadcrumbs'] = array();
			
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
			);
			
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true)
			);
			
			$this->load->model('extension/module/shop');
			
			$data['shops'] = array();
			
			$results = $this->model_extension_module_shop->getShopProducts($this->request->get['shop_id']);
			
			foreach ($results as $result) {
				
				$data['shops'][] = array(
					'model'   => $result['model'],
					'price'    => $result['price'],
					'url' => $result['url']
				);
				
			}
			
			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			
			$this->response->setOutput($this->load->view('extension/module/shop_view', $data));
			
		}
		
		protected function getList(){
			
			$this->load->language('extension/module/shop');
			
			$data['heading_title'] = $this->language->get('heading_title');
			$data['text_list'] = $this->language->get('text_list');
			$data['text_no_results'] = $this->language->get('text_no_results');
			$data['text_confirm'] = $this->language->get('text_confirm');
			$data['column_image'] = $this->language->get('column_image');
			$data['column_name'] = $this->language->get('column_name');
			$data['column_phone'] = $this->language->get('column_phone');
			$data['column_contact'] = $this->language->get('column_contact');
			$data['column_status'] = $this->language->get('column_status');
			$data['column_action'] = $this->language->get('column_action');
			$data['button_add'] = $this->language->get('button_add');
			$data['button_edit'] = $this->language->get('button_edit');
			$data['button_delete'] = $this->language->get('button_delete');
            $data['entry_sort'] = $this->language->get('entry_sort');
			
			$data['token'] = $this->session->data['token'];
			
			if (isset($this->session->data['warning'])) {
				$data['warning'] = $this->session->data['warning'];
				unset($this->session->data['warning']);
			} else {
				$data['warning'] = '';
			}
			
			if (isset($this->session->data['success'])) {
				$data['success'] = $this->session->data['success'];
				unset($this->session->data['success']);
			} else {
				$data['success'] = '';
			}
			
			if (isset($this->request->post['selected'])) {
				$data['selected'] = (array)$this->request->post['selected'];
			} else {
				$data['selected'] = array();
			}
			
			$data['breadcrumbs'] = array();
			
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
			);
			
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/shop', 'token=' . $this->session->data['token'], true)
			);
			
			$this->load->model('extension/module/shop');
			
			$this->load->model('tool/image');

			$data['shops'] = array();
			
			$shops_total = $this->model_extension_module_shop->getTotalShops();
			
			$results = $this->model_extension_module_shop->getShops();
			
			foreach ($results as $result) {
				
				if (is_file(DIR_IMAGE . $result['image'])) {
					$image = $this->model_tool_image->resize($result['image'], 40, 40);
				} else {
					$image = $this->model_tool_image->resize('no_image.png', 40, 40);
				}
				
				$data['shops'][] = array(
					'shop_id' => $result['shop_id'],
					'name'    => $result['name'],
					'contact' => $result['contact'],
                    'sort'    => $result['sort'],
					'phone'   => $result['phone'],
					'image'   => $image,
					'status'  => $result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'view'    => $this->url->link('extension/module/shop/view', 'token=' . $this->session->data['token'] . '&shop_id=' . $result['shop_id'], true),
					'edit'    => $this->url->link('extension/module/shop/edit', 'token=' . $this->session->data['token'] . '&shop_id=' . $result['shop_id'], true),
					'update'  => $this->url->link('extension/module/shop/update', 'token=' . $this->session->data['token'] . '&shop_id=' . $result['shop_id'], true)
				);
				
			}
			
			$data['add'] = $this->url->link('extension/module/shop/add', 'token=' . $this->session->data['token'], true);
			$data['delete'] = $this->url->link('extension/module/shop/delete', 'token=' . $this->session->data['token'], true);
			
			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			
			$this->response->setOutput($this->load->view('extension/module/shop_list', $data));
			
		}
		
	}
