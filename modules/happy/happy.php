<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Happy extends Module
{
    public function __construct()
    {
        $this->name = 'happy';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Nicolas Touzard';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Happy');
        $this->description = $this->l('An example module.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('leftColumn') && $this->registerHook('actionFrontControllerSetMedia');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookLeftColumn()
    {
        $this->context->smarty->assign([
            'user' =>  'Happy',
            'link' => $this->context->link->getModuleLink('happy', 'display')
        ]);

        return $this->display(__FILE__, 'happy.tpl');
    }


    public function hookActionFrontControllerSetMedia()
    {
        $this->context->controller->registerStylesheet(
            'happy-css',
            'modules/' . $this->name . '/views/css/happy.css'
        );
        $this->context->controller->registerJavascript(
            'happy-js',
            'modules/' . $this->name . '/views/js/happy.js'
        );
    }
}
