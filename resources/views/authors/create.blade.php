@extends('layouts.app')

@section('content')
    <div class="w-2/3 bg-gray-200 mx-auto p-6 shadow">
        <form class="flex flex-col items-center" action="/authors" method="POST">
            <h1>Add New Author</h1>
            <div class="pt-4">
                <input class="rounded px-4 py-2 w-64" type="text" name="name" placeholder="Full name">
                @error('name')
                    <p class="text-red-600">{{$message}}</p>
                @enderror
            </div>
            <div class="pt-4">
                <input class="rounded px-4 py-2 w-64" type="text" name="dob" placeholder="Date of birth">
                @error('dob')
                    <p class="text-red-600">{{$message}}</p>
                @enderror
            </div>
            <div class="pt-4">
                <button class="bg-blue-400 text-white rounded py-2 px-4">Add new author</button>
            </div>
            @csrf
        </form>
    </div>
@endsection