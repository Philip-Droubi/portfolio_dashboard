<div class="subscribers page">
    @if (request()->is('dashboard/subs'))
        <div class="page-top-herf"><a href="/dashboard/subs/getDetails">Get with details</a></div>
        <table class="subsTable">
            <tr>
                <th class="flag">Flag</th>
                <th>Country</th>
                <th>Count</th>
            </tr>
            @foreach ($subs as $sub)
                <tr>
                    <td class="flag"><img src="{{ asset('vendor/blade-flags/country-' . $sub->code . '.svg') }}"
                            width="32" height="32" /></td>
                    <td>{{ $sub->country }}</td>
                    <td>{{ $sub->count }}</td>
                    </td>
                </tr>
            @endforeach
        </table>
    @elseif (request()->is('dashboard/subs/getDetails'))
        <div class="page-top-herf"><a href="/dashboard/subs">Count By Country</a></div>
        <table class="visitsTable">
            <tr>
                <th class="flag">Flag</th>
                <th class="email">Email</th>
                {{-- <th>IP</th> --}}
                <th>Country</th>
                <th>City</th>
                <th>Region</th>
                <th>created at</th>
                <th class="options">options</th>
            </tr>
            @foreach ($subs as $sub)
                <tr>
                    <td class="flag"><img src="{{ asset('vendor/blade-flags/country-' . $sub['code'] . '.svg') }}"
                            width="32" height="32" /></td>
                    <td>{{ $sub['email'] }}</td>
                    {{-- <td>{{ $sub['IP'] }}</td> --}}
                    <td>{{ $sub['country'] }}</td>
                    <td>{{ $sub['city'] }}</td>
                    <td>{{ $sub['region'] }}</td>
                    <td>{{ date('Y-m-d | H:i', strtotime($sub['created_at'])) }}</td>
                    <td class="options {{ $sub['deactive_at'] ? 'deactive' : '' }}">
                        @if (!$sub['deactive_at'])
                            <div>
                                <button class="confirm-call-btn remove" data-title="Deactive This subscriber?"
                                    data-message="Are you sure you want to deactive This subscriber?"
                                    data-backMessage='Cancel' data-backClass='blue' data-formMessage="DEACTIVE"
                                    data-formClass="red" data-formAction="/dashboard/subs/{{ $sub['id'] }}"><i
                                        class="fa fa-trash" aria-description="Deactive subscriber"></i></button>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    {{ $subs->onEachSide(2)->links() }}
</div>
