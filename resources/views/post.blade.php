<x-app-layout>



    
               
            
<div class="flex-col ">
          
    

                <div class="mt-6 flex">
                    <div class=" mb-4 max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                        
                        @empty ($post->image_path)
                        @else
            <img src="{{ asset('storage/images/'.$post->image_path) }}" alt="Post Image" class="hidden object-cover w-32 h-32 mx-4  sm:block">
                        @endempty
                        
                        
                        <div class="flex items-center justify-between"><span class="font-light text-gray-600">
                            {{ $post->created_at->format('F j, Y') }}</span>
                        </div>
                        
                                <p class="mt-2 text-gray-600">{{ $post->content }}</p>
                                
                                <div class="flex-row flex justify-end mb-2">
                                    <div class="hidden  -mx-8 lg:block ">
                                        <div class="px-8 flex-row justify-end">
                                              <h1 class=" text-xl flex justify-center font-bold text-gray-700">Author</h1>
                                              <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                                                  <ul class="-mx-4">
                                                      <li class="flex justify-center "><img
                                                        @if(!$post->user->avatar) src="{{ asset('storage/images/default-image.png') }}" @else src="{{ asset('storage/images/'.$post->user->avatar) }}" @endif
                                                        alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                                        <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">{{$post->user->name}}</a><span
                                                            class="text-sm font-light text-gray-700">{{$post->user->posts->count()}} post created</span></p>
                                                        </li>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                      </div>
                                      
                                    </div>
                                    
                                </div>
                                
                                
                            </div>   
                            <div class="flex justify-center">
                            <div class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">
                                <form  method="POST" action="{{ route('comment',['post' => $post])  }}" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                                    @csrf
                                    <div class="flex-col flex-wrap -mx-3 mb-6">
                                      <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                      <div class="w-full md:w-full px-3 mb-2 mt-2">
                                         <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="message" placeholder='Type Your Comment' required></textarea>
                                      </div>
                                      <div class="w-full md:w-full flex-col items-start md:w-full px-3">
                                         <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                            <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                                         </div>
                                         <div class="-mr-1">
                                            <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                                         </div>
                                      </div>
                                   </form>
                                </div>
                             </div>
                        </div>
                        <div class="">
                            
                            
                            
                            <div class="flex-col flex justify-center relative top-1/3 max-w-4xl mx-auto">
                
                
                
                
                                  
                                    
                                    
                                    @foreach ($post->comment->sortByDesc('created_at') as $comment)
                                      <!-- This is an example component -->
                                      <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg mb-2 ">
                                        <div class="relative flex gap-4">
                                            <img src="{{ asset('storage/images/'.$comment->user->avatar) }}" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
                                            <div class="flex flex-col w-full">
                                                <div class="flex flex-row justify-between">
                                                    <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{$comment->user->name}}</p>
                                                    <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                                                </div>
                                                <p class="text-gray-400 text-sm">{{ $comment->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                        <p class="-mt-4 text-gray-500">{{$comment->message}}</p>
                                    </div>
                                    
                                            @endforeach
                                </div>
                              
                        </div>
                </div>
    </div>
    
            
                    <div class="mt-8">
                        <div class="flex justify-center">
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                                previous
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                1
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                2
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                3
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                Next
                            </a>
                        </div>
                </div>
           
           
 </div>
        </x-app-layout>