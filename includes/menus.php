<?php

/**
 * The file that defines the functions for:
 *  1. adding admin menus
 *  2. page rendering for the admin menus
 *
 * @link       http://kokku.com
 * @since      1.8.4
 *
 * @package    KokkuCookieBanner
 * @subpackage KokkuCookieBanner/includes
 */

/**
 * Add the top level menu page.
 */
function kokku_cookie_banner_options_page() {
    add_menu_page(
        esc_html__('Cookie Banner', 'kokku-cookie-banner'),     // page title
        esc_html__('Cookie Banner', 'kokku-cookie-banner'),     // menu title
        'manage_options',                                       // capability
        'kokku_cookie_banner',                                  // menu slug
        'kokku_cookie_banner_options_page_html'                 // callback function
    );
}

/**
 * Register our kokku_cookie_banner_options_page to the admin_menu action hook.
 */
add_action('admin_menu', 'kokku_cookie_banner_options_page');

/**
 * Top level menu callback function.
 */
function kokku_cookie_banner_options_page_html() {
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    $default_tab = null;
    $tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : $default_tab;
    // add error/update messages

    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('kokku_cookie_banner_messages', 'kokku_cookie_banner_message', esc_html__('Settings Saved.', 'kokku-cookie-banner'), 'updated');
    }

    // show error/update messages
    settings_errors('kokku_cookie_banner_messages');
?>

    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <nav class="nav-tab-wrapper">
            <a href="?page=kokku_cookie_banner" class="nav-tab <?php echo $tab === null ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Home', 'kokku-cookie-banner'); ?></a>
            <a href="?page=kokku_cookie_banner&tab=settings" class="nav-tab <?php echo $tab === 'settings' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Settings', 'kokku-cookie-banner'); ?></a>
        </nav>
        <div class="tab-content">
            <?php
            switch ($tab) {
                case 'settings': ?>

                    <form action="options.php" method="post">
                        <?php
                        // output security fields for the registered setting "kokku_cookie_banner"
                        settings_fields('kokku_cookie_banner');
                        // output setting sections and their fields
                        // (sections are registered for "kokku_cookie_banner", each field is registered to a specific section)
                        do_settings_sections('kokku_cookie_banner');
                        // output save settings button
                        submit_button(esc_html__('Save Settings', 'kokku-cookie-banner'));
                        ?>
                    </form>

                <?php
                    break;

                default:

                    $url = esc_url(add_query_arg(
                        array(
                            'page'  => 'kokku_cookie_banner',
                            'tab'   => 'settings'
                        ),
                        get_admin_url() . 'admin.php'
                    ));
                ?>
                    <p>
                        <?php
                        echo sprintf(
                            'Change configuration in the <a href="%s">%s</a> page.',
                            $url,
                            esc_html__('Settings', 'kokku-cookie-banner')
                        );
                        ?>
                    </p>
            <?php
                    break;
            }
            ?>
        </div>
    </div>
<?php
}
