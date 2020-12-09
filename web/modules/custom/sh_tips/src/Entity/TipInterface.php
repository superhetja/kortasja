<?php
namespace Drupal\sh_tips\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Represents a Product entity.
 */
interface TipInterface extends ContentEntityInterface, EntityChangedInterface {
  /**
   * Gets tip name
   *
   * @return string
   */
  public function getName();

  /**
   * Sets tip name
   *
   * @param string $name
   *
   * @return \Drupal\sh_tips\Entity\TipInterface
   */
  public function setName($name);

  /**
   *
   * Sets tip location
   *
   * @param string $location
   *
   * @return \Drupal\sh_tips\Entity\TipInterface
   */
  public function setLocation($location);

  /**
   * Gets tip location
   *
   * @returns string
   */
  public function getLocation();

  /**
   * Gets the Tip creation timestamp. *
   * @return int
   */
  public function getCreatedTime();

  /**
   * Sets the Tip creation timestamp.
   *
   * @param int $timestamp
   *
   * @return \Drupal\sh_tips\Entity\TipInterface * The called Product entity.
   */
  public function setCreatedTime($timestamp);

}
