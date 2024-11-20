@extends('layouts.app')

@section('content')
    <h1>Editare Sarcină</h1>
    
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"><br><br>
        </div>

        @error('title')
            <div class="text-red-500">*{{ $message }}</div><br>
        @enderror

        <div>
            <label for="description">Descriere</label>
            <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea><br><br>
        </div>

        @error('description')
            <div class="text-red-500">*{{ $message }}</div><br>
        @enderror

        <div>
            <label for="due_date">Data limită</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date) }}"><br><br>
        </div>

        @error('due_date')
            <div class="text-red-500">*{{ $message }}</div><br>
        @enderror

        <div>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id', $task->category_id) == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
            </select>
            <br><br>

            @error('category_id')
                <div class="text-red-500">*{{ $message }}</div><br>
            @enderror
        </div>

        <button type="submit">Actualizează</button>
    </form>
@endsection
