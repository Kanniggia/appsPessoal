<?php

namespace Model;

class Default_Model_Menu {

  protected $_table;

  /*
   * 
   */

  private function _obterTabela() {
    if (null === $this->_table) {
      $this->_table = new \DbTable\Model_DbTable_Menu();
    }

    return $this->_table;
  }

  /*
   * 
   */

  public function salvar(array $dados) {
    $tabela = $this->_obterTabela();

    $colunas = $tabela->info(Zend_Db_Table_Abstract::COLS);

    foreach ($dados as $coluna => $valor) {
      if (!in_array($coluna, $colunas)) {
        unset($dados[$coluna]);
      }
    }
    return $tabela->insert($dados);
  }

  /*
   * 
   */

  public function obterMenu() {
    return $this->_obterTabela()->fetchAll('1')->toArray();
  }

  /*
   * 
   */

  public function obterMenuPorId($id) {
    $table = $this->_obterTabela();

    $select = $table->select()->where('idMenu = ?', $id)->order(array('nuOrdemMenu'));

    return $table->fetchRow($select)->toArray();
  }

}

