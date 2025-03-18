<!-- <x-website::layouts.main>
    <div class="space-y-8">
        <x-scheduledConference::alert-scheduled-conference :scheduled-conference="$currentScheduledConference" />
        @if ($currentScheduledConference->hasMedia('cover')||$currentScheduledConference->getMeta('about')||$currentScheduledConference->getMeta('additional_content'))
            <section id="highlight" class="space-y-4">
                <div class="flex flex-col sm:flex-row flex-wrap space-y-4 sm:space-y-0 gap-4">
                    <div class="flex flex-col gap-4 flex-1">
                        @if ($currentScheduledConference->hasMedia('cover'))
                            <div class="cf-cover">
                                <img class="h-full"
                                    src="{{ $currentScheduledConference->getFirstMedia('cover')->getAvailableUrl(['thumb', 'thumb-xl']) }}"
                                    alt="{{ $currentScheduledConference->title }}" />
                            </div>
                        @endif
                        @if ($currentScheduledConference->getMeta('about'))
                            <div class="user-content">
                                {{ new Illuminate\Support\HtmlString($currentScheduledConference->getMeta('about')) }}
                            </div>
                        @endif
                        @if ($currentScheduledConference->getMeta('additional_content'))
                            <div class="user-content">
                                {{ new Illuminate\Support\HtmlString($currentScheduledConference->getMeta('additional_content')) }}
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
        @if ($currentScheduledConference?->speakers->isNotEmpty())
            <section id="speakers" class="flex flex-col gap-y-0">
                <x-website::heading-title title="Speakers" class="mb-5"/>
                <div class="cf-speakers space-y-6">
                    @foreach ($currentScheduledConference->speakerRoles as $role)
                        @if ($role->speakers->isNotEmpty())
                            <div class="space-y-4">
                                <h3 class="text-lg">{{ $role->name }}</h3>
                                <div class="cf-speaker-list grid gap-2 sm:grid-cols-2">
                                    @foreach ($role->speakers as $speaker)
                                        <div class="cf-speaker flex items-center h-full gap-2">
                                            <img class="cf-speaker-img object-cover w-16 h-16 rounded-full aspect-square"
                                                src="{{ $speaker->getFilamentAvatarUrl() }}"
                                                alt="{{ $speaker->fullName }}" />
                                            <div class="cf-speaker-information space-y-1">
                                                <div class="cf-speaker-name text-gray-900">
                                                    {{ $speaker->fullName }}
                                                </div>
                                                @if ($speaker->getMeta('affiliation'))
                                                    <div class="cf-speaker-affiliation text-xs text-gray-700">
                                                        {{ $speaker->getMeta('affiliation') }}</div>
                                                @endif
                                                @if($speaker->getMeta('scopus_url') || $speaker->getMeta('google_scholar_url') || $speaker->getMeta('orcid_url'))
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
                <x-website::heading-title title="Sponsors" class="mb-5"/>
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
                <x-website::heading-title title="Partners" class="mb-5"/>
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
</x-website::layouts.main> -->

