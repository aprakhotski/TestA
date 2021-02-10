$(document).ready(function() {
    
	$('form').submit(function(event) {
		
		event.preventDefault();
		
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,			
			success: function(data) {
				$('#message').empty()
				
				if (typeof data == "string") {
						$('#message').append(data);
				} else {					
					$('#message').append("<table border='1'><tr><td>Номинал</td><td>Количество</td></tr></table>");
					let nominal = data[0];			
					let amount = data[1];			
					
					for (let i = 0; i < nominal.length; i++) {
						$('table').append("<tr><td>"+ nominal[i] +"</td><td>"+ amount[i] +"</td></tr>");
					}
				}
			}
		});
	});		
});
	