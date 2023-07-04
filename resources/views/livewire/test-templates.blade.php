<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        @if($appIsSet)
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">{{__('Application: ')}} {{$app->title}}</h1>
        @endif
        @if($showCreateForm)
            <form action="{{route('test-template.store')}}" method="post" class="mx-6">
                @csrf
                <div class="my-2">
                    <label for="app" class="text-gray-100">{{__('app')}}</label>
                    <select
                        class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4 outline-violet-600"
                        name="app">
                        @if($appIsSet)
                            <option value="{{$app->id}}" selected>{{$app->title}}</option>
                        @endif
                        @foreach($apps as $app)
                            <option value="{{$app->id}}">{{$app->title}}</option>
                        @endforeach
                    </select>
                </div>
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
                    wire:click="activateForm">{{__('create new scenario')}}</button>
        @endif
        <table
            class="table table-fixed table-auto w-full border-collapse border border-2 border-slate-500 text-gray-100">
            <thead class="table-header-group w-48">
            <tr class="w-48">
                <th class="border-collapse border border-slate-500 ">{{__('id')}}</th>
                @if(! $appIsSet)
                    <th class="border-collapse border border-slate-500 ">{{__('app')}}</th>
                @endif
                <th class="border-collapse border border-slate-500 ">{{__('title')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('description')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('creator')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('created at')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('cases')}}</th>
                <th class="border-collapse border border-slate-500 ">{{__('action')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($templates as $template)
                <tr class="table-row" wire:key="{{$template->id}}">
                    <td class="table-cell text-center border border-slate-700">{{$template->id}}</td>
                    @if(! $appIsSet)
                        <td class="table-cell text-center border border-slate-700">{{$template->app->title}}</td>
                    @endif

                    <td class="table-cell text-center border border-slate-700">{{$template->title}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$template->description}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$template->user->name}}
                        / {{$template->user->email}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$template->created_at}}</td>
                    <td class="table-cell text-center border border-slate-700">
                        <a href="{{route('test-templates.test-cases',['testTemplate'=>$template->id])}}"
                           class="text-green-400">{{__('test cases')}}</a>
                    </td>
                    <td class="table-cell text-center border border-slate-700">
                        <a href="{{route('test.form',['testTemplate'=>$template->id])}}"
                           class="text-red-400">{{__('submit result')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

