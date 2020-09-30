<?php  
 $connect = mysqli_connect("localhost", "root", "", "test321");  
 $query = "SELECT gender, count(*) as number FROM tbl_employee GROUP BY gender";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["gender"]."', ".$row["number"]."],";  
                          }  
                          ?>
                     ]);  
                var options = {  
                      title: 'Percentage of Male and Female Employees',  
                      //is3D:true,  
                      pieHole: 0.6  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:100%;">  
                <h3 align="center">Create Simple Pie Chart by Google Chart API with PHP Mysql</h3>  
                <br />  
                <div id="piechart" style="width: 100%; height: 500px;"></div>  
           </div>  
      </body>  
 </html>