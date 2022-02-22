<?php if ($options || $show_price) { ?>
<div class="filters__inner" id="ocfilter">
  <?php echo $categories; ?>
  <?php include 'selected_filter.tpl'; ?>
  <?php include 'filter_list.tpl'; ?>
  <?php include 'filter_price.tpl'; ?>
</div>
<?php } ?>