<?php include 'header_main.php'; ?>
<title>BLOG | Blog Post</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">BLOG</a>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="blog.php">Blog</a></li>
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
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <?php 
              $sql = 'select p.PostID, p.Title, p.Category, p.Content, p.Image, p.AddedAt, p.UpdatedAt, u.FullName from posts as p inner join users as u on p.UserID = u.UserID order by p.PostID asc';
              $stmt = $con->prepare($sql);
              $stmt->execute();
              while ($posts = $stmt->fetch()){
                $article_length = strip_tags($posts['Content']);
                if(strlen($article_length) > 60){
                  $shorten = substr($article_length, 0, 100);
                  $sub_article = substr($shorten, 0, strrpos($shorten, ' ')).'...';
                }?>
                <div class="col-eq-height col-md-6 px-4">
                  <div class="card-header"><?=$posts['Title'];?></div>
                  <div class="card-body bg-light">
                    <figure class="mb-4">
                      <img class="img-fluid rounded" src="<?='admin/uploads/'.basename($posts['Image']);?>" alt="<?=$posts['Title'];?>" />
                    </figure>
                    <p class="fs-5 mb-4"><?php echo $sub_article;?>
                      <a class="btn btn-sm btn-primary" href="read_blog.php?id=<?php echo $posts['PostID'];?>">Read More</a>
                    </p>
                  </div>
                </div>
              <?php } ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
              <form action="results.php" method="post">
                <div class="row">
                  <div class="d-inline form-group col-9 pl-2 pr-0">
                    <input class="form-control form-control-sm col-sm-12" type="text" name="search" placeholder="Enter search term..."/>
                  </div>
                  <div class="d-inline form-group col-1 pr-1">
                    <button class="btn btn-sm btn-primary" id="submit" name="submit" type="submit">Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
              <div class="row">
                <?php
                  $sql = 'select Category from categories';
                  $stmt = $con->prepare($sql);
                  $stmt->execute();
                  $categories = $stmt->fetchAll();
                ?>
                <div class="col-sm-6">
                  <ul class="list-unstyled mb-0">
                    <?php for($i = 0; $i < count($categories); $i++): ?>
                      <?php if($i % 2 != 0): ?>
                        <?php foreach ($categories[$i] as $value): ?>
                          <li><a href="results.php?category=<?=$value?>"><?php echo $value;?></a></li>
                        <?php endforeach; ?>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <ul class="list-unstyled mb-0">
                      <?php else: ?>
                        <?php foreach ($categories[$i] as $value): ?>
                          <li><a href="results.php?category=<?=$value?>"><?php echo $value;?></a></li>
                        <?php endforeach; ?>
                      <?php endif; ?>
                      <?php endfor; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>     
        </div> 
      </div>
    </div>
  </main>        

          
<?php include 'footer_main.php'; ?>