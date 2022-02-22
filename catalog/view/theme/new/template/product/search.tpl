<?php echo $header; ?>
<main class="page category search">
    <section class="page__head">
        <?php include 'breadcrumbs.tpl'; ?>
        <h2 class="page__title"><?php echo $heading_title; ?></h2>
    </section>
    <section class="page__body category">
        <div class="category__body">
            <?php if ($products) { ?>
            <div class="category__head">
                <div class="category__head-sort">
                    <span><?php echo $text_sort; ?> <select class="head-sort" name="head-sort" id="head-sort" onchange="location = this.value;">
                    <?php foreach ($sorts as $s) { ?>
                        <?php if ($s['value'] == $sort . '-' . $order) { ?>
                            <option value="<?php echo $s['href']; ?>" selected="selected"><?php echo $s['text']; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $s['href']; ?>"><?php echo $s['text']; ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="category__head-show">
                    <span><?php echo $text_limit; ?> <select class="head-show" name="head-show" id="head-show" onchange="location = this.value;">
                      <?php foreach ($limits as $limits) { ?>
                      <?php if ($limits['value'] == $limit) { ?>
                      <option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
                      <?php } ?>
                      <?php } ?>
                        </select><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="category__head-sort mobile">
                    <span><select class="head-sort" name="head-sort" id="head-sort" onchange="location = this.value;">
                    <?php foreach ($sorts as $sorts) { ?>
                        <?php if ($sorts['value'] == $sort . '-' . $order) { ?>
                            <option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
                        <?php } ?>
                    <?php } ?>
                        </select><i class="fas fa-chevron-down"></i></span>
                </div>
            </div>
            <div class="category__wrap">
                <?php foreach ($products as $product) { ?>
                <div class="category__item">
                    <a href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>">
                    <img class="category__item-img" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                    </a>
                    <?php if ($product['sku']) { ?>
                    <span class="category__item-article"><?php  echo $text_model.' '. $product['sku']; ?></span>
                    <?php } ?>
                    <span class="category__item-desc">
                    <?php echo $product['name']; ?>
                    </span>
                    <span class="category__item-price"><b><?php echo $product['price']; ?></b></span>
                    <div class="category__item-links">
                        <a href="<?php echo $product['href'].'#online'; ?>" class="category__item-link"><?php echo $infolinks['wheretobuy']['name']; ?></a>
                        <a href="<?php echo $product['href']; ?>" class="category__item-link"><?php echo $text_open_product; ?></a>
                    </div>
                    <?php if($product['stock_status']) { ?>
                    <span class="category__item-tab"><?php echo $product['stock_status']; ?></span>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="category__footer">
                <?php echo $pagination; ?>
            </div>
            <?php } else { ?>
            <p><?php echo $text_empty; ?></p>
            <?php } ?>
        </div>
    </section>
    <section class="page__body description">
        <div class="good__option-desc">
            <?php echo $description; ?>
        </div>
    </section>
</main>
<?php echo $footer; ?>
