<div class="page">
    <div class="page-top-herf"><a href="/dashboard/admins"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            &#160; &#160;Back</a></div>
    <h1>Create a new admin <i class="fas fa-user-secret    "></i></h1>
    <div class="form-card">
        <form method="POST" action="/dashboard/users">
            <div class="flex">
                <div>
                    <label for="name">User name</label>
                    <span>
                        <input type="text" name="name" id="name" autofocus placeholder="Name" value="{{ old('name') }}">
                    </span>
                    @error('name')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email">User email</label>
                    <span>
                        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    </span>
                    @error('email')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <span>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </span>
                    @error('password')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="password-confirmation">
                    <label for="password-confirmation">Password confirmation</label>
                    <span>
                        <input type="password" name="password_confirmation" id="password-confirmation"
                            placeholder="Password confirmation">
                    </span>
                    @error('password-confirmation')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" data-task="UserCreate">
                <p>Create</p>
            </button>
            @csrf
            @honeypot
        </form>
    </div>
</div>