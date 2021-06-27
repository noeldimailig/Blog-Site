<?php include 'default/header.php'; ?>
    <title>BLOG | Update User</title>
</head>
<body>
    <?php include 'default/navbar.php'; ?>
    <main>
        <div class="container px-4">
            <div class="card mt-3 mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Update User
                </div>
                <div class="card-body px-4">
                    <?php
                        if(isset($_POST['submit'])) {
                            $id = $_POST['id'];
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);
                            $fullname = $_POST['fname'];
                            $email = $_POST['email'];
                            $utype = $_POST['utype'];

                            $sql = 'update users set FullName = ?, Username = ?, Email = ?, Password = ?, UserType = ? where UserID = ?';
                            $stmt = $con->prepare($sql);
                            $stmt->execute(array($fullname, $username, $email, $password, $utype, $id));

                            if($stmt->rowCount() > 0) { ?>
                                <div class="alert alert-success" role="alert">Updated successfully</div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
                            <?php
                            }
                        }
                    ?>
                    <?php
                        $id = !empty($_GET['id']) ? $_GET['id'] : '';
                        $sql = 'select * from users where UserID = ?';
                        $stmt = $con->prepare($sql);
                        $stmt->execute(array($id));
                        $user = $stmt->fetch();
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" class="form-control" id="id" value="<?php echo $id?>"  name="id">

                        <div class="form-group">
                          <label for="fname">Fullname:</label>
                          <input type="text" class="form-control" id="fname" value="<?=$user['FullName'];?>" name="fname">
                        </div>
                        <div class="form-group">
                          <label for="username">Username:</label>
                          <input type="text" class="form-control" id="username" value="<?=$user['Username'];?>" name="username">
                        </div>
                        <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control" id="password" value="<?=$user['Password'];?>" name="password">
                        </div>
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="email" value="<?=$user['Email'];?>" name="email">
                        </div>
                        <div class="form-group">
                          <label for="email">User Type:</label>
                          <input type="text" class="form-control" id="utype" value="<?=$user['UserType'];?>"  name="utype">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Update</button>&nbsp;<a href="index.php" class="btn btn-sm btn-dark" role="button">Back</a>
                        </div>
                    </form>
<?php include 'default/footer.php'; ?>