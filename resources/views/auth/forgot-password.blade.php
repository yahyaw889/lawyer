@extends('auth.layouts.auth-cover')

@section('title', 'نسيت كلمة المرور - إيواء')

@section('content')
    <p class="h5 fw-semibold mb-2">نسيت كلمة المرور؟ 🔒</p>
    <p class="mb-3 text-muted op-7 fw-normal">
        لا تقلق. فقط أخبرنا بعنوان بريدك الإلكتروني وسنرسل لك رابط إعادة تعيين كلمة المرور.
    </p>

    <form method="POST" action="{{ route('password.email') }}" id="forgotPasswordForm">
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

            <div class="col-xl-12 d-grid mt-2">
                <button type="submit" class="btn btn-lg btn-primary" id="submitButton">
                    <span id="buttonText">
                        ارســال الرابط
                    </span>
                    <span id="buttonSpinner" class="d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        جاري الإرسال...
                    </span>
                </button>
                <a href="{{ route('login') }}" class="text-center d-block mt-3 text-muted">
                    <i class="ri-arrow-right-line align-middle me-1"></i>العودة لتسجيل الدخول
                </a>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('forgotPasswordForm');
            const submitButton = document.getElementById('submitButton');
            const buttonText = document.getElementById('buttonText');
            const buttonSpinner = document.getElementById('buttonSpinner');
            const emailInput = document.getElementById('email');

            // Configure iziToast defaults for RTL
            iziToast.settings({
                rtl: true,
                position: 'topRight',
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
                timeout: 5000
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Clear previous validation states
                emailInput.classList.remove('is-invalid');

                // Show loading state
                submitButton.disabled = true;
                buttonText.classList.add('d-none');
                buttonSpinner.classList.remove('d-none');

                // Get form data
                const formData = new FormData(form);

                // Send AJAX request
                fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Reset loading state
                        submitButton.disabled = false;
                        buttonText.classList.remove('d-none');
                        buttonSpinner.classList.add('d-none');

                        if (data.message && !data.errors) {
                            // Success
                            iziToast.success({
                                title: 'تم بنجاح',
                                message: data.message || data
                                .status, // Laravel sends 'status' on success usually
                                position: 'topRight'
                            });
                            // Optional: Clear form
                            form.reset();
                        } else if (data.errors) {
                            // Handle validation errors
                            if (data.errors.email) {
                                emailInput.classList.add('is-invalid');
                                iziToast.error({
                                    title: 'خطأ',
                                    message: data.errors.email[0],
                                    position: 'topRight'
                                });
                            }
                        } else {
                            // General error
                            iziToast.error({
                                title: 'خطأ',
                                message: data.message || 'حدث خطأ غير متوقع',
                                position: 'topRight'
                            });
                        }
                    })
                    .catch(error => {
                        // Reset loading state
                        submitButton.disabled = false;
                        buttonText.classList.remove('d-none');
                        buttonSpinner.classList.add('d-none');

                        // Show error toast
                        iziToast.error({
                            title: 'خطأ في الاتصال',
                            message: 'حدث خطأ أثناء محاولة الاتصال بالخادم.',
                            position: 'topRight'
                        });
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@endsection
