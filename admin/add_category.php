<?php include 'default/header.php'; ?>
	<title>BLOG | Add Category</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">ADMIN PANEL</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.php">User</a></li>
            <li class="nav-item"><a class="nav-link" href="get_post.php">Post</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="categories.php">Category</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw mr-1"></i><?php echo $_SESSION['username']; ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo BASEURL.'/index.php'?>">Main Page</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASEURL.'/logout.php'?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
  <main>
    <div class="container px-4">
      <div class="card mt-3 mb-4">
        <div class="card-header">
           <i class="fas fa-table me-1 mr-1"></i>Add Category
        </div>
      <div class="card-body px-4">
      	<?php
					if(isset($_POST['submit'])){
					  $category = $_POST['category'];

					  $sql = 'insert into categories(Category) values (?)';
					  $stmt = $con->prepare($sql);
					  $stmt->execute(array($category));

					  if($stmt->rowCount() > 0) { ?>
              <div class="alert alert-success" role="alert">Category added successfully.</div>
          	<?php } else { ?>
              <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
          	<?php
          	}
					}
				?>
			  <form action="" method="POST" enctype="multipart/form-data">
			  	<div class="form-group">
			      <label for="category">Category:</label>
			      <input type="text" class="form-control" id="category" placeholder="Enter a category" name="category">
			    </div>
			    <div class="form-group">
			    	<button type="submit" name="submit" class="btn btn-sm btn-primary">Save</button>&nbsp;<a href="categories.php" class="btn btn-sm btn-dark" role="button">Back</a>
			  	</div>
			  </form>
<?php include 'default/footer.php'; ?>