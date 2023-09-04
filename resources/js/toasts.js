// TOASTS
import * as bootstrap from 'bootstrap';

const toasts = document.querySelectorAll('.toast');

// Logic
toasts.forEach(toast => {
    const newToast = new bootstrap.Toast(toast);
    newToast.show();
});