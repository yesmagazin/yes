<div class="location">
    <div class="location__row">
        <div class="location__col">
            <div class="location__head">
                <div class="location__sort">
                    <div class="location__field">
                        <div class="location__category"><?php echo $text_choose; ?></div>
                        <select class="location__select" id="good-obl" onchange="Cookies.set('popup_city', $('option:selected', this).attr('data-content').replace('town', '') , { expires: 30, path: '/' });">
                            <option data-content="location__shop"<?php if(!$user_city){ echo ' selected="selected"';} ?>> <?php echo $not_chosen; ?> </option>
                            <?php if(!empty($categories)){ foreach($categories as $k => $category){ ?>
                            <option data-content="town<?php echo $category['category_id']; ?>"<?php if($user_city>0 && $user_city==$category['category_id']){ echo ' selected="selected"';} ?>><?php echo $category['category_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="location__list">
                <?php if(!empty($events)){ foreach($events as $i => $event){ ?>
                <div class="location__shop town<?php echo $event['category_id']; ?>" data-title="<?php echo $event['title']; ?>"
                     data-address="<?php echo $event['address']; ?>"
                     data-information="<?php echo $event['information']; ?>"
                     data-latitude="<?php echo $event['latitude']; ?>"
                     data-longitude="<?php echo $event['longitude']; ?>">
                    <div class="location__box">
                        <div class="location__place"><?php echo $event['title']; ?></div>
                        <div class="location__address"><?php echo $event['information']; ?></div>
                    </div>
                    <a class="location__phone" href="tel:<?php echo $event['end_time']; ?>"><?php echo $event['end_time']; ?></a>
                </div>
                <?php }} ?>
            </div>
        </div>
        <div class="location__col"><div class="good__desc-map" id="map"></div></div>
    </div>
</div>