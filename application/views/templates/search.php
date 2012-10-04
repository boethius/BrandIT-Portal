
        	
            <!--Header Start-->
            <div id="header">
            	
                <div id="header_content_holder">
                    <div id="logo"></div>
                    <div id="slogan"><img src="/images/<?=$portal['name'];?>_logo.png" alt="<?=$portal['name'];?>" /></div>
                    <div id="search">
                    <select name="regions" id="regions">
                    	<option value=""><?=$i18n->get_value("allregions")?></option>
						<?php foreach ($regions as $region): ?>
						<option value="<?=$region['id']?>"><?=$i18n->get_value($region['region_name'])?></option>
						<?php endforeach ?>
                    </select><br />
                    <input type="text" id="searchBar" name="searchBar" placeholder="Suchen" /></div>
                    <div class="clear"></div>
				</div>
                
            </div>
            <!--Header End-->