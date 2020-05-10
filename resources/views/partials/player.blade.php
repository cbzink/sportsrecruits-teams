<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm font-medium text-gray-900">
        {{ $player->first_name }} {{ $player->last_name }}
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        @if($player->can_play_goalie)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                Goalie
            </span>
        @else
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                Player
            </span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm font-medium text-gray-500">
        {{ $player->ranking }}
    </td>
</tr>