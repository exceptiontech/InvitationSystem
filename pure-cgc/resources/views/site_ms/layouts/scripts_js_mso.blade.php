<script type="text/javascript">
$(document).ready(function()
{
	// to delete wishlist items .... 
	$('.delet').on('click', function () {
		var name    = $(this).attr('name')
		var user_id = $(this).attr('user_id')
		var del_id = $(this).attr('del_id')


		if(confirm("Do you want to delete "+name+"?")) {
		var data = {"name":name,"user_id":user_id,"del_id":del_id};
		$.ajax({
				type:'GET',
				data: data,
				url:'{{-- route("members.delete_blog","delete") --}}',
				success: function (msg) {
				$("#delete_msg").fadeOut();
				$("#delete_msg").html(msg).fadeIn("slow");
				$("#delete_msg").fadeOut();
				$(".dis_ms_"+del_id).fadeOut();
				}
			}); // end ajax call
		}
	});

	// to add swapp request wishlist items .... 
	$('.swap_request_mso').on('click', function () {
		var name    = $(this).attr('name')
		var ajax_id = $(this).attr('ajax_id')


		if(confirm("Do you want to swap with: "+name+"?")) {
		var data = {"name":name,"ajax_id":ajax_id};
		$.ajax({
				type:'POST',
				data: data,
				url:'{{-- route("swapping_requests.store") --}}',
				success: function (msg) {
				$("#delete_msg").fadeOut();
				$("#delete_msg").html(msg).fadeIn("slow");
				$("#delete_msg").fadeOut();
				$(".dis_ms_"+del_id).fadeOut();
				}
			}); // end ajax call
		}
	});

	// to accept swapp request 
	$('.action_swapp').on('click', function () {
		var swapp_id    = $(this).attr('swapp')
		var type = $(this).attr('type')
		var method ="PUT";
		var data = {"swapp_id":swapp_id,"type_action":type,'_method':method};
		$.ajax({
				type:'POST',
				data: data,
				headers: {
					'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content'),
				},
				url:'{{-- route("swapping_requests.update",0) --}}',
				success: function (msg) {
				$(".message_ajax").html(msg).fadeIn("slow");
				$(".message_ajax").delay(5000).fadeOut();
				$(".dis_ms_"+swapp_id).fadeOut();
				}
			}); // end ajax call
	});

	
});
</script>

<script>
    jQuery(document).ready(function($) {
    /* Move Form Fields Label When User Types */
        // for input and textarea fields
        $("input, textarea").keyup(function(){
            if ($(this).val() != '') {
                $(this).addClass('notEmpty');
            } else {
                $(this).removeClass('notEmpty');
            }
        });
    
    
        /* Contact Form */
        $("#contactFormMs").validator().on("submit", function(event) {
            if (event.isDefaultPrevented()) {
                // handle the invalid form...
                cformError();
                csubmitMSG(false, "Please fill all fields!");
            } else {
                // everything looks good!
                event.preventDefault();
                csubmitForm();
            }
        });
    
        function csubmitForm() {
            // initiate variables with form content
            var name = $("#cname").val();
            var email = $("#cemail").val();
            var cat_id = $("#ccat_id").val();
            var company = $("#ccompany").val();
            var message = $("#cmessage").val();
            var subject = $("#csubject").val();
            $.ajax({
                type: "POST",
                url: "{{ route('contact-us.store') }}",
                data: "_token={{ csrf_token() }}&"+"name=" + name + "&cat_id=" + cat_id + "&email=" + email + "&message=" + message + "&subject=" + subject+ "&company=" + company, 
                success: function(text) {
                    if (text == "success") {
                        cformSuccess();
                    } else {
                        cformError();
                        csubmitMSG(false, text);
                    }
                }
            });
        }
    
        function cformSuccess() {
            $("#contactForm")[0].reset();
            csubmitMSG(true, "Message Submitted!");
            $("input").removeClass('notEmpty'); // resets the field label after submission
            $("textarea").removeClass('notEmpty'); // resets the field label after submission
        }
    
        function cformError() {
            $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                $(this).removeClass();
            });
        }
    
        function csubmitMSG(valid, msg) {
            if (valid) {
                var msgClasses = "h3 text-center tada animated";
            } else {
                var msgClasses = "h3 text-center";
            }
            $("#cmsgSubmit").removeClass().addClass(msgClasses).text(msg);
        }
    });
    </script>