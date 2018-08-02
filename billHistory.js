$(document).ready(function(){
	$.ajax({
		url: "http://localhost/Capstone_Project/billHistory.php",
		method: "GET",
		success: function(data){
			console.log(data);
			var month = [];
			var amount = [];
			
			for(var i in data){
				month.push("Month " + data[i].Month);
				amount.push(data[i].Amount);
			}
			
			var chartdata = {
				labels: month,
				datasets : [
					{
						label: 'Total Amount(Rs)',
						backgroundColor: 'grey',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'red',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: amount
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