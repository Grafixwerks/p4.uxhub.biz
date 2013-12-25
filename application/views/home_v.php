<div class="main">

<?php
//	echo '<pre>' ;
//	print_r($results) ;
//	echo '<br />' ;	
//	print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
?>

<h1>NYC tech job board</h1>
<?php if ($this->session->userdata('is_logged_in')) : ?>
<a href="/create-ad" class="btn home-create">Create ad</a>

<?php endif; ?>
<table class="tablesorter listing">
    <thead>
  <tr>
    <th scope="col" class="left th-head">Headline</th>
    <th scope="col" class="th-perm">Type</th>
    <th scope="col" class="th-hour">Hours</th>
    <th scope="col" class="th-site">Site</th>
    <th scope="col" class="th-level">Level</th>
    <th scope="col" class="th-location">Location</th>
  </tr>
    </thead>
    <tbody>
<?php 
// list ads
foreach ($results as $ad): ?> 
  <tr>
    <td class="left"><a href="ad/<?php echo $ad->ad_id ; ?>"><?php echo $ad->headline ; ?></a></td>
    <td><?php echo $ad->type ; ?></td>
    <td><?php echo $ad->hours ; ?></td>
    <td><?php echo $ad->on_site ; ?></td>
    <td><?php echo $ad->level ; ?></td>
    <td><?php echo $ad->location ; ?></td>
  </tr>
<?php endforeach  ?> 
</tbody> 

</table>
 
</div><!-- close .main -->
