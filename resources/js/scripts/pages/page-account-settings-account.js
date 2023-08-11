$(function () {
  ('use strict');

  // variables
  var form = $('.validate-form'),
    accountUploadImg = $('#account-upload-img'),
    accountUploadBtn = $('#account-upload'),
    accountUserImage = $('.uploadedAvatar'),
    accountResetBtn = $('#account-reset'),

    deactivateAcc = document.querySelector('#formAccountDeactivation'),
    deactivateButton = deactivateAcc.querySelector('.deactivate-account');

  // Update user photo on click of button

  if (accountUserImage) {
    var resetImage = accountUserImage.attr('src');
    accountUploadBtn.on('change', function (e) {
      var reader = new FileReader(),
        files = e.target.files;
      reader.onload = function () {
        if (accountUploadImg) {
          accountUploadImg.attr('src', reader.result);
        }
      };
      reader.readAsDataURL(files[0]);
    });

    accountResetBtn.on('click', function () {
      accountUserImage.attr('src', resetImage);
    });
  }

  // disabled submit button on checkbox unselect
  if (deactivateAcc) {
    $(document).on('click', '#accountActivation', function () {
      if (accountActivation.checked == true) {
        deactivateButton.removeAttribute('disabled');
      } else {
        deactivateButton.setAttribute('disabled', 'disabled');
      }
    });
  }

  // Deactivate account alert
  const accountActivation = document.querySelector('#accountActivation');

  // Alert With Functional Confirm Button
  if (deactivateButton) {
    deactivateButton.onclick = function () {
      if (accountActivation.checked == true) {
        Swal.fire({
          text: 'Are you sure you would like to DELETE your account?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-2'
          },
          buttonsStyling: false
        }).then(function (result) {
          if (result.value) {
            Swal.fire({
              icon: 'success',
              title: 'Deleted!',
              text: 'Your ACCCOUNT is deleted! Redirecting...',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            })

            deactivateAcc.submit();
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Cancelled',
              text: 'Deletion is Cancelled!!',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          }
        });
      }
    };
  }
});
