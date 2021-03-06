<?php
    $swalFormDeleteTitle = __('Are you sure?');
    $swalFormDeleteText = __('You will not be able to reverse this action!');
    $swalFormDeleteConfirmButtonText = __('Yes, delete it!');
    $swalFormDeleteCancelButtonText = __('No, cancel!');
   
    $swalFormSuspendTitle = __('Are you sure?');
    $swalFormSuspendText = __('This action can be reversed at any time!');
    $swalFormSuspendConfirmButtonText = __('Yes, suspend it!');
    $swalFormSuspendCancelButtonText = __('No, cancel!');

    $swalFormReactivateTitle = __('Are you sure?');
    $swalFormReactivateText = __('This action can be reversed at any time!');
    $swalFormReactivateConfirmButtonText = __('Yes, reactivate it!');
    $swalFormReactivateCancelButtonText = __('No, cancel!');
?>
<!DOCTYPE html>
<html lang="{{ env('locale') }}">
@includeIf('_Partials.head')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    @include('sweetalert::alert')
    <div class="wrapper">
        @includeIf('_Partials.navbar')
        @includeIf('_Partials.aside')
        <div class="content-wrapper">
            @includeIf('_Partials.header')
            <section class="content">
                <div class="container-fluid">
                    @yield("content")
                </div>
            </section>
        </div>
        @includeIf('_Partials.footer')
        @includeIf('_Partials.javascripts')
    </div>
</body>

</html>
