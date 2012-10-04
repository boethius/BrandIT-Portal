
<script type="text/javascript ">
	$(document).ready(function() {
    $('#admin_table').dataTable();
	} );
	
</script>

<div id="content_admin" >
	
	<h2>Create New</h2>
	<p><a href="/index.php/companies/create/">Create new company</a></p>
	<hr>
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
				<p><?php echo $companies_item['name'] ?></p>
			</td>
			<td>
				<p><?php echo ($companies_item['active']? "active":"not active"); ?></p>
			</td>
			<td>
				<a href="/index.php/admin/<?php echo $companies_item['company_id'] ?>">View</a>
			</td>
			<td>
				 <a href="/index.php/admin/edit/<?php echo $companies_item['company_id'] ?>">Edit</a>
			</td>
			<td>
				<a href="/index.php/admin/delete/<?php echo $companies_item['company_id'] ?>">Delete</a>
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