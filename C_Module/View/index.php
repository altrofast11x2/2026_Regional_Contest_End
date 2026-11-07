<!-- 헤더 -->
<?php require_once "./View/partials/header.php"; ?>
<!-- 팝업 --> <?php foreach ($popups as $i => $pop): ?> <?php $id = "start_pop_btn_" . $i; ?> <?php $pop_id = "start_pop_" . $i; ?> <input type="checkbox" id="<?= $id ?>" hidden checked> <label for="<?= $id ?>"></label>
    <div class="pop_container" id="<?= $pop_id ?>">
        <div class="pop_box">
            <div class="pop_head">
                <h2><?= $pop['title'] ?></h2> <label for="<?= $id ?>" class="close">닫기</label>
            </div>
            <div class="pop_wrap">
                <div class="pop_body"> <img src="/View/B-Module/images/<?= $pop['img'] ?>"> </div>
                <div class="pop_foot">
                    <p><?= $pop['content'] ?></p>
                </div>
            </div>
        </div>
    </div> <?php endforeach; ?>
<input type="checkbox" name="popup" id="program1_btn" hidden>
<label for="program1_btn"></label>
<div class="pop_container " id="program1_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program1_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/1.jpg" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>피아니스트 김미정과 함께하는 힐링 클래식</h2>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="popup" id="program2_btn" hidden>
<label for="program2_btn"></label>
<div class="pop_container " id="program2_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program2_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/2.png" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>도란도란] 나를 찾아가는 마음챙김 그림책테라피</h2>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="popup" id="program3_btn" hidden>
<label for="program3_btn"></label>
<div class="pop_container " id="program3_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program3_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/3.jpg" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>신흥어울마당작은]2024년 하반기 프로그램<br> ' 뚝딱 한국사'</h2>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="popup" id="program4_btn" hidden>
<label for="program4_btn"></label>
<div class="pop_container " id="program4_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program4_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/4.png" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>[수주](성인)마을미디어 교육생 모집</h2>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="popup" id="program5_btn" hidden>
<label for="program5_btn"></label>
<div class="pop_container " id="program5_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program5_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/5.jpg" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>나를 치유하는 명화</h2>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="popup" id="program6_btn" hidden>
<label for="program6_btn"></label>
<div class="pop_container " id="program6_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program6_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/6.jpg" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>[문화가 있는 날] 푸른 하늘이 좋아요!</h2>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="popup" id="program7_btn" hidden>
<label for="program7_btn"></label>
<div class="pop_container " id="program7_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program7_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/7.jpg" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>책 속에서 사람을 만나다</h2>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="popup" id="program8_btn" hidden>
<label for="program8_btn"></label>
<div class="pop_container " id="program8_pop">
    <div class="pop_box special">
        <div class="pop_head ">
            <h2>프로그램</h2>
            <label for="program8_btn" class="close">닫기</label>
        </div>
        <div class="pop_wrap">
            <div class="pop_body program_pop">
                <img src="/View/B-Module/프로그램/8.jpg" alt="program_pops">
            </div>
            <div class="pop_foot program_pop_foot">
                <h2>서울 문화의 밤(8월) 행사 - 국지승 그림책 작가와<br> 방구석 북토크</h2>
            </div>
        </div>
    </div>
</div>
<!-- 슬라이드 -->
<div class="slide_container">
    <div class="slide2">
        <ul>
            <li>
                <h2>지식을 넘어, 능력을 만들다</h2>
                <p>다양한 분야의 도서를 통해 실질적인 배움을 경험하세요</p>
                <div class="ment">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae explicabo illum neque pariatur dicta a,
                        adipisci qui corrupti ratione officiis atque
                    </p>
                </div>
            </li>
            <li>
                <h2>읽고, 배우고, 성장하는 공간</h2>
                <p>누구나 자유롭게 이용할 수 있는 열린 학습 공간입니다</p>
                <div class="ment">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae explicabo illum neque pariatur dicta a,
                        adipisci qui corrupti ratione officiis atque </p>
                </div>
            </li>
            <li>
                <h2>가능성을 깨우는 도서관</h2>
                <p>새로운 아이디어와 영감을 발견하는 시간을 가져보세요</p>
                <div class="ment">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae explicabo illum neque pariatur dicta a,
                        adipisci qui corrupti ratione officiis atque </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="bars">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="slide_block1"></div>
    <div class="slide_block2"></div>
    <div class="s_incon">
        <ul class="slide">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <div class="slide_block3"></div>
