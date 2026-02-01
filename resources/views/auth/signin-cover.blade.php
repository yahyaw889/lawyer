@extends('auth.layouts.auth-cover')

@section('title', 'تسجيل الدخول - إيواء')

@section('content')
    <p class="h5 fw-semibold mb-2">تسجيل الدخول</p>
    <p class="mb-3 text-muted op-7 fw-normal">مرحباً بعودتك!</p>

    <!-- Session Status (for page reload scenarios) -->
    @if (session('status'))
        <div class="alert alert-success mb-3" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf
        <div class="row gy-3">
            <div class="col-xl-12 mt-0">
                <label for="email" class="form-label text-default">البريد الإلكتروني</label>
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                    id="email" name="email" value="{{ old('email') }}" placeholder="example@domain.com" required
                    autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-xl-12 mb-3">
                <label for="password" class="form-label text-default d-block">
                    كلمة المرور
                </label>

                <div class="input-group">
                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                        id="password" name="password" placeholder="••••••••" required>
                    <button class="btn btn-light" type="button" onclick="createpassword('password',this)"
                        id="button-addon2">
                        <i class="ri-eye-off-line align-middle"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                <div class="mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted fw-normal" for="remember">
                            تذكرني
                        </label>
                    </div>
                </div>

            </div>
            <style>
                .btn-amn {
                    background-color: #a41c1c !important;
                    border-color: #a41c1c !important;
                    color: white !important;
                    transition: all 0.3s ease;
                }

                .btn-amn:hover {
                    background-color: #8a1616 !important;
                    border-color: #8a1616 !important;
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(164, 28, 28, 0.2);
                }

                .form-control:focus {
                    border-color: #a41c1c !important;
                    box-shadow: 0 0 0 0.25rem rgba(164, 28, 28, 0.15) !important;
                }
            </style>

            <div class="col-xl-12 d-grid mt-2">
                <button type="submit" class="btn btn-lg btn-amn" id="loginButton">
                    <span id="buttonText">
                        <i class="ri-login-box-line me-2"></i>تسجيل الدخول
                    </span>
                    <span id="buttonSpinner" class="d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        جاري تسجيل الدخول...
                    </span>
                </button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-center d-block mt-2 text-danger">نسيت كلمة
                        المرور؟</a>
                @endif
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const loginButton = document.getElementById('loginButton');
            const buttonText = document.getElementById('buttonText');
            const buttonSpinner = document.getElementById('buttonSpinner');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            // Configure iziToast defaults for RTL
            iziToast.settings({
                rtl: true,
                position: 'topRight',
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
                timeout: 5000
            });

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Clear previous validation states
                emailInput.classList.remove('is-invalid');
                passwordInput.classList.remove('is-invalid');

                // Show loading state
                loginButton.disabled = true;
                buttonText.classList.add('d-none');
                buttonSpinner.classList.remove('d-none');

                // Get form data
                const formData = new FormData(loginForm);

                // Send AJAX request
                fetch(loginForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.redirected) {
                            // Successful login - redirect
                            window.location.href = response.url;
                            return;
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (!data) return; // Already redirected

                        // Reset loading state
                        loginButton.disabled = false;
                        buttonText.classList.remove('d-none');
                        buttonSpinner.classList.add('d-none');

                        // Handle validation errors
                        if (data.errors) {
                            // Show field-specific errors
                            if (data.errors.email) {
                                emailInput.classList.add('is-invalid');
                                iziToast.error({
                                    title: 'خطأ في البريد الإلكتروني',
                                    message: data.errors.email[0],
                                    position: 'topRight'
                                });
                            }
                            if (data.errors.password) {
                                passwordInput.classList.add('is-invalid');
                                iziToast.error({
                                    title: 'خطأ في كلمة المرور',
                                    message: data.errors.password[0],
                                    position: 'topRight'
                                });
                            }
                        } else if (data.message) {
                            // Show general error message
                            iziToast.error({
                                title: 'خطأ',
                                message: data.message,
                                position: 'topRight'
                            });
                        }
                    })
                    .catch(error => {
                        // Reset loading state
                        loginButton.disabled = false;
                        buttonText.classList.remove('d-none');
                        buttonSpinner.classList.add('d-none');

                        // Show error toast
                        iziToast.error({
                            title: 'خطأ في الاتصال',
                            message: 'حدث خطأ أثناء محاولة تسجيل الدخول. يرجى المحاولة مرة أخرى.',
                            position: 'topRight'
                        });
                        console.error('Login error:', error);
                    });
            });

            // Show server-side session errors if any
            @if (session('error'))
                iziToast.error({
                    title: 'خطأ',
                    message: '{{ session('error') }}',
                    position: 'topRight'
                });
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    iziToast.error({
                        title: 'خطأ',
                        message: '{{ $error }}',
                        position: 'topRight'
                    });
                @endforeach
            @endif
        });
    </script>
@endsection
