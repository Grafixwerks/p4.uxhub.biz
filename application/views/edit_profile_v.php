<?php
// logged in user form to update their profile
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
$f_name = $this->session->userdata('f_name') ;
$l_name = $this->session->userdata('l_name') ;
$email = $this->session->userdata('email') ;
$city = $this->session->userdata('city') ;
$state = $this->session->userdata('state') ;
$website = $this->session->userdata('website') ;
$bio = $this->session->userdata('bio') ;

$attributes = array('id' => 'edit-profile');
?>
<div class="main">

<h1>Edit profile</h1>

<?php echo form_open_multipart('user_c/update_user_validation', $attributes) ; ?>
   
<?php echo validation_errors('<div class="error">', '</div>') ; ?>   

      <fieldset>
    <legend>Account information</legend>

    <div class="text-group">
      <label for="f_name" >First Name:</label>
      <input type="text" name="f_name" value="<?php echo $f_name ; ?>" id="f_name"  class="txt"title="first name" maxlength="30" />
    </div><!-- .text-group -->
    
    <div class="text-group">
      <label for="l_name" >Last Name:</label>
      <input type="text" name="l_name" value="<?php echo $l_name ; ?>" id="l_name"  class="txt" title="last name" maxlength="30" />
    </div><!-- .text-group -->

    <div class="text-group">
      <label for="email" >E-Mail:</label>
      <input type="text" name="email" value="<?php echo $email ; ?>" id="email" maxlength="100" class="txt" title="email" /><!--autocomplete="off"-->
    </div><!-- .text-group -->

    <div class="text-group">
      <label for="city" >City:</label>
      <input type="text" name="city" id="city" value="<?php echo $city ; ?>"  class="txt" maxlength="30" />
    </div><!-- .text-group -->

    <div class="text-group">
      <label for="state" >State:</label>
      <div class="dropdown"><?php echo form_dropdown('state', $options, $state); ?></div><!-- .dropdown -->
    </div><!-- .text-group -->

    <div class="text-group">
      <label for="website" >Website:</label>
      <input type="text" name="website" id="website" value="<?php echo $website ; ?>" class="txt" maxlength="50" />
    </div><!-- .text-group -->

    <div class="text-group">
      <label for="userfile" >Picture:</label>
      <input type="file" name="userfile" id="userfile" size="50" class="txt"  />
    </div><!-- .text-group -->

    <div class="text-group">
      <label for="bio" >Bio:</label>
      <textarea name="bio" id="bio" class="bio txt" ><?php echo $bio ; ?></textarea>
    </div><!-- .text-group -->

        
  <input type="submit" name="submit" value="Update" id="update" class="btn" />    
  </fieldset>

<?php echo form_close() ; ?>

</div><!-- close .main -->
