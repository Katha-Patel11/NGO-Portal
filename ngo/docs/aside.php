<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <?php
          if(isset($_SESSION['ngo_id']))
          {
        ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blog-form.php"><i class="icon fa fa-circle-o"></i> Blog Form</a></li>
            <li><a class="treeview-item" href="event-form.php"><i class="icon fa fa-circle-o"></i> Event Form</a></li>
            <li><a class="treeview-item" href="item-form.php"><i class="icon fa fa-circle-o"></i> Items Form</a></li>
            <li><a class="treeview-item" href="req-form.php"><i class="icon fa fa-circle-o"></i> Requirement Form</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blog-table.php"><i class="icon fa fa-circle-o"></i>  Blog Table</a></li>
            <li><a class="treeview-item" href="event-table.php"><i class="icon fa fa-circle-o"></i> Event Table</a></li>
            <li><a class="treeview-item" href="item-table.php"><i class="icon fa fa-circle-o"></i> Item Table</a></li>
            <li><a class="treeview-item" href="req-table.php"><i class="icon fa fa-circle-o"></i> Requirement Table</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">View</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="donation-table.php"><i class="icon fa fa-circle-o"></i> Donation</a></li>
            <li><a class="treeview-item" href="volunteer-table.php"><i class="icon fa fa-circle-o"></i>Volunteers</a></li>
            <li><a class="treeview-item" href="orders.php"><i class="icon fa fa-circle-o"></i>Orders</a></li>
            <li><a class="treeview-item" href="business-table.php"><i class="icon fa fa-circle-o"></i>Business Profile</a></li>
          </ul>
        </li>
      <?php 
        }
        else
        {
      ?>       
        <li><a class="app-menu__item" href="page-login.php"><i class="app-menu__icon fa fa-sign-in"></i><span class="app-menu__label">Login</span></a></li>
      </ul> 
      <?php } ?>
    </aside>