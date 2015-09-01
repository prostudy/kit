				
					jQuery(document).ready(function($)
					{	
						
						$("#dataSourcePieSubsectors").dxPieChart({
						    dataSource: dataSourcePieSubsectors,
						    title: "Subsectores",
						    legend: {
						        orientation: "horizontal",
						        itemTextPosition: "right",
						        horizontalAlignment: "right",
						        verticalAlignment: "bottom",
						        columnCount: 4
						    },
						    series: [{
						        argumentField: "subsector",
						        valueField: "subsector_total",
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
						
						
						var chart = $("#dataSourcePieSubsectorsBars").dxChart({
						    dataSource: dataSourcePieSubsectors,
						    rotated: true,
						    commonSeriesSettings: {
						        argumentField: "subsector",
						        type: "bar"
						    },
						    series: {
						        valueField: "subsector_total", 
						        name: "Subsectores",
						        color: "#01A7A7",
						        selectionStyle: {
						            color: "red",
						            hatching: "none"
						        }
						    },
						    title: {
						        text: "Subsectores"
						    },
						    legend: {
						        visible: false,     
						    },
						   
						    onPointClick: function(e) {
						        var point = e.target;
						        point.isSelected() ? point.clearSelection(): point.select();
						    }
						}).dxChart("instance");

						//chart.getSeriesByPos(0).getPointByArg("Escuelas").select();
						
						
						$("#barSimpleQuestions").dxChart({
						    dataSource: getDataSourceBarSimpleQuestions, 
						    title: "Preguntas Básicas (1-5 y 22-28)",
						    series: {
						        argumentField: "id",
						        valueField: "total",
						        name: "Preguntas básicas",
						        type: "bar",
						        color: '#ffa500'
						    }
						});
						
						
						
						
						$("#dataSourceRadioQuestions").dxChart({
						    dataSource: dataSourceRadioQuestions,
						    commonSeriesSettings: {
						        argumentField: "text",
						        type: "bar",
						        hoverMode: "allArgumentPoints",
						        selectionMode: "allArgumentPoints",
						        label: {
						            visible: true,
						            format: "fixedPoint",
						            precision: 0
						        }
						    },
						    series: [
						        { valueField: "No_existe", name: "No existe" },
						        { valueField: "Documentado", name: "Documentado" },
						        { valueField: "Parcialmente_implementado", name: "Parcialmente implementado" },
						        { valueField: "Implementado", name: "Implementado" }
						        
						    ],
						    title: "Preguntas Radio",
						    legend: {
						        verticalAlignment: "bottom",
						        horizontalAlignment: "center"
						    },
						    onPointClick: function (e) {
						        e.target.select();
						    }
						});
						
						
						
						/*Pregunta numero 1,2,3,5,6,22,23,24,25,26,27,28 
						$('#'+idDiv).dxChart({
						    dataSource: dataSourceQuestion,
						    commonSeriesSettings: {
						        argumentField: "text",
						        type: "bar",
						        hoverMode: "allArgumentPoints",
						        selectionMode: "allArgumentPoints",
						        label: {
						            visible: true,
						            format: "fixedPoint",
						            precision: 0
						        }
						    },
						    valueAxis: {
						        title: {
						            text: "Número de respuestas"
						        }
						    },
						    series: series,
						    title: textQuestion,
						    tooltip: {
						        enabled: true
						    },
						    legend: {
						        verticalAlignment: "bottom",
						        horizontalAlignment: "center"
						    },
						    onPointClick: function (e) {
						        e.target.select();
						    }
						});*/
						
						
						
						
						
						

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
					
					
