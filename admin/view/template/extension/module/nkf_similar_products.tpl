<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
            <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php } ?>
        <?php if (isset($error) && $error) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <?php if (isset($success) && $success) { ?>
            <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php } ?>

      <div class="pull-right">
        <?php if ($run!='') { ?>
        <a href="<?php echo $run; ?>" data-toggle="tooltip" title="<?php echo $button_run; ?>" class="btn btn-primary"><i class="fa fa-refresh" style="padding-right:5px;"></i><?php echo $button_run; ?></a>
        <?php } ?>
        <button type="submit" form="form-nkf_similar_products" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-nkf_similar_products" class="form-horizontal">
          <input type="hidden" name="module_id" value="<?php echo $module_id; ?>" />
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
              <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-title"><?php echo $entry_title; ?></label>
            <div class="col-sm-10">
              <input type="text" name="title" value="<?php echo $title; ?>" placeholder="<?php echo $entry_title; ?>" id="input-title" class="form-control" />
              <?php if ($error_title) { ?>
              <div class="text-danger"><?php echo $error_title; ?></div>
              <?php } ?>
            </div>
          </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-use_cache"><?php echo $entry_use_cache; ?></label>
                <div class="col-sm-10">
                    <select name="use_cache" id="input-use_cache" class="form-control">
                        <?php if ($use_cache) { ?>
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
            <label class="col-sm-2 control-label" for="input-limit"><?php echo $entry_limit; ?></label>
            <div class="col-sm-10">
              <input type="text" name="limit" value="<?php echo $limit; ?>" placeholder="<?php echo $entry_limit; ?>" id="input-limit" class="form-control" />
            </div>
          </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-use_price"><?php echo $entry_use_price; ?></label>
                <div class="col-sm-10">
                    <select name="use_price" id="input-use_price" class="form-control">
                        <?php if ($use_price) { ?>
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
                <label class="col-sm-2 control-label" for="input-use_quantity"><?php echo $entry_use_quantity; ?></label>
                <div class="col-sm-10">
                    <select name="use_quantity" id="input-use_quantity" class="form-control">
                        <?php if ($use_quantity) { ?>
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
                <label class="col-sm-2 control-label" for="input-use_category"><span data-toggle="tooltip" title="<?php echo $help_use_category; ?>"><?php echo $entry_use_category; ?></span></label>
                <div class="col-sm-10">
                    <select name="use_category" id="input-use_category" class="form-control">
                        <?php if ($use_category) { ?>
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
                <label class="col-sm-2 control-label" for="input-use_manufacturer"><?php echo $entry_use_manufacturer; ?></label>
                <div class="col-sm-10">
                    <select name="use_manufacturer" id="input-use_manufacturer" class="form-control">
                        <?php if ($use_manufacturer) { ?>
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
                <label class="col-sm-2 control-label" for="input-add_diff_attributes"><?php echo $entry_add_diff_attributes; ?></label>
                <div class="col-sm-10">
                    <select name="add_diff_attributes" id="input-add_diff_attributes" class="form-control">
                        <?php if ($add_diff_attributes) { ?>
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
                <label class="col-sm-2 control-label" for="input-use_featured_template"><?php echo $entry_use_featured_template; ?></label>
                <div class="col-sm-10">
                    <select name="use_featured_template" id="input-use_featured_template" class="form-control">
                        <?php if ($use_featured_template) { ?>
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
                <label class="col-sm-2 control-label" for="input-cnt_diff"><?php echo $entry_cnt_diff; ?></label>
                <div class="col-sm-10">
                    <input type="text" name="cnt_diff" value="<?php echo $cnt_diff; ?>" placeholder="<?php echo $entry_cnt_diff; ?>" id="input-cnt_diff" class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-delimiter"><span data-toggle="tooltip" title="<?php echo $entry_delimiter_help; ?>"><?php echo $entry_delimiter; ?></span></label>
                <div class="col-sm-10">
                    <input type="text" name="delimiter" value="<?php echo $delimiter; ?>" placeholder="<?php echo $entry_delimiter; ?>" id="input-delimiter" class="form-control" />
                </div>
            </div>



            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-excluded_attributes"><?php echo $entry_excluded_attributes; ?></label>
                <div class="col-sm-10">
                    <div class="well well-sm" style="min-height: 150px;max-height: 500px;overflow: auto;">
                        <table class="table table-striped">
                            <?php foreach ($attributes as $attribute) { ?>
                                <tr>
                                    <td class="checkbox">
                                        <label>
                                            <?php if (in_array($attribute['attribute_id'], $excluded_attributes)) { ?>
                                                <input type="checkbox" name="excluded_attributes[]" value="<?php echo $attribute['attribute_id']; ?>" checked="checked" />
                                                <?php echo $attribute['name']; ?>
                                            <?php } else { ?>
                                                <input type="checkbox" name="excluded_attributes[]" value="<?php echo $attribute['attribute_id']; ?>" />
                                                <?php echo $attribute['name']; ?>
                                            <?php } ?>
                                        </label>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <a onclick="$(this).parent().find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-included_categories"><span data-toggle="tooltip" title="<?php echo $help_included_categories; ?>"><?php echo $entry_included_categories; ?></span></label>
                <div class="col-sm-10">
                    <input type="text" name="category" value="" placeholder="<?php echo $entry_category; ?>" id="input-included_categories" class="form-control" />
                    <div id="included_categories" class="well well-sm" style="height: 150px; overflow: auto;">
                        <?php foreach ($included_categories as $category) { ?>
                            <div id="included_categories<?php echo $category['category_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $category['name']; ?>
                                <input type="hidden" name="included_categories[]" value="<?php echo $category['category_id']; ?>" />
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-width"><?php echo $entry_width; ?></label>
            <div class="col-sm-10">
              <input type="text" name="width" value="<?php echo $width; ?>" placeholder="<?php echo $entry_width; ?>" id="input-width" class="form-control" />
              <?php if ($error_width) { ?>
              <div class="text-danger"><?php echo $error_width; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-height"><?php echo $entry_height; ?></label>
            <div class="col-sm-10">
              <input type="text" name="height" value="<?php echo $height; ?>" placeholder="<?php echo $entry_height; ?>" id="input-height" class="form-control" />
              <?php if ($error_height) { ?>
              <div class="text-danger"><?php echo $error_height; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
          <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
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
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    // Category
    $('input[name=\'category\']').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: 'index.php?route=catalog/category/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['category_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            $('input[name=\'category\']').val('');

            $('#included_categories' + item['value']).remove();

            $('#included_categories').append('<div id="included_categories' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="included_categories[]" value="' + item['value'] + '" /></div>');
        }
    });

    $('#included_categories').delegate('.fa-minus-circle', 'click', function() {
        $(this).parent().remove();
    });

</script>
<?php echo $footer; ?>