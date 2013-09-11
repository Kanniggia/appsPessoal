<?php

class Default_MenuController extends Zend_Controller_Action {

  protected $_menuModel;

  public function init() {
    /* Initialize action controller here */
  }

  private function _obterTabelaPadrao() {
    if(null === $this->_menuModel){
      $this->_menuModel = new \Model\Default_Model_Menu();
    }
    return $this->_menuModel;
  }

  public function indexAction() {
    
  }
  
  public function menuAction(){
    $arrayMenu = array();
    $menuModel = $this->_obterTabelaPadrao();
    
    // Obtêm lista de todos os menus ativos
    $menu = $menuModel->obterMenu();
    
    foreach($menu as $funcionalidade){
      $arrayMenu[] = array(
          '' => $funcionalidade
      );
    }
  }

}

