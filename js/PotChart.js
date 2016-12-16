$(document).ready(function(){
	$.ajax({
		url : "./data.php", 
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

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});