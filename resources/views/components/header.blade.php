<header class="bg-[#fefae0] text-[#283618] ">

    <nav class="md:flex md:justify-between p-10">
        <ul class="md:flex justify-start mr-10">
            <li class="mr-10 hover:text-[#606c38] hover:border-4 hover:border-b-[#606c38]"><a href="/" class=" p-3">Home</a></li>
            <li class="mr-10 hover:text-[#606c38] hover:border-4 hover:border-b-[#606c38]"><a href="/projects" class=" p-3">Projects</a></li>


        </ul>
        <ul>
            <div class="md:flex md:justify-end mr-10">
                @if (auth()->user()?->isAdmin())
                    <li class="mr-10 hover:text-[#606c38] hover:border-4 hover:border-b-[#606c38]"><a href="/admin" class=" p-3">Admin</a></li>
                @endif
                
                @auth
                    <li class="mr-10 hover:text-[#606c38] hover:border-4 hover:border-b-[#606c38]"><a href="/logout" class=" p-3"> <span> || {{ auth()->user()->name }} || </span> Logout</a></li>
                @else
                    <li class="mr-10 hover:text-[#606c38] hover:border-4 hover:border-b-[#606c38]"><a href="/login" class=" p-3">Log In</a></li>
                    <li class="mr-10 hover:text-[#606c38] hover:border-4 hover:border-b-[#606c38]"><a href="/register" class=" p-3">Sign Up</a></li>
                @endauth

            </div>
        </ul>
    </nav>

    @if (session()->has('success'))
    <div class="md:flex md:justify-center md:items-center">
        <p class="text-xs font-bold uppercase border border-green-700 rounded px-4 py-2">
            {{ session()->get('success')}}
        </p>
    </div>
    @elseif (session()->has('destroy'))
    <div class="md:flex md:justify-center md:items-center">
        <p class="text-xs font-bold uppercase border border-green-700 rounded px-4 py-2">
            {{ session()->get('destroy')}}
        </p>
    </div>
    @elseif (session()->has('error'))
    <div class="flex justify-center items-center bg-gray-100 w-full py-3">
        <p class="text-xs color-red-500 font-bold bg-white uppercase border border-red-700 rounded px-4 py-2">
            {{ session()->get('error') }}
        </p>
    </div>
    @endif

</header>
