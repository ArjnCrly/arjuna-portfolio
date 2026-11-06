<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin CMS — JUN.dev CMS</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: #070a0f;
      color: #f1f5f9;
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
      padding: 1.5rem;
    }
    .login-card {
      width: 100%;
      max-width: 420px;
      background: #101622;
      border: 1px solid rgba(148, 163, 184, 0.18);
      border-radius: 14px;
      padding: 2.2rem;
    }
    .badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.76rem;
      color: #10b981;
      display: block;
      margin-bottom: 0.45rem;
    }
    h1 { font-size: 1.45rem; margin-bottom: 0.4rem; }
    p { font-size: 0.86rem; color: #94a3b8; margin-bottom: 1.5rem; }
    label {
      display: block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.76rem;
      color: #94a3b8;
      margin-bottom: 0.35rem;
    }
    input {
      width: 100%;
      padding: 0.72rem 0.9rem;
      background: #090d14;
      border: 1px solid rgba(148, 163, 184, 0.2);
      border-radius: 8px;
      color: #f8fafc;
      margin-bottom: 1rem;
      box-sizing: border-box;
    }
    input:focus { outline: none; border-color: #10b981; }
    button {
      width: 100%;
      padding: 0.8rem;
      background: #10b981;
      color: #04130e;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
    .hint {
      margin-top: 1.25rem;
      padding: 0.75rem;
      background: rgba(16, 185, 129, 0.08);
      border: 1px dashed rgba(16, 185, 129, 0.3);
      border-radius: 8px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.75rem;
      color: #94a3b8;
    }
    .err {
      padding: 0.7rem;
      background: rgba(239, 68, 68, 0.14);
      border: 1px solid rgba(239, 68, 68, 0.35);
      border-radius: 8px;
      color: #f87171;
      font-size: 0.8rem;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <span class="badge">[ jun_dev_cms_auth ]</span>
    <h1>Login JUN.dev CMS</h1>
    <p>Masuk untuk memperbarui proyek, pengalaman, pendidikan, dan keahlian Arjuna Carly secara berkala.</p>

    <?php if(session()->has('error')): ?>
      <div class="err"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form action="/admin/login" method="POST">
      <?php echo csrf_field(); ?>
      <label for="username">username admin</label>
      <input type="text" id="username" name="username" value="arjuna" required />

      <label for="password">password</label>
      <input type="password" id="password" name="password" value="admin123" required />

      <button type="submit">masuk ke dashboard →</button>
    </form>

    <div class="hint">
      Default Akses:<br>
      Username: <strong style="color:#10b981;">arjuna</strong> | Password: <strong style="color:#10b981;">admin123</strong>
    </div>

    <div style="margin-top:1.1rem;text-align:center;">
      <a href="/" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;color:#94a3b8;text-decoration:none;">← Kembali ke Halaman Portofolio</a>
    </div>
  </div>
</body>
</html>
