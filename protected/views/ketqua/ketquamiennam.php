
<?php
    $url = new Url();
?>

<script type="text/javascript">

    loadBoxSearch();

    $(document).ready(function(){

        $('#miennam').addClass('active');

        loadChat("<?=$url->createUrl('home/chat')?>");

        $(".boxCalendar").datepicker({
            dateFormat: 'yy-mm-dd',
            showOn: 'both',
            buttonImage: ' <?php echo Yii::app()->params['static_url'];?>/images/xo-so-10h-icon-LMT.png',
            buttonImageOnly: true,
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
                if(msg==0){
                    alert('Bạn phải chưa nhập nội dung');
                }
                else
                {
                    $("#CHAT").html(msg);
                    $('.From').val('');
                }
            }
        });
    };
    
    function loadBoxSearch(){
        var url = "<?=$url->createUrl('home/boxsearch');?>";
        $.ajax({
            type: "POST",
            url: url,
            global: false,
            data:{},
            success: function(msg){
                $("#boxsearch").html(msg);
            }
        });
    }

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
    <div class="menuXS">
        <ul>
            <li id="mienbac"><a href="<?php echo Yii::app()->createUrl('ketqua/mienbac')?>">XỔ SỐ MIỀN BẮC</a></li>
            <li id="mientrung"><a href="<?php echo Yii::app()->createUrl('ketqua/mientrung')?>">XỔ SỐ MIỀN TRUNG</a></li>
            <li id="miennam"><a href="<?php echo Yii::app()->createUrl('ketqua/miennam')?>">XỔ SỐ MIỀN NAM</a></li>
            <li id="dientoan"><a href="<?php echo Yii::app()->createUrl('ketqua/dientoan')?>">XỔ SỐ ĐIỆN TOÁN</a></li>
        </ul>
    </div>
    <div class="Calendar">
        <center>
            <div>
                <form method="POST" action="<?php echo Yii::app()->createUrl('ketqua/redirectMienNam');?>">
                    <a href="javascript:void(0);">
                        <input type="text" name="date" class="boxCalendar" value="<?php echo $data1['ngay_quay']; ?>" style="text-align: center;" readonly>
                        </br>
                        <input type="submit" value="Tìm kiếm" class="button_KQ">
                    </a>
                </form>
            </div>
        </center>
        <div class="arrowCalendar_1">
            <a href="<?php echo Yii::app()->createUrl('ketqua/ketquamiennam',array('last'=>date("Y-m-d",strtotime("-7 day",strtotime($data1['ngay_quay'])))));?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-arrowlich.png" style="padding-top:14px;"/></a>
        </div>
        <div class="arrowCalendar_2">
            <a href="<?php echo Yii::app()->createUrl('ketqua/ketquamiennam',array('next'=>date("Y-m-d",strtotime("+7 day",strtotime($data1['ngay_quay'])))));?>"><img src="<?php echo Yii::app()->params['static_url'];?>images/xo-so-10h-icon-arrowlich2.png" style="padding-top:14px;"/></a>
        </div>
    </div>
    <div class="titleXSMN">
        Kết quả sổ xố trực tiếp miền Nam ngày <span class="red"><?php echo date('d/m/Y',strtotime($data1['ngay_quay'])); ?></span>
        <p>Đang chờ<span class="red"> KQXS Miền Nam</span> lúc 18h40 - <?php echo date('d/m/Y'); ?>. Còn <span class="count"></span></p>
    </div>
    <table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#c9c9c9">
        <tr class="XSMB_ngang_1 XSMB_ngang_xam">
            <td class="XSMN_1"><span class="red"><?php echo $day;?></span></td>
            <td class="XSMN_2"><span class="red"><?php echo $id1['name'];?></span></td>
            <td class="XSMN_2"><span class="red"><?php echo $id2['name'];?></span></td>
            <td class="XSMN_2"><span class="red"><?php echo $id3['name'];?></span></td>
        </tr>
        <tr class="XSMN_ngang">
            <td class="XSMN_1 bg_white">Giải tám</td>
            <td class="XSMN_2 bg_xam"><?php echo $data1['giai_tam']?></td>
            <td class="XSMN_2 bg_xam"><?php echo $data2['giai_tam']?></td>
            <td class="XSMN_2 bg_xam"><?php echo $data3['giai_tam']?></td>
        </tr>
        <tr class="XSMB_ngang">
            <td class="XSMN_1">Giải bảy</td>
            <td class="XSMN_2 fon16"><?php echo $data1['giai_bay']?></td>
            <td class="XSMN_2 fon16"><?php echo $data2['giai_bay']?></td>
            <td class="XSMN_2 fon16"><?php echo $data3['giai_bay']?></td>
        </tr>
        <tr class="XSMN_ngang">
            <td class="XSMN_1 bg_white">Giải sáu</td>
            <td class="XSMN_2 bg_xam">
                <?php echo $data1['giai_sau_1']?><br />
                <?php echo $data1['giai_sau_2']?><br />
                <?php echo $data1['giai_sau_3']?>
            </td>
            <td class="XSMN_2 bg_xam">
                <?php echo $data2['giai_sau_1']?><br />
                <?php echo $data2['giai_sau_2']?><br />
                <?php echo $data2['giai_sau_3']?>
            </td>
            <td class="XSMN_2 bg_xam">
                <?php echo $data3['giai_sau_1']?><br />
                <?php echo $data3['giai_sau_2']?><br />
                <?php echo $data3['giai_sau_3']?>
            </td>
        </tr>
        <tr class="XSMB_ngang">
            <td class="XSMN_1">Giải năm</td>
            <td class="XSMN_2 fon16"><?php echo $data1['giai_nam']?></td>
            <td class="XSMN_2 fon16"><?php echo $data2['giai_nam']?></td>
            <td class="XSMN_2 fon16"><?php echo $data3['giai_nam']?></td>
        </tr>
        <tr class="XSMN_ngang">
            <td class="XSMN_1 bg_white">Giải tư</td>
            <td class="XSMN_2 bg_xam">
                <?php echo $data1['giai_tu_1']?><br />
                <?php echo $data1['giai_tu_2']?><br />
                <?php echo $data1['giai_tu_3']?><br />
                <?php echo $data1['giai_tu_4']?><br />
                <?php echo $data1['giai_tu_5']?><br />
                <?php echo $data1['giai_tu_6']?><br />
                <?php echo $data1['giai_tu_7']?>
            </td>
            <td class="XSMN_2 bg_xam">
                <?php echo $data2['giai_tu_1']?><br />
                <?php echo $data2['giai_tu_2']?><br />
                <?php echo $data2['giai_tu_3']?><br />
                <?php echo $data2['giai_tu_4']?><br />
                <?php echo $data2['giai_tu_5']?><br />
                <?php echo $data2['giai_tu_6']?><br />
                <?php echo $data2['giai_tu_7']?>
            </td>
            <td class="XSMN_2 bg_xam">
                <?php echo $data3['giai_tu_1']?><br />
                <?php echo $data3['giai_tu_2']?><br />
                <?php echo $data3['giai_tu_3']?><br />
                <?php echo $data3['giai_tu_4']?><br />
                <?php echo $data3['giai_tu_5']?><br />
                <?php echo $data3['giai_tu_6']?><br />
                <?php echo $data3['giai_tu_7']?>
            </td>
        </tr>
        <tr class="XSMB_ngang">
            <td class="XSMN_1">Giải ba</td>
            <td class="XSMN_2 fon16">
                <?php echo $data1['giai_ba_1']?><br />
                <?php echo $data1['giai_ba_2']?>
            </td>
            <td class="XSMN_2 fon16">
                <?php echo $data2['giai_ba_1']?><br />
                <?php echo $data2['giai_ba_2']?>
            </td>
            <td class="XSMN_2 fon16">
                <?php echo $data3['giai_ba_1']?><br />
                <?php echo $data3['giai_ba_2']?>
            </td>
        </tr>
        <tr class="XSMN_ngang">
            <td class="XSMN_1 bg_white">Giải nhì</td>
            <td class="XSMN_2 bg_xam"><?php echo $data1['giai_nhi']?></td>
            <td class="XSMN_2 bg_xam"><?php echo $data2['giai_nhi']?></td>
            <td class="XSMN_2 bg_xam"><?php echo $data3['giai_nhi']?></td>
        </tr>
        <tr class="XSMB_ngang">
            <td class="XSMN_1">Giải nhất</td>
            <td class="XSMN_2 fon16"><?php echo $data1['giai_nhat']?></td>
            <td class="XSMN_2 fon16"><?php echo $data2['giai_nhat']?></td>
            <td class="XSMN_2 fon16"><?php echo $data3['giai_nhat']?></td>
        </tr>
        <tr class="XSMN_ngang">
            <td class="XSMN_1 bg_white"><strong class="red">Đặc biệt</strong></td>
            <td class="XSMN_2 bg_xam"><strong class="red"><?php echo $data1['giai_dacbiet']?></strong></td>
            <td class="XSMN_2 bg_xam"><strong class="red"><?php echo $data2['giai_dacbiet']?></strong></td>
            <td class="XSMN_2 bg_xam"><strong class="red"><?php echo $data3['giai_dacbiet']?></strong></td>
        </tr>
    </table>
    <div class="LOTOTT">
        <div class="sms_LOTOTT">
            <?php echo Yii::app()->params['static_sms'];?>
        </div>
    </div>

    <?php
        $arr_data1[1]= $data1['giai_dacbiet'];
        $arr_data1[2]= $data1['giai_nhat'];
        $arr_data1[3]= $data1['giai_nhi'];
        $arr_data1[4]= $data1['giai_ba_1'];
        $arr_data1[5]= $data1['giai_ba_2'];
        $arr_data1[6]= $data1['giai_tu_1'];
        $arr_data1[7]= $data1['giai_tu_2'];
        $arr_data1[8]= $data1['giai_tu_3'];
        $arr_data1[9]= $data1['giai_tu_4'];
        $arr_data1[10]= $data1['giai_tu_5'];
        $arr_data1[11]= $data1['giai_tu_6'];
        $arr_data1[12]= $data1['giai_tu_7'];
        $arr_data1[13]= $data1['giai_nam'];
        $arr_data1[14]= $data1['giai_sau_1'];
        $arr_data1[15]= $data1['giai_sau_2'];
        $arr_data1[16]= $data1['giai_sau_3'];
        $arr_data1[17]= $data1['giai_bay'];
        $arr_data1[18]= $data1['giai_tam'];

        $arr_data2[1]= $data2['giai_dacbiet'];
        $arr_data2[2]= $data2['giai_nhat'];
        $arr_data2[3]= $data2['giai_nhi'];
        $arr_data2[4]= $data2['giai_ba_1'];
        $arr_data2[5]= $data2['giai_ba_2'];
        $arr_data2[6]= $data2['giai_tu_1'];
        $arr_data2[7]= $data2['giai_tu_2'];
        $arr_data2[8]= $data2['giai_tu_3'];
        $arr_data2[9]= $data2['giai_tu_4'];
        $arr_data2[10]= $data2['giai_tu_5'];
        $arr_data2[11]= $data2['giai_tu_6'];
        $arr_data2[12]= $data2['giai_tu_7'];
        $arr_data2[13]= $data2['giai_nam'];
        $arr_data2[14]= $data2['giai_sau_1'];
        $arr_data2[15]= $data2['giai_sau_2'];
        $arr_data2[16]= $data2['giai_sau_3'];
        $arr_data2[17]= $data2['giai_bay'];
        $arr_data2[18]= $data2['giai_tam'];

        $arr_data3[1]= $data3['giai_dacbiet'];
        $arr_data3[2]= $data3['giai_nhat'];
        $arr_data3[3]= $data3['giai_nhi'];
        $arr_data3[4]= $data3['giai_ba_1'];
        $arr_data3[5]= $data3['giai_ba_2'];
        $arr_data3[6]= $data3['giai_tu_1'];
        $arr_data3[7]= $data3['giai_tu_2'];
        $arr_data3[8]= $data3['giai_tu_3'];
        $arr_data3[9]= $data3['giai_tu_4'];
        $arr_data3[10]= $data3['giai_tu_5'];
        $arr_data3[11]= $data3['giai_tu_6'];
        $arr_data3[12]= $data3['giai_tu_7'];
        $arr_data3[13]= $data3['giai_nam'];
        $arr_data3[14]= $data3['giai_sau_1'];
        $arr_data3[15]= $data3['giai_sau_2'];
        $arr_data3[16]= $data3['giai_sau_3'];
        $arr_data3[17]= $data3['giai_bay'];
        $arr_data3[18]= $data3['giai_tam'];
    ?>

    <table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#eaeaea">
        <tr class="LOTO_ngang">
            <td class="LOTO_1">
                Đầu
            </td>
            <td class="LOTO_2">
                <p><?php echo $id1['name']?></p>
            </td>
            <td class="LOTO_2">
                <p><?php echo $id2['name']?></p>
            </td>
            <td class="LOTO_2">
                <p><?php echo $id3['name']?></p>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                0
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==0)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==0)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==0)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                1
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==1)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==1)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==1)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                2</td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==2)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==2)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==2)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                3
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==3)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==3)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==3)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                4
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==4)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==4)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==4)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                5
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==5)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==5)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==5)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                6
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==6)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==6)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==6)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                7
            </td>
            <td class="LOTO_2 ">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==7)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==7)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==7)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                8
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==8)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==8)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2 XSMB_ngang_xam">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==8)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr class="LOTO_ngang_1">
            <td class="LOTO_1">
                9
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data1);$i++)
                    {
                        if(substr($arr_data1[$i],-2,1)==9)
                        {
                            echo substr($arr_data1[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data2);$i++)
                    {
                        if(substr($arr_data2[$i],-2,1)==9)
                        {
                            echo substr($arr_data2[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
            <td class="LOTO_2">
                <?php
                    for($i=1;$i<=count($arr_data3);$i++)
                    {
                        if(substr($arr_data3[$i],-2,1)==9)
                        {
                            echo substr($arr_data3[$i],-1,1)." ";
                        }
                    }
                ?>
            </td>
        </tr>
    </table>
</div>

<div class="Box m-t-10" id="boxsearch"></div> 

<div class="CHAT shadow">
    <div class="titleCHAT">
        Tán Gẫu
    </div>
    
    <div class="userCHAT">
        <textarea name="CHAT" placeholder="Nhập nội dung chat" cols="50" rows="2" class="From"></textarea>
    </div>
    <div style="padding:15px 20px 20px 0; text-align:right;">
        <a href="javascript:void(0);" onclick="loadChat('<?=$url->createUrl('home/chat')?>');"><img src="<?php echo Yii::app()->params['static_url'];?>images/Refresh.png" width="22" height="22" style="padding-right:10px;" /></a>
        <a href="javascript:void(0);" onclick="messenger();" class="button_KQ">Gửi bình luận</a>
    </div>
    
    <div class="boxCHAT" id="CHAT">  </div>
</div>

