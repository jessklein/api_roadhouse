<div class="team">
    <h3>Raid Team 1</h3>
    <table id="vanguard1">
        <thead>
            <th>Slot</th>
            <th>Character</th>
            <th>iLvl</th>
        </thead>
        <tbody>
            <tr>
                <td><strong>Tank</strong></td>
                <?php $name = 'Amgpoptarts';
                    $character = $armory->getCharacter($name);
                    $thumbnailurl = $character->getThumbnailURL();
                    $gear = $character->getGear();
                    $milevel = $gear['averageItemLevelEquipped'];
                    $stats = $character->getStats();
                    $classname=$character->getClassName();
                        if($classname=='Death Knight') {
                            $classname='DeathKnight';
                        }
                    echo('<td class="'.$classname.'"><img class="thumb" src="'.$thumbnailurl.'" align="left" /><strong><a href="http://us.battle.net/wow/en/character/illidan/'.$name.'/simple" class="'.$classname.'">'.$name.'</a></strong></td><td class="ilvl">'.$milevel.'</td>'); ?>
            </tr>
        </tbody>
    </table>
</div>
<div class="clear"></div>