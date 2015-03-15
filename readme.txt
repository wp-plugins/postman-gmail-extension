=== Postman Gmail API Extension ===
Contributors: jasonhendriks
Tags: oauth, gmail, gmail api, google api, email, mail, google apps, godaddy, blocked ports, https
Requires at least: 3.9
Tested up to: 4.1.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Send Gmail from GoDaddy and other hosts that block the standard email ports with this add-on for the Postman SMTP plugin.

== Description ==

Can't send Gmail because ports 465 and 587 are blocked on your host? No problem! The Postman Gmail API Extension works in combination with [Postman SMTP](https://wordpress.org/plugins/postman-smtp/) to send your mail out on the HTTPS port, port 443. Even if you host your site on GoDaddy, your Gmail will be delivered!

The Postman Gmail API Extension includes the **Google APIs Client Library for PHP**. The [Google API](https://developers.google.com/gmail/api/) does not support password-based authentication and Postman will guide you in creating a (free) [Google OAuth 2.0 Client ID](https://developers.google.com/accounts/docs/OAuth2).

> [There is a known issue](https://wordpress.org/support/topic/upgradedeactivation-bug-in-v02?replies=1) with deactivating/upgrading from v0.2. You will have to go back into Postman settings after upgrading and re-enable the Gmail API transport. This issue is fixed in v0.2.1

= Features =
* Send Gmail from your WordPress site over HTTPS
* Available translations: English, French, Italian

If you are willing to help translate Postman into your language, [please let me know](https://wordpress.org/support/plugin/postman-smtp#postform)!

= Requirements =
* [Postman SMTP](https://wordpress.org/plugins/postman-smtp/) v1.5 (or later)
* A [Gmail, Google](https://accounts.google.com/) or [Google Apps](https://www.google.com/work/apps/business/) account; a [Google OAuth 2.0 Client ID](https://developers.google.com/accounts/docs/OAuth2)

== Installation ==

> **You must have [Postman SMTP](https://wordpress.org/plugins/postman-smtp/) installed and activated to use this plugin.**

= Easy install and setup! (Recommended for all users) =
1. Install and activate the plugin through the 'Plugins' menu in WordPress.
1. In the WordPress 'Settings' menu select 'Postman SMTP'.
1. Choose 'Start the Wizard' and follow the instructions.

= To manually configure the Gmail API Transport =

1. Choose configure manually
1. In 'Transport' choose 'Gmail API'
1. In 'Sender Name' enter a name.
1. In 'Sender Email Address' enter your Gmail email address. This MUST be the same address you login to Google with.
1. Go to [Google Developer's Console](https://console.developers.google.com/) and create a Client ID for your WordPress site.. [instructions for this are detailed in the FAQ](https://wordpress.org/plugins/postman-gmail-extension/faq/)
1. Copy your generated 'Client ID' and 'Client Secret' into the plugin's Settings.
1. Choose the Save Changes button.
1. Choose the 'Request Permission from Google' link and follow the instructions.
1. Send yourself a test email. 

> Postman is developed on OS X with PHP 5.5.14 and Apache 2.4.9. Postman is tested in a [Red Hat OpenShift](http://www.openshift.com/) environment with PHP 5.3.3 and Apache 2.2.15 with Gmail, Hotmail and Yahoo Mail (US). Postman is tested with [mailtrap.io](http://mailtrap.io)

== Frequently Asked Questions == 

= What is Postman? =

The first and only WordPress plugin to allow sending mail with OAuth 2.0; Google, Hotmail and Yahoo Mail's preferred authentication mechanism. Email delivery problems are now a thing of the past.

= What URI do I enter to whitelist the plugin? =

If your WordPress site is configured with WP_HTTP_BLOCK_EXTERNAL to prevent outbound connections, you may exempt the Gmail APIs with this definition:

> define('WP_ACCESSIBLE_HOSTS', 'www.googleapis.com');

= What is a Client ID? =
To use OAuth, your website needs it's own Client ID. The Client ID is used to control authentication and authorization and is tied to the specific URL of your website. If you manage several website, you will need a different Client ID for each one.

= How do I get a Google Client ID? =
1. Go to [Google Developer's Console](https://console.developers.google.com/) and choose 'Create Project', or use an existing project if you have one.
1. If you have previously created a project, select it from the Projects page and you will arrive at the Project Dashboard. If you have just created a project, you are brought to the Project Dashboard automatically.
1. If you have not filled out the consent screen for this project, do it now. In the left-hand hand navigation menu, select 'Consent Screen' from under 'APIs & auth'. Into 'email address' put your Gmail address and in 'product name' put 'Postman SMTP'. Choose 'Save'.
1. Select 'API's' from under 'APIs & auth'. Set 'Gmail API' to 'ON'.
1. Select 'Credentials' from under 'APIs & auth'. Choose 'Create a new Client ID'.
1. For the 'Application Type' use 'Web application'.
1. In 'Authorized Javascript origins' enter the 'Javascript Origins' shown on Postman's Settings page.
1. In 'Authorized Redirect URIs' enter the 'Redirect URI' shown on Postman's Settings page.
1. Choose 'Create Client ID'.
1. Enter the Client ID and Client Secret displayed here into Postman's settings page.

= How can I revoke Postman's access to Gmail? =
* From the [Google Developer's Console](https://console.developers.google.com/) use the Delete button under the Client ID

== Screenshots ==

1. A Postman port-test initiated from a GoDaddy.com WordPress site.

== Changelog ==

= 1.0.0 - 2015-03-15 =
* Stable release
* [[Ticket](https://wordpress.org/support/topic/fatal-error-on-registration-form?replies=7)] Renamed Google API classes to prevent errors with other plugins using the Google API
* [[Ticket](https://wordpress.org/support/topic/conflict-when-used-in-conjunction-with-advanced-access-manager-by-vasyl-martyn?replies=9)] Renamed Zend framework classes to prevent errors with other plugins using the Zend framework

= 0.2.2 - 2015-03-06 =
* [[Ticket](https://wordpress.org/support/topic/fatal-error-on-registration-form?replies=7)] Quick fix for collisions with other plugins that use the Google API
* [[Ticket](https://wordpress.org/support/topic/fatal-error-on-activation-52?replies=5)] Fixed an error on activation, and fatal error on switching languages, when using a non-supported language (not US English, not French)
* [[Ticket](https://wordpress.org/support/topic/language-file-errors-in-debug-log?replies=3)] Stopped writing to error log if a language file can't be found

= 0.2.1 - 2015-03-01 =
* A bug in the Plugin causes it to crash when deactivating if the parent Postman SMTP plugin is not installed and active. Fixed.
* This plugin removes its configuration when deactivated, which was a terrible design decision as this requires the user to re-enable the Gmail API on upgrades. Sorry. Fixed.
* Added a warning message if this plugin is installed without Postman, in case a user thinks this is a stand-alone solution.
* Fixed French-language specific issues

= 0.2 - 2015-02-23 =
* Published to WordPress.org

= 0.1 - 2015-02-20 =
* Postman is one month old! To celebrate we've integrated the Gmail API for all our users who are prevented from sending email on the standard mail ports by their WordPress hosts!

== Upgrade Notice ==

= 0.2.2 =
* Switching languages causes a non-recoverable error - fixed

= 0.2.1 =
* There is a known issue with deactivating/upgrading from v0.2. You will have to go back into Postman settings after upgrading and re-enable the Gmail API transport.

= 0.2 =
The first version. Yay!
