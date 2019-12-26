<?php

/**
 * @package FirstPlugin
 */

namespace Includes\Base;

use \Includes\Base\BaseController;

class Enqueue extends BaseController
{

  public function register()
  {
    // Loading external css and js files
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  public function enqueue()
  {
    // Enqueue all our scripts
    wp_enqueue_style('mypluginstyle', $this->plugin_url . '/assets/style.css');
    wp_enqueue_script('mypluginscript', $this->plugin_url . '/assets/scripts.js');
  }
}
