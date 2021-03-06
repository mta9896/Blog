@extends('layouts.app')

@section('content')
    <title> Blog</title>
<div id="app">
    <div class="container">
        <a href="{{route('login')}}">
            <button  class="btn btn-primary">
                Login Or Register
            </button>
        </a>
        <br>
        <h3>Latest Posts:</h3>
        @foreach ($posts_array as $post)
            <post title='{{$post->title}}' text='{{$post->text}}' editable = '{{$editable}}'>
            </post>
        @endforeach
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