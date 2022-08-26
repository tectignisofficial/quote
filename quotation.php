<?php
include("_includes/config.php");
?>
<?php
if(isset($_POST['submit'])){
    $subject=$_POST['subject'];
    $date=$_POST['date'];
    $customer=$_POST['customer'];
    $description=$_POST['description'];
    $terms=$_POST['terms'];

    $sql=mysqli_query($conn,"INSERT INTO `quotation`(`subject`, `date`, `customer`, `description`,`terms`) VALUES ('$subject','$date','$customer','$description','$terms')");


    if($sql==1){
        echo "Saved!", "data successfully submitted", "success";
        header("location:quotation.php");
    }else {
        echo '<script>alert("oops...somthing went wrong");</script>';
    }
}
?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> CRM | Quotation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php include"_includes/header.php";?>
  <?php include"_includes/sidebar.php";?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quotation Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quotation Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Quotation Details</h3>
          </div>
          <!-- /.card-header -->
          <form method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
               
                  <label>Quotation No</label>
                  <?php 
                   $query=mysqli_query($conn,"select * from quotation order by q_no desc");
                   $sql=mysqli_fetch_array($query);
                   $val=$sql['q_no'];
                   $lastid=$val+1;
                      if(empty($lastid)){
						           $number="000";
					           }else{
						          $id=str_pad($lastid + 0, 3,0, STR_PAD_LEFT);
					        	  $number="$id";
					            }		
                   ?> 
                  <input type="text" id="quo_no" value="<?php echo $number; ?>" class="form-control" readonly>
                 
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Customer Name</label>
                  <?php 
                   $query=mysqli_query($conn,"select * from customer1");
                   ?>
                                    <select class="form-control"  name="customer" id="inputRole">
                                        <option selected disabled>Select Customer</option>
                                        <?php
                    while($sql=mysqli_fetch_array($query))
                    {
                      ?>

                         <option value="<?php echo $sql['customer']; ?>"> <?php echo $sql['customer']; ?></option>
                         <?php } ?>
                                    </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Subject</label>
                  <?php 
                   $query=mysqli_query($conn,"select * from subject");
                   ?>
                                    <select class="form-control" name="subject" id="inputRole" onChange="package(this.value)">
                                        <option selected disabled>Select Subject</option>
                                        <?php
                    while($sql=mysqli_fetch_array($query))
                    {
                      ?>

                         <option value="<?php echo $sql['subject_topic']; ?>"> <?php echo $sql['subject_topic']; ?></option>
                         <?php } ?>
                                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="date" class="form-control">
                </div>
                <!-- /.form-group -->
                </div>
                <div class="packageresult col-lg-12">
                </div>
            </div>
          </div>
         
        </div>
        <!-- /.card -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Price Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                
             
                <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" id="desc" name="description" placeholder="Enter Description">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="value">Price</label>
                  <input type="text" onkeyup="setTotal()" id="value" class="form-control" name="price" placeholder="Enter Price">
                </div>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
             
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text" onkeyup="setTotal()" id="quantity" class="form-control" name="quantity" placeholder="Enter Quantity">
                </div>

                <div class="form-group">
                  <label>Total</label>
                  <input id="autValue" type="text" class="form-control" name="total" readonly>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <button type="button" name="add" id="proSubmit" class="btn btn-info" style="margin-left:90%;">Add Row</button>
    <table id="myTable" class="table table-bordered table-striped">
        <br>
        <br>
      
        <thead>
            <tr>
                    <th>Sr.No</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody id="addTable">
        <?php
        $sql=mysqli_query($conn,"select * from price where q_no='$number'");
           while ($row=mysqli_fetch_array($sql)){ 
           ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td class="addTotal"><?php echo $row['total'] ?></td>
                <!-- <td><button type="button" class="delete-row btn-sm btn-danger">Delete Row</button></td> -->
            </tr><?php } ?>
           

        </tbody>
        <tr>
              <td colspan="4">Total</td>
              <td id="cuu"></td>
           </tr>
        
    </table>
    
                 
            
              </div>
              <!-- /.card-body -->

                <div class="row">
             
                <div class="form-group" style="margin-left:30%;">
                  <label>GST</label>
                  <select class="form-control select2" name="social_media" style="width: 100%;" onChange=gst(this.value)>
                    <option selected="selected" disabled>Select</option>
                    <option value="0">0%</option>
                    <option value="18">18%</option>
                  </select>
                </div>
                <div class="form-group" style="margin-left:02%;">
                  <label>GST Amount</label>
                  <input id="autoamt" type="text" class="form-control" name="total" readonly>
                </div>
                <div class="form-group" style="margin-left:02%;">
                  <label>Total Amount</label>
                  <input id="tmt" type="text" class="form-control" name="total" readonly>
                </div>
                </div>
                </div>
                <div style="height: 45px;">
                <button style="float:right"type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>  
              <button type="submit" style="float:right" name="submit" class="btn btn-primary mr-2" >preview</button>
              <button type="submit" style="float:right" name="submit" class="btn btn-primary mr-2">PDF</button>
              </div>
              </form>
            
              </div>
      
      <!-- /.container-fluid -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <?php include"_includes/footer.php";?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->

<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<!-- Summernote -->

<script>
const qtyEl = document.getElementById('quantity');
const valEl = document.getElementById('value');
const setTotal = () => {
  let qty = qtyEl.value;
  let value = valEl.value;
  document.getElementById('autValue').value= qty * value;
}
</script>


<script>
function package(val){
    $.ajax({
      url:"action_quo.php",
      method:"POST",
      data:{packa:val},
      success:function(data){
        $(".packageresult").html(data);
      }
    
    });
  }

  function gst(val){
    if(val==0){
      $amt=$('#cuu').text();
      $('#autoamt').val('0');
    $('#tmt').val($amt);
    }
    else{
    $amt=$('#cuu').text();
    $totalgst=($amt*val)/100;
    $totalgstround=Math.round($totalgst);
    $amtt=parseInt($amt)+parseInt($totalgstround);
    
    $('#autoamt').val($totalgstround);
    $('#tmt').val($amtt);
    }
  }
</script>
<script>
  function calc_total(){
  var sum = 0;
  $(".addTotal").each(function(){
    sum += parseFloat($(this).text());
  
  });
  $('#cuu').text(sum);
 
}
calc_total();
</script>
<script>
  $('#proSubmit').click(function(){
let quo_no=$('#quo_no').val();
let desc=$('#desc').val();
let value=$('#value').val();
let quantity=$('#quantity').val();
let autValue=$('#autValue').val();
let prosubmit=$('#proSubmit').val();

if(quo_no==''|| desc==''|| value==''|| quantity=='' || autValue=='') {
    // swal("oops..", "Please fill all fields.", "error");
    alert("Please fill all fields");
    return false;
}else{

$.ajax({
url:'action_quo.php',
type:'post',
data:{quo_no:quo_no,
    desc:desc,
    value:value,
    quantity:quantity,
    autValue:autValue,
    prosubmit:prosubmit
},
success: function(res){
$('#addTable').html(res);
}
});
}
});
</script>
</body>
</html>
