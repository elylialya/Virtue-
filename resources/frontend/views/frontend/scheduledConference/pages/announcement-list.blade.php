<x-website::layouts.main>
    <div class="container mx-auto px-4 py-16">
        <nav class="mb-8 text-sm text-gray-500 flex justify-start">
            <x-website::breadcrumbs :breadcrumbs="$this->getBreadcrumbs()" />
        </nav>
        <section class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 leading-snug">Stay Informed with Our Latest
                Announcements</h1>
            <p class="mt-4 text-lg text-gray-700 max-w-2xl mx-auto">
                Get the most recent updates, key news, and special announcements as we count down to the conference.
            </p>
            <div class="w-28 h-1 bg-blue-600 mx-auto mt-4 rounded-full"></div>
        </section>
        <section class="bg-white shadow-md rounded-lg p-8 md:p-12">
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($announcements as $announcement)
                <x-scheduledConference::announcement-summary :announcement="$announcement"
                    class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-lg border border-blue-200 hover:shadow-lg transition-transform transform hover:-translate-y-2 duration-300" />
                @empty
                <div class="col-span-full text-center text-gray-500 italic">
                    No announcements available right now. Please check again soon.
                </div>
                @endforelse
            </div>
        </section>
    </div>
</x-website::layouts.main>