<?php
class ControllerCommonHeader extends Controller {
	public function index() {
		// Analytics
		//$this->load->model('extension/extension');

		/*$data['analytics'] = array();

		$analytics = $this->model_extension_extension->getExtensions('analytics');

		foreach ($analytics as $analytic) {
			if ($this->config->get($analytic['code'] . '_status')) {
				$data['analytics'][] = $this->load->controller('extension/analytics/' . $analytic['code'], $this->config->get($analytic['code'] . '_status'));
			}
		}*/
///test from dev
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $ttext_about_brandhis->config->get('config_url');
		}

		/*if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->document->addLink($server . 'image/' . $this->config->get('config_icon'), 'icon');
		}*/

		$data['title'] = $this->document->getTitle();

		$data['base'] = $server;
		$data['siteTitle'] = $this->config->get('config_name');
		$data['description'] = $this->document->getDescription();
		/* Статии в меню*/
		//$this->load->model('catalog/information');

		/*$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}*/
		
		/* Статии в меню*/
		
		
		
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		if ( $this->customMetaTagsTemplate() ) {
            $data['links'] = array();
        }
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts();

    // OCFilter start
    $data['noindex'] = $this->document->isNoindex();
    // OCFilter end
      
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$data['name'] = $this->config->get('config_name');

		/*if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}*/

		$this->load->language('common/header');
		$data['og_url'] = (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1')) ? HTTPS_SERVER : HTTP_SERVER) . substr($this->request->server['REQUEST_URI'], 1, (strlen($this->request->server['REQUEST_URI'])-1));
		$data['og_image'] = $this->document->getOgImage();

        /**
         * Custom Meta Tags
         */
        $metaTagsTemplate = $this->customMetaTagsTemplate();
        if ( ! empty( $metaTagsTemplate ) ) {
//            var_dump($metaTagsTemplate);
//            var_dump($data['description']);
            if ( ( empty( $data['title'] ) && isset($metaTagsTemplate['default']) && ! empty( $metaTagsTemplate[ 'title' ] ) ) || ( !isset($metaTagsTemplate['default']) && ! empty( $metaTagsTemplate[ 'title' ] ) ) )
                $data['title'] = $metaTagsTemplate[ 'title' ];
            if ( ( empty( $data['description'] ) && isset($metaTagsTemplate['default']) && ! empty( $metaTagsTemplate[ 'description' ] ) ) || ( !isset($metaTagsTemplate['default']) && ! empty( $metaTagsTemplate[ 'description' ] ) ) )
                $data['description'] = $metaTagsTemplate[ 'description' ];
            if ( ! empty( $metaTagsTemplate[ 'h1' ] ) )
                $data['h1'] = $metaTagsTemplate[ 'h1' ];
        }


		$data['text_home'] = $this->language->get('text_home');

		$data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', true), $this->customer->getFirstName(), $this->url->link('account/logout', '', true));

		$data['text_account'] = $this->language->get('text_account');
		$data['text_register'] = $this->language->get('text_register');
		$data['text_login'] = $this->language->get('text_login');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_transaction'] = $this->language->get('text_transaction');
		$data['text_download'] = $this->language->get('text_download');
		$data['text_logout'] = $this->language->get('text_logout');
		$data['text_checkout'] = $this->language->get('text_checkout');
		$data['text_page'] = $this->language->get('text_page');
		$data['text_category'] = $this->language->get('text_category');
		$data['text_catalog'] = $this->language->get('text_catalog');
		$data['text_catalog1'] = $this->language->get('text_catalog1');
		$data['text_catalog2'] = $this->language->get('text_catalog2');
        $data['text_blog'] = $this->language->get('text_blog');
        $data['text_collections'] = $this->language->get('text_collections');
        $data['text_about_brand'] = $this->language->get('text_about_brand');
        $data['text_where_to_buy'] = $this->language->get('text_where_to_buy');
        $data['text_contacts'] = $this->language->get('text_contacts');
		$data['text_all'] = $this->language->get('text_all');
        $data['text_search'] = $this->language->get('text_search');
        $data['back_text'] = $this->language->get('back_text');
		$data['href_all'] = $this->url->link('product/allcategory');

		$data['home'] = $this->url->link('common/home');
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', true);
		$data['register'] = $this->url->link('account/register', '', true);
		$data['login'] = $this->url->link('account/login', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['link_blog'] = $this->url->link('newsblog/all', '', true);
		$data['transaction'] = $this->url->link('account/transaction', '', true);
		$data['download'] = $this->url->link('account/download', '', true);
		$data['logout'] = $this->url->link('account/logout', '', true);
		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout', '', true);
		$data['contact'] = $this->url->link('information/contact');
		$data['telephone'] = $this->config->get('config_telephone');
        $data['url_search'] = $this->url->link('product/search', '', true);

        
                $this->load->language('product/allproduct');
                $data['categories'][] = array(
                    'name'     => $this->language->get('all_product'),
                    'children' => "",
                    'column'   => 1,
                    'href'     => $this->url->link('product/allproduct')
                );
            

        $this->adata->headercategories = $data['categories'] = $this->getHeaderCategories();

        if($this->adata->user_city && isset($this->adata->city_contacts) && isset($this->adata->city_contacts[$this->adata->user_city])){
            $data['popup_city'] = $this->adata->city_contacts[$this->adata->user_city]['category_name'];
        } else {
            $data['popup_city'] = false;
        }
        $data['infolinks'] = $this->adata->infolinks;
		$data['mobtab'] = $this->mobtab;

      	$this->load->model('actnew/category');
        $this->load->model('actnew/article');

		$data['actnew_categories'] = array();

		$categories = $this->model_actnew_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['settings']) {
				$settings=unserialize($category['settings']);
				if ($settings['show_in_top']==0) continue;
			}

			$articles = array();

			if ($category['settings'] && $settings['show_in_top_articles']) {
				$filter=array('filter_category_id'=>$category['category_id'],'filter_sub_category'=>true);
				$results = $this->model_actnew_article->getArticles($filter);

				foreach ($results as $result) {
					$articles[] = array(
						'name'        => $result['name'],
						'href'        => $this->url->link('actnew/article', 'actnew_path=' . $category['category_id'] . '&actnew_article_id=' . $result['article_id'])
					);
				}
            }
			$data['categories'][] = array(
				'name'     => $category['name'],
				'children' => $articles,
				'column'   => 1,
				'href'     => $this->url->link('actnew/category', 'actnew_path=' . $category['category_id'])
			);
		}
		

      	$this->load->model('newsblog/category');
        $this->load->model('newsblog/article');

		$data['newsblog_categories'] = array();

