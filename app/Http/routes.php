<?php

use App\Http\Controllers;

/**
 * 授权管理
 */
Route::auth();

/**
 * 接口相关
 */
Route::get('api/v1/index', 'ApiController@index');


/**
 *微信接收
 */
Route::group(['prefix' => 'wechat', 'middleware' => ['weixin']], function () {
    Route::any('/', 'WechatController@index');
});

/**
 * 站点主页
 */
Route::get('/', 'HomeController@index');


/**
 * 后台管理
 */
Route::group(['prefix' => 'manage', 'middleware' => ['manage']], function () {


    /**
     * 主页
     */
    Route::get('/', function () {
        return view('manage.home');
    });

    /**
     * 系统设置
     */
    Route::group(['prefix' => 'system'], function () {

        Route::get('/', function () {
            return Redirect::to('/manage/system/user');
        });
        /**
         * 企业管理
         */
        Route::group(['prefix' => 'enterprise'], function () {

            Route::get('/', 'Manage\SystemEnterpriseController@get', ['model' => 'system', 'menu' => 'enterprise']);
            Route::post('/', 'Manage\SystemEnterpriseController@post', ['model' => 'system', 'menu' => 'enterprise']);

        });

        /**
         * 用户管理
         */
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/user/list');
            });
            Route::get('/list/{eid?}', 'Manage\SystemUserController@index', ['model' => 'system', 'menu' => 'user']);
            Route::get('/create/{eid?}', 'Manage\SystemUserController@getCreate', ['model' => 'system', 'menu' => 'user']);
            Route::post('/create', 'Manage\SystemUserController@postCreate', ['model' => 'system', 'menu' => 'user']);
            Route::get('/edit/{id}', 'Manage\SystemUserController@getEdit', ['model' => 'system', 'menu' => 'user']);
            Route::post('/edit', 'Manage\SystemUserController@postEdit', ['model' => 'system', 'menu' => 'user']);
            Route::get('/delete/{id}', 'Manage\SystemUserController@getDelete', ['model' => 'system', 'menu' => 'user']);
        });
        /**
         * 权限管理
         */
        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/permission/list');
            });
            Route::get('/list', 'Manage\SystemPermissionController@index', ['as' => 'system.permission', 'model' => 'system', 'menu' => 'permission']);
            Route::get('/create', 'Manage\SystemPermissionController@getCreate', ['model' => 'system', 'menu' => 'permission']);
            Route::post('/create', 'Manage\SystemPermissionController@postCreate', ['model' => 'system', 'menu' => 'permission']);
            Route::get('/edit/{id}', 'Manage\SystemPermissionController@getEdit', ['model' => 'system', 'menu' => 'permission']);
            Route::post('/edit', 'Manage\SystemPermissionController@postEdit', ['model' => 'system', 'menu' => 'permission']);
            Route::get('/delete/{id}', 'Manage\SystemPermissionController@getDelete', ['model' => 'system', 'menu' => 'permission']);
        });
        /**
         * 角色管理
         */
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/role/list');
            });
            Route::get('/list', 'Manage\SystemRoleController@index', ['model' => 'system', 'menu' => 'role']);
            Route::get('/create', 'Manage\SystemRoleController@getCreate', ['model' => 'system', 'menu' => 'role']);
            Route::post('/create', 'Manage\SystemRoleController@postCreate', ['model' => 'system', 'menu' => 'role']);
            Route::get('/edit/{id}', 'Manage\SystemRoleController@getEdit', ['model' => 'system', 'menu' => 'role']);
            Route::post('/edit', 'Manage\SystemRoleController@postEdit', ['model' => 'system', 'menu' => 'role']);
            Route::get('/permission/{id}', 'Manage\SystemRoleController@getPermission', ['model' => 'system', 'menu' => 'role']);
            Route::post('/permission', 'Manage\SystemRoleController@postPermission', ['model' => 'system', 'menu' => 'role']);
            Route::get('/delete/{id}', 'Manage\SystemRoleController@getDelete', ['model' => 'system', 'menu' => 'role']);
        });


    });
    /**
     * 站点设置
     */
    Route::group(['prefix' => 'site'], function () {
        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/customer/index', ['model' => 'customer', 'menu' => 'config']);

        });


    });

    /**
     * 业务中心
     */
    Route::group(['prefix' => 'business'], function () {

        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/business/index', ['model' => 'business', 'menu' => 'config']);

        });


    });

    /**
     * 财务结算
     */
    Route::group(['prefix' => 'finance'], function () {

        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/finance/index', ['model' => 'finance', 'menu' => 'config']);

        });


    });

    /**
     * 客户关系
     */
    Route::group(['prefix' => 'customer'], function () {
        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/customer/index', ['model' => 'customer', 'menu' => 'config']);

        });


    });

    /**
     * 微信营销
     */
    Route::group(['prefix' => 'weixin'], function () {

        Route::resource('config', 'Supplier\WeixinConfigController');

        Route::get('/', function () {
            return Redirect::to('supplier/weixin/config');
        });


    });

    /**
     * 资源中心
     */
    Route::group(['prefix' => 'resources'], function () {

        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/resources/index', ['model' => 'resources', 'menu' => 'config']);

        });


    });

    /**
     * 三方对接
     */
    Route::group(['prefix' => 'docking'], function () {

        /**
         * 参数设置
         */
        Route::get('/', function () {
            return view('supplier/docking/index', ['model' => 'docking', 'menu' => 'config']);

        });

    });
});


/**
 * 会员中心
 */
Route::group(['prefix' => 'member', 'middleware' => ['manage']], function () {


    /**
     * 主页
     */
    Route::get('/', function () {
        return view('member.home');
    });

});