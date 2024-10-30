<?php

/**
 * The file that defines the functions for:
 *  1. the content of settings page
 *
 * @link       http://kokku.com
 * @since      1.8.7
 *
 * @package    KokkuCookieBanner
 * @subpackage KokkuCookieBanner/includes
 */

/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * Displays all messages registered to 'kokku_cookie_banner' setting
 */
function kokku_cookie_banner_display_error_notices() {
    settings_errors('kokku_cookie_banner');
}
add_action('admin_notices', 'kokku_cookie_banner_display_error_notices');

/**
 * Custom option and settings
 */
function kokku_cookie_banner_settings_init() {
    // Register a new setting for "kokku_cookie_banner" page.
    register_setting('kokku_cookie_banner', 'kokku_cookie_banner_options', 'kokku_cookie_banner_settings_validation');

    // Register a new section in the "kokku_cookie_banner" page.
    add_settings_section(
        'kokku_cookie_banner_gtm_section',
        esc_html__('Google Tag Manager', 'kokku-cookie-banner'),
        'kokku_cookie_banner_gtm_section_callback',
        'kokku_cookie_banner'
    );

    // Register a new field in the "kokku_cookie_banner_gtm_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_gtm_id_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Container ID', 'kokku-cookie-banner'),
        'kokku_cookie_banner_gtm_id_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_gtm_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_gtm_id_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new section in the "kokku_cookie_banner" page.
    add_settings_section(
        'kokku_cookie_banner_settings_section',
        esc_html__('Settings', 'kokku-cookie-banner'),
        'kokku_cookie_banner_settings_section_callback',
        'kokku_cookie_banner'
    );

    // Register a new field in the "kokku_cookie_banner_settings_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_categories_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Categories', 'kokku-cookie-banner'),
        'kokku_cookie_banner_categories_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_settings_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_categories_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new section in the "kokku_cookie_banner" page.
    add_settings_section(
        'kokku_cookie_banner_content_section',
        esc_html__('Content', 'kokku-cookie-banner'),
        'kokku_cookie_banner_content_section_callback',
        'kokku_cookie_banner'
    );

    // Register a new field in the "kokku_cookie_banner_content_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_content_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Content', 'kokku-cookie-banner'),
        'kokku_cookie_banner_content_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_content_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_content_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new section in the "kokku_cookie_banner" page.
    add_settings_section(
        'kokku_cookie_banner_styling_section',
        esc_html__('Styling', 'kokku-cookie-banner'),
        'kokku_cookie_banner_styling_section_callback',
        'kokku_cookie_banner'
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_theme', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Theme', 'kokku-cookie-banner'),
        'kokku_cookie_banner_theme_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_theme_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_max_width_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Max width (px)', 'kokku-cookie-banner'),
        'kokku_cookie_banner_max_width_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_max_width_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_page_scroll_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Page scroll', 'kokku-cookie-banner'),
        'kokku_cookie_banner_page_scroll_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_page_scroll_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_vertical_alignment_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Vertical alignment', 'kokku-cookie-banner'),
        'kokku_cookie_banner_vertical_alignment_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_vertical_alignment_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_background_color_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Background color', 'kokku-cookie-banner'),
        'kokku_cookie_banner_background_color_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_background_color_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_text_color_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Content text color', 'kokku-cookie-banner'),
        'kokku_cookie_banner_text_color_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_text_color_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_button_alignment_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Button alignment', 'kokku-cookie-banner'),
        'kokku_cookie_banner_button_alignment_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_button_alignment_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_accept_all_button_classes_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Accept all button', 'kokku-cookie-banner'),
        'kokku_cookie_banner_accept_all_button_classes_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_accept_all_button_classes_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_accept_selected_button_classes_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Accept selected button', 'kokku-cookie-banner'),
        'kokku_cookie_banner_accept_selected_button_classes_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_accept_selected_button_classes_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );

    // Register a new field in the "kokku_cookie_banner_styling_section" section, inside the "kokku_cookie_banner" page.
    add_settings_field(
        'kokku_cookie_banner_settings_button_classes_field', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__('Settings button', 'kokku-cookie-banner'),
        'kokku_cookie_banner_settings_button_classes_field_cb',
        'kokku_cookie_banner',
        'kokku_cookie_banner_styling_section',
        array(
            'label_for'                         => 'kokku_cookie_banner_settings_button_classes_field',
            'class'                             => 'kokku_cookie_banner_row',
            'kokku_cookie_banner_custom_data'   => 'custom',
        )
    );
}

