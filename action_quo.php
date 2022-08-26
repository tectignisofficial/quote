<?php
include("_includes/config.php");
?>
<?php
if(isset($_POST['packa'])){
    $category=$_POST['packa'];
    $query=mysqli_query($conn,"SELECT * FROM `subject` WHERE subject_topic='$category'");
    $sql=mysqli_fetch_array($query);
    echo '<div class="card-body col-md-12">
    <label>Description</label>
    <textarea class="form-control" name="description" >'.$sql['description'].'</textarea>
    </div>


      <div class="card-body col-md-12">
      <div class="form-group ">
      <label>Terms And Conditions</label>
      <textarea  class="terms form-control" name="terms">'.$sql['terms'].'</textarea>
      </div>
    </div>';
    }

    if(isset($_POST['prosubmit'])){
      $description=$_POST['desc'];
      $quantity=$_POST['quantity'];
      $price=$_POST['value'];
      $total=$_POST['autValue'];
     $quo_no=$_POST['quo_no'];
  
      $sql=mysqli_query($conn,"INSERT INTO `price` (`description`, `quantity`, `price`,`total`,`q_no`) 
      VALUES ('$description','$quantity','$price','$total','$quo_no')");
    
    $sql=mysqli_query($conn,"select * from price where q_no='$quo_no'");
       while ($row=mysqli_fetch_array($sql)){ 
       echo "<tr>
        <td>". $row['id'] ."</td>
                <td>". $row['description'] ."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['price'] ."</td>
                <td class='addTotal'>".$row['total']."</td>
          
        </tr> ";
      } 
      echo '<script>
      function calc_total(){
      var sum = 0;
      $(".addTotal").each(function(){
        sum += parseFloat($(this).text());
      
      });
      $("#cuu").text(sum);
     
    }
    calc_total();
    </script>';
  }
    ?>