		$categories = $this->model_newsblog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['settings']) {
				$settings=unserialize($category['settings']);
				if ($settings['show_in_top']==0) continue;
			}

			$articles = array();

			if ($category['settings'] && $settings['show_in_top_articles']) {
				$filter=array('filter_category_id'=>$category['category_id'],'filter_sub_category'=>true);
				$results = $this->model_newsblog_article->getArticles($filter);

				foreach ($results as $result) {
					$articles[] = array(
						'name'        => $result['name'],
						'href'        => $this->url->link('newsblog/article', 'newsblog_path=' . $category['category_id'] . '&newsblog_article_id=' . $result['article_id'])
					);
				}
            }
			$data['categories'][] = array(
				'name'     => $category['name'],
				'children' => $articles,
				'column'   => 1,
				'href'     => $this->url->link('newsblog/category', 'newsblog_path=' . $category['category_id'])
			);
		}
		
		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['search'] = $this->load->controller('common/search');
		$data['cart'] = $this->load->controller('common/cart');
        if (isset($this->request->get['search'])) {
            $data['mobsearch'] = $this->request->get['search'];
        } else {
            $data['mobsearch'] = '';
        }
		// For page specific css
		if (isset($this->request->get['route'])) {
			if (isset($this->request->get['product_id'])) {
				$class = '-' . $this->request->get['product_id'];
			} elseif (isset($this->request->get['path'])) {
				$class = '-' . $this->request->get['path'];
			} elseif (isset($this->request->get['manufacturer_id'])) {
				$class = '-' . $this->request->get['manufacturer_id'];
			} elseif (isset($this->request->get['information_id'])) {
				$class = '-' . $this->request->get['information_id'];
			} else {
				$class = '';
			}

			$data['class'] = str_replace('/', '-', $this->request->get['route']) . $class;
		} else {
			$data['class'] = 'common-home';
		}

		$newMenuStructure = $this->getHeaderMenuStructure();
		$data['new_menu'] = $this->load->view('common/new_menu', $newMenuStructure);

		return $this->load->view('common/header', $data);
	}

	public function getHeaderCategories(){
        $language_id = (int)$this->config->get('config_language_id');
        if($categories = $this->cache->get('headercategories')){
            return $categories[$language_id];
        } else {
            $this->load->model('catalog/category');
            if($categories = $this->model_catalog_category->getCategoriesMod()){
                $this->load->model('tool/image');
                $all_cats = $cat_data = $parents = array();
                foreach ($categories as &$category) {
                    if ($category['top']) {
                        $all_cats[$category['language_id']][$category['category_id']] = array(
                            'category_id' => $category['category_id'],
                            'image' => $this->model_tool_image->resize($category['image'], 416, 214),
                            'name'  => trim($category['name']),
                            'href'  => $this->url->link('product/category', 'path=' . $category['category_id']),
                            'children' => array()
                        );
                    }
                }
                $parents = array_keys($all_cats[1]);
                $cat_data = $all_cats[$language_id];
                if($parents && ($children = $this->model_catalog_category->getChildrenCategoriesByParentIDs($parents))) {
                    foreach ($children as $child) {
                        if (isset($all_cats[$child['language_id']][$child['parent_id']])) {
                            $all_cats[$child['language_id']][$child['parent_id']]['children'][] = array(
                                'name' => trim($child['name']),
                                'href' => $this->url->link('product/category', 'path=' . $child['category_id'])
                            );
                        }
                        if ($child['language_id'] == $language_id && isset($cat_data[$child['parent_id']])) {
                            $cat_data[$child['parent_id']]['children'][] = array(
                                'name' => trim($child['name']),
                                'href' => $this->url->link('product/category', 'path=' . $child['category_id'])
                            );
                        }
                    }
                }
                $this->cache->set('headercategories',$all_cats,86400);
                return $cat_data;
            }
        }
        return false;
    }

    public function getHeaderMenuStructure() {
        $language_id = (int)$this->config->get('config_language_id');
        $this->load->language('common/header');
        $structure = array(
            // array( 'title' => '', 'url' => '' ),
            // ru
            1 => array(
                array(
                    'title' => 'Рюкзаки и сумки',
                    'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/',
                    'children' => array(
                        array( 'title' => 'Рюкзаки для девочек', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/pol/dlja-nee/' ),
                        array( 'title' => 'Рюкзаки для мальчиков', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/pol/dlja-nego/' ),
                        array(
                            'title' => 'Детские рюкзаки',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-kids/',
                            'children' => array(
                                array( 'title' => 'Детские рюкзаки для девочек', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee/' ),
                                array( 'title' => 'Детские рюкзаки для мальчиков', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego/' ),
                                array( 'title' => 'Спортивные детские рюкзаки', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/sportivni-sumki/tip/rjukzak-sport/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки дошкольные',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-kids/vozrast-let/3-5/',
                            'children' => array(
                                array( 'title' => 'Дошкольные рюкзаки для девочек', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee/vozrast-let/3-5/' ),
                                array( 'title' => 'Дошкольные рюкзаки для мальчиков', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego/vozrast-let/3-5/' ),
                            ),
                        ),
                        array(
                            'title' => 'Школьные рюкзаки',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/',
                            'children' => array(
                                array( 'title' => 'Рюкзаки для первоклассников', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/6-9/' ),
                                array( 'title' => 'Рюкзаки для 5 класса', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/10-13/' ),
                                array( 'title' => 'Рюкзаки школьные для подростков', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/14-18/10-13/' ),
                                array( 'title' => 'Рюкзаки для школы девочкам подросткам', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee/vozrast-let/14-18/10-13/' ),
                                array( 'title' => 'Рюкзаки для мальчиков подростков в школу', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego/vozrast-let/14-18/10-13/' ),
                                array( 'title' => 'Рюкзаки школьные для девочек', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee/' ),
                                array( 'title' => 'Школьные рюкзаки для мальчиков', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego/' ),
                                array( 'title' => 'Рюкзаки школьные ортопедические', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/' ),
                                array( 'title' => 'Рюкзаки каркасные', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/ryukzaky-karkasni/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки для подростков',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/14-18/',
                            'children' => array(
                                array( 'title' => 'Рюкзаки для подростков девочек', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/14-18/' ),
                                array( 'title' => 'Рюкзаки для мальчиков подростков', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/14-18/' ),
                                array( 'title' => 'Рюкзаки с ортопедической спинкой для подростков', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/vozrast-let/10-13/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки молодежные',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/19-29/',
                            'children' => array(
                                array( 'title' => 'Молодежные рюкзаки для девушек', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/19-29/' ),
                                array( 'title' => 'Рюкзаки молодежные мужские', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/19-29/' ),
                            ),
                        ),
                        array(
                            'title' => 'Городские рюкзаки',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/',
                            'children' => array(
                                array( 'title' => 'Рюкзаки женские городские', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/' ),
                                array( 'title' => 'Рюкзаки мужские городские', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки женские',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/zhinochi-ryukzaki/',
                            'children' => array(
                                array( 'title' => 'Сумки-рюкзаки женские', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/zhinochi-ryukzaki/tip/rjukzak-sumka/' ),
                                array( 'title' => 'Рюкзаки чёрные женские', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/zhinochi-ryukzaki/tsvet/chernyj/' ),
                                array( 'title' => 'Маленькие женские рюкзаки', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/zhinochi-ryukzaki/obem-l/7/' ),
                                array( 'title' => 'Рюкзаки из экокожи', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/zhinochi-ryukzaki/material/eko-kozha/' ),
//                                array( 'title' => 'Спортивные рюкзаки', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/zhinochi-ryukzaki/tip/rjukzak-molodezhnyj/' ),
                            ),
                        ),
                        array(
                            'title' => 'Сумки',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/sumki/',
                            'children' => array(
                                array( 'title' => 'Сумки для обуви', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/sumki/sumki-dlya-vzuttya/' ),
                                array( 'title' => 'Сумки на пояс', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/sumki/sumki-na-poyas/' ),
                                array( 'title' => 'Детские сумки', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/sumki/sumki-kids/' ),
                                array( 'title' => 'Детские спортивные сумки', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/sportivni-sumki/tip/sumka-sportivnaja/' ),
//                                array( 'title' => 'Детские спортивные сумки', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/sportivni-sumki/tip/sumka-sportivnaja/' ),
                            ),
                        ),
                        array( 'title' => 'Детские чемоданы ', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/dityachi-valizi/' ),
                        array(
                            'title' => 'Косметички',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/kocmetichki/',
                            'children' => array(
                                array( 'title' => 'Пеналы-косметички', 'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/kocmetichki/tip/penal-kosmetichka/' ),
                            ),
                        ),
                        array(
                            'title' => 'Чехлы для ноутбуков и планшетов',
                            'url' => 'https://yes-tm.com/ru/ryukzaki-ta-cumki/chohli-dlya-noutbukiv-i-planshetiv/',
                        ),
                    ),
                ),
                array(
                    'title' => 'Канцтовары',
                    'url' => 'https://yes-tm.com/ru/kanctovari/',
                    'children' => array(
                        array(
                            'title' => 'Школьные принадлежности',
                            'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/',
                            'children' => array(
                                array( 'title' => 'Пеналы, футляры для канцелярии', 'url' => 'https://yes-tm.com/ru/kanctovari/penali/' ),
                                array(
                                    'title' => 'Принадлежности для письма и черчения',
                                    'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/',
                                    'children' => array(
                                        array( 'title' => 'Карандаш графитный', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/karandash-grafitnii/' ),
                                        array( 'title' => 'Ластики', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/lactiki/' ),
                                        array( 'title' => 'Ручки', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/ruchki/' ),
                                        array( 'title' => 'Точилки', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/tochilki/' ),
                                        array( 'title' => 'Маркеры', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/markeri-uk-ua/' ),
                                        array( 'title' => 'Циркули', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/cirkuli/' ),
                                        array( 'title' => 'Корректоры', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/korektori/' ),
                                        array( 'title' => 'Держатели для ручек', 'url' => 'https://yes-tm.com/ru/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/trimachi-dlya-ruchok/' ),
                                        array( 'title' => 'Линейки', 'url' => 'https://yes-tm.com/ru/kanctovari/izmeritel-nie-prinadlezhnocti/lineika/' ),
                                        array( 'title' => 'Транспортиры', 'url' => 'https://yes-tm.com/ru/kanctovari/izmeritel-nie-prinadlezhnocti/trancportir-639907880/' ),
                                    ),
                                ),
                                array( 'title' => 'Дневники', 'url' => 'https://yes-tm.com/ru/kanctovari/bumazhno-belovie-tovari/dnevniki/' ),
                                array( 'title' => 'Тетради', 'url' => 'https://yes-tm.com/ru/kanctovari/bumazhno-belovie-tovari/tetradi/' ),
                                array( 'title' => 'Альбомы', 'url' => 'https://yes-tm.com/ru/kanctovari/bumazhno-belovie-tovari/al-bomi/' ),
                                array( 'title' => 'Клей', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/klei/' ),
                                array( 'title' => 'Закладки', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/zakladki/' ),
                                array( 'title' => 'Мел', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/mel/' ),
                                array( 'title' => 'Ножницы', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/nozhnici/' ),
                                array( 'title' => 'Пластилин', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/plactilin/' ),
                                array( 'title' => 'Подложка для стола', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/podlozhka-dlya-ctola/' ),
                                array( 'title' => 'Подставка для книг', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-knig/' ),
                                array( 'title' => 'Подставки для канцелярии', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-pic-mennix-prinadlezhnoctei/' ),
                                array( 'title' => 'Корзины для канцелярии', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/inshe/' ),
                                array(
                                    'title' => 'Папки',
                                    'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/papka/',
                                    'children' => array(
                                        array( 'title' => 'Папки-портфели детские', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-portfel-dlja-prinadlezhnostej/' ),
                                        array( 'title' => 'Папки-конверты на кнопке', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-knopke/' ),
                                        array( 'title' => 'Папки-конверты на молнии', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-molnii/' ),
                                        array( 'title' => 'Папки для тетрадей', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-tetradej/' ),
                                        array( 'title' => 'Папки для труда', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-truda/' ),
                                    ),
                                ),
                                array( 'title' => 'Канцелярские мелочи', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/kancelyarski-dribnici/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рисование',
                            'url' => 'https://yes-tm.com/ru/kanctovari/ricovanie/',
                            'children' => array(
                                array( 'title' => 'Цветные карандаши', 'url' => 'https://yes-tm.com/ru/kanctovari/ricovanie/cvetnie-karandashi/' ),
                                array( 'title' => 'Кисти', 'url' => 'https://yes-tm.com/ru/kanctovari/ricovanie/kicti/' ),
                                array( 'title' => 'Фломастеры', 'url' => 'https://yes-tm.com/ru/kanctovari/ricovanie/flomacteri/' ),
                                array( 'title' => 'Краски', 'url' => 'https://yes-tm.com/ru/dityacha-tvorchist/barvi/' ),
                            ),
                        ),
                        array(
                            'title' => 'Бумажная продукция',
                            'url' => 'https://yes-tm.com/ru/kanctovari/bumazhno-belovie-tovari/',
                            'children' => array(
                                array( 'title' => 'Блокноты', 'url' => 'https://yes-tm.com/ru/kanctovari/bumazhno-belovie-tovari/bloknoti/' ),
                                array( 'title' => 'Блокноты-мотиваторы', 'url' => 'https://yes-tm.com/ru/kanctovari/bumazhno-belovie-tovari/bloknoti-motivatori/' ),
                                array( 'title' => 'Планинги', 'url' => 'https://yes-tm.com/ru/kanctovari/bumazhno-belovie-tovari/planingi/' ),
                                array( 'title' => 'Ежедневники', 'url' => 'https://yes-tm.com/ru/kanctovari/shodenniki/' ),
                                array( 'title' => 'Бумага для заметок и индексов', 'url' => 'https://yes-tm.com/ru/kanctovari/shkol-nie-prinadlezhnocti/papir-dlya-notatok-ta-indeksiv/' ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => 'Детское творчество',
                    'url' => 'https://yes-tm.com/ru/dityacha-tvorchist/',
                    'children' => array(
                        array( 'title' => 'Игры', 'url' => 'https://yes-tm.com/ru/dityacha-tvorchist/igri/' ),
                        array( 'title' => 'Раскраски', 'url' => 'https://yes-tm.com/ru/dityacha-tvorchist/rozmalovki/' ),
                        array( 'title' => 'Гравюры', 'url' => 'https://yes-tm.com/ru/dityacha-tvorchist/gravyuri/' ),
                        array( 'title' => 'Наклейки', 'url' => 'https://yes-tm.com/ru/accessories/nalipki/' ),
                    ),
                ),
                array(
                    'title' => 'Аксессуары',
                    'url' => 'https://yes-tm.com/ru/accessories/',
                    'children' => array(
                        array(
                            'title' => 'Брелки',
                            'url' => 'https://yes-tm.com/ru/accessories/breloki/',
                            'children' => array(
                                array( 'title' => 'Брелок светоотражающий', 'url' => 'https://yes-tm.com/ru/accessories/breloki/brelok-katafot/' ),
                                array( 'title' => 'Брелок-буква', 'url' => 'https://yes-tm.com/ru/accessories/breloki/brelok-fliker/' ),
                                array( 'title' => 'Булавки', 'url' => 'https://yes-tm.com/ru/accessories/breloki/shpil-ki/' ),
                            ),
                        ),
                        array( 'title' => 'Бейджи', 'url' => 'https://yes-tm.com/ru/accessories/biznes-aksesuari-1/tip/bejdzh/' ),
                        array( 'title' => 'Визитницы и картхолдеры', 'url' => 'https://yes-tm.com/ru/accessories/biznes-aksesuari-1/tip/vizitnitsa-karmannaja/' ),
                        array(
                            'title' => 'Бутылки и ланчбоксы',
                            'url' => 'https://yes-tm.com/ru/accessories/plyashki-ta-lanchbokci/',
                            'children' => array(
                                array( 'title' => 'Бутылки', 'url' => 'https://yes-tm.com/ru/accessories/plyashki-ta-lanchbokci/plyashki/' ),
                                array( 'title' => 'Ланчбоксы', 'url' => 'https://yes-tm.com/ru/accessories/plyashki-ta-lanchbokci/lanchbokci/' ),
                                array( 'title' => 'Термосы', 'url' => 'https://yes-tm.com/ru/accessories/plyashki-ta-lanchbokci/termos/' ),
                            ),
                        ),
                        array( 'title' => 'Аксессуары для обуви', 'url' => 'https://yes-tm.com/ru/accessories/akcecuari-dlya-vzuttya/' ),
                        array( 'title' => 'Поперечный ремень для рюкзака', 'url' => 'https://yes-tm.com/ru/accessories/poperechnii-remin-dlya-ryukzaka/' ),
                        array( 'title' => 'Кошельки', 'url' => 'https://yes-tm.com/ru/accessories/koshel-ki/' ),
                        array( 'title' => 'Копилки', 'url' => 'https://yes-tm.com/ru/accessories/skarbnichki/' ),
                        array( 'title' => 'Аксессуары для волос', 'url' => 'https://yes-tm.com/ru/accessories/aksesuari-dlya-volossya/' ),
                        array( 'title' => 'Косметика', 'url' => 'https://yes-tm.com/ru/accessories/kosmetika/' ),
                        array( 'title' => 'Дождевик', 'url' => 'https://yes-tm.com/ru/accessories/dozhdevik/' ),
                    ),
                ),
                array(
                    'title' => 'YES by ANDRE TAN',
                    'url' => 'https://yes-tm.com/andre-tan-promo',
                    'children' => array(),
                ),
            ),
            // en
            2 => array(),
            // ua
            3 => array(
                array(
                    'title' => 'Рюкзаки та сумки',
                    'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/',
                    'children' => array(
                        array( 'title' => 'Рюкзаки для дівчаток', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/pol/dlja-nee/' ),
                        array( 'title' => 'Рюкзаки для хлопчиків', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/pol/dlja-nego/' ),
                        array(
                            'title' => 'Дитячі рюкзаки',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/',
                            'children' => array(
                                array( 'title' => 'Дитячі рюкзаки для дівчаток', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee/' ),
                                array( 'title' => 'Дитячі рюкзаки для хлопчиків', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego/' ),
                                array( 'title' => 'Сортивні дитячі рюкзаки', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/sportivni-sumki/tip/rjukzak-sport/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки дошкільні',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/vozrast-let/3-5/',
                            'children' => array(
                                array( 'title' => 'Дошкільні рюкзаки для дівчаток', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee/vozrast-let/3-5/' ),
                                array( 'title' => 'Дошкільні рюкзаки для хлопчиків', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego/vozrast-let/3-5/' ),
                            ),
                        ),
                        array(
                            'title' => 'Шкільні рюкзаки',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/',
                            'children' => array(
                                array( 'title' => 'Рюкзаки для першокласників', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/6-9/' ),
                                array( 'title' => 'Рюкзаки для 5 класу', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/10-13/' ),
                                array( 'title' => 'Рюкзаки шкільні для підлітків', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/14-18/10-13/' ),
                                array( 'title' => 'Рюкзаки для школи дівчатам підліткам', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee/vozrast-let/14-18/10-13/' ),
                                array( 'title' => 'Рюкзаки для хлопців підлітків в школу', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego/vozrast-let/14-18/10-13/' ),
                                array( 'title' => 'Рюкзаки шкільні для дівчат', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee/' ),
                                array( 'title' => 'Шкільні рюкзаки для хлопців', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego/' ),
                                array( 'title' => 'Рюкзаки шкільні ортопедичні', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/' ),
                                array( 'title' => 'Рюкзаки каркасні', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/ryukzaky-karkasni/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки для підлітків',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/14-18/',
                            'children' => array(
                                array( 'title' => 'Рюкзаки для підлітків дівчат', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/14-18/' ),
                                array( 'title' => 'Рюкзаки для хлопців підлітків', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/14-18/' ),
                                array( 'title' => 'Рюкзаки з ортопедичною спинкою для підлітків', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/vozrast-let/10-13/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки молодіжні',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/19-29/',
                            'children' => array(
                                array( 'title' => 'Молодіжні рюкзаки для дівчат', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/19-29/' ),
                                array( 'title' => 'Рюкзаки молодіжні чоловічі', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/19-29/' ),
                            ),
                        ),
                        array(
                            'title' => 'Міські рюкзаки',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/',
                            'children' => array(
                                array( 'title' => 'Рюкзаки жіночі міські', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/' ),
                                array( 'title' => 'Рюкзаки чоловічі міські', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/' ),
                            ),
                        ),
                        array(
                            'title' => 'Рюкзаки жіночі',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/',
                            'children' => array(
                                array( 'title' => 'Сумки-рюкзаки жіночі', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/tip/rjukzak-sumka/' ),
                                array( 'title' => 'Рюкзаки чорні жіночі', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/tsvet/chernyj/' ),
                                array( 'title' => 'Маленькі жіночі рюкзаки', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/obem-l/7/' ),
                                array( 'title' => 'Рюкзаки з екокожі', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/material/eko-kozha/' ),
//                                array( 'title' => 'Спортивні рюкзаки', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/tip/rjukzak-molodezhnyj/' ),
                            ),
                        ),
                        array(
                            'title' => 'Сумки',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/sumki/',
                            'children' => array(
                                array( 'title' => 'Сумки для взуття', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-dlya-vzuttya/' ),
                                array( 'title' => 'Сумки на пояс', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-na-poyas/' ),
                                array( 'title' => 'Дитячі сумки', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-kids/' ),
                                array( 'title' => 'Дитячі спортивні сумки', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/sportivni-sumki/tip/sumka-sportivnaja/' ),
//                                array( 'title' => 'Дитячі cпортивні сумки', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/sportivni-sumki/tip/sumka-sportivnaja/' ),
                            ),
                        ),
                        array( 'title' => 'Дитячі валізи', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/dityachi-valizi/' ),
                        array(
                            'title' => 'Косметички',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/kocmetichki/',
                            'children' => array(
                                array( 'title' => 'Пенали-косметички', 'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/kocmetichki/tip/penal-kosmetichka/' ),
                            ),
                        ),
                        array(
                            'title' => 'Чохли для ноутбуків і планшетів',
                            'url' => 'https://yes-tm.com/ryukzaki-ta-cumki/chohli-dlya-noutbukiv-i-planshetiv/',
                        ),
                    ),
                ),
                array(
                    'title' => 'Канцтовари',
                    'url' => 'https://yes-tm.com/kanctovari/',
                    'children' => array(
                        array(
                            'title' => 'Шкільне приладдя',
                            'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/',
                            'children' => array(
                                array( 'title' => 'Пенали, футляри для канцелярії', 'url' => 'https://yes-tm.com/kanctovari/penali/' ),
                                array(
                                    'title' => 'Приналежності для письма та креслення',
                                    'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/',
                                    'children' => array(
                                        array( 'title' => 'Олівець графітний', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/karandash-grafitnii/' ),
                                        array( 'title' => 'Ластики', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/lactiki/' ),
                                        array( 'title' => 'Ручки', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/ruchki/' ),
                                        array( 'title' => 'Точилки', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/tochilki/' ),
                                        array( 'title' => 'Маркери', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/markeri-uk-ua/' ),
                                        array( 'title' => 'Циркулі', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/cirkuli/' ),
                                        array( 'title' => 'Коректори', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/korektori/' ),
                                        array( 'title' => 'Тримачі для ручок', 'url' => 'https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/trimachi-dlya-ruchok/' ),
                                        array( 'title' => 'Лінійки', 'url' => 'https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti/lineika/' ),
                                        array( 'title' => 'Транспортири', 'url' => 'https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti/trancportir-639907880/' ),
                                    ),
                                ),
                                array( 'title' => 'Щоденники', 'url' => 'https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/dnevniki/' ),
                                array( 'title' => 'Зошити', 'url' => 'https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/tetradi/' ),
                                array( 'title' => 'Альбоми', 'url' => 'https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/al-bomi/' ),
                                array( 'title' => 'Клей', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/klei/' ),
                                array( 'title' => 'Закладки', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/zakladki/' ),
                                array( 'title' => 'Крейда', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/mel/' ),
                                array( 'title' => 'Ножиці', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/nozhnici/' ),
                                array( 'title' => 'Пластилін', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/plactilin/' ),
                                array( 'title' => 'Підкладка для столу', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podlozhka-dlya-ctola/' ),
                                array( 'title' => 'Підставка для книг', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-knig/' ),
                                array( 'title' => 'Підставки для канцелярії', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-pic-mennix-prinadlezhnoctei/' ),
                                array( 'title' => 'Кошики для канцелярії', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/inshe/' ),
                                array(
                                    'title' => 'Папки',
                                    'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/',
                                    'children' => array(
                                        array( 'title' => 'Папки-портфелі дитячі', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-portfel-dlja-prinadlezhnostej/' ),
                                        array( 'title' => 'Папки-конверти на кнопці', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-knopke/' ),
                                        array( 'title' => 'Папки-конверти на блискавці', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-molnii/' ),
                                        array( 'title' => 'Папки для зошитів', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-tetradej/' ),
                                        array( 'title' => 'Папки для праці', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-truda/' ),
                                    ),
                                ),
                                array( 'title' => 'Канцелярські дрібниці', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/kancelyarski-dribnici/' ),
                            ),
                        ),
                        array(
                            'title' => 'Малювання',
                            'url' => 'https://yes-tm.com/kanctovari/ricovanie/',
                            'children' => array(
                                array( 'title' => 'Кольорові олівці', 'url' => 'https://yes-tm.com/kanctovari/ricovanie/cvetnie-karandashi/' ),
                                array( 'title' => 'Кисті', 'url' => 'https://yes-tm.com/kanctovari/ricovanie/kicti/' ),
                                array( 'title' => 'Фломастери', 'url' => 'https://yes-tm.com/kanctovari/ricovanie/flomacteri/' ),
                                array( 'title' => 'Фарби', 'url' => 'https://yes-tm.com/dityacha-tvorchist/barvi/' ),
                            ),
                        ),
                        array(
                            'title' => 'Паперова продукція',
                            'url' => 'https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/',
                            'children' => array(
                                array( 'title' => 'Блокноти', 'url' => 'https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/bloknoti/' ),
                                array( 'title' => 'Блокноти-мотиватори', 'url' => 'https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/bloknoti-motivatori/' ),
                                array( 'title' => 'Планінги', 'url' => 'https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/planingi/' ),
                                array( 'title' => 'Щоденники', 'url' => 'https://yes-tm.com/kanctovari/shodenniki/' ),
                                array( 'title' => 'Папір для нотаток та індексів', 'url' => 'https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papir-dlya-notatok-ta-indeksiv/' ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => 'Дитяча творчість',
                    'url' => 'https://yes-tm.com/dityacha-tvorchist/',
                    'children' => array(
                        array( 'title' => 'Ігри', 'url' => 'https://yes-tm.com/dityacha-tvorchist/igri/' ),
                        array( 'title' => 'Розмальовки', 'url' => 'https://yes-tm.com/dityacha-tvorchist/rozmalovki/' ),
                        array( 'title' => 'Гравюри', 'url' => 'https://yes-tm.com/dityacha-tvorchist/gravyuri/' ),
                        array( 'title' => 'Наліпки', 'url' => 'https://yes-tm.com/accessories/nalipki/' ),
                    ),
                ),
                array(
                    'title' => 'Аксесуари',
                    'url' => 'https://yes-tm.com/accessories/',
                    'children' => array(
                        array(
                            'title' => 'Брелки',
                            'url' => 'https://yes-tm.com/accessories/breloki/',
                            'children' => array(
                                array( 'title' => 'Брелок світловідбиваючий', 'url' => 'https://yes-tm.com/accessories/breloki/brelok-katafot/' ),
                                array( 'title' => 'Брелок-буква', 'url' => 'https://yes-tm.com/accessories/breloki/brelok-fliker/' ),
                                array( 'title' => 'Булавки', 'url' => 'https://yes-tm.com/accessories/breloki/shpil-ki/' ),
                            ),
                        ),
                        array( 'title' => 'Бейджи', 'url' => 'https://yes-tm.com/accessories/biznes-aksesuari-1/tip/bejdzh/' ),
                        array( 'title' => 'Візитівки та кардхолдери', 'url' => 'https://yes-tm.com/accessories/biznes-aksesuari-1/tip/vizitnitsa-karmannaja/' ),
                        array(
                            'title' => 'Пляшки і ланчбокси',
                            'url' => 'https://yes-tm.com/accessories/plyashki-ta-lanchbokci/',
                            'children' => array(
                                array( 'title' => 'Пляшки', 'url' => 'https://yes-tm.com/accessories/plyashki-ta-lanchbokci/plyashki/' ),
                                array( 'title' => 'Ланчбокси', 'url' => 'https://yes-tm.com/accessories/plyashki-ta-lanchbokci/lanchbokci/' ),
                                array( 'title' => 'Термоси', 'url' => 'https://yes-tm.com/accessories/plyashki-ta-lanchbokci/termos/' ),
                            ),
                        ),
                        array( 'title' => 'Аксесуари для взуття', 'url' => 'https://yes-tm.com/accessories/akcecuari-dlya-vzuttya/' ),
                        array( 'title' => 'Поперечний ремінь для рюкзака', 'url' => 'https://yes-tm.com/accessories/poperechnii-remin-dlya-ryukzaka/' ),
                        array( 'title' => 'Гаманці', 'url' => 'https://yes-tm.com/accessories/koshel-ki/' ),
                        array( 'title' => 'Скарбнички', 'url' => 'https://yes-tm.com/accessories/skarbnichki/' ),
                        array( 'title' => 'Аксесуари для волосся', 'url' => 'https://yes-tm.com/accessories/aksesuari-dlya-volossya/' ),
                        array( 'title' => 'Косметика', 'url' => 'https://yes-tm.com/accessories/kosmetika/' ),
                        array( 'title' => 'Дощовик', 'url' => 'https://yes-tm.com/accessories/dozhdevik/' ),
                    ),
                ),
                array(
                    'title' => 'YES by ANDRE TAN',
                    'url' => 'https://yes-tm.com/andre-tan-promo',
                    'children' => array(),
                ),
            ),
        );
        if ( !empty( $structure[$language_id] ) ) {
            return array('menu' => $structure[$language_id], 'back_text' => $this->language->get('back_text'));
        }
        return false;
    }

    public function getSeoTextFromFile( $filename ) {
        $filename = str_replace( '/', '_', trim( $filename, '/') );
//        var_dump($filename);
	    return file_exists( $_SERVER[ 'DOCUMENT_ROOT' ] . '/seo/' . $filename ) ? file_get_contents( $_SERVER[ 'DOCUMENT_ROOT' ] . '/seo/' . $filename ) : '';
    }

    public function customMetaTagsTemplate() {
        $language_id = (int)$this->config->get('config_language_id');
        $route = $this->request->get['route'];
//        var_dump($this->request->get['route']);
//        var_dump($this->request->get);і

        // 1 - ru
        // 2 - en
        // 3 - ua
        switch( $route ) {
            case 'common/home' :
                $metas = array(
                    1 => array(
                        'title'         => 'Рюкзаки YES™ в Киеве, Украине на официальном сайте',
                        'description'   => 'Выбрать ☝ фирменные рюкзаки YES™, сумки и канцелярию от производителя YES на официальном сайте. ⏩ Выгодные цены. Высокое качество. Подробные характеристики.',
                        'h1'            => 'Официальный сайт YES™',
                    ),
                    3 => array(
                        'title'         => 'Рюкзаки YES™ в Києві, Україні на офіційному сайті',
                        'description'   => 'Вибрати ☝ фірмові рюкзаки YES™, сумки і канцелярію від виробника YES на офіційному сайті. ⏩ Вигідні ціни. Висока якість. Детальні характеристики.',
                        'h1'            => 'Офіційний сайт YES™',
                    ),
                );

                return empty( $metas[ $language_id ] ) ? array() : $metas[ $language_id ];
                break;
            case 'product/category' :
                $path = explode( '_', $this->request->get['path'] );
                $category_info = $this->model_catalog_category->getCategory(end($path));
                $catTitle = mb_ucfirst(mb_strtolower($category_info[ 'name' ]));
                $catTitleSmall = mb_strtolower($catTitle);

                // Default Subcats Backpacks
                $titleRu = "%s ᐈ Купить %s в Киеве, Украине - YES";
                $descrRu = "Купить фирменный %s YES™ по выгодной цене. ⚡️ Подробные характеристики. Большой ассортимент. ☝ Гарантия 24 месяца. ⏩ Выбирай на сайте YES!";
                $titleUa = "%s ᐈ Купити %s в Києві, Україні - YES";
                $descrUa = "Купити фірмовий %s YES ™ за вигідною ціною. ⚡️ Детальні характеристики. Великий асортимент. ☝ Гарантія 24 місяці. ⏩ Вибирай на сайті YES!";

                $titleRu_2 = "%s ᐈ Купить %s в Киеве, Украине - YES";
                $descrRu_2 = "Купить фирменную %s YES™ по выгодной цене. ⚡️ Подробные характеристики. Большой ассортимент. ☝ Гарантия 24 месяца. ⏩ Выбирай на сайте YES!";
                $titleUa_2 = "%s ᐈ Купити %s в Києві, Україні - YES";
                $descrUa_2 = "Купити фірмову %s YES ™ за вигідною ціною. ⚡️ Детальні характеристики. Великий асортимент. ☝ Гарантія 24 місяці. ⏩ Вибирай на сайті YES!";

                // Default Subcats Kanctovary
                $titleKanRu = "%s ᐈ Купить %s в Киеве, Украине - YES";
                $descrKanRu = "Купить фирменные %s YES™ по выгодной цене. ⚡️ Подробные характеристики. Большой ассортимент. ☝ Гарантия качества. ⏩ Выбирай на сайте YES!";
                $titleKanUa = "%s ᐈ Купити %s в Києві, Україні - YES";
                $descrKanUa = "Купити фірмові %s YES™ за вигідною ціною. ⚡️ Детальні характеристики. Великий асортимент. ☝ Гарантія якості. ⏩ Вибирай на сайті YES!";

                $titleKanRu_2 = "%s ᐈ Купить %s в Киеве, Украине - YES";
                $descrKanRu_2 = "Купить ☝ фирменный %s YES™ по выгодной цене. ⚡️ Большой ассортимент. Гарантия качества. ⏩ Выбирай на официальном сайте YES!";
                $titleKanUa_2 = "%s ᐈ Купити %s в Києві, Україні - YES";
                $descrKanUa_2 = "Купити ☝ фірмовий %s YES™ за вигідною ціною. ⚡️ Великий асортимент. Гарантія якості. ⏩ Вибирай на офіційному сайті YES!";

                $titleKanRu_3 = "%s ᐈ Купить %s в Киеве, Украине - YES";
                $descrKanRu_3 = "Купить ☝ %s YES™ по выгодной цене. ⚡️ Большой ассортимент. Гарантия качества. ⏩ Выбирай на официальном сайте YES!";
                $titleKanUa_3 = "%s ᐈ Купити %s в Києві, Україні - YES";
                $descrKanUa_3 = "Купити ☝ %s YES™ за вигідною ціною. ⚡️ Великий асортимент. Гарантія якості. ⏩ Вибирай на офіційному сайті YES!";

                $titleKanRu_4 = "%s ᐈ Купить %s в Киеве, Украине - YES";
                $descrKanRu_4 = "Купить ☝ фирменные %s YES™ по выгодной цене. ⏩ Большой ассортимент. Гарантия качества. ⏩ Выбирай на официальном сайте YES!";
                $titleKanUa_4 = "%s ᐈ Купити %s в Києві, Україні - YES";
                $descrKanUa_4 = "Купити ☝ фірмові %s YES™ за вигідною ціною. ⏩ Великий асортимент. Гарантія якості. ⏩ Вибирай на офіційному сайті YES!";

                $titleKanRu_5 = "%s ᐈ Купить %s в Киеве, Украине - YES";
                $descrKanRu_5 = "Купить ☝ фирменную %s YES™ по выгодной цене. ⏩ Большой ассортимент. Гарантия качества. ⏩ Выбирай на официальном сайте YES!";
                $titleKanUa_5 = "%s ᐈ Купити %s в Києві, Україні - YES";
                $descrKanUa_5 = "Купити ☝ фірмову %s YES™ за вигідною ціною. ⏩ Великий асортимент. Гарантія якості. ⏩ Вибирай на офіційному сайті YES!";

                $metas = array(
                    'default' => array(
                        1 => array(
                            'title'         => "{$catTitle} ᐈ Купить {$catTitleSmall} в Киеве, Украине - YES",
                            'description'   => "Купить ☝ фирменные {$catTitleSmall} YES™ по выгодным ценам. ⚡️Подробные характеристики. ⏩ Большой ассортимент. Высокое качество. ⏩ Выбирай на официальном сайте YES!",
                            'h1'            => "{$catTitle}",
                        ),
                        3 => array(
                            'title'         => "{$catTitle} ᐈ Купити {$catTitleSmall} в Києві, Україні - YES",
                            'description'   => "Купити ☝ фірмові {$catTitleSmall} YES ™ за вигідними цінами. ⚡️Детальні характеристики. ⏩ Великий асортимент. Висока якість. ⏩ Вибирай на офіційному сайті YES!",
                            'h1'            => "{$catTitle}",
                        ),
                    ),
                    '/dityacha-tvorchist/' => array(
                        1 => array(
                            'title'         => "Товары для детского творчества YES™ ᐈ Купить в Киеве, Украине",
                            'description'   => "Купить ☝ фирменные товары для детского творчества YES™ по выгодным ценам. ⚡ Подробные характеристики. Большой ассортимент. Высокое качество. ⏩ Заходи и выбирай!",
                            'h1'            => "Товары для детского творчества",
                        ),
                        3 => array(
                            'title'         => "Товари для дитячої творчості YES™ ᐈ Купити в Києві, Україні",
                            'description'   => "Купити ☝ фірмові товари для дитячої творчості YES™ за вигідними цінами. ⚡ Детальні характеристики. Великий асортимент. Висока якість. ⏩ Заходи і вибирай!",
                            'h1'            => "Товари для дитячої творчості",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/pol/dlja-nee/' => array(
                        1 => array(
                            'title'         => "Рюкзаки для девочек ᐈ Купить портфель для девочки - Ранец для девочки",
                            'description'   => "Купить ☝ Рюкзак для девочки YES™ по выгодной цене. ⚡️ Подробные характеристики. Большой ассортимент. ✔️ Гарантия 24 месяца. ⭐ Выбирай на сайте YES!",
                            'h1'            => "Рюкзаки для девочек",
                        ),
                        3 => array(
                            'title'         => "Рюкзаки для дівчаток ᐈ Купити портфель для дівчинки - Ранець для дівчинки",
                            'description'   => "Купити ☝ Рюкзак для дівчинки YES™ за вигідною ціною. ⚡️ Детальні характеристики. Великий асортимент. ✔️ Гарантія 24 місяці. ⭐ Вибирай на сайті YES!",
                            'h1'            => "Рюкзаки для дівчаток",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/pol/dlja-nego/' => array(
                        1 => array(
                            'title'         => "Рюкзак для мальчика ᐈ Купить портфели для мальчиков в Киеве, Украине - YES",
                            'description'   => "Купить рюкзак для мальчика от производителя YES™ в Киеве, Украине. ⚡️ Выгодная цена. Большой ассортимент. Высокое качество. ☝ Гарантия 24 месяца.",
                            'h1'            => "Рюкзаки для мальчиков",
                        ),
                        3 => array(
                            'title'         => "Рюкзак для хлопчика ᐈ Купити портфелі для хлопчиків в Києві, Україні - YES",
                            'description'   => "Купити рюкзак для хлопчика від виробника YES ™ в Києві, Україні. ⚡️ Вигідна ціна. Великий асортимент. Висока якість. ☝ Гарантія 24 місяці.",
                            'h1'            => "Рюкзаки для хлопчиків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-kids/' => array(
                        1 => array(
                            'title'         => 'Детские рюкзаки YES ᐈ Купить детский рюкзак - портфели для садика, школы',
                            'description'   => 'Купить ☝ фирменный детский рюкзак от производителя YES™ в Киеве, Украине. ⚡️ Выбирай стильные и модные портфели для садика и школы на сайте YES.',
                            'h1'            => "Детские рюкзаки",
                        ),
                        3 => array(
                            'title'         => 'Дитячі рюкзаки YES ᐈ Купити дитячий рюкзак - портфелі для садка, школи',
                            'description'   => 'Купити ☝ фірмовий дитячий рюкзак від виробника YES™ в Києві, Україні. ⚡️ Вибирай стильні і модні портфелі для садка і школи на сайті YES.',
                            'h1'            => "Дитячі рюкзаки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee/' => array(
                        1 => array(
                            'title'         => 'Детские рюкзаки для девочек ᐈ Купить детский рюкзак для девочки YES™',
                            'description'   => 'Купить модный детский рюкзак для девочки YES™. ⚡️ Большой ассортимент. Высокое качество. ☝ Гарантия 24 месяца. ⏩ Выбирай на сайте YES.',
                            'h1'            => "Детские рюкзаки для девочек",
                        ),
                        3 => array(
                            'title'         => 'Дитячі рюкзаки для дівчаток ᐈ Купити дитячий рюкзак для дівчинки YES™',
                            'description'   => 'Купити модний дитячий рюкзак для дівчинки YES™. ⚡️ Великий асортимент. Висока якість. ☝ Гарантія 24 місяці. ⏩ Вибирай на сайті YES.',
                            'h1'            => "Дитячі рюкзаки для дівчаток",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego/' => array(
                        1 => array(
                            'title'         => 'Детский рюкзак для мальчика YES™ ᐈ Купить детский рюкзак для мальчика',
                            'description'   => 'Купить фирменный детский рюкзак для мальчика YES™. ⚡️ Большой ассортимент. Высокое качество. ☝ Гарантия 24 месяца. ⏩ Выбирай на сайте YES.',
                            'h1'            => "Детские рюкзаки для мальчиков",
                        ),
                        3 => array(
                            'title'         => 'Дитячий рюкзак для хлопчика YES™ ᐈ Купити дитячий рюкзак для хлопчика',
                            'description'   => 'Купити фірмовий дитячий рюкзак для хлопчика YES™. ⚡️ Великий асортимент. Висока якість. ☝ Гарантія 24 місяці. ⏩ Вибирай на сайті YES.',
                            'h1'            => "Дитячі рюкзаки для хлопчиків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/sportivni-sumki/tip/rjukzak-sport/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Спортиные детские рюкзаки', 'спортивный детский рюкзак' ),
                            'description'   => sprintf( $descrRu, 'спортивный детский рюкзак' ),
                            'h1'            => "Спортиные детские рюкзаки",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Спортивні дитячі рюкзаки', 'спортивний дитячий ранець' ),
                            'description'   => sprintf( $descrUa, 'спортивний дитячий ранець' ),
                            'h1'            => "Спортивні дитячі рюкзаки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-kids/vozrast-let/3-5/' => array(
                        1 => array(
                            'title'         => 'Детские рюкзаки YES ᐈ Купить детский рюкзак - портфели для садика, школы',
                            'description'   => 'Купить ☝ фирменный детский рюкзак от производителя YES™ в Киеве, Украине. ⚡️ Выбирай стильные и модные портфели для садика и школы на сайте YES.',
                            'h1'            => "Детские рюкзаки",
                        ),
                        3 => array(
                            'title'         => 'Дитячі рюкзаки YES ᐈ Купити дитячий рюкзак - портфелі для садка, школи',
                            'description'   => 'Купити ☝ фірмовий дитячий рюкзак від виробника YES™ в Києві, Україні. ⚡️ Вибирай стильні і модні портфелі для садка і школи на сайті YES.',
                            'h1'            => "Дитячі рюкзаки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee/vozrast-let/3-5/' => array(
                        1 => array(
                            'title'         => "Купить дошкольный рюкзак для девочки ᐈ Дошкольный рюкзак для девочки YES в Киеве, Украине",
                            'description'   => "Купить ☝ дошкольный рюкзак для девочки YES в Киеве, Украине. ⏩ Каталог, цены, подробные характеристики, где купить. Модные принты. ⚡️ Выбирай на сайте YES.",
                            'h1'            => "Дошкольные рюкзаки для девочек",
                        ),
                        3 => array(
                            'title'         => "Купити дошкільний рюкзак для дівчинки ᐈ Дошкільний рюкзак для дівчинки YES в Києві, Україні",
                            'description'   => "Купити ☝ дошкільний рюкзак для дівчинки YES у Києві, Україні. ⏩ Каталог, ціни, докладні характеристики, де купити. Модні принти. ⚡️ Вибирай на сайті YES.",
                            'h1'            => "Дошкільні рюкзаки для дівчаток",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego/vozrast-let/3-5/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Рюкзаки дошкольные для мальчиков', 'рюкзак дошкольный для мальчика' ),
                            'description'   => sprintf( $descrRu, 'рюкзак дошкольный для мальчика' ),
                            'h1'            => "Рюкзаки дошкольные для мальчиков",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Рюкзаки дошкільні для хлопчиків', 'рюкзак дошкільний для хлопчика' ),
                            'description'   => sprintf( $descrUa, 'рюкзак дошкільний для хлопчика' ),
                            'h1'            => "Рюкзаки дошкільні для хлопчиків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/' => array(
                        1 => array(
                            'title'         => 'Рюкзаки школьные YES ᐈ Купить рюкзаки для школы в Киеве, Украине',
                            'description'   => 'Купить фирменный школьный рюкзак YES™ по выгодной цене. ⚡️ Подробные характеристики. Большой ассортимент. Качество. ☝ Гарантия 24 месяца ⏩ Выбирай на сайте YES.',
                            'h1'            => "Школьные рюкзаки",
                        ),
                        3 => array(
                            'title'         => 'Рюкзаки шкільні YES ᐈ Купити рюкзаки для школи в Києві, Україні - YES',
                            'description'   => 'Купити фірмовий шкільний рюкзак YES ™ за вигідною ціною. ⚡️ Детальні характеристики. Великий асортимент. Якість. ☝ Гарантія 24 місяці ⏩ Вибирай на сайті YES!',
                            'h1'            => "Шкільні рюкзаки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/6-9/' => array(
                        1 => array(
                            'title'         => 'Рюкзаки для первоклашек YES ᐈ Купить рюкзак для первоклассника',
                            'description'   => 'Купить фирменный рюкзак для первоклассника от производителя YES™ в Киеве, Украине. ⚡️ Выгодная цена. Большой ассортимент. ☝ Гарантия 24 месяца.',
                            'h1'            => "Рюкзаки для первоклассников",
                        ),
                        3 => array(
                            'title'         => 'Рюкзаки для першокласників YES ᐈ Купити рюкзак для першокласника',
                            'description'   => 'Купити фірмовий рюкзак для першокласника від виробника YES ™ в Києві, Україні. ⚡️ Вигідна ціна. Великий асортимент. ☝ Гарантія 24 місяці.',
                            'h1'            => "Рюкзаки для першокласників",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/10-13/' => array(
                        1 => array(
                            'title'         => 'Купить рюкзак школьный для 5 класса YES ᐈ Рюкзак для 5 класса',
                            'description'   => 'Купить фирменный рюкзак для 5 класса YES™ по выгодной цене. ⚡️ Подробные характеристики. Большой ассортимент. ☝ Гарантия 24 месяца ⏩ Выбирай на сайте YES.',
                            'h1'            => "Рюкзаки для 5 класса",
                        ),
                        3 => array(
                            'title'         => 'Купити рюкзак шкільний для 5 класу YES ᐈ Рюкзак для 5 класу',
                            'description'   => 'Купити фірмовий рюкзак для 5 класу YES™ за вигідною ціною. ⚡️ Детальні характеристики. Великий асортимент. ☝ Гарантія 24 місяці ⏩ Вибирай на сайті YES.',
                            'h1'            => "Рюкзаки для 5 класу",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/14-18/10-13/' => array(
                        1 => array(
                            'title'         => 'Рюкзаки школьные для подростков YES ᐈ Купить рюкзак школьный подростковый',
                            'description'   => 'Купить ☝ фирменный школьный рюкзак для подростков от производителя YES™ в Киеве, Украине. ⚡️ Выбирай рюкзаки для средней и старшей школы на сайте YES.',
                            'h1'            => "Рюкзаки школьные для подростков",
                        ),
                        3 => array(
                            'title'         => 'Рюкзаки шкільні для підлітків YES ᐈ Купити рюкзак шкільний підлітковий',
                            'description'   => 'Купити ☝ фірмовий шкільний рюкзак для підлітків від виробника YES™ в Києві, Україні. ⚡️ Вибирай рюкзаки для середньої і старшої школи на сайті YES.',
                            'h1'            => "Рюкзаки шкільні для підлітків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee/vozrast-let/14-18/10-13/' => array(
                        1 => array(
                            'title'         => "Рюкзак для школы девочке подростку ᐈ Купить рюкзак в школу для девочки подростка",
                            'description'   => "Купить ☝ Рюкзак для школы девочке подростку от YES™. ⚡️ Подробные характеристики. Большой ассортимент. ⌛ Гарантия 24 месяца. ✔️ Выбирай на сайте YES.",
                            'h1'            => "Рюкзаки для школы девочкам подросткам",
                        ),
                        3 => array(
                            'title'         => "Рюкзак для школи дівчинці підлітку ᐈ Купити рюкзак до школи для дівчинки підлітка",
                            'description'   => "Купити ☝ Рюкзак для школи дівчинці підлітку від YES™. ⚡️ Детальні характеристики. Великий асортимент. ⌛ Гарантія 24 місяці. ✔️ Вибирай на сайті YES.",
                            'h1'            => "Рюкзаки для школи дівчаткам підліткам",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego/vozrast-let/14-18/10-13/' => array(
                        1 => array(
                            'title'         => "Рюкзак для мальчика подростка в школу ᐈ Купить школьный подростковый рюкзак для мальчика - YES™",
                            'description'   => "Купить ☝ Школьный рюкзак для мальчика подростка от YES. ⚡️ Подробные характеристики. Большой ассортимент. ⌛ Гарантия 24 месяца. ✔️ Выбирай на сайте YES.",
                            'h1'            => "Рюкзаки для мальчиков подростков в школу",
                        ),
                        3 => array(
                            'title'         => "Рюкзак для хлопчика підлітка в школу ᐈ Купити шкільний підлітковий рюкзак для хлопчика - YES™",
                            'description'   => "Купити ☝ Шкільний рюкзак для хлопчика підлітка від YES. ⚡️ Детальні характеристики. Великий асортимент. ⌛ Гарантія 24 місяці. ✔️ Обирай на сайті YES.",
                            'h1'            => "Рюкзаки для хлопчиків підлітків в школу",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee/' => array(
                        1 => array(
                            'title'         => 'Рюкзак школьный для девочки ᐈ Купить рюкзак для школы девочке YES™',
                            'description'   => 'Купить фирменный рюкзак школьный для девочки YES™ недорого. ⚡️ Подробные характеристики. Большой ассортимент. Качество. ☝ Гарантия 24 месяца. ⏩ Выбирай на сайте YES.',
                            'h1'            => "Школьные рюкзаки для девочки",
                        ),
                        3 => array(
                            'title'         => 'Рюкзак шкільний для дівчинки ᐈ Купити рюкзак для школи дівчинці YES™',
                            'description'   => 'Купити фірмовий рюкзак шкільний для дівчинки YES™ недорого. ⚡️ Детальні характеристики. Великий асортимент. Якість. ☝ Гарантія 24 місяці. ⏩ Вибирай на сайті YES.',
                            'h1'            => "Шкільні рюкзаки для дівчинки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego/' => array(
                        1 => array(
                            'title'         => 'Рюкзаки школьные для мальчиков YES ᐈ Купить школьный рюкзак для мальчика',
                            'description'   => 'Купить фирменный школьный рюкзак для мальчика YES™ недорого. ⚡️ Подробные характеристики. Большой ассортимент. Качество. ☝ Гарантия 24 месяца ⏩ Выбирай на сайте YES.',
                            'h1'            => "Рюкзаки школьные для мальчиков",
                        ),
                        3 => array(
                            'title'         => 'Рюкзаки шкільні для хлопчиків YES ᐈ Купити шкільний рюкзак для хлопчика',
                            'description'   => 'Купити фірмовий шкільний рюкзак для хлопчика YES™ недорого. ⚡️ Детальні характеристики. Великий асортимент. Якість. ☝ Гарантія 24 місяці ⏩Обирай на сайті YES.',
                            'h1'            => "Шкільні рюкзаки для хлопчиків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/' => array(
                        1 => array(
                            'title'         => 'Рюкзак школьный ортопедический YES ᐈ Купить школьный рюкзак с ортопедической спинкой',
                            'description'   => 'Купить фирменный школьный ортопедический рюкзак от производителя YES™ в Киеве, Украине. ⚡️ Выгодная цена. Большой ассортимент. Высокое качество. ☝ Гарантия 24 месяца.',
                            'h1'            => "Школьный рюкзак с ортопедической спинкой",
                        ),
                        3 => array(
                            'title'         => 'Рюкзак шкільний ортопедичний YES ᐈ Купити шкільний рюкзак з ортопедичною спинкою',
                            'description'   => 'Купити фірмовий шкільний ортопедичний рюкзак від виробника YES™ в Києві, Україні. ⚡️ Вигідна ціна. Великий асортимент. Висока якість. ☝ Гарантія 24 місяці.',
                            'h1'            => "Шкільний рюкзак з ортопедичною спинкою",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/14-18/' => array(
                        1 => array(
                            'title'         => 'Рюкзаки для подростков YES ᐈ Купить рюкзак для подростка',
                            'description'   => 'Купить фирменный рюкзак подростковый от производителя YES™ в Киеве, Украине. ⚡️ Выгодная цена. Большой ассортимент. Высокое качество. ☝ Гарантия 24 месяца.',
                            'h1'            => "Рюкзаки для подростков",
                        ),
                        3 => array(
                            'title'         => 'Рюкзаки для підлітків YES ᐈ Купити рюкзак для підлітка',
                            'description'   => 'Купити фірмовий рюкзак підлітковий від виробника YES™ в Києві, Україні. ⚡️ Вигідна ціна. Великий асортимент. Висока якість. ☝ Гарантія 24 місяці.',
                            'h1'            => "Рюкзаки для підлітків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/14-18/' => array(
                        1 => array(
                            'title'         => "Рюкзак для подростка девочке ᐈ Купить рюкзаки для подростков девушек - YES",
                            'description'   => "Купить ☝ рюкзак для подростка девочке от производителя YES™ в Киеве, Украине. ⏩ Подробный обзор рюкзаков для девушек-подростков. Большой выбор. ⚡️ Гарантия 2 года.",
                            'h1'            => "Рюкзаки для подростков девушек",
                        ),
                        3 => array(
                            'title'         => "Рюкзаки для дівчат підлітків ᐈ Купити рюкзак для дівчинки підлітка - YES",
                            'description'   => "Купити ☝ рюкзак для підлітка дівчинці від виробника YES ™ в Києві, Україні. ⏩ Докладний огляд підліткових рюкзаків для дівчат. Великий вибір. ⚡️ Гарантія 2 роки.",
                            'h1'            => "Рюкзаки для дівчат підлітків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/14-18/' => array(
                        1 => array(
                            'title'         => "Купить рюкзак для мальчика подростка ᐈ Рюкзак для подростка мальчика YES",
                            'description'   => "Купить ☝ модный рюкзак для мальчика подростка от производителя YES™ в Киеве, Украине. ⏩ Подробный обзор подростковых рюкзаков. Большой выбор. ⚡️ Гарантия 2 года",
                            'h1'            => "Рюкзаки для подростков мальчиков",
                        ),
                        3 => array(
                            'title'         => "Купити рюкзак для хлопчика підлітка ᐈ Рюкзак для підлітка хлопчика YES",
                            'description'   => "Купити ☝ модний рюкзак для хлопчика від виробника YES™ в Києві, Україні. ⏩ Детальний огляд підліткових рюкзаків. Великий вибір. ⚡️ Гарантія 2 роки",
                            'h1'            => "Рюкзаки для підлітків хлопчиків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/vozrast-let/10-13/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Рюкзаки с ортопедической спинкой для подростков', 'рюкзак с ортопедической спинкой для подростка' ),
                            'description'   => sprintf( $descrRu, 'рюкзак с ортопедической спинкой для подростка' ),
                            'h1'            => "Рюкзаки с ортопедической спинкой для подростков",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Рюкзаки з ортопедичною спинкою для підлітків', 'рюкзак з ортопедичною спинкою для підлітка' ),
                            'description'   => sprintf( $descrUa, 'рюкзак з ортопедичною спинкою для підлітка' ),
                            'h1'            => "Рюкзаки з ортопедичною спинкою для підлітків",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/19-29/' => array(
                        1 => array(
                            'title'         => 'Рюкзак молодежный YES ᐈ Купить молодежный рюкзак - цена от YES',
                            'description'   => 'Купить ☝ молодежный рюкзак от производителя YES™ в Киеве, Украине. ⏩ Подробный обзор. Большой выбор. ⚡️ Гарантия 2 года. Выбирай на сайте YES.',
                            'h1'            => "Рюкзаки молодежные",
                        ),
                        3 => array(
                            'title'         => 'Рюкзак молодіжний YES ᐈ Купити молодіжний рюкзак - ціна від YES',
                            'description'   => 'Купити ☝ молодіжний рюкзак від виробника YES ™ в Києві, Україні. ⏩ Докладний огляд. Великий вибір. ⚡️ Гарантія 2 роки. Обирай на сайті YES.',
                            'h1'            => "Рюкзаки молодіжні",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/19-29/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Молодежные рюкзаки для девушек', 'молодежный рюкзак для девушки' ),
                            'description'   => sprintf( $descrRu, 'молодежный рюкзак для девушки' ),
                            'h1'            => "Молодежные рюкзаки для девушек",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Молодіжні рюкзаки для дівчат', 'молодіжний рюкзак для дівчини' ),
                            'description'   => sprintf( $descrUa, 'молодіжний рюкзак для дівчини' ),
                            'h1'            => "Молодіжні рюкзаки для дівчат",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/19-29/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Рюкзаки молодежные мужские', 'рюкзак молодежный мужской' ),
                            'description'   => sprintf( $descrRu, 'рюкзак молодежный мужской' ),
                            'h1'            => "Рюкзаки молодежные мужские",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Рюкзаки молодіжні чоловічі', 'рюкзак молодіжний чоловічий' ),
                            'description'   => sprintf( $descrUa, 'рюкзак молодіжний чоловічий' ),
                            'h1'            => "Рюкзаки молодіжні чоловічі",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/' => array(
                        1 => array(
                            'title'         => 'Городской рюкзак YES ᐈ Купить рюкзак городской - цена от YES',
                            'description'   => 'Купить фирменный городской рюкзак YES™ по выгодной цене. ⚡️ Мужские и женские городские рюкзаки. Большой ассортимент ☝ Гарантия 24 месяца ⏩ Выбирай на сайте YES',
                            'h1'            => "Городские рюкзаки",
                        ),
                        3 => array(
                            'title'         => 'Міський рюкзак YES ᐈ Купити рюкзак міський - ціна від YES',
                            'description'   => 'Купити фірмовий міський рюкзак YES ™ за вигідною ціною. ⚡️ Чоловічі та жіночі міські рюкзаки. Великий асортимент ☝ Гарантія 24 місяці ⏩ Вибирай на сайті YES',
                            'h1'            => "Міські рюкзаки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/' => array(
                        1 => array(
                            'title'         => "Рюкзак женский городской YES ᐈ Купить рюкзак женский городской - цена от YES",
                            'description'   => "Купить ☝ рюкзак рюкзак женский городской от производителя YES™ в Киеве, Украине. ⏩ Подробный обзор. Большой выбор. ⚡️ Гарантия 2 года. Выбирай на сайте YES.",
                            'h1'            => "Рюкзаки женские городские",
                        ),
                        3 => array(
                            'title'         => "Рюкзак жіночий міський YES ᐈ Купити рюкзак жіночий міський - ціна від YES",
                            'description'   => "Купити ☝ рюкзак рюкзак жіночий міський від виробника YES™ в Києві, Україні. ⏩ Детальний огляд. Великий вибір. ⚡️ Гарантія 2 роки. Обирай на сайті YES.",
                            'h1'            => "Рюкзаки жіночі міські",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/' => array(
                        1 => array(
                            'title'         => 'Рюкзак городской мужской YES ᐈ Купить рюкзак мужской городской в Киеве, Украине',
                            'description'   => 'Купить ☝ рюкзак городской мужской от производителя YES™ в Киеве, Украине. ⏩ Подробный обзор. Большой выбор. ⚡️ Гарантия 2 года. Выбирай на сайте YES.',
                            'h1'            => "Рюкзаки мужские городские",
                        ),
                        3 => array(
                            'title'         => "Рюкзак міський чоловічий YES ᐈ Купити рюкзак чоловічий міський - ціна від YES",
                            'description'   => "Придбати ☝ рюкзак міський чоловічий від виробника YES™ в Києві, Україні. ⏩ Детальний огляд. Великий вибір. ⚡️ Гарантія 2 роки. Обирай на сайті YES.",
                            'h1'            => "Рюкзаки чоловічі міські",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/zhinochi-ryukzaki/' => array(
                        1 => array(
                            'title'         => 'Рюкзаки женские YES ᐈ Купить рюкзак женский - рюкзаки для девушек в Киеве, Украине',
                            'description'   => 'Купить ☝ фирменный рюкзак женский от производителя YES™ в Киеве, Украине. ✅ Большой ассортимент. ⚡️ Выбирай стильные и модные рюкзаки на сайте YES.',
                            'h1'            => "Женские рюкзаки",
                        ),
                        3 => array(
                            'title'         => 'Рюкзаки жіночі YES ᐈ Купити рюкзак жіночий - рюкзаки для дівчат в Києві, Україні',
                            'description'   => 'Купити ☝ фірмовий рюкзак жіночий від виробника YES ™ в Києві, Україні. ✅ Великий асортимент. ⚡️ Вибирай стильні і модні рюкзаки на сайті YES.',
                            'h1'            => "Жіночі рюкзаки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/zhinochi-ryukzaki/tip/rjukzak-sumka/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Сумки-рюкзаки женские', 'сумку-рюкзак женскую' ),
                            'description'   => sprintf( $descrRu, 'сумку-рюкзак женскую' ),
                            'h1'            => "Сумки-рюкзаки женские",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Сумки-рюкзаки жіночі', 'сумку-рюкзак жіночу' ),
                            'description'   => sprintf( $descrUa, 'сумку-рюкзак жіночу' ),
                            'h1'            => "Сумки-рюкзаки жіночі",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/zhinochi-ryukzaki/tsvet/chernyj/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Рюкзаки чёрные женские', 'рюкзак чёрный женский' ),
                            'description'   => sprintf( $descrRu, 'рюкзак чёрный женский' ),
                            'h1'            => "Рюкзаки чёрные женские",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Рюкзаки чорні жіночі', 'рюкзак чорний жіночий' ),
                            'description'   => sprintf( $descrUa, 'рюкзак чорний жіночий' ),
                            'h1'            => "Рюкзаки чорні жіночі",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/zhinochi-ryukzaki/obem-l/7/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Маленькие женские рюкзаки', 'маленький женский рюкзак' ),
                            'description'   => sprintf( $descrRu, 'маленький женский рюкзак' ),
                            'h1'            => "Маленькие женские рюкзаки",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Маленькі жіночі рюкзаки', 'маленький жіночий рюкзак' ),
                            'description'   => sprintf( $descrUa, 'маленький жіночий рюкзак' ),
                            'h1'            => "Маленькі жіночі рюкзаки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/zhinochi-ryukzaki/material/eko-kozha/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Рюкзаки из экокожи', 'рюкзак из экокожи' ),
                            'description'   => sprintf( $descrRu, 'рюкзак из экокожи' ),
                            'h1'            => "Рюкзаки из экокожи",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Рюкзаки з екокожі', 'рюкзак з екокожі' ),
                            'description'   => sprintf( $descrUa, 'рюкзак з екокожі' ),
                            'h1'            => "Рюкзаки з екокожі",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/sumki/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu_2, 'Сумки', 'сумку' ),
                            'description'   => sprintf( $descrRu_2, 'сумку' ),
                            'h1'            => "Сумки",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa_2, 'Сумки', 'сумку' ),
                            'description'   => sprintf( $descrUa_2, 'сумку' ),
                            'h1'            => "Сумки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/sumki/sumki-dlya-vzuttya/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu_2, 'Сумки для обуви', 'сумку для обуви' ),
                            'description'   => sprintf( $descrRu_2, 'сумку для обуви' ),
                            'h1'            => "Сумки для обуви",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa_2, 'Сумки для взуття', 'сумку для взуття' ),
                            'description'   => sprintf( $descrUa_2, 'сумку для взуття' ),
                            'h1'            => "Сумки для взуття",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/sumki/sumki-na-poyas/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu_2, 'Сумки на пояс', 'сумку на пояс' ),
                            'description'   => sprintf( $descrRu_2, 'сумку на пояс' ),
                            'h1'            => "Сумки на пояс",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa_2, 'Сумки на пояс', 'сумку на пояс' ),
                            'description'   => sprintf( $descrUa_2, 'сумку на пояс' ),
                            'h1'            => "Сумки на пояс",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/sumki/sumki-kids/' => array(
                        1 => array(
                            'title'         => "Детские сумки YES ᐈ Купить сумку детскую - детские сумочки в Киеве, Украине",
                            'description'   => "Купить детские сумки YES™ по выгодной цене. ⚡️ Детские сумки для девочек и мальчиков, сумки для подростков. ☝ Большой ассортимент. ⏩ Выбирай на сайте YES.",
                            'h1'            => "Детские сумки",
                        ),
                        3 => array(
                            'title'         => "Дитячі сумки YES ᐈ Купити сумку дитячу - дитячі сумочки в Києві, Україні",
                            'description'   => "Купити дитячі сумки YES ™ за вигідною ціною. ⚡️ Дитячі сумки для дівчаток і хлопчиків, сумки для підлітків. ☝ Великий асортимент. ⏩ Обирай на сайті YES.",
                            'h1'            => "Дитячі сумки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/sportivni-sumki/tip/sumka-sportivnaja/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu_2, 'Детские спортивные сумки', 'детскую спортивную сумку' ),
                            'description'   => sprintf( $descrRu_2, 'детскую спортивную сумку' ),
                            'h1'            => "Детские спортивные сумки",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa_2, 'Дитячі спортивні сумки', 'дитячу спортивну сумку' ),
                            'description'   => sprintf( $descrUa_2, 'дитячу спортивну сумку' ),
                            'h1'            => "Дитячі спортивні сумки",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/kocmetichki/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu_2, 'Косметички', 'косметичку' ),
                            'description'   => sprintf( $descrRu_2, 'косметичку' ),
                            'h1'            => "Косметички",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa_2, 'Косметички', 'косметичку' ),
                            'description'   => sprintf( $descrUa_2, 'косметичку' ),
                            'h1'            => "Косметички",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/kocmetichki/tip/penal-kosmetichka/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Пеналы-Косметички', 'пенал-косметичку' ),
                            'description'   => sprintf( $descrRu, 'пенал-косметичку' ),
                            'h1'            => "Пеналы-Косметички",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Пенали-Косметички', 'пенал-косметичку' ),
                            'description'   => sprintf( $descrUa, 'пенал-косметичку' ),
                            'h1'            => "Пенали-Косметички",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/chohli-dlya-noutbukiv-i-planshetiv/' => array(
                        1 => array(
                            'title'         => sprintf( $titleRu, 'Чехлы для ноутбуков и планшетов', 'чехол для ноутбука, планшета' ),
                            'description'   => sprintf( $descrRu, 'чехол для ноутбука, планшета' ),
                            'h1'            => "Чехлы для ноутбуков и планшетов",
                        ),
                        3 => array(
                            'title'         => sprintf( $titleUa, 'Чохли для ноутбуків і планшетів', 'чохол для ноутбука, планшета' ),
                            'description'   => sprintf( $descrUa, 'чохол для ноутбука, планшета' ),
                            'h1'            => "Чохли для ноутбуків і планшетів",
                        ),
                    ),
                    '/ryukzaki-ta-cumki/rjukzaki-school/ryukzaky-karkasni/' => array(
                        1 => array(
                            'title'         => 'Каркасные рюкзаки YES ᐈ Купить рюкзак школьный каркасный - цена на сайте YES',
                            'description'   => 'Купить ☝ рюкзак школьный каркасный от производителя YES™ в Киеве, Украине. ⏩ Подробный обзор. Большой выбор моделей. ⚡️ Гарантия 2 года. Выбирай на сайте YES',
                            'h1'            => "Каркасные рюкзаки",
                        ),
                        3 => array(
                            'title'         => 'Каркасні рюкзаки YES ᐈ Купити рюкзак шкільний каркасний - ціна на сайті YES',
                            'description'   => 'Купити ☝ рюкзак шкільний каркасний від виробника YES ™ в Києві, Україні. ⏩ Детальний огляд. Великий вибір моделей. ⚡️ Гарантія 2 роки. Обирай на сайті YES',
                            'h1'            => "Каркасні рюкзаки",
                        ),
                    ),
                    // Kanctovary
                    28 => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanRu, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanUa, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                    ),
                    '/kanctovari/' => array(
                        1 => array(
                            'title'         => 'Канцтовары YES - купить канцелярию в Киеве, Украине ᐈ Канцелярия для школы и офиса',
                            'description'   => 'Купить ☝ фирменные канцтовары (канцелярию) от производителя YES™ в Киеве, Украине. ⚡️ Большой выбор канцелярии для школы и офиса на сайте YES.',
                            'h1'            => 'Канцтовары',
                        ),
                        3 => array(
                            'title'         => 'Канцтовари YES - купити канцелярію в Києві, Україні ᐈ Канцелярія для школи та офісу',
                            'description'   => 'Купити ☝ фірмові канцтовари (канцелярію) від виробника YES™ в Києві, Україні. ⚡️ Великий вибір канцелярії для школи та офісу на сайті YES.',
                            'h1'            => 'Канцтовари',
                        ),
                    ),
                    '/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/karandash-grafitnii/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanRu_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanUa_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                    ),
                    '/kanctovari/izmeritel-nie-prinadlezhnocti/lineika/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Линейки', 'линейки' ),
                            'description'   => sprintf( $descrKanRu, 'линейки' ),
                            'h1'            => 'Линейки',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Лінійки', 'лінійки' ),
                            'description'   => sprintf( $descrKanUa, 'лінійки' ),
                            'h1'            => 'Лінійки',
                        ),
                    ),
                    '/kanctovari/izmeritel-nie-prinadlezhnocti/trancportir-639907880/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Транспортиры', 'транспортиры' ),
                            'description'   => sprintf( $descrKanRu, 'транспортиры' ),
                            'h1'            => 'Транспортиры',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Транспортири', 'транспортири' ),
                            'description'   => sprintf( $descrKanUa, 'транспортири' ),
                            'h1'            => 'Транспортири',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/' => array(
                        1 => array(
                            'title'         => 'Школьные принадлежности YES ᐈ Купить товары для школы в Киеве, Украине',
                            'description'   => 'Школьные принадлежности YES ☝ Купить все для школы в Киеве, Украине. ⏩ Огромный ассортимент товаров для школы от производителя. ⚡️ Выбирай на сайте YES.',
                            'h1'            => 'Школьные принадлежности',
                        ),
                        3 => array(
                            'title'         => 'Шкільне приладдя YES ᐈ Купити товари для школи в Києві, Україні',
                            'description'   => 'Шкільне приладдя YES ☝ Купити все для школи в Києві, Україні. ⏩ Величезний асортимент товарів для школи від виробника. ⚡️ Обирай на сайті YES.',
                            'h1'            => 'Шкільне приладдя',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/klei/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanRu_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanUa_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/mel/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanRu_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanUa_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/plactilin/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanRu_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanUa_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/podlozhka-dlya-ctola/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_3, 'Подложки для стола', 'подложку для стола' ),
                            'description'   => sprintf( $descrKanRu_3, 'подложку для стола' ),
                            'h1'            => 'Подложки для стола',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_3, 'Підкладки для столу', 'підкладку для столу' ),
                            'description'   => sprintf( $descrKanUa_3, 'підкладку для столу' ),
                            'h1'            => 'Підкладки для столу',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-knig/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_3, 'Подставки для книг', 'подставку для книг' ),
                            'description'   => sprintf( $descrKanRu_3, 'подставку для книг' ),
                            'h1'            => 'Подставки для книг',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_3, 'Підставки для книг', 'підставку для книг' ),
                            'description'   => sprintf( $descrKanUa_3, 'підставку для книг' ),
                            'h1'            => 'Підставки для книг',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-pic-mennix-prinadlezhnoctei/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Подставки для канцелярии', 'подставки для канцелярии' ),
                            'description'   => sprintf( $descrKanRu, 'подставки для канцелярии' ),
                            'h1'            => 'Подставки для канцелярии',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Підставки для канцелярії', 'підставки для канцелярії' ),
                            'description'   => sprintf( $descrKanUa, 'підставки для канцелярії' ),
                            'h1'            => 'Підставки для канцелярії',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/inshe/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Корзины для канцелярии', 'корзины для канцелярии' ),
                            'description'   => sprintf( $descrKanRu, 'корзины для канцелярии' ),
                            'h1'            => 'Корзины для канцелярии',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Кошики для канцелярії', 'кошики для канцелярії' ),
                            'description'   => sprintf( $descrKanUa, 'кошики для канцелярії' ),
                            'h1'            => 'Кошики для канцелярії',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/papka/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Папки', 'папки' ),
                            'description'   => sprintf( $descrKanRu, 'папки' ),
                            'h1'            => 'Папки',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Папки', 'папки' ),
                            'description'   => sprintf( $descrKanUa, 'папки' ),
                            'h1'            => 'Папки',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-portfel-dlja-prinadlezhnostej/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Папки-портфели детские', 'папки-портфели детские' ),
                            'description'   => sprintf( $descrKanRu, 'папки-портфели детские' ),
                            'h1'            => 'Папки-портфели детские',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Папки-портфелі дитячі', 'папки-портфелі дитячі' ),
                            'description'   => sprintf( $descrKanUa, 'папки-портфелі дитячі' ),
                            'h1'            => 'Папки-портфелі дитячі',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-knopke/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Папки-конверты на кнопке', 'папки-конверты на кнопке' ),
                            'description'   => sprintf( $descrKanRu, 'папки-конверты на кнопке' ),
                            'h1'            => 'Папки-конверты на кнопке',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Папки-конверти на кнопці', 'папки-конверти на кнопці' ),
                            'description'   => sprintf( $descrKanUa, 'папки-конверти на кнопці' ),
                            'h1'            => 'Папки-конверти на кнопці',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-molnii/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Папки-конверты на молнии', 'папки-конверты на молнии' ),
                            'description'   => sprintf( $descrKanRu, 'папки-конверты на молнии' ),
                            'h1'            => 'Папки-конверты на молнии',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Папки-конверти на блискавці', 'папки-конверти на блискавці' ),
                            'description'   => sprintf( $descrKanUa, 'папки-конверти на блискавці' ),
                            'h1'            => 'Папки-конверти на блискавці',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-tetradej/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Папки для тетрадей', 'папки для тетрадей' ),
                            'description'   => sprintf( $descrKanRu, 'папки для тетрадей' ),
                            'h1'            => 'Папки для тетрадей',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Папки для зошитів', 'папки для зошитів' ),
                            'description'   => sprintf( $descrKanUa, 'папки для зошитів' ),
                            'h1'            => 'Папки для зошитів',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-truda/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Папки для труда', 'папки для труда' ),
                            'description'   => sprintf( $descrKanRu, 'папки для труда' ),
                            'h1'            => 'Папки для труда',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Папки для праці', 'папки для праці' ),
                            'description'   => sprintf( $descrKanUa, 'папки для праці' ),
                            'h1'            => 'Папки для праці',
                        ),
                    ),
                    '/kanctovari/ricovanie/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_4, 'Товары для рисования', 'товары для рисования' ),
                            'description'   => sprintf( $descrKanRu_4, 'товары для рисования' ),
                            'h1'            => 'Товары для рисования',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_4, 'Товари для малювання', 'товари для малювання' ),
                            'description'   => sprintf( $descrKanUa_4, 'товари для малювання' ),
                            'h1'            => 'Товари для малювання',
                        ),
                    ),
                    '/dityacha-tvorchist/barvi/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Краски', 'краски' ),
                            'description'   => sprintf( $descrKanRu, 'краски' ),
                            'h1'            => 'Краски',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Фарби', 'фарби' ),
                            'description'   => sprintf( $descrKanUa, 'фарби' ),
                            'h1'            => 'Фарби',
                        ),
                    ),
                    '/kanctovari/bumazhno-belovie-tovari/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_3, 'Бумажная продукция', 'бумажную продукцию' ),
                            'description'   => sprintf( $descrKanRu_3, 'бумажную продукцию' ),
                            'h1'            => 'Бумажная продукция',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_3, 'Паперова продукція', 'паперову продукцію' ),
                            'description'   => sprintf( $descrKanUa_3, 'паперову продукцію' ),
                            'h1'            => 'Паперова продукція',
                        ),
                    ),
                    '/kanctovari/shkol-nie-prinadlezhnocti/papir-dlya-notatok-ta-indeksiv/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_3, 'Бумага для заметок и индексов', 'бумагу для заметок и индексов' ),
                            'description'   => sprintf( $descrKanRu_3, 'бумагу для заметок и индексов' ),
                            'h1'            => 'Бумага для заметок и индексов',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_3, 'Папір для заміток і індексів', 'папір для заміток і індексів' ),
                            'description'   => sprintf( $descrKanUa_3, 'папір для заміток і індексів' ),
                            'h1'            => 'Папір для заміток і індексів',
                        ),
                    ),
                    '/kanctovari/shodenniki/' => array(
                        1 => array(
                            'title'         => 'Купить ежедневник - цена ежедневника в Киеве, Украине - YES',
                            'description'   => 'Купить ☝ ежедневник бренда YES в Киеве, Украине. ⏩ Каталог стильных недатированных деловых ежедневников. ⚡️ Большой выбор. Выбирай бренд YES',
                            'h1'            => 'Ежедневники',
                        ),
                        3 => array(
                            'title'         => 'Купити щоденник - ціна записника у Києві, Україні - YES',
                            'description'   => 'Купити ☝ записник бренду YES у Києві, Україні. ⏩ Каталог стильних недатованих ділових щоденників. ⚡️ Великий вибір. Вибирай бренд YES',
                            'h1'            => 'Щоденники',
                        ),
                    ),
                    '/kanctovari/bumazhno-belovie-tovari/tetradi/' => array(
                        1 => array(
                            'title'         => 'Тетради для школы - купить школьные тетради в Киеве, Украине - YES',
                            'description'   => 'Купить ☝ школьные тетради бренда YES в Киеве, Украине. ⏩ Тетради ученические в клетку, в линейку и в косую линию. ⚡️ Красивые тетради от производителя YES.',
                            'h1'            => 'Тетради',
                        ),
                        3 => array(
                            'title'         => 'Зошити для школи - купити шкільні зошити у Києві, Україні - YES',
                            'description'   => 'Купити ☝ шкільні зошити бренду YES у Києві, Україні. ⏩ Зошити учнівські в клітинку, лінійку та в косу лінію. ⚡️ Красиві зошити від виробника YES.',
                            'h1'            => 'Зошити',
                        ),
                    ),
                    '/accessories/breloki/brelok-katafot/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanRu_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanUa_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                    ),
                    '/accessories/breloki/brelok-fliker/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanRu_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, $catTitle, $catTitleSmall ),
                            'description'   => sprintf( $descrKanUa_2, $catTitleSmall ),
                            'h1'            => $catTitle,
                        ),
                    ),
                    '/accessories/biznes-aksesuari-1/tip/bejdzh/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Бейджи', 'бейджи' ),
                            'description'   => sprintf( $descrKanRu, 'бейджи' ),
                            'h1'            => 'Бейджи',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Бейджи', 'бейджи' ),
                            'description'   => sprintf( $descrKanUa, 'бейджи' ),
                            'h1'            => 'Бейджи',
                        ),
                    ),
                    '/accessories/biznes-aksesuari-1/tip/vizitnitsa-karmannaja/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu, 'Визитницы и кардхолдеры', 'визитницы и кардхолдеры' ),
                            'description'   => sprintf( $descrKanRu, 'визитницы и кардхолдеры' ),
                            'h1'            => 'Визитницы и кардхолдеры',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa, 'Візитівки й кардхолдери', 'Візитівки й кардхолдери' ),
                            'description'   => sprintf( $descrKanUa, 'Візитівки й кардхолдери' ),
                            'h1'            => 'Візитівки й кардхолдери',
                        ),
                    ),
                    '/accessories/plyashki-ta-lanchbokci/plyashki/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_5, 'Бутылки для воды', 'бутылку для воды' ),
                            'description'   => sprintf( $descrKanRu_5, 'бутылку для воды' ),
                            'h1'            => 'Бутылки для воды',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_5, 'Пляшки для води', 'пляшку для води' ),
                            'description'   => sprintf( $descrKanUa_5, 'пляшку для води' ),
                            'h1'            => 'Пляшки для води',
                        ),
                    ),
                    '/accessories/poperechnii-remin-dlya-ryukzaka/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, 'Поперечный ремень для рюкзака', 'поперечный ремень для рюкзака' ),
                            'description'   => sprintf( $descrKanRu_2, 'поперечный ремень для рюкзака' ),
                            'h1'            => 'Поперечный ремень для рюкзака',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, 'Поперечний ремінь для рюкзака', 'поперечний ремінь для рюкзака' ),
                            'description'   => sprintf( $descrKanUa_2, 'поперечний ремінь для рюкзака' ),
                            'h1'            => 'Поперечний ремінь для рюкзака',
                        ),
                    ),
                    '/accessories/koshel-ki/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, 'Кошельки', 'кошелек' ),
                            'description'   => sprintf( $descrKanRu_2, 'кошелек' ),
                            'h1'            => 'Кошельки',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, 'Гаманці', 'гаманець' ),
                            'description'   => sprintf( $descrKanUa_2, 'гаманець' ),
                            'h1'            => 'Гаманці',
                        ),
                    ),
                    '/accessories/skarbnichki/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, 'Копилки', 'копилка' ),
                            'description'   => sprintf( $descrKanRu_2, 'копилка' ),
                            'h1'            => 'Копилки',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, 'Скарбнички', 'скарбничку' ),
                            'description'   => sprintf( $descrKanUa_2, 'скарбничку' ),
                            'h1'            => 'Скарбнички',
                        ),
                    ),
                    '/accessories/kosmetika/' => array(
                        1 => array(
                            'title'         => "Детская косметика ᐈ Купить детскую косметику в Киеве, Украине - YES",
                            'description'   => "Купить ☝ фирменную детскую косметику YES™ по выгодной цене. ⏩ Бальзамы для губ, антисептики. ⏩ Гарантия качества. ⏩ Выбирай на официальном сайте YES!",
                            'h1'            => 'Детская косметика',
                        ),
                        3 => array(
                            'title'         => "Дитяча косметика ᐈ Купити дитячу косметику в Києві, Україні - YES",
                            'description'   => "Купити ☝ фірмову дитячу косметику YES™ за вигідною ціною. ⏩ Бальзами для губ, антисептики. ⏩ Гарантія якості. ⏩ Вибирай на офіційному сайті YES!",
                            'h1'            => 'Дитяча косметика',
                        ),
                    ),
                    '/accessories/dozhdevik/' => array(
                        1 => array(
                            'title'         => sprintf( $titleKanRu_2, 'Дождевики', 'дождевик' ),
                            'description'   => sprintf( $descrKanRu_2, 'дождевик' ),
                            'h1'            => 'Дождевики',
                        ),
                        3 => array(
                            'title'         => sprintf( $titleKanUa_2, 'Дощовики', 'дощовик' ),
                            'description'   => sprintf( $descrKanUa_2, 'дощовик' ),
                            'h1'            => 'Дощовики',
                        ),
                    ),
                );

                $currentMetas = array();
                $pathRev = array_reverse($path);
                $currentUrl = str_replace( array( '/en/', '/ru/' ), '/', $_SERVER[ 'REQUEST_URI' ] );
                if( strpos( $currentUrl, '?page=' ) !== false ) {
                    $pagePos = strpos( $currentUrl, '?page=' );
                    $currentUrl = substr( $currentUrl, 0, $pagePos );
                }

                if ( ! empty( $metas[ $currentUrl ] ) ) {
                    $currentMetas = $metas[ $currentUrl ];
                } else {
                    for( $i=0; $i < count($path); $i++ ) {
                        if ( isset( $metas[ $pathRev[$i] ] ) ) $currentMetas = $metas[ $pathRev[$i] ];
                    }
                }

                if ( ! $currentMetas ) {
                    $currentMetas = $metas[ 'default' ];
                }

                if ( ! empty( $currentMetas[ $language_id ] ) ) {
                    switch( $language_id ) {
                        case 1: $lang = 'ru'; break;
                        case 2: $lang = 'en'; break;
                        case 3: $lang = 'ua'; break;
                        default: $lang = 'ua';
                    }
                    $currentMetas[ $language_id ]['seo_text'] = $this->getSeoTextFromFile( trim( $currentUrl, '/') . '_' . $lang . '.html' );
                }

                return empty( $currentMetas[ $language_id ] ) ? array() : $currentMetas[ $language_id ];
                break;
            case 'product/product' :
                $product_id = (int)$this->request->get['product_id'];
                if ( ! $product_id ) return array();

                $this->load->model('catalog/product');
                $product_info = $this->model_catalog_product->getProduct($product_id);
                $price = $product_info['price'] > 0 ? ' - купить за ' . (int)$product_info['price'] . ' грн' : '';
                $priceUa = $product_info['price'] > 0 ? ' - купити за ' . (int)$product_info['price'] . ' грн' : '';
                $metas = array(
                    1 => array(
                        'title'         => "{$product_info['name']} ᐈ Купить в Киеве, Украине - YES",
                        'description'   => "{$product_info['name']}{$price}. ☝ Выбирайте и заказывайте уже сейчас! ✔️ Широкий ассортимент. ✔️ Гарантия качества.",
                        'h1'            => "{$product_info['name']}",
                    ),
                    3 => array(
                        'title'         => "{$product_info['name']} ᐈ Купити в Києві, Україні - YES",
                        'description'   => "{$product_info['name']}{$priceUa}. ☝ Вибирайте і замовляйте вже зараз! ✔️ Широкий асортимент. ✔️ Гарантія якості.",
                        'h1'            => "{$product_info['name']}",
                    ),
                );

                return empty( $metas[ $language_id ] ) ? array() : $metas[ $language_id ];
                break;
            case 'newsblog/category' :
                $Page = '';
                if (isset($this->request->get['newsblog_path'])) {
                    $path = '';
                    $parts = explode('_', (string)$this->request->get['newsblog_path']);
                    $category_id = (int)array_pop($parts);
                    $this->load->model('newsblog/category');
                    $category_info = $this->model_newsblog_category->getCategory($category_id);
                    $Page = $category_info['name'];
                }
                $metas = array(
                    'default' => array(
                        1 => array(
                            'title'         => "$Page – Блог компании YES",
                            'description'   => "$Page – Интересные статьи от экспертов компании YES.",
                            'h1'            => "$Page",
                        ),
                        3 => array(
                            'title'         => "$Page – Блог компанії YES",
                            'description'   => "$Page - Цікаві статті від експертів компанії YES.",
                            'h1'            => "$Page",
                        ),
                    ),
                    '/our-blog/' => array(
                        1 => array(
                            'title'         => "Блог – все о рюкзаках, сумках и канцелярии ᐈ Официальный сайт YES",
                            'description'   => "Блог ☝ Интересные статьи о рюкзаках, сумках и канцелярии от экспертов YES™.",
                            'h1'            => "Блог",
                        ),
                        3 => array(
                            'title'         => "Блог - все про рюкзаки, сумки і канцелярію ᐈ Офіційний сайт YES",
                            'description'   => "Блог ☝ Цікаві статті про рюкзаки, сумки і канцелярію від експертів YES™.",
                            'h1'            => "Блог",
                        ),
                    ),

                    '/novosti-kompanii/' => array(
                        1 => array(
                            'title'         => "Блог – все о рюкзаках, сумках и канцелярии ᐈ Официальный сайт YES",
                            'description'   => "Блог ☝ Интересные статьи о рюкзаках, сумках и канцелярии от экспертов YES™.",
                            'h1'            => "Блог",
                        ),
                        3 => array(
                            'title'         => "Блог - все про рюкзаки, сумки і канцелярію ᐈ Офіційний сайт YES",
                            'description'   => "Блог ☝ Цікаві статті про рюкзаки, сумки і канцелярію від експертів YES™.",
                            'h1'            => "Блог",
                        ),
                    ),
                    '/novosti-i-akcii/' => array(
                        1 => array(
                            'title'         => "",
                            'description'   => "",
                            'h1'            => "",
                        ),
                        3 => array(
                            'title'         => "",
                            'description'   => "",
                            'h1'            => "",
                        ),
                    ),
                );
                $currentMetas = array();
                $currentUrl = str_replace( array( '/en/', '/ru/' ), '/', $_SERVER[ 'REQUEST_URI' ] );
                if( strpos( $currentUrl, '?page=' ) !== false ) {
                    $pagePos = strpos( $currentUrl, '?page=' );
                    $currentUrl = substr( $currentUrl, 0, $pagePos );
                }

                if ( ! empty( $metas[ $currentUrl ] ) ) {
                    $currentMetas = $metas[ $currentUrl ];
                } else if ( $Page ) {
                    $currentMetas = $metas[ 'default' ];
                } else {
                    $currentMetas = array();
                }

                return empty( $currentMetas[ $language_id ] ) || ! $Page ? array() : $currentMetas[ $language_id ];
                break;
            case 'newsblog/article' :
                $Page = '';
                if (isset($this->request->get['newsblog_article_id'])) {
                    $newsblog_article_id = isset($this->request->get['newsblog_article_id']) ? (int)$this->request->get['newsblog_article_id'] : 0;
                    $this->load->model('newsblog/article');
                    $article_info = $this->model_newsblog_article->getArticle($newsblog_article_id);
                    $Page = $article_info['name'];
                }
                $metas = array(
                    'default' => array(
                        1 => array(
                            'title'         => "$Page – Блог компании YES",
                            'description'   => "Читайте статью - $Page - от экспертов компании YES.",
                            'h1'            => "$Page",
                            'default'       => true,
                        ),
                        3 => array(
                            'title'         => "$Page – Блог компанії YES",
                            'description'   => "Читайте статтю - $Page - від експертів компанії YES.",
                            'h1'            => "$Page",
                            'default'       => true,
                        ),
                    ),
                    '/umovi-nadannya-garant%D1%96%D1%97-na-rukzaki-ta-sumki-tm' => array(
                        1 => array(
                            'title'         => "Гарантийная памятка «YES» (на рюкзаки и сумки) ᐈ Официальный сайт YES",
                            'description'   => "Гарантийная памятка «YES» (на рюкзаки и сумки) ☝ Сертифицированные, анатомически правильные рюкзаки. ✔️ Рекомендованы ортопедами. ✔️ Продукция YES™ - гарантия качества.",
                            'h1'            => "Гарантийная памятка «YES» (на рюкзаки и сумки)",
                        ),
                        3 => array(
                            'title'         => "Гарантійна пам'ятка YES (на рюкзаки та сумки) ᐈ Офіційний сайт YES",
                            'description'   => "Гарантійна пам'ятка YES (на рюкзаки та сумки) ☝ Сертифіковані, анатомічно правильні рюкзаки. ✔️ Рекомендовані ортопедами. ✔️ Продукція YES ™ - гарантія якості.",
                            'h1'            => "Гарантійна пам'ятка YES (на рюкзаки та сумки)",
                        ),
                    ),
                );
                $currentMetas = array();
                $currentUrl = str_replace( array( '/en/', '/ru/' ), '/', $_SERVER[ 'REQUEST_URI' ] );
                if( strpos( $currentUrl, '?page=' ) !== false ) {
                    $pagePos = strpos( $currentUrl, '?page=' );
                    $currentUrl = substr( $currentUrl, 0, $pagePos );
                }

                if ( ! empty( $metas[ $currentUrl ] ) ) {
                    $currentMetas = $metas[ $currentUrl ];
                } else if ( $Page ) {
                    $currentMetas = $metas[ 'default' ];
                } else {
                    $currentMetas = array();
                }

                return empty( $currentMetas[ $language_id ] ) || ! $Page ? array() : $currentMetas[ $language_id ];
                break;
            case 'information/contact' :
                $metas = array(
                    1 => array(
                        'title'         => "Контакты компании YES ᐈ Официальный сайт YES",
                        'description'   => "Контактная информация компании YES ☝ Днепр,
ул. Каштановая, 11. ☎ +38 (066) 165-23-34 ⏩ Широкий ассортимент рюкзаков, сумок и канцелярии высокого качества.",
                        'h1'            => "Контакты",
                    ),
                    3 => array(
                        'title'         => "Контакти компанії YES ᐈ Офіційний сайт YES",
                        'description'   => "Контактна інформація компанії YES ☝ Дніпро,
вул. Каштанова, 11. ☎ +38 (066) 165-23-34 ⏩ Широкий асортимент рюкзаків, сумок і канцелярії високої якості.",
                        'h1'            => "Контакти",
                    ),
                );

                return empty( $metas[ $language_id ] ) ? array() : $metas[ $language_id ];
                break;
        }
    }
}
