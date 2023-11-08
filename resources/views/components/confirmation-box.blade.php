<div class="confirmation-box hidden">
    <div class="title">{{ $title ?? 'title' }}</div>
    <div class="message">{{ $message ?? 'message' }}</div>
    <div class="buttons">
        <form method="POST" action={{ $link ?? '' }}>
            @csrf
            @method('DELETE')
            <button class='{{ $formClass ?? 'green' }} confirm'>{{ $formMessage ?? 'YES' }}</button>
        </form>
        <button class='{{ $backClass ?? 'red' }} cancel'>{{ $backMessage ?? 'NO' }}</button>
    </div>
</div>
