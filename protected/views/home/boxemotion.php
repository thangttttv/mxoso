
<script type="text/javascript">

    $(document).ready(function(){
        $('#emotion').click(function(){
            $('.box_emotion').slideToggle();
        });
    });
    
    function emotion(code){
        $('.From').val($('.From').val()+ ' ' + code + " ");
    }
    
    function emotion_1()
    {
        $('.emotion_1').show();
        $('.emotion_2').hide();
    }
    
    function emotion_2()
    {
        $('.emotion_1').hide();
        $('.emotion_2').show();
    }
    
</script>

<div class="box_emotion" style="display: none;">
    <ul class="emotion_1">
        <li>
            <a href="javascript:void(0);" onclick="emotion('[01]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/1.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[02]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/2.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[03]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/3.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[04]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/4.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[05]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/5.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[06]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/6.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[07]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/7.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[08]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/8.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[09]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/9.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[10]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/10.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[11]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/11.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[12]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/12.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[13]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/13.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[14]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/14.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[15]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/15.gif">
            </a>
        </li>
    </ul>
    
    <ul class="emotion_2" style="display: none;">
        <li>
            <a href="javascript:void(0);" onclick="emotion('[16]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/16.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[17]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/17.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[18]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/18.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[19]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/19.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[20]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/20.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[21]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/21.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[22]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/22.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[23]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/23.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[24]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/24.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[25]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/25.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[26]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/26.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[27]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/27.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[28]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/28.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[29]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/29.gif">
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="emotion('[30]')">
                <img src="<?php echo Yii::app()->params['static_url'];?>images/emotion/30.gif">
            </a>
        </li>
    </ul>
    
    <div>
        <a class="button_KQ" href="javascript:void(0);" onclick="emotion_1();">1</a>
        &nbsp;
        <a class="button_KQ" href="javascript:void(0);" onclick="emotion_2();">2</a>
    </div>
    
</div>
<!--<div class="icon_emotion">
    <img src="<?php //echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-arrow6.png" />
</div>-->