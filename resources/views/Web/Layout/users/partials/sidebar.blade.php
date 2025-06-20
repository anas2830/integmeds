<div class="sidebar-wrap">
    <div class="sdbar-profile-ph">
        <img class="img-fluid" src="{{asset('web_assets/images/bg/profile-photo.png')}}" alt="" title="">
        <h5>Arshaful Islam</h5>
    </div>
    <ul class="sidebar">
        <li class="active"><a href="{{route('user.dashboard')}}"><i class="bx bxs-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ route('user.orders') }}"><i class="bx bx-cart"></i>Order</a></li>
        <li><a href="{{ route('user.account') }}"><i class="bx bx-user"></i>Account details</a></li>
        <li><a href="{{ route('user.address') }}"><i class="bx bx-home"></i>Address</a></li>
        <li><a href="{{ route('user.change-password') }}"> <i class="bx bx-lock-alt"></i>Change Password</a></li>
        <li><a href="{{ route('user.wishlist') }}"> <i class="bx bx-file"></i>Wishlist</a></li>
        <li><a href="{{ route('user.logout') }}" ><i class="bx bx-log-out-circle"></i>Logout</a></li>
    </ul>
</div>