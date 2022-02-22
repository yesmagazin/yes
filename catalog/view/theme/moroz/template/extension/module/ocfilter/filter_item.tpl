<div class="filters__item <?php echo $option['option_id']==10037 ? 'filters__item_gender ' : 'js-accordeon-item'; ?> ocfilter-option <?php echo $hidden_opt?'':'active'; ?>" id="option-<?php echo $option['option_id']; ?>">
    <?php if($option['option_id']==10037) { ?>
    <div class="filters__gender">
        <?php include 'value_list_sex.tpl'; ?>
    </div>
    <?php } else { ?>
        <div class="filters__head js-accordeon-head">
            <?php echo $option['name']; ?>
            <?php if ($option['type'] == 'slide' || $option['type'] == 'slide_dual') { ?>
            <span id="left-value-<?php echo $option['option_id']; ?>"><?php echo $option['slide_value_min_get']; ?></span>
            <?php if ($option['type'] == 'slide_dual') { ?>
            -&nbsp;<span id="right-value-<?php echo $option['option_id']; ?>"><?php echo $option['slide_value_max_get']; ?></span>
            <?php } ?>
            <?php echo $option['postfix']; ?>
            <?php } ?>
        </div>
        <div class="filters__body js-accordeon-body" <?php echo $hidden_opt?'':'style="display: block;"'; ?>>
            <div class="filters__variants">
            <?php if ($option['type'] == 'slide' || $option['type'] == 'slide_dual') { ?>
                <?php include 'filter_slider_item.tpl'; ?>
            <?php } else { ?>
                <?php if ($option['selectbox']) { ?>
                    <div class="dropdown">
                        <button class="btn btn-block btn-<?php echo (isset($selecteds[$option['option_id']]) ? 'warning' : 'default'); ?> dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="pull-right fa fa-angle-down"></i>
                            <span class="pull-left text-left">
                            <?php if (isset($selecteds[$option['option_id']])) { ?>
                                <?php foreach ($selecteds[$option['option_id']]['values'] as $value) { ?>
                                <?php echo $value['name']; ?><br />
                                <?php } ?>
                                <?php } else { ?>
                                <?php echo $text_any; ?>
                                <?php } ?>
                            </span>
                        </button>
                        <div class="dropdown-menu">
                            <?php include 'value_list.tpl'; ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <?php include 'value_list.tpl'; ?>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>