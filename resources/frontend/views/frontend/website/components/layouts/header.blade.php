@php
$primaryNavigationItems = app()->getNavigationItems('primary-navigation-menu');
$userNavigationMenu = app()->getNavigationItems('user-navigation-menu');
@endphp

@if(app()->getCurrentConference() || app()->getCurrentScheduledConference())
<div class="navbar-container bg-white text-slate-800 border-b border-gray-300 shadow-md shadow-gray-400/50 z-40">
    <div class="justify-between mx-auto navbar my-3 max-w-7xl">
        <div class="items-center font-bold gap-2 navbar-start ml-12 w-max">
            <x-website::navigation-menu-mobile />
            <x-website::logo :headerLogo="$headerLogo" />
        </div>
        <div class="relative z-10 hidden navbar-end lg:flex w-max">
            <x-website::navigation-menu :items="$primaryNavigationItems" />
            <x-website::navigation-menu :items="$userNavigationMenu" class="text-gray-800" />
        </div>
    </div>
</div>
@endif