@extends('layouts.app')

@section('content')
    <title>Edit Post</title>
    <div id="app">
        @yield('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class=" panel-default">
                        <h3>Edit post</h3>
                        <form method="POST" action="/edit/{{$currentpost->id}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                title :
                                <input name="title" class="form-control" value="{{$currentpost->title}}">
                                </input>
                                <hr>
                                text:
                                <textarea name="text" class="form-control">{{$currentpost->text}}
                                </textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Edit Post
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