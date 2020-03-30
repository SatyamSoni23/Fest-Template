<?php
	if(isset($_POST["robowar"])){
		echo "Hello 1";
	}
	else{
		echo "Hello 2";
	}	
?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
	
   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Purv</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
   <link rel="stylesheet" href="css/layoutEvents.css">
   <link rel="stylesheet" href="css/media-queries.css">
   <link rel="stylesheet" href="css/magnific-popup.css">


    <!-- Script
    ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="p.png" >
	
	<style>
	/* width */
	::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	  box-shadow: inset 0 0 5px grey; 
	  border-radius: 10px;
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: #790D00; 
	  border-radius: 10px;
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #b30000; 
	}

</style>

</head>

<body>
   <!-- Preloader
   ================================================== -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<div id="loading"><img src = "images/preloader1.gif"></div>
	<style>
	#loading{
	  position: fixed;
	  height: 100%;
	  top:0;
	  left:0;
	  right:0;
	  bottom:0;
	  background-color: #000;
	  color: white;
	  
	  transition: 0.5s;
	  z-index: 999999;
	}
	#loading img{
	  height: 350px;
	  width: 350px;
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  top: 35%;
	  left: 45%;
	  position: absolute;
      margin: -100px 0 0 -100px;
	}
	#loading.hidden{
	  opacity: 0;
	  visibility: hidden;
	}
	</style>
	<script>
	setTimeout(function() {
	  $('#loading').addClass('hidden');
	}, 2000);

	</script>
	
   <!-- Header
   ================================================== -->
   <header id="home">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="index.php#home">Home</a></li>
            <li><a class="smoothscroll" href="index.php#about">About</a></li>
	        <li><a class="smoothscroll" href="index.php#theme">Theme</a></li>
			<li><a class="smoothscroll" href="index.php#stats">Stats</a></li>
            <li><a class="smoothscroll" href="index.php#events">Events</a></li>
            <li><a class="smoothscroll" href="index.php#contact">Contact</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
	
      <div class="row banner">

