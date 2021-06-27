<?php include 'header_main.php'; ?>
	<title>BLOG | Sign Up</title>
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
          <li class="nav-item"><a class="nav-link" href="<?php echo BASEURL.'/login.php';?>">Sign In</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo BASEURL.'/signup.php';?>">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-sm-5 mx-auto mt-4 mb-5">
          <?php
            if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fname'];
            $email = $_POST['email'];
            $utype = $_POST['utype'];

            $sql = 'insert into users(FullName, Username, Email, Password, UserType) values (?, ?, ?, ?, ?)';
            $stmt = $con->prepare($sql);
            $stmt->execute(array($fullname, $username, $email, $password, $utype));
            $result = $stmt->fetch();
            if(count($result)){
              $_SESSION['id'] = $result['UserID'];
              $_SESSION['fullname'] = $result['FullName'];
              $_SESSION['username'] = $result['Username'];
              $_SESSION['usertype'] = $result['UserType'];
                  
              header('Location:'.BASEURL.'/index.php');
            }
            if($stmt->rowCount() > 0) { ?>
                <div class="alert alert-success" role="alert">Saved Successfully</div>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
            <?php
            }
          }?>
      	  <form class="bg-white border border-info rounded" action="" method="POST">
      	  	<h2 class="text-center mt-3 mb-3">Sign Up</h2>
              <div class="form-group col-sm-12 mt-4">
                <label for="fname">Fullname:</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter Fullname" name="fname">
              </div>
      	    <div class="form-group col-sm-12">
      	      <label for="username">Username:</label>
      	      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
      	    </div>
              <div class="form-group col-sm-12">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
      	    <div class="form-group col-sm-12">
      	      <label for="password">Password:</label>
      	      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      	    </div>
      	    <div class="form-group col-sm-12">
      	    	<button type="submit" name="submit" class="btn btn-md btn-primary col-sm-12 mb-1">Sign Up</button>
      	    	<a href="index.php" class="btn btn-md btn-dark col-sm-12" role="button">Cancel</a>
      	  	</div>
              <input type="hidden" class="form-control" id="utype" value="User"  name="utype">
      	  	<div class="col-sm-12 mb-4">
      	      <p class="text-center">Already have an acoount? <a href="login.php" class="mt-4 mb-4">Sign In</a></p>
      	    </div>
      	  </form>
        </div>
      </div>
    </div>
  </main>
<?php include 'footer_main.php'; ?>