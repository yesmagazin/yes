<?php
class ControllerExtensionModuleDlxCategoryReviews extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/dlx_category_reviews');

        $language_id = (int) $this->config->get('config_language_id');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_rating'] = $this->language->get('text_tax');

		$this->load->model('catalog/product');

		$this->load->model('catalog/review');

		$this->load->model('tool/image');

        if (isset($this->request->get['path'])) {
            $parts = explode('_', (string) $this->request->get['path']);
            $category_id = (int) array_pop($parts);
        } else {
            $category_id = 0;
        }

		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'p.date_added',
			'order' => 'DESC',
			'start' => 0,
			'limit' => 9999,
            'filter_category_id' => $category_id,
            'filter_sub_category' => true
		);

		$results = $this->model_catalog_product->getProducts($filter_data);

        $productIds = array();
        $products = array();
        $data = array();
		if ($results) {
            foreach ($results as $result) {
                $productIds[] = $result['product_id'];

                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
                }

                if ($this->config->get('config_review_status')) {
                    $rating = $result['rating'];
                } else {
                    $rating = false;
                }

                $products[$result['product_id']] = array(
                    'product_id'  => $result['product_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'rating'      => $rating,
                    'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                );
            }
		}

		if ( $productIds ) {
		    $reviews = $this->model_catalog_review->getReviewsByProductIds( $productIds, 0, 50 );
		    if ( $reviews ) {
		        $catRating = array();
		        foreach ( $reviews as $review ) {
                    $data['reviews'][$review['review_id']] = array(
                        'review_id' => $review['review_id'],
                        'author' => $review['author'],
                        'text' => $review['text'],
                        'rating' => $review['rating'],
                        'date' => $review['date_added'],
                        'product' => $products[$review['product_id']],
                        'answer' => array(),
                    );
                    $catRating[] = $review['rating'];
                }

		        if ( $catRating ) {
                    $data['rating'] = array_sum( $catRating ) / count( $catRating );
                }
            }
        }
//var_dump($data);
        return $this->load->view('extension/module/dlx_category_reviews', $data);
	}
}
