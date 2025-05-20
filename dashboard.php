<?php 
/*Creating a session based on a session identifier, passed via a GET or POST request.
  We will include config.php for connection with the database.
  We will fetch all data from players and teams in the database and show them.
  If a user is admin, they can update or delete player or team data.
*/
	  session_start();

    include_once('config.php');

    if (empty($_SESSION['username'])) {
          header("Location: login.php");
    }
   
    $sql = "SELECT * FROM users";
    $selectUsers = $conn->prepare($sql);
    $selectUsers->execute();

    $users_data = $selectUsers->fetchAll();
	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Football Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Football Admin">
    <meta name="generator" content="Football Dashboard">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to Football Dashboard, " . $_SESSION['username']; ?></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="logout.php">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                   
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_teams.php">
                                Teams
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_matches.php">
                                Matches
                            </a>
                        </li>
                    
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Football Dashboard</h1>
            </div>



      <h2>Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Emri</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users_data as $user_data) { ?>

               <tr>
                <td><?php echo $user_data['id']; ?></td>
                <td><?php echo $user_data['emri']; ?></td>
                <td><?php echo $user_data['username']; ?></td>
                <td><?php echo $user_data['email']; ?></td>
                <!-- If we want to update a user we need to link into editUsers.php -->
                <td><a href="editUsers.php?id=<?= $user_data['id'];?>">Update</a></td>
                  <!-- If we want to delete a user we need to link into deleteUsers.php -->
                <td><a href="deleteUsers.php?id=<?= $user_data['id'];?>">Delete</a></td>
              </tr>
              
           <?php  } ?>
           
            
          </tbody>
        </table>
      </div>
    
        </main>
    </div>
</div>

<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
</html>
