<?php
$message = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  print_r($_POST);
  $category_name = $_POST['category_name'];

  if($category_name === null || strlen($category_name) == 0) {
    $message = "Name of the category was empty";
  }else{

    $conn = new mysqli("localhost", "root", "", "ledger");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO category (CategoryName) VALUES ('$category_name')";

    if ($conn->query($sql) === TRUE) {
      $message= "New category saved created successfully";
    } else {
      $message = "Error: " . $sql . "<br>" . $conn->error;
    }
   
    $conn->close();

  }
}

?>




<html>
    <head>
    </head>
  <?php include("../navbar/navbar.php")?> 
  <div class="w-xl m-20"> 
    <p><?php echo $message?></p>
    <form method="POST">
        <div class="mb-5 width-50">
          <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
          <input type="text" id="category_name" name="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
        </div>
        <div class="flex items-start mb-5">
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </div>
      </form>
</div>

</html>