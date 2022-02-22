
<!--author sv2109 (sv2109@gmail.com) license for 1 product copy granted for lexkom (oleksii.komlev@gmail.com yes-tm.com,www.yes-tm.com)-->
<?php echo $header; ?>
<?php echo $column_left; ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
				<button id="button-add" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <span class="total-not-indexed"><?php echo $total_not_indexed; ?></span></button>
				<button data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? location='<?php echo $delete; ?>' : false"><i class="fa fa-trash"></i> <span class="total-indexed"><?php echo $total_indexed; ?></span></button>
        <button type="submit" form="form-search-engine" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
		<?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>		
		
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <div class="form-group form-group-progress hide">
          <label class="col-sm-2 control-label"><?php echo $entry_progress; ?></label>
          <div class="col-sm-9">
            <div class="progress">
              <div id="progress-bar" class="progress-bar progress-bar-striped" style="width: 0%;"></div>
            </div>
            <div id="progress-text"></div>
          </div>
			    <div class="col-sm-1">
            <button id="button-stop" data-toggle="tooltip" title="<?php echo $button_stop_hide; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
			    </div>
        </div>				
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-search-engine" class="form-horizontal">
          <ul class="nav nav-tabs">            
            <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
            <li><a href="#tab-field" data-toggle="tab"><?php echo $tab_field; ?></a></li>
						<li><a href="#tab-add-fields" data-toggle="tab"><?php echo $tab_add_fields; ?></a></li>
						<li><a href="#tab-exclude-words" data-toggle="tab"><?php echo $tab_exclude_words; ?></a></li>
            <li><a href="#tab-replace-words" data-toggle="tab"><?php echo $tab_replace_words; ?></a></li>
            <li><a href="#tab-support" data-toggle="tab"><?php echo $tab_support; ?></a></li>
          </ul>
          <div class="tab-content">

            <div id="tab-general" class="tab-pane active">

              <div class="form-group">
								<label class="col-sm-2 control-label"><?php echo $entry_search_logic; ?></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[logic]" class="form-control">
	                  <option value="OR"   <?php echo (isset($options['logic']) && $options['logic'] == 'OR') ? 'selected="selected"' : ""; ?>><?php echo $text_logic_or; ?></option>
	                  <option value="AND"  <?php echo (isset($options['logic']) && $options['logic'] == 'AND') ? 'selected="selected"' : ""; ?>><?php echo $text_logic_and; ?></option>																														
                  </select>									
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_multistore; ?></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[multistore]" class="form-control">
                    <option value="0"   <?php echo (isset($options['multistore']) && $options['multistore'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                    <option value="1"   <?php echo (isset($options['multistore']) && $options['multistore'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
                  </select>									
                </div>
              </div>
							
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_date_available; ?></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[date_available]" class="form-control">
                    <option value="0"   <?php echo (isset($options['date_available']) && $options['date_available'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                    <option value="1"   <?php echo (isset($options['date_available']) && $options['date_available'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
                  </select>									
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_search_type; ?></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[search_type]" class="form-control">
	                  <option value="equal"   <?php echo (isset($options['search_type']) && $options['search_type'] == 'equal') ? 'selected="selected"' : ""; ?>><?php echo $text_search_type_equal; ?></option>
	                  <option value="start"  <?php echo (isset($options['search_type']) && $options['search_type'] == 'start') ? 'selected="selected"' : ""; ?>><?php echo $text_search_type_start; ?></option>																														
                  </select>									
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_fix_keyboard_layout; ?>"><?php echo $entry_fix_keyboard_layout; ?></span></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[fix_keyboard_layout]" class="form-control">
                    <option value="0"   <?php echo (isset($options['fix_keyboard_layout']) && $options['fix_keyboard_layout'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                    <option value="1"   <?php echo (isset($options['fix_keyboard_layout']) && $options['fix_keyboard_layout'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
                  </select>									
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_inexact_search; ?>"><?php echo $entry_inexact_search; ?></span></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[inexact_search]" class="form-control">
                    <option value="0"   <?php echo (isset($options['inexact_search']) && $options['inexact_search'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                    <option value="1"   <?php echo (isset($options['inexact_search']) && $options['inexact_search'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
                  </select>									
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_sort_order_stock; ?>"><?php echo $entry_sort_order_stock; ?></span></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[sort_order_stock]" class="form-control">
                    <option value="0"   <?php echo (isset($options['sort_order_stock']) && $options['sort_order_stock'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                    <option value="1"   <?php echo (isset($options['sort_order_stock']) && $options['sort_order_stock'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
                  </select>									
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_cache_results; ?></label>                    
                <div class="col-sm-10">
                  <select name="search_engine_options[cache_results]" class="form-control">
                    <option value="0"   <?php echo (isset($options['cache_results']) && $options['cache_results'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                    <option value="1"   <?php echo (isset($options['cache_results']) && $options['cache_results'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
                  </select>																		
                </div>
              </div>

							<?php echo $help_tab_general; ?>
            </div>

            <div id="tab-field" class="tab-pane">
							
              <table id="fields"  class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <td><?php echo $entry_fields_name; ?></td>
										<td><?php echo $entry_search; ?></td>
                    <td><?php echo $entry_use_morphology; ?></td>
										<td><?php echo $entry_contains; ?></td>
										<td><?php echo $entry_min_word_length; ?></td>
                    <td><?php echo $entry_relevance_start; ?></td>
                    <td><?php echo $entry_relevance_end; ?></td>
                  </tr>
                </thead>

                <tbody >

									<?php foreach ($fields as $field): ?>

	                  <tr>

	                    <td>
												<?php echo isset(${"field_" . str_replace('.', '_', $field)}) ? ${"field_" . str_replace('.', '_', $field)} : $field; ?>
	                    </td>

											<td>
	                      <select name="search_engine_options[fields][<?php echo $field; ?>][search]" class="form-control">
	                        <option value="0" <?php echo (isset($options['fields'][$field]['search']) && $options['fields'][$field]['search'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>												
	                        <option value="1"  <?php echo (isset($options['fields'][$field]['search']) && $options['fields'][$field]['search'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
	                      </select>												
											</td>
											
											<td>
 	                      <input type="checkbox" name="search_engine_options[fields][<?php echo $field; ?>][use_morphology]" value="1" <?php echo isset($options['fields'][$field]['use_morphology']) && $options['fields'][$field]['use_morphology'] ? "checked=checked" : ""; ?>  class="form-control"/>
	                    </td>
											
											<td>
 	                      <input type="checkbox" name="search_engine_options[fields][<?php echo $field; ?>][contains]" value="1" <?php echo isset($options['fields'][$field]['contains']) && $options['fields'][$field]['contains'] ? "checked=checked" : ""; ?>  class="form-control"/>
	                    </td>
											
											<td>
	                      <input type="text" name="search_engine_options[fields][<?php echo $field; ?>][min_word_length]" value="<?php echo isset($options['fields'][$field]['min_word_length']) ? $options['fields'][$field]['min_word_length'] : 3; ?>" class="form-control"/>
	                    </td>
											
											<td>
	                      <input type="text" name="search_engine_options[fields][<?php echo $field; ?>][relevance][start]" value="<?php echo isset($options['fields'][$field]['relevance']['start']) ? $options['fields'][$field]['relevance']['start'] : 0; ?>" class="form-control"/>
	                    </td>
											
	                    <td>
	                      <input type="text" name="search_engine_options[fields][<?php echo $field; ?>][relevance][end]" value="<?php echo isset($options['fields'][$field]['relevance']['end']) ? $options['fields'][$field]['relevance']['end'] : 0; ?>" class="form-control"/>
	                    </td>              

	                  </tr>

									<?php endforeach; ?>

                </tbody>  

              </table>
							<?php echo $help_tab_field; ?>
            </div>

            <div id="tab-add-fields" class="tab-pane">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left required"><?php echo $entry_field; ?></td>
											<td class="text-left"><?php echo $entry_join; ?></td>
											<td class="text-left"><?php echo $entry_where; ?></td>
                      <td class="text-left"></td>
                    </tr>
                  </thead>
                  <tbody>
										<?php $fields_row = 0; ?>
										<?php if (!empty($options['new_fields'])) { ?>
											<?php foreach ($options['new_fields'] as $field) { ?>
												<tr id="fields-row<?php echo $fields_row; ?>">
													
													<td class="text-left">
														<input type="text" name="search_engine_options[new_fields][<?php echo $fields_row; ?>][field]" value="<?php echo $field['field']; ?>" class="form-control"/>
														<?php if (isset($error_new_fields[$field['field']])) { ?>
															<div class="text-danger"><?php echo $error_new_fields[$field['field']]; ?></div>
														<?php } ?>
													</td>
													
													<td class="text-left"><input type="text" name="search_engine_options[new_fields][<?php echo $fields_row; ?>][join]" value="<?php echo $field['join']; ?>" class="form-control"/></td>
													
													<td class="text-left"><input type="text" name="search_engine_options[new_fields][<?php echo $fields_row; ?>][where]" value="<?php echo $field['where']; ?>" class="form-control"/></td>
													
													<td class="text-left"><button type="button" onclick="$('#fields-row<?php echo $fields_row; ?>').remove()" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
												</tr>
												<?php $fields_row++; ?>
											<?php } ?>
										<?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3"></td>
                      <td class="text-left"><button type="button" onclick="addField()" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>

							<?php echo $help_tab_add_fields; ?>
            </div>

            <div id="tab-exclude-words" class="tab-pane">

              <ul id="exclude-words-languages" class="nav nav-tabs">
								<?php foreach ($languages as $language) { ?>
	                <li><a href="#exclude-words-language<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
								<?php } ?>
              </ul>

              <div class="tab-content">                            
								<?php foreach ($languages as $language) { ?>
	                <div id="exclude-words-language<?php echo $language['language_id']; ?>" class="tab-pane">

	                  <div class="form-group">
	                    <label class="col-sm-2 control-label" for="exclude-words<?php echo $language['language_id']; ?>">
	                      <span data-toggle="tooltip" title="" data-original-title="<?php echo $help_tab_exclude_words; ?>"><?php echo $entry_exclude_words; ?></span>
	                    </label>                    
	                    <div class="col-sm-10">
	                      <textarea name="search_engine_options[exclude_words][<?php echo $language['language_id']; ?>]" rows="5" id="exclude-words<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($options['exclude_words'][$language['language_id']]) ? $options['exclude_words'][$language['language_id']] : ''; ?></textarea>
	                    </div>
	                  </div>

	                </div>
								<?php } ?>
              </div>

            </div>

            <div id="tab-replace-words" class="tab-pane">

              <ul id="replace-words-languages" class="nav nav-tabs">
								<?php foreach ($languages as $language) { ?>
	                <li><a href="#replace-words-language<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
								<?php } ?>
              </ul>

              <div class="tab-content">                            
								<?php foreach ($languages as $language) { ?>
	                <div id="replace-words-language<?php echo $language['language_id']; ?>" class="tab-pane">

	                  <div class="form-group">
	                    <label class="col-sm-2 control-label" for="replace-words<?php echo $language['language_id']; ?>">
	                      <span data-toggle="tooltip" title="" data-original-title="<?php echo $help_tab_replace_words; ?>"><?php echo $entry_replace_words; ?></span>
	                    </label>                    
	                    <div class="col-sm-10">
	                      <textarea name="search_engine_options[replace_words][<?php echo $language['language_id']; ?>]" rows="5" id="replace-words<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($options['replace_words'][$language['language_id']]) ? $options['replace_words'][$language['language_id']] : ''; ?></textarea>
	                    </div>
	                  </div>

	                </div>
								<?php } ?>
              </div>

            </div>

            <div id="tab-support" class="tab-pane">
							<?php echo $help_support; ?>
            </div>

					</div>
        </form>
      </div>
    </div>
  </div>

  <div id="copyright">author sv2109 (sv2109@gmail.com) license for 1 product copy granted for lexkom (oleksii.komlev@gmail.com yes-tm.com,www.yes-tm.com)</div>

</div>

<script type="text/javascript"><!--
	$('#tab-replace-words .nav-tabs a:first').tab('show');
	$('#tab-exclude-words .nav-tabs a:first').tab('show');
	//--></script>	
<script type="text/javascript"><!--
var fields_row = <?php echo $fields_row; ?>;

function addField() {
	fields_row++;

	html  = '';
	html += '<tr id="fields-row' + fields_row + '">';
	html += '  <td class="text-left">';
	html += '    <input type="text" name="search_engine_options[new_fields][' + fields_row + '][field]" value="" class="form-control"/>';
	html += '  </td>';
	html += '  <td class="text-left">';
	html += '    <input type="text" name="search_engine_options[new_fields][' + fields_row + '][join]" value="" class="form-control"/>';
	html += '  </td>';
	html += '  <td class="text-left">';
	html += '    <input type="text" name="search_engine_options[new_fields][' + fields_row + '][where]" value="" class="form-control"/>';
	html += '  </td>';
	html += '  <td class="left">';
	html += '    <a onclick="$(\'#fields-row' + fields_row + '\').remove()" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></a>';
	html += '  </td>';
	html += '</tr>';

	$('#tab-add-fields table tbody').append(html);
}
//--></script>
<script type="text/javascript"><!--

var stopped = 0;
	
$('#button-stop').on('click', function() {
  if (!stopped) {
	  stop();
	} else {
	  $('.form-group-progress').addClass('hide');
	}
});

function stop() {
  
  stopped = 1;
	
	$('#button-add').prop('disabled', false);
	$('#button-add').tooltip('hide');
	
	$.get('index.php?route=extension/module/search_engine/stop&token=<?php echo $token; ?>');	
	
	$.get('index.php?route=extension/module/search_engine/getTotals&token=<?php echo $token; ?>', function( data ) {
	  $('.total-indexed').html(data.total_indexed);
		$('.total-not-indexed').html(data.total_not_indexed);
  }, "json" );
}

$('#button-add').on('click', function() {
	
	$('#button-add').tooltip('hide');
	$('#button-add').prop('disabled', true);
	
	$('.form-group-progress').removeClass('hide');
	
	// Reset everything
	stopped = 0;
	$('.alert').remove();
	$('#progress-bar').css('width', '0%');
	$('#progress-bar').removeClass('progress-bar-danger progress-bar-success');
	$('#progress-text').html('');

  process();
});

function process() {

		$.ajax({
			url: 'index.php?route=extension/module/search_engine/add&token=<?php echo $token; ?>',
			type: 'post',
			dataType: 'json',
			success: function(json) {

				if (json['progress']) {
					$('#progress-bar').css('width', json['progress'] + '%');
				}

				if (json['text']) {
					$('#progress-text').html('<span class="text-info">' + json['text'] + '</span>');
				}				
        
				if (json['success']) {
					$('#progress-bar').addClass('progress-bar-success');
					$('#progress-text').html('<span class="text-success">' + json['success'] + '</span>');
					stop();
				}

				if (json['error']) {
					$('#progress-bar').addClass('progress-bar-danger');
					$('#progress-text').html('<div class="text-danger">' + json['error'] + '</div>');
					stop();
				}
				
				if (!json['error'] && !json['success'] && !stopped) {
					process();
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	
}

//--></script>
<?php echo $footer; ?>