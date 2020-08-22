<?php include('includes/header.php')?>
<!-- start page container -->
<div class="page-container">
<?php include('includes/sidebar.php')?>
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
           
            <!-- start widget -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>product management</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group" wfd-id="183">
                                                <a href="add-product.php"><button id="addRow1" class="btn btn-info" wfd-id="431">
                                                    Add New <i class="fa fa-plus"></i>
                                                </button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                                                    data-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-print"></i> Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column"
                                            style="width: 100%" id="example4">
                                            <thead>
                                                <tr>
                                                    <th> #</th>
                                                    <th> Username </th>
                                                    <th> Email </th>
                                                    <th> Status </th>
                                                    <th> Joined </th>
                                                    <th> Username </th>
                                                    <th> Email </th>
                                                    <th> Status </th>
                                                    <th> Joined </th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>shuxer</td>
                                                    <td><a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a></td>
                                                    <td><span class="label label-sm label-success"> Approved </span></td>
                                                    <td> 12 Jan 2012 </td>
                                                    <td>shuxer</td>
                                                    <td><a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a></td>
                                                    <td><span class="label label-sm label-success"> Approved </span></td>
                                                    <td> 12 Jan 2012 </td>
                                                    
                                                    <td class="valigntop">
                                                    <a href="edit-product.php" class="btn btn-primary btn-xs">
																				<i class="fa fa-pencil"></i>
																			</a>
																			<button class="btn btn-danger btn-xs" wfd-id="272">
																				<i class="fa fa-trash-o "></i>
																			</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
    <?php include('includes/tools.php')?>
  
<!-- end page container -->
<?php include('includes/footer.php')?>