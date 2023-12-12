

         <li class="flex items-center"><img src="{{ asset('storage/images/'.$user->avatar) }}" alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
             <p><a href={{"/profil/$user->id"}} class="mx-1 font-bold text-gray-700 hover:underline">{{ $user->name }}</a><span class="text-sm font-light text-gray-700">Created 23 Posts</span></p>
         </li>
        
     