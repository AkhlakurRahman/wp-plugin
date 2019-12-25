<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package FirstPlugin
 */

global $wpdb;

// Delete from post_type column
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->QUERY("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
