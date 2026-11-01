<x-guest-layout>
    <style>
        @keyframes fp-rise  { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: none; } }
        @keyframes fp-pop   { 0% { opacity: 0; transform: scale(.5) rotate(-12deg); } 100% { opacity: 1; transform: none; } }
        @keyframes fp-ring  { 0% { opacity: .5; transform: scale(1); } 100% { opacity: 0; transform: scale(1.6); } }
        @keyframes fp-spin  { to { transform: rotate(360deg); } }

        .fp-rise { opacity: 0; animation: fp-rise .6s cubic-bezier(.22, 1, .36, 1) forwards; }
        .fp-pop  { opacity: 0; animation: fp-pop .6s .1s cubic-bezier(.22, 1, .36, 1) forwards; }
        .fp-ring::before {
            content: ""; position: absolute; inset: 0; border-radius: 9999px;
            border: 2px solid #6366f1; opacity: 0;
            animation: fp-ring 1.8s .6s cubic-bezier(.22, 1, .36, 1) 2;
        }
        .fp-spin { animation: fp-spin .7s linear infinite; }

        @media (prefers-reduced-motion: reduce) {
            .fp-rise, .fp-pop { animation-duration: .01ms; animation-delay: 0s; }
            .fp-ring::before, .fp-spin { animation: none; }
        }
    </style>

    <div class="text-center">
        <!-- Icon -->
        <div class="relative fp-ring fp-pop mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.03 5.91c-.5-.09-1.05.05-1.41.41L11.25 16.5H9v2.25H6.75V21H3v-2.81c0-.4.16-.78.44-1.06l5.99-5.99c.36-.36.5-.91.41-1.41A6 6 0 1 1 21.75 8.25Z" />
            </svg>
        </div>

        <h1 class="fp-rise text-2xl font-bold tracking-tight text-gray-900" style="animation-delay:.15s">
            {{ __('Reset your password') }}
        </h1>
        <p class="fp-rise mx-auto mt-2 max-w-sm text-sm leading-6 text-gray-500" style="animation-delay:.22s">
            {{ __('Enter the email you signed up with and we will send you a link to choose a new password.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mt-5 rounded-xl bg-green-50 px-4 py-3 text-sm font-medium text-green-700 ring-1 ring-green-200" :status="session('status')" />

    <form
        method="POST"
        action="{{ route('password.email') }}"
        class="fp-rise mt-6"
        style="animation-delay:.3s"
        x-data="{ loading: false }"
        x-on:submit="loading = true"
    >
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="!text-sm !font-semibold !text-gray-700" />

            <div class="group relative mt-1.5">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 transition-colors duration-200 group-focus-within:text-indigo-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.24a2.25 2.25 0 0 1-1.07 1.92l-7.5 4.62a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.92V6.75" />
                    </svg>
                </span>

                <x-text-input
                    id="email"
                    class="block w-full !rounded-xl !border-gray-200 !bg-gray-50 !py-3 !pl-11 !pr-4 !shadow-none transition duration-200 placeholder:text-gray-400 hover:!border-gray-300 focus:!border-indigo-500 focus:!bg-white focus:!ring-4 focus:!ring-indigo-100"
                    type="email"
                    name="email"
                    :value="old('email')"
                    placeholder="you@example.com"
                    required
                    autofocus
                    autocomplete="email"
                />
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit -->
        <button
            type="submit"
            x-bind:disabled="loading"
            class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/25 transition duration-300 ease-out hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/30 focus:outline-none focus-visible:ring-4 focus-visible:ring-indigo-200 active:translate-y-0 active:scale-[.98] disabled:cursor-not-allowed disabled:opacity-80 disabled:hover:translate-y-0"
        >
            <svg x-show="loading" x-cloak class="fp-spin h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-opacity=".3" stroke-width="3" />
                <path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
            </svg>
            <span x-show="!loading">{{ __('Email password reset link') }}</span>
            <span x-show="loading" x-cloak>{{ __('Sending…') }}</span>
        </button>
    </form>

    <p class="fp-rise mt-6 text-center text-sm text-gray-500" style="animation-delay:.4s">
        {{ __('Remembered it?') }}
        <a href="{{ route('login') }}" class="font-semibold text-indigo-600 transition-colors hover:text-indigo-800 focus:outline-none focus-visible:underline">
            {{ __('Back to log in') }}
        </a>
    </p>
</x-guest-layout>