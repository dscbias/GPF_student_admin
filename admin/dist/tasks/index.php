<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Tasks</title>

  <link href="../css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <link href="calendar.css" rel="stylesheet" />
  <style media="screen">
    .btn {
      border-radius: 2px;
    }
    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgb(255 255 255 / 25%);
    }
    .form-control {
      width: 18%;
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
          <h1 class="mt-4">Tasks</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/dist/index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Tasks</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-2">
                  <div class="text-center" style="background-color:#DCDCDC; padding:2rem;">
                    <div class="form-group">
                      <button class="btn btn-info" type="button" name="button">Ongoing Tasks</button>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-info" type="button" name="button">Inactive Tasks</button>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-info" type="button" name="button">Finsihed Tasks</button>
                    </div>
                  </div>

                </div>
                <div class="col-lg-7">
                  <div style="background-color:#DCDCDC;">
                    <div class="card mb-4">
                      <div class="card-body">
                        <!-- ////////////////////////// -->
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Task</th>
                                <th>Select</th>
                              </tr>
                            </thead>

                            <tbody>
                              <tr>
                                <td>
                                  <div class="">
                                    <div class="float-left" style="border: 2px solid; padding: 10px; margin-right: 2rem;; border-radius: 4px;">28 Sep</div>
                                    <div style="">
                                      <span>TASK HEADING</span>
                                      <br>
                                      <span>These are the details of the above task.</span>
                                    </div>

                                  </div>
                                </td>

                                <td>
                                  <input class="form-control" type="checkbox" name="" value="">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="">
                                    <div class="float-left" style="border: 2px solid; padding: 10px; margin-right: 2rem;; border-radius: 4px;">24 Sep</div>
                                    <div style="">
                                      <span>TASK HEADING</span>
                                      <br>
                                      <span>These are the details of the above task.</span>
                                    </div>

                                  </div>
                                </td>

                                <td>
                                  <input class="form-control" type="checkbox" name="" value="">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="">
                                    <div class="float-left" style="border: 2px solid; padding: 10px; margin-right: 2rem;; border-radius: 4px;">23 Sep</div>
                                    <div style="">
                                      <span>TASK HEADING</span>
                                      <br>
                                      <span>These are the details of the above task.</span>
                                    </div>

                                  </div>
                                </td>

                                <td>
                                  <input class="form-control" type="checkbox" name="" value="">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3">
                  <div id="calendar"></div>
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
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script src="../assets/demo/datatables-demo.js"></script>
  <script src="../main/scripts.js"></script>
  <script src="calendar.js"></script>
</body>

</html>
