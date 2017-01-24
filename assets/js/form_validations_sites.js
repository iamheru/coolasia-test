$(document).ready(function() {	
	
	//Iconic form validation sample	
    

	   $('#form_iconic_validation').validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: false, 
                ignore: "",
                rules: {   
                    //Input PO
                    site_name: {
                        required: true,
                    },
                    site_address: {
                        required: true,
                    },
                    site_lat: {
                        required: true,
                    },
                    site_lng: {
                        required: true,
                    }
                },

                invalidHandler: function (event, validator) {
					//display error alert on form submit    
                },

                errorPlacement: function (label, element) { // render error placement for each input type   
                    //$('<span class="error"></span>').insertAfter(element).append(label)
                },

                highlight: function (element) { // hightlight error inputs
					var parent = $(element).parent();
                    parent.addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
					var parent = $(element).parent();
                    parent.removeClass('error-control');
                    
                },

                success: function (label, element) {
                },

                submitHandler: function (form) {
                
                }
            });
	
});	
	 