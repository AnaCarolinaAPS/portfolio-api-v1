<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profiles') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Create and delete your profiles.") }}
        </p>
    </header>

    <div class="flex items-center gap-4 mt-6">
        <span>{{ $user->defaultLocale->code }}</span>
        <x-secondary-button disabled>{{ __('Delete') }}</x-secondary-button>
    </div>

    {{-- Print the users created Profiles first --}}
    @foreach ($user->profiles as $profile)
        @if ($profile->locale->id != $user->locale_default)
            <form method="POST" action="{{ route('profiles.update', ['profile' => $profile->id]) }}" class="mt-6">
                @csrf
                @method('PUT')
                <div class="flex items-center gap-4">
                    <span>{{ $profile->locale->code }}</span>
                    @if ($profile->is_active)
                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                    @else
                        <x-primary-button>{{ __('Create') }}</x-primary-button>
                    @endif
                </div>
            </form>
        @endif
    @endforeach

    {{-- Then print the other languages in the system --}}
    @foreach ($locales as $locale)
        <form method="POST" action="{{ route('profiles.store') }}" class="mt-6">
            @csrf
            <div class="flex items-center gap-4">
                <input type="hidden" value={{ $locale->id }} name="locale_id">
                <span>{{ $locale->code }}</span>
                <x-primary-button>{{ __('Create') }}</x-primary-button>
            </div>
        </form>
    @endforeach
</section>
