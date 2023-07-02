<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        <table class="table table-fixed table-auto w-full border-collapse border border-2 border-slate-500">
            <thead class="table-header-group w-48">
            <tr class="w-48">
                <th class="border-collapse border border-slate-500 ">id</th>
                <th class="border-collapse border border-slate-500 ">test template</th>
                <th class="border-collapse border border-slate-500 ">tester</th>
                <th class="border-collapse border border-slate-500 ">created at</th>
                <th class="border-collapse border border-slate-500 ">view full report</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tests as $test)
                <tr class="table-row" wire:key="{{$test->id}}">
                    <td class="table-cell text-center border border-slate-700">{{$test->id}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$test->testTEmplate->title}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$test->user->name}}
                        / {{$test->user->email}}</td>
                    <td class="table-cell text-center border border-slate-700">{{$test->created_at}}</td>
                    <td class="table-cell text-center border border-slate-700">
                        <a href="{{route('test.report',['test'=>$test->id])}}" class="text-rose-600">view full report</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

