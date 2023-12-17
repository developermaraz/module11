<!-- Spinner Start -->
<div id="spinner"
    class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="/" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Store Keeper</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/" class="nav-item nav-link {{ '/' == request()->path() ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="/product/add" class="nav-item nav-link {{ 'product/add' == request()->path() ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Add Product</a>
            <a href="/products" class="nav-item nav-link {{ 'products' == request()->path() ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Products</a>
            <a href="/history" class="nav-item nav-link {{ 'history' == request()->path() ? 'active' : '' }}"><i class="fa fa-chart-bar me-2"></i>Sale Transaction</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
