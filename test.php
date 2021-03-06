<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  // $model->restrictAccessByLevel(2);
  $data = $model->getCompanyBySessionId();
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">


  </style>
  
<script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/data.js"></script>
<script src="hc/code/modules/drilldown.js"></script>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
          function renderChart(res){
            // Create the chart
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Number of Applicants per Year'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Applicants Count'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                "series": [
                    {
                        "name": "Browsers",
                        "colorByPoint": true,
                        "data": res.data
                    }
                ],
                "drilldown": {
                    "series": res.series
                }
            });
          }


          //loads initial data
          $.ajax({
            url : "process.php",
            data : { viewAdminChart : true},
            type : "POST",
            dataType : "JSON", 
            success : function(res){
                renderChart(res);
            }
          });
        });
      })(jQuery);
    </script>
    <script type="text/javascript">


    </script>
  </body>
</html>
