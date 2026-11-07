const c = $("canvas");
const x = c.getContext("2d");
d = 0;
x.lineWidth = 2.5;
c.onmousedown = (e) => {
  x.beginPath();
  x.moveTo(e.offsetX, e.offsetY);
  x.lineTo(e.offsetX + 1, e.offsetY);
  x.stroke();
  d = 1;
};
c.onmousemove = (e) => {
  d && (x.lineTo(e.offsetX, e.offsetY), x.stroke());
};
c.onmouseup = c.onmouseleave = () => (d = 0);
$("#save").onclick = () =>
  newEl("a", {
    href: c.toDataURL(),
    download: "sign.png",
  }).click();
// console.log(onmousemove);
