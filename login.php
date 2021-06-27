<?php include 'header_main.php'; ?>
	<title>BLOG | Login</title>
</head>
<body class="h-100">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index_main.php">BLOG</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
          <?php if(isset($_SESSION['username'])):?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['username']; ?></a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <?php if($_SESSION['usertype']==='Admin'): ?>
                  <li><a class="dropdown-item" href="<?php echo BASEURL.'/admin/index.php';?>">Dashboard</a></li>
                  <li><a class="dropdown-item" href="<?php echo BASEURL.'/logout.php';?>">Logout</a></li>
                <?php else: ?>
                  <li><a class="dropdown-item" href="<?php echo BASEURL.'/logout.php';?>">Logout</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo BASEURL.'/login.php';?>">Sign In</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo BASEURL.'/signup.php';?>">Sign Up</a></li>
          <?php endif; ?>
        </ul>
    </div>
  </nav>
  <main>
    <div class="container mb-4">
      <div class="row">
        <?php
      		if(isset($_POST['submit'])) {
      			$username = $_POST['username'];
      			$password = md5($_POST['password']);

      			$sql = 'select * from users where Username = ? AND Password = ?';
            $stmt = $con->prepare($sql);
            $stmt->execute(array($username, $password));

            $result = $stmt->fetch();
            if(count($result)){
            	// $_SESSION['fullname'] = $result['FullName'];
            	// $_SESSION['username'] = $result['Username'];
            	// $_SESSION['usertype'] = $result['UserType'];
              $_SESSION['id'] = $result['UserID'];
          	  if($_SESSION['usertype'] === 'Admin'){
          		  header('Location:'.BASEURL.'/admin/index.php');
              }else{
                header('Location:'.BASEURL.'/index.php');
              }
            }
        	}
        ?>
        <div class="col-sm-5 mx-auto mt-5 mb-5">
  			  <form class="bg-white border border-info rounded" action="" method="POST">
  			  	<h2 class="text-center mt-3 mb-3">Login</h2>
  			    <div class="form-group col-sm-12 mt-4">
  			      <label for="username">Username:</label>
  			      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
  			    </div>
  			    <div class="form-group col-sm-12">
  			      <label for="password">Password:</label>
  			      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
  			    </div>
  			    <div class="form-group col-sm-12">
  			    	<button type="submit" name="submit" class="btn btn-md btn-primary col-sm-12 mb-1">Login</button>
  			    	<a href="index.php" class="btn btn-md btn-dark col-sm-12" role="button">Cancel</a>
  			  	</div>
  			  	<div class="col-sm-12 mb-4">
  			      <p class="text-center">Don't have an acoount yet? <a href="signup.php" class="mt-4 mb-4">Sign Up</a></p>
  			    </div>
  			  </form>
        </div>
      </div>
    </div>
  </main>
<?php include 'footer_main.php'; ?>