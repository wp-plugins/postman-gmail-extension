=== Postman Gmail API Extension ===
Contributors: jasonhendriks
Tags: gmail, gmail api, google appengine, smtp, email, mail, oauth, oauth2, xoauth2, gmail, google apps, google apps for work, google apps for business
Requires at least: 3.9
Tested up to: 4.1.1
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Can't send Gmail because ports 465 and 587 are blocked on your host? No problem! The Postman Gmail API Extension works in combination with Postman SMTP to send your mail out on the HTTPS port, port 443. Even if you host your site on GoDaddy, your Gmail will be delivered!

The Postman Gmail API Extension is delivered as a separate plugin to keep the Postman SMTP stable and lightweight. It includes the **Google APIs Client Library for PHP**.

== Description ==

= Features =
* Send Gmail (with XOAUTH2/SSL) from your WordPress site even if the regular mail ports are blocked
* Available translations: English, French

If you are willing to help translate Postman into your language, [please let me know](https://wordpress.org/support/plugin/postman-smtp#postform)!

= Requirements =
* Postman v1.4.3 (or later)
* WordPress 3.9 (or later)
* PHP 5.3 (or later) with OpenSSL; or PHP 5.2 with SPL and OpenSSL 
* A Gmail or Google Apps account; and a Google OAuth 2.0 Client ID

== Installation ==

= Easy install and setup! (Recommended for all users) =
1. Install and activate the plugin through the 'Plugins' menu in WordPress.
1. In the WordPress 'Settings' menu select 'Postman SMTP'.
1. Choose 'Start the Wizard' and follow the instructions.

= To manually configure the Gmail API Transport =

1. Choose configure manually
1. In 'Transport' choose 'Gmail API'
1. In 'Sender Name' enter a name.
1. In 'Sender Email Address' enter your Gmail email address. This MUST be the same address you login to Google with.
1. Go to [Google Developer's Console](https://console.developers.google.com/) and create a Client ID for your WordPress site.. [instructions for this are detailed in the FAQ](https://wordpress.org/plugins/postman-smtp/faq/)
1. Copy your generated 'Client ID' and 'Client Secret' into the plugin's Settings.
1. Choose the Save Changes button.
1. Choose the 'Request Permission from Google' link and follow the instructions.
1. Send yourself a test email. 

> Postman is developed on OS X with PHP 5.5.14 and Apache 2.4.9. Postman is tested in a [Red Hat OpenShift](http://www.openshift.com/) environment with PHP 5.3.3 and Apache 2.2.15 with Gmail, Hotmail and Yahoo Mail (US).

== Frequently Asked Questions == 

= What is Postman? =

The first and only WordPress plugin to allow sending mail with OAuth 2.0; Google, Hotmail and Yahoo Mail's preferred authentication mechanism. Email delivery problems are now a thing of the past.

== Screenshots ==

== Changelog ==

= 0.2 - 2015-02-23 =
* Published to WordPress.org

= 0.1 - 2015-02-20 =
* Postman is one month old! To celebrate we've integrated the Gmail API for all our users who are prevented from sending email on the standard mail ports by their WordPress hosts!

== Upgrade Notice ==

= 0.2 =
The first version. Yay!
