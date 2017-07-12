<h3>Roadhouse Guild Roster (100s Only)</h3>
        <table id="85s" class="tablesorter">
            <thead>
                <tr>
                    <th filter-type="ddl">Character</th>
                    <th filter-type="ddl">Class</th>
                    <th filter-type="ddl">Spec 1</th>
                    <th filter-type="ddl">Spec 2</th>
                    <th filter-type="ddl">iLvl</th>
                    <th filter-type="ddl">Rank</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //setting up a count because of the way I'm generating the table - the sorter wouldn't band the rows for me otherwise
                    $count=0;
                    //for each character in the roster...
                    foreach ($members as $member) {
                        //get character name
                        $mname = $member['character']['name'];
                        //get guild rank
                        $guildrank   = $member['rank'];
                        $grank = $guild_ranks[$guildrank];
                        //get character data
                        $membero = $armory->getCharacter($mname);
                        //get ilvl
                        $gear = $membero->getGear();
                        $milevel = $gear['averageItemLevelEquipped'];
                        // Retrieve stats such as HP,mana,AP,AGIhit,parry etc.
                        // $stats = $membero->getStats();
                        /* $mresil = $stats['resil']; */
                        // Returns the complete URL for a character thumbnail
                        $thumbnailurl = $membero->getThumbnailURL();
                        //get character lvl
                        $level = $membero->getLevel();
                        //if character is 85
                        if($level==100) {
                            //if character data isn't valid - indicate data not available
                            if(!$membero->isValid()) {
                                echo('<tr><td>Character Data Not Available</td></tr>');
                            } else {
                                //get character class (altered for css)
                                $classname=$membero->getClassName();
                                if($classname=='Death Knight') {
                                    $classname='DeathKnight';
                                }
                                //get character class to display
                                $charclass=$membero->getClassName();
								
								// Get all talent trees
								// $talents = $membero->getTalents();
								// Get active talent tree
								// $activetalents = $membero->getActiveTalents();
								// Get inactive talent tree
								// $inactivetalents = $membero->getInactiveTalents();
								
                                //print out relevant data
                                if($count%2==0) { 
                                    echo('<tr class="even"><td class='.$classname.'><img class="thumb" src="'.$thumbnailurl.'" align="left" /><strong><a href="http://us.battle.net/wow/en/character/illidan/'.$mname.'/simple" class='.$classname.'>'.$mname.'</a></strong></td><td>'.$classname.'</td><td></td><td></td><td class="ilvl">'.$milevel.'</td><td class="grank">'.$grank.'</td></tr>');
                                } else {
                                    echo('<tr class="odd"><td class='.$classname.'><img class="thumb" src="'.$thumbnailurl.'" align="left" /><strong><a href="http://us.battle.net/wow/en/character/illidan/'.$mname.'/simple" class='.$classname.'>'.$mname.'</a></strong></td><td>'.$classname.'</td><td></td><td></td><td class="ilvl">'.$milevel.'</td><td class="grank">'.$grank.'</td></tr>');
                                }
                            }
                            //increment count
                            $count++;
                        }
                    }
                ?>
            </tbody>
        </table>
