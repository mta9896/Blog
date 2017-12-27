@extends('layouts.app')

@section('content')
    <title>Edit Post</title>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class=" panel-default">
                    <h3>Your post has been successfully deleted</h3>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="../assets/js/app.js"></script>
@endsection
