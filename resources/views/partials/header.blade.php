@php
    $text = langData();
@endphp

<header>
    <div class="logo">Logo</div>
    <nav>
        <ul>
            <li><a href="/home">{{ $text['home'] ?? 'Home' }}</a></li>
            <li>
                <a href="#">{{ $text['inventory'] ?? 'Inventory' }}</a>
                <ul class="dropdown">
                    <li><a href="/inventory/inbound">{{ $text['inbound'] ?? 'Inbound' }}</a></li>
                    <li><a href="/inventory/detail">{{ $text['detail'] ?? 'Detail' }}</a></li>
                    <li><a href="/inventory/outbound">{{ $text['outbound'] ?? 'Outbound' }}</a></li>
                </ul>
            </li>
            <li>
                <a href="#">{{ $text['master'] ?? 'Master' }}</a>
                <ul class="dropdown">
                    <li><a href="/master/location">{{ $text['location_master'] ?? 'Location Master' }}</a></li>
                    <li><a href="/master/material">{{ $text['material_master'] ?? 'Material Master' }}</a></li>
                    <li><a href="/master/shipper">{{ $text['shipper_master'] ?? 'Shipper Master' }}</a></li>
                </ul>
            </li>
            <li>
                <a href="#">{{ $text['movement'] ?? 'Movement' }}</a>
                <ul class="dropdown">
                    <li><a href="/location-movement">{{ $text['location_mov'] ?? 'Location Movement' }}</a></li>
                    <li><a href="/pallet-movement">{{ $text['pallet_mov'] ?? 'Pallet Movement' }}</a></li>
                </ul>
            </li>
            <li><a href="/count">{{ $text['count'] ?? 'Count' }}</a></li>
            <li><a href="/adjusment">{{ $text['adjusment'] ?? 'Adjusment' }}</a></li>
            <li>
                <a href="#">{{ $text['language'] ?? 'Language' }}</a>
                <ul class="dropdown">
                    <li><a href="{{ route('locale', ['locale' => 'id']) }}">Indonesia</a></li>
                    <li><a href="{{ route('locale', ['locale' => 'en']) }}">English</a></li>
                </ul>
            </li>
            @guest
                <li><a href="{{ route('login') }}">{{ $text['login'] ?? 'Login' }}</a></li>
            @else
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <a href="/logout">{{ $text['logout'] ?? 'Logout' }}</a>
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
</header>
