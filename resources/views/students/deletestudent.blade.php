<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Student - Student Management</title>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#0b1f3a;--ink:#12263f;--muted:#5a6b82;--teal:#0ea5a4;--dark:#0a7f85;--blue:#2563eb;--sun:#ffb703;--red:#ff6b6b;--line:#dbe7ee;--ease:cubic-bezier(.22,1,.36,1)}
*{box-sizing:border-box;margin:0}
body{font:16px/1.5 'Nunito Sans',system-ui,sans-serif;color:var(--ink);min-height:100vh;display:grid;place-items:center;padding:28px 16px;background:var(--navy)}

/* sliding sky */
.sky{position:fixed;inset:0;overflow:hidden}
.sky i{position:absolute;inset:0;background:linear-gradient(160deg,var(--a),var(--b));transform:translateX(100%);animation:slide 28s linear infinite;animation-delay:calc(var(--n)*7s - 1.68s)}
.sky i:nth-child(1){--n:0;--a:#0b1f3a;--b:#0a9d9a}
.sky i:nth-child(2){--n:1;--a:#1f1456;--b:#e0517a}
.sky i:nth-child(3){--n:2;--a:#7c2d12;--b:#f5a524}
.sky i:nth-child(4){--n:3;--a:#0a1648;--b:#2aa8e0}
.sky::after{content:'';position:absolute;inset:0;background:radial-gradient(circle at 15% 10%,rgba(255,255,255,.3),transparent 45%),radial-gradient(circle at 90% 95%,rgba(255,183,3,.3),transparent 45%);animation:glow 16s ease-in-out infinite alternate}
@keyframes slide{0%{transform:translateX(100%);animation-timing-function:cubic-bezier(.77,0,.18,1)}6%,25%{transform:none}25%{animation-timing-function:cubic-bezier(.77,0,.18,1)}31%{transform:translateX(-100%)}31.01%,100%{transform:translateX(100%)}}
@keyframes glow{to{transform:scale(1.2) translate(3%,3%)}}
.fl{position:fixed;left:var(--x);top:var(--y);font-size:3rem;color:rgba(255,255,255,.17);animation:bob 9s ease-in-out infinite;pointer-events:none}
@keyframes bob{50%{transform:translateY(-26px) rotate(8deg)}}

/* card */
.card{position:relative;width:100%;max-width:520px;background:rgba(255,255,255,.95);backdrop-filter:blur(18px);border-radius:28px;box-shadow:0 40px 80px -20px rgba(4,12,30,.6);overflow:hidden;animation:card 1s var(--ease) both}
@keyframes card{from{opacity:0;transform:translateY(46px) scale(.96);filter:blur(6px)}}
.top{position:relative;padding:62px 24px 28px;text-align:center;color:#fff;overflow:hidden;background:linear-gradient(120deg,#e04848,var(--red),#ff8f6b,#ff6b8a);background-size:220% 220%;animation:flow 12s ease-in-out infinite}
.top::after{content:'';position:absolute;top:0;left:-60%;width:40%;height:100%;background:linear-gradient(100deg,transparent,rgba(255,255,255,.28),transparent);transform:skewX(-20deg);animation:sheen 7s ease-in-out 1.5s infinite}
@keyframes flow{50%{background-position:100% 50%}}
@keyframes sheen{40%,100%{left:140%}}
.ic{position:relative;z-index:1;width:76px;height:76px;margin:0 auto 14px;border-radius:24px;display:grid;place-items:center;font-size:2.2rem;background:#fff;color:#e04848;box-shadow:0 16px 28px -10px rgba(0,0,0,.4);animation:pop .9s var(--ease) .3s both,wig 3.5s ease-in-out 1.6s infinite}
@keyframes pop{0%{transform:scale(0) rotate(-30deg)}65%{transform:scale(1.15) rotate(6deg)}}
@keyframes wig{0%,88%,100%{transform:rotate(0)}92%{transform:rotate(-8deg)}96%{transform:rotate(8deg)}}
.top h1{position:relative;z-index:1;font:700 1.7rem Fraunces,Georgia,serif;animation:in .8s var(--ease) .4s both}
.top p{position:relative;z-index:1;max-width:36ch;margin:6px auto 0;opacity:.92;animation:in .8s var(--ease) .5s both}
@keyframes in{from{opacity:0;transform:translateY(16px)}}

/* back link + brand */
.back{position:absolute;z-index:2;top:18px;left:18px;display:flex;align-items:center;gap:6px;padding:7px 14px;border-radius:99px;background:rgba(255,255,255,.24);color:#fff;font-weight:700;font-size:.9rem;text-decoration:none;transition:.4s var(--ease)}
.back:hover{background:#fff;color:#e04848;transform:translateX(-3px)}
.brand{position:absolute;z-index:2;top:24px;right:22px;display:flex;align-items:center;gap:6px;font-weight:700;font-size:.85rem;opacity:.92}

/* student record */
.body{padding:26px 28px 30px}
.box{display:flex;align-items:center;gap:16px;padding:16px 18px;margin-bottom:24px;border-radius:18px;border:1px dashed #f1b4bc;background:linear-gradient(180deg,#fff8f9,#fff);animation:in .7s var(--ease) .6s both}
.av{width:56px;height:56px;flex-shrink:0;border-radius:18px;display:grid;place-items:center;font:700 1.5rem Fraunces,serif;color:#fff;background:linear-gradient(135deg,#e04848,#ff8f6b);box-shadow:0 10px 20px -8px rgba(224,72,72,.6);transition:transform .5s var(--ease)}
.box:hover .av{transform:rotate(-8deg) scale(1.1)}
.box dl{margin:0;display:grid;grid-template-columns:auto 1fr;column-gap:14px;row-gap:3px;font-size:.93rem;min-width:0}
.box dt{color:var(--muted);font-weight:600}
.box dd{margin:0;font-weight:700;overflow-wrap:anywhere}

/* buttons */
.acts{display:flex;gap:12px;flex-wrap:wrap;animation:in .7s var(--ease) .8s both}
.btn{position:relative;overflow:hidden;flex:1;display:inline-flex;align-items:center;justify-content:center;gap:8px;height:54px;border:2px solid transparent;border-radius:14px;font:700 1rem inherit;color:#fff;text-decoration:none;cursor:pointer;background:linear-gradient(120deg,#e04848,var(--red) 50%,#ff8f6b);box-shadow:0 14px 26px -10px rgba(255,107,107,.85);transition:transform .4s var(--ease),box-shadow .4s var(--ease),border-color .3s,color .3s,background-color .3s}
.btn::before{content:'';position:absolute;top:0;left:-80%;width:60%;height:100%;background:linear-gradient(100deg,transparent,rgba(255,255,255,.4),transparent);transform:skewX(-20deg);transition:left .8s var(--ease)}
.btn:hover{transform:translateY(-3px);box-shadow:0 22px 34px -12px rgba(255,107,107,.9)}
.btn:hover::before{left:140%}
.btn:hover i{animation:shake .5s}
.btn:active{transform:scale(.97)}
.btn.ghost{background:#f1f6f8;color:var(--ink);border-color:var(--line);box-shadow:none}
.btn.ghost:hover{background:#fff;border-color:var(--teal);color:var(--dark)}
.btn:focus-visible{outline:3px solid var(--sun);outline-offset:3px}
.btn.ld{pointer-events:none;opacity:.92}
.btn.ld::after{content:'';width:18px;height:18px;border:3px solid rgba(255,255,255,.4);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
@keyframes shake{25%{transform:rotate(-12deg)}75%{transform:rotate(12deg)}}

@media(max-width:480px){.acts{flex-direction:column-reverse}.body{padding:22px 18px 24px}.box{flex-direction:column;text-align:center}.box dl{text-align:left}}
@media(prefers-reduced-motion:reduce){*,::before,::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important}}
</style>
</head>
<body>

<div class="sky" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
<i class="fl bi bi-book" style="--x:8%;--y:16%"></i>
<i class="fl bi bi-mortarboard" style="--x:84%;--y:12%"></i>
<i class="fl bi bi-pencil" style="--x:12%;--y:72%"></i>
<i class="fl bi bi-backpack" style="--x:86%;--y:70%"></i>

<main class="card">
    <header class="top">
        <a href="{{ route('students.index') }}" class="back"><i class="bi bi-arrow-left"></i> Back</a>
        <span class="brand"><i class="bi bi-people"></i> Student Management</span>
        <div class="ic"><i class="bi bi-exclamation-triangle-fill"></i></div>
        <h1>Delete this student?</h1>
        <p>This permanently removes the student record. You can't undo this action.</p>
    </header>

    <div class="body">
        <div class="box">
            <div class="av">{{ strtoupper(mb_substr((string) $student->student_name, 0, 1)) ?: '?' }}</div>
            <dl>
                <dt>ID</dt>
                <dd>{{ $student->student_id }}</dd>
                <dt>Name</dt>
                <dd>{{ $student->student_name }}</dd>
                <dt>Gender</dt>
                <dd>{{ $student->gender }}</dd>
                <dt>Department</dt>
                <dd>{{ $student->department->dept_name ?? '-' }}</dd>
            </dl>
        </div>

        <form action="{{ route('students.destroy', $student) }}" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="acts">
                <button type="submit" class="btn" id="deleteBtn">
                    <i class="bi bi-trash3-fill"></i>
                    <span class="label">Delete student</span>
                </button>
                <a href="{{ route('students.index') }}" class="btn ghost">Keep student</a>
            </div>
        </form>
    </div>
</main>

<script>
    // Show a loading state and block double-submits
    const form = document.getElementById('deleteForm'), btn = document.getElementById('deleteBtn');
    form.addEventListener('submit', function () {
        btn.classList.add('ld');
        btn.querySelector('.label').textContent = 'Deleting…';
        setTimeout(function () { btn.disabled = true; }, 0);
    });
    addEventListener('pageshow', function (e) {
        if (e.persisted) {
            btn.classList.remove('ld'); btn.disabled = false;
            btn.querySelector('.label').textContent = 'Delete student';
        }
    });
</script>
</body>
</html>