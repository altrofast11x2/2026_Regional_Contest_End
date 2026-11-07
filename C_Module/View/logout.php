<?php
if (isset($_SESSION['user_id'])) {
    session_destroy();
    move('로그아웃 되었습니다.', 'index');
    exit;
} else {
    move('잘못된 접근입니다.', 'index');
    exit;
}
