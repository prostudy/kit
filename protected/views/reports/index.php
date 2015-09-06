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
		<h1 class="title">Reportes</h1>
		<p class="description">Cuestionario para conocer el estado de cumplimiento sobre la LFPDPPP y demás normativa aplicable. </p>
	</div>
			
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
			<div class="xe-icon">
				<i class="linecons-cloud"></i>
			</div>
			<div class="xe-label">
				<strong class="num">99.9%</strong>
				<span>Server uptime</span>
			</div>
		</div>
		</div>
		<div class="col-sm-3">
			<div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="1" data-to="<?= $totalSurveys ?>" data-suffix="" data-duration="3" data-easing="false">
				<div class="xe-icon">
					<i class="linecons-user"></i>
				</div>
				<div class="xe-label">
					<strong class="num"><?= $totalSurveys ?></strong>
					<span>Encuestas realizadas</span>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="1000" data-to="2470" data-duration="4" data-easing="true">
				<div class="xe-icon">
					<i class="linecons-camera"></i>
				</div>
				<div class="xe-label">
					<strong class="num">2,470</strong>
					<span>New Daily Photos</span>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
		<div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
			<div class="xe-icon">
				<i class="linecons-cloud"></i>
			</div>
			<div class="xe-label">
				<strong class="num">99.9%</strong>
				<span>Server uptime</span>
			</div>
		</div>
		</div>
</div>

<div class="row">
	<div class="col-sm-3">
		<div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
			<div class="xe-icon">
				<i class="linecons-cloud"></i>
			</div>
			<div class="xe-label">
				<strong class="num">99.9%</strong>
				<span>Server uptime</span>
			</div>
		</div>
		</div>
		<div class="col-sm-3">
			<div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="1" data-to="<?= $totalSurveys ?>" data-suffix="" data-duration="3" data-easing="false">
				<div class="xe-icon">
					<i class="linecons-user"></i>
				</div>
				<div class="xe-label">
					<strong class="num"><?= $totalSurveys ?></strong>
					<span>Encuestas realizadas</span>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="1000" data-to="2470" data-duration="4" data-easing="true">
				<div class="xe-icon">
					<i class="linecons-camera"></i>
				</div>
				<div class="xe-label">
					<strong class="num">2,470</strong>
					<span>New Daily Photos</span>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
		<div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
			<div class="xe-icon">
				<i class="linecons-cloud"></i>
			</div>
			<div class="xe-label">
				<strong class="num">99.9%</strong>
				<span>Server uptime</span>
			</div>
		</div>
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
	<div class="col-sm-12">
		<div class="chart-item-bg">
			<div id="dataSourceRadioQuestions"></div>
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
var dataSourceRadioQuestions = <?php echo $dataSourceRadioQuestions	;?>;	
</script>
<script src="<?=Yii::app()->request->baseUrl;?>/assets/reports/reports.js"></script>
