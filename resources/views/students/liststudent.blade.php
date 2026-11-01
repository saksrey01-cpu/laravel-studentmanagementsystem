<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List - Student Management</title>
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

        * { box-sizing: border-box; }

        body {
            font-family: 'Nunito Sans', system-ui, sans-serif;
            color: var(--ink);
            min-height: 100vh;
            background: var(--navy);
            overflow-x: hidden;
        }

        /* =========================================================
           1. SLIDING SKY BACKGROUND (fixed behind the page)
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

        .vignette {
            position: fixed;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            background:
                radial-gradient(ellipse at center, rgba(11, 31, 58, 0) 0%, rgba(11, 31, 58, 0.5) 100%),
                linear-gradient(180deg, rgba(11, 31, 58, 0.1), rgba(11, 31, 58, 0.4));
        }

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
        .skyline .win:nth-of-type(2n) { animation-delay: -1.2s; }
        .skyline .win:nth-of-type(3n) { animation-delay: -2.6s; }
        .skyline .win:nth-of-type(5n) { animation-delay: -3.8s; }
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

        /* Slide caption + progress dots, pinned under the page title area */
        .slide-chip {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            padding: 8px 16px 8px 10px;
            border-radius: 99px;
            background: rgba(11, 31, 58, 0.35);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #fff;
            animation: fieldIn 0.8s var(--ease) 0.2s both;
        }
        .slide-chip > i {
            width: 28px; height: 28px;
            display: grid; place-items: center;
            border-radius: 50%;
            background: var(--sun);
            color: var(--navy);
            font-size: 0.9rem;
        }
        .caption-wrap { position: relative; height: 1.4rem; width: 230px; overflow: hidden; }
        .caption {
            position: absolute;
            left: 0; top: 0;
            font-weight: 700;
            font-size: 0.95rem;
            white-space: nowrap;
            opacity: 0;
            transform: translate3d(0, 14px, 0);
            animation: captionCycle var(--cycle) ease infinite;
        }
        .caption:nth-child(1) { animation-delay: 0s; }
        .caption:nth-child(2) { animation-delay: var(--slide-time); }
        .caption:nth-child(3) { animation-delay: calc(var(--slide-time) * 2); }
        .caption:nth-child(4) { animation-delay: calc(var(--slide-time) * 3); }
        @keyframes captionCycle {
            0%   { opacity: 0; transform: translate3d(0, 14px, 0); }
            7%   { opacity: 1; transform: translate3d(0, 0, 0); }
            22%  { opacity: 1; transform: translate3d(0, 0, 0); }
            29%  { opacity: 0; transform: translate3d(0, -14px, 0); }
            100% { opacity: 0; transform: translate3d(0, -14px, 0); }
        }
        .dots { display: flex; gap: 6px; }
        .dots span {
            position: relative;
            width: 8px; height: 8px;
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.4);
            overflow: hidden;
            animation: dotActive var(--cycle) var(--ease) infinite;
        }
        .dots span::after {
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
            0%   { width: 8px; }
            6%   { width: 30px; }
            25%  { width: 30px; }
            31%  { width: 8px; }
            100% { width: 8px; }
        }
        @keyframes dotFill {
            0%   { transform: scaleX(0); opacity: 1; }
            25%  { transform: scaleX(1); opacity: 1; }
            31%  { transform: scaleX(1); opacity: 0; }
            100% { transform: scaleX(0); opacity: 0; }
        }

        /* =========================================================
           2. PAGE + CARD
           ========================================================= */
        .page { position: relative; z-index: 10; }

        .form-card {
            background: rgba(255, 255, 255, 0.93);
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
            padding: 30px 36px;
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
            content: '';
            position: absolute;
            width: 220px; height: 220px;
            right: -60px; top: -90px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.13);
        }
        .form-header::after {
            content: '';
            position: absolute;
            top: 0; left: -60%;
            width: 40%; height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: skewX(-20deg);
            animation: sheen 7s ease-in-out 1.6s infinite;
        }
        @keyframes sheen {
            0%        { left: -60%; }
            40%, 100% { left: 140%; }
        }
        .form-header > * { position: relative; z-index: 1; }

        .title-wrap { display: flex; align-items: center; gap: 16px; }

        .brand-badge {
            width: 56px; height: 56px;
            border-radius: 18px;
            background: var(--sun);
            color: var(--navy);
            display: grid;
            place-items: center;
            font-size: 1.7rem;
            flex-shrink: 0;
            box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.4);
            animation: badgePop 1s var(--ease) 0.3s both, badgeFloat 4.5s ease-in-out 1.4s infinite;
        }
        @keyframes badgePop {
            0%   { transform: scale(0) rotate(-30deg); opacity: 0; }
            65%  { transform: scale(1.12) rotate(6deg); opacity: 1; }
            100% { transform: scale(1) rotate(0); opacity: 1; }
        }
        @keyframes badgeFloat {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-4px); }
        }

        .form-header h3 {
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 700;
            font-size: 1.85rem;
            line-height: 1.1;
            margin: 0;
            animation: textIn 0.8s var(--ease) 0.4s both;
        }
        .form-header .sub {
            margin: 4px 0 0;
            opacity: 0.92;
            font-size: 0.95rem;
            animation: textIn 0.8s var(--ease) 0.5s both;
        }
        @keyframes textIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .header-actions { animation: textIn 0.8s var(--ease) 0.6s both; }

        .btn-head {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            height: 42px;
            padding: 0 20px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            border: 2px solid transparent;
            text-decoration: none;
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease),
                        background-color 0.3s var(--ease), color 0.3s var(--ease);
        }
        .btn-head i { transition: transform 0.4s var(--ease); }
        .btn-add { background: var(--sun); color: var(--navy); box-shadow: 0 10px 20px -8px rgba(0, 0, 0, 0.4); }
        .btn-add:hover { color: var(--navy); background: #ffc633; transform: translateY(-3px); box-shadow: 0 16px 26px -10px rgba(0, 0, 0, 0.45); }
        .btn-add:hover i { transform: rotate(-10deg) scale(1.2); }
        .btn-out { background: transparent; color: #fff; border-color: rgba(255, 255, 255, 0.7); }
        .btn-out:hover { background: #fff; color: var(--teal-dark); transform: translateY(-3px); }
        .btn-out:hover i { transform: translateX(3px); }
        .btn-head:active { transform: translateY(0) scale(0.97); }
        .btn-head:focus-visible { outline: 3px solid #fff; outline-offset: 3px; }

        .btn-profile { background: rgba(255, 255, 255, 0.2); color: #fff; border-color: rgba(255, 255, 255, 0.45); padding-left: 10px; }
        .btn-profile:hover { background: #fff; color: var(--teal-dark); transform: translateY(-3px); }
        .btn-profile .mini-av {
            width: 26px; height: 26px; border-radius: 9px;
            display: grid; place-items: center;
            object-fit: cover;
            background: var(--sun); color: var(--navy);
            font-size: 0.8rem; font-weight: 700;
        }

        .page-body { padding: 28px 36px 34px; }

        .alert {
            border: none;
            border-radius: 14px;
            font-weight: 600;
            animation: alertIn 0.7s var(--ease) both;
        }
        @keyframes alertIn {
            from { opacity: 0; transform: translateY(-14px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Stat tiles */
        .stat {
            position: relative;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 18px;
            border-radius: 18px;
            background: #fff;
            border: 1px solid var(--line);
            overflow: hidden;
            animation: statIn 0.8s var(--ease) both;
            transition: transform 0.45s var(--ease), box-shadow 0.45s var(--ease);
        }
        .stat:hover { transform: translateY(-5px); box-shadow: 0 18px 30px -16px rgba(11, 31, 58, 0.35); }
        .stats > div:nth-child(1) .stat { animation-delay: 0.45s; }
        .stats > div:nth-child(2) .stat { animation-delay: 0.55s; }
        .stats > div:nth-child(3) .stat { animation-delay: 0.65s; }
        @keyframes statIn {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        .stat::after {
            content: '';
            position: absolute;
            right: -26px; top: -26px;
            width: 90px; height: 90px;
            border-radius: 50%;
            background: var(--tint, rgba(14, 165, 164, 0.1));
            transition: transform 0.6s var(--ease);
        }
        .stat:hover::after { transform: scale(1.6); }
        .stat-icon {
            position: relative;
            z-index: 1;
            width: 50px; height: 50px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 1.4rem;
            color: #fff;
            background: var(--grad);
            flex-shrink: 0;
            transition: transform 0.5s var(--ease);
        }
        .stat:hover .stat-icon { transform: rotate(-8deg) scale(1.1); }
        .stat-text { position: relative; z-index: 1; }
        .stat-num {
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 700;
            font-size: 1.7rem;
            line-height: 1;
            font-variant-numeric: tabular-nums;
        }
        .stat-label { margin-top: 4px; color: var(--muted); font-weight: 600; font-size: 0.88rem; }
        .stat-1 { --grad: linear-gradient(135deg, #0ea5a4, #22c3b3); --tint: rgba(14, 165, 164, 0.12); }
        .stat-2 { --grad: linear-gradient(135deg, #2563eb, #60a5fa); --tint: rgba(37, 99, 235, 0.12); }
        .stat-3 { --grad: linear-gradient(135deg, #f59e0b, #fbbf24); --tint: rgba(245, 158, 11, 0.14); }
        .stat-3 .stat-icon { color: #4a2f00; }

        /* Search & filter */
        .filter-row { animation: fieldIn 0.8s var(--ease) 0.75s both; }
        @keyframes fieldIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .field-wrap { position: relative; }
        .field-wrap > i.lead-icon {
            position: absolute;
            left: 16px; top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            pointer-events: none;
            z-index: 2;
            transition: color 0.3s var(--ease), transform 0.4s var(--ease);
        }
        .field-wrap:focus-within > i.lead-icon { color: var(--teal-dark); transform: translateY(-50%) scale(1.15); }

        .form-control, .form-select {
            height: 52px;
            border-radius: 14px;
            border: 2px solid var(--line);
            background-color: #f4f9fb;
            color: var(--ink);
            font-size: 1rem;
            padding-left: 46px;
            transition: border-color 0.35s var(--ease), box-shadow 0.35s var(--ease),
                        background-color 0.35s var(--ease), transform 0.35s var(--ease);
        }
        .form-select { padding-right: 2.6rem; }
        .form-control:hover, .form-select:hover { border-color: #b9d3dd; }
        .form-control:focus, .form-select:focus {
            border-color: var(--teal);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(14, 165, 164, 0.18);
            transform: translateY(-2px);
        }

        .clear-btn {
            position: absolute;
            right: 10px; top: 50%;
            transform: translateY(-50%) scale(0.8);
            width: 32px; height: 32px;
            display: grid; place-items: center;
            border-radius: 10px;
            color: var(--muted);
            background: transparent;
            border: 0;
            opacity: 0;
            pointer-events: none;
            z-index: 2;
            transition: opacity 0.3s var(--ease), transform 0.3s var(--ease), background-color 0.3s;
        }
        .clear-btn.show { opacity: 1; transform: translateY(-50%) scale(1); pointer-events: auto; }
        .clear-btn:hover { background: rgba(255, 107, 107, 0.15); color: var(--coral); }

        .btn-search {
            position: relative;
            height: 52px;
            width: 100%;
            border: none;
            border-radius: 14px;
            background: linear-gradient(120deg, var(--teal-dark), var(--teal) 50%, var(--blue));
            background-size: 200% 100%;
            background-position: 0 0;
            color: #fff;
            font-weight: 700;
            overflow: hidden;
            box-shadow: 0 12px 22px -10px rgba(14, 165, 164, 0.8);
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease), background-position 0.6s var(--ease);
        }
        .btn-search::before {
            content: '';
            position: absolute;
            top: 0; left: -80%;
            width: 60%; height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transform: skewX(-20deg);
            transition: left 0.8s var(--ease);
        }
        .btn-search:hover {
            color: #fff;
            background-position: 100% 0;
            transform: translateY(-3px);
            box-shadow: 0 20px 30px -12px rgba(37, 99, 235, 0.7);
        }
        .btn-search:hover::before { left: 140%; }
        .btn-search:active { transform: translateY(0) scale(0.98); }
        .btn-search:focus-visible { outline: 3px solid var(--sun); outline-offset: 3px; }
        .btn-search .spinner {
            display: none;
            width: 18px; height: 18px;
            border: 3px solid rgba(255, 255, 255, 0.4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            vertical-align: -3px;
            margin-right: 8px;
        }
        .btn-search.loading .spinner { display: inline-block; }
        .btn-search.loading .btn-icon { display: none; }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Table */
        .table-wrap {
            border-radius: 18px;
            border: 1px solid var(--line);
            overflow: hidden;
            background: #fff;
            animation: fieldIn 0.8s var(--ease) 0.85s both;
        }
        .table-responsive { margin: 0; }
        .table {
            --bs-table-hover-bg: rgba(14, 165, 164, 0.07);
            margin: 0;
            color: var(--ink);
        }
        .table thead th {
            background: var(--navy);
            color: #fff;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 15px 16px;
            border: 0;
            white-space: nowrap;
        }
        .table tbody td {
            padding: 14px 16px;
            border-color: #edf3f6;
            vertical-align: middle;
        }
        .table tbody tr {
            animation: rowIn 0.7s var(--ease) both;
            animation-delay: calc(1s + var(--i, 0) * 0.06s);
            transition: background-color 0.3s var(--ease), transform 0.35s var(--ease), box-shadow 0.35s var(--ease);
        }
        @keyframes rowIn {
            from { opacity: 0; transform: translate3d(-18px, 0, 0); }
            to   { opacity: 1; transform: translate3d(0, 0, 0); }
        }
        .table-hover > tbody > tr:hover {
            transform: translateX(4px);
            box-shadow: inset 4px 0 0 var(--teal);
        }

        .sid { font-weight: 700; color: var(--muted); font-variant-numeric: tabular-nums; }

        .student-cell { display: flex; align-items: center; gap: 12px; }
        .avatar {
            width: 40px; height: 40px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 700;
            flex-shrink: 0;
            transition: transform 0.4s var(--ease);
        }
        tr:hover .avatar { transform: scale(1.1) rotate(-6deg); }
        .av-0 { background: linear-gradient(135deg, #0ea5a4, #22c3b3); }
        .av-1 { background: linear-gradient(135deg, #2563eb, #60a5fa); }
        .av-2 { background: linear-gradient(135deg, #f59e0b, #fbbf24); color: #4a2f00; }
        .av-3 { background: linear-gradient(135deg, #e0517a, #ff8fa3); }
        .av-4 { background: linear-gradient(135deg, #7c3aed, #a78bfa); }

        .name { font-weight: 700; }

        .gender {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 0.85rem;
            font-weight: 700;
        }
        .gender-m { background: rgba(37, 99, 235, 0.12); color: #1d4ed8; }
        .gender-f { background: rgba(224, 81, 122, 0.13); color: #c2325c; }
        .gender-o { background: rgba(90, 107, 130, 0.14); color: var(--muted); }

        .dept {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 10px;
            background: rgba(14, 165, 164, 0.12);
            color: var(--teal-dark);
            font-weight: 700;
            font-size: 0.85rem;
        }
        .muted { color: var(--muted); }

        .act {
            display: inline-grid;
            place-items: center;
            width: 38px; height: 38px;
            border-radius: 12px;
            border: 0;
            font-size: 1rem;
            text-decoration: none;
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease),
                        background-color 0.3s var(--ease), color 0.3s var(--ease);
        }
        .act-edit { background: rgba(255, 183, 3, 0.2); color: #a86e00; }
        .act-edit:hover { background: var(--sun); color: var(--navy); transform: translateY(-3px) rotate(-8deg); box-shadow: 0 10px 18px -8px rgba(255, 183, 3, 0.9); }
        .act-del { background: rgba(255, 107, 107, 0.16); color: #d63c3c; }
        .act-del:hover { background: var(--coral); color: #fff; transform: translateY(-3px) rotate(8deg); box-shadow: 0 10px 18px -8px rgba(255, 107, 107, 0.9); }
        .act:active { transform: scale(0.92); }
        .act:focus-visible { outline: 3px solid var(--teal); outline-offset: 2px; }

        .empty { padding: 48px 16px; text-align: center; }
        .empty i {
            display: inline-block;
            font-size: 3.4rem;
            color: #b6cfd8;
            animation: bob 3.5s ease-in-out infinite;
        }
        @keyframes bob {
            0%, 100% { transform: translateY(0) rotate(-4deg); }
            50%      { transform: translateY(-10px) rotate(4deg); }
        }
        .empty p { margin: 10px 0 0; color: var(--muted); font-weight: 600; }

        /* Pagination */
        .pager { margin-top: 22px; animation: fieldIn 0.8s var(--ease) 1.1s both; }
        .pagination {
            --bs-pagination-color: var(--teal-dark);
            --bs-pagination-hover-color: var(--teal-dark);
            --bs-pagination-hover-bg: rgba(14, 165, 164, 0.1);
            --bs-pagination-focus-color: var(--teal-dark);
            --bs-pagination-focus-bg: rgba(14, 165, 164, 0.1);
            --bs-pagination-focus-box-shadow: 0 0 0 4px rgba(14, 165, 164, 0.18);
            --bs-pagination-active-bg: var(--teal);
            --bs-pagination-active-border-color: var(--teal);
            --bs-pagination-border-color: var(--line);
            --bs-pagination-border-radius: 12px;
            gap: 6px;
            margin: 0;
        }
        .page-link {
            border-radius: 12px !important;
            font-weight: 700;
            transition: transform 0.3s var(--ease), background-color 0.3s var(--ease);
        }
        .page-link:hover { transform: translateY(-2px); }
        .page-item.active .page-link { box-shadow: 0 10px 18px -8px rgba(14, 165, 164, 0.8); }

        /* Logout confirmation modal */
        .modal-backdrop.show {
            opacity: 1;
            background: rgba(11, 31, 58, 0.55);
            -webkit-backdrop-filter: blur(6px);
            backdrop-filter: blur(6px);
        }
        .modal.fade .modal-dialog {
            transform: translateY(40px) scale(0.92);
            transition: transform 0.5s var(--ease), opacity 0.4s var(--ease);
            opacity: 0;
        }
        .modal.show .modal-dialog { transform: translateY(0) scale(1); opacity: 1; }

        .logout-modal .modal-content {
            border: 0;
            border-radius: 26px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 40px 80px -20px rgba(4, 12, 30, 0.65);
        }
        .logout-top {
            position: relative;
            padding: 34px 28px 22px;
            background: linear-gradient(180deg, rgba(255, 107, 107, 0.12), rgba(255, 255, 255, 0));
        }
        .logout-icon {
            width: 76px; height: 76px;
            margin: 0 auto 18px;
            border-radius: 24px;
            display: grid;
            place-items: center;
            font-size: 2.2rem;
            color: #fff;
            background: linear-gradient(135deg, var(--coral), #ff9a6b);
            box-shadow: 0 16px 28px -10px rgba(255, 107, 107, 0.8);
        }
        .modal.show .logout-icon { animation: iconPop 0.8s var(--ease) 0.15s both, iconWiggle 3.5s ease-in-out 1.2s infinite; }
        @keyframes iconPop {
            0%   { transform: scale(0) rotate(-30deg); opacity: 0; }
            65%  { transform: scale(1.15) rotate(6deg); opacity: 1; }
            100% { transform: scale(1) rotate(0); opacity: 1; }
        }
        @keyframes iconWiggle {
            0%, 88%, 100% { transform: rotate(0); }
            92% { transform: rotate(-8deg); }
            96% { transform: rotate(8deg); }
        }
        .logout-modal h5 {
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0 0 6px;
            color: var(--ink);
        }
        .logout-modal p { margin: 0; color: var(--muted); font-size: 0.97rem; }
        .logout-actions {
            display: flex;
            gap: 12px;
            padding: 8px 28px 30px;
        }
        .logout-actions .btn-no,
        .logout-actions .btn-yes {
            flex: 1;
            height: 52px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1rem;
            border: 2px solid transparent;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease),
                        background-color 0.3s var(--ease), color 0.3s var(--ease), border-color 0.3s var(--ease);
        }
        .btn-no { background: #f1f6f8; color: var(--ink); border-color: var(--line); }
        .btn-no:hover { background: #fff; border-color: var(--teal); color: var(--teal-dark); transform: translateY(-3px); }
        .btn-yes {
            background: linear-gradient(120deg, #ff6b6b, #ff8f6b);
            color: #fff;
            box-shadow: 0 14px 24px -10px rgba(255, 107, 107, 0.85);
        }
        .btn-yes:hover { transform: translateY(-3px); box-shadow: 0 20px 30px -12px rgba(255, 107, 107, 0.9); }
        .btn-yes:hover i { transform: translateX(4px); }
        .btn-yes i { transition: transform 0.4s var(--ease); }
        .btn-no:active, .btn-yes:active { transform: scale(0.96); }
        .btn-no:focus-visible, .btn-yes:focus-visible { outline: 3px solid var(--sun); outline-offset: 3px; }
        .btn-yes .spinner {
            display: none;
            width: 18px; height: 18px;
            border: 3px solid rgba(255, 255, 255, 0.45);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }
        .btn-yes.loading { pointer-events: none; opacity: 0.92; }
        .btn-yes.loading .spinner { display: inline-block; }
        .btn-yes.loading i { display: none; }

        /* Responsive */
        @media (max-width: 767px) {
            .form-header { padding: 24px 22px; }
            .page-body { padding: 22px 18px 26px; }
            .form-header h3 { font-size: 1.5rem; }
            .brand-badge { width: 48px; height: 48px; font-size: 1.4rem; }
            .btn-head span.label { display: none; }
            .btn-head { padding: 0 14px; }
            .caption-wrap { width: 170px; }
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

    <!-- Slideshow caption chip -->
    <div class="slide-chip" aria-hidden="true">
        <i class="bi bi-mortarboard-fill"></i>
        <div class="caption-wrap">
            <div class="caption">Every student counts</div>
            <div class="caption">Attendance made simple</div>
            <div class="caption">Grades in one place</div>
            <div class="caption">Teachers and parents connected</div>
        </div>
        <div class="dots"><span></span><span></span><span></span><span></span></div>
    </div>

    <div class="form-card">

        <!-- Header -->
        <div class="form-header d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="title-wrap">
                <div class="brand-badge"><i class="bi bi-people-fill"></i></div>
                <div>
                    <h3>Student List</h3>
                    <p class="sub">Search, add and manage your students</p>
                </div>
            </div>

            <div class="d-flex gap-2 header-actions">
                <a href="{{ route('profile.edit') }}" class="btn-head btn-profile" title="My profile">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="mini-av" alt="">
                    @else
                        <span class="mini-av">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
                    @endif
                    <span class="label">Profile</span>
                </a>

                <a href="{{ route('students.create') }}" class="btn-head btn-add">
                    <i class="bi bi-person-plus-fill"></i> <span class="label">Add Student</span>
                </a>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                    @csrf
                    <button type="button" class="btn-head btn-out" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="bi bi-box-arrow-right"></i> <span class="label">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="page-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" id="flash">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Stats -->
            <div class="row g-3 mb-4 stats">
                <div class="col-md-4">
                    <div class="stat stat-1">
                        <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="stat-text">
                            <div class="stat-num" data-count="{{ method_exists($students, 'total') ? $students->total() : $students->count() }}">0</div>
                            <div class="stat-label">Total students</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat stat-2">
                        <div class="stat-icon"><i class="bi bi-list-check"></i></div>
                        <div class="stat-text">
                            <div class="stat-num" data-count="{{ $students->count() }}">0</div>
                            <div class="stat-label">Shown on this page</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat stat-3">
                        <div class="stat-icon"><i class="bi bi-building"></i></div>
                        <div class="stat-text">
                            <div class="stat-num" data-count="{{ $departments->count() }}">0</div>
                            <div class="stat-label">Departments</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search & Filter -->
            <form method="GET" class="row g-3 mb-4 filter-row" id="filterForm">
                <div class="col-md-5">
                    <div class="field-wrap">
                        <i class="bi bi-search lead-icon"></i>
                        <input type="text" name="search" id="searchInput" class="form-control"
                               placeholder="Search by student name..." value="{{ request('search') }}">
                        <button type="button" class="clear-btn" id="clearSearch" aria-label="Clear search">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-wrap">
                        <i class="bi bi-building lead-icon"></i>
                        <select name="dept_id" class="form-select">
                            <option value="">All departments</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->dept_id }}"
                                    {{ request('dept_id') == $dept->dept_id ? 'selected' : '' }}>
                                    {{ $dept->dept_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn-search" id="searchBtn">
                        <span class="spinner"></span>
                        <i class="bi bi-search btn-icon"></i> Search
                    </button>
                </div>
            </form>

            <!-- Table -->
            <div class="table-wrap">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Enrollment</th>
                                <th>Department</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                            @php
                                $g = strtolower(substr((string) $student->gender, 0, 1));
                                $gClass = in_array($g, ['m', 'f']) ? $g : 'o';
                                $initial = strtoupper(mb_substr((string) $student->student_name, 0, 1)) ?: '?';
                                $avClass = crc32((string) $student->student_id) % 5;
                            @endphp
                            <tr style="--i: {{ min($loop->index, 14) }}">
                                <td class="sid">{{ $student->student_id }}</td>
                                <td>
                                    <div class="student-cell">
                                        <div class="avatar av-{{ $avClass }}">{{ $initial }}</div>
                                        <span class="name">{{ $student->student_name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="gender gender-{{ $gClass }}">
                                        @if($gClass === 'm')<i class="bi bi-gender-male"></i>@elseif($gClass === 'f')<i class="bi bi-gender-female"></i>@endif
                                        {{ $student->gender }}
                                    </span>
                                </td>
                                <td class="muted">{{ $student->dob }}</td>
                                <td class="muted">{{ $student->enrollment ?? '-' }}</td>
                                <td>
                                    @if($student->department->dept_name ?? false)
                                        <span class="dept">{{ $student->department->dept_name }}</span>
                                    @else
                                        <span class="muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('students.edit', $student) }}" class="act act-edit" title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="{{ route('students.show', $student) }}" class="act act-del" title="Delete">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty">
                                        <i class="bi bi-person-x"></i>
                                        <p>No students found. Try a different name or department.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pager">
                {{ $students->withQueryString()->links() }}
            </div>

        </div>
    </div>
</div>

<!-- Logout confirmation -->
<div class="modal fade logout-modal" id="logoutModal" tabindex="-1" aria-labelledby="logoutTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content">
            <div class="logout-top">
                <div class="logout-icon"><i class="bi bi-box-arrow-right"></i></div>
                <h5 id="logoutTitle">Log out?</h5>
                <p>Are you sure you want to log out of Student Management?</p>
            </div>
            <div class="logout-actions">
                <button type="button" class="btn-no" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i> No
                </button>
                <button type="button" class="btn-yes" id="confirmLogout">
                    <span class="spinner"></span>
                    <i class="bi bi-check-lg"></i> <span class="yes-text">Yes</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function () {
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Count-up for the stat numbers
        document.querySelectorAll('[data-count]').forEach(function (el, idx) {
            var target = parseInt(el.dataset.count, 10) || 0;
            if (reduce || target === 0) { el.textContent = target; return; }
            var delay = 450 + idx * 100, dur = 1200, start = null;
            setTimeout(function () {
                requestAnimationFrame(function step(ts) {
                    if (!start) start = ts;
                    var p = Math.min((ts - start) / dur, 1);
                    el.textContent = Math.round(target * (1 - Math.pow(1 - p, 4)));
                    if (p < 1) requestAnimationFrame(step);
                });
            }, delay);
        });

        // Clear button in the search box
        var input = document.getElementById('searchInput');
        var clear = document.getElementById('clearSearch');
        function sync() { clear.classList.toggle('show', input.value.length > 0); }
        input.addEventListener('input', sync);
        clear.addEventListener('click', function () { input.value = ''; sync(); input.focus(); });
        sync();

        // Search button loading state
        var form = document.getElementById('filterForm');
        var btn = document.getElementById('searchBtn');
        form.addEventListener('submit', function () { btn.classList.add('loading'); });
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) btn.classList.remove('loading');
        });

        // Logout: only submit when the user clicks "Yes"
        var yes = document.getElementById('confirmLogout');
        yes.addEventListener('click', function () {
            yes.classList.add('loading');
            yes.querySelector('.yes-text').textContent = 'Logging out...';
            document.getElementById('logoutForm').submit();
        });
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) {
                yes.classList.remove('loading');
                yes.querySelector('.yes-text').textContent = 'Yes';
            }
        });

        // Auto-hide success message
        var flash = document.getElementById('flash');
        if (flash) {
            setTimeout(function () {
                bootstrap.Alert.getOrCreateInstance(flash).close();
            }, 5000);
        }
    })();
</script>
</body>
</html>