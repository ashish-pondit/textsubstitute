<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin strings are defined here.
 *
 * @package     filter_textsubstitute
 * @category    string
 * @copyright   2024 Ashish Pondit <ashish.pondit@dsinnovators.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class filter_textsubstitute extends moodle_text_filter {
    public function filter($text, array $options = []) {
        if (!isset($options['originalformat'])) {
            return $text;
        }
        if (in_array($options['originalformat'], explode(',', get_config('filter_textsubstitute', 'formats')))) {
            return $this->replace_word($text);
        }
        return $text;
    }

    protected function replace_word($text) {
        $searchterm = get_config('filter_textsubstitute', 'searchterm');
        $replacewith = get_config('filter_textsubstitute', 'substituteterm');
        $text = str_replace($searchterm, $replacewith, $text);
        return $text;
    }
}
