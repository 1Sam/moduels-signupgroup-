jQuery(document).ready(function(){
//alert(jQuery('input[type="radio"][value="정회원"]').val());
	if(jQuery('input[type="radio"][value="정회원"]').val())
	{
		jQuery(".krZip").closest(".control-group").hide();
		jQuery(".inputDate").closest(".control-group").hide();

	    jQuery('input[type="radio"]').filter(function(){
	                       return this.value === '정회원';
	                      }).click(function(){
	        jQuery(".krZip").closest(".control-group").show();
	        jQuery(".inputDate").closest(".control-group").show();
	    });

	    jQuery('input[type="radio"]').filter(function(){
	                       return this.value === '일반회원';
	                      }).click(function(){
	        jQuery(".krZip").closest(".control-group").hide();
	        jQuery(".inputDate").closest(".control-group").hide();
	    });		
    };

});