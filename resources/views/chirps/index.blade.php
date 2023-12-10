<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 style="font-size: 17px; font-weight:bold; margin:0px 0px 14px 0px;">
                        {{ __('Write your opinion about our web aplication') }} </h3>
                    <form method="POST" action="{{ route('chirps.store') }}">
                        @csrf
                        <textarea name="message" placeholder="{{ __('Write your message') }}" class="bg-transparent"
                            style="width:100%; resize:none; border-radius:8px;">{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')" />
                        <x-primary-button style="margin-top:6px;">{{ __('Send') }} </x-primary-button>
                    </form>
                </div>
            </div>
            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                @foreach ($chirps as $chirp)
                    <div class="p-6 flex space-x2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100" style="margin-right: 10px">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <div class="flex-1">
                            <div class="flex- justify-between items-center">
                                <div>
                                    <span class="text-gray-800 dark:text-gray-200">{{$chirp->user->name}} </span>
                                    <small
                                        class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $chirp->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $chirp->message }} </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

       

</x-app-layout>
