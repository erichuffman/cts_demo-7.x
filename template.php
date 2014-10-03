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
  $site_skin = theme_get_setting('site_skin');
  if ($site_skin != '') {
    $variables['classes_array'][] = 'cts-skin-' . $site_skin;
  } else {
    $variables['classes_array'][] = 'cts-skin-blank';
  }
  
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
  
  // Retrieve the Division ID selection from the theme settings
  $division_id = theme_get_setting('division_id');
  if ($division_id != '') {
    $variables['division_id'] = $division_id;
  } else {
    $variables['division_id'] = 'NO DIVISION ID !';
  }
  
  // Retrieve the territory ID selection from the theme settings
  $territory_id = theme_get_setting('territory_id');
  if ($territory_id != '') {
    $variables['territory_id'] = $territory_id;
  } else {
    $variables['territory_id'] = 'NO TERRITORY ID !';
  }
  
  // Retrieve the main menu location from the theme settings
  $main_menu_location = theme_get_setting('main_menu_location');
  if ($main_menu_location != '') {
    $variables['main_menu_location'] = $main_menu_location;
  } else {
    $variables['main_menu_location'] = 'no-location';
  }
  
  // Check whether or not they've opted to include a leprechaun logo
  $leprechaun_mascot = theme_get_setting('leprechaun_mascot');
  if ($leprechaun_mascot != '') {
    $variables['leprechaun_mascot'] = $leprechaun_mascot;
  } else {
    $variables['leprechaun_mascot'] = FALSE;
  }
  
  // Get the chosen leprechaun mascot style if they've opted to include a mascot
  $leprechaun_mascot_style = theme_get_setting('leprechaun_mascot_style');
  if ($leprechaun_mascot_style != '') {
    $variables['leprechaun_mascot_style'] = $leprechaun_mascot_style;
  } else {
    $variables['leprechaun_mascot_style'] = 'no-leprechaun-style';
  }
  
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function cts_demo_preprocess_block(&$variables, $hook) {

}
