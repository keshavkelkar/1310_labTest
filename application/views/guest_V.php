<?php // Change the css classes to suit your needs    
 ?>

<p>
        <label for="select_meal">Select Meal <span class="required">*</span></label>
        <?php echo form_error('select_meal'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('select_meal', $options, set_value('select_meal'))?>
</p>                                             
                        
<p>
        <label for="calories">Calories <span class="required">*</span></label>
        <?php echo form_error('calories'); ?>
        <br /><input id="calories" type="text" name="calories" maxlength="20" value="<?php echo set_value('calories'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
