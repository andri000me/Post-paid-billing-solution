$(document).ready(function(){
	$.ajax({
		url: "http://localhost/Capstone_Project/dataSmsUsage.php",
		method: "GET",
		success: function(data){
			console.log(data);
			var month = [];
			var minutes = [];
			
			for(var i in data){
				month.push("Month " + data[i].Month);
				minutes.push(data[i].Total_Calls);
			}
			
			var chartdata = {
				labels: month,
				datasets : [
					{
						label: 'SMS (in numbers)',
						backgroundColor: 'grey',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'red',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: minutes
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
			
		},
		error: function(data){
			console.log(data);
		}
	});
});