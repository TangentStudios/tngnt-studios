<?php /* Template Name: Screener */ ?>
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

		if(trim($_POST['structure']) === '') {
			$structure = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$structure = stripslashes(trim($_POST['structure']));
			} else {
				$structure = trim($_POST['structure']);
			}
		}
		if(trim($_POST['summarize']) === '') {
			$summarize = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$summarize = stripslashes(trim($_POST['summarize']));
			} else {
				$summarize = trim($_POST['summarize']);
			}
		}
		if(trim($_POST['redesign']) === '') {
			$redesign = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$redesign = stripslashes(trim($_POST['redesign']));
			} else {
				$redesign = trim($_POST['redesign']);
			}
		}
		if(trim($_POST['goals']) === '') {
			$goals = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$goals = stripslashes(trim($_POST['goals']));
			} else {
				$goals = trim($_POST['goals']);
			}
		}
		if(trim($_POST['team']) === '') {
			$team = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$team = stripslashes(trim($_POST['team']));
			} else {
				$team = trim($_POST['team']);
			}
		}
		if(trim($_POST['partners']) === '') {
			$partners = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$partners = stripslashes(trim($_POST['partners']));
			} else {
				$partners = trim($_POST['partners']);
			}
		}
		if(trim($_POST['motivation']) === '') {
			$motivation = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$motivation = stripslashes(trim($_POST['motivation']));
			} else {
				$motivation = trim($_POST['motivation']);
			}
		}
		if(trim($_POST['completion']) === '') {
			$completion = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$completion = stripslashes(trim($_POST['completion']));
			} else {
				$completion = trim($_POST['completion']);
			}
		}
		if(trim($_POST['important']) === '') {
			$important = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$important = stripslashes(trim($_POST['important']));
			} else {
				$important = trim($_POST['important']);
			}
		}
		
		if(trim($_POST['rebrand']) === '') {
			$rebrand = "Option wasn't selected. Not Important.";
		} else {
			$rebrand = trim($_POST['rebrand']);
		}
		if(trim($_POST['metrics']) === '') {
			$metrics = "Option wasn't selected. Not Important.";
		} else {
			$metrics = trim($_POST['metrics']);
		}
		if(trim($_POST['writing']) === '') {
			$writing = "Option wasn't selected. Not Important.";
		} else {
			$writing = trim($_POST['writing']);
		}
		if(trim($_POST['speed']) === '') {
			$speed = "Option wasn't selected. Not Important.";
		} else {
			$speed = trim($_POST['speed']);
		}
		if(trim($_POST['cheap']) === '') {
			$cheap = "Option wasn't selected. Not Important.";
		} else {
			$cheap = trim($_POST['cheap']);
		}
		if(trim($_POST['competition']) === '') {
			$competition = "Option wasn't selected. Not Important.";
		} else {
			$competition = trim($_POST['competition']);
		}
		if(trim($_POST['reach']) === '') {
			$reach = "Option wasn't selected. Not Important.";
		} else {
			$reach = trim($_POST['reach']);
		}
		if(trim($_POST['value']) === '') {
			$value = "Option wasn't selected. Not Important.";
		} else {
			$value = trim($_POST['value']);
		}
		if(trim($_POST['relationship']) === '') {
			$relationship = "Option wasn't selected. Not Important.";
		} else {
			$relationship = trim($_POST['relationship']);
		}
		
		if(trim($_POST['audience']) === '') {
			$audience = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$audience = stripslashes(trim($_POST['audience']));
			} else {
				$audience = trim($_POST['audience']);
			}
		}
		if(trim($_POST['success']) === '') {
			$success = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$success = stripslashes(trim($_POST['success']));
			} else {
				$success = trim($_POST['success']);
			}
		}
		if(trim($_POST['worried']) === '') {
			$worried = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$worried = stripslashes(trim($_POST['worried']));
			} else {
				$worried = trim($_POST['worried']);
			}
		}
		if(trim($_POST['easier']) === '') {
			$easier = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$easier = stripslashes(trim($_POST['easier']));
			} else {
				$easier = trim($_POST['easier']);
			}
		}
		if(trim($_POST['budjet']) === '') {
			$budjet = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$budjet = stripslashes(trim($_POST['budjet']));
			} else {
				$budjet = trim($_POST['budjet']);
			}
		}
		if(trim($_POST['selection']) === '') {
			$selection = 'No answer was given.';
		} else {
			if(function_exists('stripslashes')) {
				$selection = stripslashes(trim($_POST['selection']));
			} else {
				$selection = trim($_POST['selection']);
			}
		}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'New Request Form from: '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = '<html><body>';
		$body .= '<div style="width: 560px; margin: 0 auto; padding: 20px; font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #333;">';
		$body .= '<div style="border-bottom: 1px solid #ddd; padding-bottom: 5px; margin-bottom: 20px; overflow: auto;">';
		$body .= '<img src="http://tngnt.co/files/resources/Tangent_Split_Circle_50.png" alt="Tangent Studios Logo" style="margin-right: 20px; float: left;" />';
		$body .= '<h1 style="float: left; font-size: 18px; line-height: 20px; color: #111;">Request Form - Tangent Studios</h1></div>';
		$body .= "<p><strong>Name/Company:</strong><br>";
		$body .= "<em>$name</em></p>";
		$body .= "<p><strong>Contact Email:</strong><br>";
		$body .= "<em>$email</em></p>";
		$body .= "<p><strong>What is the primary business and structure of your business/organization?</strong><br>";
		$body .= "<em>$structure</em></p>";
		$body .= "<p><strong>Summarize the project:</strong><br>";
		$body .= "<em>$summarize</em></p>";
		$body .= "<p><strong>Is this a redesign of something that exists or designing something new?</strong><br>";
		$body .= "<em>$redesign</em></p>";
		$body .= "<p><strong>What are your major goals for this project?</strong><br>";
		$body .= "<em>$goals</em></p>";
		$body .= "<p><strong>Where do you see us adding the most value/complementing your existing team?</strong><br>";
		$body .= "<em>$team</em></p>";
		$body .= "<p><strong>Who will be working on this project from your end? Will any additional outside partners or agencies be involved and how?</strong><br>";
		$body .= "<em>$partners</em></p>";
		$body .= "<p><strong>What is motivating you or enabling you to do this project now?</strong><br>";
		$body .= "<em>$motivation</em></p>";
		$body .= "<p><strong>When does our work need to be finished? What is your target total completion date? What is driving that?</strong><br>";
		$body .= "<em>$completion</em></p>";
		$body .= "<p><strong><em>What is most important about this project?</em></strong><br>";
		$body .= "<em>$important</em></p>";
		$body .= "<p><strong>How important is each of these?</strong><br>";
		$body .= '<ul><li style="margin-bottom: 10px;"><strong>Rebranding/New image/Look and feel</strong><br><em>'.$rebrand.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Improving key metrics/Quantifying success or results/Conversion</strong><br><em>'.$metrics.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Content strategy/writing</strong><br><em>'.$writing.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Getting it done as fast as possible</strong><br><em>'.$speed.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Getting it done as inexpensively as possible</strong><br><em>'.$cheap.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Differentiating from competition</strong><br><em>'.$competition.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Reach new audience</strong><br><em>'.$reach.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Better demonstrate value or correct misconceptions</strong><br><em>'.$value.'</em></li>';
		$body .= '<li style="margin-bottom: 10px;"><strong>Working relationship/communication with your design partner</strong><br><em>'.$relationship.'</em></li></ul></p>';
		$body .= "<p><strong>Who is/are your audience/your target users/your customers?</strong><br>";
		$body .= "<em>$audience</em></p>";
		$body .= "<p><strong>What does success look like? How will you know this project has succeeded?</strong><br>";
		$body .= "<em>$success</em></p>";
		$body .= "<p><strong>What are you worried about? What do you imagine going wrong?</strong><br>";
		$body .= "<em>$worried</em></p>";
		$body .= "<p><strong>Is there anything about your organization that might make this project easier or harder in any specific ways?</strong><br>";
		$body .= "<em>$easier</em></p>";
		$body .= "<p><strong>What is your budget range?</strong><br>";
		$body .= "<em>$budget</em></p>";
		$body .= "<p><strong>What does the selection process look like on your end? How many people are you talking to and when do you expect to be making a decision?</strong><br>";
		$body .= "<em>$selection</em></p>";
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
			$subject = 'You sent a Request form to Tangent Studios';
			$body = '<html><body>';
			$body .= '<div style="width: 560px; margin: 0 auto; padding: 20px; font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #333;">';
			$body .= '<div style="border-bottom: 1px solid #ddd; padding-bottom: 5px; margin-bottom: 20px; overflow: auto;">';
			$body .= '<img src="http://tngnt.co/files/resources/Tangent_Split_Circle_50.png" alt="Tangent Studios Logo" style="margin-right: 20px; float: left;" />';
			$body .= '<h1 style="float: left; font-size: 18px; line-height: 20px; color: #111;">Request Form - Tangent Studios</h1></div>';
			$body .= '<p style="font-family: Georgia, Times, serif; font-size: 14px; font-style: italic;">Thankyou for you Estimate Request. We will try to fufill your request ASAP and we hope we are a good fit for your project!</p>';
			$body .= "<p><strong>Name/Company:</strong><br>";
			$body .= "<em>$name</em></p>";
			$body .= "<p><strong>Contact Email:</strong><br>";
			$body .= "<em>$email</em></p>";
			$body .= "<p><strong>What is the primary business and structure of your business/organization?</strong><br>";
			$body .= "<em>$structure</em></p>";
			$body .= "<p><strong>Summarize the project:</strong><br>";
			$body .= "<em>$summarize</em></p>";
			$body .= "<p><strong>Is this a redesign of something that exists or designing something new?</strong><br>";
			$body .= "<em>$redesign</em></p>";
			$body .= "<p><strong>What are your major goals for this project?</strong><br>";
			$body .= "<em>$goals</em></p>";
			$body .= "<p><strong>Where do you see us adding the most value/complementing your existing team?</strong><br>";
			$body .= "<em>$team</em></p>";
			$body .= "<p><strong>Who will be working on this project from your end? Will any additional outside partners or agencies be involved and how?</strong><br>";
			$body .= "<em>$partners</em></p>";
			$body .= "<p><strong>What is motivating you or enabling you to do this project now?</strong><br>";
			$body .= "<em>$motivation</em></p>";
			$body .= "<p><strong>When does our work need to be finished? What is your target total completion date? What is driving that?</strong><br>";
			$body .= "<em>$completion</em></p>";
			$body .= "<p><strong><em>What is most important about this project?</em></strong><br>";
			$body .= "<em>$important</em></p>";
			$body .= "<p><strong>How important is each of these?</strong><br>";
			$body .= '<ul><li style="margin-bottom: 10px;"><strong>Rebranding/New image/Look and feel</strong><br><em>'.$rebrand.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Improving key metrics/Quantifying success or results/Conversion</strong><br><em>'.$metrics.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Content strategy/writing</strong><br><em>'.$writing.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Getting it done as fast as possible</strong><br><em>'.$speed.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Getting it done as inexpensively as possible</strong><br><em>'.$cheap.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Differentiating from competition</strong><br><em>'.$competition.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Reach new audience</strong><br><em>'.$reach.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Better demonstrate value or correct misconceptions</strong><br><em>'.$value.'</em></li>';
			$body .= '<li style="margin-bottom: 10px;"><strong>Working relationship/communication with your design partner</strong><br><em>'.$relationship.'</em></li></ul></p>';
			$body .= "<p><strong>Who is/are your audience/your target users/your customers?</strong><br>";
			$body .= "<em>$audience</em></p>";
			$body .= "<p><strong>What does success look like? How will you know this project has succeeded?</strong><br>";
			$body .= "<em>$success</em></p>";
			$body .= "<p><strong>What are you worried about? What do you imagine going wrong?</strong><br>";
			$body .= "<em>$worried</em></p>";
			$body .= "<p><strong>Is there anything about your organization that might make this project easier or harder in any specific ways?</strong><br>";
			$body .= "<em>$easier</em></p>";
			$body .= "<p><strong>What is your budget range?</strong><br>";
			$body .= "<em>$budget</em></p>";
			$body .= "<p><strong>What does the selection process look like on your end? How many people are you talking to and when do you expect to be making a decision?</strong><br>";
			$body .= "<em>$selection</em></p>";
			$body .= '<div style="border-top: 1px solid #ddd; padding-top: 5px; margin-top: 40px; font-size: 9px;">';
			$body .= "<p><em>This email is strictly confidential and none of you details will be shared. We only use this information to formulate an estimate for you, and to see if you will be a good fit for us. If we can't do what you require, we will direct you to someone we think can.</em></p>";
			$body .= '</div></div>';
			$body .= "</body></html>";
			$headers = 'From: Tangent Studios <'.$emailTo.'>';
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($email, $subject, $body, $headers);
		}

		$emailSent = true;
	}

} ?>
<?php get_header(); ?>
	<div id="main" class="clearfix">
		<section id="estimatewrapper">
			<div class="articlewrap clearfix">
				<article>
					<h3>Think we could work together? Fill out this request form.</h3>
					<p>It looks daunting but it's really not! Use the form bellow to tell us a bit about you or your company. Please try to give accurate, thoughtful, detailed replies to the questions given below. Your reply will help us gain valuable insight on your company, the business you conduct, and your customers. Most importantly, your replies will help us decide if we can be a good fit for your project!</p>
				</article>
			</div>
			<div class="articlewrap form clearfix">
				<article>
					<?php if(isset($emailSent) && $emailSent == true) { ?>
						<div class="thanks">
							<h3>Thanks, your request was sent successfully.</h3>
							<p><em>Please note, if you ticked "send a copy to yourself", you may have to check your spam folder.</em></p>
							<p>Thank you for taking the time out of your day to fill out this form! Your time is valuable to us, so thank you! If you have questions, please do not hesitate to <a href="<?php bloginfo('url'); ?>/contact/">contact us</a>.</p>
						</div>
					<?php } else { ?>
					<?php if(isset($hasError) || isset($captchaError)) { ?>
						<div class="whoops">
							<h3 class="error">Sorry, an error occured.</h3>
						</div>
					<?php } ?>
	
						<form action="<?php the_permalink(); ?>" id="screenerForm" method="post">
							<ul>
								<li>
									<label for="contactName">Name/Company:</label>
									<input type="text" name="contactName" id="contactName" class="textInput" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
									<?php if($nameError != '') { ?>
										<span class="error"><?=$nameError;?></span>
									<?php } ?>
								</li>
	
								<li>
									<label for="email">Contact Email:</label>
									<input type="email" name="email" id="email" class="textInput" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
									<?php if($emailError != '') { ?>
										<span class="error"><?=$emailError;?></span>
									<?php } ?>
								</li>
	
								<li><label for="structure">What is the primary business and structure of your business/organization?</label>
									<textarea name="structure" id="structure" class="textInput" rows="6" cols="30"><?php if(isset($_POST['structure'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['structure']); } else { echo $_POST['structure']; } } ?></textarea>
									
								</li>
								
								<li><label for="summarize">Summarize the project:</label>
									<textarea name="summarize" id="summarize" class="textInput" rows="6" cols="30"><?php if(isset($_POST['summarize'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['summarize']); } else { echo $_POST['summarize']; } } ?></textarea>
									
								</li>
								
								<li><label for="redesign">Is this a redesign of something that exists or designing something new?</label>
									<textarea name="redesign" id="redesign" class="textInput" rows="6" cols="30"><?php if(isset($_POST['redesign'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['redesign']); } else { echo $_POST['redesign']; } } ?></textarea>
									
								</li>
								
								<li><label for="goals">What are your major goals for this project?</label>
									<textarea name="goals" id="goals" class="textInput" rows="6" cols="30"><?php if(isset($_POST['goals'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['goals']); } else { echo $_POST['goals']; } } ?></textarea>
									
								</li>
								
								<li><label for="team">Where do you see us adding the most value/complementing your existing team?</label>
									<textarea name="team" id="team" class="textInput" rows="6" cols="30"><?php if(isset($_POST['team'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['team']); } else { echo $_POST['team']; } } ?></textarea>
									
								</li>
								
								<li><label for="partners">Who will be working on this project from your end? Will any additional outside partners or agencies be involved and how?</label>
									<textarea name="partners" id="partners" class="textInput" rows="6" cols="30"><?php if(isset($_POST['partners'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['partners']); } else { echo $_POST['partners']; } } ?></textarea>
									
								</li>
								
								<li><label for="motivation">What is motivating you or enabling you to do this project now?</label>
									<textarea name="motivation" id="motivation" class="textInput" rows="6" cols="30"><?php if(isset($_POST['motivation'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['motivation']); } else { echo $_POST['motivation']; } } ?></textarea>
									
								</li>
								
								<li><label for="completion">When does our work need to be finished? What is your target total completion date? What is driving that?</label>
									<textarea name="completion" id="completion" class="textInput" rows="6" cols="30"><?php if(isset($_POST['completion'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['completion']); } else { echo $_POST['completion']; } } ?></textarea>
									
								</li>
								
								<li><label for="important">What is most important about this project?</label>
									<textarea name="important" id="important" class="textInput" rows="6" cols="30"><?php if(isset($_POST['important'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['important']); } else { echo $_POST['important']; } } ?></textarea>
									
								</li>
								
								<li><p>How important is each of these?</p>
									<label for="rebrand">Rebranding/New image/Look and feel</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="rebrand" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="rebrand" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="rebrand" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="rebrand" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="rebrand" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="metrics">Improving key metrics/Quantifying success or results/Conversion</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="metrics" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="metrics" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="metrics" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="metrics" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="metrics" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="writing">Content strategy/writing</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="writing" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="writing" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="writing" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="writing" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="writing" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="speed">Getting it done as fast as possible</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="speed" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="speed" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="speed" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="speed" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="speed" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="cheap">Getting it done as inexpensively as possible</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="cheap" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="cheap" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="cheap" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="cheap" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="cheap" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="competition">Differentiating from competition</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="competition" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="competition" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="competition" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="competition" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="competition" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="reach">Reach new audience</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="reach" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="reach" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="reach" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="reach" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="reach" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="value">Better demonstrate value or correct misconceptions</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="value" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="value" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="value" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="value" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="value" value="5 - Very important">5 - Very important</div>
									</div>
									
									<label for="relationship">Working relationship/communication with your design partner</label>
									<div class="options">
										<div class="clearfix"><input type="radio" name="relationship" value="1 - Not important">1 - Not important</div>
										<div class="clearfix"><input type="radio" name="relationship" value="2 - A little important">2 - A little important</div>
										<div class="clearfix"><input type="radio" name="relationship" value="3 - Quite important">3 - Quite important</div>
										<div class="clearfix"><input type="radio" name="relationship" value="4 - Important">4 - Important</div>
										<div class="clearfix"><input type="radio" name="relationship" value="5 - Very important">5 - Very important</div>
									</div>
									
								</li>
								
								<li><label for="audience">Who is/are your audience/your target users/your customers?</label>
									<textarea name="audience" id="audience" class="textInput" rows="6" cols="30"><?php if(isset($_POST['audience'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['audience']); } else { echo $_POST['audience']; } } ?></textarea>
									
								</li>
								
								<li><label for="success">What does success look like? How will you know this project has succeeded?</label>
									<textarea name="success" id="success" class="textInput" rows="6" cols="30"><?php if(isset($_POST['success'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['success']); } else { echo $_POST['success']; } } ?></textarea>
									
								</li>
								
								<li><label for="worried">What are you worried about? What do you imagine going wrong?</label>
									<textarea name="worried" id="worried" class="textInput" rows="6" cols="30"><?php if(isset($_POST['worried'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['worried']); } else { echo $_POST['worried']; } } ?></textarea>
									
								</li>
								
								<li><label for="easier">Is there anything about your organization that might make this project easier or harder in any specific ways?</label>
									<textarea name="easier" id="easier" class="textInput" rows="6" cols="30"><?php if(isset($_POST['easier'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['easier']); } else { echo $_POST['easier']; } } ?></textarea>
									
								</li>
								
								<li><label for="budget">What is your budget range?</label>
									<input type="text" name="budget" id="budget" class="textInput" value="£<?php if(isset($_POST['budget'])) echo $_POST['budget'];?>" />
								</li>
								
								<li><label for="selection">What does the selection process look like on your end? How many people are you talking to and when do you expect to be making a decision?</label>
									<textarea name="selection" id="selection" class="textInput" rows="6" cols="30"><?php if(isset($_POST['selection'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['selection']); } else { echo $_POST['selection']; } } ?></textarea>
									
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
<?php get_footer(); ?>
