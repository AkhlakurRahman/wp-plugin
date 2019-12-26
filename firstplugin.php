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
  public $plugin;

  public function __construct()
  {
    $this->plugin = plugin_basename(__FILE__);
  }

  public function register()
  {
    // Loading external css and js files
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));

    // Adding menu for our plugin
    add_action('admin_menu', array($this, 'add_admin_pages'));

    // Adding settings for our plugin
    add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
  }

  public function settings_link($links)
  {
    $settings_link = '<a href="admin.php?page=first_plugin">Settings</a>';
    // Adding custom links
    array_push($links, $settings_link);
    return $links;
  }

  public function add_admin_pages()
  {
    add_menu_page('First Plugin', 'First Plugin', 'manage_options', 'first_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
  }

  public function admin_index()
  {
    require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
  }

  protected function create_post_type()
  {
    add_action('init', array($this, 'custom_post_type'));
  }

  public function enqueue()
  {
    // Enqueue all our scripts
    wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
    wp_enqueue_script('mypluginscript', plugins_url('/assets/scripts.js', __FILE__));
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
require_once plugin_dir_path(__FILE__) . 'includes/firstplugin-activate.php';
register_activation_hook(__FILE__, array('FirstPluginActivate', 'activate'));

// deactivation
require_once plugin_dir_path(__FILE__) . 'includes/firstplugin-deactivate.php';
register_deactivation_hook(__FILE__, array('FirstPluginDeactivate', 'deactivate'));

// uninstall
// register_uninstall_hook(__FILE__, FirstPlugin::uninstall());
