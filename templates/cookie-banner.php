<?php

/**
 * This file is a template file for all the HTML markup in frontend site
 *
 * @link       http://kokku.com
 * @since      1.8.8
 *
 * @package    KokkuCookieBanner
 * @subpackage KokkuCookieBanner/templates
 */

$options = get_option('kokku_cookie_banner_options');

$cookie_categories = $options['kokku_cookie_banner_categories_field'];
$gtm_container_id = $options['kokku_cookie_banner_gtm_id_field'];

$category_names = [
    'necessary' => kokku_get_text_translation('Necessary'),
    'marketing' => kokku_get_text_translation('Marketing'),
    'statistics' => kokku_get_text_translation('Statistics'),
    'categorised' => kokku_get_text_translation('Categorised'),
];

$allowed_html = [
    'br' => [],
    'a' => [
        'href' => [],
        'title' => [],
        'class' => [],
        'target' => [],
    ],
];

$page_overflow = [
    'page-scroll-enabled' => 'auto',
    'page-scroll-disabled' => 'hidden',
];

$container_height = [
    'page-scroll-enabled' => 'auto',
    'page-scroll-disabled' => '100%',
];

$container_background = [
    'page-scroll-enabled' => 'transparent',
    'page-scroll-disabled' => 'rgba(100, 100, 100, 0.8)',
];

$container_top = [
    'vertical-align-top' => '0',
    'vertical-align-center' => '50%',
    'vertical-align-bottom' => 'auto',
];

$container_bottom = [
    'vertical-align-top' => 'auto',
    'vertical-align-center' => '50%',
    'vertical-align-bottom' => '0',
];

$container_transform = [
    'vertical-align-top' => 'translateY(0)',
    'vertical-align-center' => 'translateY(-50%)',
    'vertical-align-bottom' => 'translateY(0)',
];

$vertical_alignment = [
    'vertical-align-top' => 'flex-start',
    'vertical-align-center' => 'center',
    'vertical-align-bottom' => 'flex-end',
];

?>

<style>
    :root {
        --kokku-cookie-banner-background-color:
            <?php echo esc_html($options['kokku_cookie_banner_background_color_field'] ?? ''); ?>
        ;
        --kokku-cookie-banner-text-color:
            <?php echo esc_html($options['kokku_cookie_banner_text_color_field'] ?? ''); ?>
        ;
        --kokku-cookie-banner-max-width:
            <?php echo esc_html($options['kokku_cookie_banner_max_width_field'] ?? '') . 'px'; ?>
        ;
        --kokku-cookie-banner-page-overflow:
            <?php echo esc_html($page_overflow[$options['kokku_cookie_banner_page_scroll_field']] ?? ''); ?>
        ;
        --kokku-cookie-banner-container-height:
            <?php echo esc_html($container_height[$options['kokku_cookie_banner_page_scroll_field']] ?? ''); ?>
        ;
        --kokku-cookie-banner-container-background:
            <?php echo esc_html($container_background[$options['kokku_cookie_banner_page_scroll_field']] ?? ''); ?>
        ;
        --kokku-cookie-banner-container-top:
            <?php echo esc_html($container_top[$options['kokku_cookie_banner_vertical_alignment_field']] ?? ''); ?>
        ;
        --kokku-cookie-banner-container-bottom:
            <?php echo isset($container_bottom[$options['kokku_cookie_banner_vertical_alignment_field']]) ? esc_html($container_bottom[$options['kokku_cookie_banner_vertical_alignment_field']]) : '0'; ?>
        ;
        --kokku-cookie-banner-container-transform:
            <?php echo esc_html($container_transform[$options['kokku_cookie_banner_vertical_alignment_field']] ?? ''); ?>
        ;
        --kokku-cookie-banner-vertical-alignment:
            <?php echo esc_html($vertical_alignment[$options['kokku_cookie_banner_vertical_alignment_field']] ?? ''); ?>
        ;
    }
</style>

<div class="kokku-cookie-banner" id="kokku-cookie-banner">
    <div class="kokku-cookie-banner__container">
        <div class="kokku-cookie-banner__main <?php echo esc_attr($options['kokku_cookie_banner_theme_field']); ?>">
            <div class="kokku-cookie-banner__inner">
                <div class="kokku-cookie-banner__top">
                    <!-- Content -->
                    <div class="kokku-cookie-banner__content">
                        <?php echo wp_kses(nl2br($options['kokku_cookie_banner_content_field']), $allowed_html); ?>
                    </div>
                    <!-- Options -->
                    <div class="kokku-cookie-banner__options d-none">
                        <?php foreach ($cookie_categories as $category => $value): ?>
                            <?php if ($value): ?>
                                <label class="checkbox <?php echo $value === 'necessary' ? 'checkbox--disabled' : '' ?>">
                                    <span class="checkbox__input">
                                        <input type="checkbox" <?php echo $value === 'necessary' ? 'checked disabled' : ''; ?>
                                            id="<?php echo esc_attr($value) ?>-cookies"
                                            name="<?php echo esc_attr($value) ?>-cookies"
                                            value="<?php echo esc_attr($value) ?>" />
                                    </span>
                                    <span class="checkbox__label">
                                        <?php echo esc_html($category_names[$value]); ?>
                                    </span>
                                </label>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Buttons -->
                <div
                    class="kokku-cookie-banner__buttons <?php echo esc_attr($options['kokku_cookie_banner_button_alignment_field']); ?>">
                    <input id="kokku-cookie-banner__gtm-id" type="hidden"
                        value="<?php echo esc_attr($gtm_container_id); ?>">
                    <div class="kokku-cookie-banner__button-wrap">
                        <button id="kokku-cookie-banner__accept-all"
                            class="<?php echo esc_attr($options['kokku_cookie_banner_accept_all_button_classes_field']); ?> kokku-cookie-banner__accept-all">
                            <?php echo kokku_get_text_translation('Accept all'); ?>
                        </button>
                    </div>
                    <div class="kokku-cookie-banner__button-wrap">
                        <button id="kokku-cookie-banner__accept-selected"
                            class="<?php echo esc_attr($options['kokku_cookie_banner_accept_selected_button_classes_field']); ?> kokku-cookie-banner__accept-selected d-none">
                            <?php echo kokku_get_text_translation('Accept selected'); ?>
                        </button>
                        <button id="kokku-cookie-banner__settings"
                            class="<?php echo esc_attr($options['kokku_cookie_banner_settings_button_classes_field']); ?> kokku-cookie-banner__settings">
                            <?php echo kokku_get_text_translation('Settings'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>