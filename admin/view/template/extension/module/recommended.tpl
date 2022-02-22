<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-about" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-about" class="form-horizontal">

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" placeholder="<?php echo $entry_title; ?>" id="input-name" class="form-control" />
                </div>
            </div>
        <ul class="nav nav-tabs" id="modules">
            <li><a href="#modules1" data-toggle="tab">Акции</a></li>
            <li><a href="#modules2" data-toggle="tab">Новинки</a></li>
            <li><a href="#modules3" data-toggle="tab">Просмотренные</a></li>
            <li><a href="#modules4" data-toggle="tab">Ожидается</a></li>
            <li><a href="#modules5" data-toggle="tab">ХИТы</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="modules1">
            <ul class="nav nav-tabs" id="language_modules1">
                <?php foreach ($languages as $language) { ?>
                    <li><a href="#language<?php echo $language['language_id']; ?>_modules1" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                <?php } ?>
            </ul>
            <div class="tab-content">
                <?php foreach ($languages as $language) { ?>
                    <div class="tab-pane" id="language<?php echo $language['language_id']; ?>_modules1">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="modules1[module_description][<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($modules1['module_description'][$language['language_id']]) ? $modules1['module_description'][$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-modules1-name<?php echo $language['language_id']; ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules1-product"><span data-toggle="tooltip" title="<?php echo $help_product; ?>"><?php echo $entry_product; ?></span></label>
                    <div class="col-sm-10">
                        <input type="text" name="modules1[product_name]" value="" placeholder="<?php echo $entry_product; ?>" id="input-product" class="form-control" />
                        <div id="module1_featured-product" class="well well-sm" style="height: 150px; overflow: auto;">
                            <?php foreach ($modules1['product'] as $product) { ?>
                                <div id="featured-product<?php echo $product['product_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $product['name']; ?>
                                    <input type="hidden" name="modules1[product][]" value="<?php echo $product['product_id']; ?>" />
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-modules1-link"><?php echo $entry_link; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="modules1[link]" value="<?php echo isset($modules1['link']) ? $modules1['link'] : ''; ?>" placeholder="<?php echo $entry_link; ?>" id="input-modules1-link" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-modules1-status"><?php echo $entry_status; ?></label>
                <div class="col-sm-10">
                  <select name="modules1[status]" id="input-modules1-status" class="form-control">
                    <?php if ($modules1['status']) { ?>
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
            <div class="tab-pane" id="modules2">
                <ul class="nav nav-tabs" id="language_modules2">
                    <?php foreach ($languages as $language) { ?>
                        <li><a href="#language<?php echo $language['language_id']; ?>_modules2" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <?php foreach ($languages as $language) { ?>
                        <div class="tab-pane" id="language<?php echo $language['language_id']; ?>_modules2">
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-modules2-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                                <div class="col-sm-10">
                                    <input type="text" name="modules2[module_description][<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($modules2['module_description'][$language['language_id']]) ? $modules2['module_description'][$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-modules2-name<?php echo $language['language_id']; ?>" class="form-control" />
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules2-product"><span data-toggle="tooltip" title="<?php echo $help_product; ?>"><?php echo $entry_product; ?></span></label>
                    <div class="col-sm-10">
                        <input type="text" name="modules2[product_name]" value="" placeholder="<?php echo $entry_product; ?>" id="input-modules2-product" class="form-control" />
                        <div id="module2_featured-product" class="well well-sm" style="height: 150px; overflow: auto;">
                            <?php foreach ($modules2['product'] as $product) { ?>
                                <div id="featured-product<?php echo $product['product_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $product['name']; ?>
                                    <input type="hidden" name="modules2[product][]" value="<?php echo $product['product_id']; ?>" />
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules2-link"><?php echo $entry_link; ?></label>
                    <div class="col-sm-10">
                        <input type="text" name="modules2[link]" value="<?php echo isset($modules2['link']) ? $modules2['link'] : ''; ?>" placeholder="<?php echo $entry_link; ?>" id="input-modules2-link" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules2-status"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                        <select name="modules2[status]" id="input-modules2-status" class="form-control">
                            <?php if ($modules2['status']) { ?>
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
            <div class="tab-pane" id="modules3">
                <ul class="nav nav-tabs" id="language_modules3">
                    <?php foreach ($languages as $language) { ?>
                        <li><a href="#language<?php echo $language['language_id']; ?>_modules3" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <?php foreach ($languages as $language) { ?>
                        <div class="tab-pane" id="language<?php echo $language['language_id']; ?>_modules3">
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-modules3-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                                <div class="col-sm-10">
                                    <input type="text" name="modules3[module_description][<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($modules3['module_description'][$language['language_id']]) ? $modules3['module_description'][$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-modules3-name<?php echo $language['language_id']; ?>" class="form-control" />
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules3-status"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                        <select name="modules3[status]" id="input-modules3-status" class="form-control">
                            <?php if ($modules3['status']) { ?>
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
            <div class="tab-pane" id="modules4">
                <ul class="nav nav-tabs" id="language_modules4">
                    <?php foreach ($languages as $language) { ?>
                    <li><a href="#language<?php echo $language['language_id']; ?>_modules4" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <?php foreach ($languages as $language) { ?>
                    <div class="tab-pane" id="language<?php echo $language['language_id']; ?>_modules4">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-modules4-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="modules4[module_description][<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($modules4['module_description'][$language['language_id']]) ? $modules4['module_description'][$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-modules4-name<?php echo $language['language_id']; ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules4-product"><span data-toggle="tooltip" title="<?php echo $help_product; ?>"><?php echo $entry_product; ?></span></label>
                    <div class="col-sm-10">
                        <input type="text" name="modules4[product_name]" value="" placeholder="<?php echo $entry_product; ?>" id="input-modules4-product" class="form-control" />
                        <div id="module4_featured-product" class="well well-sm" style="height: 150px; overflow: auto;">
                            <?php foreach ($modules4['product'] as $product) { ?>
                            <div id="featured-product<?php echo $product['product_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $product['name']; ?>
                                <input type="hidden" name="modules4[product][]" value="<?php echo $product['product_id']; ?>" />
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules4-link"><?php echo $entry_link; ?></label>
                    <div class="col-sm-10">
                        <input type="text" name="modules4[link]" value="<?php echo isset($modules4['link']) ? $modules4['link'] : ''; ?>" placeholder="<?php echo $entry_link; ?>" id="input-modules4-link" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules4-status"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                        <select name="modules4[status]" id="input-modules4-status" class="form-control">
                            <?php if ($modules4['status']) { ?>
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
            <div class="tab-pane" id="modules5">
                <ul class="nav nav-tabs" id="language_modules5">
                    <?php foreach ($languages as $language) { ?>
                    <li><a href="#language<?php echo $language['language_id']; ?>_modules5" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <?php foreach ($languages as $language) { ?>
                    <div class="tab-pane" id="language<?php echo $language['language_id']; ?>_modules5">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-modules5-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="modules5[module_description][<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($modules5['module_description'][$language['language_id']]) ? $modules5['module_description'][$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-modules5-name<?php echo $language['language_id']; ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules5-product"><span data-toggle="tooltip" title="<?php echo $help_product; ?>"><?php echo $entry_product; ?></span></label>
                    <div class="col-sm-10">
                        <input type="text" name="modules5[product_name]" value="" placeholder="<?php echo $entry_product; ?>" id="input-modules5-product" class="form-control" />
                        <div id="module5_featured-product" class="well well-sm" style="height: 150px; overflow: auto;">
                            <?php foreach ($modules5['product'] as $product) { ?>
                            <div id="featured-product<?php echo $product['product_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $product['name']; ?>
                                <input type="hidden" name="modules5[product][]" value="<?php echo $product['product_id']; ?>" />
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules5-link"><?php echo $entry_link; ?></label>
                    <div class="col-sm-10">
                        <input type="text" name="modules5[link]" value="<?php echo isset($modules5['link']) ? $modules5['link'] : ''; ?>" placeholder="<?php echo $entry_link; ?>" id="input-modules5-link" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-modules5-status"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                        <select name="modules5[status]" id="input-modules5-status" class="form-control">
                            <?php if ($modules5['status']) { ?>
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
          </div>
        </form>
      </div>
    </div>
  </div>
    <script type="text/javascript">
<?php /*
        $('input[name=\'modules1[product_name]\']').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
                    dataType: 'json',
                    success: function(json) {
                        response($.map(json, function(item) {
                            return {
                                label: item['name'],
                                value: item['product_id']
                            }
                        }));
                    }
                });
            },
            select: function(item) {
                $('input[name=\'module1[product_name]\']').val('');

                $('#module1_featured-product' + item['value']).remove();

                $('#module1_featured-product').append('<div id="featured-product' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="modules1[product][]" value="' + item['value'] + '" /></div>');
            }
        });
*/        
?>
        /* */
        
        //for (var mid = 1; mid < 6; mid++) {
        <?php for ($mid = 1; $mid < 6; $mid ++) {
            echo '$("input[name=\'modules' . $mid . '[product_name]\']").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: \'index.php?route=catalog/product/autocomplete&token='.$token.'&filter_name=\' + encodeURIComponent(request),
                        dataType: \'json\',
                        success: function(json) {
                            response($.map(json, function(item) {
                                return {
                                    label: item[\'name\'],
                                    value: item[\'product_id\']
                                }
                            }));
                        }
                    });
                },
                select: function(item) {
console.log(item);
                    $("input[name=\'modules' . $mid . '[product_name]\']").val(\'\');
                    $("#module' . $mid . '_featured-product" + item[\'value\']).remove();
                    $("#module' . $mid . '_featured-product").append(\'<div id="featured-product\' + item[\'value\'] + \'"><i class="fa fa-minus-circle"></i> \' + item[\'label\'] + \'<input type="hidden" name="modules' . $mid . '[product][]" value="\' + item[\'value\'] + \'" /></div>\');
            }
        });
                        ';
echo '            $(\'#module' . $mid . '_featured-product\').delegate(\'.fa-minus-circle\', \'click\', function() {
                $(this).parent().remove();
            });
        ';    
        
        } ?>
        
        //</script>
    <script type="text/javascript"><!--
        $('#language_modules1 a:first').tab('show');
        $('#language_modules2 a:first').tab('show');
        $('#language_modules3 a:first').tab('show');
        $('#language_modules4 a:first').tab('show');
        $('#language_modules5 a:first').tab('show');
        $('#modules a:first').tab('show');
        //--></script></div>
<?php echo $footer; ?>