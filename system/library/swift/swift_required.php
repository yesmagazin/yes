<?php
if (class_exists('Swift', false)) {
    return;
}
require dirname(__FILE__) . '/classes/Swift.php';
if (!function_exists('_swiftmailer_init')) {
    function _swiftmailer_init()
    {
        require dirname(__FILE__) . '/swift_init.php';
    }
}
Swift::registerAutoload('_swiftmailer_init');

class SWFT{
    private static $instance;
    public static function I(){
        if(!self::$instance){
            self::$instance = Swift_Mailer::newInstance(Swift_SmtpTransport::newInstance());
        }
        return self::$instance;
    }
}