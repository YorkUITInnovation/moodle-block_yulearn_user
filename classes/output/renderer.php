<?php
namespace block_yulearn_user\output;

class renderer extends \plugin_renderer_base {
    /**
     *
     * @param \templatable $branchList
     * @return type
     */
    public function render_user_info(\templatable $userInfo) {
        $data = $userInfo->export_for_template($this);
        return $this->render_from_template('block_yulearn_user/userinfo', $data);
    }
}