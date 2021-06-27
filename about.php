<?php include 'header_main.php'; ?>
<title>BLOG | About</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">BLOG</a>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="about.php">About</a></li>
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
          <li class="nav-item"><a class="nav-link" href="<?php echo BASEURL.'/signup.php';?>">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <main>
    <div class="container mt-3 mb-4">
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <h3 class="text-center">About Us</h3>
          </div>
          <div class="card-body">
              <div class="card overflow-hidden text-center">
                <img src="https://images.pexels.com/photos/3183198/pexels-photo-3183198.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img-fluid" alt="Banner Image" style="height: 300px;">
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                  <h1 class="card-title px-5 text-dark">
                    <blockquote class="blockquote">
                      Knowledge is power. Information is liberating. Education is the premise of progress, in every society, in every family.
                      <footer class="blockquote-footer"><cite title="Source Title">Kofi Annan</cite></footer>
                    </blockquote>
                  </h1>
                </div>
              </div>
            <p class="text-left mt-4 h4">Knowledge is power as they say, and a pen is mightier than the sword.</p>
            <p>Well most of the time it is true, and with that principle in mind this website was made to provide informative articles about the latest trend, in the field of Information and Technology as well as other related topics that is best suited for your area of interests.</p>
          </div>
        </div>
      </div>
    </div>
  </main>
          
<?php include 'footer_main.php'; ?>