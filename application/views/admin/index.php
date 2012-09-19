<hr>
<h4>Create New</h4>
<p><a href="/index.php/companies/create/">Create new company</a></p>
<hr>

<?php foreach ($companies as $companies_item): ?>

    <h2><?php echo $companies_item['name'] ?></h2>
    <h4><p><?php echo ($companies_item['active']? "active":"not active"); ?></p></h4>
    <h3>Description</h3>
    
    <p><?php echo $companies_item['description'] ?></p>
    <p><a href="/index.php/admin/<?php echo $companies_item['company_id'] ?>">View company</a> | <a href="/index.php/admin/edit/<?php echo $companies_item['company_id'] ?>">Edit company</a> | <a href="/index.php/admin/delete/<?php echo $companies_item['company_id'] ?>">Delete company</a></p>
    
    

<?php endforeach ?>