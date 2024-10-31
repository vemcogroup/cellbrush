<?php

namespace Donquixote\Cellbrush\Columns;

trait ColumnAttributesTrait {

  use ColumnClassesTrait;

  function __constructColumnAttributes() {
    $this->__constructColumnClasses();
  }

  /**
   * @param string $colName
   * @param string $name
   * @param string $value
   *
   * @return $this
   */
  public function setColAttribute($colName, $name, $value) {
    $this->colAttributes->nameSetAttribute($colName, $name, $value);
    return $this;
  }

}
