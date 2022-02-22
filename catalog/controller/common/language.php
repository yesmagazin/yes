<?php
class ControllerCommonLanguage extends Controller {
	public function index() {
		$this->load->language('common/language');

        /**
         * Set language to Cookies by URL
         */
//        if ( substr( $_REQUEST[ '_route_' ], 0, 3 ) == 'ru/' && !isset($this->request->post['code']) ) {
//            $this->session->data['language'] = 'ru';
//        } else if ( substr( $_REQUEST[ '_route_' ], 0, 3 ) == 'en/' && !isset($this->request->post['code']) ) {
//            $this->session->data['language'] = 'en';
//        } else if ( substr( $_REQUEST[ '_route_' ], 0, 3 ) != 'ru/' && substr( $_REQUEST[ '_route_' ], 0, 3 ) != 'en/' && !isset($this->request->post['code']) ) {
//            $this->session->data['language'] = 'ua';
//        }

		$data['text_language'] = $this->language->get('text_language');

		$data['action'] = $this->url->link('common/language/language', '', isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1')));

		$data['code'] = $this->session->data['language'];

		$this->load->model('localisation/language');

		$data['languages'] = array();

        $results = $this->model_localisation_language->getLanguages();

        $data['active'] = '';

        foreach ($results as $result) {
            if ($result['status']) {
                if ($result['code'] == $data['code']){
                    $data['active'] = $result['name'];
                }
                $data['languages'][] = array(
                    'name' => $result['name'],
                    'code' => $result['code']
                );
            }
        }

        //$data['languages_']

		if (!isset($this->request->get['route'])) {
			$data['redirect'] = $this->url->link('common/home');
		} else {
			$url_data = $this->request->get;

			$route = $url_data['route'];

			unset($url_data['route']);

			$url = '';

			if ($url_data) {
				$url = '&' . urldecode(http_build_query($url_data, '', '&'));
			}

			$data['redirect'] = $this->url->link($route, $url, isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1')));
		}

        return array('d'=>$this->load->view('common/language', $data),'m'=>$this->load->view('common/languagem', $data));
	}

	public function language() {
//        var_dump($this->request->post['code']);
//        var_dump($_REQUEST[ '_route_' ]); exit;
		if (isset($this->request->post['code'])) {
			$this->session->data['language'] = $this->request->post['code'];
            $this->session->data['language_changed'] = 1;
		}

		if (isset($this->request->post['redirect'])) {
			$this->response->redirect($this->request->post['redirect']);
		} else {
			$this->response->redirect($this->url->link('common/home'));
		}
	}
}