<!--

streetline1
streetline2
zip city

website

<a href="/index.php/companies/create/">Create new company</a>

            <!--Content Start-->
  <div id="content">
                <div id="infobar"></div>
                	
        <input type='hidden' id='current_page' />
		<input type='hidden' id='show_per_page' />
        <div id="main">
<?php foreach ($companies as $companies_item): ?>
				 <!--List-Entry Start <?php echo $companies_item['company_id'] ?> -->
                    <div class="list_entry" id="cid_<?php echo $companies_item['company_id'] ?>">
                    	<div class="list_image"><?php if($companies_item['thumb'] != "") { ?> <img width="135" src="/uploads/<?php echo $companies_item['thumb']; ?>" /><?php } echo ""; ?></div>
                        <div class="list_text_holder">
                        	<div class="list_title"><?php echo $companies_item['name'] ?></div>
                            <div class="list_left_text"><!-- <a href="/index.php/companies/<?php echo $companies_item['company_id'] ?>">Details</a> -->
                            	<?php echo $companies_item['streetline1'] ?>
                            	<?php if($companies_item['streetline2'] != "") echo '<br />'.$companies_item['streetline2'] ?><br />
                            	<?php echo $companies_item['zip'] ?> <?php echo $companies_item['city'] ?><br /><br />
                            	<a href="<?php echo $companies_item['website'] ?>" target="_blank"><?php echo $companies_item['website'] ?></a><br />
                            	<ul>
                            	<?php 
                            	$tags_ex = explode(",", $companies_item['tags'] );
                            	//print_r($tags_ex);
								?>
								<?php foreach($tags_ex as $tags): ?>
									
									
									<li><?php echo $tags?></li>
								
                            	<?php endforeach ?>
                            	</ul>
                            </div>
                            <div class="list_right_text_holder">
                            	<div class="list_right_text_top"></div>
                                <div class="list_right_text_center"><?php echo $companies_item['description'] ?></div>
                                <div class="list_right_text_bottom"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="google_maps"></div>
                        <div class="clear"></div>
                    </div>
                    <!--List-Entry End-->
<?php endforeach ?>
        </div>
                                <div class="clear"></div>
<div id='page_navigation'></div>  
        <div id="sidebar"></div>
        
<?php 
/*




			<div class="companyItem" id="cid_<?php echo $companies_item['company_id'] ?>">
				<div class="companyTitle"><?php echo $companies_item['name'] ?></div>
				<div class="companyDesc"><?php echo $companies_item['description'] ?></div>
				<div class="companyCtrl"><a href="/index.php/companies/<?php echo $companies_item['company_id'] ?>">View company</a></div>
			</div>
			


    </div>

    <h2><?php echo $companies_item['name'] ?></h2>
   
    <h3>Description</h3>
    <p><?php echo $companies_item['description'] ?></p>
    <p><a href="<?php echo $companies_item['company_id'] ?>">View company</a></p>

*/
?>