</div>
<!-- 행사달력 & 자주찾는 메뉴 -->
<div class="two_sections">
    <div class="container">
        <section id="calender">
            <h2 class="section_title">행사달력</h2>
            <div class="calender_container">
                <div class="calender_head">
                    <h1>2026년 4월</h1>
                    <div class="date">
                        <select name="year" id="chose_date">
                            <option value="2025">2025년</option>
                            <option value="2026" selected>2026년</option>
                            <option value="2027">2027년</option>
                        </select>
                        <select name="month" id="chose_date">
                            <option value="1">1월</option>
                            <option value="2">2월</option>
                            <option value="3">3월</option>
                            <option value="4" selected>4월</option>
                            <option value="5">5월</option>
                            <option value="6">6월</option>
                            <option value="7">7월</option>
                            <option value="8">8월</option>
                            <option value="9">9월</option>
                            <option value="10">10월</option>
                            <option value="11">11월</option>
                            <option value="12">12월</option>
                        </select>
                    </div>
                </div>
                <div class="calender_body">
                    <div class="day-header">SUN</div>
                    <div class="day-header">MON</div>
                    <div class="day-header">TUE</div>
                    <div class="day-header">WED</div>
                    <div class="day-header">THU</div>
                    <div class="day-header">FRI</div>
                    <div class="day-header">SAT</div>
                    <div class="empty-day rest-sun">29</div>
                    <div class="empty-day">30</div>
                    <div class="empty-day">31</div>
                    <div>1<p>전시 [책피는숙련도서관] 4월 북큐레이션</p>
                    </div>
                    <div>2</div>
                    <div>3<p>전시 [책피는숙련도서관] 4월 북큐레이션</p>
                    </div>
                    <div class="rest-sat">4</div>
                    <div class="rest-sun">5</div>
                    <div>6<p>휴관 정기휴관일</p>
                    </div>
                    <div>7</div>
                    <div>8</div>
                    <div>9</div>
                    <div>10<p>숙련기술인과의 만남</p>
                    </div>
                    <div class="rest-sat">11</div>
                    <div class="rest-sun">12</div>
                    <div>13<p>휴관 정기휴관일</p>
                    </div>
                    <div>14</div>
                    <div>15</div>
                    <div>16</div>
                    <div>17<p>책읽는 숙련광장<br>기능 책마당<br>책읽는 숙련기술</p>
                    </div>
                    <div class="rest-sat">18</div>
                    <div class="rest-sun">19</div>
                    <div>20<p>휴관 정기휴관일</p>
                    </div>
                    <div>21<p>숙련기술 책마당<br>책읽는 맑은냇가<br>책읽는 숙련광장</p>
                    </div>
                    <div>22</div>
                    <div>23</div>
                    <div>24</div>
                    <div class="rest-sat">25</div>
                    <div class="rest-sun">26</div>
                    <div>27</div>
                    <div>28</div>
                    <div>29</div>
                    <div>30</div>
                    <div class="empty-day">1</div>
                    <div class="empty-day rest-sat">2</div>
                </div>
            </div>
        </section>
        <section id="quick">
            <h2 class="section_title">자주찾는 메뉴</h2>
            <div class="quick_container">
                <div class="quick_box">
                    <i class="fa fa-book-open-reader fa-2x"></i>
                    <h3>도서대출</h3>
                </div>
                <div class="quick_box">
                    <i class="fa fa-hand-holding-hand fa-2x"></i>
                    <h3>도서반납</h3>
                </div>
                <div class="quick_box">
                    <i class="fa fa-couch fa-2x"></i>
                    <h3>좌석예약</h3>
                </div>
                <div class="quick_box">
                    <i class="fa fa-book-bookmark fa-2x"></i>
                    <h3>희망도서신청</h3>
                </div>
                <div class="quick_box">
                    <i class="fa fa-robot fa-2x"></i>
                    <h3>AI추천도서</h3>
                </div>
                <div class="quick_box">
                    <i class="fa fa-book-atlas fa-2x"></i>
                    <h3>전자도서관</h3>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- 도서관 소식 -->
