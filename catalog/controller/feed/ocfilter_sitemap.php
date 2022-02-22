<?php
class ControllerFeedOcfilterSitemap extends Controller {
	public function index() {
		if ($this->config->get('ocfilter_sitemap_status')) {
			$output  = '<?xml version="1.0" encoding="UTF-8"?>';
			$output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

      $this->load->model('catalog/ocfilter');

			$ocfilter_pages = $this->model_catalog_ocfilter->getPages();

			foreach ($ocfilter_pages as $page) {
				$output .= '<url>';
				$output .= '<loc>' . rtrim($this->url->link('product/category', 'path=' . $page['category_id']), '/') . '/' . $page['keyword'] . '</loc>';
				$output .= '<changefreq>weekly</changefreq>';
				$output .= '<priority>0.7</priority>';
				$output .= '</url>';
			}

			$output .= '</urlset>';

			$this->response->addHeader('Content-Type: application/xml');
			$this->response->setOutput($output);
		}
	}
}