<div class="app" >
  <h1><span>Technical Events</span></h1>
      <div class = "hs">
	    <div class = "itemsEvents">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
					  <img src="images/robowar.jpg" alt="Avatar" style="width:100%;height:100%; border-radius: 8px;;">
					</div>
					<div class="flip-card-back">
					  <h1>Robowar</h1>
					  <p style = "text-align: center;">Various robots will fight with each other. Predefined track will be given to the participants.</p>
					  <p>Rules and Regulations:</p>
					  <ul>
						  <li class="cardLi" type="circle"><span>>  Dimension of robots should be maximum of 30X30 inches</span></li>
						  <li class="cardLi" type="circle"><span>>  Weight of robot should not be more than 2 kgs</span></li>
						  <li class="cardLi" type="circle"><span>>  Power supply limits to 12 volts.</span></li>
						  <li class="cardLi" type="circle"><span>>  Participants need to carry their identity card.</span></li>
					  </ul>
					  <form method = "post">
					  <Button class = "eventReg" id="myBtn" name = "robowar" value = "robowar">Register</Button>
					  <form>
					</div>
				</div>
			 </div>
		</div>
		<div class = "itemsEvents">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
					  <img src="images/robosoccer.jpg" alt="Avatar" style="width:100%;height:100%; border-radius: 8px;;">
					</div>
					<div class="flip-card-back">
					<h1>Robosoccer</h1>
					  <p style = "text-align: center;">Are you a lover of both football and bots? Then this is the right place for you to combine these two and showcase your talent. *Robo Soccer* is a game of soccer played by bots between two teams, where you can score a goal like Ronaldo or Messi, or defend like Ramos or Cellini. Step into the arena and show us what you got.
					  </p>
					  <p>Rules and Regulations:</p>
					  <ul>
						  <li class="cardLi" type="circle"><span>>  Dimension of robots should be maximum of 15X15 inches</span></li>
						  <li class="cardLi" type="circle"><span>>  Weight of robot should not be more than 2 kgs</span></li>
						  <li class="cardLi" type="circle"><span>>  Power supply limits to 12 volts.</span></li>
						  <li class="cardLi" type="circle"><span>>  Participants need to carry their identity card.</span></li>
					  </ul>
					  <Button class = "eventReg" id="myBtn1" name = "robosoccer">Register</Button>
					  
					</div>	
				</div>
			 </div>
		</div>	 
		<div class = "itemsEvents">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
					  <img src="images/roborace.jpg" alt="Avatar" style="width:100%;height:100%; border-radius: 8px;;">
					</div>
					<div class="flip-card-back">
					<h1>Roborace</h1>
					  <p style = "text-align: center;">Robots will race with each other crossing many hurdles.</p>
					  <p>Rules and Regulations:</p>
					  <ul>
					  	   <li class="cardLi" type="circle"><span>>  Dimension of robots should be maximum of 15X15 inches</span></li>
						  <li class="cardLi" type="circle"><span>>  Speed as well as troubles in the track should be considered by any team
																	participating. </span></li>
						  <li class="cardLi" type="circle"><span>>  The team scoring maximum points will be the winner</span></li>
						  <li class="cardLi" type="circle"><span>>  Participants need to carry their identity card.</span></li>
					  </ul>
					  <Button class = "eventReg" id="myBtn2" name = "roborace">Register</Button>
					</div>	
				</div>
			 </div>
		</div>	 
		<div class = "itemsEvents">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
					  <img src="images/lightfollower.jpg" alt="Avatar" style="width:100%;height:100%; border-radius: 8px;;">
					</div>
					<div class="flip-card-back">
					<h1>Light Follower</h1>
					  <p style = "text-align: center;">There will be a race of autonomous robot which has to complete a track with difficult
														turnings. Participants need to make a robot which should follow a particular light which
														would be laid on the floor
					  </p>
					  <p>Rules and Regulations:</p>
					  <ul>
						  <li class="cardLi" type="circle"><span>>  Dimension of robots should be maximum of 30X30 inches</span></li>
						  <li class="cardLi" type="circle"><span>>  Weight of robot should not be more than 2 kgs</span></li>
						  <li class="cardLi" type="circle"><span>>  Power supply limits to 12 volts.</span></li>
						  <li class="cardLi" type="circle"><span>>  Participants need to carry their identity card.</span></li>
						  <li class="cardLi" type="circle"><span>>  No toy car is allowed.</span></li>
					  </ul>
					  <Button class = "eventReg" id="myBtn3" name = "lightfollower">Register</Button>
					</div>	
				</div>
			 </div>
		</div>	 
		<div class = "itemsEvents">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
					  <img src="images/linefollower.png" alt="Avatar" style="width:100%;height:100%; border-radius: 8px;;">
					</div>
					<div class="flip-card-back">
					<h1>Line Follower</h1>
					  <p style = "text-align: center;">There will be a race of autonomous robot which has to complete a track with difficult
														turnings. Participants need to make a robot which should follow a particular line which
														would be laid on the floor
					  </p>
					  <p>Rules and Regulations:</p>
					  <ul>
						  <li class="cardLi" type="circle"><span>>  Dimension of robots should be maximum of 30X30 inches</span></li>
						  <li class="cardLi" type="circle"><span>>  Weight of robot should not be more than 2 kgs</span></li>
						  <li class="cardLi" type="circle"><span>>  Power supply limits to 12 volts.</span></li>
						  <li class="cardLi" type="circle"><span>>  Participants need to carry their identity card.</span></li>
						  <li class="cardLi" type="circle"><span>>  No toy car is allowed.</span></li>
					  </ul>
					  <Button class = "eventReg" id="myBtn4" name = "linefollower">Register</Button>
					</div>	
				</div>
			 </div>
		</div>	 
		<div class = "itemsEvents">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
					  <img src="images/tugofwar.jpg" alt="Avatar" style="width:100%;height:100%; border-radius: 8px;;">
					</div>
					<div class="flip-card-back">
					<h1>Tug of War</h1>
					  <p style = "text-align: center;">The robots face each other on a track with a string
														 attaching one to the other. The winning robot, the one
														with the best adjustments, pulls the other across the line
					</p>
					  <p>Rules and Regulations:</p>
					  <ul>
						  <li class="cardLi" type="circle"><span>>  Dimension of robots should be maximum of 30X30 inches</span></li>
						  <li class="cardLi" type="circle"><span>>  Weight of robot should not be more than 2 kgs</span></li>
						  <li class="cardLi" type="circle"><span>>  Power supply limits to 12 volts.</span></li>
						  <li class="cardLi" type="circle"><span>>  Participants need to carry their identity card.</span></li>
					  </ul>
					  <Button class = "eventReg" id="myBtn5" name = "tugofwar">Register</Button>
					</div>	
				</div>
			 </div>
		</div>	 
	  </div> 
  <!--<ul class="hs">
    <li class="item"><div class = "itemEvents">test</div></li>
    <li class="item">test</li>
    <li class="item">test</li>
    <li class="item">test</li>
    <li class="item">test</li>
    <li class="item">test</li>
  </ul>-->
