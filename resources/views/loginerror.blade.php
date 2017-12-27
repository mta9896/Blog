@extends('layouts.app')

@section('content')
    <title>Post</title>

    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class=" panel-default">
                        <h3>Your must login or register to do this.</h3>
                        <a href="{{route('login')}}">
                            <button  class="btn btn-primary" style="margin-left: 25px; margin-top:15px">
                                Login Or Register
                            </button>
                        </a>
                    </div>
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