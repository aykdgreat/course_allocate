@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-xl sm:mt-8">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words my-8 sm:my-0 sm:mb-8 pb-8 bg-white sm:border-1 sm:rounded-md sm:shadow-sm">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Profile') }}
                </header>

                @if (session('message'))
                    <div class="text-red-500 text-center py-1 mt-3">
                       {{ session('message') }}
                    </div>
                @endif

                {{-- {{ Auth::user()->role['role'] }} --}}
                <form class="w-full px-6 space-y-4 sm:px-10 sm:space-y-4" method="POST"
                action="{{ route('profile') }}">
                @csrf
                
                    <div class="flex flex-wrap">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Title') }}:
                        </label>

                        <select id="title" class="form-select w-full @error('title')  border-red-500 @enderror"
                            name="title" required autocomplete="title" autofocus>
                            <option value="Mr" @if (request()->user()->profile['title'] === 'Mr') selected @endif>Mr</option>
                            <option value="Miss" @if (request()->user()->profile['title'] === 'Miss') selected @endif>Miss</option>
                            <option value="Mrs" @if (request()->user()->profile['title'] === 'Mrs') selected @endif>Mrs</option>
                            <option value="Dr" @if (request()->user()->profile['title'] === 'Dr') selected @endif>Doctor</option>
                            <option value="Prof" @if (request()->user()->profile['title'] === 'Prof') selected @endif>Professor</option>
                        </select>

                        @error('title')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    {{-- <div class="flex flex-wrap">
                        <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('First name') }}:
                        </label>

                        <input id="firstname" type="text" class="form-input w-full @error('firstname')  border-red-500 @enderror"
                            name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname" autofocus>

                        @error('firstname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Last name') }}:
                        </label>

                        <input id="lastname" type="text" class="form-input w-full @error('lastname')  border-red-500 @enderror"
                            name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

                        @error('lastname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Other name') }}:
                        </label>

                        <input id="othername" type="text" class="form-input w-full @error('othername')  border-red-500 @enderror"
                            name="othername" value="{{ $user->othername }}" required autocomplete="othername" autofocus>

                        @error('othername')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div> --}}

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-purple-600 hover:bg-purple-800 focus:outline-none  sm:py-4">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
