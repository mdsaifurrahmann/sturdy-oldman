<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/jquery/jquery.min.js')) }}"></script>
<script src="{{ asset(mix('js/client/client-vendors.js')) }}"></script>
@yield('vendor-script')

<script src={{ asset(mix('js/client/global.js')) }}></script>

@yield('page-script')
<!-- END: Page JS-->
