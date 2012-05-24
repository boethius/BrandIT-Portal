<hr>
<h4>Create New</h4>
<p><a href="/index.php/companies/create/">Create new company</a></p>
<hr>

<?php foreach ($companies as $companies_item): ?>

    <h2><?php echo $companies_item['name'] ?></h2>
   
    <h3>Description</h3>
    <p><?php echo $companies_item['description'] ?></p>
<<<<<<< HEAD
    <p><a href="<?php echo $companies_item['company_id'] ?>">View company</a> | <a href="edit/<?php echo $companies_item['company_id'] ?>">Edit company</a> | <a href="delete/<?php echo $companies_item['company_id'] ?>">Delete company</a></p>
=======
    <p><a href="<?php echo $companies_item['company_id'] ?>">View company</a> | <a href="edit/<?php echo $companies_item['company_id'] ?>">Edit company</a> | <a href="delete/<?php echo $companies_item['company_id'] ?>">Delete company</a></p>
>>>>>>> 4fcd6f9e9b82abed659f1c2561a7d2c8304e15e7

<?php endforeach ?>