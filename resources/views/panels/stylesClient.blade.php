<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" async />

@yield('vendor-style')
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->

<link rel="stylesheet" href="{{ asset(mix('fonts/font-awesome/css/all.min.css')) }}" async>
<link rel="stylesheet" href="{{ asset(mix('css/core-client.css')) }}" async />
<link rel="stylesheet" href="{{ asset(mix('css/tailwind.css')) }}" async />


@php $configData = Helper::applClasses(); @endphp

<!-- BEGIN: Page CSS-->
{{-- Page Styles --}}
@yield('page-style')
