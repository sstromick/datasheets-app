<?php
    $facestock = $wpdb->get_results ( 'SELECT fcompn as id, RFXNAM as txt FROM ds_specfac WHERE frfx like "Both%" and rfxnam<>"" ORDER BY RFXNAM', ARRAY_A); 

    if ($wpdb->last_error) {
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
    }

?>