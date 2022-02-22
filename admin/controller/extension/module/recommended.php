<?php
class ControllerExtensionModuleRecommended extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/recommended');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module');

        $this->load->model('catalog/product');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') ) {
            $this->request->post['status'] = true;
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('recommended', $this->request->post);
			} else {
//                $this->request->post['modules1']['product'] = false; //$this->model_catalog_product->getPromoProducts();
//                $this->request->post['modules2']['product'] = false; //$this->model_catalog_product->getProductsIDsByStatusId(11);
//                $this->request->post['modules4']['product'] = false; //$this->model_catalog_product->getProductsIDsByStatusId(6);
//                $this->request->post['modules5']['product'] = false; //$this->model_catalog_product->getProductsIDsByStatusId(12);
//                $this->model_catalog_product->getPromoProducts();
//                $this->model_catalog_product->getProductsIDsByStatusId(11);
//                $this->model_catalog_product->getProductsIDsByStatusId(6);
//                $this->model_catalog_product->getProductsIDsByStatusId(12);
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->cache->delete('product');
			$this->cache->delete('products1');
			$this->cache->delete('products2');
			$this->cache->delete('products3');
			$this->cache->delete('products4');
			$this->cache->delete('products5');

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
		}
        $data['token'] = $this->session->data['token'];
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_link'] = $this->language->get('entry_link');
		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_text_link'] = $this->language->get('entry_text_link');
		$data['entry_product'] = $this->language->get('entry_product');
		$data['entry_status'] = $this->language->get('entry_status');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

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

		if (isset($this->error['link'])) {
			$data['error_link'] = $this->error['link'];
		} else {
			$data['error_link'] = '';
		}

		if (isset($this->error['text_link'])) {
			$data['error_text_link'] = $this->error['text_link'];
		} else {
			$data['error_text_link'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/recommended', 'token=' . $this->session->data['token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/recommended', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/recommended', 'token=' . $this->session->data['token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/recommended', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}
        
        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($module_info)) {
            $data['name'] = $module_info['name'];
        } else {
            $data['name'] = '';
        }

		if (isset($this->request->post['modules1'])) {
			$data['modules1'] = $this->request->post['modules1'];
		} elseif (!empty($module_info)) {
			$data['modules1'] = $module_info['modules1'];
		} else {
			$data['modules1'] = NULL;
		}

        if(isset($data['modules1']['product']) && $data['modules1']['product'] && is_array($data['modules1']['product'])) {
            $modules1_product = array();
            foreach ($data['modules1']['product'] as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);
                if ($product_info) {
                    $modules1_product[] = array(
                        'product_id' => $product_info['product_id'],
                        'name' => $product_info['name']
                    );
                }
            }
            $data['modules1']['product'] = $modules1_product;
        } else {
            $data['modules1']['product'] = array();
        }

        if (isset($this->request->post['modules2'])) {
            $data['modules2'] = $this->request->post['modules2'];
        } elseif (!empty($module_info)) {
            $data['modules2'] = $module_info['modules2'];
        } else {
            $data['modules2'] = NULL;
        }

        if(isset($data['modules2']['product']) && $data['modules2']['product'] && is_array($data['modules2']['product'])) {
            $modules2_product = array();
            foreach ($data['modules2']['product'] as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);
                if ($product_info) {
                    $modules2_product[] = array(
                        'product_id' => $product_info['product_id'],
                        'name' => $product_info['name']
                    );
                }
            }
            $data['modules2']['product'] = $modules2_product;
        } else {
            $data['modules2']['product'] = array();
        }

        if (isset($this->request->post['modules3'])) {
            $data['modules3'] = $this->request->post['modules3'];
        } elseif (!empty($module_info)) {
            $data['modules3'] = $module_info['modules3'];
        } else {
            $data['modules3'] = NULL;
        }

        if (isset($this->request->post['modules4'])) {
            $data['modules4'] = $this->request->post['modules4'];
        } elseif (!empty($module_info)) {
            $data['modules4'] = $module_info['modules4'];
        } else {
            $data['modules4'] = NULL;
        }

        if(isset($data['modules4']['product']) && $data['modules4']['product'] && is_array($data['modules4']['product'])) {
            $modules4_product = array();
            foreach ($data['modules4']['product'] as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);

                if ($product_info) {
                    $modules4_product[] = array(
                        'product_id' => $product_info['product_id'],
                        'name' => $product_info['name']
                    );
                }
            }
            $data['modules4']['product'] = $modules4_product;
        } else {
            $data['modules4']['product'] = array();
        }

        if (isset($this->request->post['modules5'])) {
            $data['modules5'] = $this->request->post['modules5'];
        } elseif (!empty($module_info)) {
            $data['modules5'] = $module_info['modules5'];
        } else {
            $data['modules5'] = NULL;
        }

        if(isset($data['modules5']['product']) && $data['modules5']['product'] && is_array($data['modules5']['product'])) {
            $modules5_product = array();
            foreach ($data['modules5']['product'] as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);

                if ($product_info) {
                    $modules5_product[] = array(
                        'product_id' => $product_info['product_id'],
                        'name' => $product_info['name']
                    );
                }
            }
            $data['modules5']['product'] = $modules5_product;
        } else {
            $data['modules5']['product'] = array();
        }

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/recommended', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/recommended')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}
