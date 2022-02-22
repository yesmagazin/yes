<?php if ($show_price) { ?>
    <div id="oprice" class="category__sort-price">
    <div class="category__sidebar-title active"><?php echo $text_price; ?></div>
    <div class="category__sort-price__pop-up active">
        <div id="slider_price" class="scale ocf-target" data-option-id="p"
             data-start-min="<?php echo $min_price_get; ?>"
             data-start-max="<?php echo $max_price_get; ?>"
             data-range-min="<?php echo $min_price; ?>"
             data-range-max="<?php echo $max_price; ?>"
             data-element-min="#price-from"
             data-element-max="#price-to"
             data-control-min="#min-price-value"
             data-control-max="#max-price-value"
        ></div>
        <input type="hidden" id="price-from" value="">
        <input type="hidden" id="price-to" value="">
        <form method='post' class='ocf-option-values'>
            <label for='min-price-value' class='filter_price_input'>
                <?php echo $ot; ?>
                <input type="text" name="price[min]" value="<?php echo $min_price_get; ?>" id="min-price-value" maxlength="4">
            </label>
            <label for='max-price-value' class='filter_price_input'>
                <?php echo $do; ?>
                <input type="text" name="price[max]" value="<?php echo $max_price_get; ?>" id="max-price-value" maxlength="4">
            </label>
        </form>
    </div>
</div>
<?php } ?>
