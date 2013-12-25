<div class="main">



<h1>Create job ad</h1>

<?php 
    $attributes = array('id' => 'create-ad', 'class' => 'wide');
    echo form_open('ad_c/ad_validation', $attributes) ; ?>

<?php echo validation_errors('<div class="error">', '</div>') ; ?>

<div class="form-field">
    <label for="headline">Headline<span class="star">*</span></label>
    <input type="text" class="txt long" name="headline" id="headline" maxlength="40"  value="<?php echo set_value('headline'); ?>" />
</div><!-- close .form-field -->


<div class="form-select">
<label for="location">Level<span class="star">*</span></label>

<select name="level" id="level">
  <option value="0" <?php echo set_select('level', '0', TRUE); ?>>Choose</option>
  <option value="Junior" <?php echo set_select('level', 'Junior'); ?>>Junior</option>
  <option value="Mid-level" <?php echo set_select('level', 'Mid-level'); ?>>Mid-level</option>  
  <option value="Senior" <?php echo set_select('level', 'Senior'); ?>>Senior</option>
  <option value="Executive" <?php echo set_select('level', 'Executive'); ?>>Executive</option>
</select> 

</div><!-- close .form-select -->


<div class="form-select">
<label for="location">Location<span class="star">*</span></label>

<select name="location" id="location">
  <option value="0" <?php echo set_select('location', '0', TRUE); ?>>Choose</option>
  <option value="Brooklyn" <?php echo set_select('location', 'Brooklyn'); ?>>Brooklyn</option>
  <option value="Bronx" <?php echo set_select('location', 'Bronx'); ?>>Bronx</option>  
  <option value="Manhattan" <?php echo set_select('location', 'Manhattan'); ?>>Manhattan</option>
  <option value="Queens" <?php echo set_select('location', 'Queens'); ?>>Queens</option>
  <option value="Staten Island" <?php echo set_select('location', 'Staten Island'); ?>>Staten Island</option>  
</select> 

</div><!-- close .form-select -->



<div class="form-select">
<label for="type">Type<span class="star">*</span></label>

<select name="type" id="type">
  <option value="0" <?php echo set_select('type', '0', TRUE); ?>>Choose</option>
  <option value="Permanent" <?php echo set_select('type', 'Permanent'); ?>>Permanent</option>
  <option value="Freelance" <?php echo set_select('type', 'Freelance'); ?>>Freelance</option>
  <option value="Temp" <?php echo set_select('type', 'Temp'); ?>>Temp</option>  
  <option value="Internship" <?php echo set_select('type', 'Internship'); ?>>Internship</option>
</select> 

</div><!-- close .form-select --> 


<div class="form-radio">
<h3>Hours<span class="star">*</span></h3>

<label for="full-time">Full time</label>
<input name="hours" type="radio" value="Full time" id="full-time" <?php echo set_radio('hours', 'Full time'); ?>>

<label for="part-time">Part time</label>
<input name="hours" type="radio" value="Part time" id="part-time" <?php echo set_radio('hours', 'Part time'); ?>>

</div><!-- close .form-radio -->


<div class="form-radio">
<h3>On site<span class="star">*</span></h3>

<label for="on-site">On site</label>
<input name="on_site" type="radio" value="On site" id="on-site" <?php echo set_radio('on_site', 'On site'); ?>>

<label for="off-site">Off site</label>
<input name="on_site" type="radio" value="Off site" id="off-site" <?php echo set_radio('on_site', 'Off site'); ?>>

</div><!-- close .form-radio -->


<div class="form-textarea">
    <label for="description">Description<span class="star">*</span></label>
    <textarea name="description" id="description" maxlength="5000" class="txt long"><?php echo set_value('description'); ?></textarea>
</div><!-- close .form-textarea -->


<input name="create-ad" id="btn-ad" class="btn" type="submit" value="Create Ad" />
<p class="notice"><span class="star">*</span>Required.</p>
<?php echo form_close() ; ?>




</div><!-- close .main -->
