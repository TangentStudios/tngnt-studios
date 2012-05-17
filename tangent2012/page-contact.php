<?php /* Template Name: Contact */ ?>
<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['message']) === '') {
		$messageError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'Contact Form Submission from: '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = '<html><body>';
		$body .= '<div style="width: 560px; margin: 0 auto; padding: 20px; font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #333;">';
		$body .= '<div style="border-bottom: 1px solid #ddd; padding-bottom: 5px; margin-bottom: 20px; overflow: auto;">';
		$body .= '<img src="http://tngnt.co/files/resources/Tangent_Split_Circle_50.png" alt="Tangent Studios Logo" style="margin-right: 20px; float: left;" />';
		$body .= '<h1 style="float: left; font-size: 18px; line-height: 20px; color: #111;">Contact Form - Tangent Studios</h1></div>';
		$body .= "<p><strong>Name/Company:</strong><br>";
		$body .= "<em>$name</em></p>";
		$body .= "<p><strong>Contact Email:</strong><br>";
		$body .= "<em>$email</em></p>";
		$body .= "<p><strong>Message:</strong><br>";
		$body .= "<em>$message</em></p>";
		$body .= '<div style="border-top: 1px solid #ddd; padding-top: 5px; margin-top: 40px; font-size: 9px;">';
		$body .= "<p><em>This email is strictly confidential and none of you details will be shared. We only use this information to formulate an estimate for you, and to see if you will be a good fit for us. If we can't do what you require, we will direct you to someone we think can.</em></p>";
		$body .= '</div></div>';
		$body .= "</body></html>";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
		$headers .= 'Reply-To: '.$email . "\r\n";

		mail($emailTo, $subject, $body, $headers);
		
		if($sendCopy == true) {
			$subject = 'You emailed Tangent Studios';
			$headers = 'From: Tangent Studios <'.$emailTo.'>';
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($email, $subject, $body, $headers);
		}

		$emailSent = true;
	}

} ?>
<?php get_header(); ?>
	<div id="hero" class="clearfix">
		<h2>Get in touch.</h2>
	</div> <!--end #hero-->
	<div id="main" class="clearfix">
		<section id="contentwrapper">
			<div class="articlewrap clearfix">
				<article>
					<h3>Say Hello!</h3>
					<p>We'd love to hear from you, whether it's an enquiry about your next project, or you just want to get to know us better. Use the form bellow, or send an email to <a href="mailto:<?php echo antispambot(get_bloginfo('admin_email'), 1); ?>?subject=Hello%20Tangent%20Studios" title="Email Tangent Studios"><?php echo antispambot(get_bloginfo('admin_email'), 0); ?></a> and we'll get back to you!</p>
				</article>
			</div>
			<div class="articlewrap form clearfix">
				<article>
					<?php if(isset($emailSent) && $emailSent == true) { ?>
						<div class="thanks">
							<h3>Thanks, your email was sent successfully.</h3>
							<p><em>Please note, if you ticked "send a copy to yourself", you may have to check your spam folder.</em></p>
						</div>
					<?php } else { ?>
					<?php if(isset($hasError) || isset($captchaError)) { ?>
						<div class="whoops">
							<h3 class="error">Sorry, an error occured.</h3>
						</div>
					<?php } ?>
	
						<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
							<ul>
								<li>
									<label for="contactName">Name:</label>
									<input type="text" name="contactName" id="contactName" class="textInput" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
									<?php if($nameError != '') { ?>
										<span class="error"><?=$nameError;?></span>
									<?php } ?>
								</li>
	
								<li>
									<label for="email">Email:</label>
									<input type="email" name="email" id="email" class="textInput" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
									<?php if($emailError != '') { ?>
										<span class="error"><?=$emailError;?></span>
									<?php } ?>
								</li>
	
								<li><label for="messageText">Message:</label>
									<textarea name="message" id="messageText" class="textInput" rows="10" cols="30" class="required requiredField"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
									<?php if($messageError != '') { ?>
										<span class="error"><?=$messageError;?></span>
									<?php } ?>
								</li>
								
								<li class="checkbox">
									<input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Send a copy to yourself</label>
								</li>
								
								<li>
									<input type="submit" id="submit" value="Send!"></input>
								</li>
							</ul>
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</form>
					<?php } ?>
				</article>
			</div>
		</section> <!--end #contentwrapper-->
		
		<section id="sidebar" class="clearfix">
			<div class="sctn">
				<div class="section">
					<h3>Email</h3>
					<p class="clearfix"><a href="mailto:<?php echo antispambot(get_bloginfo('admin_email'), 1); ?>?subject=Hello%20Tangent%20Studios" title="Email Tangent Studios" class="btn"><?php echo antispambot(get_bloginfo('admin_email'), 0); ?></a></p>
				</div>
				
				<div class="section right">
					<h3>Telephone</h3>
					<p class="phone clearfix">
						<span>Sam:</span> +44 7545 175919<br>
						<span>Eoin:</span> +44 7921 809003
					</p>
				</div>
				
				<div class="section third">
					<h3>Address</h3>
					<p class="clearfix"><strong>Tangent Studios</strong><br>
					Conic House<br>
					Southway<br>
					Guildford<br>
					Surrey, GU2 8DT<br>
					United Kingdom</p>
				</div>
				
				<div class="section right">
					<h3>Social</h3>
					<p class="clearfix social-links"><a href="http://tngnt.co/twitter" class="twitter">Twitter</a>
					<a href="http://tngnt.co/facebook" class="facebook">Facebook</a>
					<a href="http://tngnt.co/linkedin" class="linkedin">Linkedin</a></p>
				</div>
			</div> <!--end .sctn-->
		</section> <!--end #sidebar-->
<?php get_footer(); ?>
