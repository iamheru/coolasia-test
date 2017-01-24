$(document).ready(function() {	
	
	//Iconic form validation sample	
    

	   $('#form_iconic_validation').validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: false, 
                ignore: "",
                rules: {   
                    //Input PO
                    worker_ic_no: {
                        required: true,
                    },
                    worker_name: {
                        required: true,
                    },
                    worker_dob: {
                        required: true,
                    },
                    worker_email: {
                        required: true,
                    },
                    worker_phone: {
                        required: true,
                    },
                    worker_address: {
                        required: true,
                    },
                    worker_salary: {
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
	 