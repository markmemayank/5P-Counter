<?php
/*
Plugin Name: 5P Counter
Description:  Displays the number of posts, pages, projects, post categories and plugins on the "At a Glance" page in the WordPress dashboard. Here 5P referes to Post Page Projects, Post Categories & Plugins.
Version: 1.2
Author: Mayank Kumar
Author URI: https://markmemayank.com/
License: GPL2
*/

function aag_stats_dashboard_widget_function() {
  $num_posts = wp_count_posts('post');
  $num_pages = wp_count_posts('page');
  $num_projects = wp_count_posts('project');
  $num_categories = wp_count_terms('category');
  $num_active_plugins = count(get_option('active_plugins'));
  $num_all_plugins = count(get_plugins());

  echo "<ul>";
  echo "<li>" . $num_posts->publish . " Post</li>";
  echo "<li>" . $num_pages->publish . " Page</li>";
  echo "<li>" . $num_projects->publish . " Projects</li>";
  echo "<li>" . $num_categories . " Post Categories</li>";
  echo "<li>" . $num_active_plugins . " Active Plugins</li>";
  echo "<li>" . $num_all_plugins . " Total Installed Plugins</li>";
  echo "</ul>";
}

function aag_stats_add_dashboard_widgets() {
  wp_add_dashboard_widget('aag_stats_dashboard_widget', 'At a Glance Stats', 'aag_stats_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'aag_stats_add_dashboard_widgets' );
