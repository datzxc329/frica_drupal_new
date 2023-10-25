<?php

namespace Drupal\employee\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\employee\Model\EmployeeModels;

/**
 * Provides a employee form.
 */
class EmployeeForm extends FormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId(): string
    {
        return 'employee_employee';
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        $id = \Drupal::routeMatch()->getParameter('id');
        $employeeModels = new EmployeeModels();
        $employee = $employeeModels->getDetailEmployee($id);
        $form['id'] = [
            '#type' => 'hidden',
            '#value' => $employee->id ?? null,
        ];
        $form['emp_firstname'] = [
            '#type' => 'textfield',
            '#title' => $this->t('First Name'),
            '#required' => TRUE,
            '#maxlength' => 30,
            '#default_value' => $employee->emp_firstname ?? null,
        ];
        $form['emp_lastname'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Last Name'),
            '#required' => TRUE,
            '#maxlength' => 30,
            '#default_value' => $employee->emp_lastname ?? null,
        ];
        $form['emp_email'] = [
            '#type' => 'email',
            '#title' => $this->t('Employee Email'),
            '#required' => TRUE,
            '#maxlength' => 100,
            '#default_value' => $employee->emp_email ?? null,
        ];
        $form['emp_zipcode'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Employee ZIP code'),
            '#required' => TRUE,
            '#maxlength' => 6,
            '#default_value' => $employee->emp_zipcode ?? $form_state->getValue('emp_zipcode'),
        ];
        $form['actions'] = [
            '#type' => 'actions',
        ];
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save'),
        ];
        return $form;
    }
    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state): void
    {
        $formField = $form_state->getValues();
        $firstName = trim($formField['emp_firstname']);
        $lastName = trim($formField['emp_lastname']);
        $email = trim($formField['emp_email']);
        //$phone = $formField['emp_phone'];
        $zipcode = trim($formField['emp_zipcode']);
        if (!preg_match("/^([a-zA-Z0-9']+)$/", $firstName)) {
            $form_state->setErrorByName('emp_firstname', $this->t('Enter the valid first name'));
        }

        if (!preg_match("/^([a-zA-Z0-9']+)$/", $lastName)) {
            $form_state->setErrorByName('emp_lastname', $this->t('Enter the valid last name'));
        }

        if (!\Drupal::service('email.validator')->isValid($email)) {
            $form_state->setErrorByName('emp_email', $this->t('Enter valid email address'));
        }
        /*if (!preg_match("/^+[0]([0-9]{2})([0-9]{3})([0-9]{4})$/", $phone)){
            $form_state->setErrorByName('emp_phone', $this->t('Enter the valid phone'));
        }*/
        if (!preg_match("/^\d{1,6}$/", $zipcode)) {
            $form_state->setErrorByName('emp_zipcode', $this->t('Enter the valid zip code'));
        }
    }
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state): void
    {
        $employeeModels = new EmployeeModels();
        $formField = $form_state->getValues();

        $formData['emp_firstname'] = $formField['emp_firstname'];
        $formData['emp_lastname'] = $formField['emp_lastname'];
        $formData['emp_email'] = $formField['emp_email'];
        $formData['emp_zipcode'] = $formField['emp_zipcode'];
        if (!empty($formField['id'])) {
            $formData['id'] = $formField['id'];
            $employeeModels->update($formData);
        } else {
            $employeeModels->insert($formData);
        }
        $this->messenger()->addStatus($this->t('Employee data has been saved successfully.'));
        $form_state->setRedirect('employee.list');
    }
}
