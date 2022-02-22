<?php echo $header; ?>
<main class="page">
    <section class="page__head">
        <div class="crumbs">
            <?php foreach ($breadcrumbs as $k=>$breadcrumb) { ?>
            <?php if($k != (count($breadcrumbs)-1)) { ?>
            <a href="<?php echo $breadcrumb['href']; ?>" class="crumbs__link" ><?php echo $breadcrumb['text']; ?></a>
            /
            <?php }else{ ?>
            <span class="crumbs__active"><?php echo $breadcrumb['text']; ?></span>
            <?php } ?>
            <?php } ?>
        </div>
        <div class="page__title-box">
            <h2 class="page__title"><?php echo $heading_title; ?></h2>
            <?php if ($products) { ?>
            <button onclick="compare.removeall()" class="compare__clear"><?php echo $text_clear; ?></button>
            <?php } ?>
            <!--div class="compare__share">
                <span>Поделиться</span>
                <a href="#"><i class="fab fa-telegram-plane"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fas fa-link"></i>Поделиться ссылкой</a>
            </div-->
        </div>
    </section>
    <?php if ($products) { ?>
    <section class="compare">
        <div class="compare__first">
            <div class="compare__itm-first">
                <img src="catalog/view/theme/new/stylesheet/img/logo/YES_full_orange.png" alt="">
            </div>
            <!--div class="compare__row-first">
                <span>Цвета</span>
            </div-->
            <?php foreach($all_attributes as $attribute) { ?>
            <div class="compare__row-first">
                <span><?php echo $attribute['name']; ?></span>
            </div>
            <?php } ?>
        </div>
        <div class="compare__box">
            <?php foreach ($products as $product) { ?>
                <div class="compare__col" id="comp<?php echo $product['product_id']; ?>">
                <button onclick="compare.remove(<?php echo $product['product_id']; ?>)" class="compare__delete"><i class="far fa-trash-alt"></i></button>
                <div class="compare__itm">
                    <?php if ($product['thumb']) { ?>
                    <a href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>">
                        <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
                    </a>
                    <?php } ?>
                    <span class="compare__artc"><?php echo $text_article; ?> <?php echo $product['model']; ?></span>
                    <span class="compare__name"><a href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></span>
                    <span class="compare__price"><b><?php echo $product['price']; ?></b></span>
                    <?php if ($review_status) { ?>
                        <div class="compare__review">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                          <?php if ($product['rating'] < $i) { ?>
                            <i class="fas fa-star"></i>
                          <?php } else { ?>
                            <i class="fas fa-star active"></i>
                          <?php } ?>
                        <?php } ?>
                        <a href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['reviews']; ?></a>
                    </div>
                    <?php } ?>
                </div>
                <!--div class="compare__row">
                    <div class="good__option-color__pop-up">
                        <span><input class="bla" id="cl11" checked type="radio" value="bla"><label for="cl11"></label></span>
                        <span><input class="blu" id="cl12"  type="radio" value="blu"><label for="cl12"></label></span>
                        <span><input class="yel" id="cl13"  type="radio" value="yel"><label for="cl13"></label></span>
                        <span><input class="gre" id="cl14"  type="radio" value="gre"><label for="cl14"></label></span>
                        <span><input class="red" id="cl15"  type="radio" value="red"><label for="cl15"></label></span>
                    </div>
                </div-->
                <?php foreach($all_attributes as $attribute) { ?>
                <div class="compare__row">
                    <span><?php echo isset($product['attributes'][$attribute['attribute_id']]) ? $product['attributes'][$attribute['attribute_id']] : '&nbsp;' ?></span>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </section>
    <?php } ?>
</main>
<?php echo $footer; ?>
