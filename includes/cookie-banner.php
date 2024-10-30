<?php

/**
 * The file that defines the functions for:
 *  1. Output cookie banner in frontend site
 *
 * @link       http://kokku.com
 * @since      1.8.6
 *
 * @package    KokkuCookieBanner
 * @subpackage KokkuCookieBanner/includes
 */

/**
 * Output content in frontend site
 */
function kokku_cookie_banner()
{
    ob_start();
    kokku_get_template_part('templates/cookie-banner');
    $html = ob_get_clean();

    $allowed_html = [
        'style' => [],
        'div' => [
            'class' => [],
            'id' => [],
        ],
        'label' => [
            'class' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'input' => [
            'type' => [],
            'name' => [],
            'value' => [],
            'id' => [],
            'class' => [],
            'checked' => [],
            'disabled' => [],
        ],
        'button' => [
            'class' => [],
            'id' => [],
        ],
        'br' => [],
        'a' => [
            'href' => [],
            'title' => [],
            'class' => [],
            'target' => [],
        ],
    ];

    echo wp_kses($html, $allowed_html);
}
add_action('wp_footer', 'kokku_cookie_banner');

/**
 * Include all neccessary assets
 */
function kokku_cookie_banner_assets()
{
    // wp_enqueue_script('js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js');
    wp_enqueue_style('kokku-cookie-banner', KOKKU_COOKIE_BANNER_DIR_URL . 'public/css/main.css', array(), KOKKU_COOKIE_BANNER_VERSION, 'all');
    wp_enqueue_script('kokku-cookie-banner', KOKKU_COOKIE_BANNER_DIR_URL . 'public/js/main.js', array('jquery'), KOKKU_COOKIE_BANNER_VERSION, true);
}
add_action('wp_enqueue_scripts', 'kokku_cookie_banner_assets');

/**
 * Include assets for admin views
 */
function kokku_cookie_banner_admin_assets()
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('kokku-cookie-banner-color-picker', KOKKU_COOKIE_BANNER_DIR_URL . 'public/js/color-picker.js', array('jquery', 'wp-color-picker'), KOKKU_COOKIE_BANNER_VERSION, true);
}
add_action('admin_enqueue_scripts', 'kokku_cookie_banner_admin_assets');

/**
 * Add shortcode for re-open cookie banner in frontend site
 */
function kokku_cookie_banner_link($attrs)
{
    $title = !empty($attrs['title']) ? $attrs['title'] : esc_html__('Open cookie banner', 'kokku_cookie_banner');
    $html = '<div><a href="javascript:void(0);" class="kokku-cookie-banner__link">' . $title . '</a></div>';
    return $html;
}
add_shortcode('kokku_cookie_banner', 'kokku_cookie_banner_link');
