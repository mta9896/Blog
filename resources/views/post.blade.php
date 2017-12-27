@extends('layouts.app')

@section('content')
    <title>Post</title>

    <div id="app">

    <post id="{{$currentpost->id}}" title="{{$currentpost->title}}" text="{{$currentpost->text}}">
    </post>


</div>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{asset('js/app.js')}}"></script>
<script src="../assets/js/app.js"></script>
@endsection
