<div class="messages-answers page">
    <div class="page-top-herf"><a href="/dashboard/messages/send/{{$answers['msg_id']}}"><i class="fa fa-arrow-left"
                aria-hidden="true"></i>
            &#160; &#160;Back</a></div>
    @foreach ($answers['answers'] as $ans)
    <div class="answer">
        <p class="created_at">Sent at : <span>{{ date('Y-m-d | H:i', strtotime($ans['created_at'])) }}</span>
        <p class="subject">Subject : <span>{{ Str::ucfirst($ans['subject']) }}</span></p>
        <div class="body">
            <p>Body <i class="far fa-comment-alt" aria-hidden="true"></i> :</p>
            <p class="text">{{ Str::ucfirst($ans['body']) }}</p>
        </div>
    </div>
    @endforeach
</div>