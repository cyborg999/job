<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(3);
?>
<?php include_once "header2.php"; ?>
  <script src="hc/code/highcharts.js"></script>
  <script src="hc/code/modules/data.js"></script>
  <script src="hc/code/modules/drilldown.js"></script>
  <style type="text/css">

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "admin-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
          <br>
          <div  class="container">
            <div class="row">
              <div class="col-12" id="applicant"></div>
            </div>
            <div class="row">
              <div class="col-12" id="employer"></div>
            </div>
          </div>
         
        </main>
      </div>
    </div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
          function renderChart(res,target, title, yLabel){
            // Create the chart
            Highcharts.chart(target, {
                chart: {
                    type: 'column'
                },
                title: {
                    text: title
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: yLabel
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
                renderChart(res, "applicant", 'Number of Applicants per Year',  'Applicant Count');
            }
          });

          //loads initial data
          $.ajax({
            url : "process.php",
            data : { viewAdminChartEmployer : true},
            type : "POST",
            dataType : "JSON", 
            success : function(res){
                renderChart(res, "employer", 'Number of Employers per Year',  'Employer Count');
            }
          });
        });
      })(jQuery);
    </script>
  </body>
</html>
