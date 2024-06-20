<?php

declare(strict_types=1);

namespace Drupal\my_custom_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\ConfigTarget;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure My custom module settings for this site.
 */
final class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'my_custom_module_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['my_custom_module.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your name'),
      '#config_target' => 'my_custom_module.settings:username',
    ];
    $form['purpose'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Why do you need the infinity stones?'),
      '#config_target' => 'my_custom_module.settings:purpose',
    ];
    $form['future_plan'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Would you still go to work after using the infiity stones?'),
      '#config_target' => new ConfigTarget(
        'my_custom_module.settings',
        'future_plan',
        // Converts config value to a form value.
        fn ($value) => ($value == 'YES! I WILL CONTINUE TO EXPLORE THE UNIVERSE'),
        // Converts form value to a config value.
        fn ($value) => $value ? 'YES! I WILL CONTINUE TO EXPLORE THE UNIVERSE' : 'NO! I WILL DESTROY THE STONES, RETIRE, AND BECOME A FARMER',
      )
    ];
    $form['save_ironman'] = [
      '#title' => t("Doctor Strange has agreed to give you the Time Stone if you don't hurt Iron Man. What do you think?"),
      '#type' => 'radios',
      '#options' => [
        'Yes' => "It's a great deal!",
        'No' => "Seems suspicious!",
      ],
      '#config_target' => 'my_custom_module.settings:save_ironman'
    ];
    return parent::buildForm($form, $form_state);
  }

}
