<?php
/**
 * Implements hook_preprocess_page().
 */
function privacy_policy_preprocess_page(&$vars) {
  apricot_theme_preprocess_page($vars);
  if(isset($vars['node'])) {
    $term = entity_load('taxonomy_term', array($vars['node']->field_page_layout['und'][0]['tid']));
    if(!empty($term)) {
      $term = array_pop($term);
      $left_grid = (isset($term->field_layout_tx_left_column['und'][0]['safe_value'])) ? $term->field_layout_tx_left_column['und'][0]['safe_value'] : false;
      if ($left_grid) {
        $vars['layout_options']['left']['enabled'] = TRUE;
        $vars['layout_options']['left']['grid_classes'] = $left_grid;
      }
      $right_grid = isset($term->field_layout_tx_right_column['und'][0]['safe_value']) ? $term->field_layout_tx_right_column['und'][0]['safe_value'] : false;
      if ($right_grid) {
        $vars['layout_options']['right']['enabled'] = TRUE;
        $vars['layout_options']['right']['grid_classes'] = $right_grid;
      }
      $main_grid = isset($term->field_layout_tx_center_column['und'][0]['safe_value']) ? $term->field_layout_tx_center_column['und'][0]['safe_value'] : false;
      if ($main_grid) {
        $vars['layout_options']['main']['enabled'] = TRUE;
        $vars['layout_options']['main']['grid_classes'] = $main_grid;
      }
    }
  }
  $node = menu_get_object();
  if ($node && !drupal_is_front_page()) {
    $vars['breadcrumbs'] = l('College Board Privacy Policy', '/') .
      '<span class="breadcrumb-slash">/</span>' . $node->title;
  }
  else {
    $vars['breadcrumbs'] = '';
  }
}

function privacy_policy_css_alter(&$css) {

  // Remove Drupal core css

  $exclude = array(
    'modules/aggregator/aggregator.css' => FALSE,
    'modules/block/block.css' => FALSE,
    'modules/book/book.css' => FALSE,
    'modules/comment/comment.css' => FALSE,
    'modules/dblog/dblog.css' => FALSE,
    'modules/field/theme/field.css' => FALSE,
    'modules/file/file.css' => FALSE,
    'modules/filter/filter.css' => FALSE,
    'modules/forum/forum.css' => FALSE,
    'modules/help/help.css' => FALSE,
    'modules/menu/menu.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/openid/openid.css' => FALSE,
    'modules/poll/poll.css' => FALSE,
    'modules/profile/profile.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/statistics/statistics.css' => FALSE,
    'modules/syslog/syslog.css' => FALSE,
    'modules/taxonomy/taxonomy.css' => FALSE,
    'modules/tracker/tracker.css' => FALSE,
    'modules/update/update.css' => FALSE,
    'modules/user/user.css' => FALSE,
  );

  $css = array_diff_key($css, $exclude);
}
