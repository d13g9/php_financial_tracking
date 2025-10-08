<?php
echo "passei";
$action = "list_bills.php";
$conn = new mysqli("localhost", "root", "", "ledger");
$result_table = [];
$result_category = [];
$categoryId = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $GLOBALS["categoryId"] = $_POST['category'];
    $GLOBALS["result_table"] = $conn->query("SELECT * FROM bill where CategoryID = $categoryId");
}else{
    $GLOBALS["result_category"] = $conn->query("SELECT * FROM category");
    echo  "Array: ".$GLOBALS["result_category"];
}

?>

<!--<html>
    <head>
    </head>
  <?php include("../navbar/navbar.php")?> 
  <div class="w-xl m-20"> 
  <form method="POST" action="<?php echo "./".$action;?>">  
        <div class="mb-5 width-50">
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
          <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required >
            <?php while ($row = $result_category->fetch_assoc()) { ?>
               
                <option value="<?php echo $row["CategoryID"]?>"><?php echo $row["CategoryName"]?></option>
           <?php }?>
         </select>
         <input type="submit" value="buscar"/>
         </form>
    </div>
 
   <?php if(count($GLOBALS["result_table"]) > 0) { ?>
   <div class="flex flex-row min-h-screen justify-center items-center"> 
        <div class="mb-5 width-50 ">
            <table class="table-auto border-spacing-2 border-separate border">
                 <thead>
                    <tr>
                        <th>Bill ID</th>
                        <th>Bill Description</th>
                        <th>Bill Value</th>
                        <th>Date of Payment</th>
                        <th>Category ID</th>
                        <th>Edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($GLOBALS["result_table"]  as $row) {?>
                         <tr>
                            <td><?php echo $row["BillID"]?></td>
                            <td><?php echo $row["Description"]?></td>
                            <td><?php echo $row["BillValue"]?></td>
                            <td><?php echo $row["DateOfPayment"]?></td>
                            <td><?php echo $row["CategoryID"]?></td>
                            <td><a href="../bills/edit_bills?id=<?php echo $row["BillID"]?>">📝</td>
                            <td><a href="../bills/delete_bills?id=<?php echo $row["BillID"]?>">🗑️</td>
                        </tr>
                        <?php }?>
                    </tbody>
            </table>
        </div>
    </div>
        
</div>
<?php } ?>
</html>-->