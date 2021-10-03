<?php
	include 'model.php';
	$database = new database();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Update Delete Data PostgreSQL</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div id="container">
		<div class="card-group">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Please enter book information</h5>
					<form action="controller.php?action=insert" method="POST">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Title</label>
							<div class="col-sm-10">
								<input type="text" name="book_name" class="form-control" placeholder="Title">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Author</label>
							<div class="col-sm-10">
								<input type="text" name="author" class="form-control" placeholder="Author">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Publisher</label>
							<div class="col-sm-10">
								<input type="text" name="publisher" class="form-control" placeholder="Publisher">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Published</label>
							<div class="col-sm-10">
								<input type="date" name="date_published" class="form-control" placeholder="Published">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Price</label>
							<div class="col-sm-10">
								<input type="number" name="price" class="form-control" placeholder="Price">
							</div>
						</div>
						<div class="form-group row">
							<div class="offset-sm-2 col-sm-10">
								<input type="submit" name="insert" class="btn btn-primary">
							</div>
						</div>
					</form>	
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Books information list</h5>
					<table class="table table-stripped">
						<tr>
							<th>Title</th>
							<th>Author</th>
							<th>Publisher</th>
							<th>Published</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
						<?php foreach ($database->select() as $value): ?>
						<tr>
							<td><?php echo $value[1]; ?></td>
							<td><?php echo $value[2]; ?></td>
							<td><?php echo $value[3]; ?></td>
							<td><?php echo $value[4]; ?></td>
							<td><?php echo $value[5]; ?></td>
							<td>
								<button type="button" class="btn btn-danger btn-sm" href="controller.php?action=delete&book_id=<?php echo $value[0];?>">Delete</button>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-<?php echo $value[0];?>">Edit</button>
								<div class="modal" id="edit-<?php echo $value[0];?>">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="card-header">Please change book information</div>
											<div class="modal-body">
												<form action="controller.php?action=update" method="POST">
													<input type="text" name="book_id" value="<?php echo $value[0]?>" hidden="hidden">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Title</label>
														<div class="col-sm-9">
															<input type="text" name="book_name" class="form-control" placeholder="Title" value="<?php echo $value[1]?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Author</label>
														<div class="col-sm-9">
															<input type="text" name="author" class="form-control" placeholder="Author" value="<?php echo $value[2]?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Publisher</label>
														<div class="col-sm-9">
															<input type="text" name="publisher" class="form-control" placeholder="Publisher" value="<?php echo $value[3]?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Published</label>
														<div class="col-sm-9">
															<input type="date" name="date_published" class="form-control" placeholder="Published" value="<?php echo $value[4]?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Price</label>
														<div class="col-sm-9">
															<input type="number" name="price" class="form-control" placeholder="Price" value="<?php echo $value[5]?>">
														</div>
													</div>
													<div class="form-group row">
														<div class="offset-sm-3 col-sm-9">
															<input type="submit" name="insert" class="btn btn-primary">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>