<section id="notice_section">
    <div class="container">
        <h2 class="section_title">도서관 소식</h2>
        <div class="notice_container">
            <div class="notice_tabs">
                <input type="radio" name="notice_tab" id="tab1" hidden checked>
                <input type="radio" name="notice_tab" id="tab2" hidden>
                <input type="radio" name="notice_tab" id="tab3" hidden>

                <label for="tab1" class="tab_label">일반공지</label>
                <label for="tab2" class="tab_label">행사안내</label>
                <label for="tab3" class="tab_label">채용공지</label>

                <div class="tab_content">
                    <ul class="notice_list tab1_content">
                        <li>
                            <a href="#">
                                <span class="notice_title">더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트 당첨자 발표</span>
                                <span class="notice_date">2024-08-08</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트</span>
                                <span class="notice_date">2024-07-24</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">연구자를 위한 텍스트 마이닝(심화) 교육생 모집 안내</span>
                                <span class="notice_date">2024-07-17</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">「실감체험관」 전국민 소문내기 이벤트 당첨자 발표</span>
                                <span class="notice_date">2024-06-10</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">디지털인문학과 네트워크 분석 교육생 모집 안내</span>
                                <span class="notice_date">2024-05-14</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">스킬스북도서관 -「청년 디지털 봉사단 ‘잇(IT)다’5기」- 최종 합격자 발표</span>
                                <span class="notice_date">2024-05-10</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="notice_list tab2_content">
                        <li>
                            <a href="#">
                                <span class="notice_title">2024년 제9회 「월간 인문학을 만나다」 강연 안내</span>
                                <span class="notice_date">2024-08-08</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">「스킬스북도서관이 간식박스 쏩니다!」7월 당첨 발표</span>
                                <span class="notice_date">2024-08-07</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">별 헤는 「실감체험관」이벤트</span>
                                <span class="notice_date">2024-07-25</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">2024년 제8회 「월간 인문학을 만나다」 강연 안내</span>
                                <span class="notice_date">2024-07-15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">스킬스북도서관이 간식박스 쏩니다!</span>
                                <span class="notice_date">2024-07-02</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">2024년 제7회 「월간 인문학을 만나다」 강연 안내</span>
                                <span class="notice_date">2024-07-01</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="notice_list tab3_content">
                        <li>
                            <a href="#">
                                <span class="notice_title">2024년 사서직 공무원 경력경쟁채용 필기시험 정답가안 공개 및 이의제기 안내</span>
                                <span class="notice_date">2024-08-03</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">스킬스북도서관 공무직 근로자(미화) 채용 서류전형 합격자 및 면접전형 공고</span>
                                <span class="notice_date">2024-08-02</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">2024년도 사서직 공무원 경력경쟁채용 필기시험 일정 ‧ 장소 및 응시자 준수사항 공고</span>
                                <span class="notice_date">2024-07-26</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">스킬스북도서관 공무직 근로자(미화) 채용공고(재재공고)</span>
                                <span class="notice_date">2024-07-24</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">스킬스북도서관 국가서지과 공무직 근로자 채용 최종 합격자 공고</span>
                                <span class="notice_date">2024-07-18</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">스킬스북도서관 국가서지과 기간제 근로자(휴직대체) 채용 최종합격자 공고</span>
                                <span class="notice_date">2024-07-16</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="notice_title">스킬스북도서관 국가서지과 공무직 근로자 채용 서류전형(1차) 합격자 발표 및 면접시험(2차) 계획 공고</span>
                                <span class="notice_date">2024-07-05</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 프로그램 섹션 -->
