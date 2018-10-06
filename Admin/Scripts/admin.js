$(document).ready( function() {
	$("#AlertFileType").hide();
	$("#AlertFileName").hide();
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		   var input = $(this).parents('.input-group').find(':text'),
                        log = label ;
			
		    if( input.length ) {
		        input.val(log);
		     } else {
		        if( log ) alert(log);
		     }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		       var fileTypes = ['jpg', 'jpeg', 'png'];

			

			reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);c
		    }
		}
		$("#check_e").val("check_e");


		function checkFileExistance(){
                  url = "./images/" + $("#fileName").val();
                  $("#check_e").val(url);
                   isUrlExists(url, function(status){
                        if(status === 200){
                            //file was found
                            $("#check_e").val("found");
                            $("#AlertFileName").show();
                            document.querySelector("#fileName").setCustomValidity("file name Exists!");
                        }
                         else if(status === 404){
                         // 404 not found
                            $("#check_e").val("not found");
                           // $("#fileName").setCustomValidity("File Name Exists!");
                           document.querySelector("#fileName").setCustomValidity(''); 
                           $("#AlertFileName").hide();
                 	}
		    });
		}
               

	  	$("#fileName").change(function(){
		   checkFileExistance();
		});

		$("#imgInp").change(function(){
			name = this.files[0]["name"];
			extension = name.substr(name.lastIndexOf('.')+1).toLowerCase();
                        //$('#fileType123').val(extension);
                    
                        $allowedExtension = ["jpg", "jpeg", "png"];
			

                        if(!($allowedExtension.indexOf(extension)>-1)){
                                //$('#fileType123').val("invalid");
                	       	
		         $("#imgInp").val('');
			 $("#AlertFileType").show();
                        }
		
			else{
				checkFileExistance();
				$("#AlertFileType").hide();
				$("#AlertFileName").hide();
			}
		    readURL(this);
		}); 	
		function isUrlExists(url, cb){
			jQuery.ajax({
				url:      url,
				dataType: 'text',
				type:     'GET',
				complete:  function(xhr){
		 		if(typeof cb === 'function')
					cb.apply(this, [xhr.status]);
				}
			});
		}
		
				    
});
