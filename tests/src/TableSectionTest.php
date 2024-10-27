<?php

namespace Donquixote\Cellbrush\Tests;

use Donquixote\Cellbrush\Axis\DynamicAxis;
use Donquixote\Cellbrush\Html\Multiple\StaticAttributesMap;
use Donquixote\Cellbrush\TSection\TableSection;

class TableSectionTest extends \PHPUnit_Framework_TestCase {

  function testRegularTable() {
    $columns = new DynamicAxis();
    $columns->addNames(['c0', 'c1', 'c2']);
    $tsection = new TableSection('tbody');
    $tsection->addRow('r0')
      ->td('c0', '00')
      ->td('c1', '01')
      ->td('c2', '02')
    ;
    $tsection->addRow('r1')
      ->td('c0', '10')
      ->td('c1', '11')
      ->td('c2', '12')
    ;
    $tableColAttributes = StaticAttributesMap::create([], []);
    $output = $tsection->render($columns->takeSnapshot(), $tableColAttributes);
    $this->assertSame(
      <<<'EOT'
  <tbody>
    <tr><td>00</td><td>01</td><td>02</td></tr>
    <tr><td>10</td><td>11</td><td>12</td></tr>
  </tbody>

EOT,
      $output);
  }

}
