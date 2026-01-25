<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Generate API Key') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your api consumers have the new key.') }}
        </p>
    </header>

    <form method="post" action="{{ route('apikey.generate') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex items-center gap-4">
            <x-primary-button
                onclick="return confirm('This will invalidate the current API key. Continue?')"
            >
                {{ __('Generate New Key') }}
            </x-primary-button>

            @if (session('status') === 'api-key-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    {{-- x-init="setTimeout(() => show = false, 2000)" --}}
                    class="text-sm text-gray-600"
                >{{ session('plain-key') }}</p>
            @endif
        </div>
    </form>
</section>
