<?php

// Heading
$_['heading_title']             = 'Search Engine [<a href="http://sv2109.com" target="_blank">sv2109.com</a>]';

// Entry
$_['entry_field']               = 'Field';
$_['entry_join']                = 'JOIN for the new table';
$_['entry_where']               = 'WHERE for the new table';
$_['entry_fix_keyboard_layout'] = 'Fix keyboard layout';
$_['entry_inexact_search']      = 'Inexact search';
$_['entry_sort_order_stock']    = 'Sort order stock';
$_['entry_fields_name']         = 'Fields';
$_['entry_search']              = 'Search';
$_['entry_use_morphology']      = 'Use morphology <br/>(stemming)';
$_['entry_search_logic']        = 'Search logic for the <br/>multiple words search phrase ';
$_['entry_min_word_length']     = 'Minimum word length for search';
$_['entry_cache_results']       = 'Cache results';
$_['entry_relevance_start']     = 'Weight of the first word';
$_['entry_relevance_end']       = 'Weight of the last word';
$_['entry_contains']            = 'Search by contains';
$_['entry_key']                 = 'Module key';
$_['entry_exclude_words']       = 'Exclude words';
$_['entry_replace_words']       = 'Replace words';
$_['entry_multistore']          = 'Multistore';
$_['entry_date_available']      = 'Use products date availabl';
$_['entry_search_type']         = 'Search type';
$_['entry_progress']            = 'Progress';

// Text
$_['text_module']               = 'Modules';
$_['text_success']              = 'Success: You have modified module Search Engine!';
$_['text_success_index']        = 'Indexes have been created!';
$_['text_index_progress']       = '<b>%.2f%%</b> done';
$_['text_edit']                 = 'Edit Search Relevance module';
$_['text_always']               = 'Always';
$_['text_nothing_found']        = 'If nothing found';
$_['text_logic_or']             = 'OR';
$_['text_logic_and']            = 'AND';
$_['text_search_type_equal']    = 'Search by equality';
$_['text_search_type_start']    = 'Search by beginning of the word';

// Tabs
$_['tab_general']               = 'General settings';
$_['tab_field']                 = 'Fields settings';
$_['tab_support']               = 'Support';
$_['tab_exclude_words']         = 'Exclude words';
$_['tab_replace_words']         = 'Replace words';
$_['tab_add_fields']            = 'Add fields';

// Fields
$_['field_pd_name']             = 'Name';
$_['field_pd_description']      = 'Description';
$_['field_pd_tag']              = 'Tags';
$_['field_pa_text']             = 'Attributes';
$_['field_p_model']             = 'Model';
$_['field_p_sku']               = 'SKU';
$_['field_p_upc']               = 'UPC';
$_['field_p_ean']               = 'EAN';
$_['field_p_jan']               = 'JAN';
$_['field_p_isbn']              = 'ISBN';
$_['field_p_mpn']               = 'MPN';

// Buttons
$_['button_add']                = 'Create search indexes';
$_['button_delete']             = 'Delete all indexes';
$_['button_stop_hide']          = 'Stop / Hide';

// Error
$_['error_permission']          = 'Warning: You do not have permission to modify module Search Relevance!';
$_['error_field']               = 'New search field can\'t be empty';
$_['error_warning']             = 'Carefully check the form for errors!';

// Help
$_['help_tab_general']          = '';
$_['help_tab_field']        = '';
$_['help_tab_exclude_words']    = 'One word or words per line';
$_['help_tab_replace_words']    = 'One pair of words per line, words in the pair separated by space or | for phrases. For example: aple apple or big aple|big apple';
$_['help_tab_add_fields'] = 'Help:<br/>
    <ul>
      <li><b>Field:</b> field for search, for example: p.product_id, pd.meta_title, pa.text и т.д.</li>
      <li><b>JOIN for the new table: </b> SQL code for new table, for example: "LEFT JOIN oc_product_attribute pa ON (p.product_id=pa.product_id)" <br />
			  These fields are already used by module, you don\'t need to add them in the JOIN column:
				<ul>
				  <li>product p</li>
					<li>product_description pd</li>
					<li>product_attribute pa (if search by attributes is enabled)</li>
				  <li>category_path cp (if sub category search is enabled)</li>
					<li>product_to_category p2c (if category search is enabled)</li>
					<li>product_to_store p2s</li>
				</ul>
			</li>
			<li><b>WHERE for the new table: </b> for example: "pa.language_id = pd.language_id"</li>			
    </ul>';

$_['help_fix_keyboard_layout'] = 'Correct the wrong keyboard layout, for example: дфзещз-> laptop';
$_['help_inexact_search']      = 'Search with typos. Update indexes after enable';
$_['help_sort_order_stock']    = 'Out of stock products will display in the end';

$_['help_support'] = '
<br />
<b>If this module does not work or you have a problem with installing or using this module you can:</b>
<ul>
  <li>email me at <a href="mailto:sv2109@gmail.com?subject=Search Engine module">sv2109@gmail.com</a></li>
  <li>create a ticket on the <a href="http://sv2109.com/en/tickets">http://sv2109.com/en/tickets</a></li>
  <li>write a comment on the module page</li>
</ul>
<br/>
<b>You can also contact me if:</b>
<ul>
  <li>you need help with your OpenCart</li>
  <li>you need to create any other module for OpenCart</li> 
</ul>
<br/>
<div style="font-size: 150%;">Other useful modules you can find <a href="http://sv2109.com/en/modules">here</a>:</div>
<br/>
<a href="http://sv2109.com/en/modules"><img src="http://sv2109.com/i/ssb.png" alt=""><img src="http://sv2109.com/i/srb.png" alt=""><img src="http://sv2109.com/i/isb.png" alt=""><img src="http://sv2109.com/i/fcsb.png" alt="">
<br/><img src="http://sv2109.com/i/acb.png" alt=""><img src="http://sv2109.com/i/asb.png" alt=""><img src="http://sv2109.com/i/iocb.png" alt=""><img src="http://sv2109.com/i/tab.png" alt=""></a>
';
//author sv2109 (sv2109@gmail.com) license for 1 product copy granted for lexkom (oleksii.komlev@gmail.com yes-tm.com,www.yes-tm.com)
