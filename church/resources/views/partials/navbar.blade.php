<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Church Inventory Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('owned_items.index') }}">Inventory</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Departments</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('suppliers.index') }}">Suppliers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Customers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('donors.index') }}">Donors</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('donated_tos.index') }}">Recipients</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('barcode.scanner') }}">Barcode Scanner</a></li>
        </ul>
    </div>
</nav>
