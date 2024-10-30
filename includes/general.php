<?php

/**
 * The file that defines the functions for:
 *  1. Plugin activation
 *  2. Plugin deactivation
 *  3. Plugin action links in the Plugins page of the admin panel
 *
 * @link       http://kokku.com
 * @since      1.8.7
 *
 * @package    KokkuCookieBanner
 * @subpackage KokkuCookieBanner/includes
 */

/**
 * Load translations
 */
add_action('init', 'kokku_cookie_banner_language_setup');
function kokku_cookie_banner_language_setup() {
    load_plugin_textdomain('kokku-cookie-banner', false, dirname(plugin_basename(__FILE__)) . '/languages');

    if (function_exists('pll_register_string')) {
        pll_register_string('kokku-cookie-banner/settings', 'Settings', 'kokku-cookie-banner');
        pll_register_string('kokku-cookie-banner/necessary', 'Necessary', 'kokku-cookie-banner');
        pll_register_string('kokku-cookie-banner/marketing', 'Marketing', 'kokku-cookie-banner');
        pll_register_string('kokku-cookie-banner/statistics', 'Statistics', 'kokku-cookie-banner');
        pll_register_string('kokku-cookie-banner/categorised', 'Categorised', 'kokku-cookie-banner');
        pll_register_string('kokku-cookie-banner/accept-all', 'Accept all', 'kokku-cookie-banner');
        pll_register_string('kokku-cookie-banner/accept-selected', 'Accept selected', 'kokku-cookie-banner');
    }
}

/**
 * Add settings link to the plugin in plugins page
 */
add_filter('plugin_action_links_' . KOKKU_COOKIE_BANNER_BASENAME, 'kokku_cookie_banner_settings_link', 10, 5);
function kokku_cookie_banner_settings_link($links) {
    // Build and escape the URL.
    $url = esc_url(add_query_arg(
        array(
            'page'  => 'kokku_cookie_banner',
            'tab'   => 'settings'
        ),
        get_admin_url() . 'admin.php'
    ));
    // Create the link.
    $settings_link = array(
        'settings' => "<a href='$url'>" . kokku_get_text_translation('Settings') . '</a>'
    );
    // Adds the link to the end of the array.
    $links = array_merge(
        $settings_link,
        $links
    );
    return $links;
}

/**
 * Activation hook
 */
register_activation_hook(KOKKU_COOKIE_BANNER_BASENAME, 'kokku_cookie_banner_activate');
function kokku_cookie_banner_activate() {
    // tasks to be done when plugin is activated

    // Explicitly set the value for certain fields when plugin is activated
    $options['kokku_cookie_banner_categories_field'][]                      = 'necessary';
    $options['kokku_cookie_banner_content_field']                           = 'We use cookies to improve performance.';
    $options['kokku_cookie_banner_theme_field']                             = 'theme-default';
    $options['kokku_cookie_banner_max_width_field']                         = '1024';
    $options['kokku_cookie_banner_page_scroll_field']                       = 'page-scroll-enabled';
    $options['kokku_cookie_banner_vertical_alignment_field']                = 'vertical-align-bottom';
    $options['kokku_cookie_banner_background_color_field']                  = '#ffffff';
    $options['kokku_cookie_banner_text_color_field']                        = '#000000';
    $options['kokku_cookie_banner_button_alignment_field']                  = 'alignment-vertically';
    $options['kokku_cookie_banner_accept_all_button_classes_field']         = 'btn btn--primary';
    $options['kokku_cookie_banner_accept_selected_button_classes_field']    = 'btn btn--secondary';
    $options['kokku_cookie_banner_settings_button_classes_field']           = 'btn btn--secondary';

    if (get_option('kokku_cookie_banner_options') === false) {
        add_option('kokku_cookie_banner_options', $options);
    } else {
        $existing_options = get_option('kokku_cookie_banner_options');
        $new_options = array_merge($options, $existing_options);
        update_option('kokku_cookie_banner_options', $new_options);
    }
}

/**
 * Clear data when plugin is deactivated.
 */
register_deactivation_hook(KOKKU_COOKIE_BANNER_BASENAME, 'kokku_cookie_banner_deactivate');
function kokku_cookie_banner_deactivate() {
    // tasks to be done when plugin is deactivated
    // $option_names = ['kokku_cookie_banner_options'];

    // foreach ($option_names as $option_name) {
    //     delete_option($option_name);
    // }
}
