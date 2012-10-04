><h2>Edit Company</h2>

<?php echo validation_errors(); ?>

<?php echo $companies_item['company_id']; ?>

<?php echo  form_open_multipart('admin/edit/'.$companies_item['company_id']) ?>


<ul class="register">
  <li><label for="name">name</label>
<input type="input" name="name" value="<?php echo $companies_item['name'] ?>" id="name" /></li>
  <li><label for="streetline1">streetline1</label>
<input type="input" name="streetline1" value="<?php echo $companies_item['streetline1'] ?>" id="streetline1" /></li>
  <li><label for="streetline2">streetline2</label>
<input type="input" name="streetline2" value="<?php echo $companies_item['streetline2'] ?>" id="streetline2" /></li>
  <li><label for="zip">zip</label>
<input type="input" name="zip" value="<?php echo $companies_item['zip'] ?>" id="zip" /></li>
  <li><label for="city">city</label>
<input type="input" name="city" value="<?php echo $companies_item['city'] ?>" id="city" /></li>
  <li><label for="telefon">telefon</label>
<input type="input" name="telefon" value="<?php echo $companies_item['telefon'] ?>" id="telefon" /></li>
  <li><label for="telefax">telefax</label>
<input type="input" name="telefax" value="<?php echo $companies_item['telefax'] ?>" id="telefax" /></li>
  <li><label for="mobile">mobile</label>
<input type="input" name="mobile" value="<?php echo $companies_item['mobile'] ?>" id="mobile" /></li>
  <li><label for="email">email</label>
<input type="input" name="email" value="<?php echo $companies_item['email'] ?>" id="email" /></li>
  <li><label for="website">website</label>
<input type="input" name="website" value="<?php echo $companies_item['website'] ?>" id="website" /></li>
  <li><label for="tags">tags</label>
<input type="input" name="tags" value="<?php echo $companies_item['tags'] ?>" id="tags" /></li>
  <li><label for="lat">lat</label>
<input type="input" name="lat" value="<?php echo $companies_item['lat'] ?>" id="lat" /></li>
  <li><label for="long">long</label>
<input type="input" name="long" value="<?php echo $companies_item['long'] ?>" id="long" /></li>
  <li><label for="description">description</label>
<textarea name="description" id="description"><?php echo $companies_item['description'] ?></textarea></li>
  <li><label for="active">active</label>
<input type="checkbox" value="1" name="active"<?php if($companies_item['active']) echo 'checked="checked"';  ?> /></li>
<li><label for="image">Image</label>
	<input type="file" name="userfile" value="" /><?php if($companies_item['thumb'] != "") { ?> <img width="135" src="/uploads/<?php echo $companies_item['thumb']; ?>" /><?php } echo ""; ?>
</li>
</ul>
<input type="button" name="back" onclick="location.href='/index.php/admin/'" value="Back" />
<input type="submit" name="submit" value="Edit" id="submit" value="Create companies item" /> 

</form>