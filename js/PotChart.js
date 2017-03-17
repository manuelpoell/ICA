$(document).ready(function(){
	$.ajax({
		url : "../Potdata.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var timestamp = [];
			var potValue = [];

			for(var i in data) {
				timestamp.push(data[i].time);
				potValue.push(data[i].value);
			}

			var chartdata = {
				labels: timestamp,
				datasets: [
					{
						label: "Potentiometer",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: potValue
					}
				]
			};

			var ctx = $("#mycanvas");
			//var ctx = document.getElementById("mycanvas").getContext("2d");

//			var myChart = new Chart(ctx).Scatter({
//            data: chartdata,
//            options: {
//                responsive: true,
//                hoverMode: 'single',
//                scales: {
//                    xAxes: [{
//                        gridLines: {
//                            zeroLineColor: "rgba(0,0,0,1)"
//                        }
//                    }]
//                }
//            }
//    });
			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});
