<?php
/**
 * @package  AkhiPlugin
 */
/*
Plugin Name: akhi-plugin
Description: My first plugin
Version: 1.0.0
Author: Akhilesh
License: GPLv2 or later
*/


defined( 'ABSPATH' ) or die( 'By' );

if ( !class_exists( 'AkhiPlugin' ) ) {

	class AkhiPlugin
	{
		public $plugin;

		function __construct() {
			$this->plugin = plugin_basename( __FILE__ );
		}
        function register() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

			add_action( 'admin_menu', array( $this, 'add_customer_page' ) );

			add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
		}
        public function settings_link( $links ) {
			$settings_link = '<a href="customer.php?page=akhi_plugin">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
		}
        public function add_customer_page() {
			add_menu_page( 'Akhi Plugin', 'Send data', 'manage_options', 'akhi_plugin', array( $this, 'customer_index' ), 'dashicons-store', 110 );
		}

        public function customer_index() {
			require_once plugin_dir_path( __FILE__ ) . 'templates/customer.php';
		}

        function activate() {
            // generated a CPT
            // flush rewrite rules
            flush_rewrite_rules();
        }
    
        function deactivate() {
            // flush rewrite rules
            flush_rewrite_rules();
        }

      
		function enqueue() {
			// enqueue all our scripts
			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assests/mystyles.css', __FILE__ ) );
			wp_enqueue_script( 'mypluginscript', plugins_url( '/assests/myscript.js', __FILE__ ) );
		}

		
	}

	$akhiPlugin = new AkhiPlugin();
    $akhiPlugin->register();
    
	// activation
	register_activation_hook( __FILE__, array( $akhiPlugin, 'activate' ) );

	// deactivation
    register_deactivation_hook( __FILE__, array( $akhiPlugin, 'deactivate' ) );


}
?>