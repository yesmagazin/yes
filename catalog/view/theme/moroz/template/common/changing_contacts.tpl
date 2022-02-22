<?php if($city_contacts){  ?>
<div class="modal fade" id="modal2" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="select_cityy">
        <select id="city_select" class="form-control" data-live-search="true">
            <option data-cid="0"><?php echo $text_choose; ?></option>
            <?php  foreach($city_contacts as $city_contact){ ?>
            <option data-cid='<?php echo $city_contact["cid"]; ?>'<?php if($user_city>0 && $user_city==$city_contact['category_id']){ echo ' selected="selected"';} ?> ><?php echo trim($city_contact['city_name']); ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<?php } ?>
<script type="text/javascript">
        var choose_title = '<?php echo $text_choose_city; ?>';
        var choose_close = '<?php echo $text_choose_close; ?>';
        var choose_select = '<?php echo $text_choose_select; ?>';
</script>