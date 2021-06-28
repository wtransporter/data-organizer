<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate') }}: <span class="text-blue-900 underline">{{ $candidate->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white max-w-7xl mx-auto sm:p-6 lg:p-8 rounded">
            <div class="overflow-hidden p-2 md:p-0">
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border w-64">{{ __('Name') }}</th>
                            <th class="px-4 py-2 border">{{ __('Address') }}</th>
                            <th class="px-4 py-2 border">{{ __('Date of birth') }}</th>
                            <th class="px-4 py-2 border">{{ __('Phone') }}</th>
                            <th class="px-4 py-2 border">{{ __('College') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">
                                {{ $candidate->name }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $candidate->address }}
                            </td>
                            <td  class="border px-4 py-2">
                                {{ $candidate->birth_date->format('d.m.Y') }}
                            </td>
                            <td  class="border px-4 py-2">
                                {{ $candidate->phone }}
                            </td>
                            <td  class="border px-4 py-2">
                                {{ $candidate->college }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>