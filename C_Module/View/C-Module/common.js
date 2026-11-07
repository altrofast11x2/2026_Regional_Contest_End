const $ = (query) => document.querySelector(query);
const $$ = (query) => [...document.querySelectorAll(query)];
const $fetch = (path) => fetch(path).then((res) => res.json());

const createElement = (element, attrs = {}) =>
  Object.assign(document.createElement(element), attrs);

const createSvgElement = (element, attrs = {}) => {
  const el = document.createElementNS("http://www.w3.org/2000/svg", element);
  Object.entries(attrs).forEach(([k, v]) => el.setAttribute(k, v));
  return el;
};

// 숫자 변환 
const toNumber = (v) => {
  if (v === null || v === undefined) return 0;
  return +(v.toString().replaceAll(",", "")) || 0;
};

const mapContainer = $("#map-container");
const libs = await $fetch("../View/C-Module/도서관현황.json");

await fetch("../View/C-Module/southKoreaHigh.svg")
  .then((res) => res.text())
  .then((text) => {
    mapContainer.innerHTML = text;
  });
const svg = $("svg");

$$("svg a").forEach(a => {
  const parent = a.parentNode;
  while (a.firstChild) parent.insertBefore(a.firstChild, a);
  parent.removeChild(a);
});

$$("svg *").forEach(el => {
  [...el.attributes].forEach(attr => {
    if (attr.name.startsWith("on")) el.removeAttribute(attr.name);
  });
});

$$("svg title").forEach(t => t.remove());

$$("svg path").forEach(path => {
  path.style.cursor = "pointer";

  path.addEventListener("mouseenter", () => {
    path.style.fill = "#8B6F47";
  });

  path.addEventListener("mouseleave", () => {
    if (!path.classList.contains("active")) {
      path.style.fill = "#C19A6B";
    }
  });

  path.addEventListener("click", () => {
    $$("svg path").forEach(p => {
      p.classList.remove("active");
      p.style.fill = "#C19A6B";
    });

    path.classList.add("active");
    path.style.fill = "#8B6F47";
  });
});
// 통계
const libStats = libs.reduce((acc, lib) => {
  const key = lib["시도명"];
  if (!key) return acc;

  acc[key] ??= { libCount: 0, bookCount: 0, seatCount: 0 };

  acc[key].libCount += 1;
  acc[key].seatCount += toNumber(lib["열람좌석수"]);
  acc[key].bookCount += toNumber(lib["자료수(도서)"]);

  return acc;
}, {});

// 이름 매핑
const nameMap = {
  서울특별시: "서울",
  부산광역시: "부산",
  대구광역시: "대구",
  인천광역시: "인천",
  광주광역시: "광주",
  대전광역시: "대전",
  울산광역시: "울산",
  경기도: "경기",
  강원특별자치도: "강원",
  충청북도: "충북",
  충청남도: "충남",
  전라북도: "전북",
  전라남도: "전남",
  경상북도: "경북",
  경상남도: "경남",
  제주특별자치도: "제주",
  세종특별자치시: "세종",
};

// 위치 보정
const posOffset = {
  경상북도: { dx: -100, dy: 30 },
  충청북도: { dx: -20, dy: -20 },
  경기도: { dx: 40, dy: 30 },
};

const statsValues = Object.values(libStats);
const statKeys = ["libCount", "bookCount", "seatCount"];
const minMax = {};

for (const key of statKeys) {
  const values = statsValues.map((s) => toNumber(s[key]));
  minMax[key] = {
    min: Math.min(...values),
    max: Math.max(...values),
  };
}

const percentile = (value, key) => {
  const { min, max } = minMax[key];
  if (max === min) return 50;
  return ((toNumber(value) - min) / (max - min)) * 100;
};

const barColors = {
  libCount: "#3B82F6",
  bookCount: "#22C55E",
  seatCount: "#EF4444",
};

const barLabels = {
  libCount: "도서관수",
  bookCount: "자료수(도서)",
  seatCount: "열람좌석수",
};

const tooltip = document.getElementById("chart-tooltip");

