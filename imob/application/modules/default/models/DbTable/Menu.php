<?php

namespace DbTable;

class Model_DbTable_Menu extends Zend_Db_Table_Abstract {

  protected $_schema = 'administrativo';
  protected $_name = 'menu';
  protected $_dependentTables = array('menu');
  protected $_referenceMap = arraY(
      'Menu' => array(
          'columns' => 'idPaiMenu',
          'refTableClass' => 'Menu',
          'refColumns' => array('idMenu'),
          'onDelete' => self::CASCADE,
          'onUpdate' => self::CASCADE
      )
  );
  
}

