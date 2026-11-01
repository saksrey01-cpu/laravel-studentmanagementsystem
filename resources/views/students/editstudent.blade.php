<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Student Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --navy: #0b1f3a;
            --ink: #12263f;
            --muted: #5a6b82;
            --teal: #0ea5a4;
            --teal-dark: #0a7f85;
            --blue: #2563eb;
            --sun: #ffb703;
            --coral: #ff6b6b;
            --line: #dbe7ee;

            --ease: cubic-bezier(0.22, 1, 0.36, 1);
            --slide-ease: cubic-bezier(0.77, 0, 0.18, 1);
            --slide-time: 8s;
            --cycle: calc(var(--slide-time) * 4);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Nunito Sans', system-ui, sans-serif;
            color: var(--ink);
            min-height: 100vh;
            background: var(--navy);
            overflow-x: hidden;
        }

        /* =========================================================
           1. SLIDING SKY BACKGROUND
           Optional photos: public/images/school/slide-1.jpg ... slide-4.jpg
           ========================================================= */
        .bg-slider { position: fixed; inset: 0; z-index: 0; overflow: hidden; background: var(--navy); }

        .bg-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transform: translate3d(100%, 0, 0);
            animation: slideMove var(--cycle) linear infinite;
            will-change: transform;
            overflow: hidden;
        }
        .bg-slide:nth-child(1) {
            animation-delay: calc(var(--slide-time) * -0.24);
            background-image:
                linear-gradient(160deg, rgba(11, 31, 58, 0.45), rgba(14, 165, 164, 0.35)),
                url('/images/school/slide-1.jpg'),
                linear-gradient(160deg, #0b1f3a 0%, #0a7f85 55%, #5eead4 130%);
        }
        .bg-slide:nth-child(2) {
            animation-delay: calc(var(--slide-time) * 0.76);
            background-image:
                linear-gradient(160deg, rgba(37, 20, 98, 0.45), rgba(255, 107, 107, 0.35)),
                url('/images/school/slide-2.jpg'),
                linear-gradient(160deg, #1f1456 0%, #a23b72 55%, #ff9a6b 130%);
        }
        .bg-slide:nth-child(3) {
            animation-delay: calc(var(--slide-time) * 1.76);
            background-image:
                linear-gradient(160deg, rgba(120, 53, 15, 0.4), rgba(255, 183, 3, 0.3)),
                url('/images/school/slide-3.jpg'),
                linear-gradient(160deg, #7c2d12 0%, #d97706 55%, #ffd166 130%);
        }
        .bg-slide:nth-child(4) {
            animation-delay: calc(var(--slide-time) * 2.76);
            background-image:
                linear-gradient(160deg, rgba(8, 20, 70, 0.45), rgba(34, 211, 238, 0.3)),
                url('/images/school/slide-4.jpg'),
                linear-gradient(160deg, #0a1648 0%, #1e40af 55%, #38bdf8 130%);
        }
        @keyframes slideMove {
            0%   { transform: translate3d(100%, 0, 0); animation-timing-function: var(--slide-ease); }
            6%   { transform: translate3d(0, 0, 0); }
            25%  { transform: translate3d(0, 0, 0); animation-timing-function: var(--slide-ease); }
            31%  { transform: translate3d(-100%, 0, 0); }
            31.01%, 100% { transform: translate3d(100%, 0, 0); }
        }
        .bg-slide::after {
            content: '';
            position: absolute;
            inset: -6%;
            background: inherit;
            animation: kenburns var(--cycle) ease-in-out infinite;
            animation-delay: inherit;
            z-index: -1;
        }
        @keyframes kenburns {
            0%, 100% { transform: scale(1); }
            50%      { transform: scale(1.08) translate3d(-1%, -1%, 0); }
        }

        .aurora { position: fixed; inset: 0; z-index: 1; pointer-events: none; overflow: hidden; mix-blend-mode: soft-light; }
        .aurora::before, .aurora::after { content: ''; position: absolute; width: 70vmax; height: 70vmax; border-radius: 50%; }
        .aurora::before {
            top: -35vmax; left: -20vmax;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.55), transparent 62%);
            animation: auroraA 18s ease-in-out infinite;
        }
        .aurora::after {
            bottom: -40vmax; right: -25vmax;
            background: radial-gradient(circle, rgba(255, 183, 3, 0.6), transparent 62%);
            animation: auroraB 22s ease-in-out infinite;
        }
        @keyframes auroraA {
            0%, 100% { transform: translate3d(0, 0, 0) scale(1); }
            50%      { transform: translate3d(14vmax, 8vmax, 0) scale(1.15); }
        }
        @keyframes auroraB {
            0%, 100% { transform: translate3d(0, 0, 0) scale(1); }
            50%      { transform: translate3d(-12vmax, -6vmax, 0) scale(1.2); }
        }

        .vignette {
            position: fixed; inset: 0; z-index: 2; pointer-events: none;
            background:
                radial-gradient(ellipse at center, rgba(11, 31, 58, 0) 0%, rgba(11, 31, 58, 0.5) 100%),
                linear-gradient(180deg, rgba(11, 31, 58, 0.1), rgba(11, 31, 58, 0.4));
        }

        .clouds { position: fixed; inset: 0; z-index: 3; pointer-events: none; overflow: hidden; }
        .cloud {
            position: absolute; left: -260px; width: 170px; height: 48px;
            border-radius: 99px; background: rgba(255, 255, 255, 0.26);
            animation: cloudDrift 70s linear infinite;
        }
        .cloud::before, .cloud::after { content: ''; position: absolute; background: inherit; border-radius: 50%; }
        .cloud::before { width: 70px; height: 70px; left: 24px; top: -32px; }
        .cloud::after  { width: 52px; height: 52px; left: 84px; top: -22px; }
        .cloud:nth-child(1) { top: 12%; animation-duration: 80s; animation-delay: -20s; }
        .cloud:nth-child(2) { top: 26%; transform: scale(0.7); animation-duration: 110s; animation-delay: -70s; opacity: 0.8; }
        .cloud:nth-child(3) { top: 8%;  transform: scale(1.2); animation-duration: 95s; animation-delay: -45s; opacity: 0.6; }
        @keyframes cloudDrift {
            from { translate: 0 0; }
            to   { translate: calc(100vw + 520px) 0; }
        }

        .sparkles { position: fixed; inset: 0; z-index: 3; pointer-events: none; overflow: hidden; }
        .sparkles span {
            position: absolute; bottom: -20px; width: 6px; height: 6px;
            border-radius: 50%; background: rgba(255, 255, 255, 0.7);
            animation: rise 14s linear infinite;
        }
        .sparkles span:nth-child(1)  { left: 6%;  animation-delay: 0s;   animation-duration: 15s; }
        .sparkles span:nth-child(2)  { left: 16%; animation-delay: -4s;  animation-duration: 12s; width: 4px; height: 4px; }
        .sparkles span:nth-child(3)  { left: 27%; animation-delay: -8s;  animation-duration: 17s; }
        .sparkles span:nth-child(4)  { left: 38%; animation-delay: -2s;  animation-duration: 13s; width: 4px; height: 4px; }
        .sparkles span:nth-child(5)  { left: 49%; animation-delay: -10s; animation-duration: 16s; }
        .sparkles span:nth-child(6)  { left: 60%; animation-delay: -6s;  animation-duration: 14s; width: 8px; height: 8px; background: rgba(255, 183, 3, 0.8); }
        .sparkles span:nth-child(7)  { left: 71%; animation-delay: -12s; animation-duration: 18s; width: 4px; height: 4px; }
        .sparkles span:nth-child(8)  { left: 82%; animation-delay: -3s;  animation-duration: 12s; }
        .sparkles span:nth-child(9)  { left: 91%; animation-delay: -9s;  animation-duration: 15s; width: 8px; height: 8px; background: rgba(255, 183, 3, 0.8); }
        .sparkles span:nth-child(10) { left: 33%; animation-delay: -14s; animation-duration: 19s; width: 4px; height: 4px; }
        @keyframes rise {
            0%   { transform: translateY(0) scale(0.6); opacity: 0; }
            10%  { opacity: 0.9; }
            80%  { opacity: 0.5; }
            100% { transform: translateY(-110vh) scale(1.3); opacity: 0; }
        }

        .skyline {
            position: fixed; left: 0; right: 0; bottom: 0;
            width: 100%; height: 40vh; min-height: 200px; max-height: 420px;
            z-index: 4; pointer-events: none;
            animation: skylineIn 1.6s var(--ease) 0.2s both;
        }
        @keyframes skylineIn {
            from { transform: translateY(40%); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }
        .skyline .win { fill: #ffd166; animation: twinkle 5s ease-in-out infinite; }
        .skyline .win:nth-of-type(2n) { animation-delay: -1.2s; }
        .skyline .win:nth-of-type(3n) { animation-delay: -2.6s; }
        .skyline .win:nth-of-type(5n) { animation-delay: -3.8s; }
        @keyframes twinkle { 0%, 100% { opacity: 1; } 50% { opacity: 0.35; } }
        .skyline .flag { transform-box: fill-box; transform-origin: left center; animation: wave 2.4s ease-in-out infinite; }
        @keyframes wave {
            0%, 100% { transform: skewY(0deg) scaleX(1); }
            50%      { transform: skewY(-8deg) scaleX(0.88); }
        }

        /* =========================================================
           2. PAGE + CARD
           ========================================================= */
        .page { position: relative; z-index: 10; }

        .form-card {
            background: rgba(255, 255, 255, 0.94);
            -webkit-backdrop-filter: blur(18px) saturate(1.3);
            backdrop-filter: blur(18px) saturate(1.3);
            border: 1px solid rgba(255, 255, 255, 0.75);
            border-radius: 28px;
            box-shadow: 0 40px 80px -22px rgba(4, 12, 30, 0.6), 0 0 0 1px rgba(255, 255, 255, 0.25) inset;
            overflow: hidden;
            animation: cardIn 1s var(--ease) 0.1s both;
        }
        @keyframes cardIn {
            from { opacity: 0; transform: translate3d(0, 44px, 0) scale(0.97); filter: blur(5px); }
            to   { opacity: 1; transform: translate3d(0, 0, 0) scale(1); filter: blur(0); }
        }

        .form-header {
            position: relative;
            padding: 28px 36px;
            color: #fff;
            background: linear-gradient(120deg, var(--teal-dark) 0%, var(--teal) 50%, #22c3b3 75%, var(--blue) 120%);
            background-size: 220% 220%;
            animation: headerFlow 12s ease-in-out infinite;
            overflow: hidden;
        }
        @keyframes headerFlow {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }
        .form-header::before {
            content: ''; position: absolute; width: 220px; height: 220px;
            right: -60px; top: -90px; border-radius: 50%;
            background: rgba(255, 255, 255, 0.13);
        }
        .form-header::after {
            content: ''; position: absolute; top: 0; left: -60%;
            width: 40%; height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: skewX(-20deg);
            animation: sheen 7s ease-in-out 1.6s infinite;
        }
        @keyframes sheen { 0% { left: -60%; } 40%, 100% { left: 140%; } }
        .form-header > * { position: relative; z-index: 1; }

        .title-wrap { display: flex; align-items: center; gap: 16px; }
        .brand-badge {
            width: 56px; height: 56px; border-radius: 18px;
            background: var(--sun); color: var(--navy);
            display: grid; place-items: center; font-size: 1.7rem; flex-shrink: 0;
            box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.4);
            animation: badgePop 1s var(--ease) 0.3s both, badgeFloat 4.5s ease-in-out 1.4s infinite;
        }
        @keyframes badgePop {
            0%   { transform: scale(0) rotate(-30deg); opacity: 0; }
            65%  { transform: scale(1.12) rotate(6deg); opacity: 1; }
            100% { transform: scale(1) rotate(0); opacity: 1; }
        }
        @keyframes badgeFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-4px); } }

        .form-header h3 {
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 700; font-size: 1.8rem; line-height: 1.1; margin: 0;
            animation: textIn 0.8s var(--ease) 0.4s both;
        }
        .form-header .sub { margin: 4px 0 0; opacity: 0.92; font-size: 0.95rem; animation: textIn 0.8s var(--ease) 0.5s both; }
        @keyframes textIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }

        .btn-head {
            display: inline-flex; align-items: center; gap: 6px;
            height: 42px; padding: 0 20px; border-radius: 12px;
            font-weight: 700; font-size: 0.95rem;
            background: #fff; color: var(--teal-dark);
            border: 2px solid transparent; text-decoration: none;
            box-shadow: 0 10px 20px -8px rgba(0, 0, 0, 0.35);
            animation: textIn 0.8s var(--ease) 0.6s both;
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease), color 0.3s var(--ease);
        }
        .btn-head i { transition: transform 0.4s var(--ease); }
        .btn-head:hover { color: var(--blue); transform: translateY(-3px); box-shadow: 0 16px 26px -10px rgba(0, 0, 0, 0.4); }
        .btn-head:hover i { transform: translateX(-4px); }
        .btn-head:active { transform: scale(0.97); }
        .btn-head:focus-visible { outline: 3px solid var(--sun); outline-offset: 3px; }

        /* completion progress under the header */
        .progress-line { height: 5px; background: #e6f0f3; position: relative; overflow: hidden; }
        .progress-line > i {
            position: absolute; left: 0; top: 0; bottom: 0; width: 0;
            background: linear-gradient(90deg, var(--teal), var(--sun));
            border-radius: 0 99px 99px 0;
            transition: width 0.7s var(--ease);
        }

        .page-body { padding: 30px 36px 36px; }

        /* Fields */
        .field { animation: fieldIn 0.8s var(--ease) both; animation-delay: calc(0.5s + var(--i, 0) * 0.07s); }
        @keyframes fieldIn { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }

        .field label.lbl {
            display: block;
            font-weight: 700;
            font-size: 0.92rem;
            color: var(--ink);
            margin-bottom: 7px;
        }
        .field label.lbl .req { color: var(--coral); margin-left: 2px; }
        .field label.lbl .opt { color: var(--muted); font-weight: 600; font-size: 0.82rem; margin-left: 4px; }

        .field-wrap { position: relative; }
        .field-wrap > i.lead-icon {
            position: absolute; left: 16px; top: 50%;
            transform: translateY(-50%);
            color: var(--muted); pointer-events: none; z-index: 2;
            transition: color 0.3s var(--ease), transform 0.4s var(--ease);
        }
        .field-wrap.is-area > i.lead-icon { top: 20px; transform: none; }
        .field-wrap:focus-within > i.lead-icon { color: var(--teal-dark); transform: translateY(-50%) scale(1.15); }
        .field-wrap.is-area:focus-within > i.lead-icon { transform: scale(1.15); }

        .form-control, .form-select {
            height: 52px;
            border-radius: 14px;
            border: 2px solid var(--line);
            background-color: #f4f9fb;
            color: var(--ink);
            font-size: 1rem;
            padding: 0 16px 0 46px;
            transition: border-color 0.35s var(--ease), box-shadow 0.35s var(--ease),
                        background-color 0.35s var(--ease), transform 0.35s var(--ease);
        }
        textarea.form-control { height: auto; padding: 14px 16px 14px 46px; resize: vertical; min-height: 110px; }
        .form-control::placeholder { color: #93a3b8; }
        .form-control:hover, .form-select:hover { border-color: #b9d3dd; }
        .form-control:focus, .form-select:focus {
            border-color: var(--teal);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(14, 165, 164, 0.18);
            transform: translateY(-2px);
        }
        .form-control.filled, .form-select.filled { border-color: #bfe3e1; }
        .form-control.is-invalid, .form-select.is-invalid { border-color: var(--coral); background-image: none; }
        .form-control.is-invalid:focus, .form-select.is-invalid:focus { box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.2); }

        .error-text {
            display: block;
            margin-top: 6px;
            padding-left: 4px;
            color: #e04848;
            font-size: 0.84rem;
            font-weight: 600;
            animation: errIn 0.5s var(--ease) both;
        }
        @keyframes errIn { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }

        .counter { text-align: right; font-size: 0.8rem; color: var(--muted); margin-top: 6px; font-weight: 600; }

        /* Gender pills */
        .pills { display: flex; gap: 10px; }
        .pill { flex: 1; position: relative; }
        .pill input { position: absolute; opacity: 0; inset: 0; cursor: pointer; z-index: 2; }
        .pill span {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            height: 52px;
            border-radius: 14px;
            border: 2px solid var(--line);
            background: #f4f9fb;
            font-weight: 700;
            color: var(--muted);
            transition: transform 0.4s var(--ease), border-color 0.3s var(--ease),
                        background-color 0.3s var(--ease), color 0.3s var(--ease), box-shadow 0.4s var(--ease);
        }
        .pill:hover span { border-color: #b9d3dd; transform: translateY(-2px); }
        .pill input:checked + span {
            color: #fff;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 12px 22px -10px var(--glow, rgba(14, 165, 164, 0.8));
        }
        .pill-m input:checked + span { background: linear-gradient(135deg, #2563eb, #60a5fa); --glow: rgba(37, 99, 235, 0.8); }
        .pill-f input:checked + span { background: linear-gradient(135deg, #e0517a, #ff8fa3); --glow: rgba(224, 81, 122, 0.8); }
        .pill-o input:checked + span { background: linear-gradient(135deg, #7c3aed, #a78bfa); --glow: rgba(124, 58, 237, 0.8); }
        .pill input:focus-visible + span { outline: 3px solid var(--sun); outline-offset: 2px; }
        .pill input:checked + span i { animation: pop 0.5s var(--ease); }
        @keyframes pop { 0% { transform: scale(0.4) rotate(-20deg); } 70% { transform: scale(1.3); } 100% { transform: scale(1); } }

        /* Buttons */
        .actions { display: flex; gap: 14px; margin-top: 8px; animation: fieldIn 0.8s var(--ease) 1.1s both; }

        .btn-save {
            position: relative;
            flex: 1;
            height: 56px;
            border: none; border-radius: 14px;
            background: linear-gradient(120deg, var(--teal-dark), var(--teal) 50%, var(--blue));
            background-size: 200% 100%; background-position: 0 0;
            color: #fff; font-weight: 700; font-size: 1.05rem;
            overflow: hidden;
            box-shadow: 0 14px 26px -10px rgba(14, 165, 164, 0.8);
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease), background-position 0.6s var(--ease), opacity 0.3s;
        }
        .btn-save::before {
            content: ''; position: absolute; top: 0; left: -80%;
            width: 60%; height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transform: skewX(-20deg);
            transition: left 0.8s var(--ease);
        }
        .btn-save:hover { color: #fff; background-position: 100% 0; transform: translateY(-3px); box-shadow: 0 22px 34px -12px rgba(37, 99, 235, 0.75); }
        .btn-save:hover::before { left: 140%; }
        .btn-save:active { transform: scale(0.985); }
        .btn-save:focus-visible { outline: 3px solid var(--sun); outline-offset: 3px; }
        .btn-save .btn-icon { display: inline-block; transition: transform 0.4s var(--ease); }
        .btn-save:hover .btn-icon { transform: scale(1.25) rotate(-8deg); }
        .btn-save .spinner {
            display: none; width: 20px; height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.4); border-top-color: #fff;
            border-radius: 50%; animation: spin 0.7s linear infinite;
            vertical-align: -4px; margin-right: 10px;
        }
        .btn-save.loading { pointer-events: none; opacity: 0.92; }
        .btn-save.loading .spinner { display: inline-block; }
        .btn-save.loading .btn-icon { display: none; }
        @keyframes spin { to { transform: rotate(360deg); } }

        .btn-cancel {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            height: 56px; padding: 0 28px;
            border-radius: 14px;
            border: 2px solid var(--line);
            background: #f4f9fb;
            color: var(--ink);
            font-weight: 700; text-decoration: none;
            transition: transform 0.4s var(--ease), border-color 0.3s var(--ease), color 0.3s var(--ease), background-color 0.3s var(--ease);
        }
        .btn-cancel:hover { background: #fff; border-color: var(--coral); color: #d63c3c; transform: translateY(-3px); }
        .btn-cancel:active { transform: scale(0.97); }
        .btn-cancel:focus-visible { outline: 3px solid var(--sun); outline-offset: 3px; }

        /* Unsaved changes chip */
        .dirty-chip {
            display: inline-flex; align-items: center; gap: 8px;
            height: 36px; padding: 0 14px;
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.45);
            font-weight: 700; font-size: 0.85rem; color: #fff;
            opacity: 0;
            transform: translateY(-8px) scale(0.9);
            pointer-events: none;
            transition: opacity 0.45s var(--ease), transform 0.45s var(--ease);
        }
        .dirty-chip i { font-size: 0.5rem; color: var(--sun); animation: blink 1.4s ease-in-out infinite; }
        .dirty-chip.show { opacity: 1; transform: translateY(0) scale(1); }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }

        .btn-reset {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            height: 56px; padding: 0 24px;
            border-radius: 14px;
            border: 2px solid var(--line);
            background: #f4f9fb;
            color: var(--ink);
            font-weight: 700;
            transition: transform 0.4s var(--ease), border-color 0.3s var(--ease), color 0.3s var(--ease), background-color 0.3s var(--ease);
        }
        .btn-reset i { transition: transform 0.6s var(--ease); }
        .btn-reset:hover { background: #fff; border-color: var(--sun); color: #a86e00; transform: translateY(-3px); }
        .btn-reset:hover i { transform: rotate(-360deg); }
        .btn-reset:active { transform: scale(0.97); }
        .btn-reset:focus-visible { outline: 3px solid var(--sun); outline-offset: 3px; }

        /* Responsive */
        @media (max-width: 767px) {
            .dirty-chip { display: none; }
            .btn-reset { width: 100%; }
            .form-header { padding: 22px 20px; }
            .page-body { padding: 24px 20px 28px; }
            .form-header h3 { font-size: 1.45rem; }
            .brand-badge { width: 46px; height: 46px; font-size: 1.35rem; }
            .btn-head span.label { display: none; }
            .btn-head { padding: 0 14px; }
            .actions { flex-direction: column-reverse; }
            .btn-cancel { width: 100%; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            .bg-slide:nth-child(1) { transform: translate3d(0, 0, 0); }
        }
    </style>
</head>
<body>

<!-- Sliding sky backgrounds -->
<div class="bg-slider" aria-hidden="true">
    <div class="bg-slide"></div>
    <div class="bg-slide"></div>
    <div class="bg-slide"></div>
    <div class="bg-slide"></div>
</div>
<div class="aurora" aria-hidden="true"></div>
<div class="vignette" aria-hidden="true"></div>

<div class="clouds" aria-hidden="true">
    <div class="cloud"></div><div class="cloud"></div><div class="cloud"></div>
</div>

<div class="sparkles" aria-hidden="true">
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
</div>

<!-- School skyline -->
<svg class="skyline" viewBox="0 0 1600 360" preserveAspectRatio="xMidYMax slice" aria-hidden="true">
    <path d="M0 220 C200 160 420 200 640 170 S1100 140 1300 190 S1520 170 1600 160 V360 H0Z" fill="#0b1f3a" opacity=".35"/>
    <path d="M0 270 C250 230 500 280 760 250 S1200 220 1400 260 S1560 250 1600 245 V360 H0Z" fill="#0b1f3a" opacity=".55"/>

    <g fill="#0b1f3a" opacity=".92">
        <rect x="396" y="262" width="8" height="44"/><circle cx="400" cy="250" r="34"/><circle cx="378" cy="266" r="22"/><circle cx="424" cy="268" r="22"/>
        <rect x="1196" y="262" width="8" height="44"/><circle cx="1200" cy="250" r="34"/><circle cx="1178" cy="266" r="22"/><circle cx="1224" cy="268" r="22"/>
        <rect x="236" y="276" width="6" height="30"/><circle cx="239" cy="268" r="24"/>
        <rect x="1356" y="276" width="6" height="30"/><circle cx="1359" cy="268" r="24"/>
    </g>

    <g fill="#0b1f3a" opacity=".95">
        <rect x="620" y="230" width="360" height="80"/>
        <rect x="520" y="255" width="100" height="55"/>
        <rect x="980" y="255" width="100" height="55"/>
        <rect x="770" y="170" width="60" height="70"/>
        <polygon points="758,170 800,128 842,170"/>
        <rect x="798" y="98" width="4" height="34"/>
    </g>
    <path class="flag" d="M802 100 L834 108 L802 117 Z" fill="#ff6b6b"/>
    <circle cx="800" cy="196" r="14" fill="#ffd166"/>
    <path d="M800 196 V187 M800 196 L807 199" stroke="#0b1f3a" stroke-width="2" stroke-linecap="round" fill="none"/>

    <g>
        <rect class="win" x="640" y="250" width="22" height="30" rx="3"/>
        <rect class="win" x="680" y="250" width="22" height="30" rx="3"/>
        <rect class="win" x="720" y="250" width="22" height="30" rx="3"/>
        <rect class="win" x="858" y="250" width="22" height="30" rx="3"/>
        <rect class="win" x="898" y="250" width="22" height="30" rx="3"/>
        <rect class="win" x="938" y="250" width="22" height="30" rx="3"/>
        <rect class="win" x="540" y="272" width="22" height="26" rx="3"/>
        <rect class="win" x="580" y="272" width="22" height="26" rx="3"/>
        <rect class="win" x="1000" y="272" width="22" height="26" rx="3"/>
        <rect class="win" x="1040" y="272" width="22" height="26" rx="3"/>
        <rect x="785" y="274" width="30" height="36" rx="3" fill="#ffd166" opacity=".92"/>
    </g>

    <path d="M0 312 Q800 292 1600 312 V360 H0Z" fill="#0b1f3a" opacity=".97"/>
</svg>

<div class="container py-5 page">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-card">

                <div class="form-header d-flex justify-content-between align-items-center gap-3">
                    <div class="title-wrap">
                        <div class="brand-badge"><i class="bi bi-pencil-square"></i></div>
                        <div>
                            <h3>Edit student</h3>
                            <p class="sub">Editing <strong>{{ $student->student_name }}</strong> &middot; ID {{ $student->student_id }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="dirty-chip" id="dirtyChip"><i class="bi bi-circle-fill"></i> Unsaved changes</span>
                        <a href="{{ route('students.index') }}" class="btn-head">
                            <i class="bi bi-arrow-left"></i> <span class="label">Back</span>
                        </a>
                    </div>
                </div>

                <div class="page-body">
                    <form action="{{ route('students.update', $student) }}" method="POST" id="studentForm">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6 mb-3 field" style="--i: 0">
                                <label class="lbl" for="student_name">Student name <span class="req">*</span></label>
                                <div class="field-wrap">
                                    <i class="bi bi-person lead-icon"></i>
                                    <input type="text" name="student_name" id="student_name"
                                           class="form-control @error('student_name') is-invalid @enderror"
                                           value="{{ old('student_name', $student->student_name) }}" placeholder="Enter student name" required>
                                </div>
                                @error('student_name')<span class="error-text">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3 field" style="--i: 1">
                                <label class="lbl">Gender <span class="req">*</span></label>
                                <div class="pills" id="genderPills">
                                    <label class="pill pill-m">
                                        <input type="radio" name="gender" value="Male" {{ old('gender', $student->gender) == 'Male' ? 'checked' : '' }} required>
                                        <span><i class="bi bi-gender-male"></i> Male</span>
                                    </label>
                                    <label class="pill pill-f">
                                        <input type="radio" name="gender" value="Female" {{ old('gender', $student->gender) == 'Female' ? 'checked' : '' }}>
                                        <span><i class="bi bi-gender-female"></i> Female</span>
                                    </label>
                                    <label class="pill pill-o">
                                        <input type="radio" name="gender" value="Other" {{ old('gender', $student->gender) == 'Other' ? 'checked' : '' }}>
                                        <span><i class="bi bi-gender-ambiguous"></i> Other</span>
                                    </label>
                                </div>
                                @error('gender')<span class="error-text">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3 field" style="--i: 2">
                                <label class="lbl" for="dob">Date of birth <span class="req">*</span></label>
                                <div class="field-wrap">
                                    <i class="bi bi-calendar-heart lead-icon"></i>
                                    <input type="date" name="dob" id="dob"
                                           class="form-control @error('dob') is-invalid @enderror"
                                           value="{{ old('dob', $student->dob) }}" required>
                                </div>
                                @error('dob')<span class="error-text">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3 field" style="--i: 3">
                                <label class="lbl" for="enrollment">Enrollment number <span class="opt">optional</span></label>
                                <div class="field-wrap">
                                    <i class="bi bi-hash lead-icon"></i>
                                    <input type="text" name="enrollment" id="enrollment"
                                           class="form-control @error('enrollment') is-invalid @enderror"
                                           value="{{ old('enrollment', $student->enrollment) }}" placeholder="e.g. CS2024001">
                                </div>
                                @error('enrollment')<span class="error-text">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3 field" style="--i: 4">
                                <label class="lbl" for="enrollment_date">Enrollment date <span class="opt">optional</span></label>
                                <div class="field-wrap">
                                    <i class="bi bi-calendar-check lead-icon"></i>
                                    <input type="date" name="enrollment_date" id="enrollment_date"
                                           class="form-control @error('enrollment_date') is-invalid @enderror"
                                           value="{{ old('enrollment_date', $student->enrollment_date) }}">
                                </div>
                                @error('enrollment_date')<span class="error-text">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3 field" style="--i: 5">
                                <label class="lbl" for="dept_id">Department <span class="req">*</span></label>
                                <div class="field-wrap">
                                    <i class="bi bi-building lead-icon"></i>
                                    <select name="dept_id" id="dept_id"
                                            class="form-select @error('dept_id') is-invalid @enderror" required>
                                        <option value="">Select department</option>
                                        @foreach($departments as $dept)
                                            <option value="{{ $dept->dept_id }}" {{ old('dept_id', $student->dept_id) == $dept->dept_id ? 'selected' : '' }}>
                                                {{ $dept->dept_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('dept_id')<span class="error-text">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12 mb-4 field" style="--i: 6">
                                <label class="lbl" for="description">Description <span class="opt">optional</span></label>
                                <div class="field-wrap is-area">
                                    <i class="bi bi-chat-left-text lead-icon"></i>
                                    <textarea name="description" id="description" rows="3"
                                              class="form-control @error('description') is-invalid @enderror"
                                              placeholder="Optional notes...">{{ old('description', $student->description) }}</textarea>
                                </div>
                                <div class="counter"><span id="charCount">0</span> characters</div>
                                @error('description')<span class="error-text">{{ $message }}</span>@enderror
                            </div>

                        </div>

                        <div class="actions">
                            <button type="submit" class="btn-save" id="saveBtn">
                                <span class="spinner"></span>
                                <i class="bi bi-check-lg me-1 btn-icon"></i><span class="btn-text">Update student</span>
                            </button>
                            <button type="button" class="btn-reset" id="resetBtn" title="Undo all changes">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </button>
                            <a href="{{ route('students.index') }}" class="btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        var form = document.getElementById('studentForm');
        var chip = document.getElementById('dirtyChip');
        var btn = document.getElementById('saveBtn');
        var resetBtn = document.getElementById('resetBtn');
        var submitting = false;

        // Snapshot of the values the page loaded with
        function snapshot() {
            var data = {};
            new FormData(form).forEach(function (v, k) {
                if (k !== '_token' && k !== '_method') data[k] = v;
            });
            return JSON.stringify(data);
        }
        var original = snapshot();

        function isDirty() { return snapshot() !== original; }
        function refresh() { chip.classList.toggle('show', isDirty()); }

        // Soft "filled" border on completed fields
        var fields = form.querySelectorAll('.form-control, .form-select');
        function mark(el) { el.classList.toggle('filled', el.value.trim() !== ''); }
        fields.forEach(function (el) {
            mark(el);
            el.addEventListener('input', function () { mark(el); refresh(); });
            el.addEventListener('change', function () { mark(el); refresh(); });
        });
        form.querySelectorAll('input[name="gender"]').forEach(function (r) {
            r.addEventListener('change', refresh);
        });

        // Description counter
        var desc = document.getElementById('description');
        var count = document.getElementById('charCount');
        function updateCount() { count.textContent = desc.value.length; }
        desc.addEventListener('input', updateCount);
        updateCount();

        // Reset to the saved values
        resetBtn.addEventListener('click', function () {
            form.reset();
            fields.forEach(mark);
            updateCount();
            refresh();
        });

        // Update button loading state
        form.addEventListener('submit', function () {
            submitting = true;
            btn.classList.add('loading');
            btn.querySelector('.btn-text').textContent = 'Updating...';
            setTimeout(function () { btn.disabled = true; }, 0);
        });
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) {
                submitting = false;
                btn.disabled = false;
                btn.classList.remove('loading');
                btn.querySelector('.btn-text').textContent = 'Update student';
            }
        });

        // Warn before leaving with unsaved changes
        window.addEventListener('beforeunload', function (e) {
            if (!submitting && isDirty()) { e.preventDefault(); e.returnValue = ''; }
        });
    })();
</script>
</body>
</html>