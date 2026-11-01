<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile</title>
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
.card{position:relative;width:100%;max-width:640px;background:rgba(255,255,255,.95);backdrop-filter:blur(18px);border-radius:28px;box-shadow:0 40px 80px -20px rgba(4,12,30,.6);overflow:hidden;animation:card 1s var(--ease) both}
@keyframes card{from{opacity:0;transform:translateY(46px) scale(.96);filter:blur(6px)}}
.top{position:relative;padding:34px 24px 26px;text-align:center;color:#fff;overflow:hidden;background:linear-gradient(120deg,var(--dark),var(--teal),#22c3b3,var(--blue));background-size:220% 220%;animation:flow 12s ease-in-out infinite}
.top::after{content:'';position:absolute;top:0;left:-60%;width:40%;height:100%;background:linear-gradient(100deg,transparent,rgba(255,255,255,.28),transparent);transform:skewX(-20deg);animation:sheen 7s ease-in-out 1.5s infinite}
@keyframes flow{50%{background-position:100% 50%}}
@keyframes sheen{40%,100%{left:140%}}
.top h1{position:relative;z-index:1;font:700 1.6rem Fraunces,Georgia,serif;animation:in .8s var(--ease) .4s both}
.top p{position:relative;z-index:1;opacity:.9;animation:in .8s var(--ease) .5s both}
.back{position:absolute;z-index:2;top:18px;left:18px;display:flex;align-items:center;gap:6px;padding:7px 14px;border-radius:99px;background:rgba(255,255,255,.22);color:#fff;font-weight:700;font-size:.9rem;text-decoration:none;transition:.4s var(--ease)}
.back:hover{background:#fff;color:var(--dark);transform:translateX(-3px)}

.av{position:relative;z-index:1;width:104px;height:104px;margin:0 auto 12px;border-radius:32px;border:4px solid #fff;background:linear-gradient(135deg,var(--sun),#ffd166);color:var(--navy);font:700 2.6rem Fraunces,serif;animation:pop 1s var(--ease) .3s both}
.pic{display:grid;place-items:center;width:100%;height:100%;border-radius:28px;overflow:hidden}
.pic img{width:100%;height:100%;object-fit:cover}
.cam{position:absolute;right:-10px;bottom:-10px;width:36px;height:36px;border-radius:12px;background:#fff;color:var(--dark);display:grid;place-items:center;font-size:1rem;cursor:pointer;box-shadow:0 8px 16px -6px rgba(0,0,0,.4);transition:.4s var(--ease)}
.cam:hover{transform:rotate(-10deg) scale(1.15);background:var(--sun);color:var(--navy)}
@keyframes pop{0%{transform:scale(0) rotate(-25deg)}65%{transform:scale(1.1) rotate(5deg)}}
@keyframes in{from{opacity:0;transform:translateY(16px)}}

/* tabs */
.tabs{position:relative;display:flex;margin:22px 24px 0;padding:6px;background:#eaf3f5;border-radius:16px}
.tabs button{position:relative;z-index:1;flex:1;height:44px;border:0;background:none;border-radius:12px;font:700 .95rem inherit;color:var(--muted);cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:color .3s}
.tabs button.on{color:#fff}
.pill{position:absolute;top:6px;bottom:6px;left:6px;width:calc((100% - 12px)/3);border-radius:12px;background:linear-gradient(120deg,var(--dark),var(--teal));box-shadow:0 10px 18px -8px rgba(14,165,164,.8);transform:translateX(calc(var(--k,0)*100%));transition:transform .55s var(--ease),background .4s}
.tabs.d .pill{background:linear-gradient(120deg,var(--red),#ff8f6b);box-shadow:0 10px 18px -8px rgba(255,107,107,.8)}
.pane{display:none;padding:24px}
.pane.on{display:block;animation:in .6s var(--ease)}

/* fields */
.grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:18px}
.f{position:relative;display:block}
.f.w{grid-column:1/-1}
.pane.on .f{animation:in .7s var(--ease) both}
.pane.on .f:nth-child(n+2){animation-delay:.07s}.pane.on .f:nth-child(n+4){animation-delay:.14s}.pane.on .f:nth-child(n+6){animation-delay:.21s}
.f span{display:block;font-weight:700;font-size:.88rem;margin-bottom:6px}
.f>i{position:absolute;left:16px;bottom:17px;color:var(--muted);transition:.35s var(--ease)}
.f.t>i{bottom:auto;top:44px}
.f:focus-within>i{color:var(--dark);transform:scale(1.15)}
.f input:not([hidden]),.f textarea{width:100%;height:52px;padding:0 46px;border:2px solid var(--line);border-radius:14px;background:#f4f9fb;font:inherit;color:var(--ink);transition:.35s var(--ease)}
.f textarea{height:auto;min-height:100px;padding:13px 16px 13px 46px;resize:vertical}
.f input:hover,.f textarea:hover{border-color:#b9d3dd}
.f input:focus,.f textarea:focus{outline:0;border-color:var(--teal);background:#fff;box-shadow:0 0 0 4px rgba(14,165,164,.18);transform:translateY(-2px)}
.f .bad{border-color:var(--red)}
small{display:block;color:#e04848;font-weight:600;font-size:.82rem;margin-top:5px;animation:in .4s var(--ease)}
.eye{position:absolute;right:8px;bottom:6px;width:40px;height:40px;border:0;background:none;border-radius:12px;color:var(--muted);font-size:1.1rem;cursor:pointer;transition:.3s}
.eye:hover{background:rgba(14,165,164,.12);color:var(--dark)}
.chk{display:flex;align-items:center;gap:8px;margin-bottom:18px;color:#d63c3c;font-weight:600;font-size:.9rem;cursor:pointer}
.chk input{accent-color:var(--red)}

/* buttons */
.acts{display:flex;gap:12px;flex-wrap:wrap}
.btn{position:relative;overflow:hidden;display:inline-flex;align-items:center;justify-content:center;gap:8px;height:54px;padding:0 30px;border:0;border-radius:14px;font:700 1rem inherit;color:#fff;cursor:pointer;background:linear-gradient(120deg,var(--dark),var(--teal) 50%,var(--blue));background-size:200% 100%;box-shadow:0 14px 26px -10px rgba(14,165,164,.8);transition:transform .4s var(--ease),box-shadow .4s var(--ease),background-position .6s var(--ease)}
.btn::before{content:'';position:absolute;top:0;left:-80%;width:60%;height:100%;background:linear-gradient(100deg,transparent,rgba(255,255,255,.4),transparent);transform:skewX(-20deg);transition:left .8s var(--ease)}
.btn:hover{transform:translateY(-3px);background-position:100% 0;box-shadow:0 22px 34px -12px rgba(37,99,235,.7)}
.btn:hover::before{left:140%}
.btn:active{transform:scale(.97)}
.btn.red{background:linear-gradient(120deg,var(--red),#ff8f6b);box-shadow:0 14px 26px -10px rgba(255,107,107,.85)}
.btn.ghost{background:#f1f6f8;color:var(--ink);box-shadow:none;border:2px solid var(--line)}
.btn.ghost:hover{border-color:var(--teal);color:var(--dark)}
.btn.ld{pointer-events:none;opacity:.9}
.btn.ld::after{content:'';width:18px;height:18px;border:3px solid rgba(255,255,255,.4);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
.danger{text-align:center;padding:10px 0}
.danger p{color:var(--muted);margin:10px 0 20px}
.ic{width:70px;height:70px;margin:0 auto 12px;border-radius:22px;display:grid;place-items:center;font-size:2rem;color:#fff;background:linear-gradient(135deg,var(--red),#ff9a6b);box-shadow:0 16px 28px -10px rgba(255,107,107,.8);animation:pop .8s var(--ease) both}

/* dialog + toast */
dialog{margin:auto;border:0;border-radius:26px;padding:28px 26px 26px;width:min(420px,92vw);text-align:center;box-shadow:0 40px 80px -20px rgba(4,12,30,.65)}
dialog[open]{animation:dlg .5s var(--ease)}
dialog::backdrop{background:rgba(11,31,58,.55);backdrop-filter:blur(6px)}
dialog h2{font:700 1.4rem Fraunces,serif}
dialog p{color:var(--muted);margin:6px 0 18px}
dialog .f{text-align:left;margin-bottom:18px}
dialog .acts>*{flex:1}
@keyframes dlg{from{opacity:0;transform:translateY(30px) scale(.94)}}
.toast{position:fixed;top:20px;right:20px;z-index:9;display:flex;align-items:center;gap:10px;padding:14px 20px;background:#fff;border-left:5px solid #22c55e;border-radius:16px;font-weight:700;box-shadow:0 24px 44px -16px rgba(4,12,30,.55);pointer-events:none;animation:toast 5s var(--ease) forwards}
.toast i{color:#22c55e;font-size:1.3rem}
@keyframes toast{0%{opacity:0;transform:translateX(60px)}8%,88%{opacity:1;transform:none}100%{opacity:0;transform:translateX(60px)}}

@media(max-width:560px){.grid{grid-template-columns:1fr}.tabs button span{display:none}.pane{padding:20px 18px}}
@media(prefers-reduced-motion:reduce){*,::before,::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important}}
</style>
</head>
<body>

@php
    $avatarUrl = $user->avatar ? asset('storage/' . $user->avatar) : null;
    $initial = strtoupper(mb_substr($user->name, 0, 1)) ?: '?';
    $start = ($errors->updatePassword->any() || session('status') === 'password-updated') ? 1 : ($errors->userDeletion->any() ? 2 : 0);
    $messages = ['profile-updated' => 'Profile saved', 'password-updated' => 'Password updated', 'verification-link-sent' => 'Verification link sent'];
@endphp

<div class="sky" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
<i class="fl bi bi-book" style="--x:8%;--y:16%"></i>
<i class="fl bi bi-mortarboard" style="--x:84%;--y:12%"></i>
<i class="fl bi bi-pencil" style="--x:12%;--y:72%"></i>
<i class="fl bi bi-backpack" style="--x:86%;--y:70%"></i>

@if(session('status'))
    <div class="toast"><i class="bi bi-check-circle-fill"></i> {{ $messages[session('status')] ?? session('status') }}</div>
@endif

<main class="card">
    <header class="top">
        <a class="back" href="{{ Route::has('students.index') ? route('students.index') : url('/') }}"><i class="bi bi-arrow-left"></i> Back</a>
        <div class="av">
            <span class="pic">@if($avatarUrl)<img src="{{ $avatarUrl }}" alt="">@else{{ $initial }}@endif</span>
            <label class="cam" for="avatar" title="Change photo"><i class="bi bi-camera-fill"></i></label>
            <input type="file" id="avatar" name="avatar" form="profileForm" accept="image/png,image/jpeg,image/webp" hidden>
        </div>
        <h1>{{ $user->name }}</h1>
        <p>{{ $user->email }}</p>
    </header>

    <nav class="tabs">
        <i class="pill"></i>
        <button type="button"><i class="bi bi-person-fill"></i><span>Profile</span></button>
        <button type="button"><i class="bi bi-shield-lock-fill"></i><span>Password</span></button>
        <button type="button"><i class="bi bi-exclamation-octagon-fill"></i><span>Delete</span></button>
    </nav>

    <!-- Profile -->
    <form class="pane" id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="grid">
            @foreach([
                ['name', 'Full name', 'bi-person', 'text', $user->name, true],
                ['email', 'Email', 'bi-envelope', 'email', $user->email, true],
                ['phone', 'Phone', 'bi-telephone', 'text', $user->phone, false],
                ['address', 'Address', 'bi-geo-alt', 'text', $user->address, false],
            ] as [$n, $label, $icon, $type, $value, $req])
                <label class="f">
                    <span>{{ $label }}</span><i class="bi {{ $icon }}"></i>
                    <input type="{{ $type }}" name="{{ $n }}" value="{{ old($n, $value) }}" {{ $req ? 'required' : '' }} class="@error($n) bad @enderror">
                    @error($n)<small>{{ $message }}</small>@enderror
                </label>
            @endforeach
            <label class="f w t">
                <span>About me</span><i class="bi bi-chat-left-text"></i>
                <textarea name="bio" maxlength="500" class="@error('bio') bad @enderror">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')<small>{{ $message }}</small>@enderror
            </label>
        </div>
        @error('avatar')<small style="margin:-8px 0 14px">{{ $message }}</small>@enderror
        @if($user->avatar)
            <label class="chk"><input type="checkbox" name="remove_avatar" value="1"> Remove current photo</label>
        @endif
        <div class="acts"><button class="btn"><i class="bi bi-check-lg"></i> Save profile</button></div>
    </form>

    <!-- Password -->
    <form class="pane" method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')
        <div class="grid">
            @foreach([['current_password', 'Current password'], ['password', 'New password'], ['password_confirmation', 'Confirm password']] as [$n, $label])
                <label class="f {{ $loop->first ? 'w' : '' }}">
                    <span>{{ $label }}</span><i class="bi bi-lock"></i>
                    <input type="password" name="{{ $n }}" required class="@if($errors->updatePassword->has($n)) bad @endif">
                    <button type="button" class="eye" aria-label="Show password"><i class="bi bi-eye"></i></button>
                    @if($errors->updatePassword->has($n))<small>{{ $errors->updatePassword->first($n) }}</small>@endif
                </label>
            @endforeach
        </div>
        <div class="acts"><button class="btn"><i class="bi bi-shield-check"></i> Update password</button></div>
    </form>

    <!-- Delete -->
    <section class="pane danger">
        <div class="ic"><i class="bi bi-trash3-fill"></i></div>
        <h2>Delete account</h2>
        <p>Once deleted, your account and all its data are removed for good.</p>
        <button type="button" class="btn red" id="openDel"><i class="bi bi-trash3-fill"></i> Delete my account</button>
    </section>
</main>

<dialog id="del">
    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')
        <div class="ic"><i class="bi bi-trash3-fill"></i></div>
        <h2>Delete your account?</h2>
        <p>Enter your password to confirm. This cannot be undone.</p>
        <label class="f">
            <i class="bi bi-lock"></i>
            <input type="password" name="password" placeholder="Password" required class="@if($errors->userDeletion->has('password')) bad @endif">
            <button type="button" class="eye" aria-label="Show password"><i class="bi bi-eye"></i></button>
            @if($errors->userDeletion->has('password'))<small>{{ $errors->userDeletion->first('password') }}</small>@endif
        </label>
        <div class="acts">
            <button type="button" class="btn ghost" data-close>No, keep it</button>
            <button class="btn red">Yes, delete</button>
        </div>
    </form>
</dialog>

<script>
const $ = s => document.querySelector(s), $$ = s => [...document.querySelectorAll(s)];
const tabs = $('.tabs'), btns = $$('.tabs button'), panes = $$('.pane');

// tabs
function go(k) {
    tabs.style.setProperty('--k', k);
    tabs.classList.toggle('d', k == 2);
    btns.forEach((b, i) => b.classList.toggle('on', i == k));
    panes.forEach((p, i) => p.classList.toggle('on', i == k));
}
btns.forEach((b, i) => b.onclick = () => go(i));
go({{ $start }});

// photo preview
$('#avatar').onchange = e => {
    const f = e.target.files[0];
    if (!f) return;
    if (f.size > 2097152) { alert('Photo must be under 2 MB'); e.target.value = ''; return; }
    $('.pic').innerHTML = '<img src="' + URL.createObjectURL(f) + '" alt="">';
    const r = $('[name=remove_avatar]'); if (r) r.checked = false;
};

// show / hide password
$$('.eye').forEach(b => b.onclick = () => {
    const i = b.parentNode.querySelector('input'), show = i.type == 'password';
    i.type = show ? 'text' : 'password';
    b.firstChild.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
});

// loading state on submit
$$('form').forEach(f => f.onsubmit = () => setTimeout(() => {
    const b = f.querySelector('.btn:not(.ghost)'); b.classList.add('ld'); b.disabled = true;
}, 0));
addEventListener('pageshow', e => e.persisted && $$('.btn.ld').forEach(b => { b.classList.remove('ld'); b.disabled = false; }));

// delete dialog
const dlg = $('#del');
$('#openDel').onclick = () => dlg.showModal();
$$('[data-close]').forEach(b => b.onclick = () => dlg.close());
dlg.onclick = e => e.target == dlg && dlg.close();
@if($errors->userDeletion->any())
dlg.showModal();
@endif
</script>
</body>
</html>