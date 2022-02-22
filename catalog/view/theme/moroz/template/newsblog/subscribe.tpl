<div id="subscribe-form">
    <h3 style="text-align: center;"><?=$text_form_title?></h3>
    <div class="form_container">
        <form action="" method="post" class="subscribe-form">
            <div class="fields-row">
                <div class="form-field" style="display: none;">
                    <input type="text" name="subscribe[uname]" placeholder="<?=$text_form_name?>*">
                </div>
                <div class="form-field">
                    <input type="text" name="subscribe[name]" placeholder="<?=$text_form_name?>*">
                </div>
                <div class="form-field">
                    <input type="email" name="subscribe[mail]" placeholder="<?=$text_form_mail?>*">
                </div>
                <div class="form-field">
                    <input type="tel" name="subscribe[phone]" placeholder="<?=$text_form_phone?>">
                </div>
            </div>
            <div class="submit-place">
                <input type="submit" value="<?=$text_form_submit?>" class="form-submit">
            </div>
            <div class="description"><?=$text_form_descr?></div>
        </form>
    </div>
</div>