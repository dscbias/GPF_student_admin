<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Student Profile</title>

  <link href="../css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  <style rel="stylesheet">
    .el08 {
      width: 20px;
      height: 20px;
    }
  </style>
</head>

<body>

  <?php include '../components/header.php' ?>

  <div id="layoutSidenav">

    <?php include '../components/sidebar.php' ?>

    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Student Profile</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/dist/index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Student Profile</li>
          </ol>

          <div class="card-body">
            <div class="card-deck">
              <div class="card mainProfile">
                <img class="profile" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Steve_Jobs_Headshot_2010-CROP.jpg/1200px-Steve_Jobs_Headshot_2010-CROP.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title name">Steve Jobs</h5>
                  <p class="para">Organisation name</p>
                  <button type="button" class="btn btn-primary Abtn">Active</button>
                  <button type="button" class="btn btn-primary Abtn"> Student</button>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <p class="dark">Bio</p>
                  <p>American business magnate, industrial designer, investor, and media proprietor</p>
                  <p class="dark">Email</p>
                  <p>stevejob123@gmaill.com</p>
                  <p class="dark">Mobile</p>
                  <p>No Data Found</p>
                  <p class="dark">User ID</p>
                  <p>Admin</p>
                  <p class="dark">Social Links</p>
                  <button type="button" class="btn btn-secondary btn2"><ion-icon name="logo-github"></ion-icon></button>
                  <button type="button" class="btn btn-secondary btn2"><ion-icon name="logo-linkedin"></ion-icon> </button>
                  <button type="button" class="btn btn-secondary btn2"><ion-icon name="logo-instagram"></ion-icon> </button>
                  <button type="button" class="btn btn-secondary btn2"><ion-icon name="logo-facebook"></ion-icon> </button>

                </div>
              </div>

            </div>

          </div>
        </div>
      </main>
      <?php include '../components/footer.php' ?>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script src="../assets/demo/datatables-demo.js"></script>
  <script src="../main/scripts.js"></script>

</body>

</html>
