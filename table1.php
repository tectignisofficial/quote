<?php
include("_includes/config.php");
?>
<?php
if(isset($_POST['dnk'])){
    $query=mysqli_query($conn,"select * from customer1 where id='".$_POST['dnk']."'");
    $row=mysqli_fetch_array($query);
    echo '  <div class="row">
    <div class="col-md-12">
    <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="date">
        Customer Name:
        </label>
        <input type="hidden" name="cid" value="'.$row['id'].'">
        '.$row['customer'].'
      </div>
    </div>
    </div>
 
      <div class="row">
       <div class="col-md-12">
          <div class="form-group">
            <label for="clock_in">
            Company Name :
            </label> '.$row['company_name'].'
          </div>
        </div>
        </div>        
      

      <div class="row">
      <div class="col-md-12">
      <div class="form-group">
        <label for="date">
       Contact No :
        </label> '.$row['contact_no'].'
          </div>
        </div>
        </div>       
    
        <div class="row">
      <div class="col-md-12">
      <div class="form-group">
        <label for="date">
       Whatsapp No:
        </label> '.$row['whatsapp_no'].'
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="date">
    Email ID:
    </label> '.$row['email_id'].'
  </div>
</div>
</div>

    </div>
  </div>
  ';
  }
  ?>