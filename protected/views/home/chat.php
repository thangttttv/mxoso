
<?php
    $url = new Url();
    $arr_region = LoadConfig::$region;

    //var_dump($arr_region);
?>
<script type="text/javascript" src="<?php echo Yii::app()->params['static_url']?>js/jemotion.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('.content_USER').emotions({
            handle: '#etoggle',
            dir: '<?php echo Yii::app()->params['static_url'];?>images/emotion/',
        });
        
        $('.reply_textCHAT').emotions({
            handle: '#etoggle',
            dir: '<?php echo Yii::app()->params['static_url'];?>images/emotion/',
        });
        
    });

    function quote(name,content){
        $('.From').val('<@'+name+':'+content+'>')
    }
    
    function moreChat(count){
        var url = "<?=$url->createUrl('home/morechat'); ?>";
        $.ajax({
            type: "POST",
            url: url,
            data:{
                count: count,
            },
            success:function(msg){
                $("#CHAT").html(msg);
            }
        });
    }

</script>

<?php for($i=0;$i<count($data);$i++){ 
        $find = '<';
    ?>

    <?php if(strpos($data[$i]['content'],$find) == 'false'){?>
        <?php
            $string[$i] = explode($find, $data[$i]['content']);
            $find = '>';
            $string[$i] = explode($find, $string[$i][1]);
            $string[$i][4] = "<".$string[$i][0].'>';
            $data[$i]['content'] = str_replace($string[$i][4]," ",$data[$i]['content']);

        ?>
        <?php }?>

    <div class="userCHAT">
        <a href="javascript:void(0);" onclick="quote('<?php echo $data[$i]['username'];?>','<?php echo $data[$i]['content'];?>')" class="quote">
            <div class="avataCHAT">
                <img src="<?php echo $data[$i]['avatar_url'];?>" width="44" height="44" />
            </div>
            <div class="textCHAT">
                <div class="iconCHAT">
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-arrows3.png" width="7" height="14" /> 
                </div>
                <div class="box_textCHAT">
                    <img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-CHAT.png" width="22" height="22" class="img_textCHAT" /> 
                    <span class="name_USER" style="color: #000;"><?php echo $data[$i]['username'];?>:</span>
                    <?php  if(isset($string[$i])){?>

                        <div class="reply_textCHAT">
                            <?php 

                                echo $string[$i][0];
                            ?>
                        </div>
                        <?php }?>

                    <p class="content_USER"><?php echo $data[$i]['content'];?> </p>
                    <span class="time_textCHAT">
                        <?php echo $data[$i]['createtime']?> 
                    </span>
                </div>
            </div>
        </a>
        <div class="both"></div>
    </div>  
    <?php }?> 

    <div style="padding:15px 20px 20px 0; text-align:right;">
        <a class="moreCHAT" href="javascript:void(0);" onclick="moreChat(<?php echo $count;?>)">Xem thêm +</a>
    </div>