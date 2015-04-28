		$(".page_u").click(function() {
			$('.event_data').html("<center><h4>Loading Please Wait...</h4><img src='img/loading.gif'></center>");
			var upcoming = 1;
			var curr =  $(this).attr("id");
			$.ajax( {
				type: 'POST',
				url: 'internship_data.php',
				data: { upcoming : upcoming,
						p : curr},

				success: function(data) {
					$('.event_data').html(data);
					$('.upcoming').addClass("event-tab-active");
					$(".past").removeClass("event-tab-active");
				}
			} );
		});

		$(".page_p").click(function() {
			$('.event_data').html("<center><h4>Loading Please Wait...</h4><img src='img/loading.gif'></center>");
			var past = 1;
			var curr =  $(this).attr("id");
			$.ajax( {
				type: 'POST',
				url: 'internship_data.php',
				data: { past : past,
						p : curr},

				success: function(data) {
					$('.event_data').html(data);
					$(".past").addClass("event-tab-active");
					$(".upcoming").removeClass("event-tab-active");
				}
			} );
		});
