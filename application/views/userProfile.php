<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include_once 'user_header.php';?>

<!DOCTYPE html>
<html lang="en">

<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cutlery fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Add Meal</div>
                                    <div>Update</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url("welcome/showIntake"); ?>">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="<?php echo site_url("welcome/showIntake"); ?>">Click Me to Add meal</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">My Health</div>
                                    <div>View & compare Chart!</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="<?php echo site_url("welcome/showIntake"); ?>">Click Me to view your Diet Status</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-question fa-fw"></i> Frequently Asked Questions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-pencil fa-fw"></i> Question 1
                                    <span class="pull-right text-muted small"><em>view</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     <i class="fa fa-pencil fa-fw"></i> Question 2
                                    <span class="pull-right text-muted small"><em>view</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     <i class="fa fa-pencilfa-eye fa-fw"></i> Question 3
                                    <span class="pull-right text-muted small"><em>view</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     <i class="fa fa-pencil fa-fw"></i> Question 4
                                    <span class="pull-right text-muted small"><em>view</em>
                                    </span>
									
                                </a>
							</div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					
                    <div class="container-fluid">
                      <div class="row-fluid">

                            <div class="span10">
                              <div class="row-fluid">
                                    <div id="demo" class="tab-pane fade in active">
                                            <iframe style="overflow:auto" name="demo_frame" id="demo_frame" frameborder="0" width="100%" height="500" src="about:blank"></iframe>
                                    </div>
                                    </div><!--/row-->
                            </div><!--/span-->


                      </div><!--/row-->

                        <!-- Le javascript
                        ================================================== -->
                        <!-- Placed at the end of the document so the pages load faster -->
                        <script src="<?php echo base_url(); ?>/js/jquery.js"></script>
                        <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
                        <script>

                                $('#grid-demo-tabs a').click(function (e) {
                                e.preventDefault();
                                $(this).tab('show');
                                })

                                var demo = location.href.split("#")[1];
                                if (!demo)
                                {
                                        demo = 'css/demos/basic/pie.php';
                                }

                                jQuery('#demo_frame').attr('src','<?php echo base_url(); ?>/'+demo);
                                jQuery('#demo_frame').load(function() { iframeLoaded(this); } );

                                jQuery('#code').load('index.php?file='+demo);

                                jQuery('#code').css('height', jQuery(window).height() - 286);

                                function iframeLoaded(iFrameID,stop) 
                                {
                                        if(iFrameID) 
                                        {
                                                iFrameID.height = "";
                                                if(iFrameID.contentDocument){
                                                        iFrameID.height = iFrameID.contentDocument.body.offsetHeight + 35 + "px";
                                                } else {
                                                        iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + 45 + "px";
                                                }

                                                // alert(parseInt(jQuery('#code').css('height')));
                                                // alert(parseInt(iFrameID.height));

                                                if (parseInt(jQuery('#code').css('height')) <= parseInt(iFrameID.height))
                                                        {jQuery('#code').css('height',iFrameID.height);}
                                                else
                                                        {jQuery('#code').css('height', jQuery(window).height() - 286);}
                                        }

                                        if (!stop)
                                                setTimeout(function(){iframeLoaded(iFrameID,1);},1000);
                                }

                                var accordion_list = $(".accordion-body");
                                accordion_list.first().addClass("in");
                        </script>

                </div><!--/.fluid-container-->

					
				</div>
                <!-- /.col-lg-8 -->
				<!-- Expert's Tips -->
                <div class="col-lg-4">
                    <div class="panel panel-yellow tooltip-demo">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Expert's Tips
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <?php
                                foreach($tips as $tip){
                                    echo "<a class='list-group-item' data-container='body' data-toggle='popover' data-placement='left' data-content='".$tip->tips."'>
                                        <i class='fa fa-comments-o fa-fw'></i>".$tip->d_fname." ".$tip->d_lname."
                                        <span class='pull-right text-muted small'><em>".$tip->timeoftip."</em>
                                        </span>
                                    </a>";
                                }
                                ?> 
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View older Tips</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    </script>

</body>

</html>
