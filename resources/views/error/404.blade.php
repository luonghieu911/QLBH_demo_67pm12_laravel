<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>404 - Không tìm thấy trang</title>
  <link rel="stylesheet" href="404.css" />
  <style>
    :root{
  --bg1:#0b1020;
  --bg2:#0f1a3a;
  --card:#0f172a;
  --text:#e5e7eb;
  --muted:#a1a1aa;
  --line:rgba(255,255,255,.12);
  --accent:#60a5fa;
  --accent2:#a78bfa;
  --shadow: 0 20px 60px rgba(0,0,0,.45);
}

*{box-sizing:border-box}
html,body{height:100%}
body{
  margin:0;
  font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  color:var(--text);
  background:
    radial-gradient(1200px 800px at 20% 10%, rgba(96,165,250,.25), transparent 55%),
    radial-gradient(1000px 700px at 80% 80%, rgba(167,139,250,.20), transparent 55%),
    linear-gradient(180deg, var(--bg1), var(--bg2));
  overflow:hidden;
}

.wrap{
  min-height:100%;
  display:grid;
  place-items:center;
  padding:24px;
  position:relative;
}

.card{
  width:min(680px, 92vw);
  background: rgba(15, 23, 42, .75);
  border:1px solid var(--line);
  border-radius:20px;
  padding:28px 26px;
  box-shadow: var(--shadow);
  backdrop-filter: blur(10px);
  position:relative;
  z-index:2;
}

.badge{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  font-weight:800;
  letter-spacing:.12em;
  font-size:12px;
  color:#0b1020;
  background: linear-gradient(90deg, var(--accent), var(--accent2));
  border-radius:999px;
  padding:8px 12px;
  margin-bottom:14px;
}

h1{
  margin:0 0 10px;
  font-size: clamp(26px, 3.4vw, 38px);
  line-height:1.15;
}

.desc{
  margin:0 0 18px;
  color:var(--muted);
  font-size: clamp(14px, 2vw, 16px);
  line-height:1.6;
}

.actions{
  display:flex;
  gap:12px;
  flex-wrap:wrap;
  margin:16px 0 14px;
}

.btn{
  text-decoration:none;
  color:var(--text);
  border:1px solid var(--line);
  padding:10px 14px;
  border-radius:12px;
  font-weight:600;
  transition: transform .12s ease, background .12s ease, border-color .12s ease;
}

.btn:hover{ transform: translateY(-1px); }
.btn:active{ transform: translateY(0px); }

.primary{
  border-color: rgba(96,165,250,.45);
  background: rgba(96,165,250,.14);
}
.primary:hover{
  background: rgba(96,165,250,.20);
  border-color: rgba(96,165,250,.65);
}

.ghost{
  background: rgba(255,255,255,.03);
}
.ghost:hover{
  background: rgba(255,255,255,.06);
}

.help{
  disp

  </style>
</head>
<body>
  <main class="wrap" role="main">
    <section class="card" aria-labelledby="title">
      <div class="badge" aria-hidden="true">404</div>

      <h1 id="title">Không tìm thấy trang</h1>
      <p class="desc">
        Trang bạn đang tìm có thể đã bị xoá, đổi đường dẫn, hoặc tạm thời không khả dụng.
      </p>

      <div class="actions">
        <a class="btn primary" href="/">Về trang chủ</a>
        <a class="btn ghost" href="javascript:history.back()">Quay lại</a>
      </div>

      <div class="help">
        <span>Gợi ý:</span>
        <code>/home</code>
        <code>/about</code>
        <code>/contact</code>
      </div>
    </section>

    <div class="blob b1" aria-hidden="true"></div>
    <div class="blob b2" aria-hidden="true"></div>
  </main>
</body>
</html>
