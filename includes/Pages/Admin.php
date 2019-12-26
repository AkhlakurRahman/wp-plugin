<?php

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
  public $settings;
  public $pages;
  public $subpages;
  public $callbacks;

  public function register()
  {
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

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
    $args = [
      [
        'option_group' => 'first_options_group',
        'option_name' => 'first_name',
        'callback' => array($this->callbacks, 'firstOptionsGroup')
      ],
      [
        'option_group' => 'first_options_group',
        'option_name' => 'last_name'
      ]
    ];

    $this->settings->setSettings($args);
  }

  public function setSections()
  {
    $args = [
      [
        'id' => 'first_admin_index',
        'title' => 'Settings',
        'callback' => array($this->callbacks, 'firstAdminSection'),
        'page' => 'first_plugin'
      ]
    ];

    $this->settings->setSections($args);
  }

  public function setFields()
  {
    $args = [
      [
        'id' => 'first_name',
        'title' => 'First Name',
        'callback' => array($this->callbacks, 'firstName'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'first_name',
          'class' => 'example-class'
        ]
      ],
      [
        'id' => 'last_name',
        'title' => 'Last Name',
        'callback' => array($this->callbacks, 'lastName'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'last_name',
          'class' => 'example-class'
        ]
      ]
    ];

    $this->settings->setFields($args);
  }
}
