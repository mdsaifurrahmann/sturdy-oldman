<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/jquery/jquery.min.js')) }}" async></script>
<script src="{{ asset(mix('js/client/client-vendors.js')) }}" defer></script>
@yield('vendor-script')

<script src={{ asset(mix('js/client/global.js')) }} async></script>

@yield('page-script')
<!-- END: Page JS-->
