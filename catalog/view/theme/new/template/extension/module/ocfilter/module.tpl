<?php if ($options || $show_price) { ?>
<div class="panel ocfilter panel-default" id="ocfilter">
  <?php include 'selected_filter.tpl'; ?>
  <?php include 'filter_price.tpl'; ?>
  <?php echo $categories; ?>
  <?php include 'filter_list.tpl'; ?>
</div>
<?php } ?>