<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>招商合作-商家入驻</title>
    <link rel="icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/css/pages-sampling.css" />
</head>

<body>
    <!-- 头部栏位 -->
    <!--页面顶部-->
    <div id="nav-bottom">
        <!--顶部-->
        <div class="nav-top">
            <div class="top">
                <div class="py-container">
                    <div class="shortcut">
                        <ul class="fl">
                            <li class="f-item">品优购欢迎您！</li>
                            <li class="f-item">请<a href="{{ route('home_login') }}" target="_blank">登录</a>　<span><a href="{{ route('regist') }}"
                                        target="_blank">免费注册</a></span></li>
                        </ul>
                        <ul class="fr">
                            <li class="f-item">我的订单</li>
                            <li class="f-item space"></li>
                            <li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
                            <li class="f-item space"></li>
                            <li class="f-item">品优购会员</li>
                            <li class="f-item space"></li>
                            <li class="f-item">企业采购</li>
                            <li class="f-item space"></li>
                            <li class="f-item">关注品优购</li>
                            <li class="f-item space"></li>
                            <li class="f-item" id="service">
                                <span>客户服务</span>
                                <ul class="service">
                                    <li><a href="{{ route('cooperation') }}" target="_blank">合作招商</a></li>
                                    <li><a href="{{ route('index') }}" target="_blank">商家后台</a></li>
                                </ul>
                            </li>
                            <li class="f-item space"></li>
                            <li class="f-item">网站导航</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--头部-->
            <div class="header">
                <div class="py-container">
                    <div class="yui3-g Logo">
                        <div class="yui3-u Left logoArea">
                            <a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
                        </div>
                        <div class="yui3-u Center searchArea">
                            <div class="search">
                                <form action="" class="sui-form form-inline">
                                    <!--searchAutoComplete-->
                                    <div class="input-append">
                                        <input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
                                        <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                                    </div>
                                </form>
                            </div>
                            <div class="hotwords">
                                <ul>
                                    <li class="f-item">品优购首发</li>
                                    <li class="f-item">亿元优惠</li>
                                    <li class="f-item">9.9元团购</li>
                                    <li class="f-item">每满99减30</li>
                                    <li class="f-item">亿元优惠</li>
                                    <li class="f-item">9.9元团购</li>
                                    <li class="f-item">办公用品</li>

                                </ul>
                            </div>
                        </div>
                        <div class="yui3-u Right shopArea">
                            <div class="fr shopcar">
                                <div class="show-shopcar" id="shopcar">
                                    <span class="car"></span>
                                    <a class="sui-btn btn-default btn-xlarge" href="{{ route('cart') }}" target="_blank">
                                        <span>我的购物车</span>
                                        <i class="shopnum">0</i>
                                    </a>
                                    <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                        <p>"啊哦，你的购物车还没有商品哦！"</p>
                                        <p>"啊哦，你的购物车还没有商品哦！"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="yui3-g NavList">
                        <div class="yui3-u Left all-sort">
                            <h4>全部商品分类</h4>
                        </div>
                        <div class="yui3-u Center navArea">
                            <ul class="nav">
                                <li class="f-item">服装城</li>
                                <li class="f-item">美妆馆</li>
                                <li class="f-item">品优超市</li>
                                <li class="f-item">全球购</li>
                                <li class="f-item">闪购</li>
                                <li class="f-item">团购</li>
                                <li class="f-item">有趣</li>
                                <li class="f-item"><a href="{{ route('seckill') }}" target="_blank">秒杀</a></li>
                            </ul>
                        </div>
                        <div class="yui3-u Right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#service").hover(function () {
                $(".service").show();
            }, function () {
                $(".service").hide();
            });
            $("#shopcar").hover(function () {
                $("#shopcarlist").show();
            }, function () {
                $("#shopcarlist").hide();
            });

        })

    </script>
    <script type="text/javascript" src="/js/plugins/jquery.easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/js/plugins/sui/sui.min.js"></script>
