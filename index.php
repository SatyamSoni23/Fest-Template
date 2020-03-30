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
    <link rel="stylesheet" href="css/layout.css">
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
            <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
            <li><a class="smoothscroll" href="#about">About</a></li>
	        <li><a class="smoothscroll" href="#theme">Theme</a></li>
			<li><a class="smoothscroll" href="#stats">Stats</a></li>
            <li><a class="smoothscroll" href="#events">Events</a></li>
            <li><a class="smoothscroll" href="#contact">Contact</a></li>
			<li><a href="register.php">Register</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
	<?php
		$login = filter_input(INPUT_POST, 'login');
		session_start();
		$username = $_SESSION['name'];
		if(!empty($username)){
			/*echo "<form method = 'post'><input type='submit' style = 'color:#fff; position: absolute; top:0; right: 0; background-color:#330702; font-family: serif; border-radius:5px; margin-top: 5px; margin-right: 5px;'value='Hello $username' name='logout'></form>";*/
			echo "<form method = 'post'><input type='submit' name='logout' class='rightButton' value='Hello $username' style = 'background-color: #330702; font-family: serif;'/></form>";
			$logout = filter_input(INPUT_POST, 'logout');
			if(array_key_exists('logout', $_POST)) { 
				session_destroy();
				$_SESSION = array();
				header('Location: index.php'); 
			}
			/*$logout = filter_input(INPUT_POST, 'logout');
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if($logout == 'logout'){
					session_destroy();
					$_SESSION = array();
				}
			}*/
		}
		else{
			echo '<form method = "post"><input type="submit" name="login" class="rightButton" value="Login" style = "background-color: #330702; font-family: serif;"/></form>';
			$login = filter_input(INPUT_POST, 'login');
			if(array_key_exists('login', $_POST)) { 
				header('Location: login.php'); 
			} 
		}
	?>
      <div class="row banner">
         <div class="banner-text">
            <!--<h1 class="responsive-headline" style = "font-family: Agency fb;">Algotune</h1>
            <h3>The Annual Cultural Fest of Indian Institute of Information Technology<br><a class="smoothscroll" href="#about">start scrolling</a>
            and learn more <a class="smoothscroll" href="#about">about</a>.</h3>
            <hr />
			-->
			<br><br><br><br><br><br>
            <ul class="social">
               <li><a href="https://www.facebook.com/profile.php?id=100029288597566" target="_blank"><i class="fa fa-facebook"></i></a></li>
               <li><a href="https://www.linkedin.com/in/satyam-soni-332522172/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			   <li><a href="https://www.youtube.com/channel/UC7bYDBd9XNo9MNQPC25pwMg?view_as=subscribe" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
               <li><a href="https://twitter.com/SatyamS10969618" target="_blank"><i class="fa fa-twitter"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>
	
	
   </header> <!-- Header End -->

   <!-- About Section
   ================================================== -->
   <section id="about" style="padding-top:110px; padding-bottom: 110px;">

      <div class="row">

         <div class="three columns">

            <img class="profile-pic"  src="images/cinderella.gif" alt="" />

         </div>

         <div class="six columns main-col">

            <h2><span>About</span></h2>

            <p class = "info">Purva is Indian Institute of Informatio Technology's annual cultural and tech fest. Held every year at the begining of the spring semester, it is the highlight of an iiitian's year and is an event that everybody looks forward to. Purva encompasses and embraces the varied and diverse interests of iiit with everyone playing a role. Our mission is to bring along all of you and invigorate you with extreme amounts of pure happiness and ecstacy, and also serve as an escape from all the bitterness in our lives.
            </p>


         </div> <!-- end .main-col -->
		  <div class="three columns">

            <img class="profile-pic"  src="images/party.gif" alt="" />

         </div>
		 

      </div>

   </section> <!-- About Section End-->


   <!-- Resume Section
   ================================================== -->
   <section id="theme">

      <!-- Education
      ----------------------------------------------- -->
      <div class="row education">

         <div class="two columns header-col">
            
         </div>

         <div class="eight columns main-col">

            <div class="row item">

               <div class="twelve columns">

                <h1><span>Theme</span></h1>
                <p class="info">A glow party! Super easy to host, incredibly fun... UV body paint - crazy lights and glow sticks- dancing, neon what more could you ask for? check out details on what they are all about and how to host one here: Glow Party Everyone gets dressed up in their brightest colors, and anything glow in the dark and the dance floor is covered in black light so everything pops and looks incredible.</p>
					
				<p class="info">We promise you an incredible experience filled with love, happiness and thrill while you live the best 3 days of your lives!
								And nothing's better than a ballad: a sentimental dance with a crazy lights, to describe the incredible human experience that Mood Indigo 2019 promises to provide.</p>
                  

               </div>

            </div> <!-- item end -->
			 
         </div> <!-- main-col end -->
		
		<div class="two columns header-col">
            
         </div>
		 
      </div> <!-- End Education -->



