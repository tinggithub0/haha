@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <input type="text" name="username" id="username" placeholder="Username"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username')
                            border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="text" name="email" id="email" placeholder="Your email"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                            border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" name="password" id="password" placeholder="Your password"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')
                            border-red-500 @enderror" value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 font-medium w-full
                    rounded hover:shadow">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection

