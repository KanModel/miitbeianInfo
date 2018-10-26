<?php
if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}
if ($_POST['update_plugin_options'] == 'true') {
    miitbeian_options_update();
    echo '<div id="message" class="updated"><h4>设置已成功保存</a></h4></div>';
}
?>

    <div class="wrap">
        <h2>MittbeianInfo备案信息控制面板</h2>
        <div class="postbox">
            <form method="post" action="">
                <input type="hidden" name="update_plugin_options" value="true"/>
                <h3>备案信息设置</h3>
                <div class="inside">

                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">备案号:</th>
                            <td>
                                <input type="text" name="beian_option_info"
                                       value="<?php echo get_option('miitbeian_info'); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">备案链接:</th>
                            <td>
                                <input type="text" name="beian_option_url"
                                       value="<?php echo get_option('miitbeian_url'); ?>">
                            </td>
                        </tr>
                    </table>
                    <input type="submit" class="button-primary" value="保存设置" style="margin: 20px 0;"/>
                </div>
            </form>
        </div>
    </div>

<?php
function miitbeian_options_update() {
    update_option('miitbeian_info', stripslashes($_POST['beian_option_info']));
    update_option('miitbeian_url', stripslashes($_POST['beian_option_url']));
}