<section id="program">
    <div class="container">
        <h2 class="section_title">프로그램</h2>
        <div class="program_container">
            <label class="program_card" for="program1_btn">
                <img src="/View/B-Module/프로그램/1.jpg" alt="program1">
                <label class="program_desc" for="program1_btn">
                    <h3>피아니스트 김미정과 함께하는 <br> 힐링 클래식</h3>
                </label>
            </label>
            <label class="program_card" for="program2_btn">
                <img src="/View/B-Module/프로그램/2.png" alt="program2">
                <label class="program_desc" for="program2_btn">
                    <h3>도란도란</h3>
                </label>
            </label>
            <label class="program_card" for="program3_btn">
                <img src="/View/B-Module/프로그램/3.jpg" alt="program3">
                <label class="program_desc" for="program3_btn">
                    <h3>신흥어울마당작은</h3>
                </label>
            </label>
            <label class="program_card" for="program4_btn">
                <img src="/View/B-Module/프로그램/4.png" alt="program4">
                <label class="program_desc" for="program4_btn">
                    <h3>수주</h3>
                </label>
            </label>
            <label class="program_card" for="program5_btn">
                <img src="/View/B-Module/프로그램/5.jpg" alt="program5">
                <label class="program_desc" for="program5_btn">
                    <h3>나를 치유하는 명화</h3>
                </label>
            </label>
            <label class="program_card" for="program6_btn">
                <img src="/View/B-Module/프로그램/6.jpg" alt="program6">
                <label class="program_desc" for="program6_btn">
                    <h3>문화가 있는 날</h3>
                </label>
            </label>
            <label class="program_card" for="program7_btn">
                <img src="/View/B-Module/프로그램/7.jpg" alt="program7">
                <label class="program_desc" for="program7_btn">
                    <h3>책 속에서 사람을 만나다 </h3>
                </label>
            </label>
            <label class="program_card" for="program8_btn">
                <img src="/View/B-Module/프로그램/8.jpg" alt="program8">
                <label class="program_desc" for="program8_btn">
                    <h3>서울 문화의 밤</h3>
                </label>
            </label>
        </div>
    </div>
