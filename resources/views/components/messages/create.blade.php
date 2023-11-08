<div class="messages-sender page">
    <div class="page-top-herf"><a href="/dashboard/messages"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            &#160; &#160;Back</a></div>
    <div class="email">
        @if ($msg['answers_count'])
        <div class="page-top-herf top-right-absolute"><a href="/dashboard/messages/answers/{{$msg['id']}}">Show my
                answers</a></div>
        @endif
        <p class="name">From : <span>{{Str::ucfirst($msg['name'])}}</span></p>
        <p class="email">Email : <span><a class="loh" href="mailto:{{$msg['email']}}">{{$msg['email']}}</a></span></p>
        <p class="address">Addres : <span>{{Str::ucfirst($msg['country'])}}, {{Str::ucfirst($msg['city'])}},
                {{Str::ucfirst($msg['region'])}} &#160;
                <img src="{{ asset('vendor/blade-flags/country-' . $msg['code'] . '.svg') }}" width="28"
                    height="28" /></span>
        </p>
        <p class="created_at">Recived at : <span>{{ date('Y-m-d | H:i', strtotime($msg['created_at'])) }}</span>
        </p>
        <p class="num-of-answers">Number of answers : <span>{{$msg['answers_count']}}</span></p>
        </p>
        <p class="subject">Subject : <span>{{ Str::ucfirst($msg['subject']) }}</span></p>
        <div class="body">
            <p>Body <i class="far fa-comment-alt" aria-hidden="true"></i> :</p>
            <p class="text">{{ Str::ucfirst($msg['msg']) }}</p>
        </div>
    </div>
    <div class="form-card answer-form">
        <form action="/dashboard/messages/send/{{$msg['id']}}" method="post">
            <div class="flex">
                <div>
                    <label for="subject">Email Subject</label>
                    <span>
                        <input type="text" name="subject" id="subject" autofocus placeholder="Email Subject"
                            value="{{ old('subject') }}">
                    </span>
                    @error('subject')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="full-width-text-area">
                    <label for="message_body">Email Body</label>
                    <span>
                        <textarea name="message_body" id="message_body" cols="40" rows="5"
                            placeholder="Email Body...."></textarea>
                    </span>
                    @error('message_body')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" data-task="AnswerMessage">
                <p>Send</p>
            </button>
            @csrf
            @honeypot
        </form>
    </div>

</div>