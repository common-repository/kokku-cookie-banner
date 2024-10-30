<?php
    // if uninstall.php is not called by WordPress, die
    if (!defined('WP_UNINSTALL_PLUGIN')) {
        die;
    }

    $option_names = ['kokku_cookie_banner_options'];

    foreach ($option_names as $option_name) {
        delete_option($option_name);
    }

    // for site options in Multisite
    // delete_site_option($option_name);
    
    // drop a custom database table
    // global $wpdb;
    // $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}mytable");