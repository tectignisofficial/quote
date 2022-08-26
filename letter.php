<?php
include("_includes/config.php");
$id=$_GET['id'];
?>


<!doctype html>
<html>   
<head>

    <meta charset="utf-8">
    <title>Letter</title>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>
</head>
<body>

    <div class="page">
    <?php
        $sql=mysqli_query($conn,"select * from quotation where id='$id'");
              
           while ($row=mysqli_fetch_array($sql)){ 
            
           ?>
        Date:<?php echo $row['date'] ?><br>
        <br>
        <br>
        To,
        <br>
        <?php echo $row['customer'] ?><br>
       
        <br>
        <br>
        <br>
       
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject:<?php echo $row['subject'] ?> <br>
        <br>
        Dear Sir/Madam,
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $row['description'] ?><br>
        <br>
        <br>
        <br>
        Thanks & Regards,<br>
        Tectignis IT Solutions<br>



        <?php } ?>
        <br>
        <br>
        <br>
        <br>
        <br>

        <table  style="border: 1px solid black;">
  <tr> 
  
    <th>Sr.No</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total</th>
  </tr>
  <?php
        $sql=mysqli_query($conn,"select * from price");
              
           while ($row=mysqli_fetch_array($sql)){ 
            
           ?>
  <tr cellspacing="0px" cellpaddihng="0px">
  <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['total'] ?></td>
  </tr>
  <?php } ?>
</table>


<br>
        <br>
        <br>
        <br>
        <br>

        <?php
        $sql=mysqli_query($conn,"select * from quotation where id='$id'");
              
           while ($row=mysqli_fetch_array($sql)){ 
            
           ?>

<h3> Terms And Conditions </h3>

<p><?php echo $row['terms'] ?></p>
<?php } ?>
    </div>
   
</body>

</html>