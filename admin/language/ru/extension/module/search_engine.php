<?php

// Heading
$_['heading_title']             = 'Поисковая система с морфологией и релевантностью [<a href="http://sv2109.com" target="_blank">sv2109.com</a>]';

// Entry
$_['entry_field']               = 'Поле';
$_['entry_join']                = 'JOIN для новой таблицы';
$_['entry_where']               = 'WHERE для новой таблицы';
$_['entry_fix_keyboard_layout'] = 'Исправлять раскладку клавиатуры';
$_['entry_inexact_search']      = 'Неточный поиск';
$_['entry_sort_order_stock']    = 'Учитывать наличие на складе при сортировке';
$_['entry_fields_name']         = 'Поля';
$_['entry_search']              = 'Где искать';
$_['entry_use_morphology']      = 'Использовать морфологию';
$_['entry_search_logic']        = 'Логика поиска для фраз из нескольких слов';
$_['entry_min_word_length']     = 'Минимальная длина слова для поиска';
$_['entry_cache_results']       = 'Кешировать результаты поиска';
$_['entry_relevance_start']     = 'Вес первого слова';
$_['entry_relevance_end']       = 'Вес последнего слова';
$_['entry_contains']            = 'Поиск по вхождеиню слова';
$_['entry_key']                 = 'Ключ';
$_['entry_exclude_words']       = 'Исключить слова';
$_['entry_replace_words']       = 'Заменить слова';
$_['entry_multistore']          = 'Мультимагазин';
$_['entry_date_available']      = 'Использовать дату поступления товаров';
$_['entry_search_type']         = 'Тип поиска';
$_['entry_progress']            = 'Индексирование';

// Text
$_['text_module']               = 'Модули';
$_['text_success']              = 'Модуль удачно обновлен!';
$_['text_success_index']        = 'Индексы созданы!';
$_['text_index_progress']       = 'Выполнено на <b>%.2f%%</b>';
$_['text_edit']                 = 'Ректирование модуля';
$_['text_always']               = 'Всегда';
$_['text_nothing_found']        = 'Когда ничего не найдено';
$_['text_logic_or']             = 'ИЛИ';
$_['text_logic_and']            = 'И';
$_['text_search_type_equal']    = 'Искать по точному совпадению';
$_['text_search_type_start']    = 'Искать по началу слова';

// Tabs
$_['tab_general']               = 'Основные настройки';
$_['tab_field']                 = 'Настройки полей';
$_['tab_support']               = 'Поддержка';
$_['tab_exclude_words']         = 'Исключить слова';
$_['tab_replace_words']         = 'Заменить слова';
$_['tab_add_fields']            = 'Добавить поля';

// Fields
$_['field_pd_name']             = 'Название';
$_['field_pd_description']      = 'Описание';
$_['field_pd_tag']              = 'Теги';
$_['field_pa_text']             = 'Атрибуты';
$_['field_p_model']             = 'Модель';
$_['field_p_sku']               = 'SKU';
$_['field_p_upc']               = 'UPC';
$_['field_p_ean']               = 'EAN';
$_['field_p_jan']               = 'JAN';
$_['field_p_isbn']              = 'ISBN';
$_['field_p_mpn']               = 'MPN';

// Buttons
$_['button_add']                = 'Создать индексы';
$_['button_delete']             = 'Удалить все индексы';
$_['button_stop_hide']          = 'Остановить / Скрыть';

// Error
$_['error_permission']          = 'Внимание: Вы не имеете права модифицировать модуль Поисковая система с морфологией и релевантностью!';
$_['error_field']               = 'Новое поле для поиска не может быть пустым';
$_['error_warning']             = 'Внимательно проверьте форму на ошибки!';

// Help
$_['help_tab_general'] = '';
$_['help_tab_field'] = 'Помощь:<br/>
    <ul>
      <li>после изменения настроек нужно обновить идексы</li>
      <li>веса слов рассчитываются пропорционально от первого к последнему, чем ближе слово к началу тем больше у него вес</li>
      <li>вес последнего слова обычно должен быть меньше веса первого</li>
      <li>поиск по вхождению желатаельно использовать для небольших полей (модель, артикул..), для больших полей таких как описание товара это значительно увеличит размер индекса и скажется на скорости поиска</li>			
    </ul>';
$_['help_tab_exclude_words'] = 'Одно слово или несколько слов (для исключения фразы) на строку';
$_['help_tab_replace_words'] = 'Одна пара слов или фраз на строку, слова в паре разделены пробелом или символом | для фраз. Например: aple apple или big aple|big apple';
$_['help_tab_add_fields'] = 'Помощь:<br/>
    <ul>
      <li><b>Поле:</b> поле, по которому Вы хотите осуществлять поиск, например: p.product_id, pd.meta_title, pa.text и т.д.</li>
      <li><b>JOIN для новой таблицы: </b> SQL код для добавления новой таблицы, например: "LEFT JOIN oc_product_attribute pa ON (p.product_id=pa.product_id)" <br />
			  Вот перечень полей, которые уже используются в модуле, их не нужно добавлять:
				<ul>
				  <li>product p</li>
					<li>product_description pd</li>
					<li>product_attribute pa (если включен поиск по атрибутам)</li>
				  <li>category_path cp (если включено искать в подкатегориях)</li>
					<li>product_to_category p2c (если включено искать в категории)</li>
					<li>product_to_store p2s</li>
				</ul>
			</li>
			<li><b>WHERE для новой таблицы: </b> SQL код для условия WHERE для новой таблицы, например: "pa.language_id = pd.language_id"</li>
			<li>После добавления нового поля сохраните настройки и измените настройки для этого поля во вкладке "Настройки полей"</li>
    </ul>';

$_['help_fix_keyboard_layout'] = 'Исправлять неправильную раскладку клавиатуры, например: yjen,er->ноутбук';
$_['help_inexact_search']      = 'Поиск с опечатками и грамматическими ошибками. Нужно обновить индексы после включения';
$_['help_sort_order_stock']    = 'Товары, которых нет в наличии будут отображаться последними';

$_['help_support'] = '
<br />
<b>Если у вас возникли проблемы с установкой или использованием этого модуля, то вы можете:</b>
<ul>
  <li>Написать мне на <a href="mailto:sv2109@gmail.com?subject=Search Engine module">sv2109@gmail.com</a></li>
  <li>Создать тикет на <a href="http://sv2109.com/ru/tickets">http://sv2109.com/ru/tickets</a></li>
  <li>Написать комментарий на странице модуля</li>
</ul>
<br/>
<b>Вы так же можете ко мне обратиться если:</b>
<ul>
  <li>вам нужна помощь с вашим OpenCart-ом</li>
  <li>вам нужно создать любой другой модуль для OpenCart</li> 
</ul>
<br/>
<div style="font-size: 150%;">Другие полезные модули вы можете найти <a href="http://sv2109.com/ru/modules">тут</a>:</div>
<br/>
<a href="http://sv2109.com/ru/modules"><img src="http://sv2109.com/i/ssb.png" alt=""><img src="http://sv2109.com/i/srb.png" alt=""><img src="http://sv2109.com/i/isb.png" alt=""><img src="http://sv2109.com/i/fcsb.png" alt="">
<br/><img src="http://sv2109.com/i/acb.png" alt=""><img src="http://sv2109.com/i/asb.png" alt=""><img src="http://sv2109.com/i/iocb.png" alt=""><img src="http://sv2109.com/i/tab.png" alt=""></a>
';
//author sv2109 (sv2109@gmail.com) license for 1 product copy granted for lexkom (oleksii.komlev@gmail.com yes-tm.com,www.yes-tm.com)
