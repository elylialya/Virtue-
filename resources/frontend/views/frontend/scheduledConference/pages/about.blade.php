<x-website::layouts.main>
    <div class="container mx-auto px-4 py-10">
        <div class="mb-8">
            <x-website::breadcrumbs :breadcrumbs="$this->getBreadcrumbs()" />
        </div>
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">{{ $this->getTitle() }}</h1>
            <div class="w-20 h-1 bg-blue-900 mx-auto mt-2 rounded-full"></div>
        </div>
        <div class="bg-blue-900 shadow-lg rounded-lg p-8 md:p-12">
            @if ($about)
            <div class="user-content text-gray-700 leading-relaxed text-lg">
                {{ new Illuminate\Support\HtmlString($about) }}
            </div>
            @else
            <div class="text-center text-white italic">
                <p>The Global Tech Conference is a premier event that brings together experts in AI, cybersecurity,
                    software development, and emerging technologies. It offers a platform for sharing knowledge,
                    fostering collaboration, and driving innovation.</p>
                <p>This year's conference will feature keynote speeches from industry pioneers, hands-on workshops, and
                    networking opportunities aimed at building a future shaped by technology and creativity.</p>
                <p>Join us to explore cutting-edge solutions, gain insights into the latest trends, and connect with
                    like-minded professionals and organizations.</p>
                @endif
            </div>
        </div>
</x-website::layouts.main>