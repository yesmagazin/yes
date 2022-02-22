<?php
class Pagination {
    public $total = 0;
    public $page = 1;
    public $limit = 20;
    public $num_links = 5;
    public $url = '';
    public $text_first = '|&lt;';
    public $text_last = '&gt;|';
    public $text_next = '&gt;';
    public $text_prev = '&lt;';

    public function render() {
        $total = $this->total;

        if ($this->page < 1) {
            $page = 1;
        } else {
            $page = $this->page;
        }

        if (!(int)$this->limit) {
            $limit = 10;
        } else {
            $limit = $this->limit;
        }

        $num_links = $this->num_links;
        $num_pages = ceil($total / $limit);

        $this->url = str_replace('%7Bpage%7D', '{page}', $this->url);

        $output = '<ul class="pagination">';

        if ($page > 1) {
            $output .= '<li class="first"><a href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '">' . $this->text_first . '</a></li>';

            if ($page - 1 === 1) {
                $output .= '<li class="prev"><a href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '">' . $this->text_prev . '</a></li>';
            } else {
                $output .= '<li class="prev"><a href="' . str_replace('{page}', $page - 1, $this->url) . '">' . $this->text_prev . '</a></li>';
            }
        }

        if ($num_pages > 1) {
            if ($num_pages <= $num_links) {
                $start = 1;
                $end = $num_pages;
            } else {
                $start = $page - floor($num_links / 2);
                $end = $page + floor($num_links / 2);

                if ($start < 1) {
                    $end += abs($start) + 1;
                    $start = 1;
                }

                if ($end > $num_pages) {
                    $start -= ($end - $num_pages);
                    $end = $num_pages;
                }
            }

            for ($i = $start; $i <= $end; $i++) {
                if ($page == $i) {
                    $output .= '<li class="active"><span>' . $i . '</span></li>';
                } else {
                    if ($i === 1) {
                        $output .= '<li><a href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '">' . $i . '</a></li>';
                    } else {
                        $output .= '<li><a href="' . str_replace('{page}', $i, $this->url) . '">' . $i . '</a></li>';
                    }
                }
            }
        }

        if ($page < $num_pages) {
            $output .= '<li class="next"><a href="' . str_replace('{page}', $page + 1, $this->url) . '">' . $this->text_next . '</a></li>';
            $output .= '<li class="last"><a href="' . str_replace('{page}', $num_pages, $this->url) . '">' . $this->text_last . '</a></li>';
        }

        $output .= '</ul>';

        if ($num_pages > 1) {
            return $output;
        } else {
            return '';
        }
    }

    public function renderNew() {

        $total = $this->total;

        if ($this->page < 1) {
            $page = 1;
        } else {
            $page = $this->page;
        }

        if (!(int)$this->limit) {
            $limit = 10;
        } else {
            $limit = $this->limit;
        }

        $num_links = $this->num_links;
        $num_pages = ceil($total / $limit);

        $this->url = str_replace('%7Bpage%7D', '{page}', $this->url);

        $output = '<ul class="pagination">';

        if ($page > 1) {
            $output .= '<li class="pagination__item pagination__item_arrow"><a class="pagination__link" href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '"><svg class="icon icon-arrow-left-sm"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-two-left-sm"></use></svg></a></li>';

            if ($page - 1 === 1) {
                $output .= '<li class="pagination__item pagination__item_arrow"><a class="pagination__link" href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '"><svg class="icon icon-arrow-left-sm"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-left-sm"></use></svg></a></li>';
            } else {
                $output .= '<li class="pagination__item pagination__item_arrow"><a class="pagination__link" href="' . str_replace('{page}', $page - 1, $this->url) . '"><svg class="icon icon-arrow-left-sm"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-left-sm"></use></svg></a></li>';
            }
        }

        if ($num_pages > 1) {
            if ($num_pages <= $num_links) {
                $start = 1;
                $end = $num_pages;
            } else {
                $start = $page - floor($num_links / 2);
                $end = $page + floor($num_links / 2);

                if ($start < 1) {
                    $end += abs($start) + 1;
                    $start = 1;
                }

                if ($end > $num_pages) {
                    $start -= ($end - $num_pages);
                    $end = $num_pages;
                }
            }

            for ($i = $start; $i <= $end; $i++) {
                if ($page == $i) {
                    $output .= '<li class="pagination__item active"><span class="pagination__link">' . $i . '</span></li>';
                } else {
                    if ($i === 1) {
                        $output .= '<li class="pagination__item"><a class="pagination__link" href="' . str_replace(array('&amp;page={page}', '?page={page}', '&page={page}'), '', $this->url) . '">' . $i . '</a></li>';
                    } else {
                        $output .= '<li class="pagination__item"><a class="pagination__link" href="' . str_replace('{page}', $i, $this->url) . '">' . $i . '</a></li>';
                    }
                }
            }
        }

        if ($page < $num_pages) {
            $output .= '<li class="pagination__item pagination__item_arrow"><a class="pagination__link show_more_link" href="' . str_replace('{page}', $page + 1, $this->url) . '"><svg class="icon icon-arrow-rigth-sm"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-rigth-sm"></use></svg></a></li>';
            $output .= '<li class="pagination__item pagination__item_arrow"><a class="pagination__link" href="' . str_replace('{page}', $num_pages, $this->url) . '"><svg class="icon icon-arrow-left-sm"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-two-right-sm"></use></svg></a></li>';
        }

        $output .= '</ul>';


        if ($num_pages > 1) {
            return $output;
        } else {
            return '';
        }
    }
}