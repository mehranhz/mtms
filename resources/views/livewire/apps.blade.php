<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        @if($showCreateForm)
            <form action="{{route('app.store')}}" method="post" class="mx-6">
                @csrf
                <div class="my-2">
                    <label for="title" class="text-gray-100">{{__('title')}}</label>
                    <input class="w-full p-2 rounded-lg text-gray-900 focus:outline focus:outline-offset-0 focus:outline-4 outline-violet-600"
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
                    <button class="rounded-lg bg-rose-600 mb-4 px-4 py-2 text-white" wire:click="deActiveForm"  onclick="event.preventDefault()">{{__('cancel')}}</button>
                </div>
                <style>
                    #container {
                        width: 1000px;
                        margin: 20px auto;
                    }
                    .ck-editor__editable[role="textbox"] {
                        /* editing area */
                        min-height: 200px;
                    }
                    .ck-content .image {
                        /* block images */
                        max-width: 80%;
                        margin: 20px auto;
                    }
                </style>
                <div id="container">
                    <div id="editor">
                    </div>
                </div>
            </form>
        @else
            <button class="rounded-lg bg-indigo-600 mb-4 px-4 py-2 text-white "
                    wire:click="activateForm">{{__('create new app')}}</button>
        @endif
        <table class="table table-fixed table-auto w-full border-collapse border border-2 border-slate-500">
            <thead class="table-header-group w-48">
            <tr class="w-48">
                <th class="border-collapse border border-slate-500 ">id</th>
                <th class="border-collapse border border-slate-500 ">name</th>
                <th class="border-collapse border border-slate-500 ">description</th>
                <th class="border-collapse border border-slate-500 ">creator</th>
                <th class="border-collapse border border-slate-500 ">created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($apps as $app)
                <tr class="table-row" wire:key="{{$app->id}}">
                    <td class="table-cell text-center border border-slate-700">{{$app->id}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$app->title}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$app->description}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$app->user->name}} / {{$app->user->email}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$app->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
