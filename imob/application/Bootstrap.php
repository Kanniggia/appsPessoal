<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

  protected function _initDoctype() {
    $this->bootstrap('view');
    $view = $this->getResource('view');
    $view->doctype('XHTML1_STRICT');
  }

  protected function _initError() {
    $front = Zend_Controller_Front::getInstance();
    $front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array(
        'module' => 'default',
        'controller' => 'error',
        'action' => 'error'
    )));
  }

  protected function _initNavigation() {
    $this->bootstrap('layout');
    $layout = $this->getResource('layout');
    $view = $layout->getView();
//    $config = new Zend_Config_Ini(APPLICATION_PATH . '/navigation/menuHome.ini');
    $navigation = new Zend_Navigation();
    $view->navigation($navigation);
  }

  protected function _initRequest() {
    // Registrando o arquivo de configuração Application.ini
    $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
    Zend_Registry::set('config', $config);

    // Configurando o adaptador de banco de dados para conexão
    $dbAdapter = Zend_Db::factory(
            $config->imob->database->adapter, 
            $config->imob->database->params->toArray()
    );
    
    Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
  }

  protected function _initViewHelpers() {
    // Obtendo a view do layout
    $this->bootstrap('layout');
    $layout = $this->getResource('layout');
    $view = $layout->getView();

    // Adicionar Propriedades da Página
    $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');

    // Adicionar Título
    $view->headTitle('Imobiliária')->setSeparator(' - ');

    // Adicionar Folhas de Estilos
    $view->headLink()
            ->prependStylesheet('js/bootstrap/css/bootstrap.css')
            ->prependStylesheet('/css/layout/principal.css');

    // Adicionar Bibliotecas JavaScript
    $view->headScript()
            ->appendFile('js/bootstrap/js/bootstrap.js', "text/javascript")
            ->appendFile('js/layout/layout.js', "text/javascript");

    // Adicionar Biblioteca JQuery
    $view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
    $view->jQuery()
            ->setLocalPath('/js/jquery/js/jquery-1.8.3.js')
            ->setUiLocalPath('/js/jquery/js/jquery-ui-1.9.2.custom.js')
            ->addStylesheet('/js/jquery/css/ui-darkness/jquery-ui-1.9.2.custom.css')
            ->enable()
            ->uiEnable();
  }

}