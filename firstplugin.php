<?php

/**
 * Plugin Name: First Plugin
 * Plugin URI:  https://github.com/firstplugin
 * Description: My first plugin for practice
 * Author: Akhlakur Rahman
 * Author URI:  https://akrahman.me
 * Version: 1.0.0
 * Text Domain: first-plugin
 *
 */

/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright 2019 Akhlakur Rahman. All rights reserved.
 */

if (!defined('ABSPATH')) {
  exit;
}

class FirstPlugin
{
  public function __construct()
  {
    add_action('init', array($this, 'custom_post_type'));
  }

  public function register()
  {
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  public function activate()
  {
    // Generate a Custom Post Type
    $this->custom_post_type();

    // Flush rewrite rules
    flush_rewrite_rules();
  }

  public function deactivate()
  {
    flush_rewrite_rules();
  }

  protected function enqueue()
  {
    // Enqueue all our scripts
    wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
  }

  // static function uninstall()
  // {

  // }

  public function custom_post_type()
  {
    register_post_type('book', ['public' => true, 'label' => 'Books']);
  }
}

if (class_exists('FirstPlugin')) {
  $firstPlugin = new FirstPlugin();
  $firstPlugin->register();
}

// activation
register_activation_hook(__FILE__, array($firstPlugin, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($firstPlugin, 'deactivate'));

// uninstall
// register_uninstall_hook(__FILE__, FirstPlugin::uninstall());
