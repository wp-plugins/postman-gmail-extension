<?php

// setup the main entry point
if (! class_exists ( 'PostmanGmail' )) {
	
	require_once 'Common.php';
	require_once 'Postman-Mail/PostmanGmailApiTransport.php';
	
	/**
	 *
	 * @author jasonhendriks
	 *        
	 */
	class PostmanGmail {
		private $postmanPhpFile;
		private $logger;
		
		/**
		 * The constructor contains the procedures that HAVE to run
		 * right away.
		 *
		 * Delaying them until the WordPress init() hook won't do.
		 *
		 * @param unknown $postmanPhpFile        	
		 */
		public function __construct($postmanPhpFile) {
			
			// calculate the basename
			$basename = plugin_basename ( $postmanPhpFile );
			$this->postmanPhpFile = $postmanPhpFile;
			
			// load the text domain
			$this->loadTextDomain ();
			
			// add the SMTP transport
			if (class_exists ( 'Postman_Zend_Mail_Transport_Abstract' )) {
				$this->registerTransport ();
			}
			
			// ask WpMailBinder to re-bind, if Postman has already loaded
			if (class_exists ( 'PostmanWpMailBinder' )) {
				// once the PostmanWpMailBinder has been loaded, ask it to bind
				PostmanWpMailBinder::getInstance ()->bind ();
			}
			
			// call the initialization on the standard WordPress plugins_loaded hook
			add_action ( 'plugins_loaded', array (
					$this,
					'init' 
			) );
		}
		
		/**
		 * Initializes the Plugin
		 *
		 * 1. Loads the text domain
		 *
		 * If we can't initialize the plugin, display an error message to the user
		 */
		public function init() {
			// start the logger
			if (! class_exists ( 'PostmanLogger' ) || ! class_exists ( 'Postman_Zend_Mail_Transport_Abstract' )) {
				// Postman is not installed or activated
				add_action ( 'admin_notices', Array (
						$this,
						'displayMissingPostmanMessage' 
				) );
			} else {
				$this->logger = new PostmanLogger ( get_class ( $this ) );
				$this->logger->debug ( 'Postman Gmail Extension v' . POSTMAN_GMAIL_API_PLUGIN_VERSION . ' starting' );
			}
		}
		/**
		 */
		public function displayMissingPostmanMessage() {
			printf ( '<div class="%s"><p>%s</p></div>', 'update-nag', sprintf ( __ ( 'You must install and activate <a href="%s">Postman SMTP %s</a> to use the Postman Gmail Extension', 'postman-gmail-extension' ), 'https://wordpress.org/plugins/postman-smtp/', REQUIRES_POSTMAN_PLUGIN_VERSION ) );
		}
		
		/**
		 */
		private function registerTransport() {
			PostmanTransportDirectory::getInstance ()->registerTransport ( new PostmanGmailApiTransport () );
		}
		
		/**
		 * Loads the appropriate language file.
		 *
		 * This function is called from the constructor
		 * and therefore may NOT access the Logger instance.
		 */
		private function loadTextDomain() {
			$textDomain = 'postman-gmail-extension';
			$langDir = basename ( dirname ( $this->postmanPhpFile ) ) . '/Postman/languages/';
			$success = load_plugin_textdomain ( $textDomain, false, $langDir );
		}
	}
}
