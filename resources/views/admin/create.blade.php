@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-xl sm:mt-8 sm:mb-8">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 pb-10 sm:rounded-md sm:shadow-sm">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Create Staff') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10" method="POST"
                    action="{{ route('admin.store') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('First name') }}:
                        </label>

                        <input id="firstname" type="text" class="form-input w-full @error('firstname')  border-red-500 @enderror"
                            name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                        @error('firstname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Last name') }}:
                        </label>

                        <input id="lastname" type="text" class="form-input w-full @error('lastname')  border-red-500 @enderror"
                            name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                        @error('lastname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Other name') }}:
                        </label>

                        <input id="othername" type="text" class="form-input w-full @error('othername')  border-red-500 @enderror"
                            name="othername" value="{{ old('othername') }}" autocomplete="othername" autofocus>

                        @error('othername')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
              
                    <div class="flex flex-wrap">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Title') }}:
                        </label>

                        <select id="title" class="form-select w-full @error('title')  border-red-500 @enderror"
                            name="title" required autocomplete="title" autofocus>
                            <option value="Mr">Mr</option>
                            <option value="Miss">Miss</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Dr">Doctor</option>
                            <option value="Prof">Professor</option>
                        </select>

                        @error('title')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
           
                    <div class="flex">
                        <input id="set_admin" type="checkbox" class="mr-3 w-5 h-5" name="set_admin">

                        <label for="set_admin" class="block text-gray-700 text-md font-bold mb-2">
                            {{ __('Set admin?') }}
                        </label>

                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-purple-600 hover:bg-purple-800 focus:outline-none  sm:py-4">
                            {{ __('Create') }}
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection