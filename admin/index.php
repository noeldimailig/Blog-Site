<?php include 'default/header.php'; ?>
    <title>BLOG | User List</title>
</head>
<body>
    <?php include 'default/navbar.php'; ?>
    <main>
      <div class="container px-4">
        <div class="card mt-3 mb-4">
          <div class="card-header">
              <i class="fas fa-table me-1"></i>
              User List
          </div>
          <div class="card-body px-4">
            <?php
                $sql = 'select * from users';
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $users = $stmt->fetchAll();
            ?>
            <a href="insert.php" class="btn btn-sm btn-primary mb-2" role="button">Add New</a>
            <table class="table table-bordered">
            	<thead>
            		<tr>
            			<td>ID</td>
                  <td>Fullname</td>
            			<td>Username</td>
            			<td>Email</td>
                  <td>User Type</td>
            			<td>Action</td>
            		</tr>
            	</thead>
            	<tbody>
            		<?php foreach($users as $user): ?>
            			<tr>
            				<td><?php echo $user['UserID']; ?></td>
                    <td><?php echo $user['FullName']; ?></td>
            				<td><?php echo $user['Username']; ?></td>
            				<td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['UserType']; ?></td>
            				<td>
                      <a class="btn btn-sm btn-primary" role="button" href="update.php?id=<?php echo $user['UserID']; ?>">Update</a>&nbsp;
                      <a class="btn btn-sm btn-dark" role="button" href="delete.php?id=<?php echo $user['UserID']; ?>">Delete</a>
                    </td>
            			</tr>
            		<?php endforeach ?>
            	</tbody>
            </table>
<?php include 'default/footer.php'; ?>