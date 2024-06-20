<?php

declare(strict_types=1);

namespace Drupal\my_custom_module\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides a Save Ironman constraint.
 *
 * @Constraint(
 *   id = "SaveIronman",
 *   label = @Translation("Save Ironman", context = "Validation"),
 * )
 */
final class SaveIronmanConstraint extends Constraint {

  public string $message = 'Accept the deal. If Iron man wants to stop me, he should build a time machine which is IMPOSSIBLE.';

}