</body>
<!--供应商-->
<div class="banner">
</div>
<div class="sampling">
    <div class="py-container">
        <div class="title">
            <h1>品优购欢迎一切 正直的、拥有优质品牌与商品的供应商朋友 加入品优购供应链</h1>
        </div>
        <div class="content">
            <div class="item">
                <h3 class="center">品优购供应商原则</h3>
                <p class="center">廉洁正直、公平合理的合作关系互助互补、竞合共赢的双重受益合作模式致力于长期、战略性合作</p>
            </div>
            <div class="item">
                <h3 class="center">供应商洽谈联系方式</h3>
                <p class="bold">1、您可通过以下指定邮箱地址提交合作申请，收到邮件将预计在2个工作日内给予回复。</p>
                <table class="sui-table table-nobordered">
                    <thead>
                        <tr>
                            <th>事业部</th>
                            <th>一级类目</th>
                            <th>邮箱</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>家电事业部</td>
                            <td>家用电器</td>
                            <td>jdzs@pinyougou.com</td>
                        </tr>
                        <tr>
                            <th rowspan="5">大服饰事业部</th>
                            <td>鞋靴</td>
                            <td>wangqingchao@pinyougou.com</td>
                        </tr>
                        <tr>
                            <td>钟表</td>
                            <td>zhuliwei1@pinyougou.com</td>
                        </tr>
                        <tr>
                            <td>箱包</td>
                            <td>machao7@pinyougou.com</a></td>
                        </tr>
                        <tr>
                            <td>珠宝</td>
                            <td>zhouzhen@pinyougou.com</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #E5E2E2;">
                            <td>奢侈品</td>
                            <td>fuzheng5@pinyougou.com</td>
                        </tr>
                        <tr>
                            <th rowspan="3">居家生活事业部</th>
                            <td>家居/家具/家装/厨具</td>
                            <td rowspan="3">fsjjzs@pinyougou.com</td>
                        </tr>
                        <tr>
                            <td>汽车/汽车用品</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #E5E2E2;">
                            <td>医药保健</td>
                        </tr>
                        <tr>
                            <th rowspan="4">生鲜事业部</th>
                            <td>海鲜水产</td>
                            <td rowspan="4" style="border-bottom: 1px solid #E5E2E2;">
                                <p>freshsourcing@pinyougou.com</p>
                            </td>
                        </tr>
                        <tr>
                            <td>肉禽蛋品</td>
                        </tr>
                        <tr>
                            <td>水果蔬菜</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #E5E2E2;">
                            <td>冷饮冻食</td>
                        </tr>
                    </tbody>
                </table>
                <p class="bold">2、邮件要求如下： </p>
                <p>邮件标题　供应商：公司名称，如“供应商：北京锐灵责任有限公司”</p>
                <p>发送方式　请以邮件正文方式发送，不要采用附件</p>
                <p>邮件内容　请在邮件内复制以下表格并填写信息，*为必填项。</p>
            </div>
            <div class="item question">
                <h3 class="center">常见问题</h3>
                <h4 class="bold">1、基本资质要求</h4>
                <p class="bewrite mark">若您是经销商，请提供：</p>
                <p class="bewrite">
                    营业执照、开户许可证、增税一般纳税人资格、品牌使用及产品代理授权证明<br>
                    品牌授权链需要完整：例如，经销商若为二级代理，需要提供：<br>
                    a. 所经营品牌商标注册证明或商标注册备案通知书<br>
                    b. 品牌商授权给一级代理的授权书<br>
                    c. 一级代理授权给二级代理的授权书
                </p>
                <p class="bewrite mark">若您是生产商，请提供：</p>
                <p class="bewrite">营业执照、开户许可证、商标注册证明或商标注册备案通知书；<br>
                    若商品为委托第三方工厂代为加工的，请额外提供代工厂商的生产许可证及与代工厂商签订的委托加工协议。</p>
                <p class="bewrite mark">若您经营进口商品，请提供：</p>
                <p class="bewrite">进口产品报关单据及相关文件；<br>
                    食品、化妆品必须提供进口产品检疫检验合格证书（批次）。</p>
                <p class="bewrite mark">若您经营净水设备、饮水设备（除陶瓷净水器）等产品，请提供：</p>
                <p class="bewrite">涉及饮用水卫生安全产品卫生许可批件。</p>
                <p class="bewrite mark">若您经营手机，请提供：</p>
                <p class="bewrite">"3C中国国家强制性产品认证证书 、电信设备进网许可证 、无线电发射设备型号核准证"</p>
                <p class="bewrite mark">若您经营电热毯、压力锅、燃气热水器、燃气灶、商用大型厨房电器、10匹以上工业用途的空调等，请提供：</p>
                <p class="bewrite">《工业产品生产许可证》。</p>
                <p class="bewrite mark">若您经营消毒柜，请提供</p>
                <p class="bewrite">消毒产品生产企业卫生许可。</p>
                <p class="bewrite mark">若您经营特殊标识产品，请提供：</p>
                <p class="bewrite">如果商品包装标签标识别或网页描述中有声称获得了某某荣誉证书、专利证书、ISO9001质量管理体系认证、ISO14001环境体系认证、著名品牌、某某活动指定产品等信息的，供应商还应当提供相应的资质文件。</p>
                <p class="bewrite mark">若您是代工厂，我们要求：</p>
                <p class="bewrite">1.
                    企业本身为知名品牌，或具有为国内外市场领先品牌代工的丰富经验，生产标准领先，品控严格（有国际品牌，如雀巢、亿滋、玛氏等，或有国内龙头品牌代工经验，通过严格国际体系认证）<br>
                    2. 具有国内外原产地优质货源采购能力，有较强原料采购议价权（例如有进口权、稳定的国外原产地资源、茶企自有茶园等）<br>
                    3. 健全的质量认证体系，通过ISO、HACCP等检测<br>
                    4. 具有较强的产品研发能力，包括新品开发、配方研发等（便于后期进行战略合作，产品升级、创新等）<br>
                    5.
                    公司产能规模较大，资质齐全，食品类注册资金不低于500万，母婴/日化类注册资金不低于1000万，财务状况稳定，有地方政府支持优先（由于历史原因或国家政策原因导致注册资金不足，但其它条件非常优秀，可经特殊审批后通过）<br>
                    6. 上市企业优先。</p>
                <p class="bewrite mark">注意：我们可能对于某些合作品类的供应商有额外的资质要求，如：</p>
                <p class="bewrite">a、3C认证、质检报告（省级以上检测机构出具的，至少具有CMA标志的）<br>
                    b、是否为线上独家代理（或品优购&线上授权）<br>
                    c、食品流通许可证</p>
                <h4 class="bold">2、合作模式</h4>
                <p class="bewrite">供应商提供商品及页面信息，品优购负责销售及发货给顾客。<br>
                    供应商为自有品牌代工的OEM模式。</p>
            </div>

        </div>
    </div>
