<?php

namespace Includes\Base;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;

class AuthController extends BaseController
{
  public $subpages = [];
  public $settings;
  public $callbacks;

  public function register()
  {
    if (!$this->activated('login_manager')) return;

    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

    $this->setSubpages();

    $this->settings->addSubPages($this->subpages)->register();
  }

  public function setSubpages()
  {
    $this->subpages = [
      [
        'parent_slug' => 'first_plugin',
        'page_title' => 'Auth Manager',
        'menu_title' => 'Auth Manager',
        'capability' => 'manage_options',
        'menu_slug' => 'login_manager',
        'callback' => array($this->callbacks, 'adminAuth')
      ],
    ];
  }
}
