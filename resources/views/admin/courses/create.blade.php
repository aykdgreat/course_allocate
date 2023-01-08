@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-xl sm:mt-8 sm:mb-8">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 pb-10 sm:rounded-md sm:shadow-sm">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Add New Course') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10" method="POST"
                    action="{{ route('courses.store') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="level" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Level') }}:
                        </label>

                        <input id="level" type="text" class="form-input w-full @error('level')  border-red-500 @enderror"
                            name="level" value="{{ old('level') }}" required autofocus>

                        @error('level')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="code" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Course code') }}:
                        </label>

                        <input id="code" type="text" class="form-input w-full @error('code')  border-red-500 @enderror"
                            name="code" value="{{ old('code') }}" required autofocus>

                        @error('code')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Course title') }}:
                        </label>

                        <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                            name="title" value="{{ old('title') }}" autofocus>

                        @error('title')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="units" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Units') }}:
                        </label>

                        <input id="units" type="text" class="form-input w-full @error('units')  border-red-500 @enderror"
                            name="units" value="{{ old('units') }}" autocomplete="off" autofocus>

                        @error('units')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
              
                    <div class="flex flex-wrap">
                        <label for="semester" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Semester') }}:
                        </label>

                        <select id="semester" class="form-select w-full @error('semester')  border-red-500 @enderror"
                            name="semester" required autocomplete="off" autofocus size="2">
                            <option value="Harmattan">Harmattan</option>
                            <option value="Rain">Rain</option>
                        </select>

                        @error('semester')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="students" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('No. of Students') }}:
                        </label>

                        <input id="students" type="text"
                            class="form-input w-full @error('students') border-red-500 @enderror" name="students"
                            value="{{ old('students') }}" required autocomplete="off">

                        @error('students')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-purple-600 hover:bg-purple-800 focus:outline-none  sm:py-4">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection