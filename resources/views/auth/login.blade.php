<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Management</title>
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
            --slide-time: 8s;                       /* time each background stays */
            --cycle: calc(var(--slide-time) * 4);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { height: 100%; }

        body {
            font-family: 'Nunito Sans', system-ui, sans-serif;
            color: var(--ink);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow: hidden;
            background: var(--navy);
        }

        /* =========================================================
           1. SLIDING SKY BACKGROUND
           Each slide glides in from the right and pushes the last one out.
           Optional photos: public/images/school/slide-1.jpg ... slide-4.jpg
           ========================================================= */
        .bg-slider {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            background: var(--navy);
        }

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

        /* in (0-6%) -> hold -> out (25-31%) -> wait off-screen */
        @keyframes slideMove {
            0%   { transform: translate3d(100%, 0, 0); animation-timing-function: var(--slide-ease); }
            6%   { transform: translate3d(0, 0, 0); }
            25%  { transform: translate3d(0, 0, 0); animation-timing-function: var(--slide-ease); }
            31%  { transform: translate3d(-100%, 0, 0); }
            31.01%, 100% { transform: translate3d(100%, 0, 0); }
        }

        /* slow zoom inside each slide so even the hold feels alive */
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

        /* Aurora glow that drifts above every slide */
        .aurora {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            overflow: hidden;
            mix-blend-mode: soft-light;
        }
        .aurora::before, .aurora::after {
            content: '';
            position: absolute;
            width: 70vmax;
            height: 70vmax;
            border-radius: 50%;
        }
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

        /* vignette keeps the card readable */
        .vignette {
            position: fixed;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            background:
                radial-gradient(ellipse at center, rgba(11, 31, 58, 0) 0%, rgba(11, 31, 58, 0.5) 100%),
                linear-gradient(180deg, rgba(11, 31, 58, 0.1), rgba(11, 31, 58, 0.4));
        }

        /* drifting clouds */
        .clouds { position: fixed; inset: 0; z-index: 3; pointer-events: none; overflow: hidden; }
        .cloud {
            position: absolute;
            left: -260px;
            width: 170px;
            height: 48px;
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.26);
            animation: cloudDrift 70s linear infinite;
        }
        .cloud::before, .cloud::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }
        .cloud::before { width: 70px; height: 70px; left: 24px; top: -32px; }
        .cloud::after  { width: 52px; height: 52px; left: 84px; top: -22px; }
        .cloud:nth-child(1) { top: 12%; animation-duration: 80s; animation-delay: -20s; }
        .cloud:nth-child(2) { top: 26%; transform: scale(0.7); animation-duration: 110s; animation-delay: -70s; opacity: 0.8; }
        .cloud:nth-child(3) { top: 8%;  transform: scale(1.2); animation-duration: 95s; animation-delay: -45s; opacity: 0.6; }

        @keyframes cloudDrift {
            from { translate: 0 0; }
            to   { translate: calc(100vw + 520px) 0; }
        }

        /* rising sparkles */
        .sparkles { position: fixed; inset: 0; z-index: 3; pointer-events: none; overflow: hidden; }
        .sparkles span {
            position: absolute;
            bottom: -20px;
            width: 6px; height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.7);
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

        /* School skyline at the bottom */
        .skyline {
            position: fixed;
            left: 0; right: 0; bottom: 0;
            width: 100%;
            height: 40vh;
            min-height: 200px;
            max-height: 420px;
            z-index: 4;
            pointer-events: none;
            animation: skylineIn 1.6s var(--ease) 0.2s both;
        }
        @keyframes skylineIn {
            from { transform: translateY(40%); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }
        .skyline .win { fill: #ffd166; animation: twinkle 5s ease-in-out infinite; }
        .skyline .win:nth-of-type(2n)   { animation-delay: -1.2s; }
        .skyline .win:nth-of-type(3n)   { animation-delay: -2.6s; }
        .skyline .win:nth-of-type(5n)   { animation-delay: -3.8s; }
        @keyframes twinkle {
            0%, 100% { opacity: 1; }
            50%      { opacity: 0.35; }
        }
        .skyline .flag {
            transform-box: fill-box;
            transform-origin: left center;
            animation: wave 2.4s ease-in-out infinite;
        }
        @keyframes wave {
            0%, 100% { transform: skewY(0deg) scaleX(1); }
            50%      { transform: skewY(-8deg) scaleX(0.88); }
        }

        /* Top-left slide caption + progress dots */
        .showcase {
            position: fixed;
            top: 38px;
            left: 44px;
            z-index: 6;
            pointer-events: none;
        }
        .showcase-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 18px;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.3);
        }
        .showcase-brand i {
            width: 34px; height: 34px;
            display: grid; place-items: center;
            border-radius: 11px;
            background: var(--sun);
            color: var(--navy);
            font-size: 1.1rem;
        }
        .caption-wrap { position: relative; height: 3.4rem; width: min(440px, 60vw); }
        .caption {
            position: absolute;
            left: 0; top: 0;
            color: #fff;
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 700;
            font-size: 2.1rem;
            line-height: 1.1;
            text-shadow: 0 3px 20px rgba(0, 0, 0, 0.35);
            opacity: 0;
            transform: translate3d(0, 18px, 0);
            animation: captionCycle var(--cycle) ease infinite;
        }
        .caption:nth-child(1) { animation-delay: 0s; }
        .caption:nth-child(2) { animation-delay: var(--slide-time); }
        .caption:nth-child(3) { animation-delay: calc(var(--slide-time) * 2); }
        .caption:nth-child(4) { animation-delay: calc(var(--slide-time) * 3); }
        @keyframes captionCycle {
            0%   { opacity: 0; transform: translate3d(0, 18px, 0); }
            7%   { opacity: 1; transform: translate3d(0, 0, 0); }
            22%  { opacity: 1; transform: translate3d(0, 0, 0); }
            29%  { opacity: 0; transform: translate3d(0, -14px, 0); }
            100% { opacity: 0; transform: translate3d(0, -14px, 0); }
        }

        .dots { display: flex; gap: 8px; margin-top: 8px; }
        .dots span {
            position: relative;
            width: 10px; height: 10px;
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.4);
            overflow: hidden;
            animation: dotActive var(--cycle) var(--ease) infinite;
        }
        .dots span::after {            /* progress fill */
            content: '';
            position: absolute;
            inset: 0;
            background: var(--sun);
            transform: scaleX(0);
            transform-origin: left;
            animation: dotFill var(--cycle) linear infinite;
            animation-delay: inherit;
        }
        .dots span:nth-child(1) { animation-delay: 0s; }
        .dots span:nth-child(2) { animation-delay: var(--slide-time); }
        .dots span:nth-child(3) { animation-delay: calc(var(--slide-time) * 2); }
        .dots span:nth-child(4) { animation-delay: calc(var(--slide-time) * 3); }
        @keyframes dotActive {
            0%   { width: 10px; }
            6%   { width: 42px; }
            25%  { width: 42px; }
            31%  { width: 10px; }
            100% { width: 10px; }
        }
        @keyframes dotFill {
            0%   { transform: scaleX(0); opacity: 1; }
            25%  { transform: scaleX(1); opacity: 1; }
            31%  { transform: scaleX(1); opacity: 0; }
            100% { transform: scaleX(0); opacity: 0; }
        }

        /* =========================================================
           2. LOGIN CARD
           ========================================================= */
        .card-tilt {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            perspective: 1200px;
        }

        .login-card {
            position: relative;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            -webkit-backdrop-filter: blur(20px) saturate(1.3);
            backdrop-filter: blur(20px) saturate(1.3);
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow:
                0 40px 80px -20px rgba(4, 12, 30, 0.65),
                0 0 0 1px rgba(255, 255, 255, 0.2) inset;
            overflow: hidden;
            animation: cardIn 1.1s var(--ease) 0.1s both;
        }
        @keyframes cardIn {
            from { opacity: 0; transform: translate3d(0, 60px, 0) scale(0.95); filter: blur(6px); }
            to   { opacity: 1; transform: translate3d(0, 0, 0) scale(1); filter: blur(0); }
        }

        .login-header {
            position: relative;
            padding: 36px 36px 30px;
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
        .login-header::before {
            content: '';
            position: absolute;
            width: 190px; height: 190px;
            right: -55px; top: -65px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.14);
        }
        .login-header::after {
            content: '';
            position: absolute;
            top: 0; left: -60%;
            width: 40%; height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255, 255, 255, 0.26), transparent);
            transform: skewX(-20deg);
            animation: sheen 6s ease-in-out 1.6s infinite;
        }
        @keyframes sheen {
            0%        { left: -60%; }
            40%, 100% { left: 140%; }
        }

        .brand-badge {
            position: relative;
            z-index: 1;
            width: 64px; height: 64px;
            border-radius: 20px;
            background: var(--sun);
            color: var(--navy);
            display: grid;
            place-items: center;
            font-size: 2rem;
            margin-bottom: 18px;
            box-shadow: 0 14px 26px -8px rgba(0, 0, 0, 0.45);
            animation: badgePop 1.1s var(--ease) 0.45s both, badgeFloat 4.5s ease-in-out 1.6s infinite;
        }
        @keyframes badgePop {
            0%   { transform: scale(0) rotate(-30deg); opacity: 0; }
            65%  { transform: scale(1.12) rotate(6deg); opacity: 1; }
            100% { transform: scale(1) rotate(0); opacity: 1; }
        }
        @keyframes badgeFloat {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-5px); }
        }

        .login-header h3, .login-header p { position: relative; z-index: 1; }
        .login-header h3 {
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 700;
            font-size: 1.95rem;
            line-height: 1.15;
            margin-bottom: 6px;
            animation: textIn 0.9s var(--ease) 0.6s both;
        }
        .login-header p {
            font-size: 0.98rem;
            opacity: 0.92;
            animation: textIn 0.9s var(--ease) 0.72s both;
        }
        @keyframes textIn {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .form-body { padding: 32px 36px 36px; }

        .form-body form > * { animation: fieldIn 0.8s var(--ease) both; }
        .form-body form > *:nth-child(2) { animation-delay: 0.7s; }
        .form-body form > *:nth-child(3) { animation-delay: 0.8s; }
        .form-body form > *:nth-child(4) { animation-delay: 0.9s; }
        .form-body form > *:nth-child(5) { animation-delay: 1s; }
        .form-body form > *:nth-child(6) { animation-delay: 1.1s; }
        @keyframes fieldIn {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .form-floating { position: relative; margin-bottom: 18px; }

        .form-floating > .form-control {
            height: 58px;
            padding: 1.5rem 1.1rem 0.5rem;
            border-radius: 14px;
            border: 2px solid var(--line);
            background: #f4f9fb;
            font-size: 1rem;
            color: var(--ink);
            transition: border-color 0.35s var(--ease), box-shadow 0.35s var(--ease),
                        background-color 0.35s var(--ease), transform 0.35s var(--ease);
        }
        .form-floating > .form-control:hover { border-color: #b9d3dd; }
        .form-floating > .form-control:focus {
            border-color: var(--teal);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(14, 165, 164, 0.18);
            transform: translateY(-2px);
        }
        .form-floating > label {
            padding: 1rem 1.1rem;
            color: var(--muted);
            transition: all 0.3s var(--ease);
        }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label { color: var(--teal-dark); }

        .has-toggle > .form-control { padding-right: 3.2rem; }
        .toggle-pass {
            position: absolute;
            top: 50%; right: 10px;
            transform: translateY(-50%);
            z-index: 5;
            width: 40px; height: 40px;
            border: 0;
            border-radius: 12px;
            background: transparent;
            color: var(--muted);
            font-size: 1.15rem;
            display: grid; place-items: center;
            cursor: pointer;
            transition: background-color 0.3s var(--ease), color 0.3s var(--ease), transform 0.3s var(--ease);
        }
        .toggle-pass:hover { background: rgba(14, 165, 164, 0.12); color: var(--teal-dark); }
        .toggle-pass:active { transform: translateY(-50%) scale(0.92); }
        .toggle-pass:focus-visible { outline: 3px solid var(--sun); outline-offset: 1px; }

        .invalid-feedback { font-size: 0.85rem; margin-top: 6px; padding-left: 4px; }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 24px;
        }
        .form-check { margin: 0; }
        .form-check-input {
            width: 1.15em; height: 1.15em;
            border: 2px solid #aac3cf;
            cursor: pointer;
            transition: all 0.3s var(--ease);
        }
        .form-check-input:checked {
            background-color: var(--teal);
            border-color: var(--teal);
            transform: scale(1.1);
        }
        .form-check-input:focus { box-shadow: 0 0 0 4px rgba(14, 165, 164, 0.18); }
        .form-check-label { color: var(--muted); cursor: pointer; font-size: 0.95rem; }

        .forgot {
            font-size: 0.92rem;
            font-weight: 600;
            color: var(--teal-dark);
            text-decoration: none;
            transition: color 0.3s var(--ease);
        }
        .forgot:hover { color: var(--blue); text-decoration: underline; }

        /* Button */
        .btn-login {
            position: relative;
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(120deg, var(--teal-dark), var(--teal) 50%, var(--blue));
            background-size: 200% 100%;
            background-position: 0% 0;
            color: #fff;
            font-weight: 700;
            font-size: 1.05rem;
            overflow: hidden;
            box-shadow: 0 14px 26px -10px rgba(14, 165, 164, 0.8);
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease),
                        background-position 0.6s var(--ease), opacity 0.3s;
        }
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0; left: -80%;
            width: 60%; height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transform: skewX(-20deg);
            transition: left 0.8s var(--ease);
        }
        .btn-login:hover {
            color: #fff;
            background-position: 100% 0;
            transform: translateY(-3px);
            box-shadow: 0 22px 34px -12px rgba(37, 99, 235, 0.75);
        }
        .btn-login:hover::before { left: 140%; }
        .btn-login:active { transform: translateY(0) scale(0.985); }
        .btn-login:focus-visible { outline: 3px solid var(--sun); outline-offset: 3px; }
        .btn-login .btn-icon { display: inline-block; transition: transform 0.4s var(--ease); }
        .btn-login:hover .btn-icon { transform: translateX(5px); }

        .btn-login .spinner {
            display: none;
            width: 20px; height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            vertical-align: -4px;
            margin-right: 10px;
        }
        .btn-login.loading { pointer-events: none; opacity: 0.9; }
        .btn-login.loading .spinner { display: inline-block; }
        .btn-login.loading .btn-icon { display: none; }
        @keyframes spin { to { transform: rotate(360deg); } }

        .register-link {
            text-align: center;
            margin-top: 22px;
            font-size: 0.95rem;
            color: var(--muted);
        }
        .register-link a {
            position: relative;
            color: var(--teal-dark);
            font-weight: 700;
            text-decoration: none;
            transition: color 0.3s var(--ease);
        }
        .register-link a::after {
            content: '';
            position: absolute;
            left: 0; bottom: -2px;
            width: 100%; height: 2px;
            background: var(--sun);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s var(--ease);
        }
        .register-link a:hover { color: var(--blue); }
        .register-link a:hover::after { transform: scaleX(1); }

        .alert {
            border: none;
            border-radius: 14px;
            font-size: 0.92rem;
            animation: fieldIn 0.6s var(--ease) both;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .caption-wrap { display: none; }
            .showcase { top: 22px; left: 22px; }
            .showcase-brand { margin-bottom: 10px; }
        }
        @media (max-width: 600px) {
            body { padding: 14px; }
            .showcase { display: none; }
            .login-header { padding: 30px 26px 26px; }
            .form-body { padding: 26px 26px 30px; }
            .login-header h3 { font-size: 1.65rem; }
        }
        @media (max-height: 720px) {
            .showcase { display: none; }
        }

        /* Reduced motion */
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

    <!-- trees -->
    <g fill="#0b1f3a" opacity=".92">
        <rect x="396" y="262" width="8" height="44"/><circle cx="400" cy="250" r="34"/><circle cx="378" cy="266" r="22"/><circle cx="424" cy="268" r="22"/>
        <rect x="1196" y="262" width="8" height="44"/><circle cx="1200" cy="250" r="34"/><circle cx="1178" cy="266" r="22"/><circle cx="1224" cy="268" r="22"/>
        <rect x="236" y="276" width="6" height="30"/><circle cx="239" cy="268" r="24"/>
        <rect x="1356" y="276" width="6" height="30"/><circle cx="1359" cy="268" r="24"/>
    </g>

    <!-- school building -->
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

    <!-- windows -->
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

    <!-- ground -->
    <path d="M0 312 Q800 292 1600 312 V360 H0Z" fill="#0b1f3a" opacity=".97"/>
