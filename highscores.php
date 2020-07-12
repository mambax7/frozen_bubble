<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
include_once "header.php";
$xoopsOption['template_main'] = 'frozen_highscores.html';
include_once XOOPS_ROOT_PATH."/header.php";

$myts =& MyTextSanitizer::getInstance();

function uname($uid=0)
{
	global $xoopsConfig;
	static $tblusers = Array();
	$option=-1;

	if(is_array($tblusers) && array_key_exists($uid,$tblusers)) {
		return 	$tblusers[$uid];
	}

	$member_handler =& xoops_gethandler('member');
	$thisuser = $member_handler->getUser($uid);
	if (is_object($thisuser)) {
		$return = $thisuser->getVar('name');
		if ($return == "") {
			$return=$thisuser->getVar('uname');
		}
	} else {
		$return=$xoopsConfig['anonymous'];
	}
	$tblusers[$uid]=$return;
	return $return;
}


$xoopsTpl->assign(array("lang_level"=> _MI_FROZEN_LEVEL ,
			"lang_halloffame" 		=> _MI_FROZEN_HALLOFFAME,
			"lang_time" 			=> _MI_FROZEN_TIME,
			"lang_rank"				=> _MI_FROZEN_PLACE,
			"lang_name" 			=> _MI_FROZEN_SCORENAME));

$oldname='';
$sql=sprintf("SELECT 50-g.from_end as last_level, g.time, g.uid FROM %s g ORDER BY g.from_end, g.time, g.nb_bubbles, g.record_date",$xoopsDB->prefix("fb_global_time"));
$result=$xoopsDB->queryF($sql,10);
while($row1 = $xoopsDB->fetchArray($result)) {
	$time = floor($row1['time']/1000);
	$minutes = (string)(floor($time/60));
	$seconds = (string)($time % 60);
	$hall_time = $myts->htmlSpecialChars(sprintf("%d'%d\"",$minutes,$seconds));
	if(intval($row1['uid'])>0) {
		$hall_name = uname(intval($row1['uid']));
	} else {
		$hall_name = $xoopsConfig['anonymous'];
	}

	if(!$xoopsModuleConfig['repeatname']) {
		if($hall_name==$oldname) {
			$hall_name='';
		} else {
			$oldname=$hall_name;
		}
	}
	$xoopsTpl->append('halloffamescores',array('level'=>$row1['last_level'],'time'=>$hall_time,'name'=>$hall_name));
}

// Affichage des scores de chaque niveau.
for ($i=1 ; $i<=50 ; $i++) {
	$oldname='';
	$scores=Array();
	$sql=sprintf("SELECT t.uid, t.time FROM %s t WHERE t.level=%d ORDER BY time, nb_bubbles, record_date",$xoopsDB->prefix("fb_level_time"),$i);
	$result=$xoopsDB->queryF($sql,3);
	$position = 1;
	$numscores=0;
	while($row = $xoopsDB->fetchArray($result)) {
		$time = floor($row['time']/1000);
		$minutes = (string)(floor($time/60));
		$seconds = (string)($time % 60);
		$score_time =$myts->htmlSpecialChars(sprintf("%d'%d\"",$minutes,$seconds));
		if(intval($row['uid'])>0) {
			$score_name = uname(intval($row['uid']));
		} else {
			$score_name = $xoopsConfig['anonymous'];
		}

		if(!$xoopsModuleConfig['repeatname']) {
			if($score_name==$oldname) {
				$score_name='';
			} else {
				$oldname=$score_name;
			}
		}
		$scores[]=Array("level"=>$position,"time"=>$score_time,"name"=>$score_name);
		$position++;
		$numscores++;
	}
	$xoopsTpl->append('levels',array('number'=>$i,'image'=>'images/img_level'.$i,'numberofscores'=>$numscores,'scores'=>$scores));
}
include_once(XOOPS_ROOT_PATH.'/footer.php');
?>
