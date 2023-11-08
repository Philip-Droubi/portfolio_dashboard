<x-dash-layout title="Philip Droubi / DashBoard">
    <x-confirmation-box></x-confirmation-box>
    @if (request()->is('dashboard'))
    <x-statistics-page :data=$data></x-statistics-page>
    {{-- Visits --}}
    @elseif (request()->is('dashboard/visits') || request()->is('dashboard/visits/getDetails'))
    <x-visitors-page :visits=$visits></x-visitors-page>
    {{-- Users --}}
    @elseif (request()->is('dashboard/admins'))
    <x-admins.index :users=$users></x-admins.index>
    @elseif (request()->is('dashboard/users/register'))
    <x-admins.create></x-admins.create>
    @elseif (str_contains(request()->path(), 'dashboard/users/edit'))
    <x-admins.edit :user=$user></x-admins.edit>
    {{-- Subs --}}
    @elseif (request()->is('dashboard/subs') || request()->is('dashboard/subs/getDetails'))
    <x-subscribers :subs=$subs></x-subscribers>
    {{-- Answers --}}
    @elseif (request()->is('dashboard/messages') || request()->is('dashboard/messagesByCountry'))
    <x-messages.index :msgs=$msgs></x-messages.index>
    @elseif (str_contains(request()->path(), 'dashboard/messages/send'))
    <x-messages.create :msg=$msg></x-messages.create>
    @elseif (str_contains(request()->path(), 'dashboard/messages/answers'))
    {{-- Projects --}}
    <x-messages.show :answers=$answers></x-messages.show>
    @elseif (request()->is('dashboard/projects'))
    <x-projects.index :data=$data></x-projects.index>
    @elseif (request()->is('dashboard/projects/create'))
    <x-projects.create></x-projects.create>
    @elseif (str_contains(request()->path(), 'dashboard/projects/edit'))
    <x-projects.edit :project=$data></x-projects.edit>
    @endif
</x-dash-layout>