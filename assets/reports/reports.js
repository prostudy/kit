				
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
});
	
	
