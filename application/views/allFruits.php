<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include_once 'user_header.php';?>

<!DOCTYPE html>
<html lang="en">


<body>

    <div id="wrapper">

       
        <div id="page-wrapper">
		<div class="panel-heading">
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sources of Nutrients
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Calories</th>
                                            <th>Carbs</th>
                                            <th>Fats</th>
                                            <th>Protein</th>
                                            <th>Favorite</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach($food as $foods) { ?>
                                                <tr class="odd gradeX">
                                                <td><i class="fa fa-tasks fa-fw"></i></td>
                                                <td><?php echo $foods->itemname;?></td>
                                                <td class="center"><?php echo $foods->Calories;?></td>
                                                <td class="center"><?php echo $foods->Carbs;?></td>
                                                <td class="center"><?php echo $foods->Fat;?></td>
                                                <td class="center"><?php echo $foods->Protein;?></td>
                                                <td class="center"><i class="fa fa-star fa-fw"></i></td>
                                        </tr>        
                                           <?php }     ?>        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
				<!-- /.row -->
			
			</div>
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>css/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>css/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>css/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>

