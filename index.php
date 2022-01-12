
<!DOCTYPE html>
<html>
<head>
<title>Movie Ticket Booking System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Movie Ticket Booking Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href='//fonts.googleapis.com/css?family=Kotta+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.seat-charts.js"></script>
</head>
<body>
<div class="content">
	<h1>Movie Ticket Booking System</h1>
	<div class="main">
		<h2>Multiplex Theatre Showing Screen 1</h2>
		<div class="demo">
			<div id="seat-map">
				<div class="front">SCREEN</div>					
			</div>

			<div class="booking-details">
				<ul class="book-left">
					<li>Movie </li>
					<li>Time </li>
					<li>Tickets</li>
					<li>Total</li>
					<li>Seats :</li>
				</ul>
				<ul class="book-right">
					<li>: Ala Vaikuntapuramlo</li>
					<li>:november 3, 16:00</li>
					<li>:<span id="counter">0</span></li>
					<li>: <b><i>$</i><span id="total">0</span></b></li>
				</ul>
			
	            
				<div class="clear"></div>
				<ul id="selected-seats" class="scrollbar scrollbar1"></ul>
				<form action="#" method="POST">
               <p>
                <input type="phonenumber" name="phonenumber"placeholder="phonenumber"class="input" id="intpt">
					</p>
				 <span id="counter"></span>
				
                </form>
						
				<button class="checkout-button" name="booknow">Book Now</button>	
				<div id="legend"></div>
			</div>
			<div style="clear:both"></div>
	    </div>
			<script type="text/javascript" >
				var price = 100; //price
				$(document).ready(function() {
					var $cart = $('#selected-seats'), //Sitting Area
					$counter = $('#counter'), //Votes
					$total = $('#total'); //Total money
					
					var sc = $('#seat-map').seatCharts({
						map: [  //Seating chart
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'__________',
							'aaaaaaaa__',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'__aaaaaa__'
						],
						naming : {
							top : false,
							getLabel : function (character, row, column) {
								return column;
							}
						},
						legend : { //Definition legend
							node : $('#legend'),
							items : [
								[ 'a', 'available',   'Available' ],
								[ 'a', 'unavailable', 'Sold'],
								[ 'a', 'selected', 'Selected']
							]					
						},
						click: function () { //Click event
							if (this.status() == 'available') { //optional seat
								$('<li>Row'+(this.settings.row+1)+' Seat'+this.settings.label+'</li>')
									.attr('id', 'cart-item-'+this.settings.id)
									.data('seatId', this.settings.id)
									.appendTo($cart);

								$counter.text(sc.find('selected').length+1);
								$total.text(recalculateTotal(sc)+price);
											
								return 'selected';
							} else if (this.status() == 'selected') { //Checked
									//Update Number
									$counter.text(sc.find('selected').length-1);
									//update totalnum
									$total.text(recalculateTotal(sc)-price);
										
									//Delete reservation
									$('#cart-item-'+this.settings.id).remove();
									//optional
									return 'available';
							} else if (this.status() == 'unavailable') { //sold
								return 'unavailable';
							} else {
								return this.style();
							}
						}
					});
					//sold seat
					sc.get(['1_2', '4_4','4_5','6_6','6_7','8_5','8_6','8_7','8_8', '10_1', '10_2']).status('unavailable');
						
				});
				//sum total money
				function recalculateTotal(sc) {
					var total = 0;
					sc.find('selected').each(function () {
						total += price;
					});
							
					return total;

				}

			
			</script>
	</div>
</div>
<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "user_accounts";

$connect=mysqli_connect($server, $user, $password, $database);

if (!$connect) {
	die("ERROR: Cannot connect to database $database on server $server using username $user(".mysqli_connect_errno().", ".mysqli_connect_error().")");
}
extract($_POST);
$phonenumber      =$_POST['phonenumber'];
$cart             =$_['selected-seats'];
$total            =$_['total'];
if(isset($_["booknow"])){
$userQuery        = "insert into movie1(phone,tickets,total ) values('$phonenumber', '$counter','$total')";

$result = mysqli_query($connect, $userQuery);

if (!$result) {
	die("Could no successfully run Query ($userQuery) from $database: " .mysqli_error($connect));
}
else{
	header('payment.html');
}
}
mysqli_close($connect);



?>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>
