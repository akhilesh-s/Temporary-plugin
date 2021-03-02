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

$order=$woocommerce->get('orders');
$customer=$woocommerce->get('customers');
var_dump($order);


send_order($order);
send_customer($customer);

function send_order($order){

    $body=[$order];
    
    $request = wp_remote_post('https://endva1ifnyt7l.x.pipedream.net/', array(
        'headers' => array('Accept' => 'application/json'),
        'body' =>  json_encode($body) 
    ));


}

function send_customer($customer)
{
    $body=[$customer];
    
    $request = wp_remote_post('https://endva1ifnyt7l.x.pipedream.net/', array(
        'headers' => array('Accept' => 'application/json'),
        'body' =>  json_encode($body) 
    ));

    
}
