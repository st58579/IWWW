<?php


class SessionManager
{
    static function login(){
        $connect = Connection::getConnectionInstance();
        $login = $_POST['login'];
        $password = md5($_POST['password']);
    }

    static function signin(){

    }


}