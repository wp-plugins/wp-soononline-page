<?php
// ======================================
// 		Turn Plugin on/off
// ======================================
if (isset($_POST['activate']))
{
	if ($_POST['activate'] == 0)
	{
		update_option('soonOnlineActivationStatus', 0);
	}

	if ($_POST['activate'] == 1)
	{
		update_option('soonOnlineActivationStatus', 1);
	}
}

if  (isset($_POST['soonOnlineTitle'])) 
{
	update_option('soonOnlineTitle', $_POST['soonOnlineTitle']);
}

if  (isset($_POST['soonOnlineDescription'])) 
{
	update_option('soonOnlineDescription', $_POST['soonOnlineDescription']);
}

if  (isset($_POST['soonOnlineBGcolor'])) 
{
	update_option('soonOnlineBGcolor', $_POST['soonOnlineBGcolor']);
}

if  (isset($_POST['soonOnlineBTitlecolor'])) 
{
	update_option('soonOnlineBTitlecolor', $_POST['soonOnlineBTitlecolor']);
}

if  (isset($_POST['soonOnlineBTextcolor'])) 
{
	update_option('soonOnlineBTextcolor', $_POST['soonOnlineBTextcolor']);
}

if  (isset($_POST['soonOnlineLogo'])!="") 
{
	update_option('soonOnlineLogo', $_POST['soonOnlineLogo']);
}

if  (isset($_POST['soonOnlineTitleFont'])) 
{
	update_option('soonOnlineTitleFont', $_POST['soonOnlineTitleFont']);
}

if  (isset($_POST['soonOnlineBGimage'])) 
{
	update_option('soonOnlineBGimage', $_POST['soonOnlineBGimage']);
}

if  (isset($_POST['soonOnlineStretchBGimage'])) 
{
	update_option('soonOnlineStretchBGimage', $_POST['soonOnlineStretchBGimage']);
}

if  (isset($_POST['soonOnlineRepeatBGimage'])) 
{
	update_option('soonOnlineRepeatBGimage', $_POST['soonOnlineRepeatBGimage']);
}
?>



<div class="wrap">
<div id="icon-options-general" class="icon32"></div>
<h2>WP SoonOnline Page</h2>

<br />

<form method="post" action="<?php echo $GLOBALS['PHP_SELF'] . '?page=' . $this->mainOptionsPage; ?>" id="mobioptions">
	<table class="form-table">
        <tr valign="top">
        <th scope="row"><strong>Turn Plugin ON/OFF</strong></th>
        <td>
        	<p>
				<label title="activate"> <input type="radio" name="activate" value="1"<?php if ($this->pluginIsActive()) { echo ' checked="checked"'; } ?>> on </label>
			</p>
			<p>
				<label title="deactivate"> <input type="radio"name="activate" value="0"<?php if (!$this->pluginIsActive()) { echo ' checked="checked"'; } ?>> off </label>
			</p>        
        </td>	        
        </tr>  
    </table>   
    <?php submit_button(); ?>
</form>        
<br />        
        
<!-- START FIRST CONTAINER TABLE -->

<table class="widefat">
<thead>
<tr>
<th>Style Configuration</th>
</tr>
</thead>
<tbody>
<tr>
<td>
	     
<form method="post" action="<?php echo $GLOBALS['PHP_SELF'] . '?page=' . $this->mainOptionsPage; ?>" id="mobioptions">
	<table class="form-table">
   

