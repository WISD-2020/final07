<form method="POST" action="{{ route('doctors.announcements.store') }}">
    @method('POST')
    @csrf

    <div>
        <x-jet-label for="title" value="{{ __('標題') }}" />
        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" required />
    </div>

    <div class="mt-4">
        <x-jet-label for="content" value="{{ __('內容') }}" />
        <x-jet-input id="content" class="block mt-1 w-full" type="textarea" name="content" maxlength="500" required />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-jet-button class="ml-4">
            {{ __('新增') }}
        </x-jet-button>
    </div>
</form>
