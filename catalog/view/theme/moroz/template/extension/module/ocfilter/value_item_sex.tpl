<?php if ($value['selected']) { ?>
    <label id="v-<?php echo $value['id']; ?>" class="filters__checkbox checkbox ocf-selected<?php if($value['id'] == 100373789264643) echo ' unisex'; ?>" data-option-id="<?php echo $option['option_id']; ?>">
        <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" checked="checked" class="checkbox__input ocf-target" />
        <span class="checkbox__in">
            <span class="checkbox__box">
                <?php include 'value_img_sex.tpl'; ?>
                <span class="checkbox__info"><?php echo $value['name']; ?></span>
            </span>
        </span>
    </label>
<?php } else if ($value['count']) { ?>
    <label id="v-<?php echo $value['id']; ?>" class="filters__checkbox<?php if($value['id'] == 100373789264643) echo ' unisex'; ?>" data-option-id="<?php echo $option['option_id']; ?>">
        <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" class="checkbox__input ocf-target" />
        <span class="checkbox__in">
            <span class="checkbox__box">
                <?php include 'value_img_sex.tpl'; ?>
                <span class="checkbox__info"><?php echo $value['name']; ?></span>
            </span>
        </span>
    </label>
<?php } else { ?>
    <label id="v-<?php echo $value['id']; ?>" class="filters__checkbox disabled<?php if($value['id'] == 100373789264643) echo ' unisex'; ?>" data-option-id="<?php echo $option['option_id']; ?>">
        <input type="<?php echo $option['type']; ?>" name="ocf[<?php echo $option['option_id']; ?>]" value="<?php echo $value['params']; ?>" disabled="disabled" class="checkbox__input ocf-target" />
        <span class="checkbox__in">
            <span class="checkbox__box">
                <?php include 'value_img_sex.tpl'; ?>
                <span class="checkbox__info"><?php echo $value['name']; ?></span>
            </span>
        </span>
    </label>
<?php } ?>