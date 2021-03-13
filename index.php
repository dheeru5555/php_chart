<?php

    $conn = mysqli_connect('localhost','root','','test');
    $sql = "SELECT country_name,country_budget FROM military_budget";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
	   $dataPoints[] = array("Country"=>$row['country_name'], "y"=>$row['country_budget']);
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() 
 {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        subtitles: [{
            text: " Year 2020-21"
        }],
        data: [{
            type: "pie",  // bar,doughnut,funnel,pyramid
            yValueFormatString: "#,##0.\"\"",
            indexLabel: "{Country}  ( ${y} billion)",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
  chart.render();
 }
</script>
</head>
<body>


   <h1 style="text-align:center;color:gray">Pie Chat Data using PHP/MYQL</h1>
   <h2 style="text-align:center;color:green">Country by Military Budget ( In Billion Dollar )</h2>
   
   <div id="chartContainer" style="height: 370px; width: 100%;"></div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>         