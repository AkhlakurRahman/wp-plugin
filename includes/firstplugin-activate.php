<?php

/**
 * FirstPlugin
 * 
 * @package FirstPlugin
 */

class FirstPluginActivate
{
  public static function activate()
  {
    // Flush rewrite rules
    flush_rewrite_rules();
  }
}
