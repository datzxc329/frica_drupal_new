<?php

namespace Drupal\employee\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\employee\Model\EmployeeModels;

/**
 * Returns responses for employee routes.
 */
class EmployeeController extends ControllerBase
{

    /**
     * Builds the response.
     */
    public function list(): array
    {
        $employeeModels = new EmployeeModels();
        return [
            '#theme' => 'employee_list',
            '#data' => [
                'employee' => $employeeModels->getListEmployee()
            ],
            '#attached' => [
                'library' => [
                    'employee/list',
                ],
            ],
            '#cache' => array(
                'max-age' => 0
            )
        ];
    }
}

