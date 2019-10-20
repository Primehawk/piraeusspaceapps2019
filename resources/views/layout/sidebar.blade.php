<div class="sidebar-wrapper">
    <li class="sidebar-title">
        <a href="/"><img class="header-logo" src="{{URL::asset('/media/logo/University of West Attica.png')}}"></a>
        <span>Climate Change Monitoring & Evaluation Platform</span>
    </li>
    @guest
        <li>
            <a href="{{ route('login') }}"> <span>{{ __('Login') }} </span></a>
        </li>
        <li>
            <a href="{{ route('register') }}"> <span> {{ __('Register') }} </span></a>
        </li>
        <li>
            <a href="/Contact">{!! config('svg-icons.contact')  !!}<span>Contact</span></a>
        </li>
    @else
        <li>

            <a href="/Dashboard">{!! config('svg-icons.home')  !!}<span>Dashboard</span></a>
        </li>
        <li>
            <a href="/Nodes">{!! config('svg-icons.nodes')  !!}<span>Nodes</span></a>
        </li>
        <li>
            <a href="/API-Management">{!! config('svg-icons.api-management')  !!}<span>API</span></a>
        </li>
        <li>
            <a href="{{ route('logout') }}">{!! config('svg-icons.logout')  !!}<span>{{ __('Logout') }} </span></a>
        </li>
    @endguest
</div>
