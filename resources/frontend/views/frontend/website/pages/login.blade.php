<x-website::layouts.main class="space-y-2">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg space-y-6">
            <div class="text-center">
                <h1 class="text-2xl font-bold text-gray-800">{{ __('general.login') }}</h1>
            </div>

            <form wire:submit='login' class="space-y-4">
                @error('throttle')
                <div class="text-sm text-red-600 text-center">
                    {{ $message }}
                </div>
                @enderror

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        {{ __('general.email') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" wire:model="email" required
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-primary focus:outline-none" />
                    @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        {{ __('general.password') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password" wire:model="password" required
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-primary focus:outline-none" />
                    <div class="text-right">
                        <x-website::link :href="$resetPasswordUrl" class="text-sm text-primary hover:underline">
                            {{ __('general.forgot_password_question') }}
                        </x-website::link>
                    </div>
                    @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" wire:model='remember' class="h-5 w-5 border-gray-300 rounded" />
                    <label class="text-sm text-gray-700">{{ __('general.remember_me') }}</label>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-primary-dark transition disabled:opacity-50"
                        wire:loading.attr="disabled">
                        <span class="loading loading-spinner loading-xs" wire:loading></span>
                        {{ __('general.login') }}
                    </button>
                </div>

                @if($registerUrl)
                <div class="text-center">
                    <p class="text-sm text-gray-500">
                        {{ __('general.no_account') }}
                        <x-website::link :href="$registerUrl" class="text-primary hover:underline">
                            {{ __('general.register') }}
                        </x-website::link>
                    </p>
                </div>
                @endif
            </form>
        </div>
    </div>
</x-website::layouts.main>