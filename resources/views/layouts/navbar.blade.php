<aside>
    {{-- only logged in user can see --}}
    @user
        <div class=" list-group">
            <a href="{{ route('page.home') }}" class=" list-group-item list-group-item-action">Home</a>

        </div>
        <p class=" mt-3 my-2">Manage Inventory</p>
        <div class=" list-group">
            <a href="{{ route('dashboard.home') }}" class=" list-group-item list-group-item-action">Dashboard</a>

        </div>
        <p class=" mt-3 my-2">Manage Inventory</p>
        <div class=" list-group">
            <a href="{{ route('item.create') }}" class=" list-group-item list-group-item-action">Create Item</a>
            <a href="{{ route('item.index') }}" class=" list-group-item list-group-item-action">List Item</a>
        </div>
        <p class=" mt-3 my-2">Manage Category</p>
        <div class=" list-group">
            <a href="{{ route('category.create') }}" class=" list-group-item list-group-item-action">Create Category</a>
            <a href="{{ route('category.index') }}" class=" list-group-item list-group-item-action">List Category</a>
        </div>
        <p class=" mt-3 my-2">User Profile</p>
        <div class=" list-group">
            <a href="{{ route('category.create') }}" class=" list-group-item list-group-item-action">My Profile</a>
            <a href="{{ route('auth.passwordChangeUi') }}" class=" list-group-item list-group-item-action">Change Password</a>

        </div>
        <form action="{{ route('auth.logout') }}" method="post">
            @csrf
            <button class=" btn btn-danger d-block w-100 mt-3">Log out </button>
        </form>
    @enduser
    {{-- only logged out user can see --}}
    @notUser
        <p class=" mt-3 my-2"></p>
        <div class=" list-group">
            <a href="{{ route('auth.login') }}" class=" list-group-item list-group-item-action">Log in </a>
            <a href="{{ route('auth.register') }}" class=" list-group-item list-group-item-action">Register</a>
        </div>
    @endnotUser
</aside>
