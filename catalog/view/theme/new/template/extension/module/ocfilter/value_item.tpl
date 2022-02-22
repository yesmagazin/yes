<?php if ($option['color']) { ?>
<div class="ocf-color" style="background-color: #<?php echo $value['color']; ?>;"></div>
<?php } ?>

<?php if ($option['image']) { ?>
<div class="ocf-image" style="background-image: url(<?php echo $value['image']; ?>);"></div>
<?php } ?>

<?php if ($value['selected']) { ?>
<span>
<label id="v-<?php echo $value['id']; ?>" class="ocf-selected" data-option-id="<?php echo $option['option_id']; ?>">
  <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" checked class="ocf-target" />
  <?php echo $value['name']; ?>
</label>
</span>
<?php } else if ($value['count']) { ?>
<span>
<label id="v-<?php echo $value['id']; ?>" data-option-id="<?php echo $option['option_id']; ?>">
  <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" class="ocf-target" />
  <?php echo $value['name'].($show_counter ? '&nbsp;<span>('.$value['count'].')</span>' : ''); ?>
</label>
</span>
<?php } else { ?>
<span>
<label id="v-<?php echo $value['id']; ?>" class="disabled" data-option-id="<?php echo $option['option_id']; ?>">
  <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="" disabled="disabled" class="ocf-target"  />
  <?php echo $value['name'].($show_counter ? '&nbsp;<span>(0)</span>' : ''); ?>
</label>
</span>
<?php } ?>
