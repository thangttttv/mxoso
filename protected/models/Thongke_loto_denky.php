<?php
    class Thongke_loto_denky extends CActiveRecord
    {

        public static function getTKLotoDenKySoVoiKyGanNhat()
        {
            $preDay = date('Y-m-d',strtotime('-1 day'));
            $connect = Yii::app()->db;
            $sql = "SELECT id,boso,dodai_chuky,DATE_FORMAT(start_date,'%d/%m/%Y') as start_date,DATE_FORMAT(end_date,'%d/%m/%Y') as end_date FROM vtc_10h_xs.thongke_loto_denky WHERE TYPE = 0 And  DATE_FORMAT(create_date,'%Y-%m-%d')= '$preDay'";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }

        public static function getTKLotoDenKySoVoiKyCucDai()
        {
            $preDay = date('Y-m-d',strtotime('-1 day'));
            $connect = Yii::app()->db;
            $sql = "SELECT id,boso,dodai_chuky,DATE_FORMAT(start_date,'%d/%m/%Y') as start_date,DATE_FORMAT(end_date,'%d/%m/%Y') as end_date FROM vtc_10h_xs.thongke_loto_denky WHERE TYPE = 0 And  DATE_FORMAT(create_date,'%Y-%m-%d')= '$preDay' ";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }


    }
?>
