<?php require_once "./View/partials/kick.php"; ?>
<?php require_once "./View/partials/header.php"; ?>
<section id="manage">
    <div class="container">
        <h2 class="section_title">관리자 페이지</h2>

        <!-- 탭 버튼 -->
        <div class="manage_tabs">
            <button onclick="switchTab('tab_book')"      id="btn_book"    class="active">신규 도서 등록</button>
            <button onclick="switchTab('tab_popup')"     id="btn_popup"              >팝업 관리</button>
            <button onclick="switchTab('tab_business')"  id="btn_business"           >대출 / 열람실 업무조회</button>
        </div>

        <!-- ══════════════════════════════════════════
             탭1: 신규 도서 등록
        ═══════════════════════════════════════════ -->
        <div id="tab_book" class="tab_panel active">
            <form class="manage_form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_book">
                <div class="field">
                    <label>도서명 <span style="color:red">*</span></label>
                    <input type="text" name="title" required placeholder="도서명을 입력하세요">
                </div>
                <div class="field">
                    <label>저자명 <span style="color:red">*</span></label>
                    <input type="text" name="author" required placeholder="저자명을 입력하세요">
                </div>
                <div class="field">
                    <label>출판사 <span style="color:red">*</span></label>
                    <input type="text" name="publisher" required placeholder="출판사를 입력하세요">
                </div>
                <div class="field">
                    <label>도서사진 <small style="color:#888">(JPG, JPEG, PNG)</small></label>
                    <input type="file" name="img" accept=".jpg,.jpeg,.png">
                </div>
                <div class="field">
                    <label>발행년 <span style="color:red">*</span></label>
                    <input type="number" name="year" required min="1900" max="2100" placeholder="예: 2024">
                </div>
                <div class="field">
                    <label>가격 <span style="color:red">*</span></label>
                    <input type="number" name="price" required min="0" placeholder="원 단위 숫자">
                </div>
                <button type="submit" class="btn_submit">도서 등록</button>
            </form>
        </div>

        <!-- ══════════════════════════════════════════
             탭2: 팝업 관리
        ═══════════════════════════════════════════ -->
        <div id="tab_popup" class="tab_panel">

            <!-- 팝업 등록 폼 -->
            <h3 style="margin-bottom:14px;">팝업 등록</h3>
            <form class="manage_form" method="POST" enctype="multipart/form-data" style="margin-bottom:40px;">
                <input type="hidden" name="action" value="add_popup">
                <div class="field">
                    <label>제목 <span style="color:red">*</span></label>
                    <input type="text" name="title" required placeholder="팝업 제목">
                </div>
                <div class="field">
                    <label>내용</label>
                    <textarea name="content" placeholder="팝업 내용"></textarea>
                </div>
                <div class="field">
                    <label>이미지 <small style="color:#888">(JPG, JPEG, PNG)</small></label>
                    <input type="file" name="img" accept=".jpg,.jpeg,.png">
                </div>
                <div class="field" style="display:flex;gap:16px;">
                    <div style="flex:1;">
                        <label>팝업 시작일 <span style="color:red">*</span></label>
                        <input type="date" name="s_date" required>
                    </div>
                    <div style="flex:1;">
                        <label>팝업 종료일 <span style="color:red">*</span></label>
                        <input type="date" name="e_date" required>
                    </div>
                </div>
                <button type="submit" class="btn_submit">팝업 등록</button>
            </form>

            <!-- 팝업 목록 -->
            <h3 style="margin-bottom:10px;">팝업 목록</h3>
            <?php if (empty($all_popups)): ?>
                <p style="color:#888;">등록된 팝업이 없습니다.</p>
            <?php else: ?>
            <table class="manage_table">
                <thead>
                    <tr>
                        <th>ID</th><th>제목</th><th>시작일</th><th>종료일</th><th>수정</th><th>삭제</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_popups as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td style="text-align:left;"><?= htmlspecialchars($p['title']) ?></td>
                        <td><?= $p['s_date'] ?></td>
                        <td><?= $p['e_date'] ?></td>
                        <td>
                            <button class="btn_edit" onclick="openEditModal(
                                <?= $p['id'] ?>,
                                '<?= addslashes(htmlspecialchars($p['title'])) ?>',
                                '<?= addslashes(htmlspecialchars($p['content'])) ?>',
                                '<?= $p['s_date'] ?>',
                                '<?= $p['e_date'] ?>'
                            )">수정</button>
                        </td>
                        <td>
                            <form method="POST" onsubmit="return confirm('삭제하시겠습니까?')">
                                <input type="hidden" name="action" value="delete_popup">
                                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                <button type="submit" class="btn_del">삭제</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>

        <!-- ══════════════════════════════════════════
             탭3: 대출 / 열람실 업무조회
        ═══════════════════════════════════════════ -->
        <div id="tab_business" class="tab_panel">

            <!-- 도서 대출 현황 -->
            <h3 style="margin-bottom:10px;">도서 대출 현황</h3>
            <?php if (empty($all_rentals)): ?>
                <p style="color:#888;margin-bottom:40px;">대출중인 도서가 없습니다.</p>
            <?php else: ?>
            <table class="manage_table" style="margin-bottom:50px;">
                <thead>
                    <tr>
                        <th>도서명</th><th>저자명</th><th>출판사</th>
                        <th>대출일</th><th>반납일</th><th>남은기간</th>
                        <th>대출자 ID</th><th>처리</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_rentals as $r):
                        $today    = new DateTime('today');
                        $giveback = new DateTime(date('Y-m-d', strtotime($r['giveback'])));
                        if ($giveback >= $today) {
                            $diff = (int)$today->diff($giveback)->days;
                        } else {
                            $diff = -(int)$giveback->diff($today)->days;
                        }
                    ?>
                    <tr>
                        <td style="text-align:left;"><?= htmlspecialchars($r['title']) ?></td>
                        <td><?= htmlspecialchars($r['author']) ?></td>
                        <td><?= htmlspecialchars($r['publisher'] ?? '') ?></td>
                        <td><?= substr($r['rented'], 0, 10) ?></td>
                        <td><?= substr($r['giveback'], 0, 10) ?></td>
                        <td class="<?= $diff < 0 ? 'badge_overdue' : 'badge_ok' ?>">
                            <?php
                                if ($diff < 0)      echo '연체 ' . abs($diff) . '일';
                                elseif ($diff === 0) echo '오늘 반납일';
                                else                 echo $diff . '일 남음';
                            ?>
                        </td>
                        <td><?= htmlspecialchars($r['user_id']) ?></td>
                        <td>
                            <?php if ($diff < 0): ?>
                            <form method="POST" onsubmit="return confirm('반납 처리 하시겠습니까?')">
                                <input type="hidden" name="action" value="admin_return">
                                <input type="hidden" name="rental_idx" value="<?= $r['idx'] ?>">
                                <button type="submit" class="btn_ret">반납</button>
                            </form>
                            <?php else: ?>
                                <span style="color:#aaa;">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>

            <!-- 열람실 예약 현황 -->
            <h3 style="margin-bottom:10px;">열람실 예약 현황</h3>
            <?php if (empty($all_reservations)): ?>
                <p style="color:#888;">예약 현황이 없습니다.</p>
            <?php else: ?>
            <table class="manage_table">
                <thead>
                    <tr>
                        <th>좌석번호</th><th>예약일</th><th>시작시간</th><th>종료시간</th>
                        <th>예약자 ID</th><th>취소</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_reservations as $res): ?>
                    <tr>
                        <td><?= $res['r_no'] ?>번</td>
                        <td><?= $res['r_date'] ?></td>
                        <td><?= substr($res['s_time'], 0, 5) ?></td>
                        <td><?= substr($res['e_time'], 0, 5) ?></td>
                        <td><?= htmlspecialchars($res['user_id']) ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('예약을 취소하시겠습니까?')">
                                <input type="hidden" name="action" value="cancel_reservation">
                                <input type="hidden" name="idx" value="<?= $res['idx'] ?>">
                                <button type="submit" class="btn_cancel">취소</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- ══ 팝업 수정 모달 ═══════════════════════════════ -->
