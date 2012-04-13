<?php foreach ($companies as $companies_item): ?>

    <h2><?php echo $companies_item['name'] ?></h2>
   
    <h3>Description</h3>
    <p><?php echo $companies_item['description'] ?></p>
    <p><a href="companies/<?php echo $companies_item['company_id'] ?>">View company</a></p>

<?php endforeach ?>