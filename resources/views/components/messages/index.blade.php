<div class="messages page">
    @if (request()->is('dashboard/messagesByCountry'))
    <div class="page-top-herf"><a href="/dashboard/messages">Get with details</a></div>
    <table class="msgsTable">
        <tr>
            <th class="flag">Flag</th>
            <th>Country</th>
            <th>Count</th>
        </tr>
        @foreach ($msgs as $msg)
        <tr>
            <td class="flag"><img src="{{ asset('vendor/blade-flags/country-' . $msg->code . '.svg') }}" width="32"
                    height="32" /></td>
            <td>{{ $msg->country }}</td>
            <td>{{ $msg->count }}</td>
            </td>
        </tr>
        @endforeach
    </table>
    @elseif (request()->is('dashboard/messages'))
    <div class="page-top-herf"><a href="/dashboard/messagesByCountry">Get by countries</a></div>
    <div class="flex">
        @foreach ($msgs as $msg)
        <div class="card">
            <div class="top-data">
                <div class="left">
                    <div class="upper-sec">
                        <p class="subject">{{ Str::ucfirst($msg['subject']) }}</p>
                        @if ($msg['answered_at'])
                        <div class="msg-state answered">✔</div>
                        @else
                        <div class="msg-state">On hold</div>
                        @endif
                    </div>

                    <div class="bottom-sec">
                        <p class="email"><a class="loh" href="mailto:{{ $msg['email'] }}">{{ $msg['email'] }}</a></p>
                        <p class="created_at">{{ date('Y-m-d | H:i', strtotime($msg['created_at'])) }}</p>
                    </div>

                </div>
                <div class="right">
                    <div class="flag"><img src="{{ asset('vendor/blade-flags/country-' . $msg['code'] . '.svg') }}"
                            width="40" height="40" /></div>
                </div>
            </div>
            <div class="body">
                <p>Body <i class="far fa-comment-alt" aria-hidden="true"></i> :</p>
                <p class="text">{{ Str::ucfirst($msg['msg']) }}</p>
            </div>
            <button class="more" aria-label="show bottm section of the message"><i class="fa fa-angle-up"
                    aria-hidden="true"></i></button>
            <hr>
            <div class="bottom-content">
                <p class="name">Sender Name : {{Str::ucfirst($msg['name'])}}</p>
                <div class="address">Addres : {{Str::ucfirst($msg['country'])}}, {{Str::ucfirst($msg['city'])}},
                    {{Str::ucfirst($msg['region'])}}
                </div>
                <div class="options">
                    <div>
                        <a class="loh" href="/dashboard/messages/checked/{{ $msg['id'] }}">
                            @if ($msg['answered_at'])
                            Check as NOT answerd
                            @else
                            Check as answerd
                            @endif
                        </a>
                        <a class="mail" href="/dashboard/messages/send/{{ $msg['id'] }}"><i class="fa fa-envelope"
                                aria-label="Send Email"></i></a>
                        <button class="confirm-call-btn remove" data-title="Delete This message ?"
                            data-message="Are you sure you want to delete this message from the system?"
                            data-backMessage='Cancel' data-backClass='blue' data-formMessage="DELETE"
                            data-formClass="red" data-formAction="/dashboard/messages/{{ $msg['id'] }}"><i
                                class="fa fa-trash" aria-description="Delete message"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    {{ $msgs->onEachSide(2)->links() }}
</div>