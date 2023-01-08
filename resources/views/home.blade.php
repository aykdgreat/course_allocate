@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-xl sm:mt-8">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4 mt-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:mb-10 sm:rounded-md sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

                <div class="w-full p-6 text-gray-700">
                    <h3 class="text-center mb-4 text-xl"><span class="font-bold">{{ $staff->profile->title }} {{ $staff->lastname }}</span>, here are your asssigned courses</h3>
                    <div class="overflow-x-auto mr-2">
                        <table class="table-auto overflow-x-scroll">
                            <thead>
                                <tr class="table-row bg-gray-900 text-white ">
                                    <th class="p-3 text-left">Level</th>
                                    <th class="p-3 text-left">Course Code</th>
                                    <th class="p-3 text-left">Course Title</th>
                                    <th class="p-3 text-left">Semester</th>
                                    <th class="p-3 text-left">Units</th>
                                    <th class="p-3 text-left">Taken by</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($staff->courses as $course)
                                <tr class="border-b">
                                    <td class="p-2">
                                        {{ $course->level }}
                                    </td>
                                    <td class="p-2">
                                        {{ $course->code }}
                                    </td>
                                    <td class="p-2">
                                        {{ $course->title }}
                                    </td>
                                    <td class="p-2">
                                        {{ $course->semester }}
                                    </td>
                                    <td class="p-2">
                                        {{ $course->units }}
                                    </td>
                                    <td class="p-2">
                                        {{ $course->students }} students
                                    </td>
                                </tr>
                                @empty
                                <tr class="border-b"><td colspan="6" class="p-3">Oops! No course has been assigned to you yet! Please check back later</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
</main>
@endsection
