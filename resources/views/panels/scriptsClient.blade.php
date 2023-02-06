<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/jquery/jquery.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pace/pace.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/waves/waves.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/feather-icons/feather-icons.min.js')) }}"></script>

<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset(mix('vendors/js/ui/jquery.sticky.js')) }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->

{{-- Global Script --}}
<script src={{ asset(mix('js/client/global__jq.js')) }}></script>
<script src={{ asset(mix('js/client/global__core.js'))}}></script>

{{-- <script src="{{ asset(mix('js/core/app-menu.js')) }}"></script> --}}
<script src="{{ asset(mix('js/core/app-client.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
