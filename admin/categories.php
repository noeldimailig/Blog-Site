<?php include 'default/header.php'; ?>
    <title>BLOG | Category List</title>
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
              <i class="fas fa-table me-1"></i>
              Category List
          </div>
          <div class="card-body px-4">
            <?php
                $sql = 'select * from categories';
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $categories = $stmt->fetchAll();
            ?>
            <a href="add_category.php" class="btn btn-sm btn-primary mb-2" role="button">Add New</a>
            <table class="table table-bordered">
            	<thead>
            		<tr>
            			<td>ID</td>
                        <td>Category</td>
                        <td>Date Added</td>
                        <td>Date Updated</td>
            			<td>Action</td>
            		</tr>
            	</thead>
            	<tbody>
            		<?php foreach($categories as $category): ?>
            			<tr>
            				<td><?php echo $category['CatID']; ?></td>
                            <td><?php echo $category['Category']; ?></td>
                            <td><?php echo $category['AddedAt']; ?></td>
                            <td><?php echo $category['UpdatedAt']; ?></td>
            				<td>
                              <a class="btn btn-sm btn-primary" role="button" href="update_category.php?id=<?php echo $category['CatID']; ?>">Update</a>&nbsp;
                              <a class="btn btn-sm btn-dark" role="button" href="delete_category.php?id=<?php echo $category['CatID']; ?>">Delete</a>
                            </td>
            			</tr>
            		<?php endforeach ?>
            	</tbody>
            </table>
<?php include 'default/footer.php'; ?>