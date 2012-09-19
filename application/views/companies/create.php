
<<<<<<< HEAD
<!--<?php echo validation_errors(); ?>-->

<?php echo form_open('companies/create') ?>
<ul>
  <li>
  	<label for="name">name</label>
=======
  <div id="content">
<h2>Firma registrieren</h2>

<!--<?php echo validation_errors(); ?>-->

<?php echo form_open('companies/create') ?>
<ul class="companyForm">
  <li>
  	<label for="name"><?=$i18n->get_value("name")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="name" value="<?php echo set_value('name'); ?>" />
	<?php echo form_error('name', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="streetline1">streetline1</label>
=======
  	<label for="streetline1"><?=$i18n->get_value("streetline1")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="streetline1" value="<?php echo set_value('streetline1'); ?>" />
	<?php echo form_error('streetline1', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="streetline2">streetline2</label>
=======
  	<label for="streetline2"><?=$i18n->get_value("streetline2")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="streetline2" value="<?php echo set_value('streetline2'); ?>" />
	<?php echo form_error('streetline2', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="zip">zip</label>
=======
  	<label for="zip"><?=$i18n->get_value("zip")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="zip" value="<?php echo set_value('zip'); ?>" />
	<?php echo form_error('zip', '<div class="error">', '</div>'); ?>
	</li>
  <li>
<<<<<<< HEAD
  	<label for="city">city</label>
	<input type="input" name="city"  value="<?php echo set_value('input'); ?>" />
	<?php echo form_error('input', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="telefon">telefon</label>
=======
  	<label for="city"><?=$i18n->get_value("city")?></label>
	<input type="input" name="city"  value="<?php echo set_value('city'); ?>" />
	<?php echo form_error('city', '<div class="error">', '</div>'); ?>
  </li>
  <li><label for="region"><?=$i18n->get_value("region")?></label>
	<select name="region" id="region">
		<?php foreach ($regions as $region): ?>
		<option value="<?=$region['id']?>"><?=$i18n->get_value($region['region_name'])?></option>
		<?php endforeach ?>
	</select></li>
  <li>
  	<label for="telefon"><?=$i18n->get_value("telefon")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="telefon" value="<?php echo set_value('telefon'); ?>"  />
	<?php echo form_error('telefon', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="telefax">telefax</label>
=======
  	<label for="telefax"><?=$i18n->get_value("telefax")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="telefax" value="<?php echo set_value('telefax'); ?>" />
	<?php echo form_error('telefax', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="mobile">mobile</label>
=======
  	<label for="mobile"><?=$i18n->get_value("mobile")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="mobile" value="<?php echo set_value('mobile'); ?>" />
	<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="email">email</label>
=======
  	<label for="email"><?=$i18n->get_value("email")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="email" value="<?php  echo set_value('email');  ?>" />
	<?php echo form_error('email', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="website">website</label>
=======
  	<label for="website"><?=$i18n->get_value("website")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="website" value="<?php  echo set_value('website');  ?>" />
	<?php echo form_error('website', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="tags">tags</label>
=======
  	<label for="tags"><?=$i18n->get_value("tags")?></label>
>>>>>>> Regions-Feature
	<input type="input" name="tags" value="<?php  echo set_value('tags');  ?>" />
	<?php echo form_error('tags', '<div class="error">', '</div>'); ?>
  </li>
  <li>
<<<<<<< HEAD
  	<label for="description">description</label>
	<textarea name="description" value="<?php  echo set_value('description');  ?>" ></textarea>
=======
  	<label for="description"><?=$i18n->get_value("description")?></label>
	<textarea name="description" ><?php  echo set_value('description');  ?></textarea>
>>>>>>> Regions-Feature
	<?php echo form_error('description', '<div class="error">', '</div>'); ?>
</li>
</ul>

<input type="button" name="back" onclick="location.href='/index.php/companies/'" value="<?=$i18n->get_value("back")?>" />
	<input type="submit" name="submit" value="<?=$i18n->get_value("create")?>" /> 
</form>

</div>
