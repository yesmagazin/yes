<?php
ini_set('display_errors', 0);
// HTTP
define('HTTP_SERVER', 'https://yes-tm.com/admin/');
define('HTTP_CATALOG', 'https://yes-tm.com/');

//$dev = false; isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'],array('193.151.240.57')); //,'79.135.197.165'
// HTTPS
define('HTTPS_SERVER', 'https://yes-tm.com/admin/');
define('HTTPS_CATALOG', 'https://yes-tm.com/');

// DIR
define('DIR_ROOT', '/var/www/top/data/www/yes-tm.com/');
define('DIR_APPLICATION', DIR_ROOT.'admin/');
define('DIR_SYSTEM', DIR_ROOT.'system/');
define('DIR_IMAGE', DIR_ROOT.'image/');
define('DIR_LANGUAGE', DIR_APPLICATION.'language/');
define('DIR_TEMPLATE', DIR_APPLICATION.'view/template/');
define('DIR_CONFIG', DIR_SYSTEM.'config/');
define('DIR_STORAGE', DIR_SYSTEM.'storage/');
define('DIR_CACHE', DIR_STORAGE.'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE.'download/');
define('DIR_LOGS', DIR_STORAGE.'logs/');
define('DIR_MODIFICATION', DIR_STORAGE.'modification/');
define('DIR_UPLOAD', DIR_STORAGE.'upload/');
define('DIR_CATALOG', DIR_ROOT.'catalog/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'yestm_site');
define('DB_PASSWORD', 'JDcbuQmwfOCGMFls32Xl');
define('DB_DATABASE', 'yes_tm_dev');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');
define('DEBUG', false);
