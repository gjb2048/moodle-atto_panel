<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Atto button insert panel - based on a template by Justin Hunt
 *
 * @package    atto_panel
 * @copyright  Richard Jones {@link http://richardnz.net/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/**
 * Initialise this plugin
 * @param string $elementid
 */
function atto_panel_strings_for_js() {
    global $PAGE;


    $PAGE->requires->strings_for_js(array('insert',
                                          'cancel',
                                          'enterlinktext',
                                          'defaultlinktext_desc',
                                          'enterpanelid',
                                          'defaultpanelid',
                                          'enterdisplaymode',
                                          'defaultdisplaymode',
                                          'displaymode_desc',
                                          'dialogtitle'),
                                          'atto_panel');
}

/**
 * Return the js params required for this module.
 * @return array of additional params to pass to javascript init function for this module.
 */
function atto_panel_params_for_js(/*$elementid, $options, $fpoption^*/) {
	global $USER, $COURSE;
	//coursecontext
	$coursecontext=context_course::instance($COURSE->id);

	//usercontextid
	$usercontextid=context_user::instance($USER->id)->id;
	$disabled=false;

	//config our array of data
	$params = array();
	$params['usercontextid'] = $usercontextid;

    // If they don't have permission don't show it
	if(!has_capability('atto/panel:visible', $coursecontext) ){
		$disabled=true;
    }

    //add our disabled param
    $params['disabled'] = $disabled;

    // Get the configured start and end tags from Simple panel
     $def_config = get_config('filter_simplepanel');
     $params['starttag'] = $def_config->starttag;
     $params['endtag'] = $def_config->endtag;
    return $params;
}

