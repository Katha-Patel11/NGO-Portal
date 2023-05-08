<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <?php
          if(isset($_SESSION['admin_id']))
          {
        ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="admin-form.php"><i class="icon fa fa-circle-o"></i> Admin Form</a></li>
            <li><a class="treeview-item" href="area-form.php"><i class="icon fa fa-circle-o"></i> Area Form</a></li>
            <li><a class="treeview-item" href="blog-form.php"><i class="icon fa fa-circle-o"></i> Blog Form</a></li>
            <li><a class="treeview-item" href="business-form.php"><i class="icon fa fa-circle-o"></i> Business_profile Form</a></li>
            <!--<li><a class="treeview-item" href="cart.php"><i class="icon fa fa-circle-o"></i> Cart Form</a></li>-->
            <li><a class="treeview-item" href="city-form.php"><i class="icon fa fa-circle-o"></i> City Form</a></li>
            <!--<li><a class="treeview-item" href="donation-form.php"><i class="icon fa fa-circle-o"></i> Donation Form</a></li>-->
            <li><a class="treeview-item" href="event-form.php"><i class="icon fa fa-circle-o"></i> Event Form</a></li>
            <li><a class="treeview-item" href="feedback-form.php"><i class="icon fa fa-circle-o"></i> Feedback Form</a></li>
            <li><a class="treeview-item" href="item-form.php"><i class="icon fa fa-circle-o"></i> Items Form</a></li>
            <li><a class="treeview-item" href="item-cat-form.php"><i class="icon fa fa-circle-o"></i> Item Category Form</a></li>
            <li><a class="treeview-item" href="ngo-form.php"><i class="icon fa fa-circle-o"></i> NGO_Master Form</a></li>
            <!--<li><a class="treeview-item" href="order-master-form.php"><i class="icon fa fa-circle-o"></i> Order_Master Form</a></li>-->
            <!--<li><a class="treeview-item" href="order-details-form.php"><i class="icon fa fa-circle-o"></i> Order_Details Form</a></li>-->
            <!--<li><a class="treeview-item" href="req-form.php"><i class="icon fa fa-circle-o"></i> Requirement Form</a></li>-->
            <li><a class="treeview-item" href="sector-form.php"><i class="icon fa fa-circle-o"></i> Sector Form</a></li>
            <li><a class="treeview-item" href="user-form.php"><i class="icon fa fa-circle-o"></i> User Form</a></li>
            <li><a class="treeview-item" href="volunteer-form.php"><i class="icon fa fa-circle-o"></i> Volunteer Form</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="admin-table.php"><i class="icon fa fa-circle-o"></i> Admin Table</a></li>
            <li><a class="treeview-item" href="area-table.php"><i class="icon fa fa-circle-o"></i> Area Table</a></li>
            <li><a class="treeview-item" href="blog-table.php"><i class="icon fa fa-circle-o"></i>  Blog Table</a></li>
            <li><a class="treeview-item" href="business-table.php"><i class="icon fa fa-circle-o"></i> Business_profile Table</a></li>
            <li><a class="treeview-item" href="cart-table.php"><i class="icon fa fa-circle-o"></i> Cart Table</a></li>
            <li><a class="treeview-item" href="city-table.php"><i class="icon fa fa-circle-o"></i> City Table</a></li>
            <li><a class="treeview-item" href="donation-table.php"><i class="icon fa fa-circle-o"></i> Donation Table</a></li>
            <li><a class="treeview-item" href="event-table.php"><i class="icon fa fa-circle-o"></i> Event Table</a></li>
            <li><a class="treeview-item" href="feedback-table.php"><i class="icon fa fa-circle-o"></i> Feedback Table</a></li>
            <li><a class="treeview-item" href="item-table.php"><i class="icon fa fa-circle-o"></i> Item Table</a></li>
            <li><a class="treeview-item" href="item-cat-table.php"><i class="icon fa fa-circle-o"></i> Item Category Table</a></li>
            <li><a class="treeview-item" href="ngo-table.php"><i class="icon fa fa-circle-o"></i>  NGO_Master Table</a></li>
            <li><a class="treeview-item" href="order-master-table.php"><i class="icon fa fa-circle-o"></i> Order_Master Table</a></li>
            <li><a class="treeview-item" href="order-details-table.php"><i class="icon fa fa-circle-o"></i> Order_Details Table</a></li>
            <li><a class="treeview-item" href="req-table.php"><i class="icon fa fa-circle-o"></i> Requirement Table</a></li>
            <li><a class="treeview-item" href="sector-table.php"><i class="icon fa fa-circle-o"></i> Sector Tables</a></li>
            <li><a class="treeview-item" href="user-table.php"><i class="icon fa fa-circle-o"></i> User Tables</a></li>
            <li><a class="treeview-item" href="volunteer-table.php"><i class="icon fa fa-circle-o"></i> Volunteer Tables</a></li>
          </ul>
        </li>
        <?php 
        }
        else
        {
      ?> 
        <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="page-login.php"><i class="icon fa fa-circle-o"></i> Login </a></li>
        </li>
      </ul>
      <?php 
        } 
      ?>
    </aside>