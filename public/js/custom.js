(function($) {
	"use strict";

	$("#student-register").validate( {
		rules: {
			name: {
				required: true,
				minlength: 2,
				accept: "[a-zA-Z]+"
			},
			password: {
				required: true,
				minlength: 8
			},
			email: {
				required: true,
				email: true,
				remote: "/student/check-email"
			}
		},
		messages: {
			name: {
				required: "Please enter your name!",
				minlength: "Your name must be atleast 2 characters.",
				accept: "Your name must contain only letters."
			},
			password: {
				required: "Please provide your password!",
				minlength: "Your password must be atleast 8 characters."
			},
			email: {
				required: "Please enter your email address!",
				email: "Please enter valid email!",
				remote: "Email already exists."
			}
		}
	});

	$(".pwstrength").passtrength( {
		minChars: 8,
		passwordToggle: true,
		tooltip: false,
		eyeImg: "../img/eye.svg"
	});

	$("#student-login").validate( {
		rules: {
			password: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			password: {
				required: "Masukkan password anda!"
			},
			email: {
				required: "Masukkan alamat email!",
				email: "Email tidak valid."
			}
		}
	});


})(jQuery);
