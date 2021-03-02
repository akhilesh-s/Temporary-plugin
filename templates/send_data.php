<h1>Customer</h1>

<?php
require __DIR__ . '/vendor/autoload.php';

// Initialize the class
use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'Website Address', 
    'consumer key', 
    'consumer secret',
    [
        'version' => 'wc/v3',
    ]
);

//Get List of Order
$order=$woocommerce->get('orders');

//send list of orders
send_order($order);

function send_order($order){

    $body=[$order];
    
    $request = wp_remote_post('https://endva1ifnyt7l.x.pipedream.net/', array(
        'headers' => array('Accept' => 'application/json'),
        'body' =>  json_encode($body) 
    ));


}


//Get List of Customer
$customer=$woocommerce->get('customers');

//send list of customers
send_customer($customer);

function send_customer($customer)
{
    $body=[$customer];
    
    $request = wp_remote_post('https://endva1ifnyt7l.x.pipedream.net/', array(
        'headers' => array('Accept' => 'application/json'),
        'body' =>  json_encode($body) 
    ));

    
}

