<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User list") }}
                </div>
            </div>
            <x-primary-button>
            {{('Create')}}
</x-primary-button>
            <table class='table'>
<thead> 
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Tasks</th>
                <th>Action</th>
            </tr>
            <tr>
            </thead>
<tbody>
@foreach ($users as $index => $user)
<tr>
    <td>{{index}}</td>
    <td>{{$user->fullname}}</td>
    <td>{{$user->username}}</td>
    <td>
        @foreach ($user->tasks as $task)
        {{$task->name}}
        @endforeach
    </td>
    <td>
<a href="{{ route('users.edit', ['user'=>$user->id])}}">
        <x-primary-button>
            {{('Edit')}}
</x-primary-button>
</a>
<x-primary-button>
            {{('Delete')}}
</x-primary-button>

    </td>
</tr>
</tbody>
            </tr>
            </table>
        </div>
    </div>
</x-app-layout>
