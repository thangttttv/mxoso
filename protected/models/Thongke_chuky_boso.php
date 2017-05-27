<?php
    class Thongke_chuky_boso extends CActiveRecord
    {
        
        public static function getBoSoKhongRaTrong10Ngay()
        {
            $date = "2014-03-20";
            $date_ago = date('Y-m-d',strtotime("-10 days",strtotime($date)));
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM thongke_chuky_boso WHERE start_date>='2014-03-10' AND end_date IS NULL ORDER BY start_date ASC LIMIT 12 ";
            //var_dump($sql);die;
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        public static function getTKChuKyLoTo($boso)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT boso,DATE_FORMAT(start_date,'%d/%m/%Y') as start_date,DATE_FORMAT(end_date,'%d/%m/%Y') as end_date,LENGTH as dodai_chuky,is_special FROM vtc_10h_xs.thongke_chuky_boso WHERE  DATEDIFF(CURRENT_DATE,end_date)<=60 AND end_date IS NOT NULL AND boso = $boso AND is_special=0 AND province_id=1 order by id desc ";
            //var_dump($sql);
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
    }
?>
