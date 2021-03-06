<?php

/**
 * FirstPlugin
 * 
 * @package FirstPlugin
 */

namespace Includes\Base;

class Activate
{
  public static function activate()
  {
    // Flush rewrite rules
    flush_rewrite_rules();

    if (get_option('first_plugin')) {
      return;
    }

    $default = [];

    update_option('first_plugin', $default);
  }
}
