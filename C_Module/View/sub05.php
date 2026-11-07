<?php
require_once "./Model/db/lib.php";
if (isset($_SESSION['user_id'])) {
    move('이미 로그인되어있습니다.', 'index');
    exit;
} else {
    move('홈페이지 오른쪽 상단 회원가입 버튼을 눌러주세요.', 'index');
    exit;
}
