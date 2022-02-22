<?php echo $header; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<main class="page collections contacts">
    <section class="collections__head contacts__head">
        <div class="collections__head-wrap">
            <div class="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                    <a href="/" class="crumbs__link" itemprop="item">
                        <meta itemprop="position" content="1">
                        <span itemprop="name">
                            <?php echo $text_home; ?>
                        </span>
                    </a>
                </span>
                /
                <span class="crumbs__active"> <?php echo $heading_title; ?></span>
            </div>
            <h2 class="page__title"><?php echo $heading_title; ?></h2>
            <span class="page__backtitle">contacts</span>
        </div>
    </section>
    <section class="contacts__body">
        <div class="contacts__wrap">
            <div class="contacts__box">
                <img src="catalog/view/theme/new/stylesheet/img/selected/ic.svg" alt="" class="contacts__icon">
                <span class="contacts__backtitle">phone</span>
                <span class="contacts__subtitle"><?php echo $text_telephone; ?></span>
                <span class="contacts__desc">+38 (066) 165-23-34</span>
                <span class="contacts__desc">+38 (056) 790-07-08</span>
            </div>
            <div class="contacts__box">
                <img src="catalog/view/theme/new/stylesheet/img/selected/ic1.svg" alt="" class="contacts__icon">
                <span class="contacts__backtitle">address</span>
                <span class="contacts__subtitle"><?php echo $text_address; ?></span>
                <span class="contacts__desc"><?php echo $text_address_addr; ?></span>
            </div>
            <div class="contacts__box">
                <img src="catalog/view/theme/new/stylesheet/img/selected/ic2.svg" alt="" class="contacts__icon">
                <span class="contacts__backtitle">email</span>
                <span class="contacts__subtitle">EMAIL</span>
                <span class="contacts__desc">info@yes-tm.com</span>
            </div>
        </div>
        <div class="contacts__form">
            <?php if($sent) { ?>
            <h3 class="contacts__title"><?php echo $text_success; ?></h3>
            <div class="success_mess"><?php echo $text_call_mess; ?></div>
            <?php } else { ?>
            <h3 class="contacts__title"><?php echo $text_with_pleasure; ?></h3>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="contacts-form" class="contacts-form">
                <div id="recaptcha" class="g-recaptcha"
                     data-sitekey="6LdR0awUAAAAAANaiO6Pe3uL9lDR4Z1muGw7a6pd"
                     data-badge="inline"
                     data-callback="onSubmit"
                     data-size="invisible"></div>
                <?php if($captcha_error) { ?>
                <div class="contacts__big captcha_error">
                    <?php echo $text_captcha_error; ?>
                </div>
                <?php } ?>
                <div class="contacts__small">
                    <label for="name"><?php echo $entry_name; ?></label>
                    <input id="name" name="name" type="text" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name_ph; ?>">
                    <?php if ($error_name) { ?>
                    <div class="text-danger"><?php echo $error_name; ?></div>
                    <?php } ?>
                </div>
                <div class="contacts__small">
                    <label for="contact"><?php echo $entry_email; ?></label>
                    <input id="contact" name="email" type="text" value="<?php echo $email; ?>" placeholder="<?php echo $entry_email_ph; ?>">
                    <?php if ($error_email) { ?>
                    <div class="text-danger"><?php echo $error_email; ?></div>
                    <?php } ?>
                </div>
                <div class="contacts__big">
                    <label for="comment"><?php echo $entry_enquiry; ?></label>
                    <textarea id="comment" name="enquiry" rows="10" placeholder="<?php echo $entry_enquiry_ph; ?>"><?php echo $enquiry; ?></textarea>
                    <?php if ($error_enquiry) { ?>
                    <div class="text-danger"><?php echo $error_enquiry; ?></div>
                    <?php } ?>
                </div>
                <button type="submit" id="send-contact"><?php echo $button_submit; ?></button>
            </form>
            <?php } ?>

            <img class="contacts__img-left" src="catalog/view/theme/new/stylesheet/img/selected/Group%202.svg" alt="">
            <img class="contacts__img-right" src="catalog/view/theme/new/stylesheet/img/selected/Group.svg" alt="">
        </div>
        <div class="contacts__map"><iframe src="https://www.google.com/maps/embed?key=AIzaSyBbr0ysJ3IvHiPJ3fPX5ZfnKyEJSPDtxpw&pb=!1m18!1m12!1m3!1d5287.189994194103!2d35.0733769315513!3d48.502657671002474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d958653bc721b5%3A0x260e407bd6b1413e!2z0YPQuy4g0JrQsNGI0YLQsNC90L7QstCw0Y8sIDExLCDQlNC90LjQv9GA0L4sINCU0L3QtdC_0YDQvtC_0LXRgtGA0L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA0OTAwMA!5e0!3m2!1sru!2sua!4v1563203147319!5m2!1sru!2sua&language=<?php echo $lng; ?>" width="100%" height="520" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    </section>
</main>

<?php echo $footer; ?>
