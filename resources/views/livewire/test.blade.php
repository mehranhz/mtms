<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        @foreach($test->testCaseResults as $testCaseResult)
            <div class="bg-gray-200 text-gray-900 mb-4 p-4">
                <h2 class="text-lg mb-6">TEST CASE:
                    <span class="bg-gray-500 px-4 rounded-lg">{{$testCaseResult->testCase->title}}</span>
                </h2>
                <div>
                    <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Description')}}</h2>
                    <div class="border-2 border-gray-300 p-3">
                        <p class="pl-3 text-sm">
                            {{$testCaseResult->testCase->description}}
                        </p>
                    </div>
                    <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Test Steps')}}</h2>
                    <div class="border-2 border-gray-300 p-3">
                        {!! $testCaseResult->testCase->test_steps !!}
                    </div>
                    <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Test Data')}}</h2>
                    <div class="border-2 border-gray-300 p-3">
                        {!! $testCaseResult->testCase->test_data !!}
                    </div>
                    <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Expected Exception')}}</h2>
                    <div class="border-2 border-gray-300 p-3">
                        {!! $testCaseResult->testCase->exception_result !!}
                    </div>
                    <h3 class="text-lg">Report:</h3>
                    <p class="ml-4">
                        {{$testCaseResult->description}}
                    </p>
                    <div class="flex mb-6">
                        <h3 class="text-lg">STATUS: </h3>
                        @if($testCaseResult->status == 1)
                            <div class="bg-emerald-600 p-1 rounded-lg ml-3">passed</div>
                        @else
                            <span class="bg-rose-600 p-1 rounded-lg ml-3">failed</span>
                        @endif
                    </div>
                    <h3 class="text-lg">FILES:</h3>

                    @foreach($testCaseResult->files as $file)
                        <a href="{{$file->path}}" class="text-rose-600 block" target="_blank">{{$file->path}}</a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

