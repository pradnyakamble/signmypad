<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<title>SignMyPdf Administration Template</title>
	
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Icons -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	
	<!-- CSS Styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/screen.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/colors.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.muon.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.tipsy.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.wysiwyg.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.datatables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.nyromodal.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.datepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.fileinput.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.fullcalendar.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.visualize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.snippet.css">
	
	<!-- Google WebFonts -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Open+Sans:400,400italic,700,700italic&amp;v2' rel='stylesheet' type='text/css'>
	
	<!-- Modernizr adds classes to the <html> element which allow you to target specific browser functionality in your stylesheet -->
	<script src="<?php echo base_url(); ?>public/js/libs/modernizr-1.7.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<!--[if IE]><script src="js/jquery/excanvas.js"></script><![endif]--><!-- IE Canvas Fix for Visualize Charts -->
	<script src="<?php echo base_url(); ?>public/js/libs/selectivizr.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.visualize.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.visualize.tooltip.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.tipsy.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.nyromodal.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.wysiwyg.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.datatables.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.datepicker.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.fileinput.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.fullcalendar.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.ui.totop.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.snippet.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery/jquery.muonmenu.js"></script>
	<script src="<?php echo base_url(); ?>public/js/script.js"></script>
   <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
</head>
<body>	
   
	<!-- Muon jQuery Sticky Dropdown Menu 1.0 -->
	<header class="muon">
	
		<div class="navigation-wrapper">
		
			<!-- Logo -->
			<a href="/" class="muon-logo" title="Back to homepage">Your logo</a>
			
			<!-- Root navigation block -->
			<nav>
			
				<!-- Root menu level -->
				<ul>
					
					<!-- Root menu items -->
					<li><a href="/" class="muon-no-submenu">Dashboard</a></li>
					<li><a href="<?php echo base_url(); ?>admin/manageuser">MANAGE USERS</a>
					
						<!-- Submenu block divided to five blocks -->
						
					</li>
					
					<!-- Root menu item -->
                                        <li><a href="<?php echo base_url(); ?>admin/pdfmanager">Manage Pdf</a>
	
						<!-- Submenu block divided to five blocks -->
						
						<!-- End of submenu block -->
						
					</li>
	
					<!-- Root menu item -->
					<li><a href="#">Users</a>
					
						<!-- Submenu block divided to three blocks -->
						
						<!-- End of submenu block -->
						
					</li>
	
				<!-- End of root menu level -->
				</ul>
				
			<!-- End of root navigation block -->
			</nav>
			
			<!-- User list -->
			<ul class="muon-user-list">
				<li class="muon-user-data">Welcome, <a href="#"><?php $userSessData = $this->session->userdata('userdata');
        echo  $userSessData['user_fname'].' '.$userSessData['user_lname']; ?></a></li>
				<li><a class="muon-signup" title="Messages" href="#">Messages</a></li>
				<li><a class="muon-settings" title="Settings" href="#">Settings</a></li>
                                <li><a class="muon-logout" title="Logout" href="<?php echo base_url();?>admin/signout">Logout</a></li>
			</ul>
			
		</div>
	
	</header>