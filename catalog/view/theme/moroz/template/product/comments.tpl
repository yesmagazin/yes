<div class="comments">
    <div class="comments__row">
        <?php echo $load_reviews; ?>
        <form class="comments__form" data-action="index.php?route=product/product/write&product_id=<?php echo $product_id; ?>" id="form-review">
            <div id="recaptcha" class="g-recaptcha"
             data-sitekey="6LdR0awUAAAAAANaiO6Pe3uL9lDR4Z1muGw7a6pd"
             data-badge="inline"
             data-callback="onSubmitRev"
             data-size="invisible"></div>
            <div class="comments__info"><?php echo $text_write; ?></div>
            <div class="comments__ball">
                <div class="comments__text"><?php echo $entry_rating; ?></div>
                <div class="comment__rating rating">
                    <fieldset>
                        <div class="rating__group">
                            <input class="rating__input" type="radio" name="rating" value="1" id="rating-1">
                            <label class="rating__star" aria-label="1 бал" for="rating-1"></label>
                            <input class="rating__input" type="radio" name="rating" value="2" id="rating-2">
                            <label class="rating__star" aria-label="2 бала" for="rating-2"></label>
                            <input class="rating__input" type="radio" name="rating" value="3" id="rating-3">
                            <label class="rating__star" aria-label="3 бала" for="rating-3"></label>
                            <input class="rating__input" type="radio" name="rating" value="4" id="rating-4" checked>
                            <label class="rating__star" aria-label="5 бала" for="rating-4"></label>
                            <input class="rating__input" type="radio" name="rating" value="5" id="rating-5">
                            <label class="rating__star" aria-label="5 балов" for="rating-5"></label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="comments__fieldset">
                <div class="comments__field field">
                    <div class="field__label"><?php echo $entry_name; ?></div>
                    <div class="field__wrap">
                        <input class="field__input" type="text" name="name" id="name" placeholder="<?php echo $placeholder_name; ?>">
                    </div>
                </div>
                <div class="comments__field field">
                    <div class="field__label"><?php echo $entry_review; ?></div>
                    <div class="field__wrap">
                        <textarea class="field__textarea" id="text" name="text" cols="30" rows="10" placeholder="<?php echo $placeholder_review; ?>"></textarea>
                    </div>
                </div>
            </div>
            <button class="comments__btn btn btn_orange" id="button-review">
                <span class="btn__text"><?php echo $button_write; ?></span>
            </button>
        </form>
    </div>
</div>