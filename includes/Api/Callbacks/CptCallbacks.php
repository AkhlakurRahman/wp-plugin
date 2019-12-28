<?php

namespace Includes\Api\Callbacks;

class CptCallbacks
{
  public function cptSectionManager()
  {
    echo 'Manage your Custom Post Types';
  }

  public function cptSanitize($input)
  {
    return $input;
  }

  public function textFields($args)
  {
    $name = $args['label_for'];
    $option_name = $args['option_name'];
    $input = get_option($option_name);
    $value = $input[$name];

    echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="' . $value . '" placeholder="' . $args['placeholder'] . '">';
  }

  public function checkboxField($args)
  {
    $name = $args['label_for'];
    $class = $args['class'];
    $option_name = $args['option_name'];
    $checkbox = get_option($option_name);

    $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

    echo '<div class="' . $class . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
  }
}
