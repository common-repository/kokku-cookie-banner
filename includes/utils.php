<?php

/**
 * The file that defines several utilizing functions in general.
 *
 * @link       http://kokku.com
 * @since      1.8.4
 *
 * @package    KokkuCookieBanner
 * @subpackage KokkuCookieBanner/includes
 */

/**
 * The below function will help to load template file from plugin directory of wordpress
 *  Extracted from : http://wordpress.stackexchange.com/questions/94343/get-template-part-from-plugin
 */

function kokku_get_template_part($slug, $name = '') // Set default to empty string
{
    do_action("kokku_get_template_part_{$slug}", $slug, $name);

    $templates = array();
    if (isset($name))
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    kokku_get_template_path($templates, true, false);
}

/**
 * Extend locate_template from WP Core
 * Define a location of your plugin file dir to a constant in this case = KOKKU_COOKIE_BANNER_DIR_PATH
 * Note: KOKKU_COOKIE_BANNER_DIR_PATH - can be any folder/subdirectory within your plugin files
 */
function kokku_get_template_path($template_names, $load = false, $require_once = true)
{
    $located = '';

    // Filter out empty elements in the $template_names array
    $filtered_template_names = array_filter($template_names, function ($value) {
        return $value !== '';
    });

    foreach ($filtered_template_names as $template_name) {
        if (file_exists(KOKKU_COOKIE_BANNER_DIR_PATH . $template_name)) {
            $located = KOKKU_COOKIE_BANNER_DIR_PATH . $template_name;
            break;
        }
    }

    if ($load && '' != $located)
        load_template($located, $require_once);

    return $located;
}

/**
 * Get translated text from a string.
 */
function kokku_get_text_translation($text)
{
    if (function_exists('pll__')) {
        $translated_text = pll__($text);
    } else {
        $translated_text = esc_html__($text, 'kokku-cookie-banner');
    }

    return $translated_text;
}
