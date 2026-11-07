<?php
require_once "./Model/model.php";
require_once "./Model/db/lib.php";

class Controll
{
    public function index()
    {
        $popups = Model::getActivePopups();
        if (isset($_POST['user_name'], $_POST['user_id'], $_POST['user_pwd'])) {
            $result = Model::register($_POST['user_name'], $_POST['user_id'], $_POST['user_pwd']);

            if ($result === 'dupe') back('이미 가입된 회원입니다.');
            elseif ($result) move('회원가입 성공', 'index');
            else back('회원가입 오류');

            exit;
        }

        if (isset($_POST['user_id'], $_POST['user_pwd'])) {
            $user = Model::login($_POST['user_id']);

            if ($user && password_verify($_POST['user_pwd'], $user['user_pwd'])) {
                $_SESSION['user_id']   = $user['user_id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_role'] = $user['user_role'];
                move('로그인 성공', 'index');
            } else {
                back('로그인 실패');
            }
            exit;
        }

        require_once "./View/index.php";
    }

    public function logout()
    {
        session_destroy();
        move('로그아웃', 'index');
    }

    public function sub01()
    {
        require_once "./View/sub01.php";
    }

    public function sub02()
    {
        require_once "./View/sub02.php";
    }

    public function sub03()
    {
        if (!isset($_SESSION['user_id'])) {
            move('로그인 필요', 'index');
            exit;
        }

        if (isset($_POST['action'], $_POST['book_idx'])) {
            $user_id  = $_SESSION['user_id'];
            $book_idx = $_POST['book_idx'];

            if ($_POST['action'] === 'rent') {
                $result = Model::rentbook($user_id, $book_idx);

                if ($result === 'already_rented') back('이미 대여중');
                elseif ($result === 'out_stock') back('재고 없음');
                else move('대여 완료', 'sub03');

                exit;
            }

            if ($_POST['action'] === 'return') {
                Model::returnbook($user_id, $book_idx);
                move('반납 완료', 'sub03');
                exit;
            }
        }

        require_once "./View/sub03.php";
    }

    public function sub04()
    {
        if (!isset($_SESSION['user_id'])) {
            move('로그인 필요', 'index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $seat_nos = $_POST['seat_nos'] ?? '';
            $date  = $_POST['date'] ?? '';
            $start = $_POST['start'] ?? '';
            $end   = $_POST['end'] ?? '';

            if (!$seat_nos || !$date || !$start || !$end) {
                back('값 부족');
                exit;
            }

            if ($start >= $end) {
                back('시간 오류');
                exit;
            }

            $result = Model::reservation($_SESSION['user_id'], $date, $start, $end, $seat_nos);

            if ($result === 'duplicate') {
                back('이미 예약됨');
                exit;
            }

            move('예약 완료', 'sub04');
            exit;
        }

        require_once "./View/sub04.php";
    }

    public function sub05()
    {
        require_once "./View/sub05.php";
    }

    public function sub06()
    {
        if (!isset($_SESSION['user_id'])) {
            move('로그인 필요', 'index');
            exit;
        }

        $user_id = $_SESSION['user_id'];

        if (isset($_POST['action']) && $_POST['action'] === 'return') {
            Model::returnbook($user_id, $_POST['book_idx']);
            move('반납 완료', 'sub06');
            exit;
        }

        // 대출 목록
        $my_rentals = DB::fetchAll("
            SELECT r.*, l.title, l.author, l.img 
            FROM rental r
            JOIN library l ON r.book_idx = l.idx
            WHERE r.user_id = '$user_id' AND r.status = 0
        ");

        // 예약 목록
        $now = date('Y-m-d H:i:s');
        $my_reservations = DB::fetchAll("
            SELECT * FROM reservations
            WHERE user_id = '$user_id'
            AND CONCAT(r_date,' ',e_time) >= '$now'
        ");

        require_once "./View/sub06.php";
    }

    public function manage()
    {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 0) {
            move('권한 없음', 'index');
            exit;
        }

        $action = $_POST['action'] ?? $_GET['action'] ?? '';

        // 도서 등록
        if ($action === 'add_book') {
            $img = 'books.jpg';

            if (!empty($_FILES['img']['name'])) {
                $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                $img = uniqid() . '.' . $ext;
                move_uploaded_file($_FILES['img']['tmp_name'], "./View/B-Module/images/$img");
            }

            Model::addBook(
                $_POST['title'],
                $_POST['author'],
                $_POST['publisher'],
                $img,
                $_POST['year'],
                $_POST['price']
            );

            move('도서 등록 완료', 'manage');
            exit;
        }

        // 팝업 등록
        if ($action === 'add_popup') {
            $img = '';

            if (!empty($_FILES['img']['name'])) {
                $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                $img = uniqid() . '.' . $ext;
                move_uploaded_file($_FILES['img']['tmp_name'], "./View/B-Module/images/$img");
            }

            Model::addPopup(
                $_POST['title'],
                $_POST['content'],
                $img,
                $_POST['s_date'],
                $_POST['e_date']
            );

            move('팝업 등록 완료', 'manage');
            exit;
        }

        // 팝업 수정
        if ($action === 'edit_popup') {
            $popup = Model::getPopup($_POST['id']);
            $img = $popup['img'];

            if (!empty($_FILES['img']['name'])) {
                $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                $img = uniqid() . '.' . $ext;
                move_uploaded_file($_FILES['img']['tmp_name'], "./View/B-Module/images/$img");
            }

            Model::updatePopup(
                $_POST['id'],
                $_POST['title'],
                $_POST['content'],
                $img,
                $_POST['s_date'],
                $_POST['e_date']
            );

            move('수정 완료', 'manage');
            exit;
        }

        // 삭제
        if ($action === 'delete_popup') {
            Model::deletePopup($_POST['id'] ?? $_GET['id']);
            move('삭제 완료', 'manage');
            exit;
        }

        // 관리자 반납
        if ($action === 'admin_return') {
            Model::adminReturnbook($_POST['rental_idx']);
            move('반납 완료', 'manage');
            exit;
        }

        // 예약 취소
        if ($action === 'cancel_reservation') {
            Model::cancelReservation($_POST['idx']);
            move('예약 취소 완료', 'manage');
            exit;
        }

        $all_rentals      = Model::getAllRentals();
        $all_reservations = Model::getAllReservations();
        $all_popups       = Model::getAllPopups();

        require_once "./View/manage.php";
    }
}
