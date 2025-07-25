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
 * Atto button insert panel - based on a template by Justin Hunt.
 *
 * @package    atto_panel
 * @copyright  Richard Jones {@link http://richardnz.net/}
 * @copyright  2023 G J Barnard - {@link http://moodle.org/user/profile.php?id=442195}.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Initialise this plugin.
 *
 * @param string $elementid
 */
function atto_panel_strings_for_js() {
    global $PAGE;

    $PAGE->requires->strings_for_js(
        [
            'insert',
            'cancel',
            'content',
            'content_desc',
            'defaultcontent',
            'dialogtitle',
        ],
        'atto_panel');
}

/**
 * Return the js params required for this module.
 *
 * @return array of additional params to pass to javascript init function for this module.
 */
function atto_panel_params_for_js() {

    // Config our array of data.
    $params = [];

    // Get the configured start and end tags from Simple panel.
    $config = get_config('filter_simplefilter');
    $params['starttag'] = $config->starttag;
    $params['endtag'] = $config->endtag;

    return $params;
}

