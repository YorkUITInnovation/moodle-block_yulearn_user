<?php
namespace block_yulearn_user;
require_once('../../config.php');

global $PAGE;

$PAGE->set_context(\context_system::instance());

$output = $PAGE->get_renderer('block_yulearn_user');
$userInfo = new \block_yulearn_user\output\user_info();
echo $output->render_user_info($userInfo);