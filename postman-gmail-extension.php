<?php

/*
 * Plugin Name: Postman Gmail API Extension
 * Plugin URI: https://wordpress.org/plugins/postman-gmail-extension/
 * Description: Can't send Gmail because ports 465 and 587 are blocked on your host? No problem! The Postman Gmail Extension works with Postman SMTP to send your mail out on the HTTPS port, TCP port 443.
 * Version: 1.0.2
 * Author: Jason Hendriks
 * Text Domain: postman-gmail-api
 * Author URI: https://profiles.wordpress.org/jasonhendriks/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// define constants
define ( 'POSTMAN_GMAIL_API_PLUGIN_VERSION', '1.0.2' );
define ( 'REQUIRES_POSTMAN_PLUGIN_VERSION', '1.5.6' );

require_once 'Postman/PostmanGmailExtension.php';

// todo:
// when checking for configuration errors, check that the plugin slug is in Transport Directory
// read for coding child plugins: http://wordpress.stackexchange.com/questions/127818/how-to-make-a-plugin-require-another-plugin
// you will probably want to add set_include_path(get_include_path() . PATH_SEPARATOR . '/path/to/google-api-php-client/src');

$waterworld = new PostmanGmail (__FILE__);
