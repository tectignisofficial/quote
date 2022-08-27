<?php
include("_includes/config.php");
?>

<?php
if(isset($_GET['gen'])){
      $id=mysqli_real_escape_string($conn,$_GET['gen']);
      $sql=mysqli_query($conn,"update customer1 set `status`='1'");
      if($sql==1){
       header("location:sales.php");
      }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Table</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include"_includes/header.php";?>
  <?php include"_includes/sidebar.php";?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="padding-top:10px;">List Of Customer</h3>
                <a href="customer.php"><button type="button" style="float:right" name="submit" class="btn btn-primary mr-2"> Add New Customer</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Customer Name</th>
                    <th>Company Name</th>
                    <th>Contact No</th>
                    <th>Whatsapp No</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
        $sql=mysqli_query($conn,"select * from customer1 where status=0");
           while ($row=mysqli_fetch_assoc($sql)){ 
           ?>
                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['customer'] ?></td>
                    <td><?php echo $row['company_name'] ?></td>
                    <td><?php echo $row['contact_no'] ?></td>
                    <td><?php echo $row['whatsapp_no'] ?></td>
                    <td><?php echo $row['email_id'] ?></td>
                   <td>
                    <button type="button" id="view" data-id="<?php echo $row['id'] ?>"class="delete-row btn-sm btn-info">
                    <i class="fas fa-eye"></i>
                    </button>

                    <button type="button" class="delete-row btn-sm btn-warning">
                    <i class="fas fa-file"></i>
                    </button>

                    <button type="button" class="delete-row btn-sm btn-success">
                    <i class="fas fa-whatsapp"></i>
                  
                    </button>

                    <button type="button" id="usereditid" class="delete-row btn-sm btn-secondary">
                    <i class="fas fa-envelope"></i>
                    </button>

                    <a href="cus_table.php?gen=<?php echo $row['id'];?>">
                    <button class="btn btn-warning" name="submit">Sales</button>
             
                    </button>
                  </td>
                  </tr>
                  <?php } ?>
                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->



      
    </section>
    <!-- /.content -->


    <div class="modal fade closemaual" id="dnkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
      </div>
      <form method="post">
      <div class="modal-body body1">
      </div>
    <div class="modal-footer">
    <button type="button" class="btn-close btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" name="manualAttendanceEdit">Save changes</button>
    </div>
  </form>
  </div>
  </div>
</div>


<div class="modal fade closemaual" id="dnkModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Moda title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
      </div>
      <form method="post">
      <div class="modal-body jhg">
      </div>
    <div class="modal-footer">
    <button type="button" class="btn-close btn btn-danger" data-dismiss="modal">Close</button>

    </div>
  </form>
  </div>
  </div>
</div>

  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<script>
          $(document).ready(function(){
          $('#usereditid').click(function(){
            let dnkk = $(this).data('id');
            $('#dnkModal').modal('show'); 

            $.ajax({
            url: 'table1.php',
            type: 'post',
            data: {dnkk: dnkk},
            success: function(response1){ 
              $('.body1').html(response1);
              $('#dnkModal').modal('show'); 
            }
          });
          });


          });
          </script>

<script>

          $(document).ready(function(){
          $('#view').click(function(){
            let dnk = $(this).data('id');
            // $('#dnkModal1').modal('show'); 
            $.ajax({
            url: 'table1.php',
            type: 'post',
            data: {dnk: dnk},
            success: function(response2){ 
              $('.jhg').html(response2);
              $('#dnkModal1').modal('show'); 
            }
          });
          });
          });
          </script>
</body>
</html>
