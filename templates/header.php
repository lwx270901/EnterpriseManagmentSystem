<?php if ($_SESSION['role'] == 'director') : ?>
	<nav class="navbar navbar-expand-xxl navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="?func=director-dashboard">
				<img src="assets/images/logo.png" alt="" height="30" class="d-inline-block align-text-top">
				ITask
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" href="?func=director-dashboard">Department Management</a>
					</li>
			</div>
			<div class="d-flex align-items-center">
				<!-- <div class="dropdown"> -->
				<div class="btn-group">
					<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
						<img src="assets/images/user.png" height="25" /> Account
					</button>
					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
						<li><a class="dropdown-item" href="?func=profile">Profile</a></li>
						<li><a class="dropdown-item" href="?func=logout">Log Out</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

<?php elseif ($_SESSION['role'] == 'department_head') : ?>
	<nav class="navbar navbar-expand-xxl navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="?func=department-employees">
				<img src="assets/images/logo.png" alt="" height="30" class="d-inline-block align-text-top">
				ITask
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" href="?func=department-employees">Department Management</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="?func=department-dashboard">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="?func=assign-task">Create task</a>
					</li>
			</div>

			<div class="d-flex align-items-center">
				<!-- <div class="dropdown"> -->
				<div class="btn-group">
					<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
						<img src="assets/images/user.png" height="25" /> Account
					</button>
					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
						<li><a class="dropdown-item" href="?func=profile">Profile</a></li>
						<li><a class="dropdown-item" href="?func=logout">Log Out</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

<?php elseif ($_SESSION['role'] == 'employee') : ?>
	<nav class="navbar navbar-expand-xxl navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="/index.php?func=employee-dashboard">
				<img src="assets/images/logo.png" alt="" height="30" class="d-inline-block align-text-top">
				ITask
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" href="?func=employee-dashboard">Dashboard</a>
					</li>
			</div>
			<div class="d-flex align-items-center">
				<!-- <div class="dropdown"> -->
				<div class="btn-group">
					<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
						<img src="assets/images/user.png" height="25" /> Account
					</button>
					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
						<li><a class="dropdown-item" href="?func=profile">Profile</a></li>
						<li><a class="dropdown-item" href="?func=logout">Log Out</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
<?php endif; ?>