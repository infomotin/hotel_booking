<div class="service-side-bar">

    @php 
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
    @endphp
    <div class="services-bar-widget">
        <h3 class="title">User Sidebar </h3>
        <div class="side-bar-categories">
            <img src="{{ !empty($user->photo) ? asset('upload/user_images/' . $user->photo) : asset('upload/no_image.jpg') }}" class="rounded mx-auto d-block" alt="Image" style="width:100px; height:100px;"> <br><br>
            <p class="text-center">{{ $user->name }}</p>
            <p class="text-center">{{ $user->email }}</p>
            <ul>

                <li>
                    <a href="{{ route('dashboard') }}">User Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('user.profile') }}">User Profile </a>
                </li>
                <li>
                    <a href="#">Change Password</a>
                </li>
                <li>
                    <a href="#">Booking Details </a>
                </li>
                <li>
                    <a href="{{ route('user.logout') }}">Logout </a>
                </li>
            </ul>
        </div>
    </div>


</div>