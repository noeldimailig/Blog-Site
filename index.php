<?php include 'header_main.php'; 
?>
<title>BLOG | Home</title>
</head>
<body class="d-flex flex-column min-vh-100">
  <?php include 'nav_main.php'; ?>
  <main>
    <div class="container mt-5 wrapper flex-grow-1">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <?php
              $sql = 'select p.PostID, p.Title, p.Category, p.Content, p.Image, p.AddedAt, p.UpdatedAt, u.FullName from posts as p inner join users as u on p.UserID = u.UserID order by p.UpdatedAt asc';
              $stmt = $con->prepare($sql);
              $stmt->execute();
              
                while ($posts = $stmt->fetch()) {
                $postID =  $posts['PostID'];
                $title =  $posts['Title'];
                $date =  date('F d, Y h:i A', strtotime($posts['UpdatedAt']));
                $fname =  $posts['FullName'];
                $image =  $posts['Image'];
                $article_length = strip_tags($posts['Content']);
                if(strlen($article_length) > 60){
                  $shorten = substr($article_length, 0, 100);
                  $sub_article = substr($shorten, 0, strrpos($shorten, ' ')).'...';
                }
              }
            ?>
            <header class="mb-2">
              <h1 class="fw-bolder mb-1"><?=$title;?></h1>
              <div class="text-muted fst-italic mb-2">Posted on <?=$date;?> by <?=$fname;?></div>
            </header>
            
            <section class="mb-2">
              <img class="img-fluid rounded mb-3" src="<?='admin/uploads/'.basename($image);?>" alt="<?=$title;?>" />
              <p class="fs-5 mb-4"><?php echo $sub_article;?>
                <a class="btn btn-sm btn-primary" href="read_blog.php?id=<?php echo $postID;?>">Read More</a>
              </p>
            </section>
          </div>
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
                  <div class="card-body bg-light mb-3">
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
        <!-- Side widgets-->
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
                      <?php if($i % 2 == 0): ?>
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