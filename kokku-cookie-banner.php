<?php

/**
 * Kokku Cookie Banner
 *
 * @package                 KokkuCookieBanner
 * @author                  Kokku
 * @copyright               2024 (c) Kokku
 * @license                 GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:             Kokku Cookie Banner
 * Plugin URI:              https://github.com/kokku/kokku-cookie-banner
 * GitHub Plugin URI:       https://github.com/kokku/kokku-cookie-banner
 * Primary Branch:          main
 * Description:             This plugin delivers a GDPR cookie consent banner to your WordPress websites.
 * Version:                 1.8.9
 * Requires at least:       5.2
 * Tested up to:            6.4.3
 * Requires PHP:            8.0.3
 * Author:                  Kokku
 * Author URI:              https://www.kokku.com
 * Text Domain:             kokku-cookie-banner
 * Domain Path:             /languages
 * License:                 GPL v2 or later
 * License URI:             http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
defined('ABSPATH') or exit;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('KOKKU_COOKIE_BANNER_VERSION', '1.8.9');

/**
 * Basename of the main plugin file.
 */
define('KOKKU_COOKIE_BANNER_BASENAME', plugin_basename(__FILE__));

/**
 * Plugin directory path
 */
define('KOKKU_COOKIE_BANNER_DIR_PATH', plugin_dir_path(__FILE__));

/**
 * Plugin directory url
 */
define('KOKKU_COOKIE_BANNER_DIR_URL', plugin_dir_url(__FILE__));

/**
 * Include files for functionalities.
 */
include KOKKU_COOKIE_BANNER_DIR_PATH . 'includes/general.php';
include KOKKU_COOKIE_BANNER_DIR_PATH . 'includes/menus.php';
include KOKKU_COOKIE_BANNER_DIR_PATH . 'includes/pages.php';
include KOKKU_COOKIE_BANNER_DIR_PATH . 'includes/utils.php';
include KOKKU_COOKIE_BANNER_DIR_PATH . 'includes/cookie-banner.php';
