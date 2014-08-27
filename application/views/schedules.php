<link href='<?= asset_url() . "css/schedule.css"?>' rel="stylesheet"/>

<?php
if (!isset($themes)) {
?>
<p>There are currently no themes</p>
<?php }else { ?>
<p>Here are themes which are going to be discussed. And after the date you will know opinion of the team.</p>
<table>
    <thead><tr><th>Topic of the theme</th><th>Date of discussion</th></tr></thead>

<?php foreach ($themes as $theme): ?>
<tr><td><?php echo $theme['themeName']?></td><td><?php echo date("F jS, Y", strtotime($theme['dateOfDiscusion']));?></td></tr>
<?php endforeach;} ?>
</table>
