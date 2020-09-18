<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
                    <a title="Add rcord" class="btn btn-primary btn-xs pull-right" href="<?php echo URL_ADD_PRODUCTS;?>"><i class="fa fa-plus"></i> </a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <b><?php echo $pagetitle;?></b>
                        </div>
                        <div class="panel-body">
            <?php echo $this->session->flashdata('message'); ?>

             <div class="table-responsive">
                <table id="table_id" 

class="table table-condensed table-striped table-hover">
    <thead>
        <tr>
            <th>#
            </th>
            <th>Product Image
            </th>
            <th>Product Name
            </th>
            <th>Category
            </th>
            <th>Product Cost
            </th>
            <th>Status
            </th>
            <th>Action
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <tr>
            <th>#
            </th>
            <th>Product Image
            </th>
            <th>Product Name
            </th>
            <th>Category
            </th>
            <th>Product Cost
            </th>
            <th>Status
            </th>
            <th>Action
            </th>
        </tr>
    </tfoot>
</table>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
<!-- <script type="text/javascript">
    $(document).ready(function () {
        $('#table_id').dataTable();
    });
</script> -->

