<x-website::layouts.main>
    {{-- <div class="space-y-8">
        <x-scheduledConference::alert-scheduled-conference :scheduled-conference="$currentScheduledConference" />
        @if
        ($currentScheduledConference->hasMedia('cover')||$currentScheduledConference->getMeta('about')||$currentScheduledConference->getMeta('additional_content'))

        @endif
        @if ($currentScheduledConference?->speakers->isNotEmpty())
        <section id="speakers" class="flex flex-col gap-y-0">
            <x-website::heading-title title="Speakers" class="mb-5" />
            <div class="cf-speakers space-y-6">
                @foreach ($currentScheduledConference->speakerRoles as $role)
                @if ($role->speakers->isNotEmpty())
                <div class="space-y-4">
                    <h3 class="text-lg">{{ $role->name }}</h3>
                    <div class="cf-speaker-list grid gap-2 sm:grid-cols-2">
                        @foreach ($role->speakers as $speaker)
                        <div class="cf-speaker flex items-center h-full gap-2">
                            <img class="cf-speaker-img object-cover w-16 h-16 rounded-full aspect-square"
                                src="{{ $speaker->getFilamentAvatarUrl() }}" alt="{{ $speaker->fullName }}" />
                            <div class="cf-speaker-information space-y-1">
                                <div class="cf-speaker-name text-gray-900">
                                    {{ $speaker->fullName }}
                                </div>
                                @if ($speaker->getMeta('affiliation'))
                                <div class="cf-speaker-affiliation text-xs text-gray-700">
                                    {{ $speaker->getMeta('affiliation') }}</div>
                                @endif
                                @if($speaker->getMeta('scopus_url') || $speaker->getMeta('google_scholar_url') ||
                                $speaker->getMeta('orcid_url'))
                                <div class="cf-committee-scholar flex flex-wrap items-center gap-1">
                                    @if($speaker->getMeta('orcid_url'))
                                    <a href="{{ $speaker->getMeta('orcid_url') }}" target="_blank">
                                        <x-academicon-orcid class="orcid-logo" />
                                    </a>
                                    @endif
                                    @if($speaker->getMeta('google_scholar_url'))
                                    <a href="{{ $speaker->getMeta('google_scholar_url') }}" target="_blank">
                                        <x-academicon-google-scholar class="google-scholar-logo" />
                                    </a>
                                    @endif
                                    @if($speaker->getMeta('scopus_url'))
                                    <a href="{{ $speaker->getMeta('scopus_url') }}" target="_blank">
                                        <x-academicon-scopus class="scopus-logo" />
                                    </a>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section>
        @endif

        @if($sponsorLevels->isNotEmpty() || $sponsorsWithoutLevel->isNotEmpty())
        <section class="sponsors">
            <x-website::heading-title title="Sponsors" class="mb-5" />
            <div class="conference-sponsor-levels space-y-6">
                @if($sponsorsWithoutLevel->isNotEmpty())
                <div class="conference-sponsor-level">
                    <div class="conference-sponsors flex flex-wrap items-center gap-4">
                        @foreach($sponsorsWithoutLevel as $sponsor)
                        @if(!$sponsor->getFirstMedia('logo'))
                        @continue
                        @endif
                        <x-scheduledConference::conference-sponsor :sponsor="$sponsor" />
                        @endforeach
                    </div>
                </div>
                @endif
                @foreach ($sponsorLevels as $sponsorLevel)
                <div class="conference-sponsor-level">
                    <h3 class="text-lg mb-4">{{ $sponsorLevel->name }}</h3>
                    <div class="conference-sponsors flex flex-wrap items-center gap-4">
                        @foreach($sponsorLevel->stakeholders as $sponsor)
                        @if(!$sponsor->getFirstMedia('logo'))
                        @continue
                        @endif
                        <x-scheduledConference::conference-sponsor :sponsor="$sponsor" />
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
        @if($partners->isNotEmpty())
        <section class="partners">
            <x-website::heading-title title="Partners" class="mb-5" />
            <div class="conference-partners flex flex-wrap items-center gap-4">
                @foreach($partners as $partner)
                @if(!$partner->getFirstMedia('logo'))
                @continue
                @endif
                <x-scheduledConference::conference-partner :partner="$partner" />
                @endforeach
            </div>
        </section>
        @endif
    </div>
    --}}


    <section class="bg-blue-900 text-white py-10 min-h-screen flex flex-col justify-center relative" 
    @if ($currentScheduledConference->hasMedia('template-header'))
        style="background-image: url('{{
        $currentScheduledConference->getFirstMedia('template-header')->getAvailableUrl(['thumb', 'thumb-xl']) }}');
        background-size: cover; background-position: center;"
        @endif>

        @php
        $layouts = App\Facades\Plugin::getPlugin('TemplateTheme')->getSetting('layouts');
        @endphp

        <div class="prose max-w-none w-full text-center">
            @if (!empty($layouts) && isset($layouts[0]))
            <div class="layout-section">
                {{ new Illuminate\Support\HtmlString($layouts[0]['data']['about']) }}
            </div>
            @endif
        </div>

        <div class="w-full flex flex-col items-center justify-center text-center">
            <h1 class="font-bold text-white text-2xl lg:text-6xl xl:text-7xl mb-2">
                {{ $currentScheduledConference->title }}
            </h1>

            @if($currentScheduledConference->date_start || $currentScheduledConference->date_end)
            <div class="flex items-center justify-center">
                <span class="font-semibold text-white">
                    @if($currentScheduledConference->date_start)
                    {{ $currentScheduledConference->date_start->format(Setting::get('format_date')) }}
                    @endif
                    @if($currentScheduledConference->date_end)
                    - {{ $currentScheduledConference->date_end->format(Setting::get('format_date')) }}
                    @endif
                </span>
            </div>
            @endif
        </div>

        <div class="header-buttons flex justify-center mt-8">
            @if($theme->getSetting('header_buttons'))
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @foreach($theme->getSetting('header_buttons') ?? [] as $button)
                <a @style([ 'background-color: ' . data_get($button, 'background_color' )=> data_get($button,
                    'background_color'),
                    'color: ' . data_get($button, 'text_color') => data_get($button, 'text_color'),
                    ])
                    href="{{ data_get($button, 'url') }}"
                    class="inline-block px-8 py-3 text-center font-medium rounded-lg shadow-md transition-all
                    duration-300 transform hover:scale-105 hover:shadow-lg"
                    >
                    {{ data_get($button, 'text') }}
                </a>
                @endforeach
            </div>
            @endif
        </div>

    </section>

    <section class="prose prose-li: max-w-none w-full">
        @if (!empty($layouts) && isset($layouts[1], $layouts[2]))
        <div class="layout-section">
            {{ new Illuminate\Support\HtmlString($layouts[1]['data']['about']) }}
        </div>
        <div class="layout-section">
            {{ new Illuminate\Support\HtmlString($layouts[2]['data']['about']) }}
        </div>
        @endif
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-bold text-center text-gray-900 mb-2">
                Some of our Speakers
            </h2>
            <p class="text-xl text-center text-red-600 mb-8 italic">
                “Get inspired from the world's leading experts”
            </p>
            @if ($currentScheduledConference?->speakers->isNotEmpty())
            <div class="overflow-x-auto whitespace-nowrap px-4">
                <div class="flex sm:flex-row flex-col gap-6">
                    @foreach ($currentScheduledConference->speakerRoles as $role)
                    @if ($role->speakers->isNotEmpty())
                    <div class="w-full sm:w-64 shrink-0">
                        <!-- <h3 class="text-xl font-semibold text-red-900 mb-4 text-center">
                                    {{ $role->name }}
                                </h3> -->
                        <div class="flex flex-col sm:flex-nowrap sm:flex-row gap-6">
                            @foreach ($role->speakers as $speaker)
                            <div class="bg-gray-200 shadow-lg rounded-lg p-4 text-center w-full sm:w-64 shrink-0">
                                <img class="cf-speaker-img object-cover w-32 h-32 sm:w-40 sm:h-32 mx-auto mb-4 rounded-lg"
                                    src="{{ $speaker->getFilamentAvatarUrl() }}" alt="{{ $speaker->fullName }}">
                                <h4 class="text-xl font-semibold text-red-900">
                                    {{ $speaker->fullName }}
                                </h4>
                                @if ($speaker->getMeta('affiliation'))
                                <p class="text-gray-500 truncate max-w-full text-base lg:text-lg">
                                    {{ $speaker->getMeta('affiliation') }}
                                </p>
                                @endif
                                @if($speaker->getMeta('scopus_url') || $speaker->getMeta('google_scholar_url') ||
                                $speaker->getMeta('orcid_url'))
                                <div class="cf-committee-scholar flex items-center justify-center gap-2 mt-2">
                                    @if($speaker->getMeta('orcid_url'))
                                    <a href="{{ $speaker->getMeta('orcid_url') }}" target="_blank">
                                        <x-academicon-orcid class="orcid-logo" />
                                    </a>
                                    @endif
                                    @if($speaker->getMeta('google_scholar_url'))
                                    <a href="{{ $speaker->getMeta('google_scholar_url') }}" target="_blank">
                                        <x-academicon-google-scholar class="google-scholar-logo" />
                                    </a>
                                    @endif
                                    @if($speaker->getMeta('scopus_url'))
                                    <a href="{{ $speaker->getMeta('scopus_url') }}" target="_blank">
                                        <x-academicon-scopus class="scopus-logo" />
                                    </a>
                                    @endif
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <section class="prose prose-li: max-w-none w-full">
        @if (!empty($layouts) && isset($layouts[3], $layouts[4]))
        <div class="layout-section">
            {{ new Illuminate\Support\HtmlString($layouts[3]['data']['about']) }}
        </div>
        <div class="layout-section">
            {{ new Illuminate\Support\HtmlString($layouts[4]['data']['about']) }}
        </div>
        @endif
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-bold text-center text-black mb-8">
                Sponsors & Exhibitors are Welcome
            </h2>
            <div class="relative flex items-center justify-center">
                <button class="absolute left-0 bg-white p-3" id="scrollLeftButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <div id="gridContainer"
                    class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar w-[80%] px-16 justify-center">
                    @if($sponsorLevels->isNotEmpty() || $sponsorsWithoutLevel->isNotEmpty())
                    @if($sponsorsWithoutLevel->isNotEmpty())
                    <div class="conference-sponsor-level">
                        <div class="conference-sponsors flex flex-nowrap items-center gap-6">
                            @foreach($sponsorsWithoutLevel as $sponsor)
                            @if(!$sponsor->getFirstMedia('logo')) @continue @endif
                            <div
                                class="min-w-[160px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold bg-gray-200">
                                <img src="{{ $sponsor->getFirstMediaUrl('logo') }}" alt="Logo"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @foreach ($sponsorLevels as $sponsorLevel)
                    <div class="conference-sponsor-level">
                        <h3 class="text-lg mb-4 text-center">{{ $sponsorLevel->name }}</h3>
                        <div class="conference-sponsors flex flex-nowrap items-center gap-6 justify-center">
                            @foreach($sponsorLevel->stakeholders as $sponsor)
                            @if(!$sponsor->getFirstMedia('logo')) @continue @endif
                            <div
                                class="min-w-[160px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold bg-gray-200">
                                <img src="{{ $sponsor->getFirstMediaUrl('logo') }}" alt="Logo"
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <button class="absolute right-0 bg-white p-3" id="scrollRightButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>

        <script>
            const container = document.getElementById('gridContainer');
            const scrollLeftButton = document.getElementById('scrollLeftButton');
            const scrollRightButton = document.getElementById('scrollRightButton');

            scrollLeftButton.addEventListener('click', () => {
                container.scrollBy({ left: -600, behavior: 'smooth' });
            });

            scrollRightButton.addEventListener('click', () => {
                container.scrollBy({ left: 600, behavior: 'smooth' });
            });
        </script>
    </section>

    <section class="prose max-w-none w-full text-center">
        @if (!empty($layouts) && isset($layouts[5]))
        <div class="layout-section">
            {{ new Illuminate\Support\HtmlString($layouts[5]['data']['about']) }}
        </div>
        @endif
    </section>

    <section class="prose max-w-none w-full text-center">
        @if (!empty($layouts) && count($layouts) > 6)
        @foreach (array_slice($layouts, 6) as $layout)
        @if (isset($layout['data']['about']))
        <div class="layout-section">
            {{ new Illuminate\Support\HtmlString($layout['data']['about']) }}
        </div>
        @endif
        @endforeach
        @endif
    </section>

</x-website::layouts.main>