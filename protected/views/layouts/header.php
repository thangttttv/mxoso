<!DOCTYPE HTML PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/ico" href="<?php echo Yii::app()->params['static_url']?>images/favicon.ico" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name="copyright" content="TTV" />
    <meta name='revisit-after' content='1 days' />  
    <meta name="author" content="xo so" />
    <meta name="generator" content="http://10h.vn"/>
    <meta name="abstract" content="http://10h.vn"/>
    <meta name="geo.region" content="VN-Hà Nội" />
    <meta name="keywords" content="<?php $this->keywords;?>"/>
    <meta name="description" content="<?php echo $this->description;?>">
    <title><?php echo $this->title;?></title>
    <link href="<?php echo Yii::app()->params['static_url'];?>css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo Yii::app()->params['static_url'];?>js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->params['static_url'];?>js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->params['static_url'];?>js/jquery.countdown.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['static_url'];?>css/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <script type="text/javascript">
        $(document).ready(function() {
            $("#menu li").on("click", function() {
                $("#menu li").removeClass("active");
                $(this).addClass("active");
            });

            $(".icon_header").click(function(){
                $(".Menu").slideToggle('slow');
                $(".MenuUser").slideUp('fast');
                //alert('test'); 
            });

            $(".icon_User").click(function(){
                $(".MenuUser").slideToggle('slow');
                $(".Menu").slideUp('fast');
                //alert('test'); 
            });

        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-52533432-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
<center>
<div class="header">
    <div class="logo_header">
        <a href="<?php echo Yii::app()->params['base_url'];?>">
            <img src="<?php echo Yii::app()->params['static_url'];?>images/Logo.png" alt="10h.vn"/>
        </a>
    </div>
    <div class="icon_header">
        <a href="javascript:void(0);"><img src="<?php echo Yii::app()->params['static_url'];?>images/icon.png" class="p-t-b-5"/></a>
    </div>
    <div class="icon_User">
        <?php if(isset($_SESSION['username'])){?>
            <a href="javascript:void(0);"><img src="<?php echo $_SESSION['avatar'];?>" style="width:30px" /></a>
            <?php }else{?>
            <a href="javascript:void(0);"><img src="<?php echo Yii::app()->params['static_url'];?>images/User.png" style="padding:2px 0 2px 0;" alt=""/></a>
            <?php }?>
    </div>

    <div class="MenuUser" style="display:none;">
        <div class="icon_MenuUser">
            <img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-arrows4.png" />
        </div>
        <div class="content_Menu">
            <ul>

                <?php if(isset($_SESSION['username'])){?>
                    <li>
                    <a href="<?php echo Yii::app()->createUrl('user/changepass');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/User1.png" alt="" class="b b1" />Đổi mật khẩu</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                    <li>
                    <a href="<?php echo Yii::app()->createUrl('user/changeinfo');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/User1.png" alt="" class="b b1" />Thay đổi thông tin</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('user/logout');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/User1.png" alt="" class="b b1" />Đăng xuất</a>
                        <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                    </li>
                    </li>
                    </li>
                    <?php }else{?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('user/index');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/User1.png" alt="" class="b b1" />Đăng nhập</a>
                        <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('user/register');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/User1.png" alt="" class="b b1" />Đăng ký</a>
                        <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                    </li>
                    <?php }?>

            </ul>
        </div>
    </div>

    <div class="Menu" style="display:none;">
        <div class="icon_Menu">
            <img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-arrows4.png" />
        </div>
        <div class="content_Menu">
            <ul>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('home/index');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-home.png" alt="" class="b b1" />Trang chủ</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('ketqua/mienbac');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-kq.png" alt="" class="b b1" />Kết quả</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('thongke/index');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-TK.png" alt="" class="b b1" />Thống kê</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('vip/index');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-TIP.png" alt="" class="b b1" />Vip</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('tienich/quaythu');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-QT.png" alt="" class="b b1" />Quay Thử</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('tienich/somo',array('page'=>1));?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-SM.png" alt="" class="b b1" />Số Mơ</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('tienich/calendar');?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-LMT.png" alt="" class="b b1" />Lịch Mở Thưởng</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('user/chudehot',array('page'=>1));?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-CDH.png" alt="" class="b b1" />Chủ đề hot</a>
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/arrows.png" alt="" class="arrows"/> 
                </li>
            </ul>
        </div>
    </div>

</div>
            <div class="Main">