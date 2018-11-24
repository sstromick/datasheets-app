<?php if ($liner_id2) {

   $desc = $liner2['LDESC'] . ' ' . $liner2['LDESC2'] . ' ' .  $liner2['LDESC3'] . ' ' . $liner2['LDESC4'] . ' ' . $liner2['LDESC5'] . ' ' . $liner2['LDESC6'];
?>
    <div class="ds-prod-desc">
        <strong>Release Liner(<?php echo $liner2['LINNAM']; ?>):</strong> <?php echo $desc; ?>
    </div>

    <div class="ds-liner-data">
        <div class="ds-liner">
            <div class="ds-liner-item">
                <div class="ds-liner-label">Base Weight:</div>
                <div class="ds-item-data"><?php echo $liner2['lbwght'] ?> lb/ream</div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-liner-label">Tensile:</div>
                <div class="ds-item-data">MD: <?php echo ($liner2['ltenmd'] == "" ? "N/A" : $liner2['ltenmd']) ?> lb/in </div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-item-data">CD: <?php echo (($liner2['ltencd'] == "" || $liner2['ltencd'] == "0") ? "N/A" : $liner2['ltencd']) ?> </div>
            </div>
        </div>
        
        <div class="ds-liner">
            <div class="ds-liner-item">
                <div class="ds-liner-label">Caliper:</div>
                <div class="ds-item-data"><?php echo $liner2['lcal'] ?> mil  </div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-liner-label">Tear:</div>
                <div class="ds-item-data">MD: <?php echo ($liner2['ltanmd'] == "" ? "N/A" : $liner2['ltanmd']) ?></div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-item-data">CD: <?php echo ($liner2['ltancd'] == "" ? "N/A" : $liner2['ltancd']) ?> </div>
            </div>
        </div>
    </div>

<?php } //end if liner ?>
