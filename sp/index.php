<?php

//print_r($_SERVER);die();

$sitepad['db_name'] = 'sp201';
$sitepad['db_user'] = 'sp201';
$sitepad['db_pass'] = '774S6p53-[';
$sitepad['db_host'] = 'localhost';
$sitepad['db_table_prefix'] = 'sp8r_';
$sitepad['charset'] = 'utf8mb4';
$sitepad['collate'] = 'utf8mb4_unicode_ci';
$sitepad['serving_url'] = '127.0.0.1/sp';// URL without protocol but with directory as well
$sitepad['url'] = 'http://127.0.0.1/sp';
$sitepad['relativeurl'] = '/sp';
$sitepad['.sitepad'] = 'H:\Ampps/private';
$sitepad['sitepad_plugin_path'] = 'H:/Ampps/ampps/scripts/sitepad';
$sitepad['editor_path'] = 'H:/Ampps/ampps/scripts/sitepad/editor';
$sitepad['path'] = dirname(__FILE__);
$sitepad['AUTH_KEY'] = 'trnt4i7enkhop7frnvriessyi9uimxl9zqsvdsrtfvyfpubjpnjpvy4kiyrwtnsa';
$sitepad['SECURE_AUTH_KEY'] = 'ipqhzoik4clqtmqw83wptttfynfjueq4nkxehvtnaf9fvk4i2vj7z6ntzusi2iij';
$sitepad['LOGGED_IN_KEY'] = 'kmhxwpdmgr1grimdcbh5mls07ybozbc6iposrt9vcebdfltx2eajh3ylajtqrx6s';
$sitepad['NONCE_KEY'] = 'xrqeow8g0aondo97jtlyxbvhayn4snxcds3qwdu3kjh0ctbtehde89sh6q1cosgi';
$sitepad['AUTH_SALT'] = 'd8gcscfhgenlpn06sfsm9we7hvafb0gj3hshxddsxmpjwzsgwiwkfgmzw0wjfvp7';
$sitepad['SECURE_AUTH_SALT'] = 'zfuocofej8ljpfzk0dj1poqolodstozkds5qwl5a0rywlix4lenz4hcocmqpeknp';
$sitepad['LOGGED_IN_SALT'] = 'c6uoluypc41wgtrnlhedef05lchi2sgmhq4vwdelwjnaekxrnut6rrg2kbjljl5v';
$sitepad['NONCE_SALT'] = 'bghqpl8vo4sfg775hqid7k3t6fupkzxr6vej2ymtmmga83ad68nooddf4lxewqio';

if(!include_once($sitepad['editor_path'].'/site-inc/bootstrap.php')){
	die('Could not include the bootstrap.php. One of the reasons could be open_basedir restriction !');
}

