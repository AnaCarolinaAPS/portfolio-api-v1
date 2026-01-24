<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informations') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('All personal information your ').$information->profile->locale->code.__(' Profile') }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ route('informations.update', ['information' => $information->id]) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div>
                        <x-input-label for="headline" :value="__('Headline')" />
                        <x-text-input id="headline" name="headline" type="text" value="{{$information->headline}}" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" value="{{$information->title}}" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="summary" :value="__('Summary')" />
                        <x-text-area id="summary" name="summary" rows="3" class="mt-1 block w-full">{{ $information->summary }}</x-text-area>
                    </div>

                    <div>
                        <x-input-label for="about_me" :value="__('About Me')" />
                        <x-text-area id="about_me" name="about_me" rows="8" class="mt-1 block w-full">{{$information->about_me}}</x-text-area>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
