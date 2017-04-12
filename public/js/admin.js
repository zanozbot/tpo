$(function() {
    var okolis = $("#okolisi");
    console.log(okolis);
    $('#select').on('change', function() {
    	console.log(okolis);
    	if(this.value == 4) {
    		okolis.slideDown();
    	} else {
    		okolis.slideUp();
    	}
	});
});