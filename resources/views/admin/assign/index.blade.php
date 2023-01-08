@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:max-w-xl sm:mt-8">
    <div class="w-full sm:px-6">

        @if (session('message'))
        
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4 mt-4" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-5 w-5 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold text-xl">
                            {{ session('message') }}
                        </p>
                    </div>
                  </div>
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:mb-10 sm:rounded-md sm:shadow-lg">
            
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Assigned Courses
            </header>
            <div class="mx-auto mt-5">
                <a  href="/admin"><button class="bg-blue-500 text-white font-semibold p-2 rounded-lg mr-1 hover:bg-blue-700 focus:outline-none">Staffs</button></a>
                <a  href="/admin/courses"><button class="bg-gray-500 text-white font-semibold p-2 rounded-lg hover:bg-gray-700 focus:outline-none">Courses</button></a>
                <a  href="/admin/assign/create"><button class="bg-green-500 text-white font-semibold p-3 rounded-lg mr-1 hover:bg-green-700 focus:outline-none">New Assignment</button></a>
            </div>
            
            <div class="w-full p-6 text-gray-700">
        <div class="overflow-x-scroll mr-2">
        <table class="table-auto  overflow-hidden">
          <thead>
            <tr class="table-row bg-gray-900 text-white ">
                <th class="p-3 text-left">Staff ID</th>
                <th class="p-3 text-left">Staff Name</th>
                <th class="p-3 text-left">Course Code</th>
                <th class="p-3 text-left">Course Title</th>
                 <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($staffs as $staff)
                <tr class="border-b">
                    <td class="p-2">{{ $staff->id }}</td>
                    <td class="p-2">{{ $staff->title }} {{ $staff->firstname }} {{ $staff->lastname }}</td>
                    <td class="p-2"><ul>@forelse ($staff->courses as $course)
                        <li class="mb-2">{{ $course->code }}</li>
                    @empty
                        No course code assigned!
                    @endforelse</ul></td>
                    <td class="p-2">
                        <ul>
                            @forelse ($staff->courses as $course)
                                <li class="mb-2">{{ $course->title }}</li>
                            @empty
                                No course title assigned!
                                @endforelse
                            </ul>
                        </td>
                        <td class="p-2">
                            <ul>
                            @forelse ($staff->courses as $course)
                            <li class="mb-2">
                                <a href="/admin/assign/{{ $course->id }}/edit" class=text-green-600 hover:text-green-800>Edit</a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </td>
                        <td class="p-2">
                            <ul>
                            @forelse ($staff->courses as $course)
                            <li class="mb-2">
                                <form action="/admin/assign/{{ $course->id }}"  method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600 hover:text-red-700 focus:outline-none">Delete</button>
                                </form>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </td>
                </tr>
            @empty
                <tr class="border-b">  <td colspan="6" class="p-3"> No course assigned! Click <a href="/admin/assigned/create">here</a></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
        </div>
    </section>
</div>
</main>

@endsection
