<?php

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
  public $settings;
  public $pages;
  public $subpages;
  public $callbacks;
  public $callbacks_manager;

  public function register()
  {
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();
    $this->callbacks_manager = new ManagerCallbacks();

    $this->setPages();
    $this->setSubpages();

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
  }

  public function setPages()
  {
    $this->pages = [
      [
        'page_title' => 'First Plugin',
        'menu_title' => 'First Plugin',
        'capability' => 'manage_options',
        'menu_slug' => 'first_plugin',
        'callback' => array($this->callbacks, 'adminDashboard'),
        'icon_url' => 'dashicons-store',
        'position' => 110
      ]
    ];
  }

  public function setSubpages()
  {
    $this->subpages = [
      [
        'parent_slug' => 'first_plugin',
        'page_title' => 'Custom Post Type',
        'menu_title' => 'CPT',
        'capability' => 'manage_options',
        'menu_slug' => 'first_cpt',
        'callback' => array($this->callbacks, 'adminCPT')
      ],
      [
        'parent_slug' => 'first_plugin',
        'page_title' => 'Custom Taxonomies',
        'menu_title' => 'Taxonomies',
        'capability' => 'manage_options',
        'menu_slug' => 'first_taxonomies',
        'callback' => array($this->callbacks, 'adminTaxonomy')
      ],
      [
        'parent_slug' => 'first_plugin',
        'page_title' => 'Custom Widgets',
        'menu_title' => 'Widgets',
        'capability' => 'manage_options',
        'menu_slug' => 'first_widgets',
        'callback' => array($this->callbacks, 'adminWidget')
      ]
    ];
  }

  public function setSettings()
  {
    $args = [];

    foreach ($this->managers as $key => $value) {
      $args[] = [
        'option_group' => 'first_plugin_settings',
        'option_name' => $key,
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ];
    }

    $this->settings->setSettings($args);
  }

  public function setSections()
  {
    $args = [
      [
        'id' => 'first_admin_index',
        'title' => 'Settings Manager',
        'callback' => array($this->callbacks_manager, 'adminSectionManager'),
        'page' => 'first_plugin'
      ]
    ];

    $this->settings->setSections($args);
  }

  public function setFields()
  {
    $args = [];

    foreach ($this->managers as $key => $value) {
      $args[] = [
        'id' => $key,
        'title' => $value,
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => $key,
          'class' => 'ui-toggle'
        ]
      ];
    }

    $this->settings->setFields($args);
  }
}
