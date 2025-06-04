@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
    <div class="d-flex align-items-center">
        <i class="fas fa-check-circle me-2"></i>
        <div>
            <strong class="me-auto">Success!</strong>
            <p class="mb-0">{{ $message }}</p>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('successupdate'))
<div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
    <div class="d-flex align-items-center">
        <i class="fas fa-check-circle me-2"></i>
        <div>
            <strong class="me-auto">Success!</strong>
            <p class="mb-0">{{ $message }}</p>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('successdelete'))
<div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
    <div class="d-flex align-items-center">
        <i class="fas fa-check-circle me-2"></i>
        <div>
            <strong class="me-auto">Success!</strong>
            <p class="mb-0">{{ $message }}</p>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<style>
.alert {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 1.5rem;
    padding: 1rem 1.25rem;
}

.alert-success {
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
}

.alert i {
    font-size: 1.25rem;
}

.alert strong {
    font-size: 1.1rem;
    font-weight: 600;
}

.alert p {
    font-size: 0.95rem;
    opacity: 0.9;
}

.btn-close {
    filter: brightness(0) invert(1);
    opacity: 0.8;
}

.btn-close:hover {
    opacity: 1;
}

.animate__fadeInDown {
    animation-duration: 0.5s;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const closeButton = alert.querySelector('.btn-close');
            if (closeButton) {
                closeButton.click();
            }
        }, 5000);
    });
});
</script>