</div>
<!---------------------------------------------------------------------------------------------------------------------------------------
 ---------------------------------------------------------------------------------------------------------------------------------------->
 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
	<div class="modal-header">
	  <span class="close">&times;</span>
	  <h2 class = "modelHead" style = "padding-top: 20px; color: #fefefe; font: 22px/26px 'opensans-bold', sans-serif;">Registration</h2>
	</div>
	<div class="modal-body">
		<form class="Events-Registration-Form" method="post" action="techEvents.php">
			<center><div class="wrap-input1">
				<select class="input1" id="teamSize" name="tsize" placeholder="gender" required="true">
					<option selected="" disabled="" name = "teamsize">Select Team Size</option>
					<option value="one" class="input102">1</option>
					<option value="two" class="input102">2</option>
					<option value="three" class="input102">3</option>
					<option value="four" class="input102">4</option>
					<option value="five" class="input102">5</option>
				</select>
			</div>
			<div class = "row">
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Fest Id</p>
				</div>
				<div class="two columns">
					<input id = "one" class="input100" type="text" name="email1" placeholder="eg: fest@123" disabled = "true">
				</div>
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Password</p>
				</div>
				<div class="two columns">
					<input id = "onep" class="input101" type="password" name="pass1" placeholder="Password"  disabled = "true">
				</div>
				<div class="two columns"></div>
			</div>
			<div class = "row">
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Fest Id</p>
				</div>
				<div class="two columns">
					<input id = "two" class="input100" type="text" name="email2" placeholder="eg: fest@123" disabled = "true">
				</div>
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Password</p>
				</div>
				<div class="two columns">
					<input id = "twop" class="input101" type="password" name="pass2" placeholder="Password" disabled = "true">
				</div>
				<div class="two columns"></div>
			</div>
			<div class = "row">
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Fest Id</p>
				</div>
				<div class="two columns">
					<input id = "three" class="input100" type="text" name="email3" placeholder="eg: fest@123" disabled = "true">
				</div>
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Password</p>
				</div>
				<div class="two columns">
					<input id = "threep" class="input101" type="password" name="pass3" placeholder="Password" disabled = "true">
				</div>
				<div class="two columns"></div>
			</div>
			<div class = "row">
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Fest Id</p>
				</div>
				<div class="two columns">
					<input id = "four" class="input100" type="text" name="email4" placeholder="eg: fest@123" disabled = "true">
				</div>
				<div class="one columns"></div>
				<div class="two columns">
					<p class = "contHead">Password</p>
				</div>
				<div class="two columns">
					<input id = "fourp" class="input101" type="password" name="pass4" placeholder="Password" disabled = "true">
				</div>
				<div class="two columns"></div>
			</div>
			<script>
				$('#teamSize').change(function() {
					if( $(this).val() == "one") {
						$('#one').prop( "disabled", true );
						$('#two').prop( "disabled", true );
						$('#three').prop( "disabled", true );
						$('#four').prop( "disabled", true );
						
						$('#onep').prop( "disabled", true );
						$('#twop').prop( "disabled", true );
						$('#threep').prop( "disabled", true );
						$('#fourp').prop( "disabled", true );
					} 
					else if($(this).val() == "two"){
						$('#one').prop( "disabled", false );
						$('#two').prop( "disabled", true );
						$('#three').prop( "disabled", true );
						$('#four').prop( "disabled", true );
						
						$('#onep').prop( "disabled", false );
						$('#twop').prop( "disabled", true );
						$('#threep').prop( "disabled", true );
						$('#fourp').prop( "disabled", true );
					}
					else if($(this).val() == "three"){
						$('#one').prop( "disabled", false );
						$('#two').prop( "disabled", false );
						$('#three').prop( "disabled", true );
						$('#four').prop( "disabled", true );
						
						$('#onep').prop( "disabled", false );
						$('#twop').prop( "disabled", false );
						$('#threep').prop( "disabled", true );
						$('#fourp').prop( "disabled", true );
					}
					else if($(this).val() == "four"){
						$('#one').prop( "disabled", false );
						$('#two').prop( "disabled", false );
						$('#three').prop( "disabled", false );
						$('#four').prop( "disabled", true );
						
						$('#onep').prop( "disabled", false );
						$('#twop').prop( "disabled", false );
						$('#threep').prop( "disabled", false );
						$('#fourp').prop( "disabled", true );
					}
					else if($(this).val() == "five"){       
						$('#one').prop( "disabled", false );
						$('#two').prop( "disabled", false );
						$('#three').prop( "disabled", false );
						$('#four').prop( "disabled", false );
						
						$('#onep').prop( "disabled", false );
						$('#twop').prop( "disabled", false );
						$('#threep').prop( "disabled", false );
						$('#fourp').prop( "disabled", false );
					}
				});
			</script>
			<button class="subBtn" type = "submit" value = "login" name = "login">
				Register
			</button>
			</center>
		</form>
	</div>
  </div>

