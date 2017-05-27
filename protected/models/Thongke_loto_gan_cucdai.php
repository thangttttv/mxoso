<?php
    class Thongke_loto_gan_cucdai extends CActiveRecord
    {
        
        public static function getTKLotoGanCucDai()
        {
            $preDay = date('Y-m-d',strtotime('-1 day'));
            $connect = Yii::app()->db;
            $sql = "SELECT id,boso,lanquay_cucdai,DATE_FORMAT(start_date,'%d/%m/%Y') as start_date,DATE_FORMAT(end_date,'%d/%m/%Y') as end_date,lanquay_chuave,DATE_FORMAT(ngay_quay,'%d/%m/%Y') as ngay_quay FROM vtc_10h_xs.thongke_loto_gan_cucdai  Where  DATE_FORMAT(create_date,'%Y-%m-%d')= '$preDay'";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
    }
?>
