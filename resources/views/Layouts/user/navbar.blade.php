<!-- Bottom Navigation Bar -->
<nav class="navbar navbar-dark bg-secondary fixed-bottom">
    <div class="container-fluid d-flex justify-content-around">
        <a href="{{ route('dashboardTapCoin')}}" class="nav-link text-white text-center">
            <img src="{{ asset('icon/HomePage.svg') }}" alt="Home" style="width: 30px; height: 30px;">
            <div>Home</div>
        </a>
        <a href="{{ route('profileHistory')}}" class="nav-link text-white text-center">
            <img src="{{ asset('icon/ActivityHistory.svg') }}" alt="History" style="width: 30px; height: 30px;">
            <div>History</div>
        </a>
        <a href="{{ route('Deposit')}}" class="nav-link text-white text-center">
            <img src="{{ asset('icon/Wallet.svg') }}" alt="Deposite" style="width: 30px; height: 30px;">
            <div>Deposite</div>
        </a>
        <a href="{{ route('profileMission')}}" class="nav-link text-white text-center">
            <img src="{{ asset('icon/Mission.svg') }}" alt="Mission" style="width: 30px; height: 30px;">
            <div>Mission</div>
        </a>
        <a href="{{ route('profileSettings')}}" class="nav-link text-white text-center">
            <img src="{{ asset('icon/Settings.svg') }}" alt="Settings" style="width: 30px; height: 30px;">
            <div>Settings</div>
        </a>
    </div>
</nav>