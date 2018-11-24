<?php
/**
 * Template Name: Datasheet Request Template
 */
?>

<?php 

get_header(); 
nectar_page_header($post->ID); 

//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);

global $wpdb; 
global $result; 

$result = $wpdb->get_results ( 'SELECT fcompn as id, RFXNAM as txt FROM ds_specfac WHERE (FRFX like "RFX Only%" or FRFX like "Both%") and RFXNAM <> "" order by RFXNAM', ARRAY_A); 

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }


?>

<div class="container-wrap">
	
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		
		<div class="row">
			
			<?php 

				 if(have_posts()) : while(have_posts()) : the_post(); 
					
					 the_content(); 
		
				 endwhile; endif; 
				
			if($page_full_screen_rows == 'on') echo '</div>'; ?>

            <div id="search-form">
                <form action="datasheets.php" method="post">
                    <label for="material">Material:</label>
                    <select id="materialDD" name="material">
                        <option value=""></option>
                        <?php
                        foreach ($result as $value) {
                                echo '<option value="' . $value[id] . '">' . $value[txt] . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
		</div><!--/row-->
		
	</div><!--/container-->
	
</div><!--/container-wrap-->

<?php get_footer(); ?>