<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Departments</title>

  <link href="../css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
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
            <h1 class="mt-4">Department 1</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/dist/index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Department 1</li>
            </ol>
              <div class="card mb-4">
                  <div class="card-body">
                      <p class="mb-0">
                          This page is an example of using static navigation. By removing the
                          <code>.sb-nav-fixed</code>
                          class from the
                          <code>body</code>
                          , the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.
                      </p>
                  </div>
              </div>
              <div style="height: 100vh;"></div>
              <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
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

  <script>
    $('#summernote').summernote({
      placeholder: "Start typing...",
      tabsize: 2,
      minHeight: 300,
      minwidth: 700,
      spellCheck: true,
      toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
    ['fontname', ['fontname']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video', 'hr']],
    ['view', ['fullscreen', 'codeview']],
    ['help', ['help']],
    ['undo', ['undo']],
    ['redo', ['redo']]
  ],
    });

    document.querySelector('.note-editor').style = 'width: -webkit-fill-available';
    $('.note-toolbar').addClass('text-center');

    $('#save_changes').click(function() {
      var content = $('#summernote').summernote('code');
      var dep = $('#save_changes').data("dep");
      action = "update_dep_data";
      console.log(content);
      data = {
        action: action,
        content: content,
        dep: dep
      };
      if (confirm("Are you Sure?")) {
        jQuery.ajax({
          type: 'POST',
          url: 'dep_script.php',
          data: data,
          dataType: 'json',
          success: function(res) {
            if(res.msg == "success") {
              console.log("Success");
            } else {
              console.log("Failed: ", res);
            }

          },
          error: function(xhr, ajaxOptions, thrownError) {
            // modalStart(charachter, "Not Found");
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      } else {
        return false;
      }
    });
  </script>

</body>

</html>
