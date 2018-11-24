<?php if ($facestock_id1) {
   $desc = $facestock['fdesc'] . ' ' . $facestock['fdesc2'] . ' ' .  $facestock['fdesc3'] . ' ' . $facestock['fdesc4'] . ' ' . $facestock['fdesc5'] . ' ' . $facestock['fdesc6'];
?>
    <div class="ds-prod-desc">
        <strong>Facebstock(<?php echo $facestock['fsname']; ?>):</strong> <?php echo $desc; ?>
    </div>

    <div class="ds-data">
        <div class="ds-fs-col1">
            <div class="ds-item">
              <div class="ds-label">Type:</div>
              <div class="ds-item-data"><?php echo $facestock['fpapfm']; ?></div>
            </div>

            <div class="ds-item">
                <div class="ds-label">Caliper:</div>
                <div class="ds-item-data"><?php echo $facestock['calper']; ?> </div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Opacity:</div>
                <div class="ds-item-data"><?php echo (trim($facestock['opac']) == "" ? "N/A" : $facestock['opac']) ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Brightness:</div>
                <div class="ds-item-data"><?php echo (trim($facestock['bright']) == "" ? "N/A" : $facestock['bright']) ?></div>
            </div>
            
        </div>
  
        <div class="ds-fs-col2">
        <div class="ds-item">
            <div class="ds-label">Basis Weight:</div>
            <div class="ds-item-data"><?php echo (trim($facestock['baswt']) == "" ? "N/A" : $facestock['baswt']) ?></div>
            <div class="ds-item-data">&nbsp;</div>
        </div>
        <div class="ds-item">
            <div class="ds-label">Tensile:</div>
            <div class="ds-item-data">MD: <?php echo (trim($facestock['tensmd']) == "" ? "N/A" : $facestock['tensmd']) ?></div>
            <div class="ds-item-data">CD: <?php echo (trim($facestock['tenscd']) == "" ? "N/A" : $facestock['tenscd']) ?></div>
        </div>
      
        <div class="ds-item">
            <div class="ds-label">Tear:</div>
            <div class="ds-item-data">MD: <?php echo (trim($facestock['tmd']) == "" ? "N/A" : $facestock['tmd']) ?></div>
            <div class="ds-item-data">CD: <?php echo (trim($facestock['tcd']) == "" ? "N/A" : $facestock['tcd']) ?></div>
        </div>
      
        <div class="ds-item">
            <div class="ds-label">Elongation:</div>
            <div class="ds-item-data">MD: <?php echo (trim($facestock['eimd']) == "" ? "N/A" : $facestock['eimd']) ?></div>
            <div class="ds-item-data">CD: <?php echo (trim($facestock['eicd']) == "" ? "N/A" : $facestock['eicd']) ?></div>
        </div>     

    </div>
       
        <div class="ds-fs-col3">
            <div class="ds-item ds-sub-head">Federal Regulation Approval
        </div>
        
        <div class="ds-item">
            <div class="ds-label">Heavy Metals:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['fedhmx'])); ?> </div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Toy Safety:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['fedtsx'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Indirect Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['fedifx'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Direct Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['feddfx'])); ?></div>
        </div>
    </div>

</div>

<?php } //end if facestock ?>
