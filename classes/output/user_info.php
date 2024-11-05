<?php

namespace block_yulearn_user\output;

class user_info implements \renderable, \templatable
{


    public function __construct()
    {

    }

    /**
     *
     * @param \renderer_base $output
     * @return type
     * @global \moodle_database $DB
     * @global type $USER
     * @global type $CFG
     */
    public function export_for_template(\renderer_base $output)
    {
        global $USER, $CFG, $DB;

        $YULEARNUSER = new \local_yulearn\YULearnUser();
        $user = $DB->get_record('user', ['id' => $USER->id]);
        $userDetails = $YULEARNUSER->getUserDetails($user);

        $params = [];

        $department = '';
        foreach ($userDetails['employee'] as $key => $e) {
            $department .= $e['department'] . '<br> <strong>' . $e['position'] . '</strong> <hr>'; // Space required after strong for rtrim to work
        }

        $data = [
            'wwwroot' => $CFG->wwwroot,
            'userId' => $userDetails['id'],
            'userImage' => $userDetails['profileimageurl'],
            'fullName' => $userDetails['fullname'],
            'department' => rtrim($department, '<hr>'),
        ];
//        print_object($data);
        return $data;
    }

}