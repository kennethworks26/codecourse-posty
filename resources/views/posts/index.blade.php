@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @guest
              <p>Please <a class="text-blue-500" href="{{ route('login') }}">login</a> to create post</p>
            @endguest
            @auth
            <form action="{{ route('posts')}}" method="POST" class="mb-6">
              @csrf
              <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" rows="5" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
              </div>
            </form>
            @endauth
        </div>
    </div>
@endsection