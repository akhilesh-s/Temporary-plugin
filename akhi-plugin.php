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

        //http request
        function requests()
        {
            // Customer Post request 
            $body = [
                    "data_type:"=> "customer",
                    "customer"=> [
                        "id"=> 123,
                        "first_name"=> "John",
                        "last_name"=> "Doe",
                        "email"=> "john@johndoe.com",
                        "address"=> "18/XII, Light Avenue, Upper Manhattan, NY"
                    ]
                ];
                
            $request = wp_remote_post('https://en0ctqi09fhu7m.x.pipedream.net/', array(
                'headers' => array('Accept' => 'application/json'),
                'body' =>  json_encode($body) 
            ));

            //Order post request
            $body = [
                "data_type:"=> "order",
                "order"=> [
                    "id"=> 123112,
                    "customer_id"=> 123,
                    "billing_address"=> [
                        "first_name"=> "John",
                        "last_name"=> "Doe",
                        "email"=> "john@johndoe.com",
                        "address"=> "18/XII, Light Avenue, Upper Manhattan, NY"
                    ],
                    "shipping_address"=> [
                        "first_name"=> "John",
                        "last_name"=> "Doe",
                        "email"=> "john@johndoe.com",
                        "address"=> "18/XII, Light Avenue, Upper Manhattan, NY"
            ],
                    "items"=> [
                        [
                            "id"=> 12,
                            "quantity"=> 3,
                            "rate"=> 15,
                            "sub_total"=> 45,
                            "currency"=> "USD"
                    ]
                    ],
                    "total_amount"=> 45,
                    "currency"=> "USD",
                    "status"=> "confirmed"
            ]
                ];
        
            
        $request = wp_remote_post('https://enss4q1617pem.x.pipedream.net/', array(
            'headers' => array('Accept' => 'application/json'),
            'body' =>  json_encode($body) 
        ));
           // echo $request;
        }
		
	}

	$akhiPlugin = new AkhiPlugin();
    $akhiPlugin->requests();
	// activation
	register_activation_hook( __FILE__, array( $akhiPlugin, 'activate' ) );

	// deactivation

    register_deactivation_hook( __FILE__, array( $akhiPlugin, 'deactivate' ) );


}