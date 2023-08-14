/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------


==========================================================================================*/
$(function () {
  ; ('use strict')

  var dtUserTable = $('.user-list-table'),
    newUserSidebar = $('.new-user-modal'),
    newUserForm = $('.add-new-user'),
    select = $('.select2'),
    dtContact = $('.dt-contact'),
    statusObj = {
      0: { title: 'Inactive', class: 'badge-light-danger' },
      1: { title: 'Active', class: 'badge-light-success' },
      // 2: { title: 'Inactive', class: 'badge-light-secondary' }
    }

  var assetPath = '../../../app-assets/',
    userView = window.location.origin + "authenticated/govern/administration/users/view/profile/";

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path')
    userView = assetPath + 'app/user/view/account'
  }

  select.each(function () {
    var $this = $(this)
    $this.wrap('<div class="position-relative"></div>')
    $this.select2({
      // the following code is used tao disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    })
  })

  // Users List datatable
  if (dtUserTable.length) {
    dtUserTable.DataTable({
      ajax: window.location.origin + "/authenticated/govern/administration/users/response", // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'name' },
        {
          data: 'roles',
          render: function (roles) {
            var roleBadgeObj = {
              user: '<span class="font-medium-3 text-warning me-50">' + feather.icons['meh'].toSvg() + '</span>',
              moderator: '<span class="font-medium-3 text-success me-50">' + feather.icons['edit-2'].toSvg() + '</span>',
              admin: '<span class="font-medium-3 text-info me-50">' + feather.icons['database'].toSvg() + '</span>',
              nuke: '<span class="font-medium-3 text-danger me-50">' + feather.icons['slack'].toSvg() + '</span>'
            };

            return roles.map(function (role) {
              return roleBadgeObj[role.name] + '<span class="text-capitalize">' + role.name + '</span>';
            }).join(', ');
          }
        },
        { data: 'mobile' },
        {
          data: 'profile.status',
          render: function (data, type, full, meta) {
            if (data === "0") {
              return (
                '<span class="badge rounded-pill badge-light-danger">' +
                'Inactive' +
                '</span>'
              );
            }

            if (data === "1") {
              return (
                '<span class="badge rounded-pill badge-light-success">' +
                'Active' +
                '</span>'
              );
            }
          }
        },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return ''
          }
        },
        {
          // User full name and username
          targets: 1,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $name = full['name'],
              $email = full['email'],
              $image = full.profile.profile_image;
            if ($image) {
              // For Avatar image
              var $output =
                '<img src="' + window.location.origin + '/images/profile/' + $image + '" alt="Avatar" height="32" width="32">'
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6) + 1
              var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary']
              var $state = states[stateNum],
                $name = full['name'],
                $initials = $name.match(/\b\w/g) || []
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase()
              $output = '<span class="avatar-content">' + $initials + '</span>'
            }
            var colorClass = $image === '' ? ' bg-light-' + $state + ' ' : ''
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar ' +
              colorClass +
              ' me-1">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<a href="' + window.location.origin + "/authenticated/govern/administration/users/view/profile/" + full['username'] +
              '" class="user_name text-truncate text-body text-capitalize"><span class="fw-bolder">' +
              $name +
              '</span></a>' +
              '<small class="emp_post text-muted">' +
              $email +
              '</small>' +
              '</div>' +
              '</div>'
            return $row_output
          }
        },
        {
          targets: 3,
          render: function (data, type, full, meta) {
            var $mobile = full['mobile']

            return '<span class="text-nowrap">' + $mobile + '</span>'
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="btn-group">' +
              '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="' + window.location.origin + "/authenticated/govern/administration/users/view/profile/" + full['username'] + '" class="dropdown-item">' +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
              'Details</a>' +
              '</div>' +
              '</div>' +
              '</div>'
            )
          }
        }
      ],
      order: [[1, 'desc']],
      dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [

      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data()
              return 'Details of ' + data['name']
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.columnIndex !== 6 // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                col.rowIdx +
                '" data-dt-column="' +
                col.columnIndex +
                '">' +
                '<td>' +
                col.title +
                ':' +
                '</td> ' +
                '<td>' +
                col.data +
                '</td>' +
                '</tr>'
                : ''
            }).join('')
            return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false
          }
        }
      },
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api().columns(2).every(function () {
          var column = this
          var label = $('<label class="form-label" for="UserRole">Role</label>').appendTo('.user_role')
          var select = $(
            '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Role </option></select>'
          )
            .appendTo('.user_role')
            .on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val())
              column.search(val ? '^' + val + '$' : '', true, false).draw()
            })

          var rolesArray = column.data().toArray();

          rolesArray.forEach(function (roleArray) {
            if (Array.isArray(roleArray) && roleArray.length > 0) {
              var roleNames = roleArray.map(function (role) {
                return '<span class="text-capitalize">' + role.name + '</span>';
              }).join(', ');

              select.append('<option value="' + roleArray[0].name + '" class="text-capitalize">' + roleArray[0].name + '</option>');
            }
          });
        })

        // Status Filter
        this.api()
          .columns(4)
          .every(function () {
            var column = this
            var label = $('<label class="form-label" for="FilterTransaction">Status</label>').appendTo('.user_status')
            var select = $(
              '<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx"><option value=""> Select Status </option></select>'
            )
              .appendTo('.user_status')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val())
                column.search(val ? '^' + val + '$' : '', true, false).draw()
              })

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append(
                  '<option value="' +
                  statusObj[d].title +
                  '" class="text-capitalize">' +
                  statusObj[d].title +
                  '</option>'
                )
              })
          })
      }
    })
  }

  // Form Validation
  if (newUserForm.length) {
    newUserForm.validate({
      errorClass: 'error',
      rules: {
        'user-fullname': {
          required: true
        },
        'user-name': {
          required: true
        },
        'user-email': {
          required: true
        }
      }
    })

    newUserForm.on('submit', function (e) {
      var isValid = newUserForm.valid()
      e.preventDefault()
      if (isValid) {
        newUserSidebar.modal('hide')
      }
    })
  }

  // Phone Number
  if (dtContact.length) {
    dtContact.each(function () {
      new Cleave($(this), {
        phone: true,
        phoneRegionCode: 'US'
      })
    })
  }
})
