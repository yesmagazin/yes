<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>"
                        class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>"
                   class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product"
                      class="form-horizontal">
                    <div class="tab-content">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label"
                                   for="input-name"><?php echo $entry_name; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>"
                                       id="input-name" class="form-control"/>
                                <?php if ($error_name) { ?>
                                <div class="text-danger"><?php echo $error_name; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="input-phone"><?php echo $entry_phone; ?></label>
                            <div class="col-sm-10">
                                <input type="tel" name="phone" value="<?php echo $phone; ?>"
                                       placeholder="<?php echo $entry_phone; ?>" id="input-phone"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label"
                                   for="input-contact"><?php echo $entry_contact; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="contact" value="<?php echo $contact; ?>"
                                       placeholder="<?php echo $entry_contact; ?>" id="input-contact"
                                       class="form-control"/>
                                <?php if ($error_contact) { ?>
                                <div class="text-danger"><?php echo $error_contact; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label"
                                   for="input-contact"><?php echo $entry_conditions; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="conditions" value="<?php echo $conditions; ?>"
                                       placeholder="<?php echo $entry_conditions; ?>" id="input-contact"
                                       class="form-control"/>
                                <?php if ($error_conditions) { ?>
                                <div class="text-danger"><?php echo $error_conditions; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="thumb-image"><?php echo $entry_image; ?></label>
                            <div class="col-sm-10">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <tr>
                                            <td class="text-left"><a href="" id="thumb-image" data-toggle="image"
                                                                     class="img-thumbnail"><img
                                                            src="<?php echo $thumb; ?>" alt="" title=""
                                                            data-placeholder="<?php echo $placeholder; ?>"/></a><input
                                                        type="hidden" name="image" value="<?php echo $image; ?>"
                                                        id="input-image"/></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label"
                                   for="input-file"><?php echo $entry_file; ?></label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="filename" value="<?php echo $filename; ?>"
                                           placeholder="<?php echo $entry_file; ?>" id="input-filename"
                                           class="form-control"/>
                                    <span class="input-group-btn">
                                        <button type="button" id="file-upload" data-loading-text="<?php echo $text_loading; ?>"
                                            class="btn btn-primary"><i class="fa fa-upload"></i> <?php echo $button_upload; ?></button>
                                    </span></div>
                                <?php if ($error_filename) { ?>
                                <div class="text-danger"><?php echo $error_filename; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="input-sort"><?php echo $entry_sort; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="sort" value="<?php echo $sort; ?>"
                                       placeholder="<?php echo $entry_sort; ?>" id="input-sort"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="input-href"><?php echo $entry_url; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="href" value="<?php echo $href; ?>"
                                       placeholder="<?php echo $entry_url; ?>" id="input-href"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="input-status"><?php echo $entry_price; ?></label>
                            <div class="col-sm-10">
                                <select name="status_price" id="input-status_price" class="form-control">
                                    <?php if ($status_price) { ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="input-status"><?php echo $entry_status; ?></label>
                            <div class="col-sm-10">
                                <select name="status" id="input-status" class="form-control">
                                    <?php if ($status) { ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"><!--
    $('#file-upload').on('click', function () {
        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

        $('#form-upload input[name=\'file\']').trigger('click');

        if (typeof timer != 'undefined') {
            clearInterval(timer);
        }

        timer = setInterval(function () {
            if ($('#form-upload input[name=\'file\']').val() != '') {
                clearInterval(timer);

                $.ajax({
                    url: 'index.php?route=extension/module/shop/upload&token=<?php echo $token; ?>',
                    type: 'post',
                    dataType: 'json',
                    data: new FormData($('#form-upload')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#file-upload').button('loading');
                    },
                    complete: function () {
                        $('#file-upload').button('reset');
                    },
                    success: function (json) {
                        if (json['error']) {
                            alert(json['error']);
                        }

                        if (json['success']) {
                            alert(json['success']);

                            $('input[name=\'filename\']').val(json['filename']);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        }, 500);
    });
    //--></script>
<?php echo $footer; ?>