function renderMap() {
  const svg = $("svg");
  svg.setAttribute("width", "550");
  svg.setAttribute("height", "880");

  const barMaxHeight = 30;
  const barWidth = 4;
  const barGap = 1;
  const barGroupWidth = statKeys.length * (barWidth + barGap);

  $$("path[title]").forEach((path) => {
    const raw = path.getAttribute("title");
    const title = nameMap[raw] ?? raw;
    if (!title) return;

    const offset = posOffset[raw] || { dx: 0, dy: 0 };
    const bbox = path.getBBox();
    const cx = bbox.x + bbox.width / 2 + offset.dx;
    const cy = bbox.y + bbox.height / 2 + offset.dy;

    const stats = libStats[raw];
    if (!stats) return;

    const g = createSvgElement("g", { cursor: "pointer" });

    statKeys.forEach((key, i) => {
      const pct = percentile(stats[key], key);
      const h = Math.max((pct / 100) * barMaxHeight, 2); // 최소 높이 보장

      const x = cx - barGroupWidth / 2 + i * (barWidth + barGap);
      const y = cy - 10 - h;

      const bar = createSvgElement("rect", {
        x,
        y,
        width: barWidth,
        height: h,
        fill: barColors[key],
        rx: 1,
      });

      g.appendChild(bar);
    });

    // tooltip
    const tipLines = statKeys.map(
      (key) => `${barLabels[key]}: ${toNumber(stats[key]).toLocaleString()}`
    );
    const tipText = `[${title}]\n${tipLines.join("\n")}`;

    g.addEventListener("mouseenter", (e) => {
      tooltip.textContent = tipText;
      tooltip.classList.add("visible");
      tooltip.style.left = `${e.clientX + 12}px`;
      tooltip.style.top = `${e.clientY + 12}px`;
    });

    g.addEventListener("mousemove", (e) => {
      tooltip.style.left = `${e.clientX + 12}px`;
      tooltip.style.top = `${e.clientY + 12}px`;
    });

    g.addEventListener("mouseleave", () => {
      tooltip.classList.remove("visible");
    });

    const text = createSvgElement("text", {
      x: cx,
      y: cy,
      "text-anchor": "middle",
      "dominant-baseline": "central",
      "font-size": "10",
      "font-weight": "bold",
      fill: "#333",
      "pointer-events": "none",
    });

    text.textContent = title;
    g.appendChild(text);

    svg.appendChild(g);
  });
}

renderMap();

// 테이블 
const columns = [
  "시도명",
  "도서관명",
  "시군구명",
  "도서관유형",
  "휴관일",
  "평일운영시작시각",
  "평일운영종료시각",
  "열람좌석수",
  "자료수(도서)",
  "대출가능권수",
  "대출가능일수",
  "소재지도로명주소",
];

const tbody = $("#lib-table tbody");
const searchInput = $("#search-input");
const sortSelect = $("#sort-select");

function renderTable() {
  const keyword = searchInput.value.trim();
  const sortOrder = sortSelect.value;

  const sorted = [...libs].toSorted((a, b) => {
    if (sortOrder) {
      const diff =
        toNumber(a["자료수(도서)"]) - toNumber(b["자료수(도서)"]);
      return sortOrder === "asc" ? diff : -diff;
    }
    return (a["시도명"] || "").localeCompare(b["시도명"] || "");
  });

  const filtered = keyword
    ? sorted.filter((lib) => lib["도서관명"]?.includes(keyword))
    : sorted;

  tbody.innerHTML = filtered
    .map((lib) => {
      const cells = columns
        .map((col) => {
          const val = lib[col] ?? "";
          if (col === "도서관명" && keyword) {
            return `<td>${val.replaceAll(
              keyword,
              `<mark>${keyword}</mark>`
            )}</td>`;
          }
          return `<td>${val}</td>`;
        })
        .join("");

      return `<tr>${cells}</tr>`;
    })
    .join("");
}

sortSelect.addEventListener("change", renderTable);
searchInput.addEventListener("input", renderTable);
renderTable();