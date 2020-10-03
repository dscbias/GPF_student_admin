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
            <h1 class="mt-4">ADD TASK</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/dist/index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Task</li>
            </ol>
              <div class="card mb-4">
                  <div class="card-body">
                    
                    
        <!--          Write your Code here....              -->

<div class="row">
     
     <div class="col-lg-6">
        <form action="insert.php" method="POST">
 

    <!-- first div -->

          <div class="container" style="background-color:#e9ecee; padding:2rem">

          <div class="form-group">
              <label for="titlename"><b>Title</b></label>
              <input type="text" class="form-control" id="titlename">
          </div>
           <br>

          <div class="form-group">
             
              <label for="start" style="padding-right:1rem;"><b>Start</b> 
              <br> <br>
                   
                <label for="day">Day</label>
                <input type="date" class="form-control" id="day">
               
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time">
                </label>
                          

             
              <label for="start" ><b>End</b>
              <br><br>
                <label for="day">Day</label>
                <input type="date" class="form-control" id="day">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time">
                </label>
                </div>
            
  
          <div class="form-group">
              <label for="loc"><b>Location</b></label>
              <input type="text" class="form-control" id="loc">
          </div>
  
          <div class="form-group">
              <label for="Event"><b>Event Description</b></label>
              <textarea class="form-control" id="Event Description" rows="6"></textarea>
          </div>
          </div>

      </div>

    <hr>

     <!-- second div -->


      <div class="col-lg-4">
      <div class="container" style= "background-color:#e9ecee; padding:2rem; height: 100%; " >
            <div class="form-group">
            <label for="attach"><b>Attachments</b></label>
            <input type="file" class="form-control-file" id="attach">
             </div>
  
  <br>

        <div class="form-group">
        <label for="search"><b>Add Participants : </b></label>
          <div class="form-inline">
        <input class="form-control" type="text" placeholder="Enter Name" aria-label="Search" id="search">
        
         <i class="fas fa-search" aria-hidden="true"></i>

         <!-- <rough checkboxes> -->
         
         
         <div class="container" style="border:1px solid #ccc; height: 6rem; overflow-y: scroll;">
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
    <input type="checkbox" /> This is checkbox <br />
</div>
          
         <!-- enter the ajax request here -->

          </div>
        </div>     

      <br><br> 
      <center><button type="submit"  class="btn btn-block btn-lg" style="background-color:#007bff ; color:white; font-family:sans-serif">SUBMIT</button></center>

         </div>
         </form>
          </div>
    

   <!-- ongoing events -->
   <div class="col-lg-2">
   <div class="container" style="background-color:#D1CFCF; height: 100%; " >
   <br>
  <center><p style="color:black; font-family:Verdana, Arial, Helvetica, sans-serif;;"><b>ONGOING <br>EVENTS</b></p></center>

  <!-- ongoing events need Server communication and ajax to upload -->
  <!-- back end work here -->
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