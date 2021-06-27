<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">ADMIN PANEL</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">User</a></li>
            <li class="nav-item"><a class="nav-link" href="get_post.php">Post</a></li>
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