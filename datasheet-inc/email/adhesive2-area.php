<?php if ($adhesive_id2) {
   $desc = $adhesive2['addef'] . ' ' . $adhesive2['addef2'] . ' ' .  $adhesive2['addef3'] . ' ' . $adhesive2['addef4'] . ' ' . $adhesive2['addef5'] . ' ' . $adhesive2['addef6'];
?>
   
<table width="100%" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="3"><span style="font-size:9pt;font-weight:bold;">Adhesive(<?php echo $adhesive2['adnam']; ?>):&nbsp;</span><?php echo $adhesive2['desc']; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-bottom: solid 1px Gray; vertical-align:top;">
			    <table cellpadding="5" style="width:245px;">
			        <tbody>
			            <tr>
			                <td style="font-size:9pt;font-weight:bold;">Coat Weight:</td><td><?php echo $adhesive2['cwlev']; ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Adhesive Type:</td><td><?php echo $adhesive2['adtype']; ?><br><?php echo $adhesive2['adtynu']; ?>&nbsp;</td><td>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Shear:</td>
			                 <td><?php echo $adhesive2['shrtrg']; ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Minimum Application Temperature:</td>
			                 <td><?php echo $adhesive2['matemp']; ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Service Temperature:</td><td><?php echo $adhesive2['lstemp']; ?> to <?php echo $adhesive2['hstemp']; ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">ACTS Approval:</td><td>N/a&nbsp;</td>
			             </tr>
			         </tbody>
			     </table>
            </td>
			<td style="border-bottom: solid 1px Gray; vertical-align:top;">
			    <table cellpadding="2" style="width:200px;">
			        <tbody>
			            <tr>
			                <td colspan="2" style="font-size:9pt;font-weight:bold;text-decoration:underline;font-size:9pt;text-align:center;">Federal Regulation Approval</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;width:125px;">Heavy Metals:</td>
			                 <td><?php echo ucwords(strtolower($adhesive2['afrhm'])); ?>&nbsp;</td>
			                 <td>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Toy Safety:</td><td><?php echo ucwords(strtolower($adhesive2['afrtoy'])); ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Indirect Food:</td><td><?php echo ucwords(strtolower($adhesive2['afrif'])); ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Direct Food:</td><td><?php echo ucwords(strtolower($adhesive2['afrdf'])); ?>&nbsp;</td>
			             </tr>
			         </tbody>
			     </table>
			 </td>
            <td style="border-bottom: solid 1px Gray; vertical-align:top;">
                <table cellpadding="2" style="width:220px;">
                    <tbody>
                        <tr>
                            <td colspan="2" style="font-size:9pt;font-weight:bold;text-decoration:underline;font-size:9pt;text-align:center;">Typical Adhesion Values</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;width:125px;" colspan="2">Stainless Steel:</td>
                        </tr>
                        <tr>
                            <td>180° Peel:</td>
                            <td><?php echo $adhesive2['p12418']; ?> lb/in&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Loop Tack:</td>
                            <td><?php echo $adhesive2['lttarg']; ?> lb/in²&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;" colspan="2">Glass:</td>
                        </tr>
                        <tr>
                            <td>180° Peel:</td>
                            <td><?php echo $adhesive2['p22418']; ?> lb/in&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;" colspan="2">Polyethylene:</td>
                        </tr>
                        <tr>
                            <td>180° Peel:</td>
                            <td><?php echo $adhesive2['p32418']; ?> lb/in&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;" colspan="2">Corrugated:</td></tr>
                        <tr>
                            <td>180° Peel:</td>
                            <td><?php echo $adhesive2['p42418']; ?> lb/in&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;" colspan="2">Painted Metal:</td>
                        </tr>
                        <tr>
                            <td>180° Peel:</td>
                            <td><?php echo $adhesive2['p52418']; ?> lb/in&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
		</tr>
	</tbody>
</table>   

<?php } //end if ahersive ?>
