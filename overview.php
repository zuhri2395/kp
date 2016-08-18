<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
    	<ol class="breadcrumb">
        	<li class="active">Dashboard</li>
        </ol>
        <h1>Dashboard</h1>
        <p>Dashboard is free admin template for everyone. Credits go to <a href="http://chartjs.org">Chart JS</a>, <a href="http://getbootstrap.com">Bootstrap</a>, and <a href="http://jqvmap.com">JQVMap</a>. templatemo provides <a href="#">free website templates</a> that can be used for any purpose. Morbi id nisi enim. Ut congue interdum pharetra facilisi. Aenean consectetur pellentesque mauris nec ornare. Nam tortor just, condimentum.</p>      
          
		<div class="templatemo-panels">
        	<div class="row">
        		<div class="col-md-6 col-sm-6 margin-bottom-30">
                	<div class="panel panel-success">
                  		<div class="panel-heading">Data Visualization</div>
                 		<canvas id="templatemo-line-chart" height="120" width="500"></canvas>
                	</div> 
                	<span class="btn btn-success"><a href="data-visualization.html">More Charts</a></span>
              	</div>      
            </div>
        </div>    
    </div>
</div>

<script type="text/javascript">
    // Line chart
    var randomScalingFactor = function () {
        return Math.round(Math.random() * 100)
    };
    var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }]
    }

    window.onload = function () {
        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        window.myLine = new Chart(ctx_line).Line(lineChartData, {
            responsive: true
        });
    };
</script>