<?php
    class conn{

        public function __construct(){
            try{
                $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=stone;","root","root");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->exec('set names utf8');


            }catch(PDOException $e){
                echo '数据库连接失败:'.$e->getMessage();
                exit();
            }
        }

        //获取一行数据
        public function getOne($sql){
            $rs=$this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

            return $rs;
        }

        //获取多行数据结果
        public function getAll($sql){
            $rs=$this->pdo->query($sql)->fetchall(PDO::FETCH_ASSOC);

            return $rs;

        }
    }