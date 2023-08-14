/*=========================================================================================
    File Name: app-user-view.js
    Description: User View page
    --------------------------------------------------------------------------------------

==========================================================================================*/
(function () {
  const deleteUser = document.querySelector('.delete-user');

  // Suspend User javascript
  if (deleteUser) {
    deleteUser.onclick = function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "Account will be deleted permanently",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete user!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Suspended!',
            text: 'User has been suspended.',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          document.querySelector('#delete_external').submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Cancelled deleting user :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    };
  }
})();
