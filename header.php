<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <title>Roadhouse Guild Team/Roster Info</title>
    <?php
        //header added because I was still having issues with special characters on my server
        header('Content-type: text/html; charset=UTF-8') ;
        
        //set up Database - I'm still waiting for my keys so I've removed those lines for now
        include('connection.php');
        
        //include Thomas's library class
        include('BattlenetArmory.class.php');
        
        //Set up for server - I've altered cache values because with 807 toons in the guild, no matter what I did I was gonna hit the damn cap and as I said - still waiting on keys
        $armory = new BattlenetArmory('US','Illidan'); //ex. ('US', 'Exodar')
        $armory->setLocale('en_US'); //ex. ('en_US')
        $armory->setGuildsCacheTTL(600000);
        $armory->setCharactersCacheTTL(600000);
        $armory->UTF8(TRUE);
        
        //grab guild
        $guild=$armory->getGuild('Roadhouse');
        
        $guild_ranks = array('0'=>"Guild Master",
                     '1'=>"Guild Master",
                     '2'=>"Officer",
                     '3'=>"Team Leader",
                     '4'=>"Veteran",
                     '5'=>"Member",
                     '6'=>"Social",
					 '7'=>"Recruit");
        $guild->setGuildRankTitles($guild_ranks);

        // Get an array with all members and basic information
		$members = $guild->getMembers();

		// Get an array with all members and basic information sorted
		// sort can be name|class|race|gender|level|rank
		// sortflag can be asc | desc
		$members = $guild->getMembers('name','asc');
    ?>
    <link rel="stylesheet" href="default.css" type="text/css" id="" media="print, projection, screen" />
</head>
<body>
    <div id="header">
        <img src="img/logo.png" alt="" />
    </div>