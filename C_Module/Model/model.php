<?php
require_once "./Model/db/db.php";

class Model
{
    public static function register($user_name, $user_id, $user_pwd)
    {
        $check = DB::fetch("SELECT count(*) AS CNT FROM users WHERE user_id = '$user_id' OR user_name = '$user_name'");
        if (($check['CNT'] ?? 0) > 0) return 'dupe';

        $enc_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);
        return DB::exec("INSERT INTO users (user_id, user_name, user_pwd, user_role) VALUES ('$user_id','$user_name','$enc_pwd',1)");
    }

    public static function login($user_id)
    {
        return DB::fetch("SELECT * FROM users WHERE user_id = '$user_id'");
    }

    public static function rentbook($user_id, $book_idx)
    {
        $check = DB::fetch("SELECT count(*) as cnt FROM rental WHERE user_id = '$user_id' AND book_idx = '$book_idx' AND status = 0");
        if (($check['cnt'] ?? 0) > 0) return 'already_rented';

        $stock = DB::fetch("SELECT stocks FROM library WHERE idx = '$book_idx'");
        if (($stock['stocks'] ?? 0) <= 0) return 'out_stock';

        DB::exec("INSERT INTO rental (user_id, book_idx, rented, giveback, status)
                  VALUES ('$user_id','$book_idx',NOW(),DATE_ADD(NOW(),INTERVAL 9 DAY),0)");

        DB::exec("UPDATE library SET stocks = stocks - 1 WHERE idx = '$book_idx'");
        return 'success';
    }

    public static function returnbook($user_id, $book_idx)
    {
        $res = DB::exec("UPDATE rental SET status = 1 WHERE user_id = '$user_id' AND book_idx = '$book_idx' AND status = 0");
        if ($res) DB::exec("UPDATE library SET stocks = stocks + 1 WHERE idx = '$book_idx'");
        return 'return';
    }

    public static function adminReturnbook($rental_idx)
    {
        $rental = DB::fetch("SELECT * FROM rental WHERE idx = '$rental_idx' AND status = 0");
        if (!$rental) return false;

        DB::exec("UPDATE rental SET status = 1 WHERE idx = '$rental_idx'");
        DB::exec("UPDATE library SET stocks = stocks + 1 WHERE idx = '{$rental['book_idx']}'");
        return true;
    }

    public static function reservation($user_id, $date, $start, $end, $seat_nos)
    {
        $seats = explode(',', $seat_nos);

        foreach ($seats as $seat) {
            $check = DB::fetch("SELECT * FROM reservations 
                WHERE r_no = '$seat' AND r_date = '$date' 
                AND s_time < '$end' AND e_time > '$start'");
            if ($check) return 'duplicate';
        }

        foreach ($seats as $seat) {
            DB::exec("INSERT INTO reservations (user_id, r_no, r_date, s_time, e_time)
                      VALUES ('$user_id','$seat','$date','$start','$end')");
        }

        return true;
    }

    public static function cancelReservation($idx)
    {
        return DB::exec("DELETE FROM reservations WHERE idx = '$idx'");
    }

    // 도서 등록
    public static function addBook($title, $author, $publisher, $img, $year, $price)
    {
        return DB::exec("
            INSERT INTO library (title, author, publisher, img, year, price, stocks)
            VALUES ('$title','$author','$publisher','$img','$year','$price',1)
        ");
    }

    public static function getAllRentals()
    {
        return DB::fetchAll("
            SELECT r.*, l.title, l.author, l.publisher 
            FROM rental r 
            JOIN library l ON r.book_idx = l.idx 
            WHERE r.status = 0 
            ORDER BY r.rented DESC
        ");
    }

    public static function getAllReservations()
    {
        $now = date('Y-m-d H:i:s');
        return DB::fetchAll("
            SELECT * FROM reservations 
            WHERE CONCAT(r_date,' ',e_time) >= '$now' 
            ORDER BY r_date ASC, s_time ASC
        ");
    }

    // 🔥 팝업 등록 (수정 완료)
    public static function addPopup($title, $content, $img, $s_date, $e_date)
    {
        return DB::exec("
            INSERT INTO popups (title, content, img, s_date, e_date)
            VALUES ('$title','$content','$img','$s_date','$e_date')
        ");
    }

    public static function getAllPopups()
    {
        return DB::fetchAll("SELECT * FROM popups ORDER BY id DESC");
    }

    public static function getPopup($id)
    {
        return DB::fetch("SELECT * FROM popups WHERE id = '$id'");
    }

    // 🔥 팝업 수정 (수정 완료)
    public static function updatePopup($id, $title, $content, $img, $s_date, $e_date)
    {
        return DB::exec("
            UPDATE popups 
            SET title='$title', content='$content', img='$img', s_date='$s_date', e_date='$e_date'
            WHERE id='$id'
        ");
    }

    public static function deletePopup($id)
    {
        return DB::exec("DELETE FROM popups WHERE id='$id'");
    }

    public static function getActivePopups()
    {
        $today = date("Y-m-d");
        return DB::fetchAll("
            SELECT * FROM popups 
            WHERE s_date <= '$today' AND e_date >= '$today'
        ");
    }
}