<?php if ($facestock_id1) {
   $desc = $facestock['fdesc'] . ' ' . $facestock['fdesc2'] . ' ' .  $facestock['fdesc3'] . ' ' . $facestock['fdesc4'] . ' ' . $facestock['fdesc5'] . ' ' . $facestock['fdesc6'];
?>

<table width="100%" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
			<td colspan="2"><span style="font-size:9pt;font-weight:bold;">Facestock(<?php echo $facestock['fsname']; ?>):&nbsp;</span><?php echo $desc; ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-bottom: solid 1px Gray;">
                <table cellpadding="5">
                    <tbody>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Type:</td>
                            <td><?php echo $facestock['fpapfm']; ?></td>
                            <td style="font-size:9pt;font-weight:bold;">Basis Weight:</td>
                            <td><?php echo (trim($facestock['baswt']) == "" ? "N/A" : $facestock['baswt']) ?>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Caliper:</td>
                            <td><?php echo $facestock['fpapfm']; ?>&nbsp;</td>
                            <td style="font-size:9pt;font-weight:bold;">Tensile:</td><td>MD:&nbsp;<?php echo (trim($facestock['tensmd']) == "" ? "N/A" : $facestock['tensmd']) ?>&nbsp;</td><td>CD:&nbsp;<?php echo (trim($facestock['tenscd']) == "" ? "N/A" : $facestock['tenscd']) ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Opacity:</td>
                            <td><?php echo (trim($facestock['opac']) == "" ? "N/A" : $facestock['opac']) ?>&nbsp;</td>
                            <td style="font-size:9pt;font-weight:bold;">Tear:</td><td>MD:&nbsp;<?php echo (trim($facestock['tmd']) == "" ? "N/A" : $facestock['tmd']) ?>&nbsp;</td><td>CD:&nbsp;<?php echo (trim($facestock['tcd']) == "" ? "N/A" : $facestock['tcd']) ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Brightness:</td>
                            <td><?php echo (trim($facestock['bright']) == "" ? "N/A" : $facestock['bright']) ?>&nbsp;</td>
                            <td style="font-size:9pt;font-weight:bold;">Elongation:</td>
                            <td>MD:&nbsp;<?php echo (trim($facestock['eimd']) == "" ? "N/A" : $facestock['eimd']) ?>&nbsp;</td><td>CD:&nbsp;<?php echo (trim($facestock['eicd']) == "" ? "N/A" : $facestock['eicd']) ?>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
			<td style="border-bottom: solid 1px Gray;">
                <table cellpadding="5">
                    <tbody>
                        <tr>
                            <td colspan="2" style="font-weight:bold;text-decoration:underline;font-size:9pt;text-align:center;">Federal Regulation Approval</td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Heavy Metals:</td>
                            <td>&nbsp;</td><td><?php echo ucwords(strtolower($facestock['fedhmx'])); ?></td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Toy Safety:</td>
                            <td><?php echo ucwords(strtolower($facestock['fedtsx'])); ?></td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Indirect Food:</td><td><?php echo ucwords(strtolower($facestock['fedifx'])); ?></td>
                        </tr>
                        <tr>
                            <td style="font-size:9pt;font-weight:bold;">Direct Food:</td>
                            <td><?php echo ucwords(strtolower($facestock['feddfx'])); ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
		</tr>
	</tbody>
</table>

<?php } //end if facestock ?>