<!--------------------------------------------------------------------------->
      <!-- Skills
      ----------------------------------------------- -->
      

   </section> <!-- Theme Section End-->

   <!-- Stats Section
   ================================================== -->
	<section id="stats">
		<div class="row skill">

         <div class="three columns header-col">
            
         </div>
	
         <div class="eight columns main-col">

				<h1><span>Stats</span></h1>
				
				<div class="bars">

				   <ul class="skills">
				      <li><span class="bar-expand photoshop"></span><em>200+ Events</em></li>
                  <li><span class="bar-expand css"></span><em>10K+ Footfall</em></li>
						<li><span class="bar-expand html5"></span><em>50+ National Artists</em></li>
                  <li><span class="bar-expand wordpress"></span><em>100+ Participating Colleges</em></li>
						<li><span class="bar-expand illustrator"></span><em>8K+ Participent</em></li>
					</ul>

				</div><!-- end skill-bars -->

			</div> <!-- main-col end -->
			
			<div class="one columns header-col">
            
			</div>
      </div> <!-- End skills -->
	
	</section>
	
<!--------------------------------------------------------------------------->
   <!-- events Section
   ================================================== -->
   <section id="events">
		<div class="row skill">

         
         <div class="ten columns main-col">

				<h1><span>Events</span></h1>
				<div class = "pos">
					<div class="container">
					  <div class="card"><a href = "techEvents.php">
						<h3 class="title">Technical</h3>
						<div class="bar">
						  <div class="emptybar"></div>
						  <div class="filledbar"></div>
						</div>
						<div class = "eventImg">
							<img src = "images/tech.jpg">
							<div class="circle">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
									<circle class="stroke" cx="60" cy="60" r="50"/>
								</svg>
							</div>
						</div></a>
					  </div>
					  <div class="card"><a href = "#">
						<h3 class="title">Cultural</h3>
						<div class="bar">
						  <div class="emptybar"></div>
						  <div class="filledbar">
						  </div>
						</div>
						<div class = "eventImg">
							<img src = "images/cultural1.jpg">
							<div class="circle">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
									<circle class="stroke" cx="60" cy="60" r="50"/>
								</svg>
							</div>
						</div></a>
					  </div>
					  <div class="card"><a href = "#">
						<h3 class="title">Proshows</h3>
						<div class="bar">
						  <div class="emptybar"></div>
						  <div class="filledbar"></div>
						</div>
						<div class = "eventImg">
							<img src = "images/proshows4.jpg">
							<div class="circle">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
									<circle class="stroke" cx="60" cy="60" r="50"/>
								</svg>
							</div>
						</div></a>	
					  </div>
					  <div class="card"><a href = "#">
						<h3 class="title">Informals & workshops</h3>
						<div class="bar">
						  <div class="emptybar"></div>
						  <div class="filledbar"></div>
						</div>
						<div class = "eventImg">
							<img src = "images/informal.jpg">
							<div class="circle">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
									<circle class="stroke" cx="60" cy="60" r="50"/>
								</svg>
							</div>
						</div></a>	
					  </div>
					</div>
				</div>
			</div> <!-- main-col end -->
			
			<div class="one columns header-col">
            
			</div>
			
			
      </div> <!-- End skills -->
	
	</section>
	

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
</body>

</html>
