<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * For a list of default system variables, see: /modules/system/page.tpl.php
 * 
 * Variables custom to this theme:
 * - $division_id: A selection from the "Company Division" theme settings
 * - $territory_id: A selection from the "Company Territory" theme settings
 * - $main_menu_location: The location of the main menu based on theme settings
 * - $leprechaun_mascot: TRUE if a Leprechaun mascot was chosen in theme settings.
 * - $leprechaun_mascot_style: The style of Leprechaun mascot chosen in the theme settings.
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['footer']: Items for the footer region.
 *
 */
?>

  <div id="page">

    <header class="header__wrapper" id="page-header">
      
      <section class="header__top clearfix">
        <?php if ($secondary_menu): ?>
          <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
            <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('links', 'inline', 'clearfix')))); ?>
          </nav>
        <?php endif; ?>
      </section>
      
      <section class="header__main clearfix" id="identity">
        <a href="<?php print $front_page; ?>" title="Magically Delicious Corp"><img class="header__mdc-logo" src="<?php print $cts_demo_theme_path; ?>/images/primary-mdc-logo.png" alt="Magically Delicious Corp" /></a>
        <h1 class="header__mdc-main-title">Magically Delicious Corp</h1>
        <?php if ($division_id != '') : ?>
          <div class="header__division-id"><?php print $division_id; ?></div>
          <div class="header__territory-id"><?php print $territory_id; ?></div>
        <?php endif; ?>
      </section>
        
    </header>
    
    <div id="main">
      
      <?php if ($main_menu && $main_menu_location == 'top'): ?>
        <nav class="main_menu__top clearfix" id="main-menu" role="navigation">
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
        </nav>
      <?php endif; ?>
      
      <?php if ($breadcrumb): ?>
        <div class="clearfix" id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>
      
      <div class="<?php print 'menu-' . $main_menu_location; ?> clearfix" id="content">
        
        <?php
          // Check for tabs and content in page help region
          $page_help = render($page['help']);
          $page_tabs = render($tabs);
        ?>
        
        <?php if ($messages || $page_help || $page_tabs || $action_links) : ?>
          <div class="clearfix" id="support">
            <?php print $messages; ?>
            <?php print render($tabs); ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        
        <a id="main-content"></a>
        
        <?php if ($leprechaun_mascot != '') : ?> 
          <div class="main_content__leprechaun <?php print $leprechaun_mascot_style; ?>"></div>
        <?php endif; ?>
        
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
        <div class="main_content__page-title">
          <h2 id="page-title"><?php print $title; ?></h2>
        </div>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        
        <?php if ($main_menu && $main_menu_location == 'sidebar'): ?>
          <nav class="main_menu__sidebar" id="main-menu" role="navigation">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links')))); ?>
          </nav>
        <?php endif; ?>
        
        <div class="main_content__wrapper">
          <?php print render($page['content']); ?>
        </div>
        
        <div class="main_content__feeds">
          <?php print $feed_icons; ?>
        </div>
        
      </div><!-- /#content -->
    
    </div><!-- /#main -->
    
    <div id="footer">
      <?php print render($page['footer']); ?>
    </div><!-- /#footer -->
    
  </div><!-- /#page -->
    
