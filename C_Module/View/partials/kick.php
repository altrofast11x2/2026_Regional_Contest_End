<?php
require_once "./Model/db/lib.php";
if (!isset($_SESSION['user_id'])) {
    move('로그인이 필요한 서비스입니다.', 'index');
}
