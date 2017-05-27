<?php
    class Thongke_loto_mienbac extends CActiveRecord
    {
        
        public static function getDataToday($date)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT boso FROM thongke_loto_mienbac WHERE ngay_quay='$date' ";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        
        
        public static function countTongBoSoMoThuong()
        {
            $connect = Yii::app()->db;
            $sql = "SELECT COUNT(boso) AS sl FROM thongke_loto_mienbac WHERE DATEDIFF(CURRENT_DATE,ngay_quay)<10";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
        public static function getTK12BoSoRaNhieu()
        {
            $connect = Yii::app()->db;
            $sql = "SELECT boso,COUNT(boso) AS sl FROM thongke_loto_mienbac WHERE DATEDIFF(CURRENT_DATE,ngay_quay)<10 GROUP BY boso Order by sl desc limit 12";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        public static function getTK12BoSoRaIt()
        {
            $date = date("Y-m-d");
            $connect = Yii::app()->db;
            $sql = "SELECT boso,COUNT(boso) AS sl FROM thongke_loto_mienbac WHERE DATEDIFF(CURRENT_DATE,ngay_quay)<10 GROUP BY boso ORDER BY sl ASC LIMIT 12";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        public static function getTKBoSoRaLienTiep()
        {
            $now = date('Y-m-d',strtotime("-1 day"));
            $connect = Yii::app()->db;
            $sql = "SELECT boso,DATE_FORMAT(start_date,'%d/%m/%Y') as start_date,DATE_FORMAT(end_date,'%d/%m/%Y') as end_date ,length as dodai_chuky FROM thongke_boso_ve_lientiep WHERE province_id = 1   AND LENGTH > 1 AND end_date = '$now' ";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        public static function getTKBoSoMBXuatHienTheoSoNgay($songay)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT DISTINCT boso FROM thongke_loto_mienbac WHERE DATEDIFF(CURRENT_DATE,ngay_quay)<$songay";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            //var_dump(count($data));die;
            $arrayKQ = array(); 
            for($i=0;$i<count($data);$i++)
            {
                $arrayKQ[] = $data[$i]['boso'];
            }
            //var_dump($arrayKQ);die;
            return $arrayKQ;
        }

        public static function getTKBoSoMBGanTren10Ngay()
        {
            $arrBoSOXh = self::getTKBoSoMBXuatHienTheoSoNgay(10);
            $arrLotoGan = array();
            $listBoso = "";
            $j= 0;   $sl   = 0;
            while($j<=99)
            {
                $i = 0;  $kt=0;$boso =$j;

                while($i<count($arrBoSOXh)){
                    if($j==intval($arrBoSOXh[$i]))
                    {

                        $kt=1;break;  
                    }
                    $i++;
                }

                if($kt==0)
                {
                    $arrLotoGan[$j] =   intval($boso)<10?"0".$boso:$boso; 
                    $boso = intval($boso)<10?"0".$boso:$boso; 
                    $listBoso .=  ",".$boso ;
                    $sl = $sl+1;

                }

                $j++;
            }

            $listBoso = substr($listBoso,1);
            //var_dump($listBoso);die;

            $connect = Yii::app()->db;
            $sql = "SELECT DISTINCT boso,DATE_FORMAT(ngay_quay,'%d/%m/%Y') as ngay_quay ,DATEDIFF(CURRENT_DATE,ngay_quay) as so_ngay FROM thongke_loto_mienbac WHERE boso in ($listBoso) And DATEDIFF(CURRENT_DATE,ngay_quay)<=20 Order by id DESC";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            $arrayKQ = array(); 

            for($i=0;$i<count($data);$i++) 
            {
                $check=0;
                foreach($arrayKQ as $itemkq){
                    if($itemkq["boso"]==$data[$i]["boso"])$check = 1;
                }
                if($check==0)
                    $arrayKQ[] =  $data[$i];
            }

            return $arrayKQ;
        }
        
        public static function countTongDauSoMoThuong()
        {
            $connect = Yii::app()->db;
            $sql = "SELECT COUNT(dau_so) AS sl FROM thongke_loto_mienbac WHERE DATEDIFF(CURRENT_DATE,ngay_quay)<10";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
        public static function getTKDauSoMoThuong()
        {
            $now = "2014-03-20";
            $date = date("Y-m-d",strtotime("-10 days",strtotime($now)));
            $connect = Yii::app()->db;
            $sql = "SELECT dau_so,COUNT(dau_so) AS sl FROM thongke_loto_mienbac WHERE DATEDIFF(CURRENT_DATE,ngay_quay)<10 GROUP BY dau_so ORDER BY dau_so";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
        public static function getTKDuoiSoMoThuong()
        {
            $now = "2014-03-20";
            $date = date("Y-m-d",strtotime("-10 days",strtotime($now)));
            $connect = Yii::app()->db;
            $sql = "SELECT dit_so,COUNT(dit_so) AS sl FROM thongke_loto_mienbac WHERE DATEDIFF(CURRENT_DATE,ngay_quay)<10 GROUP BY dit_so ORDER BY dit_so";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        }
        
    }
?>
