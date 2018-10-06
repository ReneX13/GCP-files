
$('.btnOpen').each(function(){
	$(this).click(function(){
		var fid = $(this).attr("href");
		//var itemId = fid.substring(1, fid.length);
		$(fid).modal({show:true});

		var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                               	if (this.readyState == 4 && this.status == 200) {
                                       document.getElementById("test").innerHTML = this.responseText;
                         	}
                };
              	xmlhttp.open("GET", "updateAmount.php?type=3&q=" + tmp.find("#movieID").val(), true);
               	xmlhttp.send();
	});
});

