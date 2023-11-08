@if (session()->has('message'))
    <div class="toast active">
        <div class="toast-content">
            @if (session('success'))
                <i class="fas fa-solid fa-check check left-icon"></i>
            @else
                <i class="fas fa-solid fa-xmark fail left-icon"></i>
            @endif
            <div class="message">
                @if (session('success'))
                    <span class="text text-1">Success</span>
                @else
                    <span class="text text-1">Fail</span>
                @endif
                <span class="text text-2">{{ session('message') }}</span>
            </div>
        </div>
        <i class="fa-solid fa-xmark close"></i>
        @if (session('success'))
            <div class="progress-line success active"></div>
        @else
            <div class="progress-line fail active"></div>
        @endif
    </div>
@endif
