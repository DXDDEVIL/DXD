<?php
$insert = false;
//INSERT INTO `Note Title` (`s_no`, `title`, `description`, `timestmp`) VALUES (NULL, 'again do it', 'sabji la a ladla', current_timestamp());
$server = "localhost";
$username = "root";
$password = "";
$database = "notes_db";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Sql query to be executed
        $sql = "INSERT INTO `note title` (`title`, `description`) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // echo "The record has been inserted successfully successfully!<br>";
            $insert = true;
        } else {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
      
    }

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP curd</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/2.3.3/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.3.3/js/dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });
</script>
  </head>

<body>
  
  <nav class="navbar navbar-expand-lg bg-body-tertiary" .navbar data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">iNotes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been inserted successfully
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>
  <h1>Notes</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <div class="container mt-4">
    <h2>My Notes</h2>

    <form action="/dxd/dir/new_project_curd.php" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>

      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
        <label for="description">Note Description</label>
      </div>
      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>
<div class="container mt-4"><table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `note title`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <th scope='row'>" . $row['s_no'] . "</th>
        <td>" . $row['title'] . "</td>
        <td>" . $row['description'] . "</td>
        <td>
                <button class='btn btn-sm btn-primary'>Actions</button>
              </td>
        </tr>";
    }
    ?>
  </tbody>
</table>
</div>
<footer>
  <div class="container mt-4">
    <p class="text-center">&copy; 2025 Your Website. All rights reserved.</p>
  </div>
</footer>
</body>

</html>