<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main Page</div>
                <a class="nav-link" href="{{ url('/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <!-- content -->
                <div class="sb-sidenav-menu-heading">Content</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    approve
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/deposite-approved')}}">Deposite</a>
                        <a class="nav-link" href="{{ url('/exchange-approved')}}">Exchange</a>
                        <a class="nav-link" href="{{ url('/withdraw-approved')}}">Withdraw</a>
                        <a class="nav-link" href="{{ url('/pool-approved')}}">Pool</a>
                        <a class="nav-link" href="{{ url('/proof-approved')}}">Proof Mission</a>
                    </nav>
                </div>
                <!-- End Approve -->

                <!-- log History -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Log History
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/profile')}}">History Exchange</a>
                        <a class="nav-link" href="{{ url('/profile')}}">History Deposite</a>
                        <a class="nav-link" href="{{ url('/history-refferal')}}">History Refferal</a>
                        <a class="nav-link" href="{{ url('/history-withdraw')}}">History Withdraw</a>
                    </nav>
                </div>
                <!-- End Log History -->
                <a class="nav-link" href="{{ url('/mission-list')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Mission
                </a>
                <!-- End Content -->

                <!-- user List -->
                <div class="sb-sidenav-menu-heading">User</div>
                <a class="nav-link" href="{{ url('/user-list')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    User List
                </a>
                <!-- user List -->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            TON ADMIN
    </nav>
</div>