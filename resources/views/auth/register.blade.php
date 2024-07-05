<x-guest-layout>
    <!-- 以下を追加 -->
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- 年齢の項目を追加 -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('年齢')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required min="0" max="120" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>
        <!-- 性別と産前産後の項目を追加 -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('性別')" />
            <div class="mt-1">
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="male" class="form-radio h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700">男性</span>
                </label>
                <label class="inline-flex items-center ml-4">
                   <input type="radio" name="gender" value="female" class="form-radio h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700">女性</span>
                </label>
            </div>
        </div>
        
        <div class="mt-4">
            <x-input-label for="pregnancy_status" :value="__('産前産後の方は以下にチェックをつけてください。')" />
            <div class="mt-1">
                <label class="inline-flex items-center">
                    <input type="hidden" name="pregnancy_status" value="0">
                    <input type="checkbox" name="pregnancy_status" class="form-checkbox h-5 w-5 text-blue-600" value="pregnancy_or_postpartum">
                    <span class="ml-2 text-gray-700">妊娠中または産後1年以内である</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
