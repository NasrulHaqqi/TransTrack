<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
  header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sparepart Information</title>

  <link href="./lib/bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    th,
    td {
      text-align: center;
      vertical-align: middle;
    }

    .close {
      float: right;
      font-size: 1.5rem;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .5;
    }

    .close:hover {
      color: #000;
      text-decoration: none;
    }

    .close:not(:disabled):not(.disabled):hover,
    .close:not(:disabled):not(.disabled):focus {
      opacity: .75;
    }

    button.close {
      padding: 0;
      background-color: transparent;
      border: 0;
    }
  </style>

  <link href="./dashboard/dashboard.css" rel="stylesheet" />
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-primer flex-md-nowrap p-0 shadow" style="background-color: red;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">TransTrack Administrator</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="" id="logout" style="color: black;">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vehicle.php">
                <span data-feather="dollar-sign"></span>
                Vehicle Information
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="sparepart.php">
                <span data-feather="dollar-sign"></span>
                Sparepart Information
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="
              d-flex
              justify-content-between
              flex-wrap flex-md-nowrap
              align-items-center
              pt-3
              pb-2
              mb-3
              border-bottom
            ">
          <h1 class="h2">Sparepart Information</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-success" name="add">
              Add
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFormCenterTitle">Add Sparepart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="(() => $('#modalForm').modal('toggle'))()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mb-3">
          <form>
            <div class="form-group">
              <label for="jenis" class="col-form-label">Jenis:</label>
              <input type="text" class="form-control" id="jenis" name="jenis">
            </div>
            <div class="form-group">
              <label for="nama" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
              <label for="jumlah" class="col-form-label">Jumlah:</label>
              <input type="text" class="form-control" id="jumlah" name="jumlah"></input>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="(() => $('#modalForm').modal('toggle'))()">Close</button>
          <button type="button" class="btn btn-primary" name="save">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script src=" ./lib/bootstrap-4.5.0-dist/js/jquery-3.5.1.js"></script>
  <script src="./lib/bootstrap-4.5.0-dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="./dashboard/dashboard.js"></script>
  <script src="./scripts/script.js" type="module"></script>
</body>

</html>