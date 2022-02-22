<?php if ($option['color']) { ?>
<div class="ocf-color" style="background-color: #<?php echo $value['color']; ?>;"></div>
<?php } ?>

<?php if ($option['image']) { ?>
<div class="ocf-image" style="background-image: url(<?php echo $value['image']; ?>);"></div>
<?php } ?>

<?php if ($value['selected']) { ?>
<label id="v-<?php echo $value['id']; ?>" class="filters__checkbox checkbox ocf-selected" data-option-id="<?php echo $option['option_id']; ?>">
    <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" checked="checked" class="checkbox__input ocf-target" />
    <span class="checkbox__in">
      <span class="checkbox__tick"></span>
      <span class="checkbox__text">
          <?php echo $value['name']; ?>
      </span>
    </span>
</label>
<?php } else if ($value['count']) { ?>
<label id="v-<?php echo $value['id']; ?>" data-option-id="<?php echo $option['option_id']; ?>" class="filters__checkbox checkbox">
    <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" class="checkbox__input ocf-target" />
    <span class="checkbox__in">
      <span class="checkbox__tick"></span>
      <span class="checkbox__text">
          <?php echo $value['name']; ?>&nbsp;<span class="checkbox__counter">(<?php echo $value['count']; ?>)</span>
      </span>
    </span>
</label>
<?php } else { ?>
<label id="v-<?php echo $value['id']; ?>" data-option-id="<?php echo $option['option_id']; ?>" class="filters__checkbox checkbox disabled">
    <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" class="checkbox__input ocf-target" disabled="disabled" />
    <span class="checkbox__in">
      <span class="checkbox__tick"></span>
      <span class="checkbox__text">
          <?php echo $value['name'].($show_counter ? '&nbsp;<span class="checkbox__counter">(0)</span>>' : ''); ?>
      </span>
    </span>
</label>
<?php } ?>
