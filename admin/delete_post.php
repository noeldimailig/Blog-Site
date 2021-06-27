<?php include 'default/header.php'; ?>
    <title>BLOG | Delete Post</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">ADMIN PANEL</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.php">User</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="get_post.php">Post</a></li>
            <li class="nav-item"><a class="nav-link" href="categories.php">Category</a></li>
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
                    <i class="fas fa-table me-1"></i>
                    Delete Post
                </div>
                <div class="card-body px-4">
                    <?php
                        if(isset($_POST['submit'])) {
                            $image_name = $_POST['image'];
                            $id = $_POST['id'];
                            $sql = 'delete from posts where PostID = ?';
                            $stmt = $con->prepare($sql);
                            $stmt->execute(array($id));

                            if($stmt->rowCount() > 0) { ?>
                                <?php if(file_exists('uploads/'.$image_name)) {
                                    unlink('uploads/'.$image_name); ?>
                                    <div class="alert alert-success" role="alert">Deleted successfully</div>
                                <?php } else { ?>
                                    <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
                                <?php
                                }
                            }
                        }
                    ?>
                    <?php
                        $id = !empty($_GET['id']) ? $_GET['id'] : '';
                        $sql = 'select * from posts where PostID = ?';
                        $stmt = $con->prepare($sql);
                        $stmt->execute(array($id));
                        $post = $stmt->fetch();
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" value="<?php echo $id?>"  name="id">
                        <input type="hidden" class="form-control" id="image" value="<?=$post['Image'];?>"  name="image">
                        <div class="form-group">
                          <label for="Title">Title:</label>
                          <input type="text" class="form-control" id="title" value="<?=$post['Title'];?>" name="title">
                        </div>
                        <div class="form-group">
                          <label for="Title">Category:</label>
                          <select class="form-control" name="category" id="category">
                            <?php
                                $sql = 'select Category from categories';
                                $stmt = $con->prepare($sql);
                                $stmt->execute();
                                $categories = $stmt->fetchAll();
                            ?>

                            <?php foreach ($categories as $category): ?>
                                <option><?=$category['Category'];?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="content">Content:</label>
                          <textarea class="form-control" id="editor" name="content"><?=$post['Content'];?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="image">Image:</label>
                          <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Delete</button>&nbsp;<a href="get_post.php" class="btn btn-sm btn-dark" role="button">Back</a>
                        </div>
                      </form>
<?php include 'default/footer.php'; ?>