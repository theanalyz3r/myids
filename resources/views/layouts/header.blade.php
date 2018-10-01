<header class="z-0 header flex justify-between align-items items-center text-center">    
    {{-- left-side --}}
    <div class="flex items-center md:w-1/6 w-1/2 p-2 h-full">
        <img class="flex-1" src="/storage/images/header-logo.svg">
    </div>

    {{-- right-side --}}
    <div class="avatar flex items-center md:w-1/6 w-1/2 p-2 h-full">
        <img src="/storage/images/avatar-placeholder.svg">
        @if(Auth::check())
        <div class="flex-col flex-1">
            <a class="flex-1 block justify-end text-white no-underline" href="/profiles/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
            <a class="flex-1 mt-2 block justify-end text-xs uppercase text-white no-underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        @else
            <a class="flex-1 uppercase justify-end text-white no-underline" href="{{ route('login') }}">Login</a>
        @endif
    </div>
</header>

<nav-menu></nav-menu>