<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
     <!-- Begin page --> 	
        <div id="wrapper">
            	<?php //include('side_menu.php')?>
<div class="content-page">
    <!-- Top Bar Start -->
    <div class="topbar">
        <nav class="navbar-custom">                  
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
                <li>
                    <div class="page-title-box">
                       <h4>Transport</h4>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Top Bar End -->
<hr>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card-box">									<div id="showData">
                            <div class="pull-right">
                                <button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('PackageCMS/transportAdd') ?>'"><i class="fa fa-plus"></i> Add Transport</button>
                            </div>
                            <table id="table2" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;" width="50">No.</th>
                                        <th style="text-align:center;">Transport Name</th>
                                        <th style="text-align:center;" width="100">Edit</th>
                                        <th style="text-align:center;" width="100">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
 <?php $n = 1; 
  $Transport =$this->Package_model->list_transportData();
    foreach ($Transport->result() AS $Data) {?>	
                                        <tr id="row<?php echo $Data->id ?>">
                                            <th style="text-align:center;" scope="row"><?php echo $n ?></th>
                                            <td><?php echo $Data->transport_name_en ?></td>
                                            <td style="text-align:center;" ><button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('PackageCMS/transportAdd/' . $Data->id) ?>'"><i class="icon-pencil"></i></button></td>
                                            <td style="text-align:center;"><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $Data->id ?>', 'tbl_transport_type')"><i class="icon-trash"></i></button></td>
                                        </tr>
                                    <?php $n++;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
              
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        <!--2018 © Highdmin. - Coderthemes.com-->
    </footer>

</div>
       