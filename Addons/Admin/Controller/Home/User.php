<?php
namespace Addons\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doUser()
    {
        view();
    }

}
