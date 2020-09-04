	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
				<?php
					if (empty($_SESSION['l_pengguna']) AND empty($_SESSION['l_katalaluan'])){
						echo "<li><a href=\"index.php\">Halaman Utama </a></li>";
					}	
					else
					{
						if($_SESSION['l_type'] == "admin")
						{
							echo "<li><a href='index.php'>Home</a></li></span>
									<li><a href='tukar_katalaluan.php'>Change Password</a></li></span>
								
									<li><a href='addnews.php'>News</a></li></span>
									<li><a href='uploadcsv.php'>Upload Data</a></li></span>
									<li><a href='smofile.php'>View Smofile</a></li></span>
									<li><a href='profile.php'>View Profile</a></li></span>";
									

						}
						else if($_SESSION['l_type'] == "user")
						{
							
							$n = strlen($_SESSION['l_pengguna']);
							
							if ($n < 12){
							
							echo "<li><a href='index.php'>Home</a></li></span>
								  <li><a href='tukar_katalaluan.php'>Change Password</a></li></span>
								  <li class='dropdown'>
										<button class='dropbtn' type='button' id='menu1' data-toggle='dropdown'>Alumni</button>
											<div class='dropdown-content'>
												<a href='kemaskini_profail2.php'>Profile</a>
												<a href='education.php'>Education</a>
												<a href='employment.php'>Employment</a>
												<a href='achievement.php'>Achievement</a>
											</div>
								  <li>";
									
							}
							
							else if ($n = 12){
								
							echo "<li><a href='index.php'>Home</a></li></span>
								  <li><a href='tukar_katalaluan.php'>Change Password</a></li></span>
								  <li class='dropdown'>
										<button class='dropbtn' type='button' id='menu1' data-toggle='dropdown'>Alumni</button>
											<div class='dropdown-content'>
												<a href='kemaskini_profail.php'>Profile</a>
												<a href='education.php'>Education</a>
												<a href='employment.php'>Employment</a>
												<a href='achievement.php'>Achievement</a>
											</div>
								  <li>";	
								
							}
						}

						else if($_SESSION['l_type'] == "tnc")
						{
							echo "<li><a href='index.php'>Home</a></li></span>
									<li><a href='tukar_katalaluan.php'>Change Password</a></li></span>
									<li><a href='kemaskini_profail.php'>Profile</a></li></span>
									<li><a href='kemaskini_profail.php'>Graph</a></li></span>
									<li><a href='logout.php'>Logout</a></li>";
						}

					} ?>
            </ul>

        </div>
      </div><!-- /.navbar-collapse -->
    </nav>
