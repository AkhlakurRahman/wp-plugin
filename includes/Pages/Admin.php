<?php

namespace Includes\Pages;

use \Includes\Base\BaseController;
use \Includes\Api\SettingsApi;

class Admin extends BaseController
{
  public $settings;
  public $pages;
  public $subpages;

  public function __construct()
  {
    $this->settings = new SettingsApi();

    $this->pages = [
      [
        'page_title' => 'First Plugin',
        'menu_title' => 'First Plugin',
        'capability' => 'manage_options',
        'menu_slug' => 'first_plugin',
        'callback' => function () {
          echo '<h1>First PPlugin</p>';
        },
        'icon_url' => 'dashicons-store',
        'position' => 110
      ]
    ];

    $this->subpages = [
      [
        'parent_slug' => 'first_plugin',
        'page_title' => 'First Subpage',
        'menu_title' => 'First Subpage',
        'capability' => 'manage_options',
        'menu_slug' => 'first_subpage',
        'callback' => function () {
          echo '<h1>First Subpage</p>';
        }
      ]
    ];
  }

  public function register()
  {
    // Adding menu for our plugin
    // add_action('admin_menu', array($this, 'add_admin_pages'));

    $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
  }

  // public function add_admin_pages()
  // {
  //   add_menu_page('First Plugin', 'First Plugin', 'manage_options', 'first_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
  // }

  // public function admin_index()
  // {
  //   require_once $this->plugin_path . 'templates/admin.php';
  // }
}
