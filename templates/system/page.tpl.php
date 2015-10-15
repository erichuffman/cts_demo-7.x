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
<div class="l-page page">
  <header class="header">
    <?php if ($secondary_menu): ?>
      <nav class="secondary-menu clearfix" role="navigation">
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('links', 'inline', 'clearfix')))); ?>
      </nav>
    <?php endif; ?>
    <section class="header__identity clearfix">
      <h1 class="header__mdc-logo"><a href="<?php print $front_page; ?>" title="Magically Delicious Corp">Magically Delicious Corp</a></h1>
      <?php if ($division_id != '') : ?>
        <h2 class="header__division-id"><?php print $division_id; ?></h2>
        <h3 class="header__territory-id"><?php print $territory_id; ?></h3>
      <?php endif; ?>
    </section>
  </header>
  <div id="content" class="content clearfix">
    <div class="content__container <?php print 'main-menu-' . $main_menu_location; ?>">
      <?php
        // Check for tabs and content in page help region
        $page_help = render($page['help']);
        $page_tabs = render($tabs);
      ?>
      <?php if ($messages || $page_help || $page_tabs || $action_links) : ?>
        <div class="support clearfix">
          <?php if ($messages) : ?>
            <div class="support__messages">
              <?php print $messages; ?>
            </div>
          <?php endif; ?>
          <?php if ($page_tabs) : ?>
            <div class="support__tabs">
              <?php print $page_tabs; ?>
            </div>
          <?php endif; ?>
          <?php if ($page_help) : ?>
            <div class="support__help">
              <?php print $page_help; ?>
            </div>
          <?php endif; ?>
          <?php if ($action_links): ?>
            <ul class="support__action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if ($main_menu && $main_menu_location == 'top'): ?>
        <nav class="main-menu--top clearfix" role="navigation">
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
        </nav>
      <?php endif; ?>
      <div class="content__main"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h2 class="content__page-title">
            <?php if ($is_front) : ?>
              <?php print $home_welcome_message; ?>
            <?php else : ?>
              <?php print $title; ?>
            <?php endif; ?>
          </h2>
        <?php endif; ?>
        <div class="breadcrumb__wrapper">
          <?php print $breadcrumb; ?>
        </div>
        <?php print render($title_suffix); ?>
        <?php if ($main_menu && $main_menu_location == 'sidebar'): ?>
          <nav class="main-menu--sidebar" role="navigation">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links')))); ?>
          </nav>
        <?php endif; ?>
        <div class="content__body-wrapper<?php if ($main_menu && $main_menu_location == 'sidebar') { print '--menu-' . $main_menu_location; } ?>">
          <?php if ($leprechaun_mascot) : ?>
            <div class="leprechaun--<?php print $leprechaun_mascot_style; ?>"></div>
          <?php endif; ?>
          <?php print render($page['content']); ?>
        </div>
        <div class="content__feeds">
          <?php print $feed_icons; ?>
        </div>
      </div><!-- /.content__main -->
    </div><!-- /.content__container -->
  </div><!-- /.content -->
  <div class="footer">
    <?php print render($page['footer']); ?>
    <p class="footer__copyright">Copyright Magically Delicious Corporation</p>
  </div><!-- /.footer -->
 </div><!-- /.page -->

