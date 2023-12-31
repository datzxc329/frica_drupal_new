Entity Model
======================

> Adds annotation-based entity type and bundle models for entities.

## Why?
Improve the developer experience of the [entity bundle classes functionality](https://www.drupal.org/node/3191609) 
by making it possible to register them through annotations and by providing field and translation related helper 
functions

## Installation

This package requires PHP 7.3 and Drupal 9.3 or higher. It can be installed using Composer:

```bash
 composer require drupal/entity_model
```

## How does it work?
### Creating models
Models are Drupal plugins with the `@Model` annotation, extending their entity type class. Classes with this
annotation should be placed in the `Entity` namespace of your module.

The annotation two required parameters:
- if only `entity_type` is provided, the entity type class is overridden using `hook_entity_type_alter`
- if both `entity_type` and `bundle` are provided, the bundle class is overridden using `hook_entity_bundle_info_alter`. 

```php
<?php

namespace Drupal\mymodule\Entity\Node;

use Drupal\node\Entity\Node;

/**
 * @Model(
 *     entity_type = "node",
 *     bundle = "page"
 * )
 */
class Page extends Node
{
}
```

To make sure bundles are mapped to the right classes, you can use the
`entity_model:list` Drush command.

```bash
> drush entity_model:list
 Model "media.image" is not mapped.
 Model "node.page" is mapped against "Drupal\mymodule\Entity\Node\Page".
```

### Controller resolving
If a controller is handling a route with entity parameters, the models
can be automatically injected in the arguments of the controller method
by using the right type hint. If the route has two parameters of the same type, 
matching is done based on the parameter/argument name.

This behaviour is enabled automatically for canonical entity route controllers.
It can be enabled manually for other routes by setting the `_enable_fuzzy_argument_resolving` 
option to a truthy value in your route definition.

```php
<?php

namespace Drupal\mymodule\Controller\Node;

use Drupal\mymodule\Entity\Node\Page;
use Drupal\wmcontroller\Controller\ControllerBase;

class PageController extends ControllerBase
{
    public function show(Page $page)
    {
        return $this->view(
            'node.page.detail',
            ['page' => $page]
        );
    }
}
```

### Injecting the user entity
This module provides an alternative implementation of
`Drupal\Core\Session\AccountProxyInterface` (returned by the
`current_user` service) that makes the `getAccount` method return the
actual User entity instead of an instance of `Drupal\Core\Session\UserSession`.

A Drupal core issue about this subject can be found [here](https://www.drupal.org/node/2345611).

To enable this feature, set `override_account_proxy` to `true` in the `entity_model.settings` config.

### Resolving `FormStateInterface` arguments
Drupal core only resolves form state arguments if the argument name matches `form_state`. This module provides the 
option to use the entity argument resolving logic as explained above for `FormStateInterface` arguments as well.

A Drupal core issue about this subject can be found [here](https://www.drupal.org/project/drupal/issues/3006502).

To enable this feature, set `resolve_form_state_argument_type` to `true` in the `entity_model.settings` config.

## Changelog
All notable changes to this project will be documented in the
[CHANGELOG](CHANGELOG.md) file.
