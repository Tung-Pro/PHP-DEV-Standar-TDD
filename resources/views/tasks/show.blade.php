@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $task->name }}</h1>
    <p>{{ $task->content }}</p>
</div>
@endsection
