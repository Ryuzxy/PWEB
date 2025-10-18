const canvas = document.getElementById("signature-pad");
const ctx = canvas.getContext("2d");
let drawing = false;
const input = document.getElementById("tanda_tangan");

// helper: dapatkan posisi pointer (mouse atau touch)
function getPointerPos(evt) {
    const rect = canvas.getBoundingClientRect();
    const t = (evt.touches && evt.touches[0]) || evt;
    return {
        x: t.clientX - rect.left,
        y: t.clientY - rect.top
    };
}

// atur ukuran canvas untuk devicePixelRatio agar hasil gambarnya tajam dan clear bersih
function resizeCanvas() {
    const ratio = window.devicePixelRatio || 1;
    const w = canvas.clientWidth;
    const h = canvas.clientHeight;
    // set pixel size sesuai ratio, lalu set transform agar koordinat tetap dalam CSS pixels
    canvas.width = Math.round(w * ratio);
    canvas.height = Math.round(h * ratio);
    ctx.setTransform(ratio, 0, 0, ratio, 0, 0);
}

// inisialisasi ukuran
resizeCanvas();
window.addEventListener("resize", resizeCanvas);

// Mouse events
canvas.addEventListener("mousedown", (e) => {
  const pos = getPointerPos(e);
  drawing = true;
  ctx.beginPath();
  ctx.moveTo(pos.x, pos.y);
});
canvas.addEventListener("mouseup", () => {
  drawing = false;
  input.value = canvas.toDataURL("image/png");
  ctx.beginPath();
});
canvas.addEventListener("mouseout", () => {
  drawing = false;
  ctx.beginPath();
});
canvas.addEventListener("mousemove", (e) => {
  if (!drawing) return;
  const pos = getPointerPos(e);
  ctx.lineWidth = 2;
  ctx.lineCap = "round";
  ctx.strokeStyle = "#000";
  ctx.lineTo(pos.x, pos.y);
  ctx.stroke();
});

// Touch events (mobile)
canvas.addEventListener("touchstart", (e) => {
  e.preventDefault();
  const pos = getPointerPos(e);
  drawing = true;
  ctx.beginPath();
  ctx.moveTo(pos.x, pos.y);
});
canvas.addEventListener("touchmove", (e) => {
  e.preventDefault();
  if (!drawing) return;
  const pos = getPointerPos(e);
  ctx.lineWidth = 2;
  ctx.lineCap = "round";
  ctx.strokeStyle = "#000";
  ctx.lineTo(pos.x, pos.y);
  ctx.stroke();
});
canvas.addEventListener("touchend", (e) => {
  e.preventDefault();
  drawing = false;
  input.value = canvas.toDataURL("image/png");
  ctx.beginPath();
});
canvas.addEventListener("touchcancel", () => {
  drawing = false;
  ctx.beginPath();
});

// Clear button — reset transform & path supaya bersih tanpa bekas
document.getElementById("clear").addEventListener("click", () => {
  // pastikan transform sesuai devicePixelRatio
  const ratio = window.devicePixelRatio || 1;
  ctx.setTransform(ratio, 0, 0, ratio, 0, 0);
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.beginPath();
  input.value = "";
});
