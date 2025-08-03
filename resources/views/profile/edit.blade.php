<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <!-- Avatar hiện tại -->
    @if (Auth::user()->avatar)
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Ảnh đại diện hiện tại
            </label>
            <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full mt-2">
        </div>
    @endif

    <!-- Upload avatar mới -->
    <div>
        <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Ảnh đại diện mới
        </label>
        <input id="avatar" name="avatar" type="file" accept="image/*"
            class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300 file:bg-blue-100 file:border file:border-gray-300 file:rounded file:px-3 file:py-1">
        @error('avatar')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Các trường profile cũ -->
    <!-- Ví dụ: name, email, ... -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <!-- ... (email và các trường khác) -->

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Lưu thay đổi') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >Đã cập nhật!</p>
        @endif
    </div>
</form>
