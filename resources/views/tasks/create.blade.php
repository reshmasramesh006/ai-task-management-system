@extends('layouts.app')

@section('title', 'Create Task')

@section('content')

<form action="{{ route('tasks.store') }}"
      method="POST">

    @csrf

    @include('tasks.partials.form')

</form>

@endsection