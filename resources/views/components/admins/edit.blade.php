<div class="page">
    <div class="page-top-herf"><a href="/dashboard/admins"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            &#160; &#160;Back</a></div>
    <h1>Update {{ '>> ' . ucfirst($user->name) . ' <<' }} account <i class="fa fa-wrench" aria-hidden="true"></i></h1>
    <div class="form-card">
        <form method="POST" action="/dashboard/users/{{ $user->id }}" data-usedTO="editAdmin">
            <div class="flex">
                <div>
                    <label for="name">User name</label>
                    <span>
                        <input type="text" name="name" id="name" autofocus placeholder="Name" value="{{ $user->name }}">
                    </span>
                    @error('name')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email">User email</label>
                    <span>
                        <input type="email" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                    </span>
                    @error('email')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="UI-check-box">
                    <label for="change-password">Change user password ?</label>
                    <input type="checkbox" name="change-password" id="change-password" style="cursor: pointer">
                </div>
                <div class="hidden password">
                    <label for="password">Password</label>
                    <span>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </span>
                    @error('password')
                    <p class="error-input-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="hidden password-confirmation">
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
                <p>Update</p>
            </button>
            @method('PUT')
            @csrf
            @honeypot
        </form>
    </div>
</div>