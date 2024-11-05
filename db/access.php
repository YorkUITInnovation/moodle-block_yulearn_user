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

$capabilities = array(
    'block/yulearn_user:myaddinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        ),
        'clonepermissionsfrom' => 'moodle/my:manageblocks'
    ),
    'block/yulearn_user:addinstance' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'moodle/site:manageblocks'
    )
);
