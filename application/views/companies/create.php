<h2>Create a companies item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('companies/create') ?>
<ul>
  <li><label for="name">name</label>
<input type="input" name="name" /></li>
  <li><label for="streetline1">streetline1</label>
<input type="input" name="streetline1" /></li>
  <li><label for="streetline2">streetline2</label>
<input type="input" name="streetline2" /></li>
  <li><label for="zip">zip</label>
<input type="input" name="zip" /></li>
  <li><label for="city">city</label>
<input type="input" name="city" /></li>
  <li><label for="telefon">telefon</label>
<input type="input" name="telefon" /></li>
  <li><label for="telefax">telefax</label>
<input type="input" name="telefax" /></li>
  <li><label for="mobile">mobile</label>
<input type="input" name="mobile" /></li>
  <li><label for="email">email</label>
<input type="input" name="email" /></li>
  <li><label for="website">website</label>
<input type="input" name="website" /></li>
  <li><label for="tags">tags</label>
<input type="input" name="tags" /></li>
  <li><label for="description">description</label>
<textarea name="description"></textarea></li>
</ul>

	<input type="submit" name="submit" value="Create" /> 
</form>