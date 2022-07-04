<?php

if (!defined('THEME_DB_VERSION')) {
    define('THEME_DB_VERSION', wp_get_theme()->Version);
}

// 图片添加a标签
add_filter('the_content', function ($content) {
    $pattern = "/<img(.*?)src=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
    $replacement = '<a href=$2$3.$4$5 rel="lightbox"><img$1href=$2$3.$4$5 rel="lightbox"$6></a>';
    return preg_replace($pattern, $replacement, $content);
});

// Gravatar头像使用镜像服务器
function lu_ban_get_avatar($avatar)
{
    $gr = 'cn.gravatar.com';
    if (strpos($gr, "/avatar") || strpos($gr, "/gravatar")) {
        $avatar = preg_replace("/(www|secure|\d).gravatar.com\/avatar/", $gr, $avatar);
    } else {
        $avatar = preg_replace("/(www|secure|\d).gravatar.com/", $gr, $avatar);
    }
    return $avatar;
}

add_filter('get_avatar', 'lu_ban_get_avatar', 10, 3);

// 文章页菜单高亮
class description_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $description = !empty($item->description) ? '<img src="' . esc_attr($item->description) . '">' : '';

        if ($depth != 0) $description = "";

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
        $item_output .= $description . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// 加载样式和js
function lu_ban_scripts()
{
    wp_enqueue_style('bootstrap-style', 'https://lf9-cdn-tos.bytecdntp.com/cdn/expire-1-M/bootstrap/5.1.3/css/bootstrap.min.css', array());
    wp_enqueue_style('animate-style', 'https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/animate.css/4.1.1/animate.min.css', array());
    wp_enqueue_style('lu-ban-style', get_template_directory_uri() . '/style.css', ['bootstrap-style', 'animate-style']);
    wp_enqueue_style('font-awesome-style', 'https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/font-awesome/6.0.0/css/all.min.css', array());
    wp_enqueue_style('highlight-style', 'https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/styles/base16/default-light.min.css', array());

    wp_enqueue_script('jquery-script', 'https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/jquery/3.6.0/jquery.min.js', array(), false, true);
    wp_enqueue_script('bootstrap-script', 'https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/bootstrap/5.1.3/js/bootstrap.bundle.min.js', array('jquery-script'), false, true);
    wp_enqueue_script('highlight-script', 'https://lf9-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/highlight.min.js', array(), false, true);
    wp_enqueue_script('highlight-ln-script', get_template_directory_uri() . '/static/js/highlight.ln.min.js', array(), false, true);
    wp_enqueue_script('lu-ban-script', get_template_directory_uri() . '/static/js/luban.js', array('jquery-script', 'bootstrap-script'), false, true);
}

add_action('wp_enqueue_scripts', 'lu_ban_scripts');

// 菜单输出配置，a 标签添加class：nav-link
function add_menuclass($urlclass)
{
    return preg_replace('/<a /', '<a class="nav-link"', $urlclass);
}

add_filter('wp_nav_menu', 'add_menuclass');

// 主题设置
function lu_ban_setup()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 132);
    register_nav_menus(
        array(
            'primary' => esc_html__('菜单', 'luban'),
        )
    );
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        )
    );
    $logo_width = 300;
    $logo_height = 100;
    add_theme_support(
        'custom-logo',
        array(
            'height' => $logo_height,
            'width' => $logo_width,
            'flex-width' => true,
            'flex-height' => true,
            'unlink-homepage-logo' => true,
        )
    );
    add_filter('rss_widget_feed_link', '__return_false');
}

add_action('after_setup_theme', 'lu_ban_setup');

// 优化代码
remove_action('wp_head', 'feed_links_extra', 3); // 额外的feed,例如category, tag页
remove_action('wp_head', 'wp_generator'); //隐藏wordpress版本
remove_filter('the_content', 'wptexturize'); //取消标点符号转义
remove_action('admin_print_scripts', 'print_emoji_detection_script'); // 禁用Emoji表情
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
remove_action('wp_body_open', 'gutenberg_global_styles_render_svg_filters');

// 禁止wp-embed.min.js
function disable_embeds_init()
{
    global $wp;
    $wp->public_query_vars = array_diff($wp->public_query_vars, array(
        'embed',
    ));
    remove_action('rest_api_init', 'wp_oembed_register_route');
    add_filter('embed_oembed_discover', '__return_false');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');
    add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
}

add_action('init', 'disable_embeds_init', 9999);

function disable_embeds_tiny_mce_plugin($plugins)
{
    return array_diff($plugins, array('wpembed'));
}

function disable_embeds_rewrites($rules)
{
    foreach ($rules as $rule => $rewrite) {
        if (false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

function disable_embeds_remove_rewrite_rules()
{
    add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'disable_embeds_remove_rewrite_rules');
function disable_embeds_flush_rewrite_rules()
{
    remove_filter('rewrite_rules_array', 'disable_embeds_rewrites');
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'disable_embeds_flush_rewrite_rules');

// 阻止站内文章互相Pingback
function theme_noself_ping(&$links)
{
    $home = get_theme_mod('home');
    foreach ($links as $l => $link)
        if (0 === strpos($link, $home))
            unset($links[$l]);
}

add_action('pre_ping', 'theme_noself_ping');

// 编辑器增强
function enable_more_buttons($buttons)
{
    $buttons[] = 'hr';
    $buttons[] = 'del';
    $buttons[] = 'sub';
    $buttons[] = 'sup';
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'cleanup';
    $buttons[] = 'styleselect';
    $buttons[] = 'wp_page';
    $buttons[] = 'anchor';
    $buttons[] = 'backcolor';
    return $buttons;
}

add_filter("mce_buttons_3", "enable_more_buttons");

// 评论@回复
function lu_ban_comment_add_at($comment_text, $comment = '')
{
    if ($comment->comment_parent > 0) {
        $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">' . get_comment_author($comment->comment_parent) . '</a> ' . $comment_text;
    }
    return $comment_text;
}

add_filter('comment_text', 'lu_ban_comment_add_at', 20, 2);