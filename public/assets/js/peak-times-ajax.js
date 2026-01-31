// Peak Times AJAX Operations
$(document).ready(function () {
    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Toast Notification Helper
    function showToast(message, type = 'success') {
        const bgColor = type === 'success' ? 'bg-success' : 'bg-danger';
        const icon = type === 'success' ? 'bx-check-circle' : 'bx-x-circle';

        const toast = `
            <div class="toast align-items-center text-white ${bgColor} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bx ${icon} me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `;

        let toastContainer = $('.toast-container');
        if (toastContainer.length === 0) {
            toastContainer = $('<div class="toast-container position-fixed top-0 end-0 p-3"></div>');
            $('body').append(toastContainer);
        }

        const $toast = $(toast);
        toastContainer.append($toast);
        const bsToast = new bootstrap.Toast($toast[0]);
        bsToast.show();

        $toast.on('hidden.bs.toast', function () {
            $(this).remove();
        });
    }

    // Date Formatting Helper (ISO to Y-m-d)
    function formatDate(dateString) {
        if (!dateString) return '';

        // If already in Y-m-d format, return as is
        if (/^\d{4}-\d{2}-\d{2}$/.test(dateString)) {
            return dateString;
        }

        // Convert ISO format to Y-m-d
        const date = new Date(dateString);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Create Peak Time
    $('#createPeakTimeForm').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span>جاري الحفظ...');

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    showToast(response.message, 'success');
                    $('#createPeakTimeModal').modal('hide');
                    $('#createPeakTimeForm')[0].reset();

                    // Reload to show new record (complex to build entire row dynamically)
                    setTimeout(() => location.reload(), 600);
                }
            },
            error: function (xhr) {
                const message = xhr.responseJSON?.message || 'حدث خطأ أثناء الحفظ';
                showToast(message, 'error');
            },
            complete: function () {
                submitBtn.prop('disabled', false).html('حفظ');
            }
        });
    });

    // Edit Peak Time
    $('form[id^="editPeakTimeForm"]').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = $(this).find('button[type="submit"]');
        const peakTimeId = $(this).attr('id').replace('editPeakTimeForm', '');

        submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span>جاري التحديث...');

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success && response.data) {
                    showToast(response.message, 'success');
                    $(`#editModal${peakTimeId}`).modal('hide');

                    // Update table row data
                    const $row = $(`#peak-time-${peakTimeId}`);
                    const data = response.data;

                    // Update name
                    $row.find('td:eq(0)').text(data.name);

                    // Update dates
                    $row.find('td:eq(1)').text(formatDate(data.start_date));
                    $row.find('td:eq(2)').text(formatDate(data.end_date));

                    // Update days checkboxes
                    const days = Array.isArray(data.days) ? data.days : JSON.parse(data.days || '[]');
                    const dayMapping = {
                        'saturday': 3, 'sunday': 4, 'monday': 5,
                        'tuesday': 6, 'wednesday': 7, 'thursday': 8, 'friday': 9
                    };

                    Object.keys(dayMapping).forEach(day => {
                        const checkbox = $row.find(`td:eq(${dayMapping[day]}) input[type="checkbox"]`);
                        checkbox.prop('checked', days.includes(day));
                    });

                    // Update status badge
                    const statusBadge = data.is_active
                        ? '<span class="badge bg-success"><i class="bx bx-check-circle"></i> مفعل</span>'
                        : '<span class="badge bg-secondary"><i class="bx bx-x-circle"></i> غير مفعل</span>';
                    $row.find('td:eq(10)').html(statusBadge);

                    // Update toggle button
                    const toggleBtn = $row.find('.toggle-status-btn');
                    toggleBtn.removeClass('btn-success btn-secondary')
                        .addClass(data.is_active ? 'btn-success' : 'btn-secondary')
                        .attr('title', data.is_active ? 'مفعل' : 'غير مفعل');
                }
            },
            error: function (xhr) {
                const message = xhr.responseJSON?.message || 'حدث خطأ أثناء التحديث';
                showToast(message, 'error');
            },
            complete: function () {
                submitBtn.prop('disabled', false).html('تحديث');
            }
        });
    });

    // Toggle Status
    $('.toggle-status-btn').on('click', function () {
        const peakTimeId = $(this).data('id');
        const btn = $(this);
        const originalHtml = btn.html();

        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

        $.ajax({
            url: `/tenant/settings/peak-times/${peakTimeId}/toggle-status`,
            method: 'POST',
            success: function (response) {
                if (response.success && response.data) {
                    showToast(response.message, 'success');

                    const data = response.data;
                    const $row = $(`#peak-time-${peakTimeId}`);

                    // Update status badge
                    const statusBadge = data.is_active
                        ? '<span class="badge bg-success"><i class="bx bx-check-circle"></i> مفعل</span>'
                        : '<span class="badge bg-secondary"><i class="bx bx-x-circle"></i> غير مفعل</span>';
                    $row.find('td:eq(10)').html(statusBadge);

                    // Update button
                    btn.removeClass('btn-success btn-secondary')
                        .addClass(data.is_active ? 'btn-success' : 'btn-secondary')
                        .attr('title', data.is_active ? 'مفعل' : 'غير مفعل')
                        .prop('disabled', false)
                        .html(originalHtml);
                }
            },
            error: function (xhr) {
                const message = xhr.responseJSON?.message || 'حدث خطأ أثناء تحديث الحالة';
                showToast(message, 'error');
                btn.prop('disabled', false).html(originalHtml);
            }
        });
    });

    // Delete Peak Time
    $('.delete-peak-time-btn').on('click', function () {
        const peakTimeId = $(this).data('id');
        const btn = $(this);

        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span>جاري الحذف...');

        $.ajax({
            url: `/tenant/settings/peak-times/${peakTimeId}`,
            method: 'DELETE',
            success: function (response) {
                if (response.success) {
                    showToast(response.message, 'success');

                    // Fade out and remove the row
                    $(`#peak-time-${peakTimeId}`).fadeOut(400, function () {
                        $(this).remove();

                        // Check if table is empty
                        if ($('tbody tr').length === 0) {
                            $('tbody').html('<tr><td colspan="12" class="text-center py-5 text-muted">لا توجد أوقات ذروة</td></tr>');
                        }
                    });
                }
            },
            error: function (xhr) {
                const message = xhr.responseJSON?.message || 'حدث خطأ أثناء الحذف';
                showToast(message, 'error');
                btn.prop('disabled', false).html('<i class="bx bx-trash me-1"></i> نعم، احذف');
            }
        });
    });
});
