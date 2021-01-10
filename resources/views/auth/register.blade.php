



<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('姓名') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="" value="{{ __('性別') }}" />
            </div>

            <div style="display: flex; justify-content: flex-start;" class="mt-4">
                <x-radio id="male" name="sex" value="男性" checked />
                <x-jet-label for="male" value="{{ __('男性') }}" />
                &emsp;&emsp;
                <x-radio id="female" name="sex" value="女性" />
                <x-jet-label for="female" value="{{ __('女性') }}" />
            </div>

            <div class="mt-4">
                <x-jet-input id="type" class="" type="hidden" name="type" value="0" />
            </div>

            <div class="mt-4">
                <x-jet-label for="birthday" value="{{ __('生日') }}" />
                <x-jet-input id="birthday" class="" type="date" name="birthday" max="$max" required />
            </div>

            <div>
                <x-jet-label for="id" value="{{ __('身分證字號') }}" />
                <x-jet-input id="idnum" class="block mt-1 w-full" type="text" name="idnum" :value="old('idnum')" required autofocus autocomplete="idnum" />
            </div>

            <div>
                <x-jet-label for="tel" value="{{ __('手機號碼') }}" />
                <x-jet-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus autocomplete="tel" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('密碼') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('確認密碼') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('已經註冊過了?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('註冊') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
