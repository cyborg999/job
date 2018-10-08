<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  // $model->restrictAccessByLevel(2);
  $data = $model->getCompanyBySessionId();
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">


  </style>
  <script src="hc/code/highcharts.js"></script>
  <script src="hc/code/modules/series-label.js"></script>
  <script src="hc/code/modules/exporting.js"></script>
  <script src="hc/code/modules/export-data.js"></script>

    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
          <br>
          <br>
          <div class="container" id="container">
           
          </div>
          <div class="container">
            <label>Filter By year
                <input type="number" class="form-control" id="year" placeholder="type year...">
            </label>
            <button id="view" class="btn btn-primary btn-sm">view report</button>
          </div>
          
        </main>
      </div>
    </div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        (function($){
            $(document).ready(function(){
                function renderChart(data, date, end){
                    var startDate = (new Date()).getFullYear();
                    var endDate =  startDate+1;

                    if(date != null){
                        startDate = date;
                        endDate = end;
                    }

                    Highcharts.chart('container', {
                        title: {
                            text: 'Number of Application as of ' + startDate +'-' + endDate
                        },
                        chart: {
                            type: 'line'
                        },
                                            subtitle: {
                                                text: ''
                                            },
                                            xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },
                        yAxis: {
                            title: {
                                text: 'Applicants Count'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },
                        plotOptions: {
                            series: {
                                label: {
                                    connectorAllowed: false
                                },
                                pointStart: 1
                            }
                        },
                        series: data,
                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    }
                                }
                            }]
                        }
                    });
                }

                $("#view").on("click", function(e){
                    e.preventDefault();
                    var year = $("#year").val();
                    var end = +year + +1;

                    $.ajax({
                            url : "process.php",
                            data : { viewEmployerChart : true, year: year},
                            type : "POST",
                            dataType : "JSON", 
                            success : function(res){
                                renderChart(res, year, end);
                            }
                    });
                });

                //loads initial data
                $.ajax({
                        url : "process.php",
                        data : { viewEmployerChart : true, year: "current"},
                        type : "POST",
                        dataType : "JSON", 
                        success : function(res){
                            renderChart(res,null,null);
                        }
                });
                

            });
        })(jQuery);
    </script>

  </body>
</html>
