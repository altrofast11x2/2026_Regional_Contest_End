const $ = e => document.querySelector(e);
const $$ = e => [...document.querySelectorAll(e)];
const s = new Set();
let d = 0;
const r = () => {
    $$(".seat").forEach((e, i) => e.classList.toggle("selected", s.has(i + 1)));
    const a = [...s].sort((a, b) => a - b);
    //추가됨 1 (각 input 마다 번호를 받아와서 넣음)
    $("#seat_nos").value = a.join(",")

    $("#selectedSeats").textContent = a.length ? a.join(", ") + "번" : "없음";
    $("#btnReserve").disabled = !a.length;

    // 추가됨 2
    $(".status-bar").style.display = a.length ? "block" : "none";
};
document.addEventListener("mousedown", e => {
    const t = e.target.closest(".seat");
    if (!t || t.classList.contains("occupied")) return;
    d = 1;
    const i = +t.textContent;
    s.has(i) ? s.delete(i) : s.size < 4 && s.add(i);
    r();
});
$$(".seat").forEach(t => t.addEventListener("mouseenter", () => {
    if (!d || t.classList.contains("occupied") || s.size >= 4) return;
    s.add(+t.textContent);
    r();
}));
document.addEventListener("mouseup", () => d = 0);