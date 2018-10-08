<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  // $chart = $model->getEmployerChart();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
	</head>
	<body>
<script src="hc/code/highcharts.js"></script>
<script src="hc/code/modules/series-label.js"></script>
<script src="hc/code/modules/exporting.js"></script>
<script src="hc/code/modules/export-data.js"></script>

    <div id="container"></div>

    <div class="container">
        <label>Filter By year
            <input type="number" id="year" placeholder="type year...">
        </label>
        <button id="view" class="btn btn-primary">view report</button>
    
    </div>
    

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
