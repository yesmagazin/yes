<?php

function se_clean ($text) {
	$text = html_entity_decode($text);
	$text = strip_tags($text);
	$text = preg_replace("/[-\'\"\r\n\s]+/", " ", $text);
	
	//$text = preg_replace("/[^ \w]+/u", "", $text);
	$text = preg_replace("/[^ a-zA-Zа-яА-ЯіІїЇєЄґҐ0-9_]+/u", "", $text);

 $text = preg_replace("/[\s]+/", " ", $text);

	return $text;
}

function se_cyr2lat($text){
    $cyr = array('а','б','в','г','ґ','д','е','ё','є','ж', 'з','и','і','ї','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч', 'ш', 'щ', 'ъ','ы','ь','э','ю', 'я');
    $lat = array('a','b','v','g','g','d','e','e','e','zh','z','i','i','i','j','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sh','', 'i','', 'e','ju','ja');
    return  str_replace($cyr, $lat, $text);
}
