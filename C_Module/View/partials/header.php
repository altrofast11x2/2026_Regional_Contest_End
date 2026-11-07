<?php require_once "./Model/db/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/View/B-Module/Css/style.css">
    <link rel="stylesheet" href="/View/공통제공파일/fontawesome/css/all.min.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="index">
                    <img src="/View/B-Module/images/logo.png" alt="head_logo">
                </a>
            </div>
            <nav>
                <div class="menu_item">
                    <input class="focus_trap">
                    <label class="menu_label">
                        도서관소개
                        <span class="fa fa-plus" id="icon"></span>
                        <span class="fa fa-minus" id="icon"></span>
                    </label>
                    <ul class="sub_menu">
                        <li><a href="sub01">도서관소개</a></li>
                        <li><a href="sub02">도서관현황</a></li>
                    </ul>
                </div>
                <div class="menu_item">
                    <input class="focus_trap">
                    <label class="menu_label">
                        도서자료실
                        <span class="fa fa-plus" id="icon"></span>
                        <span class="fa fa-minus" id="icon"></span>
                    </label>
                    <ul class="sub_menu">
                        <li><a href="sub03">자료실</a></li>
                        <li><a href="sub04">열람실예약</a></li>
                    </ul>
                </div>
                <div class="menu_item">
                    <input class="focus_trap">
                    <label class="menu_label">
                        회원서비스
                        <span class="fa fa-plus" id="icon"></span>
                        <span class="fa fa-minus" id="icon"></span>
                    </label>
                    <ul class="sub_menu">
                        <li><a href="sub05">회원가입</a></li>
                        <li><a href="sub06">마이페이지</a></li>
                    </ul>
                </div>
                <div class="menu_item">
                    <label class="menu_label">
                        <a href="#">도서검색</a>
                    </label>
                </div>
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 0) { ?>
                    <div class="menu_item">
                        <input class="focus_trap">
                        <label class="menu_label">
                            도서관리자
                            <span class="fa fa-plus" id="icon"></span>
                            <span class="fa fa-minus" id="icon"></span>
                        </label>
                        <ul class="sub_menu">
                            <li><a href="manage">신규도서등록</a></li>
                            <li><a href="manage">대출/열람실 업무조회</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </nav>
            <nav>
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <div class="menu_item">
                        <label for="login_pop_btn" class="nav_btns login">로그인</label>
                    </div>
                    <div class="menu_item">
                        <label for="register_pop_btn" class="nav_btns register">회원가입</label>
                    </div>
                <?php } else { ?>
                    <div class="menu_item">
                        <label class="menu_label">
                            <?= $_SESSION['user_id'], '(' . $_SESSION['user_name'] . ')' ?>
                        </label>
                    </div>
                    <div class="menu_item">
                        <label class="menu_label">
                            <a href="logout">로그아웃</a>
                        </label>
                    </div>
                <?php } ?>
            </nav>
        </div>
    </header>
    <input type="checkbox" name="popup" id="login_pop_btn" hidden>
    <div class="pop_container" id="login_pop">
        <div class="pop_box">
            <div class="pop_head">
                <h2>로그인</h2>
                <label for="login_pop_btn" class="close">닫기</label>
            </div>
            <div class="pop_wrap form_wrap">
                <form action="index" method="POST">
                    <p>아이디</p>
                    <input type="text" name="user_id" placeholder="아이디를 입력해주세요" required>
                    <p>비밀번호</p>
                    <input type="password" name="user_pwd" placeholder="비밀번호를 입력해주세요" required>
                    <button type="submit">로그인</button>
                </form>
            </div>
        </div>
    </div>
    <input type="checkbox" name="popup" id="register_pop_btn" hidden>
    <div class="pop_container" id="register_pop">
        <div class="pop_box">
            <div class="pop_head">
                <h2>회원가입</h2>
                <label for="register_pop_btn" class="close">닫기</label>
            </div>
            <div class="pop_wrap form_wrap">
                <form action="index" method="POST">
                    <p>이름</p>
                    <input type="text" name="user_name" placeholder="이름을 입력해주세요" required>
                    <p>아이디</p>
                    <input type="text" name="user_id" placeholder="아이디를 입력해주세요" required>
                    <p>비밀번호</p>
                    <input type="password" name="user_pwd" placeholder="비밀번호를 입력해주세요" required>
                    <button type="submit">회원가입</button>
                </form>
            </div>
        </div>
    </div>