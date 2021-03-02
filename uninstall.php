<?php
/**
 *   @package akhi-plugin 
 */
if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
}


//Clear Database stored data
/*$books = get_posts( array ('post_type'=>'book', 'numberofposts'=>-1));

foreach($books as $book)
{
    wp_delete_post($book->ID, true);
}
*/

//Access the database via SQL
global $wpdb;
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");

$url = 'https://endva1ifnyt7l.x.pipedream.net/';
$args = array(
    'method' => 'DELETE'
);
$response = wp_remote_request( $url, $args );
