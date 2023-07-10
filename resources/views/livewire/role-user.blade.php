<div class="flex justify-center w-full py-4 dark:text-indigo-200/50">
    <div class="shadow dark:bg-gray-600/50 w-3/4 p-4 rounded-lg">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">{{__('User'.': ')}} {{$user->name}}</h1>
        <form action="{{route('user.sync-roles',['user'=>$user->id])}}" method="POST" class="mx-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-4 gap-4 text-center">
                @foreach($roles as $role)
                    <div class="text-left">
                        <input type="checkbox" name="role[]"
                               value="{{$role->id}}" {{$userRoles->contains($role->id) ? 'checked':''}}>
                        <label for="role">{{$role->title}}</label>
                    </div>
                @endforeach
            </div>

            <div class="mt-16">
                <input type="submit" class="rounded-lg bg-indigo-600 mb-4 px-4 py-2 text-white"
                       value="{{__('Sync Roles')}}">
            </div>

        </form>

    </div>
</div>
