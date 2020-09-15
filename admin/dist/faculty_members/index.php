<?php
// Session Start
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (!(isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === true)) {
    header("location: auth/login.php");
    exit;
}

  require '../auth/config_cms.php';
  $faculties_data = array();

  $sql = "SELECT * FROM faculty";
  if ($res = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_array($res)) {
              array_push($faculties_data, $row);
          }
          mysqli_free_result($res);
      }
  }
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Faculty Members</title>

  <link href="../css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../upload/croppie.css" />
  <style rel="stylesheet">
    .el08 {
      width: 20px;
      height: 20px;
    }

    .profile-photo {
      margin: 0 auto;
      width: 150px;
      height: auto;
      margin-top: 20px;
      cursor: pointer;
      border: solid 4px #e3e3e3;
      border-radius: 100px;
    }

    .profile-photo:hover {
      opacity: 0.8;
    }

    .card-title {
      text-align: center;
      font-weight: bold;
      text-decoration: underline;
    }

    .card-footer {
      text-align: left;
      padding: 6px;
    }

    .file-upload {
      display: none;
    }

    .circle {
      border-radius: 1000px !important;
      overflow: hidden;
      width: 128px;
      height: 128px;
      border: 8px solid rgba(255, 255, 255, 0.7);
      position: absolute;
      top: 72px;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .p-image {
      position: absolute;
      top: 147px;
      right: 100px;
      cursor: pointer;
      color: #4a4a4a;
      transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .p-image:hover {
      transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .upload-button {
      font-size: 1.2em;
    }

    .upload-button:hover {
      transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
      color: #999;
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
          <h1 class="mt-4">Faculty Members</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/dist/index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Faculty Members</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="text-center">BIAS Faculty Members</h2>
              <section class="showcase">
                <div class="container">
                  <div class="page-content page-container" id="page-content">
                    <div class="padding">
                      <div class="row container d-flex justify-content-center">
                        <div class="col-lg-12">
                          <div class="card px-3">
                            <div class="card-body">

                              <div class="form-inline needs-validation" target="_blank" action="trades_data.php" method="POST" novalidate id="search_trans_id">
                                <input type="text" class="form-control mb-2 mr-sm-2 invisible" id="inlineFormInputName2" placeholder="">

                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                  </div>
                                  <input name="new_faculty_name" type="text" class="form-control" id="new_faculty_name" placeholder="Enter the name of new Faculty Member" required>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" id="add_new_faculty_member">Add</button>

                                <div class="form-check mb-2 mr-sm-2 invisible">
                                  <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                  <label class="form-check-label" for="inlineFormCheck">
                                    Remember me
                                  </label>
                                </div>

                              </div>

                              <br />
                              <div id="uploaded_image"></div>




                              <div id="uploadimageModal" class="modal" role="dialog">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Crop your Image</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center" style="margin: auto;">
                                      <div class="row">
                                        <div class="col-md-8 text-center">
                                          <div id="image_demo" style="width:350px; margin-top:30px; text-align: center;"></div>
                                        </div>
                                      </div>
                                      <div class="col-md-4" style="padding-top:30px;">

                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-block btn-primary crop_image">Crop & Upload Image</button>
                                    </div>
                                  </div>
                                </div>
                              </div>



                              <br><br>

                              <?php
                                  //Columns must be a factor of 12 (1,2,3,4,6,12)
                                  $numOfCols = 3;
                                  $rowCount = 0;
                                  $bootstrapColWidth = 12 / $numOfCols;
                                  ?>
                              <div class="card-group group  mb-2">
                                <?php
                                  foreach ($faculties_data as $key => $faculty) {
                                      ?>
                                <div class="card text-center">
                                  <div class="">
                                    <img class="profile-photo img-circle" src="/Pictures/<?php echo $faculty['image']; ?>" alt="<?php echo $faculty['name']; ?>" data-file_picker_id="<?php echo $faculty['id']; ?>">
                                    <!-- <div class="p-image" data-file_picker_id="<?php echo $faculty['id']; ?>">
                                      <i class="fa fa-camera upload-button"></i>
                                    </div> -->
                                  </div>

                                  <input name="upload_image" id="file-picker-<?php echo $faculty['id']; ?>" data-fac-id="<?php echo $faculty['id']; ?>" data-fac-name="<?php echo $faculty['name']; ?>" class="file-upload upload_image" type="file"
                                    accept="image/*" />

                                  <div class="card-body">
                                    <h5 class="card-title"><?php echo $faculty['name']; ?></h5>
                                    <p class="card-text"><?php echo $faculty['content']; ?></p>
                                  </div>
                                  <div class="container mb-2">
                                    <div class="input-group mb-3 mt-3">
                                      <div class="input-group-prepend">
                                        <label class="input-group-text" for="dep_select">Department</label>
                                      </div>
                                      <select data-fac-id="<?php echo $faculty['id']; ?>" class="custom-select dep_select" id="dep_select">
                                        <option selected disabled>Choose...</option>
                                        <option <?php echo ($faculty['dep'] == "CSE") ? "selected" : ""; ?> value="CSE">CSE</option>
                                        <option <?php echo ($faculty['dep'] == "ECE") ? "selected" : ""; ?> value="ECE">ECE</option>
                                        <option <?php echo ($faculty['dep'] == "MCA") ? "selected" : ""; ?> value="MCA">MCA</option>
                                        <option <?php echo ($faculty['dep'] == "AS") ? "selected" : ""; ?> value="AS">Applied Sciences</option>
                                      </select>
                                    </div>
                                    <i data-fac-id="<?php echo $faculty['id']; ?>" data-name="<?php echo $faculty['name']; ?>" data-content="<?php echo $faculty['content']; ?>" data-designation="<?php echo $faculty['designation']; ?>" data-qualifications="<?php echo $faculty['qualifications']; ?>"
                                       data-area_of_interest="<?php echo $faculty['area_of_interest']; ?>" data-mobile_no ="<?php echo $faculty['mobile_no']; ?>" data-email_id ="<?php echo $faculty['email_id']; ?>"
                                      class="fa fa-edit edit-fac" style="margin-right: 8px; cursor: pointer;"></i>
                                    <i data-fac-id="<?php echo $faculty['id']; ?>" class="fa fa-times remove-fac" style="margin-left: 8px; cursor: pointer;"></i>
                                  </div>
                                  <div class="card-footer">
                                    <small class="text-muted"><?php echo $faculty['designation']; ?></small>
                                  </div>
                                </div>
                                <?php
                                      $rowCount++;
                                      if ($rowCount % $numOfCols == 0) {
                                          echo '</div> <div class="card-group mb-2">';
                                      }
                                  }
                                  ?>
                              </div>

                              <!-- Edit Faculty Data -->
                              <div class="modal fade" id="edit-faculty-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Faculty Memeber Data</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div>
                                        <div class="form-group">
                                          <label for="name">Name</label>
                                          <input name="name" type="text" class="form-control" id="name" placeholder="Enter Faculty Name">
                                        </div>
                                        <div class="form-group">
                                          <label for="content">About</label>
                                          <textarea name="content" rows="7" cols="50" id="content" placeholder="Enter about Faculty"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="qualifications">Qualifications</label>
                                          <textarea name="qualifications" rows="2" cols="50" id="qualifications" placeholder="Enter Qualifications"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="area_of_interest">Area of Interest</label>
                                          <textarea name="area_of_interest" rows="2" cols="50" id="area_of_interest" placeholder="Enter Area of Interest"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="mobile_no">Mobile Number</label>
                                          <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile Number">
                                        </div>
                                        <div class="form-group">
                                          <label for="email_id">Email Address</label>
                                          <input type="email" name="email_id" class="form-control" id="email_id" placeholder="Enter an Email Address">
                                        </div>
                                        <div class="form-group">
                                          <label for="name">Designation</label>
                                          <input name="designation" type="text" class="form-control" id="designation" placeholder="Enter Faculty's Designation">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-block btn-primary save-faculty-changes">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
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
  <script src="../upload/croppie.js"></script>

  <script>
    $(document).ready(function() {

      $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
          width: 200,
          height: 200,
          type: 'square' //circle
        },
        boundary: {
          width: 300,
          height: 300
        }
      });

      $('.upload_image').on('change', function(event) {


        var reader = new FileReader();
        fac_id_for_image = $(this).data('fac-id');
        fac_name_for_image = $(this).data('fac-name');

        reader.onload = function(event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function() {
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
      });

      $('.crop_image').click(function(event) {

        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response) {
          $.ajax({
            url: "../upload/upload.php",
            type: "POST",
            data: {
              "image": response,
              "fac_id": fac_id_for_image,
              "fac_name": fac_name_for_image
            },
            success: function(data) {
              $('#uploadimageModal').modal('hide');
              $('#uploaded_image').html(data.img);
              console.log(data);
              location.reload();
            }
          });
        })
      });


      var readURL = function(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('.profile-pic').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $(".profile-photo").on('click', function(event) {
        event.stopPropagation();
        event.stopImmediatePropagation();
        let file_picker_id = $(this).data('file_picker_id');
        console.log(file_picker_id);
        $('#file-picker-' + file_picker_id).trigger('click');
      });

    });
  </script>

  <script>
    $('#add_new_faculty_member').click(function() {
      var faculty_name = $('#new_faculty_name').val();
      let action = "add_new_faculty_member";
      console.log(faculty_name);
      data = {
        action: action,
        faculty_name: faculty_name
      };
      jQuery.ajax({
        type: 'POST',
        url: 'faculty_script.php',
        data: data,
        dataType: 'json',
        success: function(res) {
          location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          // modalStart(charachter, "Not Found");
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    });


    $(document).on('click', '.edit-fac', function(event) {
      event.stopPropagation();
      event.stopImmediatePropagation();
      fac_id = $(this).data('fac-id');
      let old_name = $(this).data('name');
      let old_content = $(this).data('content');
      let old_designation = $(this).data('designation');
      let old_qualifications = $(this).data('qualifications');
      let old_area_of_interest = $(this).data('area_of_interest');
      let old_mobile_no = $(this).data('mobile_no');
      let old_email_id = $(this).data('email_id');

      $('#name').val(old_name);
      $('#content').val(old_content);
      $('#designation').val(old_designation);
      $('#qualifications').val(old_qualifications);
      $('#area_of_interest').val(old_area_of_interest);
      $('#mobile_no').val(old_mobile_no);
      $('#email_id').val(old_email_id);

      $('#edit-faculty-data').modal('show');
      $('.save-faculty-changes').data('data-fac-id', fac_id);

$(document).on('click', '.save-faculty-changes', function(event) {
        event.stopPropagation();
        event.stopImmediatePropagation();

        let action = "update_faculty_data";
        let name = $('#name').val();
        let content = $('#content').val();
        let designation = $('#designation').val();
        let qualifications = $('#qualifications').val();
        let area_of_interest = $('#area_of_interest').val();
        let mobile_no = $('#mobile_no').val();
        let email_id = $('#email_id').val();

        console.log(action, content, designation);

        data = {
          action: action,
          fac_id: fac_id,
          name: name,
          content: content,
          qualifications: qualifications,
          area_of_interest: area_of_interest,
          mobile_no: mobile_no,
          email_id: email_id,
          designation: designation
        };
        jQuery.ajax({
          type: 'POST',
          url: 'faculty_script.php',
          data: data,
          dataType: 'json',
          success: function(res) {
            location.reload();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            // modalStart(charachter, "Not Found");
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      });
    });

    $('.dep_select').change(function(event) {
      event.stopPropagation();
      event.stopImmediatePropagation();
      let action = "update_department";
      let fac_id = $(this).data('fac-id');
      let dep = $(this).val();
      data = {
        action: action,
        dep: dep,
        fac_id: fac_id
      }
      jQuery.ajax({
        type: 'POST',
        url: 'faculty_script.php',
        data: data,
        dataType: 'json',
        success: function(res) {
          location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          // modalStart(charachter, "Not Found");
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    });
  </script>

</body>

</html>
