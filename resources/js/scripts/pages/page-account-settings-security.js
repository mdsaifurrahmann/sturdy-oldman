$(function () {
  ('use strict');

  // variables
  var form = $('.validate-form'),
    select2 = $('.select2'),
    accountNumberMask = $('.account-number-mask');

  // jQuery Validation for all forms
  // --------------------------------------------------------------------
  if (form.length) {
    form.each(function () {
      var $this = $(this);

      $this.validate({
        rules: {
          current_password: {
            required: true
          },
          password: {
            required: true,
            minlength: 8,
            password_strength: true
          },
          password_confirmation: {
            required: true,
            minlength: 8,
            equalTo: '#account-new-password'
          },
          // apiKeyName: {
          //   required: true
          // }
        },
        messages: {
          password: {
            required: 'Enter new password',
            minlength: 'Password must be at least 8 characters long'
          },
          password_confirmation: {
            required: 'Please confirm new password',
            minlength: 'Enter at least 8 characters',
            equalTo: 'The password and its confirm are not the same'
          }
        }
      });

      $.validator.addMethod('password_strength', function (value) {
        // Use regular expressions to check password strength
        var hasUppercase = /[A-Z]/.test(value);
        var hasLowercase = /[a-z]/.test(value);
        var hasNumber = /\d/.test(value);
        var hasSpecialChar = /[^A-Za-z0-9]/.test(value);

        return hasUppercase && hasLowercase && hasNumber && hasSpecialChar;
      }, 'Password must contain capital letters, small letters, special characters, and numbers.');
      // $this.on('submit', function (e) {
      //   e.preventDefault();
      // });
    });
  }

  //phone
  // if (accountNumberMask.length) {
  //   accountNumberMask.each(function () {
  //     new Cleave($(this), {
  //       phone: true,
  //       phoneRegionCode: 'US'
  //     });
  //   });
  // }

  // For all Select2
  // if (select2.length) {
  //   select2.each(function () {
  //     var $this = $(this);
  //     $this.wrap('<div class="position-relative"></div>');
  //     $this.select2({
  //       dropdownParent: $this.parent()
  //     });
  //   });
  // }
});
