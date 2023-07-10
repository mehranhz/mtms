<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        @if($showCreateForm)
            <form action="{{route('role.store')}}" method="post" class="mx-6">
                @csrf

                <div class="my-2">
                    <label for="title" class="text-gray-100">{{__('title')}}</label>
                    <input
                        class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4 outline-violet-600"
                        name="title"
                        placeholder="{{__('title')}}" required/>
                </div>
                <div class="my-2">
                    <label for="description" class="text-gray-100">{{__('description')}}</label>
                    <textarea name="description" id="" cols="30" rows="10"
                              class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4  focus:outline-violet-600"></textarea>
                </div>
                <div class="flex w-full gap-4">
                    <input type="submit" value="{{__('save')}}"
                           class="rounded-lg bg-indigo-600 mb-4 px-4 py-2 text-white">
                    <button class="rounded-lg bg-rose-600 mb-4 px-4 py-2 text-white" wire:click="deActiveForm"
                            onclick="event.preventDefault()">{{__('cancel')}}</button>
                </div>
            </form>
        @else
            <button class="rounded-lg bg-indigo-600 mb-4 px-4 py-2 text-white "
                    wire:click="activateForm">{{__('add new role')}}</button>
        @endif
        @if($showUpdateForm)
            <form action="{{route('role.update',['role'=>$activeRole->id])}}" method="post" class="mx-6">
                @csrf
                @method('PUT')
                <div class="my-2">
                    <label for="title" class="text-gray-100">{{__('title')}}</label>
                    <input
                        class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4 outline-violet-600"
                        name="title"
                        placeholder="{{__('title')}}" required value="{{$activeRole->title}}"/>
                </div>
                <div class="my-2">
                    <label for="description" class="text-gray-100">{{__('description')}}</label>
                    <textarea name="description" id="" cols="30" rows="10"
                              class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4  focus:outline-violet-600">{{$activeRole->description}}</textarea>
                </div>
                <div class="flex w-full gap-4">
                    <input type="submit" value="{{__('save')}}"
                           class="rounded-lg bg-indigo-600 mb-4 px-4 py-2 text-white">
                    <button class="rounded-lg bg-rose-600 mb-4 px-4 py-2 text-white" wire:click="deActiveUpdateForm"
                            onclick="event.preventDefault()">{{__('cancel')}}</button>
                </div>
            </form>
        @endif
        <table
            class="table table-fixed table-auto w-full border-collapse border border-2 border-slate-500 text-gray-100">
            <thead class="table-header-group w-48">
            <tr class="w-48">
                <th class="border-collapse border border-slate-500 ">{{__('id')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('title')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('description')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('created at')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('action')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('permissions')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr class="table-row" wire:key="{{$role->id}}">
                    <td class="table-cell text-center border border-slate-700">{{$role->id}}</td>

                    <td class="table-cell text-center border border-slate-700">{{$role->title}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$role->description}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$role->created_at}}</td>
                    <td class="table-cell text-center border border-slate-700">
                        <button
                            class="text-green-400"
                            wire:click="activateUpdateForm({{$role->id}})">{{__('edit')}}</button>
                        <form action="{{route('role.destroy',['role'=>$role->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="text-red-400 cursor-pointer">
                        </form>
                    </td>
                    <td class="table-cell text-center border border-slate-700">
                        <a href="{{route('role.permissions',['role'=>$role->id])}}"
                           class="text-indigo-500">{{__('manage permissions')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

