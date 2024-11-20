@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

    <!-- Afișare mesaj flash de succes -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div>
        <a class="bg-blue-200 p-3 rounded-md" href="{{ route('tasks.create') }}">Create Tasks</a>
    </div>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <h2><a class="text-lg font-semibold text-blue-500" href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></h2>
                <p class="mt-2 text-gray-700"><strong>Description:</strong> {{ $task->description }}</p>
                <p class="mt-2 text-gray-700"><strong>Created At:</strong> {{ $task->created_at }}</p>
                <p class="mt-2 text-gray-700"><strong>Updated At:</strong> {{ $task->updated_at }}</p>
                <p class="mt-2 text-gray-700"><strong>Category:</strong> {{ $task->category_id }}</p>
                <div>
                    <a class="bg-green-300 p-3 rounded-md" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-200 p-3 rounded-md" type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