<!-------------------------------------------------------------------------------->
<!-------------------- COLORS CONFIGURATION -------------------->
<!-------------------------------------------------------------------------------->

        <tr valign="top">
        	<th scope="row"><strong>Background Color</strong></th>
        	<td>
	        	<input type="text" name="soonOnlineBGcolor" value="<?php echo get_option('soonOnlineBGcolor');?>" class="mobicolor-field" data-default-color="#effeff" />
			</td>
        </tr>

        <tr valign="top">
        	<th scope="row"><strong>Upload Background Image</strong></th>
        	<td>
	        	<input type="text"  name="soonOnlineBGimage" value="<?php echo get_option('soonOnlineBGimage');?>" size="80" />
				<input type="button" class="mobisoft-upload-button button" value="Upload Image" /><br />
				<span>Enter the image location or upload an image from your computer.</span>
				<br /><br /> <strong>Current Background Image : </strong> <?php echo get_option('soonOnlineBGimage');?><br />
				<blockquote><img src="<?php echo get_option('soonOnlineBGimage');?>"/></blockquote>
			</td>
        </tr>

        <tr valign="top">
        <th scope="row"><strong>Stretch Background Image;</strong></th>
        <td>
        	<p>
				<label title="stretched"> <input type="radio" name="soonOnlineStretchBGimage" value="1"<?php if ($this->stretchBG()) { echo ' checked="checked"'; } ?>> yes </label>
			</p>
			<p>
				<label title="nostretched"> <input type="radio"name="soonOnlineStretchBGimage" value="0"<?php if (!$this->stretchBG()) { echo ' checked="checked"'; } ?>> no </label>
			</p>        
        </td>	        
        </tr>

        <tr valign="top">
        <th scope="row"><strong>Repeat Background Image;</strong></th>
        <td>
        	<p>
				<label title="repeated"> <input type="radio" name="soonOnlineRepeatBGimage" value="1"<?php if ($this->repeatBG()) { echo ' checked="checked"'; } ?>> yes </label>
			</p>
			<p>
				<label title="norepeated"> <input type="radio"name="soonOnlineRepeatBGimage" value="0"<?php if (!$this->repeatBG()) { echo ' checked="checked"'; } ?>> no </label>
			</p>        
        </td>	        
        </tr>        

        <tr valign="top">
        	<th scope="row"><strong>Title Color</strong></th>
        	<td>
	        	<input type="text" name="soonOnlineBTitlecolor" value="<?php echo get_option('soonOnlineBTitlecolor');?>" class="mobicolor-field" data-default-color="#effeff" />
			</td>
        </tr>

        <tr valign="top">
        	<th scope="row"><strong>Text Color</strong></th>
        	<td>
	        	<input type="text" name="soonOnlineBTextcolor" value="<?php echo get_option('soonOnlineBTextcolor');?>" class="mobicolor-field" data-default-color="#effeff" />
			</td>
        </tr>        


        <tr valign="top">
        	<th scope="row">Title Font</th>
        	<td>
        		<?php $selectedfont = get_option('soonOnlineTitleFont');?>
	        	<select class='' name='soonOnlineTitleFont'>
		        	<option value='' >Select a Font</option>

		        	<option value='_arial' <?php if ($selectedfont=="_arial") {echo "selected=selected";}?>>Arial</option>
		        	<option value='_arial_black' <?php if ($selectedfont=="_arial_black") {echo "selected=selected";}?>>Arial Black</option>
		        	<option value='_georgia' <?php if ($selectedfont=="_georgia") {echo "selected=selected";}?>>Georgia</option>
		        	<option value='_helvetica_neue' <?php if ($selectedfont=="_helvetica_neue") {echo "selected=selected";}?> >Helvetica Neue</option>
		        	<option value='_impact' <?php if ($selectedfont=="_impact") {echo "selected=selected";}?>>Impact</option>
		        	<option value='_lucida'  <?php if ($selectedfont=="_lucida") {echo "selected=selected";}?>>Lucida Grande</option>
		        	<option value='_palatino'  <?php if ($selectedfont=="_palatino") {echo "selected=selected";}?>>Palatino</option>
		        	<option value='_tahoma'  <?php if ($selectedfont=="_tahoma") {echo "selected=selected";}?>>Tahoma</option>
		        	<option value='_times'  <?php if ($selectedfont=="_times") {echo "selected=selected";}?>>Times New Roman</option>
		        	<option value='_trebuchet'  <?php if ($selectedfont=="_trebuchet") {echo "selected=selected";}?>>Trebuchet</option>
		        	<option value='_verdana'  <?php if ($selectedfont=="_verdana") {echo "selected=selected";}?>>Verdana</option>
			</td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>

</td>
</tr>
</tbody>
</table>



<br />


<!-------------------------------------------------------------------------------->
<!---------------------- TEXTS CONFIGURATION --------------------->
<!-------------------------------------------------------------------------------->

<table class="widefat">
<thead>
<tr>
<th>Style Configuration</th>
</tr>
</thead>

<tbody>
<tr>
<td>
	     
<form method="post" action="<?php echo $GLOBALS['PHP_SELF'] . '?page=' . $this->mainOptionsPage; ?>" id="mobioptions">
<h3>Generic Settings</h3>
	<table class="form-table">


        <tr valign="top">
        	<th scope="row"><strong>Body Title</strong></th>
        	<td>
	        	<input type="text" size="79"  name="soonOnlineTitle" value="<?php echo get_option('soonOnlineTitle');?>" />
			</td>
        </tr>

        <tr valign="top">
        	<th scope="row"><strong>Description</strong></th>
        	<td>
	        	<?php 
	        		$textval = get_option('soonOnlineDescription');
	        		wp_editor( stripslashes($textval), 'soonOnlineDescription', array('textarea_rows'=>12, 'editor_class'=>'mytext_class', 'teeny'=>true, 'dfw'=>true));

	        	?>
			</td>
        </tr>


        <tr valign="top">
        	<th scope="row"><strong>Upload Logo Image</strong></th>
        	<td>
	        	<input type="text"  name="soonOnlineLogo" value="<?php echo get_option('soonOnlineLogo');?>" size="80" />
				<input type="button" class="mobisoft-upload-button button" value="Upload Image" /><br />
				<span>Enter the image location or upload an image from your computer.</span>
				<br /><br /> <strong>Current logo : </strong> <?php echo get_option('soonOnlineLogo');?><br />
				<blockquote><img src="<?php echo get_option('soonOnlineLogo');?>"/></blockquote>
			</td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>

</td>
</tr>
</tbody>
</table>

</div>        	
<div class="clear"></div>



