<?php require_once "./View/partials/kick.php"; ?>
<?php require_once "./View/partials/header.php"; ?>
<section id="sub03">
    <div class="container">
        <h2 class="section_title">자료실</h2>
        <div class="sub03_container">
            <?php
            $books = DB::fetchAll("SELECT * FROM library");
            $my_rented_book = [];
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $rentals = DB::fetchAll("SELECT * FROM rental WHERE user_id = '$user_id' AND status = 0 ");
                $my_rented_book = array_column($rentals, 'book_idx');
                foreach ($rentals as $r) {
                    $rentals[$r['book_idx']] = $r;
                }
            }
            foreach ($books as $b) { ?>
                <div class="book">
                    <div class="thumb">
                        <img src="/View/B-Module/images/<?= $b['img'] ?>" alt="library_img">
                    </div>
                    <?php if (isset($rentals[$b['idx']])) {
                        $r_info = $rentals[$b['idx']];  ?>
                        <div class="status" style="background-color: red;">대출중</div>
                        <div class="rent">
                            <form method="POST">
                                <input type="hidden" name="book_idx" value="<?= $b['idx'] ?>">
                                <h3 class="return_date">대출 기간:<?= substr($r_info['rented'], 5, 5) ?> ~ <?= substr($r_info['giveback'], 5, 5) ?>일까지</h3>
                                <button type="submit" name="action" value="return">반납하기</button>
                            </form>
                        </div>
                    <?php } elseif (($b['stocks'] ?? 0) > 0) { ?>
                        <div class="status" style="background-color: green;">대여가능</div>
                        <div class="rent">
                            <form method="POST">
                                <input type="hidden" name="book_idx" value="<?= $b['idx'] ?>">
                                <button type="submit" name="action" value="rent">대여하기</button>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="status" style="background-color: red;">대여불가</div>
                        <div class="rent">
                            <form method="POST">
                                <input type="hidden" name="book_idx" value="<?= $b['idx'] ?>">
                                <button type="submit" disabled>재고없음</button>
                            </form>
                        </div>
                    <?php } ?>
                    <ul class="book_desc">
                        <h3>도서명: <?= $b['title'] ?></h3>
                        <li>저자: <?= $b['author'] ?></li>
                        <li>발행년: <?= $b['year'] ?></li>
                        <li>가격: <?= number_format($b['price']) ?>원</li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php require_once "./View/partials/footer.php"; ?>