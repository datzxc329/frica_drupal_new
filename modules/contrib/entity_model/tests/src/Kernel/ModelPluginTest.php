<?php

namespace Drupal\Tests\entity_model\Kernel;

use Drupal\node\Entity\Node;

/**
 * Tests the bundle-specific classes functionality.
 *
 * @group entity_model
 */
class ModelPluginTest extends ModelPluginTestBase {

  /**
   * Tests whether the entity uses the bundle-specific class.
   */
  public function testLoadBundleModel(): void {
    $node = Node::create(['type' => 'node_mock']);

    self::assertInstanceOf(NodeMock::class, $node, 'The entity does not use the bundle-specific class');
  }

}
