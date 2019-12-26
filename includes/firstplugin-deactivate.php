<?php

/**
 * FirstPlugin
 * 
 * @package FirstPlugin
 */

class FirstPluginDeactivate
{
  public static function deactivate()
  {
    // Flush rewrite rules
    flush_rewrite_rules();
  }
}
