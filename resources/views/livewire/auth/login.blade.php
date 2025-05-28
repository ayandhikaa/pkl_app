
<div class="w-full max-w-xl bg-white dark:bg-zinc-800 rounded-2xl shadow-lg p-8 space-y-6">
        <!-- Header -->
        <x-auth-header 
            :title="__('Log in to your account')" 
            :description="__('Enter your email and password below to log in')" 
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <!-- Form -->
        <form wire:submit="login" method="post" class="flex flex-col gap-4">
            <!-- Email -->
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />
                @if (Route::has('password.request'))
                    <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox wire:model="remember" :label="__('Remember me')" />

            <!-- Submit Button -->
            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full bg-blue-600">
                    {{ __('Log in') }}
                </flux:button>
            </div>

            <!-- Akun belum terverifikasi -->
            @if (session('akun_belum_terverifikasi'))
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 4000)" 
                    x-show="show"
                    x-transition
                    class="fixed top-5 right-5 z-50 bg-red-500 text-white px-4 py-2 rounded shadow-lg"
                >
                    {{ session('akun_belum_terverifikasi') }}
                </div>
            @endif
        </form>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center text-sm text-zinc-600 dark:text-zinc-400 space-x-1 rtl:space-x-reverse hover:text-blue-800">
                {{ __("Don't have an account?") }}
                <flux:link :href="route('register')" wire:navigate>
                    {{ __('Sign up') }}
                </flux:link>
            </div>
        @endif
    </div>
