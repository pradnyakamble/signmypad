<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<title>Login | Tachyon Administration Template</title>
	
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="copyright" content="">
	<meta name="author" content="">
	<meta name="language" content="English">
	<meta name="robots" content="index, follow">
	<meta property="fb:page_id" content="XXX"> <!-- XXX = Facebook Fan Page ID -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Icons -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	
	<!-- CSS Styles -->
	<link rel="stylesheet" href="public/css/screen.css">
	<link rel="stylesheet" href="public/css/colors.css">
	<link rel="stylesheet" href="public/css/jquery.tipsy.css">
	
	<!-- Google WebFonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;v2' rel='stylesheet' type='text/css'>
	
	<!-- Modernizr adds classes to the <html> element which allow you to target specific browser functionality in your stylesheet -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="public/js/jquery/jquery.tipsy.js"></script>
<script src="public/js/login.js"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
     $("#loginForm").validate();
    });
</script>
	
</head>
<body class="login">
    <div class="login-wrapper">
    <!-- Notification -->
      <?php if($this->session->flashdata('message')){ ?>
        <div class="notification error">
            <a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
            <h4>Error notification</h4>
            <p><?php echo $this->session->flashdata('message'); ?></p>
        </div>
    <?php } ?>
        <!-- /Notification -->
        <!-- Full width content box -->
        <article class="content-box minimizer">
            <header>
                <h2>Admin</h2>
                <nav>
                        <p id="logaction">Not a member yet? <a class="regtoggle" href="#">Join us</a>!</p>
                        <p id="regaction">Already a member? <a class="regtoggle" href="#">Log in</a>!</p>
                </nav>
            </header>
        <section>		
            <div id="logform">
                <div style="margin:0px 0px 10px 16px;">If you have an account with us, then please login here</div>
                    <form action="<?php echo base_url(); ?>login/authentication" method="post" id="loginForm" >
                        <dl>
		
        <dt><label>Email Address</label><span class="rght star"></dt>
        <dd><input type="text" name="email" id="email" class="required email" value="<?php echo $this->input->cookie('email',TRUE); ?>">
            <font color=red><?php echo form_error('email'); ?></font></dd>
 		
        <dt><label>Password</label></dt>
        <dd><input type="password" name="password" id="password" class="required" value="<?php echo $this->input->cookie('password',TRUE); ?>">
                <font color=red><?php echo form_error('password'); ?></font></dd>
        
        <dt class="checkbox remember"><label class="left_txt">Remember Me</label></dt>
        <dd><input type="checkbox" name="remember" value="remember" /></dd>
                        </dl>
                        <input type="submit" value="LOGIN" name="btnlogin" class="submit"/>
                    </form>
            </div>
        </section>
        <footer>
            <ul class="login-links">
                    <li><a href="<?php echo base_url(); ?>login/forgotPassword">Lost password?</a></li>
                    <li><a href="#">Wiki</a></li>
                    <li><a href="#">Back to page</a></li>
            </ul>
        </footer>
    </article>
</div>

<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>
