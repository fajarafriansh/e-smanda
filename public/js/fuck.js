(function($) {
	"use strict";

	// $(function() {
	// 	alert("FUCK!");
	// });

	var stopAutohide;

	function showPopup() {
		$('#error_popup').show();
		if ($('#error_popup').length > 0) {
			// $(document.body).addClass('error_popup');
			$('html body').css('overflow', 'hidden');
			// setTimeout(hidePopup,5000);
		}
	}
	showPopup();

	function hidePopup() {
		$('#error_popup').hide();
		$('html body').css('overflow', 'auto');
	}
	// hidePopup();
	setTimeout(showPopup,2000);

	$('#popup_close').click(function() {
		hidePopup();
		// celarTimeout(stopAutohide);
	})
})(jQuery);
