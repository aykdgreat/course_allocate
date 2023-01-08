@extends('layouts.app')

@section('content')
            
        <main class="sm:container sm:mx-auto sm:max-w-xl sm:mt-8 sm:mb-8">
                <div class="flex">
                    <div class="w-full">
                        <section class="flex flex-col break-words bg-white sm:border-1 pb-10 sm:rounded-md sm:shadow-sm">
            
                            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                                {{ __('Assign') }}
                            </header>
            
                            <form class="w-full px-6 space-y-6 sm:px-10" method="POST"
                                action="{{ route('assign.store') }}">
                                @csrf
            
                                <div class="flex flex-wrap">
                                    <label for="course_id" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                        {{ __('Course') }}:
                                    </label>
            
                                    <select id="course_id" class="form-select w-full @error('course_id')  border-red-500 @enderror"
                                        name="course_id" required autocomplete="off" autofocus>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->code }} {{ $course->title }}</option>                    
                                        @endforeach
                                    </select>
            
                                    @error('semester')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
            
                                <div class="flex flex-wrap">
                                    <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                        {{ __('To') }}:
                                    </label>
            
                                    <select id="user_id" class="form-select w-full @error('user_id')  border-red-500 @enderror"
                                        name="user_id" required autocomplete="off" autofocus>
                                        @foreach ($staffs as $staff)
                                            <option value="{{ $staff->id }}">{{ $staff->profile->title }} {{ $staff->firstname }} {{ $staff->lastname }} </option>
                                        @endforeach
                                    </select>
            
                                    @error('user_id')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
            
            
                                <div class="flex flex-wrap">
                                    <button type="submit"
                                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-purple-600 hover:bg-purple-800 focus:outline-none  sm:py-4">
                                        {{ __('Assign') }}
                                    </button>
                                </div>
                            </form>
            
                        </section>
                    </div>
                </div>
            </main>
@endsection

