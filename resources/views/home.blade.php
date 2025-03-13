@extends('layout.layouts')

@section('home')
    <div style="display: block;">
        <div class="todo-container" style="margin-bottom: 20px; text-align: center;">
            @auth
                <p style="font-weight: bold";>Hi there {{ Auth::user()->name }}</p>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="finish-btn">LogOut</button>
                </form>
            @endauth
            @guest
                <p style="font-weight: bold">Hi there Please Register To Use This App</p>
                <a href="{{ route('register') }}" class="finish-btn">Register</a>
            @endguest
        </div>
        @auth
            <div class="todo-container">
                <h1>To-Do List</h1>
                {{-- <div class="add-task"> --}}
                <form action="{{ route('task.store') }}" method="post" class="add-task">
                    @csrf
                    @method('post')
                    <input type="text" id="taskInput" name="task_name" placeholder="Add a new task..." autocomplete="off">
                    @error('task_name')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                    <button id="addTaskBtn" type="submit">Add Task</button>
                </form>

                <ul id="taskList">
                    @foreach ($task as $tasks)
                        <li class="{{ $tasks->status == 'complete' ? 'completed-task' : '' }}">
                            <span style="border-radius:10rem"> {{ $tasks->task_name }} </span>
                            <div class="task-actions">
                                <form action="{{ route('task.complete', ['task' => $tasks]) }}" method="post">
                                    @csrf
                                    <button class="finish-btn">Finish</button>
                                </form>

                                <form action="{{ route('task.destroy', ['task' => $tasks]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>

                            </div>
                        </li>
                    @endforeach
                    <div style="display: flex; gap: 20px; text-align: center; justify-content: center; ">
                        <p style="text-align: center; color: grey; font-weight: bold; ">
                            {{ count($task->where('status', 'pending')) }} Pending Tasks</p>
                        <p style="text-align: center; color: grey; font-weight: bold; ">
                            {{ count($task->where('status', 'complete')) }} Finished Tasks</p>
                    </div>

                </ul>
            </div>
        @endauth

    </div>
@endsection
