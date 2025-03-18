@use('App\Models\Enums\RegistrationPaymentState')
@use('App\Facades\Setting')

<x-website::layouts.main>
    <div class="space-y-8 p-8 bg-gradient-to-br from-blue-50 to-white shadow-lg rounded-xl">
        <x-website::breadcrumbs :breadcrumbs="$this->getBreadcrumbs()" />
        <div class="border-b-2 pb-4">
            <h1 class="text-4xl font-extrabold text-gray-800">Agenda</h1>
            <div class="w-20 h-1 bg-gray-600 mt-2 rounded-full"></div>
        </div>
        @if ($isParticipant)
        <p class="text-gray-600 text-base italic">Please select an event below to confirm your attendance.</p>
        @endif

        <div class="overflow-hidden rounded-xl shadow-md">
            <table class="min-w-full bg-white text-sm text-gray-800">
                <thead class="bg-gradient-to-r from-blue-900 to-blue-700 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">Time</th>
                        <th class="px-6 py-4 text-center font-semibold">Session Name</th>
                        @if ($isParticipant)
                        <th class="px-6 py-4 text-center font-semibold">Status</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($timelines as $timeline)
                    <tr class="border-t hover:bg-blue-50 transition duration-300">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $timeline->name }}
                            <p class="text-sm text-gray-500">{{ $timeline->date->format(Setting::get('format_date')) }}
                            </p>
                        </td>
                        <td class="px-6 py-4 text-center font-medium">
                            @if ($timeline->isOngoing())
                            <span
                                class="px-3 py-1 text-xs font-bold text-green-700 bg-green-200 rounded-full">Ongoing</span>
                            @elseif ($timeline->getEarliestTime()->isFuture())
                            <span class="px-3 py-1 text-xs font-bold text-blue-700 bg-blue-200 rounded-full">Not
                                Started</span>
                            @else
                            <span class="px-3 py-1 text-xs font-bold text-gray-700 bg-gray-300 rounded-full">Over</span>
                            @endif
                        </td>
                        @if ($isParticipant)
                        <td class="px-6 py-4 text-center">
                            @if ($timeline->canAttend())
                            <button
                                class="px-5 py-2 text-white bg-blue-600 hover:bg-blue-800 font-medium rounded-lg text-sm shadow-md transition-all">Attend</button>
                            @else
                            <span class="text-sm text-gray-500">N/A</span>
                            @endif
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">No agenda available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-website::layouts.main>