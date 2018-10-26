<?php
/*
Plugin Name: miitbeianInfo
Plugin URI: https://kanmodel.me
Description: 在网站底部添加备案信息
Version: 1.0.0
Author: KanModel
Author URI: https://kanmodel.me
License: GPL2
*/
/*  Copyright 2018  KanModel

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('admin_menu', 'info_menu');
function info_menu() {
    add_options_page('miitbeianInfo备案信息设置面板', 'miitbeianInfo备案信息设置', 'administrator', 'miitbeian_info', 'miitbeian_info_page');
}

function miitbeian_info_page() {
    require 'option.php';
}

function miitbeian_register_plugin_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=miitbeian_info">设置</a>';
    array_unshift($links, $settings_link);
    return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_{$plugin}", 'miitbeian_register_plugin_settings_link');

//往网站底部添加备案信息
add_action('wp_footer', 'miitbeian_footer');
function miitbeian_footer() {
    ?>
    <div id="miitbeian_info" class="site-footer" align="center">
        <a href="<?php echo get_option('miitbeian_url'); ?>" rel="nofollow" target="_blank">
            <?php echo get_option('miitbeian_info'); ?>
        </a>
    </div>
    <?php
}

//写入默认配置
if (!get_option('miitbeian_info')) {
    update_option('miitbeian_info', '');
}
if (!get_option('miitbeian_url')) {
    update_option('miitbeian_url', '');
}