<div class="bg-white overflow-hidden shadow rounded-lg mt-3">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
            <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ $team['name'] }}
                </h3>
                <h4 class="text-sm leaning-none font-light text-gray-400">
                    {{ $team['players']->count() }} Players &bull; {{ $team['players']->sum('ranking') }} Ranking
                </h4>
            </div>
            <div class="ml-4 mt-2 flex-shrink-0">
                <img src="https://www.countryflags.io/{{ $team['countryCode'] }}/shiny/32.png">
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th width="50%" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th width="25%" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Position
                            </th>
                            <th width="25%" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Ranking
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @each('partials.player', $team['players'], 'player')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>