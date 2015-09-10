				
jQuery(document).ready(function($){	
		
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
		
		$("#dataSourcePieSector1").dxPieChart({
			dataSource: dataSourcePieSector1,
			title: "Financiero",
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
		
		$("#dataSourcePieSector2").dxPieChart({
			dataSource: dataSourcePieSector2,
			title: "Salud",
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
		
		$("#dataSourcePieSector3").dxPieChart({
			dataSource: dataSourcePieSector3,
			title: "Telecomunicaciones",
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
		
		$("#dataSourcePieSector4").dxPieChart({
			dataSource: dataSourcePieSector4,
			title: "Cámaras y asociaciones",
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
		
		$("#dataSourcePieSector5").dxPieChart({
			dataSource: dataSourcePieSector5,
			title: "Educación",
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
		
		$("#dataSourcePieSector6").dxPieChart({
			dataSource: dataSourcePieSector6,
			title: "Industria/comercio/servicios",
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
		
		$("#dataSourcePieSector7").dxPieChart({
			dataSource: dataSourcePieSector7,
			title: "Otros sectores",
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
	
	
	$("#dataSourceRadioQuestions").dxChart({
	dataSource: dataSourceRadioQuestions,
	commonSeriesSettings: {
	    argumentField: "text",
	    type: "bar",
	    hoverMode: "allArgumentPoints",
	    selectionMode: "allArgumentPoints",
	    label: {
	        visible: false,
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
	title: "Estado de cumplimiento global",
	legend: {
	    verticalAlignment: "bottom",
	    horizontalAlignment: "center"
		    },
		    onPointClick: function (e) {
		        e.target.select();
		    }
		});
});
	
	
