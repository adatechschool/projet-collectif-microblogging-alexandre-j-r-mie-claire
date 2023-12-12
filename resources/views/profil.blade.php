<x-app-layout>


<div class="flex-col flex">
    
    
    
    
    
    <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md mt-4 ">
            <div class="flex-row">
           <div class=" flex justify-center ">
        
            <a href="#" class=" mt-4 ml-2 ">
                <img
                    src="{{$user->avatar}}"
                    alt="avatar" class="hidden object-cover w-20 h-20 mx-4 rounded-full sm:block">
                <h1 class="font-bold text-2xl text-gray-700 hover:underline">{{$user->name}}</h1>
            </a>
        </div>
        <div class="flex justify-end">
        <div class="flex flex-col max-w-sm px-6 py-4  bg-white rounded-lg shadow-md">
        <ul class="-mx-4">
        <li class="flex items-center">{{$user->age}}
            
            <li><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">{{$user->name}}</li><span
                    class="text-sm font-light text-gray-700">Created{{count($Posts)}} Posts</span></p>
        </li>
        </div>
        </div>
        </div>
    
<div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">Biography.</a>
    <p class="mt-2  text-l text-gray-600">{{$user->biography}}</p>
</div>
</div>
</div>

@foreach ($Posts->sortByDesc('created_at') as $post)
<x-card-post :post="$post" />
@endforeach


</div>
</div>
</div>



</x-app-layout>