<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
        <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
            <table
                class="table table-fixed table-auto w-full border-collapse border border-2 border-slate-500 text-gray-100">
                <thead class="table-header-group w-48">
                <tr class="w-48">
                    <th class="border-collapse border border-slate-500 ">{{__('id')}}</th>
                    <th class="border-collapse border border-slate-500 ">{{__('name')}}</th>
                    <th class="border-collapse border border-slate-500 ">{{__('email')}}</th>
                    <th class="border-collapse border border-slate-500 ">{{__('created at')}}</th>
                    <th class="border-collapse border border-slate-500 ">{{__('roles')}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="table-row" wire:key="{{$user->id}}">
                        <td class="table-cell text-center border border-slate-700">{{$user->id}}</td>

                        <td class="table-cell text-center border border-slate-700">{{$user->name}}</td>
                        <td class="table-cell text-center border border-slate-700">{{$user->email}}</td>
                        <td class="table-cell text-center border border-slate-700">{{$user->created_at}}</td>
                        <td class="table-cell text-center border border-slate-700">
                            <a href="{{route('user.roles',['user'=>$user->id])}}"
                               class="text-indigo-600">{{__('user roles')}}</a>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
