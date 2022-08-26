
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class=" mt-3 pb-3 mb-3">
    <a href="index3.html" style="text-decoration: none" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
</div>
 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
       
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="customer.php" class="nav-link <?= $page == 'customer.php' ? 'active':'' ?>">
               <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Customer
              </p>
            </a>
          </li>
          
            <li class="nav-item">
            <a href="quotation.php" class="nav-link <?= $page == 'quotation.php' ? 'active':'' ?>">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Quotation
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="sales.php" class="nav-link <?= $page == 'sales.php' ? 'active':'' ?>">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Sales
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report.php" class="nav-link <?= $page == 'report.php' ? 'active':'' ?>">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Report
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="setting.php" class="nav-link <?= $page == 'setting.php' ? 'active':'' ?>">
            <i class="nav-icon fas fa-gear"></i>
              <p>
              Setting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="terms.php" class="nav-link <?= $page == 'terms.php' ? 'active':'' ?>">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Terms And Condition
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="email.php" class="nav-link <?= $page == 'email.php' ? 'active':'' ?>">
            <i class="nav-icon fas fa-envelope"></i>
              <p>
                Email Configuration
              </p>
            </a>
          </li>

            </ul>
  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>