<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        @foreach($testCases as $testCase)
            <div class="bg-gray-200 text-gray-900 mb-4 p-4">
                <h2 class="text-lg">{{$testCase->title}}</h2>
                <div>
                    <h3 for="" class="text-md">status</h3>
                    <fieldset>
                        <label for="status" class="text-sm">pass</label>
                        <input type="radio" name="status-{{$testCase->id}}" value="1" wire:change="updateTestCaseResult({{$testCase->id}},'status',1)">
                        <label for="status" class="text-sm">reject</label>
                        <input type="radio" name="status-{{$testCase->id}}" value="0" wire:change="updateTestCaseResult({{$testCase->id}},'status',0)">
                    </fieldset>
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

