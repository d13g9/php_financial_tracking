<?php
$message = "";
$action = "add_bills.php";
$conn = new mysqli("localhost", "root", "", "ledger");
// Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

     $sql = "select CategoryId,CategoryName from category order by CategoryName";

    $result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $categoryId = $_POST['category'];
    $description = $_POST['description'];
    $bill_value = $_POST['bill_value'];
    $date_of_payment  = $_POST['date_of_payment'];

    $sql = "INSERT INTO bill (Description,BillValue,DateOfPayment,CategoryID) VALUES ('$description',$bill_value,STR_TO_DATE('$date_of_payment','%Y-%m-%d'),$categoryId)";
    
     if ($conn->query($sql) === TRUE) {
      $message= "New Bill saved successfully";
    } else {
      $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();


?>




<html>
    <head>
    </head>
  <?php include("../navbar/navbar.php")?> 
  <div class="w-xl m-20"> 
    <p><?php echo $message?></p>
    <?php include("./forms_bill.php")?>
</div>

</html>