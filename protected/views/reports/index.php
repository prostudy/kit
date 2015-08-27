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
	<div class="col-md-12">
		<div class="panel panel-color panel-gray"><!-- Add class "collapsed" to minimize the panel -->
			<div class="panel-heading">
				<h3 class="panel-title">Normalización y Certificación Electrónica NYCE S.C. le informa:</h3>
							</div>
			<div class="panel-body content_article">
				<p>El objetivo del siguiente cuestionario es que usted realice una autoevaluaci&oacute;n acerca del cumplimiento que tiene su organizaci&oacute;n con la Ley Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares.</p>
				
				<p>Los beneficios que obtiene son:</p>
				
				<ol>
					<li>Conocer el estado en que se encuentra su organizaci&oacute;n en cuanto al grado de cumplimiento tomando como referencia &nbsp;la Ley Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares y dem&aacute;s normativa aplicable en la materia.</li>
					<li>Brindarle una visi&oacute;n m&aacute;s amplia sobre los elementos m&iacute;nimos &nbsp;que deben implementar las organizaciones para cumplir con la legislaci&oacute;n aplicable en materia de datos personales.</li>
					<li>Proporcionarle gr&aacute;ficos estad&iacute;sticos de los cuales se pueden identificar &aacute;reas de oportunidad y el grado de cumplimiento de diferentes sectores de la industria.</li>
				</ol>
				
				<p>NYCE se compromete a que sus datos ser&aacute;n tratados de forma confidencial, &eacute;stos no ser&aacute;n compartidos con ninguna autoridad o empresa y no se derivar&aacute;n revisiones posteriores por parte de la autoridad. Los resultados ser&aacute;n utilizados con fines estad&iacute;sticos.</p>
			</div>
		</div>
	</div>
</div>

<?php foreach ($reportSectors as $row){ echo $row['sector'];}?>


