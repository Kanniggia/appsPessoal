<?php

class Default_Bootstrap extends Zend_Application_Module_Bootstrap
{

    /**
     * Método responsável pelo autoload das classes do zend framework.
     *
     * @return Zend_Loader_Autoloader Retorna uma instancia do Zend_Application
     */
    protected function _initAutoload ()
    {
        $autoloader = new Zend_Application_Module_Autoloader(
            array(
                'basePath' => dirname(__FILE__),
                'namespace' => 'Default'
            )
        );

        return $autoloader;
    }
}
