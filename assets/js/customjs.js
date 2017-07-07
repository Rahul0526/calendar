$(document).ready(function() {
	$('.numbers-only').on('keypress', function(key) {
		if(!(key.charCode >= 48 && key.charCode <= 57 || key.charCode == 0)) { 
			key.preventDefault();
			flashElem($(this));
		}
	});
	
	function flashElem(elem) {
			elem.addClass('errorFlash');
			setTimeout(function () { elem.removeClass('errorFlash') }, 300)
	}
});