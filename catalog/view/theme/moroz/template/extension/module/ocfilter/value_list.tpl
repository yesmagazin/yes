<?php if ($show_values_limit > 0 && count($option['values']) > $show_values_limit) { ?>
    <?php $hidden_values = array_splice($option['values'], $show_values_limit, count($option['values'])); ?>
<?php } else { ?>
    <?php $hidden_values = array(); ?>
<?php } ?>

<?php foreach ($option['values'] as $value) { ?>
    <?php include 'value_item.tpl'; ?>
<?php } ?>

<?php if ($hidden_values) { ?>
    <div class="filters__variants hidden__variants collapsed" id="ocfilter-hidden-values-<?php echo $option['option_id']; ?>">
        <?php foreach ($hidden_values as $value) { ?>
        <?php include 'value_item.tpl'; ?>
        <?php } ?>
    </div>
    <button class="filters__all" data-target="#ocfilter-hidden-values-<?php echo $option['option_id']; ?>" data-toggle="collapse" data-text="<?php echo $text_hide; ?>" ><?php echo $text_show_all; ?></button>
<?php } ?>
