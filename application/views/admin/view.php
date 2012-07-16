<?php
echo '<h2>'.$companies_item['name'].'</h2>';
echo $companies_item['email'];
?>
<ul>
<li><strong>Name</strong>: <?php echo $companies_item['name'] ?></li>
<li><strong>Street</strong>: <?php echo $companies_item['streetline1'] ?></li>
<li><strong>Street</strong>: <?php echo $companies_item['streetline2'] ?></li>
<li><strong>City</strong>: <?php echo $companies_item['city'] ?></li>
<li><strong>Zip</strong>: <?php echo $companies_item['zip'] ?></li>
<li><strong>Phone</strong>: <?php echo $companies_item['telefon'] ?></li>
<li><strong>Fax</strong>: <?php echo $companies_item['telefax'] ?></li>
<li><strong>Mobile</strong>: <?php echo $companies_item['mobile'] ?></li>
<li><strong>Email</strong>: <?php echo $companies_item['email'] ?></li>
<li><strong>Website</strong>: <?php echo $companies_item['website'] ?></li>
<li><strong>Tags</strong>: <?php echo $companies_item['tags'] ?></li>
<li><strong>Description</strong>: <?php echo $companies_item['description'] ?>/li>
<li><strong>Active</strong>: <?php echo ($companies_item['active'] ?'active':'inactive')  ?></li>
</ul>
<input type="button" name="back" onclick="location.href='/index.php/admin/'" value="Back" /> 