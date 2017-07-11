$(document).ready(function() {
	/*
	*
	* REALTIME VALIDATION START
	*
	*/
	$('.numbers-only').on('keypress', function(key) {
		var str = $.trim($(this).val());
		if(key.charCode == 48) {
			if(!$(this).is('.allow-zero-initial') && str == "") {
				flashElem(key, $(this));
			}
		} else {
			if(str == "0") {
				if(!(key.charCode >= 49 && key.charCode <= 57 || key.charCode == 0)) {
					if($(this).is('.allow-decimal') && key.charCode == 46) {
						if(~str.indexOf('.')) {
							flashElem(key, $(this));
						}
					} else {
						flashElem(key, $(this));
					}
				} else {
					$(this).val('')
				}
			} else {
				if(!(key.charCode >= 48 && key.charCode <= 57 || key.charCode == 0)) {
					if($(this).is('.allow-decimal') && key.charCode == 46) {
						if(~str.indexOf('.')) {
							flashElem(key, $(this));
						} else {
							if(str == "") {
								$(this).val("0.");
								key.preventDefault();
							}
						}
					} else {
						flashElem(key, $(this));
					}
				}
			}
		}
	}).on('keyup', function(key) {
		var str = $.trim($(this).val());
		if(key.which == 8 || key.which == 46) {
			if(str == "0" && !$(this).is('.allow-zero-initial')) {
				$(this).val('')
			}
		} else {
			if(str[0] == '.') {
				$(this).val(parseFloat(str))
			} else {
				if(key.which >= 96 && key.which <= 105)
					$(this).val(parseFloat(str))
			}
			// console.log(key.which)
		}
	})
	
	function flashElem(key,elem) {
		key.preventDefault();
		elem.addClass('errorFlash');
		setTimeout(function () { elem.removeClass('errorFlash') }, 300)
	}
	/* 	* REALTIME VALIDATION END *	 */
});