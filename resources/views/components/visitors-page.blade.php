<div class="visitors page">
    @if (request()->is('dashboard/visits'))
        <div class="page-top-herf"><a href="/dashboard/visits/getDetails">Get with details</a></div>
        <table class="visitsTable">
            <tr>
                <th class="flag">Flag</th>
                <th>Country</th>
                <th>Count</th>
            </tr>
            @foreach ($visits as $visit)
                <tr>
                    <td class="flag"><img src="{{ asset('vendor/blade-flags/country-' . $visit->code . '.svg') }}"
                            width="32" height="32" /></td>
                    <td>{{ $visit->country }}</td>
                    <td>{{ $visit->count }}</td>
                    </td>
                </tr>
            @endforeach
        </table>
    @elseif (request()->is('dashboard/visits/getDetails'))
        <div class="page-top-herf"><a href="/dashboard/visits">Count By Country</a></div>
        <table class="visitsTable">
            <tr>
                <th class="flag">Flag</th>
                <th>IP</th>
                <th>Country</th>
                <th>City</th>
                <th>Region</th>
                <th>Visit at</th>
            </tr>
            @foreach ($visits as $visit)
                <tr>
                    <td class="flag"><img src="{{ asset('vendor/blade-flags/country-' . $visit['code'] . '.svg') }}"
                            width="32" height="32" /></td>
                    <td>{{ $visit['IP'] }}</td>
                    <td>{{ $visit['country'] }}</td>
                    <td>{{ $visit['city'] }}</td>
                    <td>{{ $visit['region'] }}</td>
                    <td>{{ date('Y-m-d | H:i:s', strtotime($visit['created_at'])) }}</td>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    {{ $visits->onEachSide(2)->links() }}

</div>
