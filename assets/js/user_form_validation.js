// JavaScript Document
// Wait for the DOM to be ready
$(function() {
  $("form").validate({
    // Specify validation rules
	debug:true,
    rules: {
      first_name: {
	  required: true,
      minlength: 2,
      maxlength: 60
	  },
      last_name: {
	  required: true,
      minlength: 2,
      maxlength: 60
	  },		  
      email: {
      required: true,
	  email: true
      },
      dob: {
      required: true,
      minlength: 10,
	  maxlength: 10	  
      }
    },
    messages: {
      firstname: {
		required: "Please enter your first name",
		minlength: "First name should be at least 2 chars long",
		maxlength: "First name should be no more than 60 chars long"
		},
      lastname: {
		required: "Please enter your last name",
		minlength: "Last name be at least 2 chars long",
		maxlength: "Last name should be no more than 60 chars long"
		},
      dob: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: {
		required: "Please enter your email",
		email: "E-mails does not have the proper format"
		},
      dob: {
		required: "Please enter your date of birth",
		minlength: "DOB should be 10 chars long",
		maxlength: "DOB should be 10 chars long"
		},		
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});