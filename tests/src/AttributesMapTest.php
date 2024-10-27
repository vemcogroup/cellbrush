<?php

namespace Donquixote\Cellbrush\Tests;

use Donquixote\Cellbrush\Html\Multiple\StaticAttributesMap;
use PHPUnit\Framework\TestCase;

class AttributesMapTest extends TestCase {

  function testMerge() {
    $a = StaticAttributesMap::create(
      ['c0' => ['id' => 'c0id']],
      ['c0' => ['c0class' => 'c0class']]);
    $b = StaticAttributesMap::create(
      ['c0' => ['id' => 'c0id_b']],
      ['c0' => ['c0class_b' => 'c0class_b']]);
    $merged = $a->merge($b);
    $this->assertSame(
      ' id="c0id" class="c0class c0class_b"',
      $merged->nameGetAttributes('c0')->renderAttributes());
  }
}
