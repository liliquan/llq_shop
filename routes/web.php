<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('ROOT',base_path());






// 登录
Route::post('/admin/login','Admin\LoginController@login')->name('login');

// 显示登陆页面
Route::get('/admin/login_view','Admin\LoginController@login_view')->name('login_view');

            
//  登录中间件
Route::middleware('admin_login')->group(function(){

// admin / 首页
Route::get('/admin/index','Admin\IndexController@index')->name('index');

Route::get('/admin/home','Admin\IndexController@home')->name('admin_home');

// 产品管理
//          产品类表
Route::get('/admin/product_list','Admin\GoodsController@product_list')->name('product_list');
//          添加商品-------------->显示表单
Route::get('/admin/add_goods','Admin\GoodsController@add_goods')->name('add_goods');
//          添加商品------------->处理表单
Route::post('/admin/insert_goods','Admin\GoodsController@insert_goods')->name('insert_goods');
//           添加商品------------->三级联动
Route::get('/admin/ajax_get_cat','Admin\GoodsController@ajax_get_cat');
//          品牌管理\显示表单
Route::get('/admin/brand','Admin\GoodsController@brand')->name('brand');
//                  添加品牌\处理表单
Route::post('/admin/add_handle','Admin\GoodsController@add_handle')->name('add_handle');

//                  添加品牌
Route::get('/admin/add_brand','Admin\GoodsController@add_brand')->name('add_brand');


//          分类管理
// Route::get('/admin/class','Admin\GoodsController@class')->name('class');
//          产品类型列表
Route::get('/admin/product_type','Admin\GoodsController@product_type')->name('product_type');
//          分类管理-----------------添加分类处理表单
Route::post('/admin/add_type','Admin\GoodsController@add_type')->name('add_type');
//          删除分类
Route::get('/admin/delete_type/{id}','Admin\GoodsController@delete_type')->name('delete_type');


// 图片管理
//          广告管理
Route::get('/admin/adver','Admin\ImageController@adver')->name('adver');
//          分类管理
Route::get('/admin/img_type','Admin\ImageController@img_type')->name('img_type');


// 交易管理
//          交易信息
Route::get('/admin/joyi_message','Admin\JoyiController@message')->name('message');
//          交易订单（图）
Route::get('/admin/joyi_order','Admin\JoyiController@joyi_order')->name('joyi_order');
//          订单管理
Route::get('/admin/joyi_guanli','Admin\JoyiController@joyi_guanli')->name('joyi_guanli');
//          交易金额
Route::get('/admin/joyi_money','Admin\JoyiController@joyi_money')->name('joyi_money');
//          订单处理
Route::get('/admin/joyi_handle','Admin\JoyiController@joyi_handle')->name('joyi_handle');
//          退款管理
Route::get('/admin/joyi_refund','Admin\JoyiController@joyi_refund')->name('joyi_refund');



// 支付管理
//           账户管理
Route::get('/admin/pay_account','Admin\PayController@pay_account')->name('pay_account');
//           支付方式
Route::get('/admin/pay_method','Admin\PayController@pay_method')->name('pay_method');
//           支付配置
Route::get('/admin/pay_config','Admin\PayController@pay_config')->name('pay_config');



// 会员管理
//           会员列表
Route::get('/admin/vip_list','Admin\VipController@vip_list')->name('vip_list');
//           等级管理
Route::get('/admin/vip_grade','Admin\VipController@vip_grade')->name('vip_grade');
//           会员记录列表
Route::get('/admin/vip_record','Admin\VipController@vip_record')->name('vip_record');


// 店铺管理
//          店铺列表
Route::get('/admin/shop_list','Admin\ShopController@shop_list')->name('shop_list');
//          店铺审核
Route::get('/admin/shop_audit','Admin\ShopController@shop_audit')->name('shop_audit');



// 消息管理
//          留言列表
Route::get('/admin/guestbook','Admin\MessageController@guestbook')->name('guestbook');
//          意见反馈
Route::get('/admin/feedback','Admin\MessageController@feedback')->name('feedback');


// 文章管理
//          文章列表
Route::get('/admin/article_list','Admin\ArticleController@article_list')->name('article_list');
//          分类管理
Route::get('/admin/article_type','Admin\ArticleController@article_type')->name('article_type');
//          添加文章
Route::get('/admin/add_article','Admin\ArticleController@add_article')->name('add_article');


// 系统管理
//          系统设置
Route::get('/admin/setup','Admin\SystemController@setup')->name('setup');
//          系统栏目管理
Route::get('/admin/section','Admin\SystemController@section')->name('section');
//          系统日志
Route::get('/admin/log','Admin\SystemController@log')->name('log');


// 管理员管理
//          权限管理
Route::get('/admin/admin_manage','Admin\AdminController@admin_manage')->name('admin_manage');
//          管理员列表
Route::get('/admin/admin_list','Admin\AdminController@admin_list')->name('admin_list');
//          添加管理员
Route::post('/admin/add_adminer','Admin\AdminController@add_adminer')->name('add_adminer');

//          删除管理员
Route::get('/admin/delete_adminer/{id}','Admin\AdminController@delete_adminer')->name('delete_adminer');

//          个人信息
Route::get('/admin/admin_info','Admin\AdminController@admin_info')->name('admin_info');
//          添加权限--->显示视图
Route::get('/admin/add_admin','Admin\AdminController@add_admin')->name('add_admin');
//          添加权限->操作表单
Route::post('/admin/add_power','Admin\AdminController@add_power')->name('add_power');

Route::get('/admin/display','Admin\AdminController@display')->name('display');

// 退出
Route::get('/admin/logout','Admin\LoginController@logout')->name('logout');

});















// ***********************************************    --  前台  --    ***********************************************************

// ---------------首页
Route::get('/','Home\IndexController@index');

// -------------操作首页
Route::get('home/cat','Home\IndexController@cat')->name('cat');





Route::middleware(['home_login'])->group(function()
{


    
// ---------------购物车
Route::get('/home/cart','Home\CartController@cart_show')->name('cart');
Route::get('/goods/carts','Home\CartController@carts');

// ------------添加购物车
Route::post('/home/add_car','Home\CartController@add_car')->name('add_car');

// ---购物车删除
Route::get('/home/delCart','Home\CartController@delCart')->name('delCart');
// ---购物车商品数量加减
Route::get('/home/updateCount','Home\CartController@updateCount')->name('updateCount');
// 修改购物车商品是否选中
Route::get('/home/updateCheck','Home\CartController@updateCheck');


// 支付
Route::post('/home/pay','Home\AlipayController@pay')->name('alipay');

// ---------------支付结算
Route::get('/home/pay_show','Home\PayController@pay_show')->name('pay_show');
// ---------------提交订单
Route::get('/home/submit','Home\PayController@submit')->name('submit');
// ---------------秒杀
Route::get('/home/seckill','Home\SeckillController@seckill')->name('seckill');
// ---------------秒杀---详情
Route::get('/home/seckill_item','Home\SeckillController@seckill_item')->name('seckill_item');
// -----------------------合作招商
Route::get('/home/cooperation','Home\AndController@home')->name('cooperation');
// ---------------------------立即入驻
Route::get('/home/enter','Home\AndController@enter')->name('enter');


// 个人中心 home
Route::get('/home/home','Home\HomeController@home')->name('home');
// 待付款 
Route::get('/home/wait_pay','Home\HomeController@wait_pay')->name('wait_pay');
// 待发货
Route::get('/home/wait_send','Home\HomeController@wait_send')->name('wait_send');
// 待收货
Route::get('/home/wait_receive','Home\HomeController@wait_receive')->name('wait_receive');
// 待评价
Route::get('/home/wait_evaluate','Home\HomeController@wait_evaluate')->name('wait_evaluate');


// 我的收藏
Route::get('/home/collect','Home\HomeController@collect')->name('collect');
// 我的足迹
Route::get('/home/footmark','Home\HomeController@footmark')->name('footmark');


// 个人信息
Route::get('/home/info','Home\HomeController@info')->name('info');




// 地址管理
Route::get('/home/address','Home\HomeController@address')->name('address');
//              添加新地址
Route::post('/home/add_address','Home\HomeController@add_address')->name('add_address');



// 地址管理
Route::get('/home/safe','Home\HomeController@safe')->name('safe');

});

// ---------------登录
Route::get('/home/home_login','Home\LoginController@home_login')->name('home_login');
// ---------------登录
Route::post('/home/home_dolog','Home\LoginController@home_dolog')->name('home_dolog');


// ---------------注册
Route::get('/home/regist','Home\RegistController@regist')->name('regist');

// ---------------注册---------处理表单
Route::get('/home/sendmobilecode','Home\RegistController@sendmobilecode')->name('sendmobilecode');
Route::post('/home/doregist','Home\RegistController@doregist')->name('doregist');

// -----------------搜索
Route::get('/home/search/{id}','Home\SearchController@search')->name('search');



// *********商品详情
Route::get('/home/item/{id}','Home\CartController@item')->name('item');




