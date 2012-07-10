<h2>Create a companies item</h2>

<!--<?php echo validation_errors(); ?>-->

<?php echo form_open('companies/create') ?>
<ul>
  <li>
  	<label for="name">name</label>
	<input type="input" name="name" value="<?php echo set_value('name'); ?>" />
	<?php echo form_error('name', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="streetline1">streetline1</label>
	<input type="input" name="streetline1" value="<?php echo set_value('streetline1'); ?>" />
	<?php echo form_error('streetline1', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="streetline2">streetline2</label>
	<input type="input" name="streetline2" value="<?php echo set_value('streetline2'); ?>" />
	<?php echo form_error('streetline2', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="zip">zip</label>
	<input type="input" name="zip" value="<?php echo set_value('zip'); ?>" />
	<?php echo form_error('zip', '<div class="error">', '</div>'); ?>
	</li>
  <li>
  	<label for="city">city</label>
	<input type="input" name="city"  value="<?php echo set_value('input'); ?>" />
	<?php echo form_error('input', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="telefon">telefon</label>
	<input type="input" name="telefon" value="<?php echo set_value('telefon'); ?>"  />
	<?php echo form_error('telefon', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="telefax">telefax</label>
	<input type="input" name="telefax" value="<?php echo set_value('telefax'); ?>" />
	<?php echo form_error('telefax', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="mobile">mobile</label>
	<input type="input" name="mobile" value="<?php echo set_value('mobile'); ?>" />
	<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="email">email</label>
	<input type="input" name="email" value="<?php  echo set_value('email');  ?>" />
	<?php echo form_error('email', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="website">website</label>
	<input type="input" name="website" value="<?php  echo set_value('website');  ?>" />
	<?php echo form_error('website', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="tags">tags</label>
	<input type="input" name="tags" value="<?php  echo set_value('tags');  ?>" />
	<?php echo form_error('tags', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="description">description</label>
	<textarea name="description" value="<?php  echo set_value('description');  ?>" ></textarea>
	<?php echo form_error('description', '<div class="error">', '</div>'); ?>
</li>
</ul>

<input type="button" name="back" onclick="location.href='/index.php/companies/'" value="Back" />
	<input type="submit" name="submit" value="Create" /> 
</form>