</section>
<!-- 추천도서 -->
<section id="recommend">
    <div class="container">
        <h2 class="section_title">추천도서</h2>
        <input type="radio" name="slide" id="s1" hidden checked>
        <input type="radio" name="slide" id="s2" hidden>
        <input type="radio" name="slide" id="s3" hidden>
        <input type="radio" name="slide" id="s4" hidden>
        <input type="radio" name="slide" id="s5" hidden>
        <input type="radio" name="slide" id="s6" hidden>
        <input type="radio" name="slide" id="s7" hidden>
        <div class="recommend_container">
            <div class="stage">
                <div class="track">
                    <div class="scene">
                        <div class="thumb_wrap">
                            <div class="card"><img src="/View/B-Module/추천도서/추천도서1.jpg" alt="recommended_books">
                                <label for="s2" class="prev nav p1">다음</label>
                                <label for="s7" class="next nav n1">이전</label>
                                <div class="card_wrap">
                                    <h2>추천도서1 <span>1/7</span></h2>
                                    <ul class="card_quick">
                                        <li>나에게 나다움을 주기로 했다 : 나다움을 찾아가는 다섯 가지 마음 습관</li>
                                        <li>지은이 : 고정욱</li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fuga velit corrupti aliquam ipsum
                                        quia quas saepe quisquam facere, adipisci tenetur eaque? Quidem eos repudiandae quo inventore
                                        numquam atque rem, at tempora similique labore voluptatem reprehenderit esse amet perspiciatis
                                        consequatur ratione voluptas dolor, excepturi ipsum! Ducimus et mollitia dolorum exercitationem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scene">
                        <div class="thumb_wrap">
                            <div class="card"><img src="/View/B-Module/추천도서/추천도서2.jpg" alt="recommended_books">
                                <label for="s3" class="prev nav p2">다음</label>
                                <label for="s1" class="next nav n2">이전</label>
                                <div class="card_wrap">
                                    <h2>추천도서2 <span>2/7</span></h2>
                                    <ul class="card_quick">
                                        <li>여름이 반짝</li>
                                        <li>지은이 : 김수빈 </li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fuga velit corrupti aliquam ipsum
                                        quia quas saepe quisquam facere, adipisci tenetur eaque? Quidem eos repudiandae quo inventore
                                        numquam atque rem, at tempora similique labore voluptatem reprehenderit esse amet perspiciatis
                                        consequatur ratione voluptas dolor, excepturi ipsum! Ducimus et mollitia dolorum exercitationem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scene">
                        <div class="thumb_wrap">
                            <div class="card"><img src="/View/B-Module/추천도서/추천도서3.jpg" alt="recommended_books">
                                <label for="s4" class="prev nav p3">다음</label>
                                <label for="s2" class="next nav n3">이전</label>
                                <div class="card_wrap">
                                    <h2>추천도서3 <span>3/7</span></h2>
                                    <ul class="card_quick">
                                        <li>사랑 한 꼬집을 넣으면</li>
                                        <li>지은이 : 배리 팀스</li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fuga velit corrupti aliquam ipsum
                                        quia quas saepe quisquam facere, adipisci tenetur eaque? Quidem eos repudiandae quo inventore
                                        numquam atque rem, at tempora similique labore voluptatem reprehenderit esse amet perspiciatis
                                        consequatur ratione voluptas dolor, excepturi ipsum! Ducimus et mollitia dolorum exercitationem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scene">
                        <div class="thumb_wrap">
                            <div class="card"><img src="/View/B-Module/추천도서/추천도서4.jpg" alt="recommended_books">
                                <label for="s5" class="prev nav p4">다음</label>
                                <label for="s3" class="next nav n4">이전</label>
                                <div class="card_wrap">
                                    <h2>추천도서4 <span>4/7</span></h2>
                                    <ul class="card_quick">
                                        <li>정말 정말 소리 지르고 싶어!</li>
                                        <li>지은이 : 사이먼 필립</li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fuga velit corrupti aliquam ipsum
                                        quia quas saepe quisquam facere, adipisci tenetur eaque? Quidem eos repudiandae quo inventore
                                        numquam atque rem, at tempora similique labore voluptatem reprehenderit esse amet perspiciatis
                                        consequatur ratione voluptas dolor, excepturi ipsum! Ducimus et mollitia dolorum exercitationem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scene">
                        <div class="thumb_wrap">
                            <div class="card"><img src="/View/B-Module/추천도서/추천도서5.jpg" alt="recommended_books">
                                <label for="s6" class="prev nav p5">다음</label>
                                <label for="s4" class="next nav n5">이전</label>
                                <div class="card_wrap">
                                    <h2>추천도서5 <span>5/7</span></h2>
                                    <ul class="card_quick">
                                        <li>힐빌리의 노래 : 위기의 가정과 문화에 대한 회고</li>
                                        <li>지은이 : J.D 밴스</li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fuga velit corrupti aliquam ipsum
                                        quia quas saepe quisquam facere, adipisci tenetur eaque? Quidem eos repudiandae quo inventore
                                        numquam atque rem, at tempora similique labore voluptatem reprehenderit esse amet perspiciatis
                                        consequatur ratione voluptas dolor, excepturi ipsum! Ducimus et mollitia dolorum exercitationem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scene">
                        <div class="thumb_wrap">
                            <div class="card"><img src="/View/B-Module/추천도서/추천도서6.jpg" alt="recommended_books">
                                <label for="s7" class="prev nav p6">다음</label>
                                <label for="s5" class="next nav n6">이전</label>
                                <div class="card_wrap">
                                    <h2>추천도서6 <span>6/7</span></h2>
                                    <ul class="card_quick">
                                        <li>(허영만의) 커피 한잔 할까요?</li>
                                        <li>지은이 : 허영만</li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fuga velit corrupti aliquam ipsum
                                        quia quas saepe quisquam facere, adipisci tenetur eaque? Quidem eos repudiandae quo inventore
                                        numquam atque rem, at tempora similique labore voluptatem reprehenderit esse amet perspiciatis
                                        consequatur ratione voluptas dolor, excepturi ipsum! Ducimus et mollitia dolorum exercitationem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scene">
                        <div class="thumb_wrap">
                            <div class="card"><img src="/View/B-Module/추천도서/추천도서7.jpg" alt="recommended_books">
                                <label for="s1" class="prev nav p7">다음</label>
                                <label for="s6" class="next nav n7">이전</label>
                                <div class="card_wrap">
                                    <h2>추천도서7 <span>7/7</span></h2>
                                    <ul class="card_quick">
                                        <li>두더지의 여름: 김상근 그림책</li>
                                        <li>지은이 : 김상근</li>
                                    </ul>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fuga velit corrupti aliquam ipsum
                                        quia quas saepe quisquam facere, adipisci tenetur eaque? Quidem eos repudiandae quo inventore
                                        numquam atque rem, at tempora similique labore voluptatem reprehenderit esse amet perspiciatis
                                        consequatur ratione voluptas dolor, excepturi ipsum! Ducimus et mollitia dolorum exercitationem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 푸터 -->
<?php require_once "./View/partials/footer.php" ?>