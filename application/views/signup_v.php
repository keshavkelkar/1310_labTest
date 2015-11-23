<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('signup_c', $attributes); 
?>
<html>
	<head>
            <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bower_components/bootstrap/dist/css/calori.css" rel="stylesheet">
	
	</head>
        
<body>
<p>
        <label for="usertype">User Type <span class="required">*</span></label>
        <?php echo form_error('usertype'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(''  => 'Please Select',
                                'Patient'    => 'Patient',
                                'Doctor' => 'Doctor'
                            ); ?>

        <br /><?php echo form_dropdown('usertype', $options, set_value('usertype'))?>
</p>
<p>
        <label for="name">Name <span class="required">*</span></label>
        <?php echo form_error('name'); ?>
        <br /><input id="name" type="text" name="name" maxlength="50" value="<?php echo set_value('name'); ?>"  />
</p>

<p>
        <label for="user_id">Email ID <span class="required">*</span></label>
        <?php echo form_error('user_id'); ?>
        <br /><input id="user_id" type="text" name="user_id" maxlength="40" value="<?php echo set_value('user_id'); ?>"  />
</p>


<p>
        <label for="address">Address <span class="required">*</span></label>
        <?php echo form_error('address'); ?>
        <br /><input id="address" type="text" name="address" maxlength="80" value="<?php echo set_value('address'); ?>"  />
</p>

<p>
        <label for="gender">Gender <span class="required">*</span></label>
        <?php echo form_error('gen'); ?>
        <br />
            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
            <input id="gen" name="gender" type="radio" class="" value="Male" <?php echo $this->form_validation->set_radio('gen', 'option1'); ?> />
            <label for="gender" class="">Male</label>

            <input id="gen" name="gender" type="radio" class="" value="Female" <?php echo $this->form_validation->set_radio('gen', 'option2'); ?> />
            <label for="gender" class="">Female</label>
</p>


<p>
        <label for="contact_no">Contact No <span class="required">*</span></label>
        <?php echo form_error('contact_no'); ?>
        <br /><input id="contact_no" type="text" name="contact_no" maxlength="11" value="<?php echo set_value('contact_no'); ?>"  />
</p>

<p>
        <label for="weight">Weight <span class="required">*</span></label>
        <?php echo form_error('weight'); ?>
        <br /><input id="weight" type="text" name="weight" onkeyup="isNumberKey(this.id)"/>
        <select name="wtype" id="wtype">
            <option value="kg">Kg</option><option value="pounds">Pounds</option>
        </select>
</p>

<p>
        <label for="height">Height <span class="required">*</span></label>
        <select style='width:50%;' name="foot" id="foot" onchange="hcon()">
						<option value="1">1'</option><option value="2">2'</option>
						<option value="3">3'</option><option value="4">4'</option>
						<option value="5">5'</option><option value="6">6'</option>
						<option value="7">7'</option>
					</select>
					<select style='width:40%;' name="inch" id="inch" onchange="hcon()">
						<option value="1">1"</option><option value="2">2"</option>
						<option value="3">3"</option><option value="4">4"</option>
						<option value="5">5"</option><option value="6">6"</option>
						<option value="7">7"</option><option value="8">8"</option>
						<option value="9">9"</option><option value="10">10"</option>
						<option value="11">11"</option>
					</select>
        <?php echo form_error('height'); ?>
        <br /><input id="cen" type="text" name="cen" size="4" onkeyup="con(cen)" />
</p>

<p>
        <label for="age">Age <span class="required">*</span></label>
        <?php echo form_error('age'); ?>
        <br /><input id="age" type="text" name="age" maxlength="3" onkeypress="return cknum(event,age)">
</p>
<p>
    <select style='width:100px;' name="loa" id="loa">
        <option value="1">Sedentary</option><option value="2">Light Active</option>
        <option value="3">Moderately Active</option><option value="4">Very Active</option>
        <option value="5">Extra Active</option>
   </select>
</p>

<p>
    <input class='blue_button' type="button" value="Calculate The Calorie" onclick="cc()">
</p>
    
 <p>     
    <table align="center" border="0" class="frms noborders">
		<caption><b>Calorie Result</b></caption>
		<tr>
			<td align="right" style="color: #3D366F; font-size:13px;">Calorie Needed:</td>
			<td>
				<input type="text" id="rc" name="rc" style="font-size:13px;" size="15">
			</td>
			<td><select name="caltype" id="caltype" onChange="convert()">
				<option value="g">Grams</option>
				<option value="kg">Kilograms</option>
				<option value="pounds">Pounds</option>
				</select>
			</td>
		</tr>
		</table>
		<div>You Must Intake The Following Daily</div>
		<table class="frms noborders">
			<tr>
				<td style="color: #3D366F; font-size:13px;">Fat:</td>
				<td style="color: #3D366F; font-size:13px;">
					<input type="text" id="rf" name="rf" style="font-size:13px;" size="10" readonly>
				</td>
				<td>
					<font color="#3D366F" size="2" style='float:right'>
					<label id="l1"></label> per day</font>
				</td>
				</tr>
				<tr>
					<td style="color: #3D366F; font-size:13px;">Protein:</td>
					<td style="color: #3D366F; font-size:13px;"><input type="text" id="rp" name="rp" style="font-size:13px;" size="10" readonly></td>
					<td><font color="#3D366F" size="2" style='float:right'><label id="l2"></label> per day</font></td>
				</tr>
				<tr>
					<td style="color: #3D366F; font-size:13px;">Carbohydrate:</td>
					<td style="color: #3D366F; font-size:13px;">
						<input type="text" id="rh" name="rh" style="font-size:13px;" size="10" readonly>
					</td>
					<td>
						<font color="#3D366F" size="2" style='float:right'>
						<label id="l3"></label> per day</font>
					</td>
				</tr>
				
			</table>
		
</p>
<?php echo form_submit( 'submit', 'Submit'); ?>
	<!-- calories JavaScript -->
    <script src="<?php echo base_url(); ?>css/bower_components/bootstrap/dist/js/calori.js"></script>
</body>
</html>