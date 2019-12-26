<?php

namespace Includes\Base;

class Enqueue
{

  public function register()
  {
    // Loading external css and js files
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  public function enqueue()
  {
    // Enqueue all our scripts
    wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assets/style.css');
    wp_enqueue_script('mypluginscript', PLUGIN_URL . '/assets/scripts.js');
  }
}
