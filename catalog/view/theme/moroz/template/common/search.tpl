<div class="header__search search js-search">
    <button class="search__open js-search-open">
        <svg class="icon icon-search"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-search"></use></svg>
        <svg class="icon icon-close"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-close"></use></svg>
    </button>
    <form class="search__wrap js-search-wrap" action="<?php echo $url_search; ?>" data-open="0" id="search">
        <div class="search__field">
            <input class="search__input" type="text" name="search" value="<?php echo $search; ?>" placeholder="<?php echo $text_search; ?>">
            <button class="search__btn" type="submit">
                <svg class="icon icon-search"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-search"></use></svg>
            </button>
            <div id="livesearch_search_results" class="search_result" style="display: none;"></div>
        </div>
    </form>
</div>