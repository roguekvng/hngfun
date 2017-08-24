<!DOCTYPE html>
<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    $name = $_POST['name'];
    $to  = 'ordrizzy@gmail.com';
    $message = $_POST['message'];

    if($message == '' || $message == ' ') {
      $error[] = 'Message cannot be empty.';
    }

    if($name == '' || $name == ' ') {
      $error[] = 'name cannot be empty.';
    }

    if(empty($error)) {
      $config = include(dirname(dirname(dirname(__FILE__))).'config.php');
      $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
      $con = new PDO($dsn, $config['username'], $config['pass']);
      $exe = $con->query('SELECT * FROM password LIMIT 1');
      $data = $exe->fetch();
      $password = $data['password'];
      $uri = "/sendmail.php?to=$to&message=$message&name=$name&password=$password";
      header("location: $uri");

    }

  }

 ?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Sun, 20 Aug 2017 07:08:59 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Tiwa Profile</title>
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple" rel="stylesheet" type="text/css" />

	<!-- Style -->
	<style>
		   @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);
		  .social-icon {
		  color:#fff;
		   }
		  ul.social-icons {
		     margin-top:10px;
		     align-items: center;
		  }
		  .social-icons li {
		     vertical-align:top;
		     display:inline;
		     height:100px;
		  }
		  .social-icons a {
		     color:#fff;
			 text-decoration:none;
		   }
		  .fa-instagram {
		     padding:10px 12px;
			 -o-transition:.5s;
			 -ms-transition:.5s;
			 -moz-transition:.5s;
			 -webkit-transition:.5s;
			 transition:.5s;
			 background-color:#322f30;
		   }
		  .fa-instagram:hover {
		     color:#f0f;
		   }
		  .fa-slack {
		     padding:10px 12px;
			 -o-transition:.5s;
			 -ms-transition:.5s;
			 -moz-transition:.5s;
			 -webkit-transition:.5s;
			 transition:.5s;
			 background-color:#322f30;
		   }
		  .fa-slack:hover {
		     color:#0ff;
			}
		  .fa-github {
		     padding:10px 12px;
			 -o-transition:.5s;
			 -ms-transition:.5s;
			 -moz-transition:.5s;
			 -webkit-transition:.5s;
			 transition:.5s;
			 background-color:#322f30;
			 }
		  .fa-github:hover {
		     color:#ff0;
			  }
		  html, body {
		  background-color:#000;
		  color:#fff;
		  font-family:'Rancho', serif;
		  font-weight:100;
		  height:100vh;
		  margin:0;
		   }
		  .flex-center {
		  	 align-items: center;
			 display:flex;
			 justify-content: center;
		   }
		  .full-height {
		     height: 100vh;
		   }
		  .position-ref {
		     position:relative;
		   }
		  .content {
		     text-align:center;
		   }
		  .title {
		     font-size:60px;
		   }
		  .top-right {
		     position:absolute;
			 right: 10px;
			 left:18px;
		   }
		  .m-b-md {
		     margin-bottom:30px;
		   }
	</style>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  		<div class="flex-center position-ref full-height">
			 <div class="content">
			     <img style="-moz-opacity:0.4;" src="https://scontent.flos8-1.fna.fbcdn.net/v/t1.0-9/16681646_1263674723725886_3249389777281568213_n.jpg?oh=8e916840484be65726588e247c6a4473&oe=5A2C13A6" alt="display" height="200"/>
				 	<div class="title m-b-md shadow-multiple">
					  Ijaware Tiwaloluwa
					</div>
					<p>My name is Tiwaloluwa Ijaware, I code in<b> HTML & CSS </b></p>
					<p><a href="https://github.com/tiwalolu/getting-started-h2-2017" target="_blank">Stage-1-Link</a></p>
					<ul class="social-icons">
			 	 		<li><a href="https://www.instagram.com/tiwaloluu" class="social-icon"><i class="fa fa-instagram"></i></a></li>
				 		<li><a href="https://hnginterns.slack.com/messages/@tiwaloluu" class="social-icon"><i class="fa fa-slack"></i></a></li>
				 		<li><a href="https://github.com/tiwalolu" class="social-icon"><i class="fa fa-github"></i></a></li>
			 		</ul>
					<form action="/sendmail.php" method="GET" enctype="multipart/form-data" name="EmailTestForm">

    First Name:<br>
    <input type="text" size="20" name="VisitorName"><br><br>

    Email Address:<br>
    <input type="text" size="20" name="EmailAddress"><br><br>

    Your Comment:<br>
    <textarea name="VisitorComment" rows="4" cols="20">
    </textarea><br><br>

    <input type="submit" value="Email This Form">
	</form>
			 </div>

		</div>

  </body>
</html>