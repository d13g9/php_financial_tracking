<?php
include("../database/database.php");

$start_month = "";
$end_mont    = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	echo "passei";
	$start_month = $_POST['start'];
	$end_month   = $_POST['start'];
}else{
	$start_month = date('Y-m-01');
	$end_mont    =  date('Y-m-t');
}


function getSummarizeBillsByCategory(){

	$dataPoints = array();
	$con = Database::getInstance();
	$sql = "SELECT (100 * (sum(BillValue)/(select SUM(BillValue) from bill where DateOfPayment between STR_TO_DATE('$GLOBALS[start_month]','%Y-%m-%d') and STR_TO_DATE('$GLOBALS[end_mont]','%Y-%m-%d')))) as y ,category.CategoryName as label from bill INNER JOIN category on bill.CategoryID = category.CategoryId where DateOfPayment between STR_TO_DATE('$GLOBALS[start_month]','%Y-%m-%d') and STR_TO_DATE('$GLOBALS[end_mont]','%Y-%m-%d') group by category.CategoryName";

	$result = $con->runQuery($sql);

	 while ($row = mysqli_fetch_array($result)){
       $dataPoints[] = $row;
    }

	//$con->close();

	return $dataPoints;
}

function getTotalBillValues(){

	$con = Database::getInstance();

	$result = $con->runQuery("select sum(BillValue) as soma from  bill where DateOfPayment between STR_TO_DATE('$GLOBALS[start_month]','%Y-%m-%d') and STR_TO_DATE('$GLOBALS[end_mont]','%Y-%m-%d')");

	while ($row = mysqli_fetch_array($result)){
       $sum = $row;
    }

	$con->close();

	return $sum;

}
     
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Expenses per category"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode(getSummarizeBillsByCategory(), JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
	<?php include("../navbar/navbar.php")?>
	<div>
		<div class="flex">
			<form>
				<label for="start">Start Date</label>
				<input type="date" name="start" id="start">
				<label for="end">End Date</label>
				<input type="date" name="end" id="end">
				<button type="submit">Search</button>
            </form>	
         </div>
    </div>
	</div>
	<div class="flex justify-content: center;">
		<div class="flex-1"><div id="chartContainer"></div></div>
		<div class="flex-1"><h1><?php echo getTotalBillValues()["soma"];?></h1></div>
	</div>

	
	
	
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>  