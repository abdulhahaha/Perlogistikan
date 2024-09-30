<header>
    <div class="logo">Logo</div>
    <nav>
        <ul>
            <li><a href="/home">Home</a></li>
            <li>
                <a href="#">Inventory</a>
                <ul class="dropdown">
                    <li><a href="/inventory/inbound">Inbound</a></li>
                    <li><a href="/inventory/detail">Inventory Details</a></li>
                    <li><a href="/inventory/outbound">Outbound</a></li>
                </ul>
            </li>
            
            <!-- Dropdown Master -->
            <li>
                <a href="#">Master</a>
                <ul class="dropdown">
                    <li><a href="/master/location">Location Master</a></li>
                    <li><a href="/master/material">Material Master</a></li>
                    <li><a href="/master/shipper">Shipper Master</a></li>
                </ul>
            </li>
            
            <!-- Dropdown Movement -->
            <li>
                <a href="#">Movement</a>
                <ul class="dropdown">
                    <li><a href="/location-movement">Location Movement</a></li>
                    <li><a href="/pallet-movement">Pallet Movement</a></li>
                </ul>
            </li>
            
            <!-- Dropdown Count -->
            <li>
                <a href="#">Count</a>
                <ul class="dropdown">
                    <li><a href="/count/cycle">Cycle Count</a></li>
                    <li><a href="/count/founding">Founding Count</a></li>
                </ul>
            </li>
            
            <li><a href="/adjusment">Adjustment</a></li>
            
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @else
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <a href="/logout">Logout</a>
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
</header>
