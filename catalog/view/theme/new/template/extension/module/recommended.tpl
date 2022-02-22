<section class="items-slider">
    <div class="items-slider__head">
        <div class="items-slider__tabs">
            <?php if($modules2){ ?>
            <button id="items_slider_news_button" class="items-slider__tab active"><?php echo $modules2['title'] ;?></button>
            <?php } ?>
            <?php if($modules5){ ?>
            <button id="items_slider_hits_button" class="items-slider__tab"><?php echo $modules5['title'] ;?></button>
            <?php } ?>
        </div>
        <div class="items-slider__nav">
            <div class="items-slider__nav-wrap">
                <div class="items-slider__nav-slider">
                    <span class="items-slider__nav-number" data-progress="1">1</span>
                    <span class="items-slider__nav-number" data-progress="2">2</span>
                    <span class="items-slider__nav-number" data-progress="3">3</span>
                    <span class="items-slider__nav-number" data-progress="4">4</span>
                    <span class="items-slider__nav-number" data-progress="5">5</span>
                    <span class="items-slider__nav-number" data-progress="6">6</span>
                    <span class="items-slider__nav-number" data-progress="7">7</span>
                    <span class="items-slider__nav-number" data-progress="8">8</span>
                    <span class="items-slider__nav-number" data-progress="9">9</span>
                    <span class="items-slider__nav-number" data-progress="10">10</span>
                </div>
                <span>/ 10</span>
            </div>
            <div class="items-slider__nav-progress">
                <div class="items-slider__nav-complete"></div>
            </div>
        </div>
    </div>
    <?php if($modules2){ ?>
    <div id="items_slider_news" class="items-slider__slider active">
        <?php foreach ($modules2['product'] as $product) { ?>
        <div class="items-slider__slide">
            <img class="items-slider__slide-img" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <span class="items-slider__slide-article"><?php echo $text_model; ?>: <?php echo $product['product_id']; ?></span>
            <span class="items-slider__slide-desc"><?php echo $product['name']; ?></span>
            <span class="items-slider__slide-price"><b><?php echo $product['price']; ?></b></span>
            <div class="items-slider__slide-links">
                <a href="<?php echo $product['href'].'#online'; ?>" class="items-slider__slide-link"><?php echo $text_where_to_buy; ?></a>
                <a href="<?php echo $product['href']; ?>" class="items-slider__slide-link"><?php echo $text_podrobnee; ?></a>
            </div>
            <span class="items-slider__slide-tab"><?php echo $text_new; ?></span>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php if($modules5){ ?>
    <div id="items_slider_hits" class="items-slider__slider">
        <?php foreach ($modules5['product'] as $product) { ?>
        <div class="items-slider__slide">
            <img class="items-slider__slide-img" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <span class="items-slider__slide-article"><?php echo $text_model; ?>: <?php echo $product['product_id']; ?></span>
            <span class="items-slider__slide-desc"><?php echo $product['name']; ?></span>
            <span class="items-slider__slide-price"><b><?php echo $product['price']; ?></b></span>
            <div class="items-slider__slide-links">
                <a href="<?php echo $product['href'].'#online'; ?>" class="items-slider__slide-link"><?php echo $text_where_to_buy; ?></a>
                <a href="<?php echo $product['href']; ?>" class="items-slider__slide-link"><?php echo $text_podrobnee; ?></a>
            </div>
            <span class="items-slider__slide-tab"><?php echo $text_hit; ?></span>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</section>