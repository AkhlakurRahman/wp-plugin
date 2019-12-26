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

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
  require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (class_exists('Includes\\Init')) {
  Includes\Init::register_services();
}
