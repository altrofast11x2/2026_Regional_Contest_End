<?php require_once "./View/partials/kick.php"; ?>
<?php require_once "./View/partials/header.php"; ?>
<style>

</style>
<section id="sub06">
    <div class="container">
        <h2 class="section_title">마이페이지</h2>

        <!-- 도서 대출 현황 -->
        <div class="rented_container" style="margin-bottom:50px;">
            <h2 class="section_title small">도서대출 현황</h2>
            <div class="table_wrapper">
                <table>
                    <thead>
                        <tr>
                            <th width="40%">도서정보</th>
                            <th width="20%">대출일 / 반납일</th>
                            <th width="15%">남은 기간</th>
                            <th width="25%">관리</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($my_rentals)): ?>
                            <tr>
                                <td colspan="4" style="text-align:center;padding:50px 0;">대여중인 책이 없습니다.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($my_rentals as $r):
                                $today    = new DateTime('today');
                                $giveback = new DateTime(date('Y-m-d', strtotime($r['giveback'])));
                                // 음수 처리: giveback < today 이면 연체
                                if ($giveback >= $today) {
                                    $diff = (int)$today->diff($giveback)->days;
                                } else {
                                    $diff = -(int)$giveback->diff($today)->days;
                                }
                            ?>
                                <tr>
                                    <td style="display:flex;align-items:center;gap:15px;">
                                        <img src="/View/B-Module/images/<?= htmlspecialchars($r['img']) ?>" alt="book" style="width:60px;height:80px;object-fit:cover;">
                                        <div>
                                            <strong><?= htmlspecialchars($r['title']) ?></strong><br>
                                            <small><?= htmlspecialchars($r['author']) ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <?= substr($r['rented'], 5, 5) ?><br>
                                        ~ <?= substr($r['giveback'], 5, 5) ?>
                                    </td>
                                    <td style="font-weight:bold;color:<?= $diff < 0 ? '#ff4d4d' : ($diff === 0 ? '#ff9800' : '#007bff') ?>;">
                                        <?php
                                        if ($diff < 0)      echo '연체 ' . abs($diff) . '일';
                                        elseif ($diff === 0) echo '오늘 반납일';
                                        else                 echo $diff . '일 남음';
                                        ?>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="book_idx" value="<?= $r['book_idx'] ?>">
                                            <button type="submit" name="action" value="return" class="return" style="padding:8px 15px;cursor:pointer;">반납하기</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 열람실 예약 현황 -->
        <div class="rented_container">
            <h2 class="section_title small">열람실 예약 현황</h2>
            <div class="table_wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>좌석번호</th>
                            <th>예약일</th>
                            <th>시작시간</th>
                            <th>종료시간</th>
                            <th>예약자 ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($my_reservations)): ?>
                            <tr>
                                <td colspan="5" style="text-align:center;padding:30px 0;">예약 현황이 없습니다.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($my_reservations as $res): ?>
                                <tr>
                                    <td><strong><?= $res['r_no'] ?>번</strong></td>
                                    <td><?= $res['r_date'] ?></td>
                                    <td><?= substr($res['s_time'], 0, 5) ?></td>
                                    <td><?= substr($res['e_time'], 0, 5) ?></td>
                                    <td><?= htmlspecialchars($res['user_id']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<?php require_once "./View/partials/footer.php"; ?>