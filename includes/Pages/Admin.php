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
    $args = [
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'cpt_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'taxonomy_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'media_widgets',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'gallery_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'testimonial_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'templates_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'login_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'membership_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ],
      [
        'option_group' => 'first_plugin_settings',
        'option_name' => 'chat_manager',
        'callback' => array($this->callbacks, 'checkboxSanitize')
      ]
    ];

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
    $args = [
      [
        'id' => 'cpt_manager',
        'title' => 'Activate CPT Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'cpt_manager',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'taxonomy_manager',
        'title' => 'Activate Taxonomy Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'taxonomy_manager',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'media_widgets',
        'title' => 'Activate Media Widgets',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'media_widgets',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'gallery_manager',
        'title' => 'Activate Gallery Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'gallery_manager',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'testimonial_manager',
        'title' => 'Activate Testimonial Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'testimonial_manager',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'templates_manager',
        'title' => 'Activate Template Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'templates_manager',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'login_manager',
        'title' => 'Activate Login Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'login_manager',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'membership_manager',
        'title' => 'Activate Membership Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'membership_manager',
          'class' => 'ui-toggle'
        ]
      ],
      [
        'id' => 'chat_manager',
        'title' => 'Activate Chat Manager',
        'callback' => array($this->callbacks_manager, 'checkboxField'),
        'page' => 'first_plugin',
        'section' => 'first_admin_index',
        'args' => [
          'label_for' => 'chat_manager',
          'class' => 'ui-toggle'
        ]
      ]
    ];

    $this->settings->setFields($args);
  }
}
