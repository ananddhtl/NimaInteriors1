<div class="user-nav">
    <div class="user-image">
        <img src="{{ asset('frontend/assets/images/user-profile.png') }}" alt="">
    </div>
    <div class="user-detail-profile">
        <h6>{{ auth()->user()->fullname }}</h6>
        <p>{{ auth()->user()->email }}</p>
    </div>
    <ul>
        <li>
            <a href="{{ route_with_locale('dashboard') }}"> <i class="fa-solid fa-chevron-right"></i>User Information</a>
        </li>
        <li>
            <a href="{{ route_with_locale('password') }}"> <i class="fa-solid fa-chevron-right"></i> Change
                Password</a>
        </li>
        <li>
            <a href="{{ route_with_locale('orderhistory') }}"> <i class="fa-solid fa-chevron-right"></i> Your Order</a>
        </li>
        <li>
            <a href="{{ route_with_locale('addressbook') }}"> <i class="fa-solid fa-chevron-right"></i> Address Book</a>
        </li>
        <li>
            <a href="{{ route_with_locale('getwishlist') }}"> <i class="fa-solid fa-chevron-right"></i>Wish List</a>
        </li>
        <li>
            <form id="logout-form" action="{{ route_with_locale('customer.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-chevron-right"></i> Log Out
            </a>
        </li>
    </ul>
</div>
