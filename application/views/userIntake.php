<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $time_now=mktime(date('h')+4, date('i')+30);
    $today = date('h:i a',$time_now);
    echo $today;
?>

<?php include_once 'user_header.php';?>
<!DOCTYPE html>
<html lang="en">
<body>
    <?php if(($today > "00:00 AM") && ($today < "12:58 pm")){?>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Questionary
                </div>

                <div class="panel-body">
                <form role="form" method="post" action="<?php echo site_url("DietController/submitUserIntakeData"); ?>"> 
                    <div class="panel panel-danger">
					 <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">What is Your Profession?</div>
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="bf1" value="1"> School Teacher
                                        <input class="" type="checkbox" name="bf1" value="0"> Professor
										<input class="" type="checkbox" name="bf1" value="2"> Office Boy
                                                                                <br>
										<input class="" type="checkbox" name="bf1" value="3"> Agriculture
										<input class="" type="checkbox" name="bf1" value="4"> Mechanic
										<input class="" type="checkbox" name="bf1" value="5"> Factory Worker
                                                                                <br>
										<input class="" type="checkbox" name="bf1" value="6"> Driver 
										<input class="" type="checkbox" name="bf1" value="7"> Clinic Doctor
										<input class="" type="checkbox" name="bf1" value="8"> Surgeon
                                                                                <br>
										<input class="" type="checkbox" name="bf1" value="9>  Nurse Or Ward Boy
										<input class="" type="checkbox" name="bf1" value="10"> Construction Worker
										<input class="" type="checkbox" name="bf1" value="11"> Civil Engineer
                                                                                <br>
										<input class="" type="checkbox" name="bf1" value="12"> Software Engineer
										<input class="" type="checkbox" name="bf1" value="13"> Bank Service
						
										
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">Do Your Suffer from Any Of these Problems?</div>
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="bf1" value="1"> Diabetes
                                        <input class="" type="checkbox" name="bf1" value="0"> Blood Pressure
										<input class="" type="checkbox" name="bf1" value="2"> High Cholestrol
						
										
                                    </div>
                                </div>
                            </div>
                        </div>
						  <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">Do You consume Too much Junk Food?</div>
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="bf1" value="1"> Yes
                                        <input class="" type="checkbox" name="bf1" value="0"> No						
										
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">Do You consume atleast 3 ltrs of water per day?</div>
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="bf1" value="1"> Yes
                                        <input class="" type="checkbox" name="bf1" value="0"> No						
										
                                    </div>
                                </div>
                            </div>
                        </div>
						 <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group"> Do you exercise regularly?</div>
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="bf1" value="1"> Yes
                                        <input class="" type="checkbox" name="bf1" value="0"> No						
										
                                    </div>
                                </div>
                            </div>
                        </div>
						 <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">Do you have min 6hrs of sleep every day?</div>
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="bf1" value="1"> Yes
                                        <input class="" type="checkbox" name="bf1" value="0"> No						
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">Do you have problems with managing stress?</div>
                                    <div class="form-group">
                                        <input class="" type="checkbox" name="bf1" value="1"> Yes
                                        <input class="" type="checkbox" name="bf1" value="0"> No						
										
                                    </div>
                                </div>
                            </div>
                        </div>
                       

                    </div>
					
					 <div class="panel panel-danger">
                        <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">Do You Have Your Breakfast Daily?</div>
                                    <div class="form-group">
                                        <input class="" type="radio" name="bf1" value="1"> Yes
                                        <input class="" type="radio" name="bf1" value="0"> No
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">What does your daily breakfast consist of?</div>
                                    <div class="form-group">
                                        <?php foreach ($breakfast as $row) {?>
                                                <div class="from-group col-lg-3">
                                                    <input type="checkbox" name="bf_list[]" value="<?php echo $row ->itemname; ?>" > <?php echo $row ->itemname;?>
                                                </div>
                                             
                                                <div class="form-group col-lg-2">
                                                    <input type="number" min=0 max=5 name="qty" placeholder="Qty" required />
                                                </div>
                                                
                                        <?php } ?>       

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    </div>
					
					
                                
                    <div class="panel panel-danger">

                        <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <span>Do you have Your lunch daily?</span>
                                    <div class="">
                                        <input type="radio" name="lunch1" value="1"> Yes
                                        <input type="radio" name="lunch1" value="0"> No
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">What does your daily lunch consist of?</div>   
                                <div class="form-group">
                                        <?php foreach ($lunch as $row) {?>
                                                <div class="col-lg-4 form-group">
                                                    <input type="checkbox" name="lunch_list[]" value="<?php echo $row ->itemname; ?>" > <?php echo $row ->itemname;?>
                                                </div>
                                             
                                                <div class="col-lg-2">
                                                    <input type="number" min=0 max=5 name="qty" placeholder="Qty" required />
                                                </div>
                                                
                                        <?php } ?>       

                                    </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    </div>
                    <div class="panel panel-danger">
                        <div class="panel-body">
                            <div class="form-group ">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <span>Do you have your daily dinner?</span>
                                    <div class="">
                                        <input type="radio" name="Dinner1" value="1"/> Yes
                                        <input type="radio" name="Dinner1" value="0"/> No
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">What does your daily dinner consist of?</div>   
                                <div class="form-group col-lg-8">
                                        <?php foreach ($dinner as $row) {?>
                                                <div class="col-lg-4 form-group">
                                                    <input type="checkbox" name="Dinner_list[]" value="<?php echo $row ->itemname; ?>" > <?php echo $row ->itemname;?>
                                                </div>
                                             
                                                <div class="col-lg-2 form-group">
                                                    <input type="number" min=0 max=5 name="qty" placeholder="Qty" required />
                                                </div>
                                                
                                        <?php } ?>       

                                    </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                </div>


                    <div class="form-group">
                        <input class="btn btn-default" type="submit" name="submit" Value="Done">
                        <input class="btn btn-default" type="reset" Value="Close">
                        
                    </div>
                </form>
            </div>
                </div>
            </div>
						
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
	
	// popover demo
    $("[data-toggle=popover]")
        .popover()

    </script>

    
    <?php }else { ?>
           <div id="wrapper">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Please Come after 9 PM to fill all the details..
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
    
    <?php } ?>
</body>

</html>
