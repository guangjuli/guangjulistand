<?php
namespace Ads\Base\Controller\Home;

class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndexPost($params = [])
    {
        //return print_r($params,true);

        echo  'neirong';
    }

    /**
     * 后台首页
     */
    public function doIndex($params = [])
    {
        //return print_r($params,true);
        return 'neirong';
        return $this->_s;
    }

    public function doDemo()
    {

        Model('ApiLog')->sniffer();
        D(req());
        echo \Grace\Req\Uri::getInstance()->getar();
        headers();
        echo 'test测试';
    }

}
