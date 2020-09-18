<section class="navbar-side collapse navbar-collapse" id="navbarNav">
  <ul class="nav crunchy-navigation sidebar-menu">

    <!-- Dashboard -->
    <li>
      <a class="active-menu"  href=""><i class="fa fa-dashboard fa-3x"></i> Dashboard </a>
    </li>
    <!-- Dashboard -->

    <!-- Categories -->
    <li>
      <a  href="<?php echo URL_CATEGORIES_INDEX;?>"><i class="fa fa-bars fa-3x"></i> Categories </a>
    </li>
    <!-- Categories -->
    <!-- PRODUCTS -->
    <li>
      <a  href="<?php echo URL_PRODUCTS_INDEX;?>"><i class="fa fa-stack-exchange fa-3x"></i> Products </a>
    </li>
    <!-- PRODUCTS -->
    <!-- logout -->
    <li>
      <a  href="<?php echo LOGOUT;?>"><i class="fa fa-square-o fa-3x"></i> Logout </a>
    </li>
    <!-- logout -->
  </ul>
</section>

<script type="text/javascript" src="<?php echo SIDE_BAR_JS;?>"></script>
<script>
   $.sidebarMenu($('.sidebar-menu'))
</script>