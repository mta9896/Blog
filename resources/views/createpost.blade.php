@extends('layouts.app')

@section('content')
    <title>Add Post</title>
<div id="app">
    @yield('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class=" panel-default">
                    <h3>Add a new post</h3>
                    <form method="POST" action="/add_post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            title :
                            <input name="title" class="form-control">
                            </input>
                            <hr>
                            text:
                            <textarea name="text" class="form-control">
                            </textarea>
                            <br>
                            <button type="submit" class="btn btn-primary">
                                Add Post
                            </button>
                        </div>
                    </form>

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
</div>
@endsection