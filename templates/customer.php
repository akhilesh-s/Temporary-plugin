

 <h1> Enter Customer details</h1>
 <form action="" method="post">
 <label for="user_id">ID
		<input id="user_id" type="number" name="ID" value="">
	</label>
	<label for="first-name">First Name
		<input id="first-name" type="text" name="first-name" value="">
	</label>
    
	<label for="last-name">Last Name
		<input id="last-name" type="text" name="last-name" value="">
	</label>
    
	<label for="email">Email
		<input id="email" type="email" name="email" value="">
	</label>
    <label for="address">Address
		<input id="address" type="text" name="address" value="">
	</label>
	<input type="submit" name="submit" value="Submit">
 </form>

 <br>

 <h1> Enter Order Details</h1>
 <br>
 <form action="" method="post">
 <label for="id">Order ID
		<input id="order_id" type="number" name="Order ID" value="">
	</label>

    <br>
    <br> 
    <h3>Enter Billing address</h3>
	<label for="first-name">First Name
		<input id="first-name" type="text" name="first-name" value="">
	</label>
    
	<label for="last-name">Last Name
		<input id="last-name" type="text" name="last-name" value="">
	</label>
    
	<label for="email">Email
		<input id="email" type="email" name="email" value="">
	</label>
    <label for="address">Address
		<input id="address" type="text" name="address" value="">
	</label>
    <br>
    <br>
    <h3>Enter Shipping Address</h3>
    <label for="first-name">First Name
		<input id="first-name" type="text" name="first-name" value="">
	</label>
    
	<label for="last-name">Last Name
		<input id="last-name" type="text" name="last-name" value="">
	</label>
    
	<label for="email">Email
		<input id="email" type="email" name="email" value="">
	</label>
    <label for="address">Address
		<input id="address" type="text" name="address" value="">
	</label>
    <br>
    <br>
    <h3>Items</h3>
    <label for="item-id">Item ID
		<input id="item-id" type="number" name="item-id" value="">
	</label>
    
	<label for="quantity">Quantity
		<input id="quantity" type="number" name="quantity" value="">
	</label>
    
	<label for="rate">Rate
		<input id="rate" type="number" name="rate" value="">
	</label>
    
	<label for="sub_total">Total
		<input id="sub_total" type="number" name="sub_total" value="">
	</label>
    <label for="currency">Currency
		<input id="currency" type="text" name="currency" value="">
	</label>
	<input type="submit" name="submit" value="Submit">
 </form>


 <?php
 echo '<pre>';
 print_r($_POST);
// customer data
if(isset($_POST['submit'])){
	$user_id = (!empty($_POST['user_id'])) ? intval( absint($_POST['user_id'])): '';
	$first_name = (!empty($_POST['first-name'])) ? sanitize_text_field($_POST['first-name']): '';
	$second_name = (!empty($_POST['last-name'])) ? sanitize_text_field($_POST['last-name']): '';
	$email = (!empty($_POST['email'])) ? sanitize_text_field($_POST['email']): '';
    $address = (!empty($_POST['address'])) ? sanitize_text_field($_POST['address']): '';
	
}
$body = [
	"data_type:"=> "customer",
	"customer"=> [
		"id"=> $user_id,
		"first_name"=> $first_name,
		"last_name"=> $second_name,
		"email"=> $email,
        "address"=>$address
	]
];
$request = wp_remote_post('https://enoe6war6ydlc.x.pipedream.net/', array(
	'headers' => array('Accept' => 'application/json'),
	'body' =>  json_encode($body) 
));
?>
