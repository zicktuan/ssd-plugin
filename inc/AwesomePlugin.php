<?php

namespace Awesome;

/**
 * @author lookawesome team
 * @version 1.0
 * @package MayXayDung
 * 
 * Init plugin for theme awesome
*/
class AwesomePlugin
{
    static $getInstance = null;

    public $version = '1.0';

    public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }
        return self::$getInstance;
    }

    protected function __construct(){
        $this->loadModule();

        $this->init();
    }

    public function init(){

        do_action('awesome_before_init');

        new PostType\PostTypeInit;
        new Taxonomies\TaxonomiesInit;

        $this->themeSetting();

        if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $this->shortcode = new Shortcode\ShortcodeInit;
        }

        $this->widgets = new Widgets\InitWidget;

        do_action('awesome_after_init');
    }

    public function themeSetting(){
        $this->themeSetting = new ThemeSettings\ThemeSettingInit;
    }

    /**
     * load_module.
     * Load module for awesome.
     */
    protected function loadModule()
    {
        require_once 'Autoload/AwesomeAutoload.php';

        do_action('awesome_load_module');
       
        AwesomeAutoload::getInstance();
    }
}

function AwesomePlugin(){
    return AwesomePlugin::getInstance();
}

$GLOBALS['awesomePlugin'] = AwesomePlugin();