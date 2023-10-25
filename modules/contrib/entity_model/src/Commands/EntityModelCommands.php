<?php

namespace Drupal\entity_model\Commands;

use Drupal\Core\Entity\ContentEntityTypeInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\entity_model\ModelPluginManager;
use Drush\Commands\DrushCommands;

/**
 * Drush commands for the Entity Model module.
 */
class EntityModelCommands extends DrushCommands {

  use StringTranslationTrait;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The entity model plugin manager.
   *
   * @var \Drupal\entity_model\ModelPluginManager
   */
  protected $pluginManager;

  /**
   * Constructs a new EntityModelCommands instance.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\entity_model\ModelPluginManager $plugin_manager
   *   The entity model plugin manager.
   */
  public function __construct(
    EntityTypeManagerInterface $entity_type_manager,
    ModelPluginManager $plugin_manager
  ) {
    $this->entityTypeManager = $entity_type_manager;
    $this->pluginManager = $plugin_manager;
  }

  /**
   * List all bundles and their mapping.
   *
   * @command entity_model:list
   * @aliases model-list,eml
   */
  public function listModels() {
    foreach ($this->entityTypeManager->getDefinitions() as $entityType) {
      if (!$bundleEntityType = $entityType->getBundleEntityType()) {
        continue;
      }

      if (!$entityType instanceof ContentEntityTypeInterface) {
        continue;
      }

      $bundles = $this->entityTypeManager
        ->getStorage($bundleEntityType)
        ->getQuery()
        ->execute();

      foreach ($bundles as $bundle) {
        $id = implode('.', [$entityType->id(), $bundle]);

        if ($this->pluginManager->hasDefinition($id)) {
          $message = $this->t('Model "@model" is mapped against "@mapping".', [
            '@model' => $id,
            '@mapping' => $this->pluginManager->getDefinition($id)['class'],
          ]);
        }
        else {
          $message = $this->t('Model "@model" is not mapped.', [
            '@model' => $id,
          ]);
        }

        $this->io()->text($message);
      }
    }
  }

}
