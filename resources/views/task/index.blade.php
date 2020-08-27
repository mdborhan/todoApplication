@extends('layouts.master')
@section('title')
    Welcome {{ Auth::user()->name }}
    @endsection
@section('content')
<div class="container">
    <div class="col-md-offset-2 col-md-8">
        <div class="row">
            <h1>Todo List</h1>

        </div>
        <div class="row">
            <form action="{{route('task.store')}}" method="post">
                @csrf
                <div class="col-md-9">
                    <input type="text" class="form-contrl" name="name">

                </div>
                <div class="col-md-3">
                    <input type="submit" name="btn" class="btn btn-primary btn-block" value="Add Task">

                </div>
            </form>

        </div>
    </div>

</div>
    @endsection
