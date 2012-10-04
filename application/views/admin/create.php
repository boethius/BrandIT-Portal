

  <div id="admin_create">
<h2>Firma registrieren</h2>
<p>Lieber Mitarbeiter, Hier kannst du eine Neue Firma erstellen. </p>
<!--<?php echo validation_errors(); ?>-->

<?php echo form_open_multipart('admin/create'); ?>
<ul class="companyForm">
  <li>
  	<label for="name"><?=$i18n->get_value("name")?></label>

	<input type="input" name="name" value="<?php echo set_value('name'); ?>" />
	<?php echo form_error('name', '<div class="error">', '</div>'); ?>
  </li>
  <li>


  	<label for="streetline1"><?=$i18n->get_value("streetline1")?></label>

	<input type="input" name="streetline1" value="<?php echo set_value('streetline1'); ?>" />
	<?php echo form_error('streetline1', '<div class="error">', '</div>'); ?>
  </li>
  <li>
	<label for="streetline2"><?=$i18n->get_value("streetline2")?></label>
	<input type="input" name="streetline2" value="<?php echo set_value('streetline2'); ?>" />
	<?php echo form_error('streetline2', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="zip"><?=$i18n->get_value("zip")?></label>

	<input type="input" name="zip" value="<?php echo set_value('zip'); ?>" />
	<?php echo form_error('zip', '<div class="error">', '</div>'); ?>
	</li>
  <li>
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

	<input type="input" name="telefon" value="<?php echo set_value('telefon'); ?>"  />
	<?php echo form_error('telefon', '<div class="error">', '</div>'); ?>
  </li>
  <li>

  	<label for="telefax"><?=$i18n->get_value("telefax")?></label>

	<input type="input" name="telefax" value="<?php echo set_value('telefax'); ?>" />
	<?php echo form_error('telefax', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="mobile"><?=$i18n->get_value("mobile")?></label>

	<input type="input" name="mobile" value="<?php echo set_value('mobile'); ?>" />
	<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="email"><?=$i18n->get_value("email")?></label>

	<input type="input" name="email" value="<?php  echo set_value('email');  ?>" />
	<?php echo form_error('email', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="website"><?=$i18n->get_value("website")?></label>

	<input type="input" name="website" value="<?php  echo set_value('website');  ?>" />
	<?php echo form_error('website', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="tags"><?=$i18n->get_value("tags")?></label>
	<input type="input" name="tags" value="<?php  echo set_value('tags');  ?>" />
	<?php echo form_error('tags', '<div class="error">', '</div>'); ?>
  </li>
  <li>
  	<label for="description"><?=$i18n->get_value("description")?></label>
	<textarea name="description" ><?php  echo set_value('description');  ?></textarea>

	<?php echo form_error('description', '<div class="error">', '</div>'); ?>
</li>
<li>
	<label for="upload">Firmen Logo</label>	
	<input type="file" name="userfile" /> 
</li>
</ul>

<input type="button" name="back" onclick="location.href='/index.php/companies/'" value="<?=$i18n->get_value("back")?>" />
	<input type="submit" name="submit" value="<?=$i18n->get_value("create")?>" /> 
</form>


</div>
