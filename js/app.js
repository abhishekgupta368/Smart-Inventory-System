$(document).ready(function(){
	$.ajax({
		url: "http://localhost/project/admin/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var product = [];
			var volume = [];

			for(var i in data) {
				product.push("Product ID " + data[i].product_id);
				volume.push(data[i].volume);
			}

			var chartdata = {
				labels: product,
				datasets : [
					{
						label: 'warehouse status',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: volume
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});