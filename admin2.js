$(document).ready( function() {
	$('#fileType123').val("TEST3");
    	$(document).on('change', '.btn-file :file', function() {
		//var input = $(this),
			//label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		//input.trigger('fileselect', [label]);
		 $('#fileType123').val("TEST3");
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		   // var input = $(this).parents('.input-group').find(':text'),
                      //  log = label ;

		    
		    //if( input.length ) {
		        //input.val(log);
		   // } else {
		        //if( log ) alert(log);
		   // }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        //var reader = new FileReader();
		        
		       //var fileTypes = ['jpg', 'jpeg', 'png'];
			 reader.onload = function (e) {
		        //    $('#img-upload').attr('src', e.target.result);
		        }
		        
		      //  reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		
		    //readURL(this);
		}); 	
});
