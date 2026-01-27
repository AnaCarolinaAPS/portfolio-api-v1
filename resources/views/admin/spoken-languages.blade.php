<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Languages') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Add all the languages you have familiarity and their respectives levels ') }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                {{-- Then print the other languages in the system --}}
                @foreach (Auth::user()->languages as $spoken)
                    <div class="flex items-center gap-3">
                        <form method="POST" action="{{ route('spokenLanguages.update', ['spokenLanguage' => $spoken->id]) }}">
                            @csrf
                            @method('put')
                                <input type="hidden" value={{ $spoken->language->id }} name="language_id">
                                <span style="margin: 1rem">{{ $spoken->language->translate(Auth::user()->currentProfile()?->locale->code) }}</span>
                                <select name="level_id" class="ml-3">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->language_level_id }}" @selected($spoken->level_id == $level->language_level_id)>
                                            {{ $level->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-primary-button class="ml-3" style="margin: 1rem">{{ __('Save') }}</x-primary-button>
                        </form>
                        <form method="POST" action="{{ route('spokenLanguages.destroy', ['spokenLanguage' => $spoken->id]) }}">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>{{ __('Delete') }}</x-danger-button>
                        </form>
                    </div>
                @endforeach

                @if (count(Auth::user()->languages) == 0)
                    <div class="flex items-center gap-4">
                        {{ __('Add your first language') }}
                    </div>
                @endif

                @if (count($languages) > 0)
                    <div class="flex items-center gap-4 mt-2">
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'add-user-language')"
                        >{{ __('Add') }}</x-primary-button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-modal name="add-user-language" focusable>
        <form method="POST" action="{{ route('spokenLanguages.store') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add a new Language') }}
            </h2>

            <div class="mt-6">
                {{-- Then print the other languages in the system --}}
                <select name="language_id" class="mt-1" style="margin: 1rem">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}">
                            {{ $language->translate(Auth::user()->currentProfile()?->locale->code) }}
                        </option>
                    @endforeach
                </select>

                {{-- Then print the all the levels in the system --}}
                <select name="level_id" class= "mt-1">
                    @foreach ($levels as $level)
                        <option value="{{ $level->language_level_id }}">
                            {{ $level->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Add') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
