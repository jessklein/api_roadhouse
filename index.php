<?php include('header.php'); ?>
<div id="wrap"><?php
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 0;
        $page = basename($page);
	if (!empty($page)) {
		$page .= '.php';
                include($page);
	} 	/* if $page has a value, include it */
	else {
		echo '<div id="roster">';
        include('roster.php');
        echo '</div>';
	} 	/* otherwise, include the default page */
?></div>
<!-- <div id="roster"><?php // include('roster.php'); ?></div> 
<div id="teams"><?php // include('teams.php'); ?></div> -->
<?php include('footer.php'); ?>