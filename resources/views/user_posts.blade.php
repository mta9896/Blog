@extends('layouts.app')

@section('content')
    <title>User Posts</title>
    <div id="app">
        @foreach ($posts_array as $post)
            <post title='{{$post->title}}' text='{{$post->text}}' editable = '{{$editable}}'>
            </post>
        @endforeach
    </div>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="../assets/js/app.js"></script>
@endsection