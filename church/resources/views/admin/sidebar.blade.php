<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="{{ url('/redirect') }}"><img src="admin/assets/images/faces/sda3.png" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="{{ url('/redirect') }}"><img src="admin/assets/images/faces/sda4.png" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark square-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark square-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark square-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>

    <li class="nav-item menu-items {{ request()->is('/redirect') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/redirected') }}">
            <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('view_members') || request()->is('see_members') || request()->is('update_member/*')? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="{{ request()->is('view_members') || request()->is('see_members') ? 'true' : 'false' }}" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="fa-solid fa-users fa-3x"></i>
        </span>
        <span class="menu-title">Manage Members</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ request()->is('view_members') || request()->is('see_members') ? 'show' : '' }}" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ request()->is('view_members') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('view_members') }}">
              <i class="fa-solid fa-user"></i>&nbsp;Register Members
            </a>
          </li>

          <li class="nav-item {{ request()->is('see_members') || request()->is('update_member/*')? 'active' : '' }}">
            <a class="nav-link" href="{{ url('see_members') }}">
              <i class="fa-solid fa-eye"></i>&nbsp;View Members
            </a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items {{ request()->is('view_department') || request()->is('show_department') || request()->is('update_department/*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#department" aria-expanded="{{ request()->is('view_department') || request()->is('show_department') || request()->is('update_department/*') ? 'true' : 'false' }}" aria-controls="department">
        <span class="menu-icon">
          <i class="fa-solid fa-building"></i>
        </span>
        <span class="menu-title">Departments</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ request()->is('view_departments') || request()->is('show_department') || request()->is('update_department/*') ? 'show' : '' }}" id="department">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ request()->is('show_departments') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_departments') }}"
                  <i class="fa-solid fa-wrench"></>&nbsp; Manage Departments
              </a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items {{ request()->is('view_inventory') || request()->is('show_inventory') || request()->is('update_inventory/*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="{{ request()->is('view_inventory') || request()->is('show_inventory') || request()->is('update_inventory/*') ? 'true' : 'false' }}" aria-controls="auth">
        <span class="menu-icon">
          <i class="fa-solid fa-warehouse"></i>
        </span>
        <span class="menu-title">Inventory</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ request()->is('view_inventory') || request()->is('show_inventory') || request()->is('update_inventory/*') ? 'show' : '' }}" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ request()->is('show_dashboard') || request()->is('view_dashboard/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('show_dashboard') }}">
              <i class="fa-solid fa-dashboard"></i>&nbsp;Inventory Dashboard
            </a>
          </li>
          <li class="nav-item {{ request()->is('show_inventory') || request()->is('update_inventory/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('show_inventory') }}">
              <i class="fa-solid fa-list"></i>&nbsp;Inventory List
            </a>
          </li>
          <li class="nav-item {{ request()->is('show_suppliers') || request()->is('view_suppliers/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_suppliers') }}">
                  <i class="fa-solid fa-boxes-stacked"></i>&nbsp;Suppliers
              </a>
          </li>
          <li class="nav-item {{ request()->is('show_customers') || request()->is('view_customers/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_customers') }}">
                  <i class="fa-solid fa-users"></i>&nbsp;Customers
              </a>
          </li>
          <li class="nav-item {{ request()->is('show_donors') || request()->is('view_donors/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_donors') }}">
                  <i class="fa-solid fa-hand-holding-heart"></i>&nbsp;Donors
              </a>
          </li>
          <li class="nav-item {{ request()->is('show_recipients') || request()->is('view_recipients/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_recipients') }}">
                  <i class="fa-solid fa-gift"></i>&nbsp;Recipients
              </a>
          </li>
          <li class="nav-item {{ request()->is('show_categories') || request()->is('view_categories/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_categories') }}">
                  <i class="fa-solid fa-tags"></i>&nbsp;Manage Categories
              </a>
          </li>
          <li class="nav-item {{ request()->is('show_barcode') || request()->is('view_barcode/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_barcode') }}">
                  <i class="fa-solid fa-barcode"></i>&nbsp;Scan Barcode
              </a>
          </li>
          <li class="nav-item {{ request()->is('show_qr_code') || request()->is('view_qrcode/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_qrcode') }}">
                  <i class="fa-solid fa-qrcode"></i>&nbsp;Scan QR Code
              </a>
          </li>
          <li class="nav-item {{ request()->is('show_report') || request()->is('view_report/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('show_report') }}">
                  <i class="fa-solid fa-list"></i>&nbsp;Reports
              </a>
          </li>
        </ul>
      </div>
    </li>

     <li class="nav-item menu-items {{ request()->is('time_management') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('time_management') }}">
        <span class="menu-icon">
        <i class="fa-solid fa-clock fa-10x"></i>
        </span>
        <span class="menu-title">Time Management</span>
      </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('view_givings') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('view_givings') }}">
        <span class="menu-icon">
            <i class="fa-solid fa-sack-dollar"></i>
        </span>
        <span class="menu-title">Givings</span>
      </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('see_users') || request()->is('update_user/*')? 'active' : '' }}">
        <a class="nav-link" href="{{ url('see_users') }}">
          <span class="menu-icon">
              <i class="fa-solid fa-user"></i>
          </span>
          <span class="menu-title">Users</span>
        </a>
      </li>

    <li class="nav-item menu-items {{ request()->is('add_strategicplan') || request()->is('update_strategicplan/*')? 'active' : '' }}">
      <a class="nav-link" href="{{ url('add_strategicplan') }}">
        <span class="menu-icon">
        <i class="fa-solid fa-briefcase"></i>
        </span>
        <span class="menu-title">Strategic Planning</span>
      </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('add_employee') || request()->is('update_humanresource/*')? 'active' : '' }}">
      <a class="nav-link" href="{{ url('add_employee') }}">
        <span class="menu-icon">
        <i class="fa-solid fa-users-viewfinder"></i>
        </span>
        <span class="menu-title">Human Resource</span>
      </a>
    </li>

  </ul>
</nav>


