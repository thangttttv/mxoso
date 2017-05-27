<?php
    class User_veso extends CActiveRecord
    {
        
        public static function checkUserName($username)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM user_veso WHERE username='$username' ";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
        public static function checkMobile($mobile)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT * FROM user_veso WHERE mobile='$mobile' ";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
        public static function insertUser($username,$password,$mobile,$avatar_url,$create_date)
        {
            //var_dump($mobile);die;
            $connect = Yii::app()->db;
            //var_dump($connect);die;
            $sql = "INSERT INTO user_veso(username,password,mobile,avatar_url,create_date) VALUES('$username','$password','$mobile','$avatar_url','$create_date') ";
            //var_dump($sql);die;
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->execute();
            return $data;
        }
        
        public static function updatePass($password,$username,$modify_date)
        {
            $connect = Yii::app()->db;
            $sql = "UPDATE user_veso SET password='$password',modify_date='$modify_date' WHERE username='$username'";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->execute();
            return $data;
        }
        
        public static function updateInfo($mobile,$avatar_url,$modify_date,$last_username)
        {
            $connect = Yii::app()->db;
            $sql = "UPDATE user_veso SET mobile='$mobile',modify_date='$modify_date',avatar_url='$avatar_url',modify_date='$modify_date' WHERE username='$last_username'";
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->execute();
            return $data;
        }
        
        public static function getAvatarUser($id)
        {
            $connect = Yii::app()->db;
            $sql = "SELECT avatar_url,create_date FROM user_veso WHERE id='$id' ";
            //var_dump($sql);
            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryRow();
            return $data;
        }
        
    }
?>
