<style>
.state-tooltip {
    height: 90px;
}

.state-tooltip > img {
    width: 60;
    height: 40px;
    display: block;
    margin: 0 5px 0 0;
    float: left;
}

.state-tooltip > h4 {
    line-height: 40px;
    font-size: 14px;
    margin-bottom: 5px;
}

.state-tooltip sup {
    font-size: 0.8em;
    vertical-align: super;
    line-height: 0;
}
</style>
<div class="page-title">
			
	<div class="title-env">
		<h1 class="title">Reportes (<?= "Se han completado $totalSurveys cuestionarios" ?>)</h1>
		<p class="description">Cuestionario para conocer el estado de cumplimiento sobre la LFPDPPP y demás normativa aplicable. </p>
	</div>
			
</div>




<!-- Graficas de sectores y subsectores -->
<div class="row">
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSubsectors"></div>
		</div>		
	</div>
	
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSubsectorsBars" style="height: 320px; padding: 20px 0;"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSector1"></div>
		</div>		
	</div>
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSector2"></div>
		</div>		
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSector3"></div>
		</div>		
	</div>
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSector4"></div>
		</div>		
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSector5"></div>
		</div>		
	</div>
	<div class="col-sm-6">
		<div class="chart-item-bg">
			<div id="dataSourcePieSector6"></div>
		</div>		
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="chart-item-bg">
			<div id="dataSourcePieSector7"></div>
		</div>		
	</div>
</div>


<div class="row">
	<div class="col-sm-12">
		<div class="chart-item-bg">
			<div id="dataSourceRadioQuestions"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Nivel de cumplimiento </h3>
			</div>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Tópico</th>
					</tr>
				</thead>
				<tbody>
				<?php for ($i=0; $i<count($radioTopics) && $i<8; $i++){?>
					<tr>
						<td><?= $radioTopics[$i]['number']?></td>
						<td><?= $radioTopics[$i]['topic']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Nivel de cumplimiento </h3>
			</div>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Tópico</th>
					</tr>
				</thead>
				<tbody>
				<?php for ($i=8; $i<count($radioTopics); $i++){?>
					<tr>
						<td><?= $radioTopics[$i]['number']?></td>
						<td><?= $radioTopics[$i]['topic']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<script src="assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
<!-- Preguntas numero 1,2,3,5,6,22,23,24,25,26,27,28 -->
<?php foreach ($simpleQuestions as $question){?>
<div class="row">
	<div class="col-sm-12">
		<div class="chart-item-bg">
			<div id="<?= $question['idDiv']?>"></div>
		</div>
	</div>
</div>
<script>
    var dataSourceQuestion = <?php echo json_encode ($question['dataSource'] );?>;
	var idDiv = <?php echo "'".$question['idDiv']."'";?>;
	var textQuestion = <?php echo "'".$question['textQuestion']."'";?>;
	$("#"+idDiv).dxChart({
	    dataSource: dataSourceQuestion, 
	    equalBarWidth: {
            width: 25
        },
	    legend: {
	        verticalAlignment: "bottom",
	        horizontalAlignment: "center"
	    },
	    tooltip: {
	        enabled: true
	    },
	    series: {
	        argumentField: "text",
	        valueField: "total",
	        name: textQuestion,
	        type: "bar",
	        color: '#01A7A7'
	    }
	});

	/*$("#"+idDiv).dxPieChart({
	    
	    dataSource: dataSourceQuestion,
	    series: [
	        {
	            argumentField: "text",
	            valueField: "total",
	            label:{
	                visible: true,
	                connector:{
	                    visible:true,           
	                    width: 1
	                }
	            }
	        }
	    ],
	    title: textQuestion ,
	    onPointClick: function(e) {
	        var point = e.target;
	        point.isVisible() ? point.hide() : point.show();
	    }
	});*/

	$("#"+idDiv).dxPieChart({
	    dataSource: dataSourceQuestion,
	    /*title: textQuestion ,*/
	    legend: {
	        orientation: "horizontal",
	        itemTextPosition: "right",
	        horizontalAlignment: "right",
	        verticalAlignment: "bottom",
	        columnCount: 4
	    },
	    series: [{
	        argumentField: "text",
	        valueField: "total",
	        label: {
	            visible: true,
	            font: {
	                size: 16
	            },
	            connector: {
	                visible: true,
	                width: 0.5
	            },
	            position: "columns",
	            customizeText: function(arg) {
	                return arg.valueText + " ( " + arg.percentText + ")";
	            }
	        }
	    }]
	});

	$("#"+idDiv).dxChart({
        rotated: true,
        dataSource: dataSourceQuestion,
        equalBarWidth: {
            width: 25
        },
        series: {
            label: {
                visible: true
            },
            type: 'bar',
            argumentField: 'text',
            valueField: 'total',
            color: '#01A7A7'
        },
        title: textQuestion,
        argumentAxis: {
            label: {
                customizeText: function() {
                    return this.valueText + '';
                }
            }
        },
        valueAxis: {
            label: {
                visible: false
            }
        },
        legend: {
            visible: false
        }
	});
	
    </script>

<?php }?>
	
	
<script>
var dataSourcePieSubsectors = <?php echo $dataSourcePieSubsectors;?>;
var dataSourcePieSector1 = <?php echo $dataSourcePieSector1;?>;
var dataSourcePieSector2 = <?php echo $dataSourcePieSector2;?>;
var dataSourcePieSector3 = <?php echo $dataSourcePieSector3;?>;
var dataSourcePieSector4 = <?php echo $dataSourcePieSector4;?>;
var dataSourcePieSector5 = <?php echo $dataSourcePieSector5;?>;
var dataSourcePieSector6 = <?php echo $dataSourcePieSector6;?>;
var dataSourcePieSector7 = <?php echo $dataSourcePieSector7;?>;



var dataSourceRadioQuestions = <?php echo $dataSourceRadioQuestions	;?>;	
</script>
<script src="<?=Yii::app()->request->baseUrl;?>/assets/reports/reports.js"></script>
