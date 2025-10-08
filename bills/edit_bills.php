<?php
$validate_message = "";
$business_error = "";
$action = "edit_bills.php";
$conn = new mysqli("localhost", "root", "", "ledger");
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}else{
    $business_error = "No ID provided";
   
}

// Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

     $sql = "select Description,BillValue,DateOfPayment,CategoryID from bill where BillID = $id";

    $result = $conn->query($sql);  
?>
<html>
    <head>
    </head>
  <?php include("../navbar/navbar.php")?> 
  <div class="w-xl m-20"> 
    <p><?php  
      if( $business_error != ""){ 
        echo $business_error;
        sleep(3);
        header("Location: ./edit_bills.php");
        exit();
    }else{
      ?></p>
    <p><?php echo $message?></p>
    <?php include("./forms_bill.php")?>
    <?php }?>
</div>

</html>