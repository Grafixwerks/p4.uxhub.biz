
<?php
//	echo '<pre>' ;
//	print_r($results) ;
//	echo '<br />' ;	
//	print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
?>


<div class="main">

<h1>Edit job ad</h1>

<?php foreach ($results as $ad): ?> 

<?php 
//echo $ad->location ; 
//echo $ad->type ; 
//echo $ad->hours ; 
//echo $ad->on_site ; 
//echo $ad->level ; 
?>

<?php endforeach  ?> 
<?php 
    $attributes = array('id' => 'create-ad', 'class' => 'wide');
    echo form_open('ad_c/edit_ad_validation', $attributes) ; ?>

<?php echo validation_errors('<div class="error">', '</div>') ; ?>

<div class="form-field">
    <label for="headline">Headline<span class="star">*</span></label>
    <input type="text" class="txt long" name="headline" id="headline" maxlength="40"  value="<?php echo $ad->headline ; ?>" />
</div><!-- close .form-field -->

<input name="ad_id" type="hidden" value="<?php echo $ad->ad_id ; ?>">

<div class="form-select">
<label for="location">Level<span class="star">*</span></label>

<select name="level" id="level">
  <option value="0">Choose</option>
  <option value="Junior">Junior</option>
  <option value="Mid-level">Mid-level</option>  
  <option value="Senior">Senior</option>
  <option value="Executive">Executive</option>
</select> 

</div><!-- close .form-select -->


<div class="form-select">
<label for="location">Location<span class="star">*</span></label>

<select name="location" id="location">
  <option value="0">Choose</option>
  <option value="Brooklyn">Brooklyn</option>
  <option value="Bronx">Bronx</option>  
  <option value="Manhattan">Manhattan</option>
  <option value="Queens">Queens</option>
  <option value="Staten Island">Staten Island</option>  
</select> 

</div><!-- close .form-select -->

<div class="form-select">
<label for="type">Type<span class="star">*</span></label>

<select name="type" id="type">
  <option value="0">Choose</option>
  <option value="Permanent">Permanent</option>
  <option value="Freelance">Freelance</option>
  <option value="Temp">Temp</option>  
  <option value="Internship">Internship</option>
</select> 

</div><!-- close .form-select --> 

<div class="form-radio">
<h3>Hours<span class="star">*</span></h3>

<label for="full-time">Full time</label>
<input name="hours" type="radio" value="Full time" id="full-time">

<label for="part-time">Part time</label>
<input name="hours" type="radio" value="Part time" id="part-time">

</div><!-- close .form-radio -->

<div class="form-radio">
<h3>On site<span class="star">*</span></h3>

<label for="on-site">On site</label>
<input name="on_site" type="radio" value="On site" id="on-site">

<label for="off-site">Off site</label>
<input name="on_site" type="radio" value="Off site" id="off-site">

</div><!-- close .form-radio -->


<div class="form-textarea">
    <label for="description">Description<span class="star">*</span></label>
    <textarea name="description" id="description" maxlength="5000" class="txt long"><?php echo $ad->description ; ?></textarea>
</div><!-- close .form-textarea -->


<input name="create-ad" id="btn-ad" class="btn" type="submit" value="Edit Ad" />
<p class="notice"><span class="star">*</span>Required.</p>
<?php echo form_close() ; ?>


</div><!-- close .main -->