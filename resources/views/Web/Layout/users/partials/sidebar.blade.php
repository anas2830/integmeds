<div class="sidebar-wrap">
    <div class="sdbar-profile-ph">
        <img class="img-fluid" 
            @if($user->profile_image)
                src="{{ asset($user->profile_image) }}"
            @else
                src="{{asset('web_assets/images/bg/profile-photo.png')}}"
            @endif
        alt="" title="">
        <h5>{{ $user->name ?? 'John Doe' }}</h5>
    </div>
    <ul class="sidebar">
        <li class="active"><a href="{{route('user.dashboard')}}"><i class="bx bxs-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ route('user.orders') }}"><i class="bx bx-cart"></i>Order</a></li>
        <li><a href="{{ route('user.account') }}"><i class="bx bx-user"></i>Account details</a></li>
        <li><a href="{{ route('user.address') }}"><i class="bx bx-home"></i>Address</a></li>
        <li><a href="{{ route('user.change-password') }}"> <i class="bx bx-lock-alt"></i>Change Password</a></li>
        <li><a href="{{ route('user.wishlist') }}"> <i class="bx bx-file"></i>Wishlist</a></li>
        <li>
            <form action="{{ route('user.logout') }}" method="post">
                @csrf
                <button type="submit" class="btn">
                    <i class="bx bx-file"></i>Logout
                </button>
            </form>
        </li>
    </ul>
</div>