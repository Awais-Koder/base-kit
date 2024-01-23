@include('layouts.header')
@if (auth()->user() &&
        auth()->user()->hasVerifiedEmail())

    <body class="hold-transition sidebar-mini layout-footer-fixed text-sm layout-navbar-fixed">
        <div class="wrapper">
            @include('layouts.navbar')
            @include('layouts.sidebar')
@endif
<div class="content-wrapper">
    <section class="content">
        @yield('content')
    </section>
</div>

@if (auth()->user() &&
        auth()->user()->hasVerifiedEmail())
    @include('layouts.footer')
    <div id="include_right_side_bar">

        @if (view()->exists('layouts.right-sidebar'))
            @include('layouts.right-sidebar')
        @endif

    </div>
@endif
</div>

@include('layouts.scripts.js')

@stack('third_party_scripts')

@stack('page_scripts')

{{-- @include('layouts.scripts.js') --}}
@include('layouts.scripts.custom_variables')
@include('layouts.scripts.ajax_requests')
@include('layouts.scripts.custom_js')

@if (view()->exists('categories.js.categories_js'))
    @include('categories.js.categories_js')
@endif


<!-- Inactivity Modal -->
<div class="modal fade" id="inactivityModal" tabindex="-1" role="dialog" aria-labelledby="inactivityModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inactivityModalLabel">Time to Stretch!</h5>
            </div>
            <div class="modal-body">
                You've been inactive for a while. Just checking in to see if you're still there. Click OK to continue.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="refreshSession">OK</button>
            </div>
        </div>
    </div>
</div>
<script>
    var inactivityTime = function() {
        var time;
        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;

        function showModal() {
            $('#inactivityModal').modal('show');
        }

        function logout() {
            window.location.href = '/'; // Redirect to the root route
        }

        function resetTimer() {
            clearTimeout(time);
            time = setTimeout(showModal, 15 * 60 * 1000); // 15 minutes of inactivity

            // Redirect to root route on 'OK' button click
            $('#refreshSession').off('click').on('click', logout);
        }
    };

    inactivityTime();
</script>


</body>

</html>
