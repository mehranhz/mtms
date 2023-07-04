<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        @foreach($testCases as $testCase)
            <div class="bg-gray-200 text-gray-900 mb-4 p-4">
                <h2 class="text-xl font-semibold">Title: {{$testCase->title}}</h2>
                <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Description')}}</h2>
                <div class="border-2 border-gray-300 p-3">
                    <p class="pl-3 text-sm">
                        {{$testCase->description}}
                    </p>
                </div>
                <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Test Steps')}}</h2>
                <div class="border-2 border-gray-300 p-3">
                    {!! $testCase->test_steps !!}
                </div>
                <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Test Data')}}</h2>
                <div class="border-2 border-gray-300 p-3">
                    {!! $testCase->test_data !!}
                </div>
                <h2 class="text-lg font-semibold mt-6 mb-2">{{__('Expected Exception')}}</h2>
                <div class="border-2 border-gray-300 p-3">
                    {!! $testCase->exception_result !!}
                </div>
                <div>
                    <h3 for="" class="text-md text-xl font-semibold mt-6">{{__('status')}}</h3>
                    <fieldset>
                        <label for="status" class="text-sm">Pass</label>
                        <input type="radio" name="status-{{$testCase->id}}" value="1" wire:change="updateTestCaseResult({{$testCase->id}},'status',1)">
                        <label for="status" class="text-sm">Fail</label>
                        <input type="radio" name="status-{{$testCase->id}}" value="0" wire:change="updateTestCaseResult({{$testCase->id}},'status',0)">
                    </fieldset>
                    <h3 for="" class="text-md text-xl font-semibold mt-6">{{__('Report')}}</h3>
                    <textarea name="" id="" cols="30" rows="3" class="w-full" wire:change="updateTestCaseResult({{$testCase->id}},'description',$event.target.value)"></textarea>
                    @foreach($testCaseResults[$testCase->id]['files'] as $file)
                        <a href="{{$file}}" target="_blank" class="w-full text-rose-600 block">{{$file}}</a>
                    @endforeach
                    <div class="flex">
                        <input type="file" class="w-full" wire:model="photo">
                        <button class="bg-indigo-600 px-2 text-white" wire:click="savePhoto({{$testCase->id}})">upload</button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="flex justify-center">
            <button wire:click="save" class="bg-indigo-600 text-white px-10 py-1 w-50">Save The Test's Result</button>
        </div>
    </div>
</div>

