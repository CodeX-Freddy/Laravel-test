@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
                style="background-color: #fff; width: 100%; display:flex;
                justify-content: flex-end; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1)">
                    @auth
                    <span style="margin-right: 30px"> {{Auth::user()->name}}</span> </span>
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"
                        style="margin-right: 10px">Home</a> 
                        <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"
                        onclick="event.preventDefault(); document.getElementById('logout').submit();">logOut</a>
                        <form id="logout" action="{{route('logout')}}" method="post">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif