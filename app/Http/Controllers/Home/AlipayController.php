<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;
use App\Models\Order;

class AlipayController extends Controller
{
    public $config = [
        'alipay' => [
            'app_id' => '2016091700530838',
            'notify_url' => 'http://requestbin.fullcontact.com/v235imv2',
            'return_url' => 'http://localhost:9999/alipay/return',
            'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv0k5jBteWTlfECWaT5hXpujaZdWftUr3NqXFin27AAitlC1tUKh1m8vbUGn7mzDd2vdsslpZJ0J/ZE9CKkfwU7UIz1LyFhGHs5Jnw3uTTGFvPWQs6/VTYxALXwOldDdKkjmkxwgcmoyNW2JRfOYZtpyJDEhc3HLC3wvVxG9zoaN0diGJMnkObKy/sm3H1j/HeXv3/qbS1FtqrtmYvnr+Ni7wBLoquSf6B/evWvxJmKzCj3iB1qZxDaD+5C8kcHcWwXRijXN0xxgtyxz2sEgv/fuMCvHqfjpLldUD/q4RlPSbhH5Qm++x6UqwYMY6wjmbX86O0Fph62sh6VbkXZitPQIDAQAB',
            'private_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3fOi5Qa9FfRarBP6vUhDwn9YsrsbtLWLxDofDHVhxzXqNOzP1B0CCouzt7LtpB8SR48Es4hkhz8f2orJBbNiMpYjMSLgHuSZmsHKjHLMKN2E+SUqh3xTiXmMa5MIKPpTpkHPhiEdUq3jVQjaGjfoQ8h1p6KygL7LJl+hk69Zd6JCnVdUMWDMSDzuY7Ft9KvUWDY46OUEhBKRAk3F8lauRVYCjXbu+KdH0UE2DXnjhdqUYhMazyBmsw5XUIA5QO5fja2Pk6RG+YgM9Ma4cpo/GJmfRTIaLTqSJoZ2eLBAr74O+CBicytUx9Z8pgzUMnhgwsFj+9c9m7Nir0cxZE0jbQIDAQAB',
        ],
    ];

    // 发起支付
    public function pay()
    {
        dd(12312);
        // 获取订单号
        $get_order = $_POST['sn'];
      
        

        // 取出订单号的信息
        $order = new \models\Order;
        // 根据订单号取出订单信息
        $data = $order->findBySn($get_order);
        var_dump($data);
        die;
        if($data['is_paid']==0)
        {
            $alipay = Pay::alipay($this->config)->web([
                'out_trade_no' => $sn,    // 本地订单ID
                'total_amount' => $data['money'],    // 支付金额
                'subject' => '品优购订单:'.$data['money'].'元',// 支付标题
            ]);
            $alipay->send();
        }
        else
        {
            die('订单不合法，不允许支付！');
        }

       
    }
    // 支付完成跳回
    public function return()
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！
        echo '<h1>支付成功！</h1> <hr>';
        var_dump( $data->all() );
    }
    // 接收支付完成的通知
    public function notify()
    {
        // 生成支付类的对象
        $alipay = Pay::alipay($this->config);
    
        try{
            // 判断消息是否是支付宝发过来的，以及判断这个消息有没有被中途串改，如果被改了就抛出异常
            $data = $alipay->verify(); // 是的，验签就这么简单！

    
            // 判断支付状态
            if($data->trade_status == 'TRADE_SUCCESS' || $data->trade_status == 'TRADE_FINISHED')
            {
                // 更新订单状态
                $order = new \models\Order;
                // 获取订单信息
                $orderInfo = $order->findBySn($data->out_trade_no);
              
                // var_dump($orderInfo);die;
                // 如果订单的状态为未支付状态 ，说明是第一次收到消息，更新订单状态 
                if($orderInfo['is_paid'] == 0)
                {
                    // 开启事务
                    $order->startTrans();

                    // 设置订单为已支付状态
                    $ret1 = $order->setPaid($data->out_trade_no);

                    // 更新用户的余额
                    $user = new \models\User;
                    
                    $ret2 = $user->addMoney($orderInfo['money'],$orderInfo['user_id']);

                    if($ret1 && $ret2)
                    {
                        // 提交事务
                        $order->commit();
                    }
                    else
                    {
                        // 回滚事务
                        $order->rollback();
                    }
                }

            }
        } catch (\Exception $e) {
            die('非法的消息');
        }
    
        // 回应支付宝服务器（如何不回应，支付宝会一直重复给你通知）
        $alipay->success()->send();
    }

    // 退款
    public function refund()
    {
        // 生成唯一退款订单号
        $refundNo = md5( rand(1,99999) . microtime() );
        try{
            // 退款
            $order = [
                'out_trade_no' => '153631571',    // 之前的订单流水号
                'refund_amount' => 1907278.87,              // 退款金额，单位元
                'out_request_no' => $refundNo,     // 退款订单号
            ];

            // 退款
            $ret = Pay::alipay($this->config)->refund($order);

            if($ret->code == 10000)
            {
                echo '退款成功！';
            }
            else
            {
                echo "失败";
                var_dump('$ret');
            }
        }
        catch(\Exception $e)
        {
            var_dump( $e->getMessage() );
        }
    }
}
