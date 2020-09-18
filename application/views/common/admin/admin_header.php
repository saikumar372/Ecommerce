<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin</title>

    <link href="<?php echo ORANGE_BOOSTRAP_CSS ;?>" rel="stylesheet">
    <link href="<?php echo ORANGE_STYLE_CSS; ?>" rel="stylesheet">
    <link href="<?php echo ORANGE_FONT_CSS;?>" rel="stylesheet">
    <link href="<?php echo ORANGE_CUSTOME_CSS;?>" rel="stylesheet">
    <link href="<?php echo CSS_UI_CSS;?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>"></script>

    <script src="<?php echo JS_UI_VALIDATE;?>"></script>
    <script type="text/javascript" src="<?php echo JS_VALIDATE;?>"></script>

<!-- <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css"> -->
</head>
<body>
    <div id="wrapper">
         <nav class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">
          <a class="navbar-brand" href="">
            <!-- <img src=""  alt="logo" class="img-responsive"/> -->
            <span>Ecommerce</span>
          </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="display: none;">
         <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>


            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div> -->
            <!--End of the search bar-->

            <!-- <div>  -->
             <ul class="nav navbar-nav navbar-right">
                <li class="crungh-logout dropdown clearfix">
                  <a href="#" class="dropdown-toggle avatar crunch-profile-log" data-toggle="dropdown">
                    <span>
                        Admin
                    </span>
                    <img src=""></a>
                    
                    <!-- <ul class="dropdown-menu">
                        <li class="m_2"><a href=""><i class="fa fa-user"></i>Profile</a></li>
                    </ul> -->
                </li>
             </ul>
          
            <!-- </div> -->

            </nav>   
<?php if(!empty($css_js_files) && in_array('data_tables', $css_js_files)) { ?>

    <link href="<?php echo DATATABLE_BOOSTRAP_CSS;?>" rel="stylesheet" />

<script type="text/javascript"  src="<?php echo DATATABLE_JS;?>"></script> 
<script type="text/javascript"  src="<?php echo DATATABLE_BOOSTRAP_JS ;?>"></script>
<script type="text/javascript"  src="<?php echo DATATABLE_DATATABLE_JS;?>"></script> 

<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  <?php if(!empty($ajaxrequest["url"])) { ?>
    get_tableData('table_id','<?php echo $ajaxrequest["url"];?>','<?php if(!empty($ajaxrequest["conditions"])) echo $ajaxrequest["conditions"]; ?>','<?php if(!empty($ajaxrequest["disablesorting"])) echo $ajaxrequest["disablesorting"]; ?>',[[ 0, "desc" ]],'<?php if(!empty($ajaxrequest["type"])) echo $ajaxrequest["type"];?>');
  <?php } else { ?>
  $('#table_id').dataTable();
  <?php } ?>
});
</script>
<!--DATATABLES-->
 <?php } ?>

 <script type="text/javascript">
   $(document).on('click','a.close',function (e) {
      $(this).parent('div').fadeOut();
    });
 </script>