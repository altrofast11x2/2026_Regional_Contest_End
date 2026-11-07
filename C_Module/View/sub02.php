    <?php require_once "./View/partials/header.php"?>
    <style>
        #map-container {display: flex;justify-content: center;}
        #map-container svg path {fill: #d1d5db;stroke: #fff;stroke-width: 1;transition: all 0.2s;cursor: pointer;}
        #lib-table-section .controls {display: flex;gap: 10px;margin-bottom: 10px;}
        #lib-table-section input {padding: 6px 10px;border: 1px solid #ccc;border-radius: 4px;font-size: 13px;}
        #lib-table-section select {padding: 6px 10px;border: 1px solid #ccc;border-radius: 4px;font-size: 13px;}
        #lib-table {width: 100%;border-collapse: collapse;font-size: 12px;}
        #lib-table th,
        #lib-table td {border: 1px solid #ddd;padding: 6px 8px;text-align: left;white-space: nowrap;}
        #lib-table td:nth-child(5),
        #lib-table td:nth-child(12) {white-space: normal;min-width: 120px;}
        #lib-table th {background: #555;color: #fff;}
        #lib-table tr:nth-child(even) {background: #f9f9f9;}
        #lib-table mark {background: #ffe066;}
        .tooltip {position: fixed;pointer-events: none;background: rgba(0, 0, 0, .8);color: #fff;padding: 6px 10px;border-radius: 4px;font-size: 12px;line-height: 1.5;white-space: pre;display: none;z-index: 9999;}
        .tooltip.visible {display: block;}
        #search-input{background-color: #fff;}
        .watch_more{width: 700px;text-align: center;}
    </style>
    </head>

    <body>
        <div class="container" style="padding: 80px 0px;">
        <h2 class="section_title">열람실 좌석 예약</h2>
            <div id="map-container"></div>
            <section id="lib-table-section" style="max-height: 500px;overflow: auto;">
                <div class="controls">
                    <input type="text" id="search-input" placeholder="도서관명 검색">
                    <select id="sort-select">
                        <option value="">시도명 오름차순</option>
                        <option value="desc">자료수(도서) 내림차순</option>
                        <option value="asc">자료수(도서) 오름차순</option>
                    </select>
                    <p class="watch_more">더 보려면 아래로 스크롤 해주세요.</p>
                </div>
                <table id="lib-table">
                    <thead>
                        <tr>
                            <th>시도명</th>
                            <th>도서관명</th>
                            <th>시군구명</th>
                            <th>도서관유형</th>
                            <th>휴관일</th>
                            <th>평일운영시작시각</th>
                            <th>평일운영종료시각</th>
                            <th>열람좌석수</th>
                            <th>자료수(도서)</th>
                            <th>대출가능권수</th>
                            <th>대출가능일수</th>
                            <th>소재지도로명주소</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </section>
        </div>
        <div class="tooltip" id="chart-tooltip"></div>
        <script src="../View/C-Module/common.js" type="module"></script>
        <?php require_once "./View/partials/footer.php"?>