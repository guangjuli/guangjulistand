<?php

namespace Ads\Patient\Controller\Home;

//hook
class BaseController{

    public function __construct(){
    }

    /**
     * @return array
     * 返回可以调用的api
     */
    public function doApi(){
        return [
        ];
    }


    public function doVersion(){
        return '1.0';
    }

    /**
     * @return array
     * 返回依赖关系
     */
    public function doDepend()
    {
        return [
            'asdf',
            'asdf',
        ];
    }

    public function doDependTable()
    {
        return [
            'Menu'
        ];
    }

    public function doMenu()
    {

        $res = [
            [
                'title' => '患者',
                'des'   => '患者',
                'ads'   => 'patient/html/index',
                'hidden'=> 0,
                'sort'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '列表',
                        'ads'   => 'patient/html/list',
                        'hidden'=> 0,
                        'sort'=> 90,
                    ],
                    [ 'title' => '添加',
                        'des'   => '添加',
                        'ads'   => 'patient/html/add',
                        'hidden'=> 0,
                        'sort'=> 20,
                    ],
                    [ 'title' => '编辑',
                        'des'   => '编辑',
                        'ads'   => 'patient/html/edit',
                        'hidden'=> 1,
                        'sort'=> 30,
                    ],
                    [ 'title' => '详情',
                        'des'   => '详情',
                        'ads'   => 'patient/html/detail',
                        'hidden'=> 1,
                        'sort'=> 30,
                    ],
                ]
            ]
        ];
        return $res;
    }

}
