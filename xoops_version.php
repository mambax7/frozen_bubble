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
$modversion['name'] = _MI_FROZEN_NAME;
$modversion['version'] = 1.3;
$modversion['description'] = _MI_FROZEN_DESC;
$modversion['credits'] = 'Guillaume Cottenceau (http://www.frozen-bubble.org) Original creator of the Game<Br>Glenn Sanson (http://glenn.sanson.free.fr) author of the Java port.';
$modversion['author'] = 'Hervé Thouzard';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'images/frozen_slogo.gif';
$modversion['dirname'] = 'frozen_bubble';

// Admin
$modversion['hasAdmin'] = 1;

// Menu
$modversion['hasMain'] = 1;
$modversion['sub'][1]['name'] = _MI_FROZEN_SUBMENU1;
$modversion['sub'][1]['url'] = "highscores.php";

// Templates
$modversion['templates'][1]['file'] = 'frozen_index.html';
$modversion['templates'][1]['description'] = 'The page to play Frozen Bubble';

$modversion['templates'][2]['file'] = 'frozen_highscores.html';
$modversion['templates'][2]['description'] = 'Online Frozen Bubble High-Scores';

// Module's options
$modversion['config'][1]['name'] = 'offlinehighscores';
$modversion['config'][1]['title'] = '_MI_FROZEN_OFFLINE_SCORES';
$modversion['config'][1]['description'] = '_MI_FROZEN_OFFLINE_DESC';
$modversion['config'][1]['formtype'] = 'yesno';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 0;

$modversion['config'][3]['name'] = 'repeatname';
$modversion['config'][3]['title'] = '_MI_FROZEN_REPEAT_NAME';
$modversion['config'][3]['description'] = '_MI_FROZEN_REPEAT_NAME_DESC';
$modversion['config'][3]['formtype'] = 'yesno';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 1;

//SQL
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "fb_global_time";
$modversion['tables'][1] = "fb_level_time";

$modversion['hasComments'] = 0;
?>