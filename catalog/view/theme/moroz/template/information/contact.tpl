<?php echo $header; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="head">
    <div class="head__preview" style="background-image: url(catalog/view/theme/moroz/stylesheet/img/bg-head-1.jpg);"></div>
    <div class="head__center center">
        <div class="head__wrap">
            <div class="head__stage stage">contacts</div>
            <ul class="head__breadcrumbs breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumbs__item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                    <a class="breadcrumbs__link" href="/" itemprop="item">
                        <meta itemprop="position" content="1">
                        <span itemprop="name"><?php echo $text_home; ?></span>
                    </a>
                </li>
                <li class="breadcrumbs__item"><?php echo $heading_title; ?></li>
            </ul>
            <h1 class="head__title title"><?php echo $heading_title; ?></h1>
        </div>
    </div>
</div>
<div class="contacts">
    <div class="contacts__body">
        <div class="contacts__preview contacts__preview_left"><img class="contacts__pic" src="catalog/view/theme/moroz/stylesheet/img/contacts-pic-1.png" alt=""></div>
        <div class="contacts__preview contacts__preview_right"><img class="contacts__pic" src="catalog/view/theme/moroz/stylesheet/img/contacts-pic-2.png" alt=""></div>
        <div class="contacts__center center">
            <div class="contacts__list">
                <div class="contacts__item">
                    <div class="contacts__stage">phone</div>
                    <div class="contacts__icon"><img class="contacts__pic" src="catalog/view/theme/moroz/stylesheet/img/phone.svg" alt="<?php echo $text_telephone; ?>"></div>
                    <div class="contacts__category"><?php echo $text_telephone; ?></div>
                    <div class="contacts__phones">
                        <a class="contacts__link" href="tel:+380661652334">+38 (066) 165-23-34</a>
                        <a class="contacts__link" href="tel:+380567900708">+38 (056) 790-07-08</a></div>
                </div>
                <div class="contacts__item">
                    <div class="contacts__stage">address</div>
                    <div class="contacts__icon"><img class="contacts__pic" src="catalog/view/theme/moroz/stylesheet/img/marker.svg" alt="<?php echo $text_address; ?>"></div>
                    <div class="contacts__category"><?php echo $text_address; ?></div>
                    <div class="contacts__address"><?php echo $text_address_addr; ?></div>
                </div>
                <div class="contacts__item">
                    <div class="contacts__stage">email</div>
                    <div class="contacts__icon"><img class="contacts__pic" src="catalog/view/theme/moroz/stylesheet/img/email.svg" alt="EMAIL"></div>
                    <div class="contacts__category">EMAIL</div>
                    <div class="contacts__phones"><a class="contacts__link" href="mailto:info@yes-tm.com">info@yes-tm.com</a></div>
                </div>
            </div>
            <?php if($sent) { ?>
            <h3 class="contacts__title title"><?php echo $text_success; ?></h3>
            <div class="success_mess"><?php echo $text_call_mess; ?></div>
            <?php } else { ?>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="contacts-form" class="contacts__form">
                <div id="recaptcha" class="g-recaptcha"
                     data-sitekey="6LdR0awUAAAAAANaiO6Pe3uL9lDR4Z1muGw7a6pd"
                     data-badge="inline"
                     data-callback="onSubmit"
                     data-size="invisible"></div>
                <h2 class="contacts__title title"><?php echo $text_with_pleasure; ?></h2>
                <?php if($captcha_error) { ?>
                <div class="contacts__big captcha_error">
                    <?php echo $text_captcha_error; ?>
                </div>
                <?php } ?>
                <div class="contacts__fieldset">
                    <div class="contacts__row">
                        <div class="contacts__col">
                            <div class="contacts__field field">
                                <div class="field__label"><?php echo $entry_name; ?></div>
                                <div class="field__wrap">
                                    <input class="field__input" id="name" name="name" type="text" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name_ph; ?>">
                                    <?php if ($error_name) { ?>
                                    <div class="text-danger"><?php echo $error_name; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="contacts__col">
                            <div class="contacts__field field">
                                <div class="field__label"><?php echo $entry_email; ?></div>
                                <div class="field__wrap">
                                    <input class="field__input" id="contact" name="email" type="text" value="<?php echo $email; ?>" placeholder="<?php echo $entry_email_ph; ?>">
                                    <?php if ($error_email) { ?>
                                    <div class="text-danger"><?php echo $error_email; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contacts__field field">
                        <div class="field__label"><?php echo $entry_enquiry; ?></div>
                        <div class="field__wrap">
                            <textarea class="field__textarea" id="comment" name="enquiry" rows="10" placeholder="<?php echo $entry_enquiry_ph; ?>"><?php echo $enquiry; ?></textarea>
                            <?php if ($error_enquiry) { ?>
                            <div class="text-danger"><?php echo $error_enquiry; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div><button class="contacts__btn btn btn_orange" id="send-contact"><span class="btn__text"><?php echo $button_submit; ?></span></button>
            </form>
            <?php } ?>
        </div>
    </div>
    <div class="contacts__map"><iframe src="https://www.google.com/maps/embed?key=AIzaSyBbr0ysJ3IvHiPJ3fPX5ZfnKyEJSPDtxpw&pb=!1m18!1m12!1m3!1d5287.189994194103!2d35.0733769315513!3d48.502657671002474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d958653bc721b5%3A0x260e407bd6b1413e!2z0YPQuy4g0JrQsNGI0YLQsNC90L7QstCw0Y8sIDExLCDQlNC90LjQv9GA0L4sINCU0L3QtdC_0YDQvtC_0LXRgtGA0L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA0OTAwMA!5e0!3m2!1sru!2sua!4v1563203147319!5m2!1sru!2sua&language=<?php echo $lng; ?>" width="100%" height="520" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
</div>
<div class="buy">
    <div class="buy__center center">
        <h2 class="buy__title title title_sm"><?php echo $text_where_to_buy_button; ?></h2>
        <div class="buy__info"><?php echo $text_can_buy; ?></div>
        <div class="buy__btns">
            <a class="buy__btn btn btn_white" href="de-kupiti">
                <span class="btn__text"><?php echo $text_show_shops; ?></span>
            </a>
            <div class="buy__circle circle"></div>
            <div class="buy__circle circle"></div>
            <div class="buy__circle circle"></div>
        </div>
    </div>
</div>


<?php echo $footer; ?>
