<div class="sidebar">
    <div class="logo"></div>
    <ul class="menu">
        <li class="active">
            <a href="{{route('admin_home')}}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{route('show_listings')}}">
                <i class="fas fa-list"></i>
                <span>Listings</span>
            </a>
        </li>
        <li>
            <a href="{{route('owners')}}">
                <i class="fa fa-male"></i>
                <span>Owners</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-question-circle"></i>
                <span>Leads/Inquiries</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-bar-chart"></i>
                <span>Analytics</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-credit-card-alt"></i>
                <span>Transactions</span>
            </a>
        </li>
        
        <li>
            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>

        <li class="logout">
            <a href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
        
        <li class="logout">
            <a href="{{ route('logout') }}" class="dropdown-item"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}>

                
                
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>



        
    </ul>
</div>