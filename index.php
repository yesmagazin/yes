<?php
/**
 * Set language to Cookies by URL
 */
//if ( substr( $_REQUEST[ '_route_' ], 0, 3 ) == 'ru/' && $_COOKIE[ 'language' ] != 'ru' ) {
//    setcookie( 'language', 'ru' );
//} else if ( substr( $_REQUEST[ '_route_' ], 0, 3 ) == 'en/' && $_COOKIE[ 'language' ] != 'en' ) {
//    setcookie( 'language', 'en' );
//} else if ( $_COOKIE[ 'language' ] != 'ua' ) {
//    setcookie( 'language', 'ua' );
//}
// Version


define('VERSION', '2.3.0.2.1');

    function logg() {
        $a = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $s = "\n" . date('H:i:s');
        $s .= ' [[[' . $a[0]["line"] . ' @ ' . $a[0]["file"] . ']]] ' . "\n";
        if (isset($a[1]["line"]) && isset($a[2]["line"])) {
            $s .= ' (((' . $a[1]["line"] . ' @ ' . $a[1]["file"] . '))) ' . "\n";
        }
        if (isset($a[2]["line"]) && isset($a[3]["line"])) {
            $s .= ' (((' . $a[2]["line"] . ' @ ' . $a[2]["file"] . '))) ' . "\n";
        }

        $fname = $_SERVER['DOCUMENT_ROOT'] . '/_' . date('d-H') . '.log';
        if (func_num_args() > 0) {
            $arg_list = func_get_args();
            $i = 1;
            foreach ($arg_list as $v) {
                $s .= '{' . $i++ . '} ';
                if (is_null($v)) { $s .= 'NULL'; }
                elseif (is_bool($v)) { $s .= '(bool)' . ($v? 'True': 'False') . ''; }
                elseif (is_string($v)) { $s .= '(string)"' . $v . '"'; }
                elseif (is_array($v)) { $s .= '(array) ' . print_r($v, true) . ''; }
                else { $s .= print_r($v, true); }
                $s .= "\n";
            }
            $s .= " ---\n";
        }
        file_put_contents($fname, $s, FILE_APPEND);
    }

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Install
if (!defined('DIR_APPLICATION')) {
	header('Location: install/index.php');
	exit;
}

// VirtualQMOD
require_once('./vqmod/vqmod.php');
VQMod::bootup();

// VQMODDED Startup
require_once(VQMod::modCheck(DIR_SYSTEM . 'startup.php'));

start('catalog');

