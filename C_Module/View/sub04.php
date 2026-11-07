<?php require_once "./View/partials/kick.php"; ?>
<?php require_once "./View/partials/header.php"; ?>
<section id="sub04">
    <div class="container">
        <h2 class="section_title">열람실 좌석 예약</h2>
        <div class="sub04_container">
            <p style="text-align: center;margin:10px 0; ">클릭 또는 드래그를 하여 최대 <strong>4</strong>석까지 선택 가능합니다.</p>
            <div class="seat-Map" id="seatMap">
                <div class="seat">1</div>
                <div class="seat">2</div>
                <div class="seat">3</div>
                <div class="seat">4</div>
                <div class="seat">5</div>
                <div class="seat">6</div>
                <div class="seat">7</div>
                <div class="seat">8</div>
                <div class="seat">9</div>
                <div class="seat">10</div>
                <div class="seat">11</div>
                <div class="seat">12</div>
                <div class="seat">13</div>
                <div class="seat">14</div>
                <div class="seat">15</div>
                <div class="seat">16</div>
                <div class="seat">17</div>
                <div class="seat">18</div>
                <div class="seat">19</div>
                <div class="seat">20</div>
                <div class="seat">21</div>
                <div class="seat">22</div>
                <div class="seat">23</div>
                <div class="seat">24</div>
                <div class="seat">25</div>
                <div class="seat">26</div>
                <div class="seat">27</div>
                <div class="seat">28</div>
                <div class="seat">29</div>
                <div class="seat">30</div>
                <div class="seat">31</div>
                <div class="seat">32</div>
                <div class="seat">33</div>
                <div class="seat">34</div>
                <div class="seat">35</div>
                <div class="seat">36</div>
                <div class="seat">37</div>
                <div class="seat">38</div>
                <div class="seat">39</div>
                <div class="seat">40</div>
                <div class="seat">41</div>
                <div class="seat">42</div>
                <div class="seat">43</div>
                <div class="seat">44</div>
                <div class="seat">45</div>
                <div class="seat">46</div>
                <div class="seat">47</div>
                <div class="seat">48</div>
                <div class="seat">49</div>
                <div class="seat">50</div>
                <div class="seat">51</div>
                <div class="seat">52</div>
                <div class="seat">53</div>
                <div class="seat">54</div>
                <div class="seat">55</div>
                <div class="seat">56</div>
                <div class="seat">57</div>
                <div class="seat">58</div>
                <div class="seat">59</div>
                <div class="seat">60</div>
                <div class="seat">61</div>
                <div class="seat">62</div>
                <div class="seat">63</div>
                <div class="seat">64</div>
                <div class="seat">65</div>
                <div class="seat">66</div>
                <div class="seat">67</div>
                <div class="seat">68</div>
                <div class="seat">69</div>
                <div class="seat">70</div>
                <div class="seat">71</div>
                <div class="seat">72</div>
                <div class="seat">73</div>
                <div class="seat">74</div>
                <div class="seat">75</div>
            </div>
            <div class="status-bar">
                <form method="POST">
                    <div class="legend">
                        <div class="legend_wrap">
                            <div class="legend-item"><span class="seat-icon available">선택 가능</span></div>
                            <div class="legend-item"><span class="seat-icon selected">선택됨</span></div>
                            <div class="legend-item"><span class="seat-icon occupied">예약됨</span></div>
                        </div>
                        <div class="controll">
                            <input type="date" name="date" id="date" min="<?= date("Y-m-d") ?>">
                            <p>시작시간: </p>
                            <input type="time" name="start" id="start">
                            <p>종료시간: </p>
                            <input type="time" name="end" id="end">
                            <div class="selected-info">선택좌석: <span id="selectedSeats">없음</span></div>
                        </div>
                    </div>
                    <input type="hidden" name="seat_nos" id="seat_nos">
                    <button class="btn-reserve" id="btnReserve" disabled>예약하기</button>
                </form>
            </div>
        </div>
        <script src="/View/B-Module/Js/script.js" type="module"></script>
</section>
<?php require_once "./View/partials/footer.php"; ?>