<x-website::layouts.main>
    {{-- <div class="space-y-8">
        <x-scheduledConference::alert-scheduled-conference :scheduled-conference="$currentScheduledConference" />
        @if ($currentScheduledConference->hasMedia('cover')||$currentScheduledConference->getMeta('about')||$currentScheduledConference->getMeta('additional_content'))
          
        @endif
        @if ($currentScheduledConference?->speakers->isNotEmpty())
            <section id="speakers" class="flex flex-col gap-y-0">
                <x-website::heading-title title="Speakers" class="mb-5"/>
                <div class="cf-speakers space-y-6">
                    @foreach ($currentScheduledConference->speakerRoles as $role)
                        @if ($role->speakers->isNotEmpty())
                            <div class="space-y-4">
                                <h3 class="text-lg">{{ $role->name }}</h3>
                                <div class="cf-speaker-list grid gap-2 sm:grid-cols-2">
                                    @foreach ($role->speakers as $speaker)
                                        <div class="cf-speaker flex items-center h-full gap-2">
                                            <img class="cf-speaker-img object-cover w-16 h-16 rounded-full aspect-square"
                                                src="{{ $speaker->getFilamentAvatarUrl() }}"
                                                alt="{{ $speaker->fullName }}" />
                                            <div class="cf-speaker-information space-y-1">
                                                <div class="cf-speaker-name text-gray-900">
                                                    {{ $speaker->fullName }}
                                                </div>
                                                @if ($speaker->getMeta('affiliation'))
                                                    <div class="cf-speaker-affiliation text-xs text-gray-700">
                                                        {{ $speaker->getMeta('affiliation') }}</div>
                                                @endif
                                                @if($speaker->getMeta('scopus_url') || $speaker->getMeta('google_scholar_url') || $speaker->getMeta('orcid_url'))
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
                <x-website::heading-title title="Sponsors" class="mb-5"/>
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
                <x-website::heading-title title="Partners" class="mb-5"/>
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

<section class="bg-blue-900 text-white py-10 min-h-screen flex items-center justify-center relative"
    style="background-image: url('{{ asset('eropa.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black opacity-50 z-0"></div>
    <div class="relative text-center text-white z-10 px-4">
        <h1 class="text-4xl md:text-4xl lg:text-6xl font-bold mb-4 leading-tight">
            4th Annual<br>
        </h1>
        <p class="text-xl md:text-4xl mb-6">
            Banking <br>
        </p>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">
            CREDIT RISK SUMMIT<br>
        </h1>
        <p class="text-xl md:text-2xl mb-6">
            18th - 19th of February 2025, Prague <br>
        </p>
        <p class="text-lg font-bold mb-6 text-yellow-300">
            (Time Zone: CEST) <br>
        </p>
        <p class="text-2xl font-bold mb-8">
            Join us in-person or online
        </p>
        <a href="#"
        class="inline-block px-11 py-2 backdrop-blur-sm bg-white/30 text-stone-100 text-lg font-medium rounded-md border-2 border-stone-400 shadow-md">
        <span class="inline-block transition-all duration-300 transform hover:translate-x-2">
            Download Brochure <span class="ml-2">&#8595;</span>
        </span>
    </a>
    </div>
</section>
                               
<section class="bg-blue-900 text-white py-5 flex items-center justify-center">
    <h2 class="text-3xl font-semibold text-center mb-4 mt-4">2 DAYS CONFERENCE</h2>
</section>

<section class="flex flex-wrap items-center justify-center min-h-[80vh] bg-white px-8">
    <div class="w-full lg:w-1/3 flex items-center justify-center mb-8 lg:mb-0">
        <div class="relative">
            <img src="{{ asset('buku.webp') }}" alt="Event Photo"
                class="rounded-lg shadow-lg transform rotate-[-10deg] scale-50 relative z-10">
            <img src="{{ asset('buku.webp') }}" alt="Event Photo"
                class="rounded-lg shadow-lg transform rotate-[10deg] scale-50 absolute top-10 right-10">
        </div>
    </div>
    <div class="w-full lg:w-1/3 text-center lg:text-left">
        <h1 class="text-4xl lg:text-5xl font-bold text-gray-800  mb-4">
            The Event!
        </h1>
        <p class="text-lg text-red-500 font-bold mb-6">
            Do not miss! <span class="text-black">Event will start in:</span>
        </p>
        <div class="flex justify-center lg:justify-start text-gray-800 font-bold text-3xl mb-6 space-x-4">
            <div class="text-center">
                <p>28</p>
                <p class="text-sm ">Days</p>
            </div>
            <div class="text-center">
                <p>09</p>
                <p class="text-sm ">Hours</p>
            </div>
            <div class="text-center">
                <p>53</p>
                <p class="text-sm">Minutes</p>
            </div>
            <div class="text-center">
                <p>05</p>
                <p class="text-sm ">Seconds</p>
            </div>
        </div>
        <p class="text-lg mb-6">
            After a great success of our previous event, we are now getting ready to welcome the most renowned speakers from the top financial sector to discuss the latest trends and challenges that the banking industry is facing at the moment.
        </p>
        <p class="text-lg mb-6">
            At our <span class="font-bold">4th Annual Banking Credit Risk Summit</span>, you will have an opportunity to join us in-person or online. We strongly encourage you to join us physically as the event is fully equipped with networking opportunities over coffee breaks, cocktail receptions, lunches, etc., where you will have a possibility to meet and discuss with decision makers from the industry.
        </p>
        <p class="text-lg mb-6">
            Participants can explore a wide range of sessions including case studies, round-table discussions, panel discussions, workshops, Q&A sessions, etc.
        </p>
        <p class="text-lg mb-8">
            We will be looking forward to meeting you at our event!
        </p>
    </div>
</section>

<section class="flex flex-wrap items-center justify-center min-h-[50vh] bg-blue-900 px-11">
    <div class="w-full lg:w-1/3 flex items-center justify-center mb-8 lg:mb-0 relative">
        <div class="relative">
            <img src="{{ asset('buku.webp') }}" alt="Event Photo"
                class="rounded-lg shadow-lg transform rotate-[-10deg] scale-50 relative z-10 m-0 p-0">
            <img src="{{ asset('buku.webp') }}" alt="Event Photo"
                class="rounded-lg shadow-lg transform rotate-[10deg] scale-50 absolute top-10 right-10 z-20 m-0 p-0">
        </div>
    </div>

    <div class="w-full lg:w-2/3 text-center lg:text-left inline-block px-8 py-4 backdrop-blur-sm bg-white/30 text-stone-100 text-lg font-medium rounded-md border-2 border-stone-400 shadow-md m-0 p-0">
        <div class="text-center mb-8">
            <h1 class="text-4xl text-left text-white font-bold mb-4 glow-text drop-shadow-[0_0_10px_#ffffff]">
                Key Topics
            </h1>  
        </div> 
        <ul class="list-disc text-white text-lg pl-6 space-y-2">
            <li>Risk Management and Modelling Decisions Need Immediate Attention Concerning the Impaired Assets IFRS9 Norms of Accounting</li>
            <li>Dealing with Regulatory Requirements for Internal Ratings-Based (IRB) Models and International Financial Reporting Standard (IFRS9)</li>
            <li>Optimizing Credit Risk Management with Artificial Intelligence</li>
            <li>The Digitalisation of the Banking Credit Risk: How Does the Rise of Digital Payments Impact Credit Risk Management?</li>
            <li>Current Developments in Credit Policies of Regional Banks</li>
        </ul>
    </div>
</section>


<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center text-gray-900 mb-2">
            Some of our Speakers
        </h2>
        <p class="text-xl text-center text-red-600 mb-8 italic">
            “Get inspired from the world's leading experts”
        </p>        
        
        <div class="flex flex-wrap justify-between">
            <div class="bg-gray-200 shadow-lg rounded-lg p-4 text-center w-full sm:w-1/2 md:w-1/3 lg:w-1/6">
                <img src="{{ asset('foto org.webp') }}" alt="Andrea Cremonino" class="w-40 h-32 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold text-red-900">Andrea Cremonino</h3>
                <p class="text-gray-500">Head of Corporate Portfolio & Pricing Management Team</p>
                <img src="{{ asset('logo kotak.png') }}" alt="Intesa Sanpaolo" class="w-40 h-20 mx-auto mb-6 mt-10 rounded-lg object-cover">
                <button class="bg-blue-900 text-white py-2 px-4 rounded-lg mt-4 hover:bg-white hover:text-purple-500 hover:border-2 hover:border-purple-500 focus:outline-none w-full">
                    <i class="fas fa-eye mr-2"></i> Speaker's Topic
                </button>
            </div>
        
            <div class="bg-white shadow-lg rounded-lg p-4 text-center w-full sm:w-1/2 md:w-1/3 lg:w-1/6">
                <img src="{{ asset('foto org.webp') }}" alt="Edgar Prof. Dr. Löw" class="w-40 h-32 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold text-red-900">Edgar Prof. Dr. Löw</h3>
                <p class="text-gray-500">Member of Financial Instruments Working Group at European Financial Reporting Advisory Group</p>
                <img src="{{ asset('logo kotak.png') }}" alt="Intesa Sanpaolo" class="w-40 h-16 mx-auto mb-4 mt-4 rounded-lg object-cover">
                <button class="bg-blue-900 text-white py-2 px-4 rounded-lg mt-4 hover:bg-white hover:text-purple-500 hover:border-2 hover:border-purple-500 focus:outline-none w-full">
                    <i class="fas fa-eye mr-2"></i> Speaker's Topic
                </button>
            </div>
        
            <div class="bg-gray-200 shadow-lg rounded-lg p-4 text-center w-full sm:w-1/2 md:w-1/3 lg:w-1/6">
                <img src="{{ asset('foto org.webp') }}" alt="Sotiris MIGKOS" class="w-40 h-32 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold text-red-900">Sotiris MIGKOS</h3>
                <p class="text-gray-500">Head of Model Risk</p>
                <img src="{{ asset('logo kotak.png') }}" alt="Intesa Sanpaolo" class="w-40 h-16 mx-auto mb-14 mt-12 rounded-lg object-cover">
                <button class="bg-blue-900 text-white py-2 px-4 rounded-lg mt-4 hover:bg-white hover:text-purple-500 hover:border-2 hover:border-purple-500 focus:outline-none w-full">
                    <i class="fas fa-eye mr-2"></i> Speaker's Topic
                </button>
            </div>
        
            <div class="bg-white shadow-lg rounded-lg p-4 text-center w-full sm:w-1/2 md:w-1/3 lg:w-1/6">
                <img src="{{ asset('foto org.webp') }}" alt="Karlis DANEVICS" class="w-40 h-32 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold text-red-900">Karlis DANEVICS</h3>
                <p class="text-gray-500">Chief Risk Officer (CRO)</p>
                <img src="{{ asset('logo kotak.png') }}" alt="Intesa Sanpaolo" class="w-40 h-16 mx-auto mb-12 mt-12 rounded-lg object-cover">
                <button class="bg-blue-900 text-white py-2 px-4 rounded-lg mt-4 hover:bg-white hover:text-purple-500 hover:border-2 hover:border-purple-500 focus:outline-none w-full">
                    <i class="fas fa-eye mr-2"></i> Speaker's Topic
                </button>
            </div>
        
            <div class="bg-gray-200 shadow-lg rounded-lg p-4 text-center w-full sm:w-1/2 md:w-1/3 lg:w-1/6">
                <img src="{{ asset('foto org.webp') }}" alt="Rita GNUTTI" class="w-40 h-32 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold text-red-900">Rita GNUTTI</h3>
                <p class="text-gray-500">Executive Director Internal Validation and Controls, Group Chief Risk Officer area</p>
                <img src="{{ asset('logo kotak.png') }}" alt="Intesa Sanpaolo" class="w-40 h-16 mx-auto mb-12 mt-12 rounded-lg object-cover">
                <button class="bg-blue-900 text-white py-2 px-4 rounded-lg mt-4 hover:bg-white hover:text-purple-500 hover:border-2 hover:border-purple-500 focus:outline-none w-full">
                    <i class="fas fa-eye mr-2"></i> Speaker's Topic
                </button>
            </div>
        
            <div class="bg-white shadow-lg rounded-lg p-4 text-center w-full sm:w-1/2 md:w-1/3 lg:w-1/6">
                <img src="{{ asset('foto org.webp') }}" alt="Aymeric CHAUVE" class="w-40 h-32 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold text-red-900">Aymeric CHAUVE</h3>
                <p class="text-gray-500">Director - Financial Institutions Credit Risk Europe / UK | Counterparty Credit Specialist</p>
                <img src="{{ asset('logo kotak.png') }}" alt="Intesa Sanpaolo" class="w-40 h-16 mx-auto mb-8 mt-10 rounded-lg object-cover">
                <button class="bg-blue-900 text-white py-2 px-4 rounded-lg mt-4 hover:bg-white hover:text-purple-500 hover:border-2 hover:border-purple-500 focus:outline-none w-full">
                    <i class="fas fa-eye mr-2"></i> Speaker's Topic
                </button>
            </div>        
        </div>             
    </div>
    <div class="flex justify-center mt-3">
        <button class="border-2 border-blue-900 text-blue-900 bg-white py-3 px-8 rounded-lg mt-6 flex items-center gap-2 hover:bg-blue-900 hover:text-white focus:outline-none w-auto">
            <span>View speakers full list</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform rotate-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 7l-10 10m0-10h10v10" />
            </svg>
        </button>
    </div>
</section>


<section class="bg-blue-900 text-white py-10 min-h-screen flex items-center justify-center relative"
    style="background-image: url('{{ asset('khalayak.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-16 bg-black bg-opacity-40 backdrop-blur-sm z-0"></div>
    <div class="relative z-10 text-white max-w-4xl text-left">
        <h1 class="text-4xl font-bold mb-4">
            Who Should Attend
        </h1>
        <p class="mb-4">
            CROs, CEOs, CFOs, COOs, VPs, MDs, Global Heads, Directors, Department Heads, and International Managers from the Banking industry involved in:
        </p>
        <div class="grid grid-cols-3 gap-6 text-white text-sm ml-12 mt-12">
            <ul class=" list-disc space-y-2">
              <li>Credit Risk</li>
              <li>Credit Risk Analysis</li>
              <li>Credit Risk Control</li>
              <li>Credit Risk Models</li>
              <li>Credit Risk Review</li>
              <li>Credit Risk Systems</li>
              <li>Credit Analysis</li>
              <li>Credit Model Strategy</li>
              <li>Credit Officer</li>
              <li>Credit Research</li>
            </ul>
            <ul class="list-disc space-y-2">
              <li>Counterparty Credit</li>
              <li>Financial Counterparty Risk</li>
              <li>Financial Institution Risk</li>
              <li>Framework and Model</li>
              <li>Funds Transfer</li>
              <li>IFRS9 Regulations</li>
              <li>Model Risk</li>
              <li>Model Validation</li>
              <li>AIRB Modelling</li>
            </ul>
            <ul class="list-disc space-y-2">
              <li>Portfolio Models</li>
              <li>Portfolio Strategy</li>
              <li>Regulatory Strategy</li>
              <li>Risk Appetite</li>
              <li>Risk Cost Management</li>
              <li>Risk Methodology</li>
              <li>Risk Modelling</li>
              <li>Risk Validation</li>
              <li>Methodologies</li>
              <li>Stress Testing</li>
            </ul>
          </div>
          
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-center text-red-600 mb-4">
            SPEAKING OPPORTUNITIES!
        </h2>
        <p class="text-4xl  font-bold text-center text-gray-900 mb-3 ">
            ARE YOU INTERESTED TO SPEAK AT THIS EVENT?
        </p>  
        <div class="flex justify-center mt-3">
            <button class="border-2 border-blue-900 text-blue-900 bg-white py-3 px-8 rounded-lg mt-6 flex items-center gap-2 hover:bg-blue-900 hover:text-white focus:outline-none w-auto">
                <span>Reserve your Speaking Slot</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform rotate-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 7l-10 10m0-10h10v10" />
                </svg>
            </button>
        </div>
</section>

<section class="flex flex-wrap items-center justify-center min-h-[50vh] bg-blue-900 px-0">
    <div class="text-center mb-10">
        <h1 class="text-6xl text-white font-bold mb-12 glow-text drop-shadow-[0_0_10px_#ffffff]">
            Companies you will meet
        </h1>  
        <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="mx-auto mt-8">
    </div>
</section>

{{-- logo blm selesai --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center text-black mb-8">
            Sponsors & Exhibitors are Welcome
        </h2>
        <div class="flex items-center justify-between">
                <button 
                class=" text-gray-400 text-3xl font-bold  flex items-center justify-center"
                id="scrollLeftButton"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            <div id="gridContainer" class="flex gap-4 overflow-x-auto scroll-smooth no-scrollbar w-[80%]">
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="min-w-[100px] h-[100px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
            </div>                   
            <button 
            class="text-gray-400 text-3xl font-bold  flex items-center justify-center"
            id="scrollRightButton"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>
        </div>
        
        <script>
            const container = document.getElementById('gridContainer');
            const scrollLeftButton = document.getElementById('scrollLeftButton');
            const scrollRightButton = document.getElementById('scrollRightButton');
            scrollLeftButton.addEventListener('click', () => {
                container.scrollBy({
                    left: -600, 
                    behavior: 'smooth',
                });
            });
        
            scrollRightButton.addEventListener('click', () => {
                container.scrollBy({
                    left: 600,
                    behavior: 'smooth',
                });
            });
        </script>
        
    </div>
</section>

<section class="bg-blue-900 text-white py-10 flex items-center justify-center relative"
    style="background-image: url('{{ asset('khalayak2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-blue-500 bg-opacity-50 backdrop-blur-sm z-0"></div>
    <div class="relative z-10 flex justify-between items-center w-full max-w-4xl text-left">
        <div>
            <h1 class="text-4xl font-bold mb-4">
                Get 20% off Now!
            </h1>
            <p class="text-lg mb-4 font-bold">
                Share 3 of your Main Challenges
            </p>
        </div>
        <div>
            <a href="#"
                class="inline-block px-11 py-2 backdrop-blur-sm bg-white/30 text-stone-100 text-lg font-medium rounded-md border-2 border-gray-400 shadow-md">
                get 20% Off <span class="ml-2">&#8595;</span>
            </a>
        </div>
    </div>
</section>

<section class="flex flex-wrap items-center justify-center min-h-[80vh] bg-white px-8">
    <div class="w-full lg:w-1/3 flex items-center justify-center mb-8 lg:mb-0">
        <div class="relative">
            <img src="{{ asset('buku.webp') }}" alt="Sponsorship Opportunities"
                class="w-full h-[600px] rounded-lg shadow-lg object-cover">
        </div>
    </div>
    <div class="w-full lg:w-1/3 text-center ml-4 lg:text-left">
        <h1 class="text-4xl lg:text-5xl font-bold text-black mb-8">
            Sponsorship Opportunities
        </h1>
        <p class="text-lg text-black mb-6">
            If you are looking to build awareness of your brand or you would like to showcase your products or services
            to as many decision makers in Banking Credit Risk as possible, then the 
            <span class="font-bold">“4th Annual Banking Credit Risk Summit”</span> will meet and exceed your expectations.
        </p>
        <p class="text-lg text-black mb-6">
            <span class="font-bold">Marxo Smith</span> sponsorship opportunities are designed to fit your business needs, starting from pre-built
            packages to creating your own sponsorship packages, no matter how big or small your budget.
        </p>
        <p class="text-lg text-black mb-6">
            Download the program to see how you can get involved.
        </p>
        <div class="flex justify-start ml-12 mt-3">
            <button class="border-2 border-blue-900 text-blue-900 bg-white py-3 px-8 rounded-lg mt-6 flex items-center gap-2 hover:bg-blue-900 hover:text-white focus:outline-none w-auto">
                <span>Download the Sponsorship Package</span> <span class="ml-2">&#8595;</span>
            </button>
        </div>
    </div>
</section>

<section class="flex flex-wrap items-center justify-center min-h-[90vh] bg-blue-900 px-11">
    <div class="text-center mb-10">
        <h1 class="text-7xl text-white font-bold mb-12 glow-text drop-shadow-[0_0_10px_#ffffff]">
            PREVIOUS EVENT SPONSORS
        </h1> 
        <div class="w-full lg:w-2/4 text-center lg:text-left inline-block px-8 py-4 backdrop-blur-sm bg-white/30 text-stone-100 text-lg font-medium rounded-lg border-2 border-stone-400 shadow-md m-0 p-0">
            <div class="text-center mb-8">
                <h1 class="text-4xl text-left text-white font-bold mb-4 glow-text drop-shadow-[0_0_10px_#ffffff]">
                    LOXON
                </h1>
            </div>
            <div class="text-left text-sm text-white space-y-6">
                <p>
                    Loxon is a trusted business solutions provider with over two decades of experience in end-to-end credit
                    management solutions. Since 2000, we have been offering comprehensive, integrated lending, collection, and
                    risk management solutions specifically tailored to the financial services industry.
                </p>
                <p>
                    By seamlessly merging our extensive industry acumen with cutting-edge technology, we have established
                    ourselves as a leading player in the market. Our customer-centric approach is dedicated to providing a
                    reliable, competitive edge that unlocks maximum business potential.
                </p>
                <p>
                    Committed to staying at the forefront, we employ over 200 professionals, serving over 80 financial brands
                    worldwide, ensuring we deeply understand and meet the evolving needs of the global marketplace.
                </p>
                <p><a href="https://www.loxon.eu" target="_blank" class="text-white text-lg font-bold mt-4 hover:text-blue-500 no-underline">
                    www.loxon.eu</p>
                </a>
            </div>        
    </div>
</section>

<section class="py-20 bg-white">
                    <div class="max-w-7xl mx-auto px-6 relative">
                        <h2 class="text-6xl font-bold text-center text-black mb-12">
                            WHAT OUR ATTENDEES HAD TO SAY
                        </h2>
                        <div class="flex items-center justify-between">
                            <button class="text-blue-800 text-3xl font-bold flex items-center justify-center" id="scrollLeftButton1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <div id="gridContainer1" class="flex gap-4 overflow-x-auto scroll-smooth no-scrollbar w-[80%]">
                                <div class="min-w-[480px] h-[400px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="min-w-[480px] h-[400px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="min-w-[480px] h-[400px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="min-w-[480px] h-[400px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="min-w-[480px] h-[400px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="min-w-[480px] h-[400px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="min-w-[480px] h-[400px] rounded-lg shadow-md flex items-center justify-center text-white text-2xl font-bold">
                                    <img src="{{ asset('logo kotak.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                                </div>
                            </div>
                            <button class="text-blue-800 text-3xl font-bold flex items-center justify-center" id="scrollRightButton1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                        <div id="indicators1" class="flex justify-center mt-6 space-x-2">
                            <div class="indicator1 w-3 h-3 bg-gray-300 rounded-full"></div>
                            <div class="indicator1 w-3 h-3 bg-gray-300 rounded-full"></div>
                            <div class="indicator1 w-3 h-3 bg-gray-300 rounded-full"></div>
                            <div class="indicator1 w-3 h-3 bg-gray-300 rounded-full"></div>
                            <div class="indicator1 w-3 h-3 bg-gray-300 rounded-full"></div>
                        </div>
                        
                        <script>
                            const container1 = document.getElementById('gridContainer1');
                            const scrollLeftButton1 = document.getElementById('scrollLeftButton1');
                            const scrollRightButton1 = document.getElementById('scrollRightButton1');
                            const indicators1 = document.querySelectorAll('.indicator1');
                            const itemWidth1 = 480 + 16; 
                            const totalItems1 = 5; 
                        
                            function updateIndicators1() {
                                const scrollPosition1 = container1.scrollLeft;
                                const activeIndex1 = Math.floor(scrollPosition1 / itemWidth1);
                        
                                indicators1.forEach((indicator1, index1) => {
                                    if (index1 === activeIndex1) {
                                        indicator1.classList.add('bg-blue-500');
                                        indicator1.classList.remove('bg-gray-300');
                                    } else {
                                        indicator1.classList.remove('bg-blue-500');
                                        indicator1.classList.add('bg-gray-300');
                                    }
                                });
                            }
                        
                            scrollLeftButton1.addEventListener('click', () => {
                                container1.scrollBy({
                                    left: -itemWidth1,
                                    behavior: 'smooth',
                                });
                            });
                        
                            scrollRightButton1.addEventListener('click', () => {
                                container1.scrollBy({
                                    left: itemWidth1,
                                    behavior: 'smooth',
                                });
                            });
                        
                            container1.addEventListener('scroll', updateIndicators1);

                            updateIndicators1(); 
                        </script>
                    
        <div class="flex justify-center mt-12">
            <button class="border-2 border-blue-900 text-blue-900 bg-white py-3 px-8 rounded-lg mt-6 flex items-center gap-2 hover:bg-blue-900 hover:text-white focus:outline-none w-auto">
                <span>View More Testimonials & Feedback</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform rotate-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 7l-10 10m0-10h10v10" />
                </svg>
            </button>
        </div>
</section>

<section class="py-5 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto px-6 relative">
            <h2 class="text-5xl font-bold text-center text-black mb-5">
                Request The Event Brochure!
            </h2>
        <div class="flex items-center justify-between bg-white p-6 ">
            <div class="w-1/2">
                <img src="{{ asset('buku.webp') }}" alt="Event Image" class="w-full h-auto rounded-lg shadow-md" />
            </div>
            <div class="w-1/2 pl-12 mt-8">
                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="title" class="block text-x2l  font-bold mb-2 text-gray-700">Title</label>
                        <select id="title" name="title" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="mr">Mr.</option>
                            <option value="ms">Ms.</option>
                            <option value="dr">Dr.</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="firstName" class="block text-x2l font-bold mb-2 text-gray-700">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label for="lastName" class="block text-x2l font-bold mb-2 text-gray-700">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div>
                        <label for="jobTitle" class="block text-x2l font-bold mb-2 text-gray-700">Job Title</label>
                        <input type="text" id="jobTitle" name="jobTitle" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="phoneNumber" class="block text-x2l font-bold mb-2 text-gray-700">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="companyEmail" class="block text-x2l font-bold mb-2 text-gray-700">Company Email</label>
                        <input type="email" id="companyEmail" name="companyEmail" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <small class="text-xs text-gray-500">We do not reply to private emails.</small>
                    </div>
                    <div>
                        <label for="conference" class="block text-x2l font-medium text-gray-700">Conference</label>
                        <select id="conference" name="conference" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="4th_annual_summit">4th Annual Banking Credit Risk Summit</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="newsletter" class="text-x2l font-bold text-gray-700">Send me the Credit Risk newsletter</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="consent" name="consent" class="h-5 w-5 text-blue-500 border-gray-300 rounded" required />
                        <label for="consent" class="text-sm text-gray-700">I agree to receive the newsletter and know that I can easily unsubscribe at any time.</label>
                    </div>
                    <div class="flex justify-start mt-12">
                        <button class="border-2 border-blue-900 text-blue-900 bg-white py-3 px-8 rounded-lg mt-6 flex items-center gap-2 hover:bg-blue-900 hover:text-white focus:outline-none w-auto">
                            <span>SUBMIT</span>
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>

<section class="relative py-16">
    <div class="absolute inset-0 top-0 w-full h-full bg-white z-0"></div>
    <div class="relative z-10 max-w-7xl mx-auto text-center">
        <h2 class="text-5xl font-bold text-gray-800 mb-6">VENUE</h2>
        <h3 class="text-4xl font-semibold text-gray-700 mb-12">Radisson Blu Hotel | Prague City Centre</h3>
        <button class="text-white text-4xl bg-blue-700 py-6 px-16 w-full max-w-xl rounded-lg font-semibold  mb-2">
            Reserve Your Seat
        </button>
        
        <h1 class="text-3xl text-white font-bold mb-12 mt-6 glow-text drop-shadow-[0_0_10px_#ffffff]">
            Type of Delegate Pass:
        </h1> 
        <div class="mb-8">
            <div class="flex justify-center gap-4">
                <button class="inline-block w-full max-w-xl px-10 py-4 backdrop-blur-sm bg-white/30 text-stone-100 text-xl font-semibold rounded-lg border-2 border-gray-400 shadow-lg">
                    <span class="inline-block transition-all duration-300 transform hover:translate-x-2">
                        Industry Professional Registration
                    </span>
                </button>
                <button class="inline-block w-full max-w-xl px-10 py-3 backdrop-blur-sm bg-white/30 text-stone-100 text-xl font-semibold rounded-lg border-2 border-gray-400 shadow-lg">
                    <span class="inline-block transition-all duration-300 transform hover:translate-x-2">
                        General Registration
                    </span>
                </button>
            </div>        
        </div>
    </div>
    <div class="absolute inset-x-0 bottom-0 h-[300px] bg-cover bg-center z-0" style="background-image: url('{{ asset('eropa.jpg') }}');"></div>
</section>

</x-website::layouts.main>
