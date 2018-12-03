$(document).ready(function(){
   
	$("#btn-checkout").click(function(){
        console.log("clicking");
		var fid = $(this).attr("href");
		
		$(fid).modal({show:true});
    });
   
    function updateReciept(){
	var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    $("#RECIEPT").html( this.responseText);
                   
                }
            }
            xmlhttp.open("GET", "../Controllers/shopping-cart-AJAX-updateReciept.php", true);
            xmlhttp.send();
    }
    $(".amountControl").each(function(){
        var tmp = $(this);
        tmp.find('#qty_input').prop('disabled', true);

        tmp.parent().siblings("#remove-btn").find("#removeButton").click(function(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var productPrice = this.responseText;
                    var totals = $('#TOTALS');	
                    if(productPrice > 0){
                        subtotal = totals.find("#subTotal").html(); 
                        new_subtotal =  parseFloat(totals.find("#subTotal").html()) - parseFloat(this.response).toFixed(2);
                        totals.find("#subTotal").html( parseFloat(new_subtotal).toFixed(2));
                        totals.find("#taxes").html( (new_subtotal*0.0825).toFixed(2));
                        totals.find("#total").html( (new_subtotal*1.0825).toFixed(2));
                    }
                }
            }
            xmlhttp.open("GET", "../Controllers/shopping-cart-AJAX.php?type=2&q=" + tmp.find("#movieID").val(), true);
            xmlhttp.send();
            tmp.parent().parent().remove();
            location.reload(true);
	    updateReciept();
        });

        tmp.find('#plus-btn').click(function(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var productPrice = this.responseText;
                    var totals = $('#TOTALS');	
                    if(productPrice > 0){
                        if (tmp.find('#qty_input').val() < 100) {
                            tmp.find('#qty_input').val(parseInt(tmp.find( '#qty_input').val()) + 1 );

                            tmp.parent().siblings("#totalPrice").find("#priceDisplay").html(productPrice*parseFloat(tmp.find("#qty_input").val()).toFixed(2));
                            subtotal = totals.find("#subTotal").html(); 

                            new_subtotal =  parseFloat(totals.find("#subTotal").html()) + parseFloat(productPrice);
                            totals.find("#subTotal").html( parseFloat(new_subtotal).toFixed(2));
                            totals.find("#taxes").html( (new_subtotal*0.0825).toFixed(2));
                            totals.find("#total").html( (new_subtotal*1.0825).toFixed(2));
                        }
                    }
                }
            };

            xmlhttp.open("GET", "../Controllers/shopping-cart-AJAX.php?type=1&q=" + tmp.find("#movieID").val(), true);
            xmlhttp.send();
	    location.reload(true);
	    updateReciept();
        });

        tmp.find('#minus-btn').click(function(){


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var productPrice = this.responseText;
                    var totals = $('#TOTALS');	
                    if(productPrice > 0){
                        if (tmp.find('#qty_input').val() > 1) {
                            tmp.find('#qty_input').val(parseInt(tmp.find( '#qty_input').val()) - 1 );

                            tmp.parent().siblings("#totalPrice").find("#priceDisplay").html(productPrice*parseFloat(tmp.find("#qty_input").val()).toFixed(2));
                            subtotal = totals.find("#subTotal").html(); 

                            new_subtotal =  parseFloat(totals.find("#subTotal").html()) -  parseFloat(productPrice);
                            totals.find("#subTotal").html( parseFloat(new_subtotal).toFixed(2));
                            totals.find("#taxes").html( (new_subtotal*0.0825).toFixed(2));
                            totals.find("#total").html( (new_subtotal*1.0825).toFixed(2));
                        }
                    }
                }
            };

            xmlhttp.open("GET", "../Controllers/shopping-cart-AJAX.php?type=0&q=" + tmp.find("#movieID").val(), true);
            xmlhttp.send();
	     location.reload(true);
   	    updateReciept();
        });

    });
});
