<div class="good__desc-filial">
    <div class="good__desc-filial-head">
        <form action="#">
            <div>
                <label for="good-obl"><?php echo $text_choose; ?></label>
                <select id="good-obl">
                    <option data-content="good__desc-filial-row"<?php if(!$user_city){ echo ' selected="selected"';} ?>> <?php echo $not_chosen; ?> </option>
                    <?php if(!empty($categories)){ foreach($categories as $k => $category){ ?>
                    <option data-content="town<?php echo $category['category_id']; ?>"<?php if($user_city>0 && $user_city==$category['category_id']){ echo ' selected="selected"';} ?>><?php echo $category['category_name']; ?></option>
                    <?php } } ?>
                </select>
            </div>
        </form>
    </div>
    <div class="good__desc-filial-body">
        <?php if(!empty($events)){ foreach($events as $i => $event){ ?>
        <div class="good__desc-filial-row town<?php echo $event['category_id']; ?>" data-title="<?php echo $event['title']; ?>"
             data-address="<?php echo $event['address']; ?>"
             data-information="<?php echo $event['information']; ?>"
             data-latitude="<?php echo $event['latitude']; ?>"
             data-longitude="<?php echo $event['longitude']; ?>">
            <span><b><?php echo $event['title']; ?></b><br><?php echo $event['information']; ?></span>
            <span class="tel"><?php echo $event['end_time']; ?></span>
        </div>
        <?php } } ?>
    </div>
</div>
<div class="good__desc-map" id="map"></div>