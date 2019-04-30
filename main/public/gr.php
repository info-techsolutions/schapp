<!DOCTYPE HTML>
<html>
<?php include_once '../inc/config.php'; ?>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([
 

 ['Students', 'Subjects'],
 <?php 
 $stmt = $db->query("SELECT count(person_number) AS count, test_three FROM z_tb_report WHERE subject_id = 2 GROUP BY test_three ORDER BY test_three");

 while($row = $stmt->fetch()){

 echo "['".$row['test_three']."',".$row['count']."],";
 }
 ?>
 
 ]);

 var options = {
 title: 'Student Biodata'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
</head>
<body>
 <h3>Column Chart</h3>
 <div id="columnchart" style="width: 900px; height: 500px;"></div>
</body>
</html>
