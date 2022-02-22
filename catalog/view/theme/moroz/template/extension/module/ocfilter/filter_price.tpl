<?php if ($show_price) { ?>
<div class="filters__item js-accordeon-item active">
    <div class="filters__head js-accordeon-head"><?php echo $text_price; ?></div>
    <div class="filters__body js-accordeon-body" style="display: block;">
        <div class="filters__slider">
            <div id="slider_price" class="scale ocf-target filters__slider" data-option-id="p"
                 data-start-min="<?php echo $min_price_get; ?>"
                 data-start-max="<?php echo $max_price_get; ?>"
                 data-range-min="<?php echo $min_price; ?>"
                 data-range-max="<?php echo $max_price; ?>"
                 data-element-min="#price-from"
                 data-element-max="#price-to"
                 data-control-min="#min-price-value"
                 data-control-max="#max-price-value"
            ></div>
        </div>
        <div class="filters__row">
            <div class="filters__col">
                <div class="filters__text">
                    <?php echo $ot; ?>
                </div>
                <div class="filters__field">
                    <input class="filters__input" type="text" name="price[min]" value="<?php echo $min_price_get; ?>" id="min-price-value" maxlength="4">
                </div>
            </div>
            <div class="filters__col">
                <div class="filters__text"><?php echo $do; ?></div>
                <div class="filters__field">
                    <input class="filters__input" type="text" name="price[max]" value="<?php echo $max_price_get; ?>" id="max-price-value" maxlength="4">
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
