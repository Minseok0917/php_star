<?php

namespace Core\Controller;

class UserController extends MasterController
{
    public function register()
    {
        $this->render("User/join");
    }

    public function registerProcess()
    {
        $userid = $_POST['userid'];
        $pass = $_POST['password'];
        $passchk =$_POST['passwordchk'];
        $username = $_POST['username'];

        if($userid == "" || $pass == "" || $username = ""){
            echo "필수 입력란을 작성하세요.";
            echo "<a class='btn btn-danger' href='/User/join'>돌아가기</a>";
            return;
        }
        if($pass != $passchk){
            echo "비밀번호가 일치하지 않습니다.";
            echo "<a class='btn btn-danger' href='/User/join'>돌아가기</a>";
            return;
        }
        $sql = "INSERT INTO users(`id`, `name`, `password`, `level`) VALUES (?, ?, PASSWORD(?), ?)";

        $result = DB::execute($sql, [$userid, $username, $pass, 1]);

        if($result != 1){
            echo "올바른 값이 안들어갔다!";
            echo "<a class='btn btn-danger' href='/User/join'>돌아가기</a>";
            return;
        }
        Library::msgAndGo("회원가입 완료. 로그인 해 주세요.", "/users/login", "success");
            return;
    }

    public function loginprocess(){
        $userid = $_POST['userid'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM users WHERE id = ? AND password = PASSWORD(?)";
        $user = DB::fetch($sql, [$userid, $pass]);

        if($user == null){
            Library::msgAndGo("비밀번호가 달라!", "/User/login");
            return;
        }
        $_SESSION['user'] = $user;
        Library::msgAndGo("로그인 되었다!", "/", "success");
        return;
    }
}