<div class="row">
				<div class="col-sm-12">
					
					<div class="chart-item-bg">
						<div id="pageviews-stats" style="height: 320px; padding: 20px 0;"></div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Pageviews
							</div>
							<div class="chart-entry-value">
								<div class="sparkline first-month"></div>
							</div>
						</div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Visitors
							</div>
							<div class="chart-entry-value">
								<div class="sparkline second-month"></div>
							</div>
						</div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Converted Sales
							</div>
							<div class="chart-entry-value">
								<div class="sparkline third-month"></div>
							</div>
						</div>
					</div>
					
				</div>
	</div>
	
	
	<div class="row">
				<div class="col-sm-6">
					
					<div class="chart-item-bg">
						<div id="pageviews-stats2" style="height: 320px; padding: 20px 0;"></div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Pageviews
							</div>
							<div class="chart-entry-value">
								<div class="sparkline first-month"></div>
							</div>
						</div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Visitors
							</div>
							<div class="chart-entry-value">
								<div class="sparkline second-month"></div>
							</div>
						</div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Converted Sales
							</div>
							<div class="chart-entry-value">
								<div class="sparkline third-month"></div>
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="col-sm-6">
					
					<div class="chart-item-bg">
						<div id="pageviews-stats3" style="height: 320px; padding: 20px 0;"></div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Pageviews
							</div>
							<div class="chart-entry-value">
								<div class="sparkline first-month"></div>
							</div>
						</div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Visitors
							</div>
							<div class="chart-entry-value">
								<div class="sparkline second-month"></div>
							</div>
						</div>
						
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								Converted Sales
							</div>
							<div class="chart-entry-value">
								<div class="sparkline third-month"></div>
							</div>
						</div>
					</div>
					
				</div>
	</div>
	
	
	<div class="row">
				<div class="col-sm-6">
					
					<div class="chart-item-bg">
						<div id="container"></div>
						
					</div>
					
				</div>
				
				<div class="col-sm-6">
					
					<div class="chart-item-bg">
						<div id="pie-chart"></div>
						
					</div>
					
				</div>
	</div>
	
	
		
	<div class="row">
				<div class="col-sm-12">
					
					<div class="chart-item-bg">
						<div id="spider"></div>
					</div>
				</div>
	</div>
			
			
			<script type="text/javascript">
				
					jQuery(document).ready(function($)
					{	

						var dataSource = [{
						    country: "Financiero",
						    gold: 36,
						    silver: 38,
						    bronze: 36
						}, {
						    country: "Salud",
						    gold: 51,
						    silver: 21,
						    bronze: 28
						}, {
						    country: "Telecomunicaciones",
						    gold: 23,
						    silver: 21,
						    bronze: 28
						}, {
						    country: "Camaras y asociaciones",
						    gold: 19,
						    silver: 13,
						    bronze: 15
						}, {
						    country: "Educacion",
						    gold: 14,
						    silver: 15,
						    bronze: 17
						}, {
						    country: "Insdustria/comercios/servicios",
						    gold: 16,
						    silver: 10,
						    bronze: 15
						}
						, {
						    country: "Otros",
						    gold: 16,
						    silver: 10,
						    bronze: 15
						}
						];

						
						$("#pageviews-stats").dxChart({
						    rotated: true,
						    pointSelectionMode: "multiple",
						    dataSource: dataSource,
						    commonSeriesSettings: {
						        argumentField: "country",
						        type: "stackedbar",
						        selectionStyle: {
						            hatching: {
						                direction: "left"
						            }
						        }
						    },
						    series: [
						      { valueField: "gold", name: "Gold Medals", color: "#ffd700" },
						      { valueField: "silver", name: "Silver Medals", color: "#c0c0c0" },
						      { valueField: "bronze", name: "Bronze Medals", color: "#cd7f32" }
						    ],
						    title: {
						        text: "Sectores y subsectores"
						    },
						    legend: {
						        verticalAlignment: "bottom",
						        horizontalAlignment: "center"
						    },
						    onPointClick: function(e) {
						        var point = e.target;
						        point.isSelected() ? point.clearSelection() : point.select();
						    }
						});





						var dataSource3 = [{
						    day: "Monday",
						    oranges: 3
						}, {
						    day: "Tuesday",
						    oranges: 2
						}, {
						    day: "Wednesday",
						    oranges: 3
						}, {
						    day: "Thursday",
						    oranges: 4
						}, {
						    day: "Friday",
						    oranges: 6
						}, {
						    day: "Saturday",
						    oranges: 11
						}, {
						    day: "Sunday",
						    oranges: 4
						}, {
						    day: "Sunday",
						    oranges: 4
						}, {
						    day: "s",
						    oranges: 4
						}, {
						    day: "d",
						    oranges: 4
						}, {
						    day: "a",
						    oranges: 4
						}];
						$("#pageviews-stats3").dxChart({
						    dataSource: dataSource3, 
						    series: {
						        argumentField: "day",
						        valueField: "oranges",
						        name: "My oranges",
						        type: "bar",
						        color: '#ffa500'
						    }
						});



						var dataSource2 = [{
						    breed: "Banco",
						    count: 61046
						}, {
						    breed: "Seguro",
						    count: 37545
						}, {
						    breed: "Afore",
						    count: 16776
						}, {
						    breed: "Casa de Bolsa",
						    count: 15049
						}, {
						    breed: "Finanzas",
						    count: 14582
						}, {
						    breed: "Hospitales",
						    count: 10852
						}, {
						    breed: "Clinicas",
						    count: 6717
						}, {
						    breed: "Cadenas de Farmacias",
						    count: 3864
						}, {
						    breed: "Laboratorios",
						    count: 3701
						}, {
						    breed: "Servicios funerarios",
						    count: 35887
						}, {
						    breed: "Escuelas",
						    count: 3118
						}, {
						    breed: "Universidades",
						    count: 2349
						}, {
						    breed: "Centros de capacitación",
						    count: 2349
						}, {
						    breed: "Centros de idiomas",
						    count: 2349
						}, {
						    breed: "Call centers",
						    count: 23498
						}];		

						var chart = $("#pageviews-stats2").dxChart({
						    dataSource: dataSource2,
						    rotated: true,
						    commonSeriesSettings: {
						        argumentField: "breed",
						        type: "bar"
						    },
						    series: {
						        valueField: "count", 
						        name: "breeds",
						        color: "#8B0000",
						        selectionStyle: {
						            color: "red",
						            hatching: "none"
						        }
						    },
						    title: {
						        text: "Sectores y subsectores"
						    },
						    legend: {
						        visible: true,     
						    },
						    valueAxis: {
						        label: {
						            format: 'thousands'
						        }
						    },
						    onPointClick: function(e) {
						        var point = e.target;
						        point.isSelected() ? point.clearSelection(): point.select();
						    }
						}).dxChart("instance");

						chart.getSeriesByPos(0).getPointByArg("Escuelas").select();



						var dataSource5 = [{
						    country: "USA",
						    medals: 110
						}, {
						    country: "China",
						    medals: 100
						}, {
						    country: "Russia",
						    medals: 72
						}, {
						    country: "Britain",
						    medals: 47
						}, {
						    country: "Australia",
						    medals: 46
						}, {
						    country: "Germany",
						    medals: 41
						}, {
						    country: "France",
						    medals: 40
						}, {
						    country: "Sa",
						    medals: 31
						}, {
						    country: "Sou",
						    medals: 31
						}, {
						    country: " Korea",
						    medals: 31
						}, {
						    country: "South",
						    medals: 31
						}];
						$("#container").dxPieChart({
						    dataSource: dataSource5,
						    title: "Olympic Medals in 2008",
						    legend: {
						        orientation: "horizontal",
						        itemTextPosition: "right",
						        horizontalAlignment: "right",
						        verticalAlignment: "bottom",
						        columnCount: 4
						    },
						    series: [{
						        argumentField: "country",
						        valueField: "medals",
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


						var states = [{
						    name: "California",
						    population: 38802500,
						    data: {
						        capital: "Sacramento",
						        area: 423967,
						        flag: "california"
						    }
						    
						}, {
						    name: "Texas",
						    area: 695662,
						    population: 26956958,
						    data: {
						        capital: "Austin",
						        area: 423967,
						        flag: "texas"
						    }
						}, {
						    name: "Florida",
						    area: 170312,
						    population: 19893297,
						    data: {
						        capital: "Tallahassee",
						        area: 423967,
						        flag: "florida"
						    }
						}, {
						    name: "New York",
						    area: 141297,
						    population: 19746227,
						    data: {
						        capital: "Albany",
						        area: 423967,
						        flag: "newyork"
						    }
						}, {
						    name: "Illinois",
						    area: 149995,
						    population: 12880580,
						    data: {
						        capital: "Springfield",
						        area: 423967,
						        flag: "illinois"
						    }
						}, {
						    name: "Pennsylvania",
						    area: 119280,
						    population: 12787209,
						    data: {
						        capital: "Harrisburg",
						        area: 423967,
						        flag: "pennsylvania"
						    }
						}, {
						    name: "Ohio",
						    area: 116098,
						    population: 11594163,
						    data: {
						        capital: "Columbus",
						        area: 423967,
						        flag: "ohio"
						    }
						}, {
						    name: "Georgia",
						    area: 153910,
						    population: 10097343,
						    data: {
						        capital: "Atlanta",
						        area: 423967,
						        flag: "georgia"
						    }
						}, {
						    name: "North Carolina",
						    area: 139391,
						    population: 9943964,
						    data: {
						        capital: "Raleigh",
						        area: 423967,
						        flag: "northcarolina"
						    }
						}, {
						    name: "Michigan",
						    area: 250487,
						    population: 9909877,
						    data: {
						        capital: "Lansing",
						        area: 423967,
						        flag: "michigan"
						    }
						}];

						
						$("#pie-chart").dxPieChart({
						    dataSource: states,
						    title: "Top 10 Most Populated States in US",
						    series: {
						        argumentField: "name",
						        valueField: "population",
						        tagField: "data"
						    },
						    tooltip: {
						        enabled: true,
						        customizeTooltip: function (args) {
						            return {
						                html: "<div class='state-tooltip'><h4>" +
						                args.argument + "</h4><div><b>Capital</b>: " +
						                args.point.tag.capital +
						                "</div><div><b>Population</b>: " +
						                Globalize.format(args.value, "N0") +
						                " people</div>" + "<div><b>Area</b>: " +
						                Globalize.format(args.point.tag.area, "N0") +
						                " km<sup>2</sup> (" +
						                Globalize.format(0.3861*args.point.tag.area, "N0") +
						                " mi<sup>2</sup>)" + "</div>" + "</div>"
						            };
						        }
						    }
						});




						var dataSource = [{
						    arg: "USA",
						    apples: 4.21,
						    grapes: 6.22,
						    lemons: 0.8,
						    oranges: 7.47
						}, {
						    arg: "China",
						    apples: 3.33,
						    grapes: 8.65,
						    lemons: 1.06,
						    oranges: 5
						}, {
						    arg: "Turkey",
						    apples: 2.6,
						    grapes: 4.25,
						    lemons: 0.78,
						    oranges: 1.71
						}, {
						    arg: "Italy",
						    apples: 2.2,
						    grapes: 7.78,
						    lemons: 0.52,
						    oranges: 2.39
						}, {
						    arg: "India",
						    apples: 2.16,
						    grapes: 2.26,
						    lemons: 3.09,
						    oranges: 6.26
						}];
						$("#spider").dxPolarChart({
						    dataSource: dataSource,
						    useSpiderWeb: true,
						    series: [{valueField: "apples", name: "Apples" },
						             { valueField: "grapes", name: "Grapes" },
						             { valueField: "lemons", name: "Lemons" },
						             { valueField: "oranges", name: "Oranges" }],
						    commonSeriesSettings: {        
						        type: "line"
						    },
						    title: "Fruit Production in 2010 (Millions of Tons)",
						    tooltip: {enabled: true}
						});
					// Pageview Stats
					/*$('#pageviews-stats').dxBarGauge({
						startValue: -50,
						endValue: 100,
						baseValue: 0,
						values: [-21.3, 14.8, -30.9, 45.2,80,90,99],
						label: {
							customizeText: function (arg) {
								return arg.valueText + '%';
							}
						},
						//palette: 'ocean',
						palette: ['#68b828','#7c38bc','#0e62c7','#fcd036','#4fcdfc','#00b19d','#ff6264','#f7aa47'],
						margin : {
							top: 0
						}
					});*/
					
					});
					
					
					</script>
						