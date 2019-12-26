<?php

namespace Includes;

final class Init
{
  /**
   * Store all the classes inside array
   * @return array Full list of class
   */
  public static function get_services()
  {
    return [
      Pages\Admin::class,
      Base\Enqueue::class
    ];
  }

  /**
   * Loop through all array of classes and initialize them
   * Call register if exists
   * @return
   */
  public static function register_services()
  {
    foreach (self::get_services() as $class) {
      $service = self::instantiate($class);
      if (method_exists($service, 'register')) {
        $service->register();
      }
    }
  }

  /**
   * Initialize the class
   * @param class $class class form service array
   * @return class instance new instance of class
   */
  private static function instantiate($class)
  {
    $service = new $class;

    return $service;
  }
}
