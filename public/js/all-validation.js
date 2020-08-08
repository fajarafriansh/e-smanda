new window.JustValidate('#email_edit', {
	rules: {
		email: {
			required: true,
			email: true,
		},
		password: {
			required: true,
		}
	},
	messages: {
		email: {
			required: "Masukkan email baru anda",
			email: "Format email tidak sesuai"
		},
		password: {
			required: "Masukkan password anda",
		}
	},

	focusWrongField: true,

	// submitHandler: function (form, values, ajax) {
	// 	ajax({
	// 		url: 'https://just-validate-api.herokuapp.com/submit',
	// 		method: 'POST',
	// 		data: values,
	// 		async: true,
	// 		callback: function (response) {
	// 			alert('AJAX submit successful! \nResponse from server:' + response)
	// 		},
	// 		error: function (response) {
	// 			alert('AJAX submit error! \nResponse from server:' + response)
	// 		}
	// 	});
	// },

	invalidFormCallback: function (errors) {
		console.log(errors);
	},
});

new window.JustValidate('#password_edit', {
	rules: {
		current_password: {
			required: true,
			// remote: {
			// 	url: '/admin/profile/check-password',
			// 	sendParam: 'current_password',
			// 	successAnswer: 'OK',
			// 	method: 'GET',
			// }
		},
		new_password: {
			required: true,
			minLength: 8,
			strength: {
				default: true,
			}
		},
		confirm_password: {
			required: true,
			function: (name, value) => {
				if (name === 'hi') {
					return true;
				}
			}
		}
	},
	messages: {
		current_password: {
			required: "Masukkan pasword anda yang sekarang",
			// remote: "test",
		},
		new_password: {
			required: "Masukkan password baru anda",
			minLength: "Password harus memiliki minimum 8 karakter",
			strength: "Password harus memiliki huruf besar, huruf kecil dan angka"
		},
		confirm_password: {
			required: "Masukkan password baru sekali lagi",
			function: "why",
		}
	},

	focusWrongField: true,

	// submitHandler: function (form, values, ajax) {
	// 	ajax({
	// 		url: 'https://just-validate-api.herokuapp.com/submit',
	// 		method: 'POST',
	// 		data: values,
	// 		async: true,
	// 		callback: function (response) {
	// 			alert('AJAX submit successful! \nResponse from server:' + response)
	// 		},
	// 		error: function (response) {
	// 			alert('AJAX submit error! \nResponse from server:' + response)
	// 		}
	// 	});
	// },

	invalidFormCallback: function (errors) {
		console.log(errors);
	},
});

// new window.JustValidate('#profile_edit', {
// 	rules: {
// 		name: {
// 			required: true,
// 		},
// 		role: {
// 			required: true,
// 		}
// 	},
// 	messages: {
// 		name: {
// 			required: "Nama tidak boleh kosong",
// 		},
// 		role: {
// 			required: "Jabatan tidak boleh kosong",
// 		}
// 	},

// 	focusWrongField: true,

// 	// submitHandler: function (form, values, ajax) {
// 	// 	ajax({
// 	// 		url: 'https://just-validate-api.herokuapp.com/submit',
// 	// 		method: 'POST',
// 	// 		data: values,
// 	// 		async: true,
// 	// 		callback: function (response) {
// 	// 			alert('AJAX submit successful! \nResponse from server:' + response)
// 	// 		},
// 	// 		error: function (response) {
// 	// 			alert('AJAX submit error! \nResponse from server:' + response)
// 	// 		}
// 	// 	});
// 	// },

// 	invalidFormCallback: function (errors) {
// 		console.log(errors);
// 	},
// });

window.onload = function () {

   var profileEditForm = document.getElementById("student_edit");

   var pristine = new Pristine(profileEditForm);

   profileEditForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var valid = pristine.validate();
      //alert('Form is valid: ' + valid);

   });


};

(function($) {
	"use strict";

	$("#student_edit").submit(function(e) {
		e.preventDefault();

		$("#name")
	});

})(jQuery);
