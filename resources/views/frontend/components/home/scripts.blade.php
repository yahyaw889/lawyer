<script>
    (function() {
        function initContactForm() {
            const contactForm = document.getElementById('contactForm');
            if (!contactForm) return;

            // Use a flag to prevent double binding if this script runs multiple times on same element
            if (contactForm.dataset.listenerAttached) return;
            contactForm.dataset.listenerAttached = 'true';

            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const form = this;
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalBtnContent = submitBtn.innerHTML;
                const messageDiv = document.getElementById('contactFormMessage');

                // Disable button and show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<span class="material-symbols-outlined animate-spin">refresh</span> {{ __('frontend.contact.form.loading') }}';
                submitBtn.classList.add('opacity-75', 'cursor-not-allowed');

                // Collect form data
                const formData = new FormData(form);

                // Get CSRF token from meta tag or generate it
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                    'content') ||
                    '{{ csrf_token() }}';

                fetch("{{ route('contact.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    })
                    .then(response => {
                        // Check if response is ok before parsing
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw {
                                    status: response.status,
                                    data: err
                                };
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        messageDiv.classList.remove('hidden', 'text-red-600', 'text-green-600',
                            'border-red-200',
                            'border-green-200');

                        if (data.success) {
                            messageDiv.classList.add('text-green-600', 'border-green-200');
                            messageDiv.innerHTML =
                                `<div class="flex items-center gap-2"><span class="material-symbols-outlined">check_circle</span> ${data.message}</div>`;
                            form.reset();
                        } else {
                            throw new Error(data.message ||
                                '{{ __('frontend.messages.generic_error') }}');
                        }
                    })
                    .catch(error => {
                        messageDiv.classList.remove('hidden', 'text-green-600', 'border-green-200');
                        messageDiv.classList.add('text-red-600', 'border-red-200');

                        let errorMessage = '{{ __('frontend.messages.generic_error') }}';

                        if (error.status === 419) {
                            errorMessage = '{{ __('frontend.messages.session_expired') }}';
                        } else if (error.status === 422) {
                            errorMessage = '{{ __('frontend.messages.validation_error') }}';
                        } else if (error.data?.message) {
                            errorMessage = error.data.message;
                        } else if (error.message) {
                            errorMessage = error.message;
                        }

                        messageDiv.innerHTML =
                            `<div class="flex items-center gap-2"><span class="material-symbols-outlined">error</span> ${errorMessage}</div>`;
                    })
                    .finally(() => {
                        messageDiv.classList.remove('hidden');
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnContent;
                        submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');

                        // Hide message after 5 seconds
                        setTimeout(() => {
                            messageDiv.classList.add('hidden');
                        }, 5000);
                    });
            });
        }

        // Initialize based on ready state
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initContactForm);
        } else {
            initContactForm();
        }
    })();
</script>