/**
 * Register our kokku_cookie_banner_settings_init to the admin_init action hook.
 */
add_action('admin_init', 'kokku_cookie_banner_settings_init');

/**
 * GTM section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function kokku_cookie_banner_gtm_section_callback($args) {
?>
    <p id="<?php echo esc_attr($args['id']); ?>"><?php esc_html_e('Insert your google tag manager code here. (GTM-XXXX).', 'kokku-cookie-banner'); ?></p>
<?php
}

/**
 * GTM fields callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_gtm_id_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>
    <input type="text" style="width: 100%;" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo $options[$args['label_for']] ? esc_attr($options[$args['label_for']]) : ''; ?>">
<?php
}

/**
 * Categories fields callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_categories_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');

    $value = array();
    if (isset($options['kokku_cookie_banner_categories_field']) && !empty($options['kokku_cookie_banner_categories_field'])) {
        $value = $options['kokku_cookie_banner_categories_field'];
    }
?>

    <div class="category category-necessary">
        <input type="checkbox" disabled checked>
        <input type="hidden" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>][]" value="<?php echo 'necessary'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Necessary'; ?></label>
    </div>
    <br>
    <div class="category category-marketing">
        <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>][]" <?php echo in_array('marketing', $value) ? 'checked' : ''; ?> value="<?php echo 'marketing'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Marketing'; ?></label>
    </div>
    <br>
    <div class="category category-statistics">
        <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>][]" <?php echo in_array('statistics', $value) ? 'checked' : ''; ?> value="<?php echo 'statistics'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Statistics'; ?></label>
    </div>
    <br>
    <div class="category category-categorised">
        <input type="checkbox" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>][]" <?php echo in_array('categorised', $value) ? 'checked' : ''; ?> value="<?php echo 'categorised'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Categorised'; ?></label>
    </div>
<?php
}

/**
 * Content section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function kokku_cookie_banner_content_section_callback($args) {
?>
    <p id="<?php echo esc_attr($args['id']); ?>"><?php esc_html_e('The text content to be displayed in the cookie banner.', 'kokku-cookie-banner'); ?></p>
<?php
}

/**
 * Content fields callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_content_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>
    <textarea style="width: 100%;" cols="50" rows="10" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo !empty($options[$args['label_for']]) ? esc_html($options[$args['label_for']]) : ''; ?></textarea>
    <small><?php esc_html_e('Text content in different language versions can be managed in the string translation of your multilingual plugin (e.g. Polylang, WPML).', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Settings section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function kokku_cookie_banner_settings_section_callback($args) {
?>
    <p id="<?php echo esc_attr($args['id']); ?>"><?php esc_html_e('The settings for the cookie banner.', 'kokku-cookie-banner'); ?></p>
<?php
}

/**
 * Styling section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function kokku_cookie_banner_styling_section_callback($args) {
?>
    <p id="<?php echo esc_attr($args['id']); ?>"><?php esc_html_e('Change the display of cookie banner in the frontend website.', 'kokku-cookie-banner'); ?></p>
<?php
}

/**
 * Styling section theme field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_theme_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>
    <div class="theme theme-default">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('theme-default', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'theme-default'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Default'; ?></label>
    </div>
    <br>
    <div class="theme theme-floating">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('theme-floating', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'theme-floating'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Floating'; ?></label>
    </div>
    <br>
    <small><?php esc_html_e('The cookie banner theme.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section max width field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_max_width_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>
    <input type="number" min="1024" style="width: 100%;" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo $options[$args['label_for']] ? esc_attr($options[$args['label_for']]) : ''; ?>">
    <small><?php esc_html_e('Valid input for this field is like "1024".', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section page scroll field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_page_scroll_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>
    <div class="page-scroll page-scroll-enabled">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('page-scroll-enabled', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'page-scroll-enabled'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Allow Page Scroll'; ?></label>
    </div>
    <br>
    <div class="page-scroll page-scroll-disabled">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('page-scroll-disabled', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'page-scroll-disabled'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Prevent Page Scroll'; ?></label>
    </div>
    <br>
    <small><?php esc_html_e('Toggle to prevent the page scroll when cookie banner is open.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section vertical alignment field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_vertical_alignment_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>
    <div class="vertical-align vertical-align-top">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('vertical-align-top', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'vertical-align-top'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Top'; ?></label>
    </div>
    <br>
    <div class="vertical-align vertical-align-center">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('vertical-align-center', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'vertical-align-center'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Center'; ?></label>
    </div>
    <br>
    <div class="vertical-align vertical-align-bottom">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('vertical-align-bottom', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'vertical-align-bottom'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Bottom'; ?></label>
    </div>
    <br>
    <small><?php esc_html_e('The vertical alignment/position of the cookie banner.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section background color field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_background_color_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>

    <input type="text" class="kokku-cookie-banner-color-field" id="<?php echo esc_attr($args['label_for']); ?>" data-default-color='#ffffff' data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo $options[$args['label_for']] ? esc_attr($options[$args['label_for']]) : '#ffffff'; ?>">
    <br>
    <small><?php esc_html_e('Background color of the banner.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section content text color field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_text_color_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>

    <input type="text" class="kokku-cookie-banner-color-field" id="<?php echo esc_attr($args['label_for']); ?>" data-default-color='#000000' data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo $options[$args['label_for']] ? esc_attr($options[$args['label_for']]) : '#000000'; ?>">
    <br>
    <small><?php esc_html_e('Text color for the content of the banner.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section button alignment field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_button_alignment_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>

    <div class="alignment alignment-vertically">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('alignment-vertically', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'alignment-vertically'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Vertically Aligned'; ?></label>
    </div>
    <br>
    <div class="alignment alignment-horizontally">
        <input type="radio" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" <?php checked('alignment-horizontally', $options[esc_attr($args['label_for'])]); ?> value="<?php echo 'alignment-horizontally'; ?>">
        <label for="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]"><?php echo 'Horizontally Aligned'; ?></label>
    </div>
    <br>
    <small><?php esc_html_e('The alignment of buttons, horizontally or vertically.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section accept all button classes field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_accept_all_button_classes_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>

    <input type="text" style="width: 100%;" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo $options[$args['label_for']] ? esc_attr($options[$args['label_for']]) : ''; ?>">
    <small><?php esc_html_e('The css classes to be applied to the accept all button.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section accept selected button classes field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_accept_selected_button_classes_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>

    <input type="text" style="width: 100%;" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo $options[$args['label_for']] ? esc_attr($options[$args['label_for']]) : ''; ?>">
    <small><?php esc_html_e('The css classes to be applied to the accept selected button.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Styling section accept all button classes field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function kokku_cookie_banner_settings_button_classes_field_cb($args) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option('kokku_cookie_banner_options');
?>

    <input type="text" style="width: 100%;" id="<?php echo esc_attr($args['label_for']); ?>" data-custom="<?php echo esc_attr($args['kokku_cookie_banner_custom_data']); ?>" name="kokku_cookie_banner_options[<?php echo esc_attr($args['label_for']); ?>]" value="<?php echo $options[$args['label_for']] ? esc_attr($options[$args['label_for']]) : ''; ?>">
    <small><?php esc_html_e('The css classes to be applied to the settings button.', 'kokku-cookie-banner'); ?></small>
<?php
}

/**
 * Cookie banner settings max width field validation
 */
function kokku_cookie_banner_settings_validation($input) {
    $option_name = 'kokku_cookie_banner_options';
    $old_option = get_option($option_name);
    $max_width_input = $input['kokku_cookie_banner_max_width_field'];
    $max_width = intval($max_width_input);

    if (!is_numeric($max_width_input) || $max_width < 1024) {
        $input['kokku_cookie_banner_max_width_field'] = $old_option['kokku_cookie_banner_max_width_field'];
        add_settings_error('kokku_cookie_banner', 'kokku_cookie_banner_max_width_field_validation_error', esc_html__('Max width should be equal to or great than 1024.', 'kokku-cookie-banner'), 'error');
    }

    return $input;
}
