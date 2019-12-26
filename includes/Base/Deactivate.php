<?php

/**
 * FirstPlugin
 * 
 * @package FirstPlugin
 */

namespace Includes\Base;

class Deactivate
{
  public static function deactivate()
  {
    // Flush rewrite rules
    flush_rewrite_rules();
  }
}