<div class="modal_bg" id="editModal">
    <div class="modal_box">
        <button class="modal_close" onclick="closeEditModal()">✕</button>
        <h3>팝업 수정</h3>
        <form class="manage_form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit_popup">
            <input type="hidden" name="id" id="edit_id">
            <div class="field">
                <label>제목</label>
                <input type="text" name="title" id="edit_title" required>
            </div>
            <div class="field">
                <label>내용</label>
                <textarea name="content" id="edit_content"></textarea>
            </div>
            <div class="field">
                <label>이미지 교체 <small style="color:#888">(선택, JPG/JPEG/PNG)</small></label>
                <input type="file" name="img" accept=".jpg,.jpeg,.png">
            </div>
            <div class="field" style="display:flex;gap:16px;">
                <div style="flex:1;">
                    <label>팝업 시작일</label>
                    <input type="date" name="s_date" id="edit_s_date" required>
                </div>
                <div style="flex:1;">
                    <label>팝업 종료일</label>
                    <input type="date" name="e_date" id="edit_e_date" required>
                </div>
            </div>
            <button type="submit" class="btn_submit">수정 완료</button>
        </form>
    </div>
</div>

<script>
function switchTab(id) {
    document.querySelectorAll('.tab_panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.manage_tabs button').forEach(b => b.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    const map = { tab_book:'btn_book', tab_popup:'btn_popup', tab_business:'btn_business' };
    document.getElementById(map[id]).classList.add('active');
}

function openEditModal(id, title, content, s_date, e_date) {
    document.getElementById('edit_id').value      = id;
    document.getElementById('edit_title').value   = title;
    document.getElementById('edit_content').value = content;
    document.getElementById('edit_s_date').value  = s_date;
    document.getElementById('edit_e_date').value  = e_date;
    document.getElementById('editModal').classList.add('open');
}
function closeEditModal() {
    document.getElementById('editModal').classList.remove('open');
}
// 모달 바깥 클릭 시 닫기
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) closeEditModal();
});
</script>

<?php require_once "./View/partials/footer.php"; ?>