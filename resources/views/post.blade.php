<x-app-layout>


       
    
               
            
<div class="flex-col ">
          
    

                <div class="mt-6 flex">
                    <div class=" mb-4 max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                        
                        @empty ($post->image_path)
                        @else
            <img src="{{ asset('storage/images/'.$post->image_path) }}" alt="Post Image" class="hidden object-cover w-32 h-32 mx-4  sm:block">
                        @endempty
                        
                        
                        <div class="flex items-center justify-between"><span class="font-light text-gray-600">
                            {{ $post->created_at->format('F j, Y') }}</span><a href="#"
                            class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                        </div>
                        <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">Build
                                Your New Idea with Laravel Freamwork.</a>
                                <p class="mt-2 text-gray-600">{{ $post->content }}</p>
                                </div>
                               
                                <div class="flex-row flex justify-end">
                                  <div class="hidden w-4/12 -mx-8 lg:block ">
                                          <div class="px-8 flex-row justify-end">
                                              <h1 class=" text-xl flex justify-center font-bold text-gray-700">Author</h1>
                                              <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                                                  <ul class="-mx-4">
                                                                  <li class="flex justify-center "><img
                                                                    @if(!$post->user->avatar) src="{{ asset('storage/images/default-image.png') }}" @else src="{{ asset('storage/images/'.$post->user->avatar) }}" @endif
                                                                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                                                      <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">{{$post->user->name}}</a><span
                                                                          class="text-sm font-light text-gray-700">{{$post->user->count()}}</span></p>
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
                    <form method="POST" action="{{ route('comment',['post' => $post])  }}">
                        @csrf
                    <button type="submit" flex justify-center items-center gap-2 px-2 hover:bg-gray-50 rounded-full p-1">
                        <svg width="22px" height="22px" viewBox="0 0 24 24" class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z"></path>
                            </g>
                        </svg>

                        
                    commente clique ici</button>
                    <x-text-input  class="block mt-1 w-full"
                    type="text"
                    name="message"
                    required  />
                </form>
                </div>
                @foreach ($post->comment->sortByDesc('created_at') as $comment)
                <div>{{$comment->user->name}}</div>
                        <div>{{$comment->message}}</div>
                        @endforeach
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