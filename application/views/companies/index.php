<hr>
<h4>Create New</h4>
<p><a href="/index.php/companies/create/">Create new company</a></p>
<hr>

<?php foreach ($companies as $companies_item): ?>

    <h2><?php echo $companies_item['name'] ?></h2>
   
    <h3>Description</h3>
    <p><?php echo $companies_item['description'] ?></p>
    <p><a href="<?php echo $companies_item['company_id'] ?>">View company</a> | <a href="edit/<?php echo $companies_item['company_id'] ?>">Edit company</a></p>

<?php endforeach ?>