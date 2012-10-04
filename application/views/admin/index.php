<hr>
<h4>Create New</h4>
<p><a href="/index.php/companies/create/">Create new company</a></p>
<hr>
<script type="text/javascript ">
	$(document).ready(function() {
    $('#admin_table').dataTable();
	} );
	
</script>

<div class="content" style="width: 980px; margin: 0 auto;margin-top:80px;">
	<table width="900" id="admin_table">
		<thead>
			<tr>
				<td>Title</td><td>Aktiv</td><td>View</td><td>Edit</td><td>Delete</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($companies as $companies_item): ?>
		<tr>
			<td>
				<h2><?php echo $companies_item['name'] ?></h2>
			</td>
			<td>
				<h4><p><?php echo ($companies_item['active']? "active":"not active"); ?></p></h4>
			</td>
			<td>
				<a href="/index.php/admin/<?php echo $companies_item['company_id'] ?>">View company</a>
			</td>
			<td>
				 <a href="/index.php/admin/edit/<?php echo $companies_item['company_id'] ?>">Edit company</a>
			</td>
			<td>
				<a href="/index.php/admin/delete/<?php echo $companies_item['company_id'] ?>">Delete company</a>
			</td>
		</tr>
		    
		    
		   <!-- <h3>Description</h3>
		    
		    <p><?php echo $companies_item['description'] ?></p>
		    <p> | | </p>
		   -->
		    
		
		<?php endforeach ?>
		</tbody>
	</table>
</div>