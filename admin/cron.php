<?php
//require_once('export_import.php');
//string(14) "/tmp/phpRI7jiJ" bool(true)
/*if (is_file('export_import.php')) {
	require_once('export_import.php');
}*/

//require_once(DIR_SYSTEM . 'export_import.php');


if (!isset($_SERVER['SERVER_PORT'])) {
    $_SERVER['SERVER_PORT'] = 80;
}

// Configuration
if (is_file(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php')) {
    require_once('config.php');
}

// Version
$temp_version = '1.5.4';
//Attempt to find OC version by regex-ing index.php file (will work as far back as 1.5.5.1)
if (is_file(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'index.php')) {
    $index_file = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'index.php');
    if (preg_match("/'VERSION', '(\d.\d.\d.\d)'/", $index_file, $matches)) {
        $temp_version = $matches[1];
    }
}
define('VERSION', $temp_version);

// CLI Initiated
define('CLI_INITIATED', true);

// Choose Import Profile to run, and set range of products to import
if ($argc > 1 && $argv[1]) {
	define('PROFILE_NAME', $argv[1]);
	if (!empty($argv[2])){
		//partial import
		$range = explode('-', $argv[2]);
		if (count($range) == 2){
			define('START', $range[0]);
			define('END', $range[1]);
		}
	}
} else {
	define ('PROFILE_NAME', 'default');
}

//Create lock file to prevent simultaneous runs
/*$lock_file = DIR_APPLICATION."import_lock";
$run = false;
if(!file_exists($lock_file)) {
	$ourFileHandle = fopen($lock_file, 'w') or die("can't open file");
	fclose($ourFileHandle);
	$run = true;
} else {
	//Remove a lock file over one hour old
	$file_age = time() - filemtime($lock_file);
	if($file_age >= 3600) {
		$run = true;
	} else {
		die("import_lock file present. An import is already running. (Lock file is cleared after 1 hour or you can remove import_lock in your admin folder)\n");
	}
}*/

//FOR OPENCART 2.2.0.0 AND ABOVE, WHERE LOTS CHANGED:
if (version_compare(VERSION, '2.2.0.0', '>=')) {
    // Startup
    require_once(DIR_SYSTEM . 'startup.php');
    $application_config = 'admin';

    // Registry
    $registry = new Registry();
    // Loader
    $loader = new Loader($registry);
    $registry->set('load', $loader);
    // Config
    $config = new Config();
    $config->load('default');
    $config->load($application_config);
    $registry->set('config', $config);
    // Request
    $registry->set('request', new Request());
    // Response
    $response = new Response();
    $response->addHeader('Content-Type: text/html; charset=utf-8');
    $registry->set('response', $response);
    // Database
    if ($config->get('db_autostart')) {
        $registry->set('db', new DB($config->get('db_type'), $config->get('db_hostname'), $config->get('db_username'), $config->get('db_password'), $config->get('db_database'), $config->get('db_port')));
    }
    // Session
    if ($config->get('session_autostart')) {
        $session = new Session();
        $session->start();
        $registry->set('session', $session);
    }
    // Cache
    $registry->set('cache', new Cache($config->get('cache_type'), $config->get('cache_expire')));
    // Url
    $registry->set('url', new Url($config->get('site_ssl')));
    // Language
    $language = new Language($config->get('language_default'));
    $language->load($config->get('language_default'));
    $registry->set('language', $language);

    // Document
    $registry->set('document', new Document());

    //Event
    $event = new Event($registry);
    $registry->set('event', $event);
    // Event Register
    // if ($config->has('action_event')) {
    //     foreach ($config->get('action_event') as $key => $value) {
    //         $event->register($key, new Action($value));
    //     }
    // }

    // Config Autoload
    if ($config->has('config_autoload')) {
        foreach ($config->get('config_autoload') as $value) {
            $loader->config($value);
        }
    }
    // Language Autoload
    if ($config->has('language_autoload')) {
        foreach ($config->get('language_autoload') as $value) {
            $loader->language($value);
        }
    }
    // Library Autoload
    if ($config->has('library_autoload')) {
        foreach ($config->get('library_autoload') as $value) {
            $loader->library($value);
        }
    }
    // Model Autoload
    if ($config->has('model_autoload')) {
        foreach ($config->get('model_autoload') as $value) {
            $loader->model($value);
        }
    }
    // Front Controller
    $controller = new Front($registry);

    $controller->addPreAction(new Action('startup/startup'));
}
else { //OpenCart version is less than 2.2.0.0:

    // Startup
    require_once(DIR_SYSTEM . 'startup.php');

    // Registry
    $registry = new Registry();

    // Loader
    $loader = new Loader($registry);
    $registry->set('load', $loader);

    // Config
    $config = new Config();
    $registry->set('config', $config);

    // Database
    $db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $registry->set('db', $db);

    // Settings
    $query = $db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '0'");

    foreach ($query->rows as $setting) {
        $config->set($setting['key'], $setting['value']);
    }

    // Url
    $url = new Url(HTTP_SERVER, HTTPS_SERVER);
    $registry->set('url', $url);

    // Log
    $log = new Log($config->get('config_error_filename'));
    $registry->set('log', $log);

    // Request
    $request = new Request();
    $registry->set('request', $request);

    // Response
    $response = new Response();
    $response->addHeader('Content-Type: text/html; charset=utf-8');
    $registry->set('response', $response);

    // Cache
    $cache = new Cache('file');
    $registry->set('cache', $cache);

    // Session
    $session = new Session();
    $registry->set('session', $session);

    // Language
    $languages = array();

    // Event
    $event = new Event($registry);
    $registry->set('event', $event);

    $query = $db->query("SELECT * FROM " . DB_PREFIX . "language");

    foreach ($query->rows as $result) {
        $languages[$result['code']] = $result;
    }

    $config->set('config_language_id', $languages[$config->get('config_admin_language')]['language_id']);

    // Language
    $language = new Language($languages[$config->get('config_admin_language')]['directory']);
    if (!empty($languages[$config->get('config_admin_language')]['filename']))
        $language->load($languages[$config->get('config_admin_language')]['filename']);
    $registry->set('language', $language);

    // Document
    $document = new Document();
    $registry->set('document', $document);

    // Front Controller
    $controller = new Front($registry);
	//$model = new Model();

}
//$controller->load('model/tool/export_import');
$controller->dispatch(new Action('model/tool/export_import/upload'), new Action($config->get('action_error')));
//$exp = new model_tool_export_import();
$model = $loader->model('tool/export_import');
$model_tool_export_import = $registry->get('model_tool_export_import');


/// выше подканектился к ядру 
$result = $model_tool_export_import->upload(DIR_APPLICATION."/upload_import/products.xlsx", true);
// отправил файл на обработку 
var_dump($result);
//$controller->dispatch(new Action('tool/total_import/step1'), new Action($config->get('action_error')));

// Dispatch
/*if ($run) {
    //Run cron
    $controller->dispatch(new Action('tool/total_import/step1'), new Action($config->get('action_error')));
    //Delete lock file
    unlink($lock_file);
}*/

	
	//$this->model_tool_export_import->upload("/upload_import/products.xlsx", true);
	
	
	
	
	
	
	//$this->model_tool_export_import->upload("/upload_import/products.xlsx", true);


//$exp = new ModelToolExportImport();
//return upload("/upload_import/products.xlsx", true); 
?>