</div>

<!-- 底部栏位 -->
<!--页面底部-->
<div class="clearfix footer">
    <div class="py-container">
        <div class="footlink">
            <div class="Mod-service">
                <ul class="Mod-Service-list">
                    <li class="grid-service-item intro  intro1">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro2">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro  intro3">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro4">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro intro5">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="clearfix Mod-list">
                <div class="yui3-g">
                    <div class="yui3-u-1-6">
                        <h4>购物指南</h4>
                        <ul class="unstyled">
                            <li>购物流程</li>
                            <li>会员介绍</li>
                            <li>生活旅行/团购</li>
                            <li>常见问题</li>
                            <li>购物指南</li>
                        </ul>

                    </div>
                    <div class="yui3-u-1-6">
                        <h4>配送方式</h4>
                        <ul class="unstyled">
                            <li>上门自提</li>
                            <li>211限时达</li>
                            <li>配送服务查询</li>
                            <li>配送费收取标准</li>
                            <li>海外配送</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>支付方式</h4>
                        <ul class="unstyled">
                            <li>货到付款</li>
                            <li>在线支付</li>
                            <li>分期付款</li>
                            <li>邮局汇款</li>
                            <li>公司转账</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>售后服务</h4>
                        <ul class="unstyled">
                            <li>售后政策</li>
                            <li>价格保护</li>
                            <li>退款说明</li>
                            <li>返修/退换货</li>
                            <li>取消订单</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>特色服务</h4>
                        <ul class="unstyled">
                            <li>夺宝岛</li>
                            <li>DIY装机</li>
                            <li>延保服务</li>
                            <li>品优购E卡</li>
                            <li>品优购通信</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>帮助中心</h4>
                        <img src="/img/wx_cz.jpg">
                    </div>
                </div>
            </div>
            <div class="Mod-copyright">
                <ul class="helpLink">
                    <li>关于我们<span class="space"></span></li>
                    <li>联系我们<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>商家入驻<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们</li>
                </ul>
                <p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
                <p>京ICP备08001421号京公网安备110108007702</p>
            </div>
        </div>
    </div>
</div>
<!--页面底部END-->

undefined

</html>
