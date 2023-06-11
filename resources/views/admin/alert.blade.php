<div class="row m-3">
    <div class="col-md-6 offset-md-3">
        @if (Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Success!</strong> {{ Session::get('message') }}
            </div>
        @endif
    </div>
</div>


@if (Session::has('message'))
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 2000);
    </script>
@endif
