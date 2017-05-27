<?php
    class Ketqua_mientrung extends CActiveRecord
    {
        
        public static function getDataToDay($province_id)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM ketqua_mientrung WHERE province_id=$province_id ORDER BY id DESC";
            $command = $connect->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
        public static function getDataOtherDay($date,$province_id)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM ketqua_mientrung WHERE ngay_quay='$date' AND province_id=$province_id ";
            //var_dump($sql);die;
            $command = $connect->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
        public static function getDataByDay($date)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM ketqua_mientrung WHERE ngay_quay='$date' ";
            //var_dump($sql);die;
            $command = $connect->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        public static function getDataByProvince($province,$ngay_quay,$quay,$truoc)
        {
            if($truoc == 0)
            {
                $date = "AND ngay_quay<='$ngay_quay'";
                $order = "DESC";
            }
            else
            {
                $date = "AND ngay_quay>='$ngay_quay'";
                $order = "ASC";
            }
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM ketqua_mientrung WHERE province_id=$province ".$date." ORDER BY ngay_quay ".$order." LIMIT $quay";
            //var_dump($sql);die;
            $command = $connect->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        public static function getDataById($id)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM ketqua_mientrung WHERE province_id=$id ORDER BY id DESC";
            $command = $connect->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
        public static function getDataLast($id,$last)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM ketqua_mientrung WHERE province_id='$id' AND ngay_quay<'$last' ORDER BY id DESC";
            $command = $connect->createCommand($sql);
            $data = $command->queryRow($sql);
            return $data;
        }
        
        public static function getDataNext($id,$next)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM ketqua_mientrung WHERE province_id='$id' AND ngay_quay>'$next' ORDER BY id ASC";
            $command = $connect->createCommand($sql);
            $data = $command->queryRow($sql);
            return $data;
        }
        
    }
?>
