<?php

/**
 * *************************************************************************
 * *                YULearn Employee LMS - Block - User                   **
 * *************************************************************************
 * @package     blocks                                                    **
 * @subpackage  yulearn_user                                              **
 * @name        YULearn Employee LMS - Block - User                       **
 * @copyright   UIT Innovation lab & EAAS                                 **
 * @link                                                                  **
 * @author      Patrick Thibaudeau                                        **
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later  **
 * *************************************************************************
 * ************************************************************************ */
defined('MOODLE_INTERNAL') || die();

use local_yulearn\YULearnUser;

class block_yulearn_user extends block_base {

    public function init() {
//        $this->title = get_string('pluginname', 'block_yulearn_user');
        $this->title = '';
    }

    public function get_required_javascript() {
        //Load strings for JS
        $stringman = get_string_manager();
        $strings = $stringman->load_component_strings('block_yulearn_user', current_language());
        $this->page->requires->strings_for_js(array_keys($strings), 'block_yulearn_user');
    }

    public function get_content() {
        global $CFG, $USER, $DB, $COURSE;

        include_once($CFG->dirroot . '/user/lib.php');

        $this->get_required_javascript();

        //Load CSS
        $this->page->requires->css('/blocks/yulearn_user/css/styles.css');
        $this->page->requires->js_call_amd('block_yulearn_user/load_user_info', 'init');

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        $html = '<div id="block_yulearn_user_info_container">';
        $html .= file_get_contents($CFG->dirroot . '/blocks/yulearn_user/loader.php');
        $this->content->text = $html;
        return $this->content;
    }

    // my moodle can only have SITEID and it's redundant here, so take it away
    public function applicable_formats() {
        return array(
            'site-index' => false,
            'my' => true,
            'course-view' => false,
            'mod' => false
        );
    }

    public function instance_allow_multiple() {
        return false;
    }

    function has_config() {
        return false;
    }

}
