<?php
// Confirm email code and 2nd part of profile form
$options = array(
        '0' => 'Choose State',
		'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming'
);
$id = 'id="state"';
$f_name = $this->session->userdata('f_name') ;
$attributes = array('class' => 'success', 'id' => 'success');
?>
<div class="main">

    <h1>Welcome to Jobzr <?php echo html_escape($f_name) ; ?>.</h1>
    
    <p>Please take a minute to complete your profile so people know who you are. Or <a href="/dashboard">skip this</a> for now.</p>




<?php echo form_open_multipart('user_c/data_validation', $attributes) ; ?>
   
<?php echo validation_errors('<div class="error">', '</div>') ; ?>   



    
      <fieldset>
    <legend>Account information</legend>


    <div class="form-field">
      <label for="city" class="success-label">City:</label>
      <input type="text" name="city" id="city" value="<?php echo set_value('city'); ?>"  class="med txt" maxlength="30" />
    </div><!-- .form-field -->


    <div class="form-field">
      <label for="state" class="success-label">State:</label>
      <div class="dropdown"><?php echo form_dropdown('state', $options, '0', $id) ; ?></div><!-- .dropdown -->
    </div><!-- .form-field -->
    

    <div class="form-field">
      <label for="website" class="success-label">Website:</label>
      <input type="text" name="website" id="website" value="<?php echo set_value('website'); ?>" class="med txt" maxlength="50" />
    </div><!-- .form-field -->


    <div class="form-field">
      <label for="company" class="success-label">Company:</label>
      <input type="text" name="company" id="company" value="<?php echo set_value('company'); ?>" class="med txt" maxlength="30" />
    </div><!-- .form-field -->


    <div class="form-field">
      <label for="userfile" class="success-label">Picture:</label>
      <input type="file" name="userfile" id="userfile" size="50" class="med txt"  />
    </div><!-- .form-field -->


    <div class="form-field">
      <label for="bio" class="success-label">Bio:</label>
      <textarea name="bio" id="bio" class="bio txt" ><?php echo set_value('bio'); ?></textarea>
    </div><!-- .form-field -->
    
   
    
        
  <input type="submit" name="submit" value="Submit" id="update" class="btn" />    
  </fieldset>

<?php echo form_close() ; ?>


    
  </div><!-- .main --> 
