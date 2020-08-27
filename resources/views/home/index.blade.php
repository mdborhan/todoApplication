@extends('layouts.master')

    @section('title')
        Todo Application Using Laravel
        @endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 right">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container mt-5">
        <div class="col-md-offset-2 col-md-8">
            <div class="row">
                <h1>Todo List</h1>

            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <strong>Success: </strong>{{Session::get('success')}}

                </div>
                @endif
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                    </ul>

                </div>
                @endif
            <div class="row">
                <form action="{{route('task.store')}}" method="post">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" name="name" class="form-control mb-2" id="inlineFormInput" placeholder="Enter Task">
                        </div>


                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
            @if( count($tasks) > 0)
                <table class="table">
                    <thead>
                    <th>Task #</th>
                    <th>Task Name</th>
                    <th>Edit</th>
                    <th>Delete</th>

                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            @if($task->soft)
                            <td><del>{{$task->name}}</del></td>
                            @else
                                <td>{{$task->name}}</td>
                            @endif
                            @if($task->soft)

                            <td>

                                <input type="submit" value="Edit" class="btn btn-success" disabled>
                            </td>
                            <td>
                                <form action = "{{route('task.delete')}}" method="post">
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger" disabled>
                                    <input type="hidden" name="id" value="{{$task->id}}" class="btn btn-danger">
                                </form>
                            </td>
                                @else
                                <td>
                                    <a href="{{route('task.edit',['id'=>$task->id])}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action = "{{route('task.delete')}}" method="post">
                                        @csrf
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        <input type="hidden" name="id" value="{{$task->id}}" class="btn btn-danger">
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforeach

                    </tbody>

                </table>

                @endif
            <div class="row text-center">
                {{$tasks->links()}}
            </div>
        </div>

    </div>

    @endsection
