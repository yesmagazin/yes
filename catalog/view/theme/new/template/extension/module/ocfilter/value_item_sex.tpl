<div class="category__sort-sex__box<?php echo $value['selected'] ? ' active' : '';  ?>">
<?php if ($value['selected']) { ?>
    <label id="v-<?php echo $value['id']; ?>" class="ocf-selected<?php if($value['id'] == 100373789264643) echo ' unisex'; ?>" data-option-id="<?php echo $option['option_id']; ?>">
        <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" checked class="ocf-target" />
        <?php include 'value_img_sex.tpl'; ?>
        <?php echo $value['name']; ?>
    </label>
<?php } else if ($value['count']) { ?>
    <label id="v-<?php echo $value['id']; ?>" class="<?php if($value['id'] == 100373789264643) echo 'unisex'; ?>" data-option-id="<?php echo $option['option_id']; ?>">
        <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" class="ocf-target" />
        <?php include 'value_img_sex.tpl'; ?>
        <?php echo $value['name']; ?>
    </label>
<?php } else { ?>
    <label id="v-<?php echo $value['id']; ?>" class="disabled<?php if($value['id'] == 100373789264643) echo ' unisex'; ?>" data-option-id="<?php echo $option['option_id']; ?>">
        <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="" disabled="disabled" class="ocf-target"  />
        <?php include 'value_img_sex.tpl'; ?>
        <?php echo $value['name']; ?>
    </label>
<?php } ?>
</div>