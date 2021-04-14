<?php

class HappyDisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $sql = new dbQuery();
        $sql->select('COUNT(*)')->from('product');

        $this->context->smarty->assign([
        
            'user' => $this->context->customer->firstname,
            'number' => Db::getInstance()->getValue($sql)
        ]);

        $this->setTemplate('module:happy/views/templates/front/display.tpl');
    }
}