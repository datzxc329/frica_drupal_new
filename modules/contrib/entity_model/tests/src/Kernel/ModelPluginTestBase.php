<?php

namespace Drupal\Tests\entity_model\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\entity_model\ModelPluginManager;

/**
 * A base class for entity model plugin tests.
 */
abstract class ModelPluginTestBase extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'node',
    'system',
    'user',
    'entity_model',
  ];

  /**
   * The entity model plugin manager.
   *
   * @var \Drupal\entity_model\ModelPluginManager
   */
  protected $pluginManager;

  /**
   * The node type.
   *
   * @var \Drupal\node\Entity\NodeTypeInterface
   */
  protected $nodeType;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->pluginManager = $this->getMockBuilder(ModelPluginManager::class)
      ->disableOriginalConstructor()
      ->getMock();
    $this->pluginManager->expects($this->any())
      ->method('getDefinitions')
      ->willReturn([
        [
          'entity_type' => 'node',
          'bundle' => 'node_mock',
          'class' => NodeMock::class,
        ],
      ]);
    $this->container->set('plugin.manager.entity_model.model', $this->pluginManager);

    $this->nodeType = NodeType::create(['type' => 'node_mock']);
    $this->nodeType->save();
  }

}

/**
 * An example node model class.
 */
class NodeMock extends Node {
}
