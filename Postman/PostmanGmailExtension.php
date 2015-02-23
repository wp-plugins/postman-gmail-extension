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
			
			// start the logger
			$this->logger = new PostmanLogger ( get_class ( $this ) );
			
			// add the SMTP transport
			$this->addTransport ();
			
			// bind to wp_mail
			if (class_exists ( 'PostmanWpMailBinder' )) {
				// once the PostmanWpMailBinder has been loaded, ask it to bind
				PostmanWpMailBinder::getInstance ()->bind ();
			}
			
			// register the deactivation hook
			register_deactivation_hook ( $postmanPhpFile, array (
					$this,
					'handleDeactivationEvent' 
			) );
			
			// initialzie the plugin
			add_action ( 'plugins_loaded', array (
					$this,
					'init' 
			) );
		}
		
		/**
		 * Initializes the Plugin
		 *
		 * 1. Loads the text domain
		 */
		public function init() {
			$this->logger->debug ( 'Postman Gmail Extension v' . POSTMAN_GMAIL_API_PLUGIN_VERSION . ' starting' );
			// load the text domain
			$this->loadTextDomain ();
		}
		private function addTransport() {
			PostmanTransportDirectory::getInstance ()->registerTransport ( new PostmanGmailApiTransport () );
		}
		
		/**
		 * Loads the appropriate language file
		 */
		private function loadTextDomain() {
			$langDir = basename ( dirname ( $this->postmanPhpFile ) ) . '/Postman/languages/';
			$success = load_plugin_textdomain ( 'postman-smtp', false, $langDir );
		}
		
		/**
		 * If the plugin is de-activated but Postman is set to use the Plugin,
		 * the plugin should switch back to the default SMTP transport.
		 */
		public function handleDeactivationEvent() {
			$this->logger->debug ( 'Deactivating' );
			$options = PostmanOptions::getInstance ();
			if ($options->getTransportType () == PostmanGmailApiTransport::SLUG) {
				$options->setTransportType ( PostmanSmtpTransport::SLUG );
				$options->save ();
				$mh = new PostmanMessageHandler ( $options, PostmanOAuthToken::getInstance () );
				$mh->addError ( __ ( 'Postman Transport reset to SMTP. Attention may be required.' ) );
			}
		}
	}
}
