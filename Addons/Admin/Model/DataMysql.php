<?php

namespace Addons\Model;

class DataMysql implements \Grace\Base\ModelInterface
{
    public function __construct()
    {
    }

    /**
     * 返回依赖关系
     * @return array
     */
    public function depend()
    {
        return [
        ];
    }

    public function menuLib()
    {
        //todo 转数据库
        return [
            [
                'title' => 'Dashboard',
                'icon' => 'glyphicon glyphicon-home',
                'ca' => 'Home.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '设置',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'Set.Index',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => '界面设置',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Set.Gui',
                                'active' => 0,
                            ],

                        ],
                    ],
                    [
                        'title' => 'Help',
                        'icon' => 'glyphicon glyphicon-home',
                        'ca' => 'Help.Index',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Help',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Index',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Table',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Table',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Form',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Form',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Form2',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Form2',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Page',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Page',
                                'active' => 0,
                            ],
                            [
                                'title' => 'JsAction',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Jsaction',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Modelsupport',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Modelsupport',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Model',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Model',
                                'active' => 0,
                            ],

                        ],
                    ],

                ],
            ],

            /**
             * API相关
             *
             */
            [
                'title' => 'AppApi',
                'icon' => 'glyphicon glyphicon-home',
                'ca' => 'Api.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => 'Api',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'Api.List',
                        'active' => 0,
                        'child' => [

                            [
                                'title' => '列表',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.List',
                                'active' => 0,
                            ],
                            [
                                'title' => '添加',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.List',
                                'ext'=>'add',
                                'active' => 0,
                            ],
                            [
                                'title' => '修改',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.List',
                                'ext'=>'edit',
                                'hidden' => 1,
                                'active' => 0,
                            ],

                            [
                                'title' => '日志',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.Log',
                                'active' => 0,
                            ],

                        ],
                    ],



                ],
            ],
            /**
             * 用户 / 用户组 / token
             */
            [
                'title' => '用户管理',
                'icon' => 'glyphicon glyphicon-home',
                'ca' => 'User.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '用户',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'User.List',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => '用户列表',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'User.List',
                                'active' => 0,
                            ],
                            [
                                'title' => '添加用户',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'User.List',
                                'ext'=>'add',
                                'active' => 0,
                            ],

                            [
                                'title' => '修改用户',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'User.List',
                                'ext'=>'edit',
                                'hidden'=>1,
                                'active' => 0,
                            ],
                        ],
                    ],
                    [
                        'title' => '用户组',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'User.Group',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => '用户组列表',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'User.Group',
                                'active' => 0,
                            ],
                            [
                                'title' => '添加用户组',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'User.Group',
                                'ext'=>'add',
                                'active' => 0,
                            ],

                            [
                                'title' => '修改用户组',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'User.Group',
                                'ext'=>'edit',
                                'hidden'=>1,
                                'active' => 0,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Token',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'Token.Index',
                        'active' => 0,
                        'child' => [
                        ],
                    ],



                ],
            ],
            [
                'title' => '搜索',
                'icon' => 'glyphicon glyphicon-home',
                'ca' => 'Search.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '搜索用户',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'Search.User',
                        'active' => 0,
                        'child' => [
                        ],
                    ],
                ],
            ],

        ];
    }



}
