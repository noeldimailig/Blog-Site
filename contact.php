<?php include 'header_main.php'; ?>
<title>BLOG | Contact</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">BLOG</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="contact.php">Contact</a></li>
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
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-header">
            <h3 class="text-center">Contact Us</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 px-5">
                <h3>Contact Details</h3>
                <p class="border border-info rounded p-2"><span><i class="fas fa-user mr-3"></i></span>Noel Dimailig</p>
                <p class="border border-info rounded p-2"><span><i class="fas fa-map-marker-alt mr-3"></i></span>Lalud, Calapan City</p>
                <p class="border border-info rounded p-2"><span><i class="fas fa-envelope mr-3"></i></span>dimailignoel18@gmail.com</p>
                <p class="border border-info rounded p-2"><span><i class="fas fa-phone-alt mr-3"></i></span>09670035910</p>
                <div class="text-center">
                  <a class="text-dark" href="https://web.facebook.com/noeldimail" target="_blank"><i class="fab fa-2x fa-facebook"></i></a>
                  <a class="text-dark" href="https://twitter.com/lurenchi1" target="_blank"><i class="fab fa-2x fa-twitter"></i></a>
                  <a class="text-dark" href="https://github.com/noeldimailig" target="_blank"><i class="fab fa-2x fa-github"></i></a>
                </div>
              </div>

              <div class="col-6 px-5">
                <form class="border border-info rounded" action="" method="post">
                  <h3 class="text-center">Get In Touch</h3>
                  <div class="form-group col-sm-12">
                    <label for="">Email:</label>
                    <input class="form-control" type="text" placeholder="sample@email.com">
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="">Message:</label>
                    <textarea class="form-control" name="message"></textarea>
                  </div>
                  <div class="form-group col-sm-12">
                    <button type="submit" name="submit" class="btn btn-md btn-primary col-sm-12">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

          
<?php include 'footer_main.php'; ?>