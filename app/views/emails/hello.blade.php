<?!--This is a blade template that goes in email message to site administrator-->
<?php
//get the first name
$first_name = Input::get('first_name');
$last_name = Input::get ('last_name');
$phone_number = Input::get('phone_number');
$email = Input::get ('email');
$subject = Input::get ('subject');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>

<h1>We been contacted by.... </h1>

<p>
First name: <?php echo ($first_name); ?>
Last name: <?php echo($last_name);?>
Phone number: <?php echo($phone_number);?>
Email address: <?php echo ($email);?>
Subject: <?php echo ($subject); ?>
Message: <?php echo ($message);?>
Date: <?php echo($date_time);?>
User IP address: <?php echo($userIpAddress);?>

</p>