</div>
 
 
<!----------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------>



	</div>
      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->

   
   <!-- Contact Section
   ================================================== -->
   <section id="contact">

         <div class="row section-head">

            <div class="two columns header-col">

               <h1><span>Get In Touch.</span></h1>

            </div>

            <div class="ten columns">

                  <p class="lead">Please feel free to leave a message at the given contact details. We'd love to hear it from you!
                  </p>

            </div>

         </div>

        <div class="row">

            <div class="two columns">

                  <div>
                      <h4>Contact Us</h4>
                      <p class="address">
						  IIITK<br>
                          IIITK Campus<br>Jhalana gram,
                          Jaipur, India <br><br>
                          <span>000-0054241</span><br>
                          <span>iiit@iiitk.ac.in</span>
                      </p>
                  </div>
			</div>
			<div class="two columns">

                  <div>
                      <h4>Marketing</h4>
                      <p class="address">
                          Abc Soni<br>
                          IIITK Campus<br>Jhalana gram,
                          Jaipur, India <br><br>
                          <span>+91-6387363138</span><br>
                          <span>abc2305@gmail.com</span>
                      </p>
                  </div>
			</div>
			<div class="two columns">

                  <div>
                      <h4>Publicity</h4>
                      <p class="address">
                          Def Soni<br>
                          IIITK Campus<br>Jhalana gram,
                          Jaipur, India <br><br>
                          <span>+91-6387363138</span><br>
                          <span>def2305@gmail.com</span>
                      </p>
                  </div>
			</div>
			<div class="one columns">

                  <div>
					  <h3><a href = "register.php">Register</a></h3>
                      <h3><a href = "#home">Home</a></h3>
                      <h3><a href = "#about">About</a></h3>
					  <h3><a href = "#theme">Theme</a></h3>
					  <h3><a href = "#">Team</a></h3>
                  </div>
			</div>
			<div class="one columns">

                  <div>
				      <h3><a href = "login.php">Login</a></h3>
                      <h3><a href = "#events">Events</a></h3>
                      <h3><a href = "#contact">Contact</a></h3>
					  <h3><a href = "#">Sponsors</a></h3>
					  <h3><a href = "#">FAQ</a></h3>
                  </div>
			</div>
			<div class="four columns">
				<div class = "contMed">
					<video controls>
					  <source src="images/teaser.mp4" type="video/mp4">
					  <source src="images/teaser.ogg" type="video/ogg">
					Your browser does not support the video tag.
					</video>
                </div> 
			</div>
		</div>

   </section> <!-- Contact Section End-->


   <!-- footer
   ================================================== -->
   <footer>

      <div class="row">

         <div class="twelve columns">

            <ul class="social-links">
			    <li><a href="https://www.facebook.com/profile.php?id=100029288597566" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/satyam-soni-332522172/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			    <li><a href="https://www.youtube.com/channel/UC7bYDBd9XNo9MNQPC25pwMg?view_as=subscribe" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                <li><a href="https://twitter.com/SatyamS10969618" target="_blank"><i class="fa fa-twitter"></i></a></li>		   
            <ul>

         </div>

         <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/waypoints.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/magnific-popup.js"></script>
   <script src="js/init.js"></script>
   <script src="js/eventsModel.js"></script>
   
</body>

</html>