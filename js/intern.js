    $(function() {
		//ajax for events
		$('.event_data').html("<center><h4>Loading Please Wait...</h4><img src='img/loading.gif'></center>");
		$(".upcoming").addClass("event-tab-active");
		var up = 1;
			$.ajax( {
				type: 'POST',
				url: 'internship_data.php',
				data: { up: up},

				success: function(data) {
					$('.event_data').html(data);
					$('.upcoming').addClass("event-tab-active");
				}
			} );
			
			
		$(".upcoming").click(function() {
			$('.event_data').html("<center><h4>Loading Please Wait...</h4><img src='img/loading.gif'></center>");
			var upcoming = 1;
			$.ajax( {
				type: 'POST',
				url: 'internship_data.php',
				data: { upcoming : upcoming},

				success: function(data) {
					$('.event_data').html(data);
					$('.upcoming').addClass("event-tab-active");
					$(".past").removeClass("event-tab-active");
				}
			} );
		});
		
		$(".past").click(function() {
			$('.event_data').html("<center><h4>Loading Please Wait...</h4><img src='img/loading.gif'></center>");
			var past = 1;
			$.ajax( {
				type: 'POST',
				url: 'internship_data.php',
				data: { past : past},

				success: function(data) {
					$('.event_data').html(data);
					$(".past").addClass("event-tab-active");
					$(".upcoming").removeClass("event-tab-active");
				}
			} );
		});
		
		$('body').on('click', '.btn-event', function (){
		var intern_id =  $(this).attr("id");
		var img_src_eve = $('[id^=3] img').attr("src");
		$.ajax( {
						type: 'POST',
						url: 'internship_data.php',
						data: { intern_id : intern_id},

						success: function(data) {
							$('.view_intern_modal').html(data);
							$('#eventM').modal('show');
							}
						});
		});
		
		
		//apply monitor
	    $('body').on('click', '.apply-link', function (){
		var intern_ap =  $(this).attr("class");
		$.ajax( {
						type: 'POST',
						url: 'intern_monitor.php',
						data: { intern_ap : intern_ap},

						success: function(data) {
							}
						});
		});
		
		
    });