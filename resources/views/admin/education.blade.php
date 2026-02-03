<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Educations') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('All your educations in ').Auth::user()->currentProfile()?->locale->code.__(' Profile') }}
        </p>
    </x-slot>

    <div class="py-12">
        @if(Auth::user()->educations->isNotEmpty())
            @foreach (Auth::user()->educations as $education)
                <div class="py-2">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <form method="POST" action="{{ route('educations.update', ['education' => $education->id]) }}" class="p-6">
                                @csrf
                                @method('PUT')
                                <div class="gap-4">
                                    <div>
                                        <x-input-label for="degree" :value="__('Degree')" />
                                        <x-text-input id="degree" name="degree" type="text" value="{{ $education->translate(Auth::user()->currentProfile()?->locale->code) ? $education->translate(Auth::user()->currentProfile()?->locale->code)->degree : ''; }}" class="mt-1 block w-full" />
                                    </div>

                                    <div>
                                        <x-input-label for="institution" :value="__('Institution')" />
                                        <x-text-input id="institution" name="institution" type="text" value="{{ $education->translate(Auth::user()->currentProfile()?->locale->code) ? $education->translate(Auth::user()->currentProfile()?->locale->code)->institution : '' }}" class="mt-1 block w-full" />
                                    </div>
                                </div>

                                <div class="">
                                    <div>
                                        <x-input-label for="start_date" :value="__('Start Date')" />
                                        <x-text-input id="start_date" name="start_date" type="date" value="{{ $education->start_date }}" class="mt-1 block w-full" />
                                    </div>

                                    <div>
                                        <x-input-label for="end_date" :value="__('End Date')" />
                                        <x-text-input id="end_date" name="end_date" type="date" value="{{ $education->end_date }}" class="mt-1 block w-full" />
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="observation" :value="__('Notes')" />
                                    <x-text-area id="observation" name="observation" rows="3" class="mt-1 block w-full">{{ $education->translate(Auth::user()->currentProfile()?->locale->code) ? $education->translate(Auth::user()->currentProfile()?->locale->code)->observation : '' }}</x-text-area>
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="flex items-center gap-4">
                        <x-primary-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'add-education')"
                            >{{ __('New Education') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="add-education" focusable>
        <form method="POST" action="{{ route('educations.store') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add a new Education') }}
            </h2>

            <div class="mt-6">
                <div>
                    <x-input-label for="degree" :value="__('Degree')" />
                    <x-text-input id="degree" name="degree" type="text" value="" class="mt-1 block w-full" />
                </div>

                <div>
                    <x-input-label for="institution" :value="__('Institution')" />
                    <x-text-input id="institution" name="institution" type="text" value="" class="mt-1 block w-full" />
                </div>

                <div>
                    <x-input-label for="start_date" :value="__('Start Date')" />
                    <x-text-input id="start_date" name="start_date" type="date" value="" class="mt-1 block w-full" />
                </div>

                <div>
                    <x-input-label for="end_date" :value="__('End Date')" />
                    <x-text-input id="end_date" name="end_date" type="date" value="" class="mt-1 block w-full" />
                </div>

                <div>
                    <x-input-label for="observation" :value="__('Observation')" />
                    <x-text-area id="observation" name="observation" rows="3" class="mt-1 block w-full"></x-text-area>
                </div>

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
