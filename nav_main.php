
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">BLOG</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
            <?php if(isset($_SESSION['username'])): ?>
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