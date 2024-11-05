import jQuery from 'jquery';

export const init = config => {
    let wwwroot = M.cfg.wwwroot;
    $.ajax({
        type: 'GET',
        url: wwwroot + "/blocks/yulearn_user/userinfo.php",
        dataType: "html",
        success: function (resultData) {
            $('#block_yulearn_user_info_container').html(resultData);
        }
    });
};