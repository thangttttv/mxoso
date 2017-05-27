

<?php
    $url = new Url();
?>

<script type="text/javascript">
    $(document).ready(function(){

        $('#dientoan').addClass('active');

        loadChat("<?=$url->createUrl('home/chat')?>");

        var d = new Date();
        var time = d.getHours(); 
        if(time == 18){
            $('#mienbac').html('<a href="<?php echo Yii::app()->createUrl('home/tuongthuatmienbac')?>">XỔ SỐ MIỀN BẮC</a>');
        }
        if(time == 16){
            $('#miennam').html('<a href="<?php echo Yii::app()->createUrl('home/tuongthuatmiennam')?>">XỔ SỐ MIỀN NAM</a>');
            $('#mienbac').html('<a href="<?php echo Yii::app()->createUrl('home/mienbac')?>">XỔ SỐ MIỀN BẮC</a>');
        }
        if(time == 17){
            $('#mientrung').html('<a href="<?php echo Yii::app()->createUrl('home/tuongthuatmientrung')?>">XỔ SỐ MIỀN TRUNG</a>');
            $('#mienbac').html('<a href="<?php echo Yii::app()->createUrl('home/mienbac')?>">XỔ SỐ MIỀN BẮC</a>');
        }

        var currentdate = new Date(); 
        var datetime = currentdate.getFullYear() + "/" + (currentdate.getMonth()+1)  + "/" + (currentdate.getDate()) + " 18:15:00";
        $('.count').countdown(datetime, function(event) {
            $(this).html(event.strftime('%H:%M:%S'));
        });

    });

    function messenger(){
        var messenger = $('.From').val();
        var url = "<?=$url->createUrl('home/chat'); ?>";
        $.ajax({
            type: "GET",
            url: url,
            global: false,
            data: {
                messenger: messenger,
            },
            success: function(msg){
                if(msg==1){
                    alert('Bạn phải đăng nhập để tán gẫu');
                }
                else
                {
                    $("#CHAT").html(msg);
                    $('.From').val('');
                }
            }
        });
    };

    function loadChat(url){
        $.ajax({
            type: "POST",
            url: url,
            global: false,
            data:{},
            success: function(msg){
                $("#CHAT").html(msg);
            }
        });
    }

</script>

<div class="bg_white shadow m-t-10">
    <div class="Note" id="boxnote">
        <?php
             $this->renderPartial('boxnote');
         ?>
    </div>
</div>

<div class="bg_white m-t-10 shadow">
    <div class="menuXS m-t-10">
        <ul>
            <li id="mienbac"><a href="<?php echo Yii::app()->createUrl('home/mienbac')?>">XỔ SỐ MIỀN BẮC</a></li>
            <li id="mientrung"><a href="<?php echo Yii::app()->createUrl('home/mientrung')?>">XỔ SỐ MIỀN TRUNG</a></li>
            <li id="miennam"><a href="<?php echo Yii::app()->createUrl('home/miennam')?>">XỔ SỐ MIỀN NAM</a></li>
            <li id="dientoan"><a href="<?php echo Yii::app()->createUrl('home/dientoan')?>">XỔ SỐ ĐIỆN TOÁN</a></li>
        </ul>
    </div>
    <div class="SM">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="bg_cam">
                <td class="SM_1" colspan="6"><p style="color: #000;">Kết quả xổ số điện toán ngày <?php echo date('d/m/Y',strtotime($data1['ngay_quay'])); ?></p></td>
            </tr>
            <tr class="bg_xam">
                <td class="SM_1" colspan="6"><p style="color: #000;">Kết quả xổ số điện toán 123</p></td>
            </tr>
            <tr class="bg_white">
                <td class="SM_1" colspan="2">
                   <?php echo $data1['ketqua_1'];?>
                </td>
                <td class="SM_1" colspan="2">
                    <?php echo $data1['ketqua_2'];?>
                </td>
                <td class="SM_1" colspan="2">
                    <?php echo $data1['ketqua_3'];?>
                </td>
            </tr>
            
            <tr class="bg_xam">
                <td class="SM_1" colspan="6"><p style="color: #000;">Kết quả xổ số Thần tài</p></td>
            </tr>
            <tr class="bg_white">
                <td class="SM_1" colspan="6">
                   <?php echo $data2['ketqua'];?>
                </td>
            </tr>
            
            <?php if(!empty($data3)){?>
            <tr class="bg_xam">
                <td class="SM_1" colspan="6"><p style="color: #000;">Kết quả xổ số điện toán 6x26 ngày <?php echo $data3['ngay_quay'];?></p></td>
            </tr>
            <tr class="bg_white">
                <td class="SM_1">
                   <?php echo $data3['ketqua_1'];?>
                </td>
                <td class="SM_1">
                   <?php echo $data3['ketqua_2'];?>
                </td>
                <td class="SM_1">
                   <?php echo $data3['ketqua_3'];?>
                </td>
                <td class="SM_1">
                   <?php echo $data3['ketqua_4'];?>
                </td>
                <td class="SM_1">
                   <?php echo $data3['ketqua_5'];?>
                </td>
                <td class="SM_1">
                   <?php echo $data3['ketqua_6'];?>
                </td>
            </tr>
            <?php }?>
            
        </table>
    </div>
    
    <div class="LOTOTT">
        <div class="sms_LOTOTT">
           <?php echo Yii::app()->params['static_sms'];?>
        </div>
    </div>

</div>

<div class="CHAT shadow">
    <div class="titleCHAT">
        Tán Gẫu
    </div>

    <div class="userCHAT">
        <textarea name="CHAT" placeholder="Nhập nội dung chat" cols="50" rows="2" class="From"></textarea>
    </div>
    <div style="padding:15px 20px 20px 0; text-align:right;">
        <a href="javascript:void(0);" id="emotion"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-yahoo.png" width="22" height="22" style="padding-right:10px;"></a>
        <a href="javascript:void(0);" onclick="loadChat('<?=$url->createUrl('home/chat')?>');"><img src="<?php echo Yii::app()->params['static_url'];?>images/Refresh.png" width="22" height="22" style="padding-right:10px;" /></a>
        <a href="javascript:void(0);" onclick="messenger();" class="button_KQ">Gửi bình luận</a>
    </div>

    <div class="boxCHAT" id="CHAT"> </div>

    <?php $this->renderPartial('boxemotion');?>

</div>