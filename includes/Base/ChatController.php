<?php

namespace Includes\Base;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;

class ChatController extends BaseController
{
  public $subpages = [];
  public $settings;
  public $callbacks;

  public function register()
  {
    if (!$this->activated('chat_manager')) return;

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
        'page_title' => 'Chat Manager',
        'menu_title' => 'Chat Manager',
        'capability' => 'manage_options',
        'menu_slug' => 'chat_manager',
        'callback' => array($this->callbacks, 'adminChat')
      ],
    ];
  }
}
