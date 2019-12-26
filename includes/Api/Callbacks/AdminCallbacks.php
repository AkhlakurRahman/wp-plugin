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

  public function adminWidget()
  {
    return require_once("$this->plugin_path/templates/widget.php");
  }

  public function firstOptionsGroup($input)
  {
    return $input;
  }

  public function firstAdminSection()
  {
    echo 'Check this out!';
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
