<?php 
include("../database/database.php");

$con = Database::getInstance();
$result = $con->runQuery("select CategoryID,CategoryName from Category");
$con->close();

?>
<html>
    <head>
    </head>
  <?php include("../navbar/navbar.php")?> 
  <div class="flex flex-row min-h-screen justify-center items-center"> 
        <div class="mb-5 width-50 ">
            <table class="table-auto border-spacing-2 border-separate border">
                 <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($result as $row) {?>
                         <tr>
                            <td><?php echo $row["CategoryID"]?></td>
                            <td><?php echo $row["CategoryName"]?></td>
                            <td><a href="../categories/add_categories?id=<?php echo $row["CategoryID"]?>">📝</td>
                            <td><a href="../categories/add_categories?id=<?php echo $row["CategoryID"]?>">🗑️</td>
                        </tr>
                        <?php }?>
                    </tbody>
            </table>
        </div>
    </div>
</html>