<?php
//include_once('dbconnect.php');
$conn = mysqli_connect('localhost', 'root', '', 'tiembachhoatonghop') or die ("connection failed".mysqli_connect_error());
$query = "SELECT sp.sp_ten, ctdh.sp_dh_soluong FROM chitiet_donhang ctdh join sanpham sp on ctdh.sp_ma=sp.sp_ma";
$result = mysqli_query($conn, $query);
$data = [];
while ($row = mysqli_fetch_array($result)){
    $data[] = $row;
}
/*echo "<pre>";
var_dump($data);
echo "<pre>";*/
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['sp_ten', 'sp_dh_soluong'],
         <?php
         foreach ($data as $key){
            echo "['".$key['sp_ten']."',".$key['sp_dh_soluong']."],";
         }
         ?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
