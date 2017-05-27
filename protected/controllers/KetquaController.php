<?php

    class KetquaController extends Controller
    {

        public function actionMienBac()
        {   
            $ketqua = Ketqua_mienbac::getDataToDay();
            $loto = Thongke_loto_mienbac::getDataToday($ketqua['ngay_quay']);
            $this->title = "Xo so mien bac - Ket qua xo so truc tiep mien bac hom nay, xsmb";
            $this->description = "Kết quả xổ số miền bắc: Trang tin kết quả xổ số các tỉnh miền bắc - kqxs miền bắc, kqxsmb, ket qua xsmb, ketquaxosomienbac, xs mien bac nhanh nhất, chính xác nhất";
            $this->keywords = "xo so mien bac, kqxs mien bac, kqxsmb, xsmb, xs mien bac, ket qua mien bac";
            $this->render('mienbac',array('ketqua'=>$ketqua,'loto'=>$loto));
        }
        
        public function actionRedirectMienBac()
        {
            $date = isset($_POST['date'])? $_POST['date']: "";
            $this->redirect(Yii::app()->createUrl('ketqua/ketquamienbac',array('date'=>$date)));
        }

        public function actionKetquaMienBac()
        {
            $date = isset($_GET['date'])? $_GET['date']: "";
            if(isset($_GET['last']))
            {
                $date = $_GET['last'];
                //var_dump($date);die;
            }
            if(isset($_GET['next']))
            {
                $date = $_GET['next'];
                //var_dump($date);die;
            }
            $ketqua = Ketqua_mienbac::getDataOtherDay($date);
            $loto = Thongke_loto_mienbac::getDataToday($ketqua['ngay_quay']);
            
            $data = $this->render('ketquamienbac',array('ketqua'=>$ketqua,'loto'=>$loto));
        }

        public function actionMienNam()
        {
            $time = time();
            $date = date("N",$time);
            //var_dump($date);
            $region = 3;
            switch($date)
            {
                case "1":
                {
                    $day = "Thứ hai";
                    $id = Yii::app()->params['monday'][3];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_miennam::getDataToDay($id1['id']);
                    $data2 = Ketqua_miennam::getDataToDay($id2['id']);
                    $data3 = Ketqua_miennam::getDataToDay($id3['id']);
                    break;
                }
                case "2":
                {
                    $day = "Thứ ba";
                    $id = Yii::app()->params['tuesday'][3];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_miennam::getDataToDay($id1['id']);
                    $data2 = Ketqua_miennam::getDataToDay($id2['id']);
                    $data3 = Ketqua_miennam::getDataToDay($id3['id']);
                    break;
                }
                case "3":
                {
                    $day = "Thứ tư";
                    $id = Yii::app()->params['wednesday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataToDay($id1['id']);
                    $data2 = Ketqua_miennam::getDataToDay($id2['id']);
                    $data3 = Ketqua_miennam::getDataToDay($id3['id']);
                    break;
                }
                case "4":
                {
                    $day = "Thứ năm";
                    $id = Yii::app()->params['thursday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataToDay($id1['id']);
                    $data2 = Ketqua_miennam::getDataToDay($id2['id']);
                    $data3 = Ketqua_miennam::getDataToDay($id3['id']);
                    break;
                }
                case "5":
                {
                    $day = "Thứ sáu";
                    $id = Yii::app()->params['friday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataToDay($id1['id']);
                    $data2 = Ketqua_miennam::getDataToDay($id2['id']);
                    $data3 = Ketqua_miennam::getDataToDay($id3['id']);
                    break;
                }
                case "6":
                {
                    $day = "Thứ bảy";
                    $id = Yii::app()->params['saturday'][3];
                    list($id1,$id2,$id3,$id4) = $id;
                    $data1 = Ketqua_miennam::getDataToDay($id1['id']);
                    $data2 = Ketqua_miennam::getDataToDay($id2['id']);
                    $data3 = Ketqua_miennam::getDataToDay($id3['id']);
                    $data4 = Ketqua_miennam::getDataToDay($id4['id']);
                    break;
                }
                case "7":
                {
                    $day = "Chủ nhật";
                    $id = Yii::app()->params['sunday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataToDay($id1['id']);
                    $data2 = Ketqua_miennam::getDataToDay($id2['id']);
                    $data3 = Ketqua_miennam::getDataToDay($id3['id']);
                    break;
                }

            }
            if(isset($id4))
            {
                $this->title = "Xo so mien nam - Ket qua xo so truc tiep mien nam hom nay, xsmt";
                $this->description = "Kết quả xổ số miền nam: Trang tin kết quả xổ số các tỉnh miền nam - kqxs miền nam, kqxsmb, ket qua xsmn, ketquaxosomiennam, xs mien nam nhanh nhất, chính xác nhất";
                $this->keywords = "xo so mien nam, kqxs mien nam, kqxsmn, xsmn, xs mien nam, ket qua mien nam";
                $this->render('miennam_db',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'day'=>$day));
            }
            else
            {
                $this->title = "Xo so mien nam - Ket qua xo so truc tiep mien nam hom nay, xsmt";
                $this->description = "Kết quả xổ số miền nam: Trang tin kết quả xổ số các tỉnh miền nam - kqxs miền nam, kqxsmb, ket qua xsmn, ketquaxosomiennam, xs mien nam nhanh nhất, chính xác nhất";
                $this->keywords = "xo so mien nam, kqxs mien nam, kqxsmn, xsmn, xs mien nam, ket qua mien nam";
                $this->render('miennam',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'day'=>$day));
            }
        }
        
        public function actionRedirectMienNam()
        {
            $date = isset($_POST['date'])? $_POST['date']: "";
            $this->redirect(Yii::app()->createUrl('ketqua/ketquamiennam',array('date'=>$date)));
        }

        public function actionKetQuaMienNam()
        {
            $time = isset($_GET['date'])? $_GET['date']: "";
            $day = strtotime($time);
            $day = date('l',$day);
            $day = substr($day,0,3);
            $date = substr($time,-10,10);
            if(isset($_GET['last']))
            {
                $date = $_GET['last'];
                $day = strtotime($date);
                $day = date('l',$day);
                $day = substr($day,0,3);
                //var_dump($time);die;
            }
            if(isset($_GET['next']))
            {
                $date = $_GET['next'];
                $day = strtotime($date);
                $day = date('l',$day);
                $day = substr($day,0,3);
                //var_dump($day);die;
            }
            $region = 3;
            switch($day)
            {
                case "Mon":
                {
                    $day = "Thứ hai";
                    $id = Yii::app()->params['monday'][3];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_miennam::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_miennam::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_miennam::getDataOtherDay($date,$id3['id']);
                    break;
                }
                case "Tue":
                {
                    $day = "Thứ ba";
                    $id = Yii::app()->params['tuesday'][3];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_miennam::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_miennam::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_miennam::getDataOtherDay($date,$id3['id']);
                    break;
                }
                case "Wed":
                {
                    $day = "Thứ tư";
                    $id = Yii::app()->params['wednesday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_miennam::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_miennam::getDataOtherDay($date,$id3['id']);
                    break;
                }
                case "Thu":
                {
                    $day = "Thứ năm";
                    $id = Yii::app()->params['thursday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_miennam::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_miennam::getDataOtherDay($date,$id3['id']);
                    break;
                }
                case "Fri":
                {
                    $day = "Thứ sáu";
                    $id = Yii::app()->params['friday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_miennam::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_miennam::getDataOtherDay($date,$id3['id']);
                    break;
                }
                case "Sat":
                {
                    $day = "Thứ bảy";
                    $id = Yii::app()->params['saturday'][3];
                    list($id1,$id2,$id3,$id4) = $id;
                    $data1 = Ketqua_miennam::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_miennam::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_miennam::getDataOtherDay($date,$id3['id']);
                    $data4 = Ketqua_miennam::getDataOtherDay($date,$id4['id']);
                    break;
                }
                case "Sun":
                {
                    $day = "Chủ nhật";
                    $id = Yii::app()->params['sunday'][3];
                    list($id1,$id2,$id3) = $id;
                    $data1 = Ketqua_miennam::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_miennam::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_miennam::getDataOtherDay($date,$id3['id']);
                    break;
                }

            }
            if(isset($id4))
            {
                $this->render('ketquamiennam_db',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'day'=>$day));
            }
            else
            {
                $this->render('ketquamiennam',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'day'=>$day));
            }
        }

        public function actionMientrung()
        {
            $time = time();
            $date = date("N",$time);
            //var_dump($date);
            $region = 2;
            switch($date)
            {
                case "1":
                {
                    $day = "Thứ hai";
                    $id = Yii::app()->params['monday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataToDay($id1['id']);
                    $data2 = Ketqua_mientrung::getDataToDay($id2['id']);
                    break;
                }
                case "2":
                {
                    $day = "Thứ ba";
                    $id = Yii::app()->params['thursday'][2];
                    list($id1,$id2) = $id;
                    $data1 = Ketqua_mientrung::getDataToDay($id1['id']);
                    $data2 = Ketqua_mientrung::getDataToDay($id2['id']);
                    break;
                }
                case "3":
                {
                    $day = "Thứ tư";
                    $id = Yii::app()->params['wednesday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataToDay($id1['id']);
                    $data2 = Ketqua_mientrung::getDataToDay($id2['id']);
                    break;
                }
                case "4":
                {
                    $day = "Thứ năm";
                    $id = Yii::app()->params['thursday'][2];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataToDay($id1['id']);
                    $data2 = Ketqua_mientrung::getDataToDay($id2['id']);
                    $data3 = Ketqua_mientrung::getDataToDay($id3['id']);
                    break;
                }
                case "5":
                {
                    $day = "Thứ sáu";
                    $id = Yii::app()->params['friday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataToDay($id1['id']);
                    $data2 = Ketqua_mientrung::getDataToDay($id2['id']);
                    break;
                }
                case "6":
                {
                    $day = "Thứ bảy";
                    $id = Yii::app()->params['saturday'][2];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id3);die;
                    $data1 = Ketqua_mientrung::getDataToDay($id1['id']);
                    $data2 = Ketqua_mientrung::getDataToDay($id2['id']);
                    $data3 = Ketqua_mientrung::getDataToDay($id3['id']);
                    break;
                }
                case "7":
                {
                    $day = "Chủ nhật";
                    $id = Yii::app()->params['sunday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataToDay($id1['id']);
                    $data2 = Ketqua_mientrung::getDataToDay($id2['id']);
                    break;
                }

            }
            if(isset($id3))
            {
                $this->title = "Xo so mien trung - Ket qua xo so truc tiep mien trung hom nay, xsmt";
                $this->description = "Kết quả xổ số miền trung: Trang tin kết quả xổ số các tỉnh miền trung - kqxs miền trung, kqxsmb, ket qua xsmt, ketquaxosomientrung, xs mien trung nhanh nhất, chính xác nhất";
                $this->keywords = "xo so mien trung, kqxs mien trung, kqxsmt, xsmt, xs mien trung, ket qua mien trung";
                $this->render('mientrung_db',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'day'=>$day));
            }
            else
            {
                $this->title = "Xo so mien trung - Ket qua xo so truc tiep mien trung hom nay, xsmt";
                $this->description = "Kết quả xổ số miền trung: Trang tin kết quả xổ số các tỉnh miền trung - kqxs miền trung, kqxsmb, ket qua xsmt, ketquaxosomientrung, xs mien trung nhanh nhất, chính xác nhất";
                $this->keywords = "xo so mien trung, kqxs mien trung, kqxsmt, xsmt, xs mien trung, ket qua mien trung";
                $this->render('mientrung',array('data1'=>$data1,'data2'=>$data2,
                    'id1'=>$id1,'id2'=>$id2,'day'=>$day));
            }
        }
        
        public function actionRedirectMienTrung()
        {
            $date = isset($_POST['date'])? $_POST['date']: "";
            $this->redirect(Yii::app()->createUrl('ketqua/ketquamientrung',array('date'=>$date)));
        }

        public function actionKetQuaMienTrung()
        {
            $time = isset($_GET['date'])? $_GET['date']: "";
            $day = strtotime($time);
            $day = date('l',$day);
            $day = substr($day,0,3);
            $date = substr($time,-10,10);
            if(isset($_GET['last']))
            {
                $date = $_GET['last'];
                $day = strtotime($date);
                $day = date('l',$day);
                $day = substr($day,0,3);
                //var_dump($time);die;
            }
            if(isset($_GET['next']))
            {
                $date = $_GET['next'];
                $day = strtotime($date);
                $day = date('l',$day);
                $day = substr($day,0,3);
                //var_dump($day);die;
            }
            $region = 2;
            switch($day)
            {
                case "Mon":
                {
                    $day = "Thứ hai";
                    $id = Yii::app()->params['monday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_mientrung::getDataOtherDay($date,$id2['id']);
                    break;
                }
                case "Tue":
                {
                    $day = "Thứ ba";
                    $id = Yii::app()->params['tuesday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_mientrung::getDataOtherDay($date,$id2['id']);
                    break;
                }
                case "Wed":
                {
                    $day = "Thứ tư";
                    $id = Yii::app()->params['wednesday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_mientrung::getDataOtherDay($date,$id2['id']);
                    break;
                }
                case "Thu":
                {
                    $day = "Thứ năm";
                    $id = Yii::app()->params['thursday'][2];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_mientrung::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_mientrung::getDataOtherDay($date,$id3['id']);
                    break;
                }
                case "Fri":
                {
                    $day = "Thứ sáu";
                    $id = Yii::app()->params['friday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_mientrung::getDataOtherDay($date,$id2['id']);
                    break;
                }
                case "Sat":
                {
                    $day = "Thứ bảy";
                    $id = Yii::app()->params['saturday'][2];
                    list($id1,$id2,$id3) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_mientrung::getDataOtherDay($date,$id2['id']);
                    $data3 = Ketqua_mientrung::getDataOtherDay($date,$id3['id']);
                    break;
                }
                case "Sun":
                {
                    $day = "Chủ nhật";
                    $id = Yii::app()->params['sunday'][2];
                    list($id1,$id2) = $id;
                    //var_dump($id1);die;
                    $data1 = Ketqua_mientrung::getDataOtherDay($date,$id1['id']);
                    $data2 = Ketqua_mientrung::getDataOtherDay($date,$id2['id']);
                    break;
                }

            }
            if(isset($id3))
            {
                $this->render('ketquamientrung_db',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'day'=>$day));
            }
            else
            {
                $this->render('ketquamientrung',array('data1'=>$data1,'data2'=>$data2,
                    'id1'=>$id1,'id2'=>$id2,'day'=>$day));
            }
        }

        public function actionSearch()
        {
            $vung = isset($_POST['vung'])? $_POST['vung']: "1";
            $tinh = isset($_POST['tinh'])? $_POST['tinh']: "1";
            $ngay = isset($_POST['ngay'])? $_POST['ngay']: "";
            $quay = isset($_POST['quay'])? $_POST['quay']: "1";
            $truoc = isset($_POST['truoc'])? $_POST['truoc']: "0";
            //var_dump($truoc);die;
            switch($vung)
            {
                case "1":
                {
                    $data = Ketqua_mienbac::getDataByProvince($tinh,$ngay,$quay,$truoc);
                    $this->render('search',array('data'=>$data,'tinh'=>$tinh,
                        'vung'=>$vung,'quay'=>$quay,'truoc'=>$truoc,'ngay'=>$ngay));
                    break;
                }
                case "2":
                {
                    $data = Ketqua_mientrung::getDataByProvince($tinh,$ngay,$quay,$truoc);
                    $tinh = Province::getNameByProvince($tinh);
                    //var_dump($tinh);die;
                    $this->render('searchmientrung',array('data'=>$data,'tinh'=>$tinh,
                        'vung'=>$vung,'quay'=>$quay,'truoc'=>$truoc,'ngay'=>$ngay));
                    break;
                }
                case "3":
                {
                    $data = Ketqua_miennam::getDataByProvince($tinh,$ngay,$quay,$truoc);
                    $tinh = Province::getNameByProvince($tinh);
                    //var_dump($tinh);die;
                    $this->render('searchmiennam',array('data'=>$data,'tinh'=>$tinh,
                        'vung'=>$vung,'quay'=>$quay,'truoc'=>$truoc,'ngay'=>$ngay));
                    break;
                }
            }
        }

        public function actionSelect()
        {
            $region = isset($_GET['id'])? $_GET['id']: "1";
            $tinh = isset($_GET['tinh'])? $_GET['tinh']: "1";
            $data = Province::getNameByRegion($region);
            //var_dump($tinh);
            foreach($data as $region)
            {
                if($tinh == $region['id'])
                {
                    echo '<option value="'.$region['id'].'" selected="selected">'.$region['name'].'</option>';
                }
                else
                {
                    echo '<option value="'.$region['id'].'">'.$region['name'].'</option>';
                }
            }
        }

        public function actionDientoan()
        {
                $data1 = Ketqua_dientoan123::getDataToDay();
                $data2 = Ketqua_thantai::getDataToDay();
                $data3 = Ketqua_dientoan6x36::getDataToDay();
                //var_dump($data1);die;
                $this->title = "Xo so dien toan - Xem kết quả xổ số điện toàn hàng ngày";
                $this->description = "Xổ số điện toán. Xem kết quả xổ số điện toán 123, xổ số điện toán 6x36, xổ số thần tài mở thưởng hàng ngày nhanh, chính xác";
                $this->keywords = "xo so dien toan, ket qua dien toan, dien toan 6x36, xo so than tai, dien toan 123";
                $this->render('dientoan',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3));
        }
        
        public function actionRedirectDienToan()
        {
            $date = isset($_POST['date'])? $_POST['date']: "";
            $this->redirect(Yii::app()->createUrl('ketqua/ketquadientoan',array('date'=>$date)));
        }
        
        public function actionKetQuaDienToan()
        {
            if(isset($_GET['last']))
            {
                $date = $_GET['last'];
                $data1 = Ketqua_dientoan123::getDataByDate($date);
                $data2 = Ketqua_thantai::getDataByDate($date);
                $data3 = Ketqua_dientoan6x36::getDataByDate($date);
                $this->render('ketquadientoan',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3));
                //var_dump($date);die;
            }
            elseif(isset($_GET['next']))
            {
                $date = $_GET['next'];
                $data1 = Ketqua_dientoan123::getDataByDate($date);
                $data2 = Ketqua_thantai::getDataByDate($date);
                $data3 = Ketqua_dientoan6x36::getDataByDate($date);
                $this->render('ketquadientoan',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3));
                //var_dump($date);die;
            }
            elseif(isset($_GET['date']))
            {
                $date = $_GET['date'];
                $data1 = Ketqua_dientoan123::getDataByDate($date);
                $data2 = Ketqua_thantai::getDataByDate($date);
                $data3 = Ketqua_dientoan6x36::getDataByDate($date);
                //var_dump($data2);
                $this->render('ketquadientoan',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3));
            }
        }
        

        public function actionKetquaTheoTinh()
        {
            $id = isset($_GET['id'])? intval($_GET['id']): "0";
            if($id == 1 || ($id>36 && $id<=42))
            {
                $id = 1;
                $data = Ketqua_mienbac::getDataById($id);
                $loto = Thongke_loto_mienbac::getDataToday($data['ngay_quay']);
                //var_dump($data);die;
                $this->render('tinhmienbac',array('id'=>$id,'data'=>$data,'loto'=>$loto));
            }
            if($id>1 && $id<=22)
            {
                $tinh = Province::getDataById($id);
                $data = Ketqua_miennam::getDataById($id);
                //var_dump($data);die;
                $this->render('tinhmiennam',array('id'=>$id,'data'=>$data,'tinh'=>$tinh));
            }
            if($id>22 && $id<=36)
            {
                $tinh = Province::getDataById($id);
                $data = Ketqua_mientrung::getDataById($id);
                $this->render('tinhmientrung',array('id'=>$id,'data'=>$data,'tinh'=>$tinh));
            }

        }

        public function actionTimMienNam()
        {
            if(isset($_GET['last']))
            {
                $last = isset($_GET['last'])? $_GET['last']: "";
                $id = isset($_GET['id'])? $_GET['id']: "";
                $tinh = Province::getDataById($id);
                $data = Ketqua_miennam::getDataLast($id,$last);
                //var_dump($data);die;
                $this->renderPartial('ketquatinhmiennam',array('id'=>$id,'data'=>$data,'tinh'=>$tinh));
            }
            if(isset($_GET['next']))
            {
                $next = isset($_GET['next'])? $_GET['next']: "";
                $id = isset($_GET['id'])? $_GET['id']: "";
                $tinh = Province::getDataById($id);
                $data = Ketqua_miennam::getDataNext($id,$next);
                if($data == false)
                {
                    echo 1;
                    exit;
                }
                $this->renderPartial('ketquatinhmiennam',array('id'=>$id,'data'=>$data,'tinh'=>$tinh));
            }
        }

        public function actionTimMienTrung()
        {
            if(isset($_GET['last']))
            {
                $last = isset($_GET['last'])? $_GET['last']: "";
                $id = isset($_GET['id'])? $_GET['id']: "";
                $tinh = Province::getDataById($id);
                $data = Ketqua_mientrung::getDataLast($id,$last);
                //var_dump($data);die;
                $this->renderPartial('ketquatinhmientrung',array('id'=>$id,'data'=>$data,'tinh'=>$tinh));
            }
            if(isset($_GET['next']))
            {
                $next = isset($_GET['next'])? $_GET['next']: "";
                $id = isset($_GET['id'])? $_GET['id']: "";
                $tinh = Province::getDataById($id);
                $data = Ketqua_mientrung::getDataNext($id,$next);
                if($data == false)
                {
                    echo 1;
                    exit;
                }
                $this->renderPartial('ketquatinhmientrung',array('id'=>$id,'data'=>$data,'tinh'=>$tinh));
            }
        }

    }

?>
