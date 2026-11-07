const g=id=>document.getElementById(id),
[start,stop,resume,reset]=['start','stop','resume','reset'].map(g);
let t=0,e=0,r;
const fmt=ms=>new Date(ms).toISOString().slice(14,23).replace('.',':'),
ui=s=>{
  start.classList.toggle('hidden',s!='init');
  stop.classList.toggle('hidden',s!='run');
  resume.classList.toggle('hidden',s!='pause');
  reset.classList.toggle('hidden',s=='init');
},
tick=()=>{$time.textContent=fmt(e+performance.now()-t);r=requestAnimationFrame(tick)},
go=()=>{t=performance.now();tick();ui('run')};
start.onclick=go;
resume.onclick=go;
stop.onclick=()=>{cancelAnimationFrame(r);e+=performance.now()-t;ui('pause')};
reset.onclick=()=>{cancelAnimationFrame(r);e=0;$time.textContent='00:00:000';ui('init')};