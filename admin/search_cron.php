<?php
ini_set('display_errors', 1);

// Version
define('VERSION', '2.3.0.2.3');

// how many products index by one time
// сколько товаров индексировать за один раз
$limit = 1000;

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// Registry
$registry = new Registry();

// Config
$config = new Config();
$registry->set('config', $config);

// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
$registry->set('db', $db);

// Settings
$query = $db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '0'");

foreach ($query->rows as $setting) {
	if (!$setting['serialized']) {
		$config->set($setting['key'], $setting['value']);
	} else {
		$config->set($setting['key'], json_decode($setting['value'], true));
	}
}

// Loader
$loader = new Loader($registry);
$registry->set('load', $loader);

// Log
$log = new Log($config->get('config_error_filename'));
$registry->set('log', $log);

// Cache
$cache = new Cache('file');
$registry->set('cache', $cache);

// Event
$event = new Event($registry);
$registry->set('event', $event);

require_once DIR_SYSTEM . '/library/morphy.php';

// Search Engine Model
$registry->get('load')->model('extension/module/search_engine');

// create product indexes
$registry->get('model_extension_module_search_engine')->addIndexes($limit);