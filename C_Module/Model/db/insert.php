<?php
// require_once "./Model/db/db.php";
// ㄴ if you need to isert the (도서정보 datajson) in the sql please uncomment
$json = file_get_contents("/../C_Module/View/C-Module/도서정보.json");
$data = json_decode($json, true);
foreach ($data as $d) {
    $title = addslashes($d['서명']);
    $author = addslashes($d['저자']);
    $img = $d['이미지'];
    $year = $d['발행년'];
    $price = $d['가격'];
    DB::exec("INSERT INTO `library`(`title`, `author`, `img`, `year`, `price`) VALUES ('$title','$author','$img','$year','$price')");
}