/*=========================================================================================
  File Name: app.js
  Description: Template related app JS.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
window.colors = {
  solid: {
    primary: '#7367F0',
    secondary: '#82868b',
    success: '#28C76F',
    info: '#00cfe8',
    warning: '#FF9F43',
    danger: '#EA5455',
    dark: '#4b4b4b',
    black: '#000',
    white: '#fff',
    body: '#f8f8f8'
  },
  light: {
    primary: '#7367F01a',
    secondary: '#82868b1a',
    success: '#28C76F1a',
    info: '#00cfe81a',
    warning: '#FF9F431a',
    danger: '#EA54551a',
    dark: '#4b4b4b1a'
  }
}
  ; (function (window, document, $) {
    'use strict'
    var $html = $('html')
    var $body = $('body')
    var $textcolor = '#4e5154'
    var assetPath = '../../../app-assets/'

    if ($('body').attr('data-framework') === 'laravel') {
      assetPath = $('body').attr('data-asset-path')
    }

    // to remove sm control classes from datatables


    $(window).on('load', function () {






      setTimeout(function () {
        $html.removeClass('loading').addClass('loaded')
      }, 1200)





      //  Notifications & messages scrollable
      $('.scrollable-container').each(function () {
        var scrollable_container = new PerfectScrollbar($(this)[0], {
          wheelPropagation: false
        })
      })

      // Reload Card


      // Add disabled class to input group when input is disabled
      $('input:disabled, textarea:disabled').closest('.input-group').addClass('disabled')




      // Waves Effect
      Waves.init()
      Waves.attach(
        ".btn:not([class*='btn-relief-']):not([class*='btn-gradient-']):not([class*='btn-outline-']):not([class*='btn-flat-'])",
        ['waves-float', 'waves-light']
      )
      Waves.attach("[class*='btn-outline-']")
      Waves.attach("[class*='btn-flat-']")

      $('.form-password-toggle .input-group-text').on('click', function (e) {
        e.preventDefault()
        var $this = $(this),
          inputGroupText = $this.closest('.form-password-toggle'),
          formPasswordToggleIcon = $this,
          formPasswordToggleInput = inputGroupText.find('input')

        if (formPasswordToggleInput.attr('type') === 'text') {
          formPasswordToggleInput.attr('type', 'password')
          if (feather) {
            formPasswordToggleIcon.find('svg').replaceWith(feather.icons['eye'].toSvg({ class: 'font-small-4' }))
          }
        } else if (formPasswordToggleInput.attr('type') === 'password') {
          formPasswordToggleInput.attr('type', 'text')
          if (feather) {
            formPasswordToggleIcon.find('svg').replaceWith(feather.icons['eye-off'].toSvg({ class: 'font-small-4' }))
          }
        }
      })

      // on window scroll button show/hide
      $(window).on('scroll', function () {
        if ($(this).scrollTop() > 400) {
          $('.scroll-top').fadeIn()
        } else {
          $('.scroll-top').fadeOut()
        }
      })

      // Click event to scroll to top
      $('.scroll-top').on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 75)
      })


    });

    // To use feather svg icons with different sizes
    function featherSVG(iconSize) {
      // Feather Icons
      if (iconSize == undefined) {
        iconSize = '14'
      }
      return feather.replace({ width: iconSize, height: iconSize })
    }

    // jQuery Validation Global Defaults
    if (typeof jQuery.validator === 'function') {
      jQuery.validator.setDefaults({
        errorElement: 'span',
        errorPlacement: function (error, element) {
          if (
            element.parent().hasClass('input-group') ||
            element.hasClass('select2') ||
            element.attr('type') === 'checkbox'
          ) {
            error.insertAfter(element.parent())
          } else if (element.hasClass('form-check-input')) {
            error.insertAfter(element.parent().siblings(':last'))
          } else {
            error.insertAfter(element)
          }

          if (element.parent().hasClass('input-group')) {
            element.parent().addClass('is-invalid')
          }
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('error')
          if ($(element).parent().hasClass('input-group')) {
            $(element).parent().addClass('is-invalid')
          }
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('error')
          if ($(element).parent().hasClass('input-group')) {
            $(element).parent().removeClass('is-invalid')
          }
        }
      })
    }
  })(window, document, jQuery)
