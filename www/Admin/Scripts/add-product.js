$(document).ready( function() {
	$("#AlertFileType").hide();
	$("#AlertFileName").hide();

	originalFileName = $.trim($("#fileName").val());
 	originalFileURL = $("#img-upload").attr("src");


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
			checkFileExistance($("#fileName").val());
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
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		function checkFileExistance(str){
                  url = "./images/" + $("#fileName").val();
                 
                   isUrlExists(url, function(status){
			$("#check_e").val(originalFileName+"   "+str);
                        if(str == originalFileName){
				   $("#check_e").val("good");
			}
			else{
				   $("#check_e").val("bad");
			}
			if(status === 200 && (str != originalFileName)){
                            //file was found
                            //$("#check_e").val(originalFileName+"   "+str);
				//$("#check_e").val("yes its inside");
                            $("#AlertFileName").show();
                            document.querySelector("#fileName").setCustomValidity("file name Exists!");
                        }
                         else if(status === 404){
                         // 404 not found
                            
		           //$("#check_e").val("not found");
                           // $("#fileName").setCustomValidity("File Name Exists!");
                           document.querySelector("#fileName").setCustomValidity(''); 
                           $("#AlertFileName").hide();
			   $("#check_e").val("in   here");
			   checkFileExt(str);
                 	}
		    });
		}
		function checkFileExt(str){
			//name = $("#imgInp").files[0]["name"];
			//$("#check_e").val("in   "+ext);
                        ext = str.substr(str.lastIndexOf('.')+1).toLowerCase(); 
			//$("#check_e").val("in   "+ $("#imgInp").files[0]["name"]);
			input = document.getElementById('imgInp');
			if((input.files[0])){
				name = input.files[0]["name"];
                        	extension = name.substr(name.lastIndexOf('.')+1).toLowerCase();	
				$("#check_e").val(ext + extension);
				if(ext != extension){
				       document.querySelector("#fileName").setCustomValidity('File extension not correct! Correct type:' +extension); 
				}else{
				     document.querySelector("#fileName").setCustomValidity(''); 
				}
			}				
		}
               

	  	$("#fileName").change(function(){
		   //$("#fileName").val($.trim($("#fileName").val()));
		   //$("#check_e").val($("#fileName").val());
		   checkFileExistance($("#fileName").val());
		});

		$("#imgInp").change(function(){
			//$("#check_e").val("in");
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
				readURL(this);
				//checkFileExistance($("#fileName").val());
				$("#AlertFileType").hide();
				$("#AlertFileName").hide();
			}
		   
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
