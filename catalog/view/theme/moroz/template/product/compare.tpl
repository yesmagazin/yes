<?php echo $header; ?>

<div class="section">
    <div class="section__center center">
        <ul class="section__breadcrumbs breadcrumbs">
            <?php foreach ($breadcrumbs as $k=>$breadcrumb) { ?>
            <?php if($k != (count($breadcrumbs)-1)) { ?>
            <li class="breadcrumbs__item"><a href="<?php echo $breadcrumb['href']; ?>" class="breadcrumbs__link" ><?php echo $breadcrumb['text']; ?></a></li>
            <?php }else{ ?>
            <li class="breadcrumbs__item"><?php echo $breadcrumb['text']; ?></li>
            <?php } ?>
            <?php } ?>
        </ul>
        <div class="comparison">
            <div class="comparison__head">
                <h1 class="comparison__title title"><?php echo $heading_title; ?></h1>
                <?php if ($products) { ?>
                <button onclick="compare.removeall()" class="comparison__btn btn btn_border">
                    <span class="btn__text"><?php echo $text_clear; ?></span>
                </button>
                <?php } ?>
            </div>
            <?php if ($products) { ?>
            <div class="comparison__container comparison__container_product<?php echo count($products); ?>">
                <div class="comparison__row">
                    <div class="comparison__col">
                        <div class="comparison__logo">
                            <img class="comparison__pic" src="catalog/view/theme/moroz/stylesheet/img/yes.png" alt="">
                        </div>
                    </div>
                    <?php foreach ($products as &$product) { ?>
                    <div class="comparison__col comp<?php echo $product['product_id']; ?>">
                        <div class="comparison__preview">
                            <?php if ($product['thumb']) { ?>
                            <img class="comparison__pic" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                            <?php } ?>
                        </div>
                        <div class="comparison__articul">
                            <?php echo $text_article; ?> <?php echo $product['model']; ?>
                        </div>
                        <a class="comparison__name" href="<?php echo $product['href']; ?>">
                            <?php echo $product['name']; ?>
                        </a>
                        <div class="comparison__rating rating">
                            <?php if ($review_status) { ?>
                            <div class="rating__list">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <div class="rating__item">
                                <?php if ($product['rating'] < $i) { ?>
                                    <svg class="icon icon-star-empty"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-star-empty"></use></svg>
                                <?php } else { ?>
                                    <svg class="icon icon-star"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-star"></use></svg>
                                <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="comparison__line">
                            <div class="comparison__price"><?php echo $product['price']; ?></div>
                            <a class="comparison__review" href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['reviews']; ?></a>
                        </div>
                        <button onclick="compare.remove(<?php echo $product['product_id']; ?>)" class="comparison__remove">
                            <svg class="icon icon-basket"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-basket"></use></svg>
                        </button>
                    </div>
                    <?php } unset($product); ?>
                </div>
                <?php foreach($all_attributes as $attribute) { ?>
                <div class="comparison__row">
                    <div class="comparison__col"><?php echo $attribute['name']; ?></div>
                    <?php foreach ($products as &$product) { ?>
                    <div class="comparison__col comp<?php echo $product['product_id']; ?> prdrow">
                        <?php echo isset($product['attributes'][$attribute['attribute_id']]) ? $product['attributes'][$attribute['attribute_id']] : '&nbsp;' ?>
                    </div>
                    <?php } unset($product); ?>
                </div>
                <?php } ?>
            </div>
            <?php } else { ?>
            <div class="comparison__container">
                <div class="comparison__row no__products">
                    <?php echo $text_no_products; ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="buy">
    <div class="buy__center center">
        <h2 class="buy__title title title_sm"><?php echo $text_where_to_buy_button; ?></h2>
        <div class="buy__info"><?php echo $text_can_buy; ?></div>
        <div class="buy__btns">
            <a class="buy__btn btn btn_white" href="/de-kupiti">
                <span class="btn__text"><?php echo $text_show_shops; ?></span>
            </a>
            <div class="buy__circle circle"></div>
            <div class="buy__circle circle"></div>
            <div class="buy__circle circle"></div>
        </div>
    </div>
</div>

<?php echo $footer; ?>
