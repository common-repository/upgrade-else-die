<?php
/*
Plugin Name: Upgrade Else DIE!
Plugin URI: http://wordpress.org/extend/plugins/upgrade-else-die/
Description: Upgrade Else DIE is not a plugin for those who are interested in offering users a choice between upgrading from IE6 or viewing the site in their current outdated browser. This plugin is mean and aggressive in that it will NOT allow anyone using IE6 to view your site until they upgrade!
Version: 1.1
Author: Josh Jones
Author URI: http://eight7teen.com
*/

// define the needed locations
define('IMGLOC',get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__)).'/images/');
define('PLUGIT',get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__)).'/');


//detect browser
$ie6 = "MSIE 6.0";
$browser = $_SERVER['HTTP_USER_AGENT'];
$browser = substr("$browser", 25, 8);

// create the function
function kill_bill() {

// if IE6, tell it to DIE and go to hell!
die(
"
<link rel='stylesheet' type='text/css' href='".PLUGIT."kill-bill.css' />
</head>
<body>
<div class='warn'>
<h1>WARNING!</h1>
<p>You are using Internet Explorer 6.0. Due to security risks associated
with this outdated browser, as well as its noncompliance with WC3
standards, I have disabled access for all Internet Explorer 6.0 users.</p>

<p>I would love to share the content of this site with you, but unless
you upgrade your browser, this is impossible. There are too many
security risks posed by this outdated browser. Won't you please take
a moment and upgrade—it's 100% free!</p>

<p>If you are at your place of employment and do not have access or
permission to upgrade your browser, please contact your company's IT
department and request an upgraded browser, which will keep your
company's information safe and secure. Upgrading will also improve
your overall browsing experience!</p>

<div class='botright'>

<a href='http://www.crashie.com' title='Click here to upgrade to the latest version of Internet Explorer' onclick='confirm('Are you sure you don't want to upgrade? If you do not upgrade you will not be able to view this site!');' onmouseover=\"window.status='http://www.yahoo.com'; return true\" onmouseout=\"window.status=' '; return true\"><img src='".IMGLOC."yer-stupid.gif' alt='' border='0' onmouseover=\"this.src='".IMGLOC."yer-stupid-hover.gif'\" onmouseout=\"this.src='".IMGLOC."yer-stupid.gif'\" style='margin-right:40px;' /></a>

<a href='http://www.microsoft.com/windows/downloads/ie/getitnow.mspx' title='Click here to upgrade to the latest version of Internet Explorer'><img src='".IMGLOC."upgrade.gif' alt='' border='0' onmouseover=\"this.src='".IMGLOC."upgrade-hover.gif'\" onmouseout=\"this.src='".IMGLOC."upgrade.gif'\"/></a>
</div>
</body>
</html>
"
);}

if($browser == $ie6){ 
add_action('wp_head', 'kill_bill', -1);
}
?>