<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function cts_demo_preprocess_html(&$variables, $hook) {
  
  // Retrieving skin option selected in theme settings
  $site_flavor = theme_get_setting('site_flavor');
  $variables['classes_array'][] = 'cts-skin-' . $site_flavor;
  
  // Add some fonts
  drupal_add_css('https://fonts.googleapis.com/css?family=Roboto:300,400,700,400italic,700italic,300italic','external');
  drupal_add_css('https://fonts.googleapis.com/css?family=Roboto+Slab:400,700','external');

}

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 * @TODO: gt_tools check doesn't work properly with overlay turned on.
 */
function cts_demo_preprocess_page(&$variables, $hook) {
  
  // Set a theme path variable
  $variables['cts_demo_theme_path'] = base_path() . drupal_get_path('theme', 'cts_demo');
  
  /**
   * Below is where we set the variables based on our custom theme settings selections, 
   * which are used in the page.tpl.php file. 
   *
   */
   
  // Retrieve the Division selection from the theme settings, 
  // and set the variable with the appropriate text.
  $division_id = theme_get_setting('division_id');
  switch ($division_id) {
    case 0:
      $variables['division_id'] = 'Divison of Leprechaun Arbitration';
      break;
    case 1:
      $variables['division_id'] = 'Divison of Sugar Procurement';
      break;
    case 2:
      $variables['division_id'] = 'Divison of Marshmallow Engineering';
      break;
    default:
      $variables['division_id'] = 'Divison of Leprechaun Arbitration';
  }
  
  // Retrieve the Territory selection from the theme settings, 
  // and set the variable with the appropriate text.
  $division_id = theme_get_setting('territory_id');
  switch ($division_id) {
    case 0:
      $variables['territory_id'] = 'Northeastern United States Territory';
      break;
    case 1:
      $variables['territory_id'] = 'Southeastern United States Territory';
      break;
    case 2:
      $variables['territory_id'] = 'Southwestern United States Territory';
      break;
    default:
      $variables['territory_id'] = 'Northeastern United States Territory';
  }
  
  // Retrieve the main menu location selection from the theme settings, 
  // and set the variable with the appropriate text.
  $main_menu_location = theme_get_setting('main_menu_location');
  switch ($main_menu_location) {
    case 0:
      $variables['main_menu_location'] = 'top';
      break;
    case 1:
      $variables['main_menu_location'] = 'sidebar';
      break;
    default:
      $variables['main_menu_location'] = 'top';
  }
  
  // Check whether or not they've opted to include a leprechaun mascot
  $leprechaun_mascot = theme_get_setting('leprechaun_mascot');
  if ($leprechaun_mascot != '') {
    $variables['leprechaun_mascot'] = $leprechaun_mascot;
    $leprechaun_mascot_style = theme_get_setting('leprechaun_mascot_style');
    $variables['leprechaun_mascot_style'] = $leprechaun_mascot_style;
  } else {
    $variables['leprechaun_mascot'] = FALSE;
  }
  
}
