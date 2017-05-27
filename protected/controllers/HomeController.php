<?php

    class HomeController extends Controller
    {

        public function actionError()
        {
            $this->layout = false;
            $error = Yii::app()->errorHandler->error;  
            var_dump($error);die;       
            //if($_SERVER["HTTP_HOST"]=="localhost"){
            //                var_dump($error);die;
            //            }           
            //            $this->render("error"
            //                , array(
            //                    "error"=>$error
            //                )            
            //            ); 
        }

        public function actionIndex()
        {
            $date = date('H');
            //var_dump($date);
            if($date == '18')
            {
                $this->redirect(Yii::app()->createUrl('home/tuongthuatmienbac'));
            }
            if($date == '17')
            {
                $this->redirect(Yii::app()->createUrl('home/tuongthuatmientrung'));
            }
            if($date == '16')
            {
                $this->redirect(Yii::app()->createUrl('home/tuongthuatmiennam'));
            }

            $ketqua = Ketqua_mienbac::getDataToDay();
            //var_dump($ketqua);
            $loto = Thongke_loto_mienbac::getDataToday($ketqua['ngay_quay']);

            $this->title = "Ket qua xo so - Tường thuật trực tiếp kết quả xổ số nhanh nhất từ trường quay";
            $this->description = "Kết quả xổ số. Tường thuật trực tiếp kết quả xổ số miền bắc, xổ số miền nam, xổ số miền trung nhanh nhất Việt Nam.";
            $this->keywords = "ket qua xo so,so xo,xo so mien bac,xổ số miền bắc,xstd,xsmb,xo so mien trung,kqxs,xo so mien nam,xo so,xsmt,xsmn,kết quả xổ số";
            $this->render('index',array('ketqua'=>$ketqua,'loto'=>$loto));
        }

        public function actionMienBac()
        {
            $ketqua = Ketqua_mienbac::getDataToDay();
            //var_dump($ketqua);
            $loto = Thongke_loto_mienbac::getDataToday($ketqua['ngay_quay']);
            $this->title = "Ket qua xo so - Tường thuật trực tiếp kết quả xổ số nhanh nhất từ trường quay";
            $this->description = "Kết quả xổ số. Tường thuật trực tiếp kết quả xổ số miền bắc, xổ số miền nam, xổ số miền trung nhanh nhất Việt Nam.";
            $this->keywords = "ket qua xo so,so xo,xo so mien bac,xổ số miền bắc,xstd,xsmb,xo so mien trung,kqxs,xo so mien nam,xo so,xsmt,xsmn,kết quả xổ số";
            $this->render('mienbac',array('ketqua'=>$ketqua,'loto'=>$loto));
        }

        public function actionMiennam()
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
            $this->title = "Xo so truc tiep mien nam - Tường thuật trực tiếp kết quả xổ số miền nam.";
            $this->description = "Xổ số trực tiếp miền nam. Xem tường thuật trực tiếp kết quả xổ số miền nam mở thưởng 17h15 hàng ngày nhanh nhất, chính xác nhất tại trường quay";
            $this->keywords = "xo so truc tiep mien nam, xem tuong thuat truc tiep ket qua xo so mien nam, truc tiep ket qua xo so mien nam, xsmn";
            if(isset($id4))
            {
                $this->render('miennam_db',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'id4'=>$id4,'day'=>$day));
            }
            else
            {
                $this->render('miennam',array('data1'=>$data1,'data2'=>$data2,
                    'data3'=>$data3,'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'day'=>$day));
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
                    $id = Yii::app()->params['tuesday'][2];
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
                    //var_dump($id1);die;
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
            $this->title = "Xo so truc tiep mien trung - Tường thuật trực tiếp kết quả xổ số miền trung.";
            $this->description = "Xổ số trực tiếp miền trung. Xem tường thuật trực tiếp kết quả xổ số miền trung mở thưởng 17h15 hàng ngày nhanh nhất, chính xác nhất tại trường quay";
            $this->keywords = "xo so truc tiep mien trung, xem tuong thuat truc tiep ket qua xo so mien trung, truc tiep ket qua xo so mien trung, xsmt";
            if(isset($id3))
            {
                $this->render('mientrung_db',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,
                    'id1'=>$id1,'id2'=>$id2,'id3'=>$id3,'day'=>$day));
            }
            else
            {
                $this->render('mientrung',array('data1'=>$data1,'data2'=>$data2,
                    'id1'=>$id1,'id2'=>$id2,'day'=>$day));
            }
        }

        public function actionChat()
        {    
            if(isset($_GET['messenger']))
            {
                if($_GET['messenger']=="")
                {
                    echo 0;
                    exit;
                }
                if(empty($_SESSION['username']))
                {
                    echo 1;
                    exit;
                }
                $messenger = stripcslashes($_GET['messenger']);
                $date = time();
                $date = date('Y-m-d H:i:s',$date);
                $username = $_SESSION['username'];
                $data_user = User_veso::checkUserName($username);
                $avatar_url = $data_user['avatar_url'];
                $id_user = $data_user['id'];
                $device = "Web";
                Xs_chat::insertDataChat($messenger,$date,$username,$avatar_url,$id_user,$device);
                $data = Xs_chat::getDataChat();
                $this->renderPartial('chat',array('data'=>$data,'count'=>2));
            }
            else
            {
                $data = Xs_chat::getDataChat();
                //var_dump($data);die;
                $this->renderPartial('chat',array('data'=>$data,'count'=>2)); 
            }
        }

        public function actionMoreChat()
        {
            $count = isset($_POST['count'])? $_POST['count']: 1;
            //var_dump($count);
            $start = $count * 15;
            //var_dump($start);die;
            $data = Xs_chat::getMoreChat($start);
            //var_dump($data);die;
            $this->renderPartial('chat',array('data'=>$data,'count'=>$count+1));
        }

        public function actionDientoan()
        {
            $data1 = Ketqua_dientoan123::getDataToDay();
            $data2 = Ketqua_thantai::getDataToDay();
            $data3 = Ketqua_dientoan6x36::getDataToDay();
            //var_dump($data1);die;
            $this->title = "Xo so dien toan - Xem kết quả xổ số điện toàn hàng ngày.";
            $this->description = "Xổ số điện toán. Xem kết quả xổ số điện toán 123, xổ số điện toán 6x36, xổ số thần tài mở thưởng hàng ngày nhanh, chính xác";
            $this->keywords = "xo so dien toan, ket qua dien toan, dien toan 6x36, xo so than tai, dien toan 123";
            $this->render('dientoan',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3));
        }

        public function actionBoxSearch()
        {
            $vung = isset($_POST['vung'])? $_POST['vung']: "1";
            $tinh = isset($_POST['tinh'])? $_POST['tinh']: "1";
            $tinh = Province::getDataById($tinh);
            $ngay = isset($_POST['ngay'])? $_POST['ngay']: date('Y-m-d');
            $quay = isset($_POST['quay'])? $_POST['quay']: "1";
            $truoc = isset($_POST['truoc'])? $_POST['truoc']: "0";
            //var_dump($vung);
            $this->renderPartial('boxsearch',array('vung'=>$vung,'tinh'=>$tinh,'ngay'=>$ngay,'quay'=>$quay,
                'truoc'=>$truoc));
        }

        public function actionTuongthuatMienbac()
        {
            $this->title = "Xo so truc tiep mien bac - Tường thuật trực tiếp kết quả xổ số miền bắc.";
            $this->description = "Xổ số trực tiếp miền bắc. Xem tường thuật trực tiếp kết quả xổ số miền bắc mở thưởng 18h15 hàng ngày nhanh nhất, chính xác nhất tại trường quay";
            $this->keywords = "xo so truc tiep mien bac, xem tuong thuat truc tiep ket qua xo so mien bac, truc tiep ket qua xo so mien bac,xsmb";
            $this->render('tuongthuatmienbac');
        }

        public function actionLoadMienBac()
        {
            $this->renderPartial('MienBacTT');
        }

        public function actionTuongthuatMienTrung()
        {
            $this->title = "Xo so truc tiep mien trung - Tường thuật trực tiếp kết quả xổ số miền trung.";
            $this->description = "Xổ số trực tiếp miền trung. Xem tường thuật trực tiếp kết quả xổ số miền trung mở thưởng 18h15 hàng ngày nhanh nhất, chính xác nhất tại trường quay";
            $this->keywords = "xo so truc tiep mien trung, xem tuong thuat truc tiep ket qua xo so mien trung, truc tiep ket qua xo so mien trung,xsmt";
            $this->render('tuongthuatmientrung');
        }

        public function actionLoadMienTrung()
        {
            $this->renderPartial('MienTrungTT');
        }

        public function actionTuongthuatMienNam()
        {
            $this->title = "Xo so truc tiep mien nam - Tường thuật trực tiếp kết quả xổ số miền nam.";
            $this->description = "Xổ số trực tiếp miền nam. Xem tường thuật trực tiếp kết quả xổ số miền nam mở thưởng 18h15 hàng ngày nhanh nhất, chính xác nhất tại trường quay";
            $this->keywords = "xo so truc tiep mien nam, xem tuong thuat truc tiep ket qua xo so mien nam, truc tiep ket qua xo so mien nam,xsmn";
            $this->render('tuongthuatmiennam');
        }

        public function actionLoadMienNam()
        {
            $this->renderPartial('MienNamTT');
        }

        public function actionBoxNote()
        {
            $data = Xs_feed::getData();
            $this->renderPartial('boxnote',array('data'=>$data));
        }

    }
?>
