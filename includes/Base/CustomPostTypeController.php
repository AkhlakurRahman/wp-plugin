<?php

namespace Includes\Base;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{
  public $subpages = [];
  public $settings;
  public $callbacks;

  public function register()
  {
    $option = get_option('first_plugin');
    $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

    if (!$activated) return;

    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

    $this->setSubpages();

    $this->settings->addSubPages($this->subpages)->register();

    add_action('init', array($this, 'activate'));
  }

  public function setSubpages()
  {
    $this->subpages = [
      [
        'parent_slug' => 'first_plugin',
        'page_title' => 'Custom Post Type',
        'menu_title' => 'CPT Manager',
        'capability' => 'manage_options',
        'menu_slug' => 'first_cpt',
        'callback' => array($this->callbacks, 'adminCPT')
      ],
    ];
  }

  public function activate()
  {
    register_post_type('first_plugin', array(
      'labels' => array(
        'name' => 'Products',
        'singular_name' => 'Product'
      ),
      'public' => true,
      'has_archive' => true
    ));
  }
}
