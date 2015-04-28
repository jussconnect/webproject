    $(function() {
		//ajax for events
		$('.event_data').html("<center><h4>Loading Please Wait...</h4><img src='img/loading.gif'></center>");
		$(".upcoming").addClass("event-tab-active");
		var up = 1;
			$.ajax( {
				type: 'POST',
				url: 'event_data.php',
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
				url: 'event_data.php',
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
				url: 'event_data.php',
				data: { past : past},

				success: function(data) {
					$('.event_data').html(data);
					$(".past").addClass("event-tab-active");
					$(".upcoming").removeClass("event-tab-active");
				}
			} );
		});
		
		$('body').on('click', '.btn-event', function (){
		var event_id =  $(this).attr("id");
		var img_src_eve = $('[id^=3] img').attr("src");
		$.ajax( {
						type: 'POST',
						url: 'event_data.php',
						data: { event_id : event_id},

						success: function(data) {
							$('.view_event_modal').html(data);
							$('#eventM').modal('show');
							}
						});
		});
		
		
		//create event modal
		
        $("#timepicker-container1").datetimepicker({
        pickDate:false
        });

         $("#datepicker-container1").datetimepicker({
        pickTime:false
        }).on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('#datepicker-container2').datetimepicker('setStartDate', startDate);
         }); 

         $("#timepicker-container2").datetimepicker({
        pickDate:false
        });

         $("#datepicker-container2").datetimepicker({
        pickTime:false
        }).on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('#datepicker-container1').datetimepicker('setEndDate', FromEndDate);
         });
		
         $(".create-event-button").click(function(event){
            var input_post = $("#title").val();      
                if (input_post==""){
                    $("#event-title").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#event-title").removeClass("has-error");
                }
                var input_post = $("#venue").val();      
                if (input_post==""){
                    $("#event-venue").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#event-venue").removeClass("has-error");
                }
                var input_post = $("#type").val();   
                if (input_post==""){
                    alert(input_post);
                    $("#event-type").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#event-type").removeClass("has-error");
                }
                var input_post = $("#datepicker1").val();   
                 if (input_post==""){
                    $("#datepicker-container1").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#datepicker-container1").removeClass("has-error");
                }
                var input_post = $("#timepicker1").val();   
                 if (input_post==""){
                    $("#timepicker-container1").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#timepicker-container1").removeClass("has-error");
                }
                var input_post = $("#datepicker2").val();   
                 if (input_post==""){
                    $("#datepicker-container2").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#datepicker-container2").removeClass("has-error");
                }
                
                 var input_post = $("#description").val();   
                 if (input_post==""){
                    $("#event-description").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#event-description").removeClass("has-error");
                }
                 var input_post = $("#mail-id").val();   
                 if (input_post==""){
                    $("#user-mail").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#user-mail").removeClass("has-error");
                }
                 var input_post = $("#tel").val();   
                 if (input_post==""){
                    $("#user-tel").addClass("has-error");
                    event.preventDefault(); 
                }
                else
                {
                    $("#user-tel").removeClass("has-error");
                }
				
				var fileSize = $("#browse_btn")[0].files[0].size;
				var sizeInMb = (fileSize/2097152);
				if(fileSize>2097152)
				{
					$(".upld_err").html("<div style='color:red'>Choose File less than 2MB</div>");
					event.preventDefault();
				}
       		
        });
		
		//
    });