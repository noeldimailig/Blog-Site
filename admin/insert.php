<?php include 'default/header.php'; ?>
	<title>BLOG | Add User</title>
</head>
<body>
	<?php include 'default/navbar.php'; ?>
  <main>
    <div class="container px-4">
      <div class="card mt-3 mb-4">
        <div class="card-header">
           <i class="fas fa-table me-1 mr-1"></i>Insert User
        </div>
      <div class="card-body px-4">
      	<?php
					if(isset($_POST['submit'])) {
						$username = $_POST['username'];
						$password = md5($_POST['password']);
						$fullname = $_POST['fname'];
						$email = $_POST['email'];
						$utype = $_POST['utype'];

						$sql = 'insert into users(FullName, Username, Email, Password, UserType) values (?, ?, ?, ?, ?)';
						$stmt = $con->prepare($sql);
						$stmt->execute(array($fullname, $username, $email, $password, $utype));
						if($stmt->rowCount() > 0) { ?>
							<div class="alert alert-success" role="alert">Saved Successfully</div>
						<?php } else { ?>
							<div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
						<?php
						}
					}
				?>
			  <form action="" method="POST">
			  	<div class="form-group">
			      <label for="fname">Fullname:</label>
			      <input type="text" class="form-control" id="fname" placeholder="Enter Fullname" name="fname">
			    </div>
			    <div class="form-group">
			      <label for="username">Username:</label>
			      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
			    </div>
			    <div class="form-group">
			      <label for="password">Password:</label>
			      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
			    </div>
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			    </div>
			    <div class="form-group">
			      <input type="hidden" class="form-control" id="utype" value="User"  name="utype">
			    </div>
			    <div class="form-group">
			    	<button type="submit" name="submit" class="btn btn-sm btn-primary">Save</button>&nbsp;<a href="index.php" class="btn btn-sm btn-dark" role="button">Back</a>
			  	</div>
			  </form>
<?php include 'default/footer.php'; ?>