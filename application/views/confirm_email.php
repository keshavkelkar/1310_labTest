

<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('confirm_email_c', $attributes); ?>
<p>
        <label for="password">Password <span class="required">*</span></label>
        <?php echo form_error('password'); ?>
        <br /><input id="password" type="password" name="password" maxlength="40" value="<?php echo set_value('password'); ?>"  />
</p>

<p>
        <label for="">Confirm Password <span class="required">*</span></label>
        <?php echo form_error(''); ?>
        <br /><input id="" type="password" name="password_confirm" maxlength="40" value="<?php echo set_value('password_confirm'); ?>"  />
</p>

<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>

</body>
</html>