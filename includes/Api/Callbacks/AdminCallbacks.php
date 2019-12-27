<?php

namespace Includes\Api\Callbacks;

use \Includes\Base\BaseController;

class AdminCallbacks extends BaseController
{
  public function adminDashboard()
  {
    return require_once("$this->plugin_path/templates/admin.php");
  }

  public function adminCPT()
  {
    return require_once("$this->plugin_path/templates/cpt.php");
  }

  public function adminTaxonomy()
  {
    return require_once("$this->plugin_path/templates/taxonomy.php");
  }

  public function adminGallery()
  {
    echo '<h1>Admin Gallery</h1>';
  }

  public function adminMediaWidget()
  {
    echo '<h1>Admin Media Widget</h1>';
  }

  public function adminTestimonial()
  {
    echo '<h1>Admin Testimonial</h1>';
  }

  public function adminTemplate()
  {
    echo '<h1>Admin Template</h1>';
  }

  public function adminAuth()
  {
    echo '<h1>Admin Auth</h1>';
  }

  public function adminMembership()
  {
    echo '<h1>Admin Membership</h1>';
  }

  public function adminChat()
  {
    echo '<h1>Admin Chat</h1>';
  }

  public function firstName()
  {
    $value = esc_attr(get_option('first_name'));
    echo '<input type="text" class="regular-text" id="first_name" name="first_name" value="' . $value . '" placeholder="First Name" />';
  }

  public function lastName()
  {
    $value = esc_attr(get_option('last_name'));
    echo '<input type="text" class="regular-text" id="last_name" name="last_name" value="' . $value . '" placeholder="Last Name" />';
  }
}
