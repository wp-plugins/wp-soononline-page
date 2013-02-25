<?php
function showSoonOnlineDefaultPage()
{
    showSoonOnlinePage(trim(get_bloginfo('title')));
}

function showSoonOnlinePage($title)
{
    
?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>
            <?php echo $title; ?>
        </title>
        <style type="text/css">

<?php 
	
		function translateFont($font) {
		
		if ($font=="_arial") { $realfont="Arial";}
		else if ($font=="_georgia") { $realfont="Georgia";}
		else if ($font=="_helvetica_neue") { $realfont="Helvetica Neue";}
		else if ($font=="_impact") { $realfont="Impact";}
		else if ($font=="_lucida") { $realfont="Lucida";}
		else if ($font=="_palatino") { $realfont="Palatino";}
		else if ($font=="_tahoma") { $realfont="Tahoma";}
		else if ($font=="_trebuchet") { $realfont="Trebuchet";}
		else if ($font=="_georgia") { $realfont="Georgia";}
		else if ($font=="_verdana") { $realfont="Verdana";}
		else if ($font=="_Times") { $realfont="Times";}
		return $realfont;

	}
	
?>            
            .bodyTitle{
            	font-family: <?php echo translateFont(get_option('soonOnlineTitleFont'));?>;
                width: 400px;
                margin-top: 10%;
                margin-right: auto;
                margin-left: auto;
                font-size: 28px;
                font-weight: normal;
                display: block;
                text-align: center;
                 color: <?php echo get_option('soonOnlineBTitlecolor');?>;
            
            }
            
            .bodyDescription{
                width: 400px;
                margin-top: 15px;
                margin-right: auto;
                margin-left: auto;
                font-size: 18px;
                font-weight: normal;
                display: block;
                text-align: center;
                color: <?php echo get_option('soonOnlineBTextcolor');?>;
                
            }
            
            .mobimain {
	            width :400px;
	            margin: 0 auto;
	            text-align: center;
            }
            
            body {
                margin-left: 0px;
                margin-top: 100px;
                margin-right: 0px;
                margin-bottom: 0px;
                background-color: <?php echo get_option('soonOnlineBGcolor');?>;
                color: #FFF;
                font-family: Arial, Helvetica, sans-serif;
            }
            
            .logo {
	            
            }
        </style>
    </head>
    <body>
    	<div class="mobimain">
    	<img class="logo" src="<?php echo get_option('soonOnlineLogo');?>"/>
        <span class="bodyTitle">
            <?php echo get_option('soonOnlineTitle');?>
        </span>
        <br/>
        <span class="bodyDescription">
            <?php 
            echo stripslashes(nl2br(get_option('soonOnlineDescription')));
            ?>
        </span>
    	</div>
    </body>
</html>
<?php 
}
?>