$(document).ready(function(){
	
$(".amountControl").each(function(){
	var tmp = $(this);
	tmp.find('#qty_input').prop('disabled', true);
	
	tmp.parent().siblings("#remove-btn").find("#removeButton").click(function(){
				tmp2 = tmp.parent().siblings("#totalPrice");
                                tmp2.find("#priceDisplay").html((tmp2.find("#price").val()*tmp.find("#qty_input").val()).toFixed(2));
                                //tmp.siblings("#totalPrice").html(tmp.siblings("#price")*tmp.find("#qty_input").val());
                                tmp3 = /*tmp2.parent().siblings*/$('#TOTALS');
                                //console.log(tmp3.find("#subTotal").html());
                                subtotal = tmp3.find("#subTotal").html(); 
                                console.log(parseFloat( (subtotal) ));
                                console.log(parseFloat(tmp2.find("#price").val() ));
                                
				new_subtotal =  parseFloat(subtotal) - ( parseFloat(tmp2.find("#price").val())*parseFloat(tmp.find("#qty_input").val()) );
                                console.log(new_subtotal);
                                tmp3.find("#subTotal").html( parseFloat(new_subtotal).toFixed(2));
                                tmp3.find("#taxes").html( (new_subtotal*0.0825).toFixed(2));
                                tmp3.find("#total").html( (new_subtotal*1.0825).toFixed(2));
                                //tmp2.find("#priceDisplay").html(tmp2.find("#price").val()*tmp.find("#qty_input").val());
				
				tmp.parent().parent().remove();
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("test").innerHTML = this.responseText;
                                        }
                                };
                                xmlhttp.open("GET", "updateAmount.php?type=3&q=" + tmp.find("#movieID").val(), true);
                                xmlhttp.send();
	});

	tmp.find('#plus-btn').click(function(){
			//$('body').css("background-color", "red");
			tmp.find('#qty_input').val(parseInt(tmp.find('#qty_input').val()) + 1 );
			if(tmp.find('#qty_input').val() >= 100){
				tmp.find('#qty_input').val(99);
			}
			else{
				tmp2 = tmp.parent().siblings("#totalPrice");
				tmp2.find("#priceDisplay").html((tmp2.find("#price").val()*tmp.find("#qty_input").val()).toFixed(2));
				//tmp.siblings("#totalPrice").html(tmp.siblings("#price")*tmp.find("#qty_input").val());
				tmp3 = /*tmp2.parent().siblings*/$('#TOTALS');
                                //console.log(tmp3.find("#subTotal").html());
                                subtotal = tmp3.find("#subTotal").html(); 
                                console.log(parseFloat( (subtotal) ));
				console.log(parseFloat(tmp2.find("#price").val() ));
				new_subtotal =  parseFloat(subtotal) + parseFloat(tmp2.find("#price").val());
				console.log(new_subtotal);
				tmp3.find("#subTotal").html( parseFloat(new_subtotal).toFixed(2));
                                tmp3.find("#taxes").html( (new_subtotal*0.0825).toFixed(2));
                                tmp3.find("#total").html( (new_subtotal*1.0825).toFixed(2));
                                //tmp2.find("#priceDisplay").html(tmp2.find("#price").val()*tmp.find("#qty_input").val());

				var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("test").innerHTML = this.responseText;
                                        }
                                };
                                xmlhttp.open("GET", "updateAmount.php?type=1&q=" + tmp.find("#movieID").val(), true);
                                xmlhttp.send();
			}
	});
	tmp.find('#minus-btn').click(function(){
			//$('body').css("background-color", "red ");
			tmp.find('#qty_input').val(parseInt(tmp.find('#qty_input').val()) - 1 );
			if (tmp.find('#qty_input').val() <= 0) {
				tmp.find('#qty_input').val(1);
			}
			else{
				console.log("here !!!!!");
				tmp2 = tmp.parent().siblings("#totalPrice");
				tmp3 = $('#TOTALS')
				//console.log(tmp3.find("#subTotal").html());
				
				subtotal = tmp3.find("#subTotal").html(); 
                                console.log(parseFloat( (subtotal) ));
                                console.log(parseFloat(tmp2.find("#price").val() ));
                                new_subtotal =  parseFloat(subtotal) -  parseFloat(tmp2.find("#price").val());
                                console.log(new_subtotal);
                                tmp3.find("#subTotal").html( parseFloat(new_subtotal).toFixed(2));
                                tmp3.find("#taxes").html( (new_subtotal*0.0825).toFixed(2));
                                tmp3.find("#total").html( (new_subtotal*1.0825).toFixed(2));
				tmp2.find("#priceDisplay").html((tmp2.find("#price").val()*tmp.find("#qty_input").val()).toFixed(2));
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("test").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "updateAmount.php?type=0&q=" + tmp.find("#movieID").val(), true);
				xmlhttp.send();
			}
	});

});
});
