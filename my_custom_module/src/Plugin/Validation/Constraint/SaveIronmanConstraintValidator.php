<?php

namespace Drupal\my_custom_module\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the Save Ironman constraint.
 */
final class SaveIronmanConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate(mixed $value, Constraint $constraint): void {
    // @todo Validate the value here.
    if ($value != 'Yes') {
      $this->context->addViolation($constraint->message);
    }
  }

}
