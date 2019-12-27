<?php

/**
 * @package FirstPlugin
 */

namespace Includes\Base;

class BaseController
{
  public $plugin_path;
  public $plugin_url;
  public $plugin;
  public $managers = array();

  public function __construct()
  {
    $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
    $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
    $this->plugin = plugin_basename(dirname(__FILE__, 3) . '/firstplugin.php');

    $this->managers = [
      'cpt_manager' => 'Activate CPT Manager',
      'taxonomy_manager' => 'Activate Taxonomy Manager',
      'media_widgets' => 'Activate Media Widgets',
      'gallery_manager' => 'Activate Gallery Manager',
      'testimonial_manager' => 'Activate Testimonial Manager',
      'templates_manager' => 'Activate Template Manager',
      'login_manager' => 'Activate Login Manager',
      'membership_manager' => 'Activate Membership Manager',
      'chat_manager' => 'Activate Chat Manager'
    ];
  }

  public function activated($key)
  {
    $option = get_option('first_plugin');
    $activated = isset($option[$key]) ? $option[$key] : false;
    return $activated;
  }
}