</svg>

<!-- Top-left caption and progress -->
<div class="showcase" aria-hidden="true">
    <div class="showcase-brand"><i class="bi bi-mortarboard-fill"></i> Student Management</div>
    <div class="caption-wrap">
        <div class="caption">Every student counts</div>
        <div class="caption">Attendance made simple</div>
        <div class="caption">Grades in one place</div>
        <div class="caption">Teachers and parents connected</div>
    </div>
    <div class="dots"><span></span><span></span><span></span><span></span></div>
</div>

<div class="card-tilt" id="tilt">
    <div class="login-card">
        <div class="login-header">
            <div class="brand-badge"><i class="bi bi-mortarboard-fill"></i></div>
            <h3>Welcome back</h3>
            <p>Sign in to the Student Management System</p>
        </div>

        <div class="form-body">
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" placeholder="name@example.com"
                           value="{{ old('email', session('email')) }}" required autofocus>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating has-toggle">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <button type="button" class="toggle-pass" id="togglePass" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-login" id="loginBtn">
                    <span class="spinner"></span>
                    <i class="bi bi-box-arrow-in-right me-2 btn-icon"></i><span class="btn-text">Log in</span>
                </button>

                <div class="register-link">
                    Don't have an account? <a href="{{ route('register') }}">Register now</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    (function () {
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Show / hide password
        var pass = document.getElementById('password');
        var toggle = document.getElementById('togglePass');
        toggle.addEventListener('click', function () {
            var show = pass.type === 'password';
            pass.type = show ? 'text' : 'password';
            toggle.querySelector('i').className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
            toggle.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
            pass.focus();
        });

        // Loading state on submit
        var form = document.getElementById('loginForm');
        var btn = document.getElementById('loginBtn');
        form.addEventListener('submit', function () {
            btn.classList.add('loading');
            btn.querySelector('.btn-text').textContent = 'Signing in...';
            setTimeout(function () { btn.disabled = true; }, 0);
        });
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) {
                btn.disabled = false;
                btn.classList.remove('loading');
                btn.querySelector('.btn-text').textContent = 'Log in';
            }
        });

        // Soft 3D tilt that follows the mouse (desktop only)
        var fine = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
        if (!reduce && fine) {
            var tilt = document.getElementById('tilt');
            var tx = 0, ty = 0, cx = 0, cy = 0, raf = null;
            function frame() {
                cx += (tx - cx) * 0.08;
                cy += (ty - cy) * 0.08;
                tilt.style.transform = 'rotateX(' + cy.toFixed(2) + 'deg) rotateY(' + cx.toFixed(2) + 'deg)';
                if (Math.abs(tx - cx) > 0.01 || Math.abs(ty - cy) > 0.01) {
                    raf = requestAnimationFrame(frame);
                } else { raf = null; }
            }
            document.addEventListener('mousemove', function (e) {
                tx = ((e.clientX / window.innerWidth) - 0.5) * 6;
                ty = ((e.clientY / window.innerHeight) - 0.5) * -5;
                if (!raf) raf = requestAnimationFrame(frame);
            });
        }
    })();
</script>

</body>
</html>