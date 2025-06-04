@extends('Master')
@section('title','Sent E-mail')
@section("content")
<div class="container py-5">
    <div class="row justify-content-center align-items-center g-5">
        <!-- Left side image column -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="position-relative">
                <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?semt=ais_hybrid&w=740" alt="Email" class="img-fluid">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center ps-5" style="background: linear-gradient(90deg, rgba(92, 50, 163, 0.8) 0%, rgba(123, 76, 191, 0.4) 50%, rgba(255, 255, 255, 0) 100%);">
                    <h2 class="text-white fw-bold mb-3">Send Email</h2>
                    <p class="text-white-50 mb-4 lead">Communicate with your users</p>
                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-white p-2 me-2">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <span class="text-white">Quick and easy communication</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side form column -->
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-gradient text-white text-center py-4" 
                     style="background: linear-gradient(45deg, #5c32a3, #7b4cbf);">
                    <h3 class="mb-0 fw-bold text-dark">Send Email</h3>
                    <p class="mb-0 mt-1 text-dark">Fill in the details below</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    @if (session('success')) 
                        <div class="alert alert-success"> 
                            {{ session('success') }} 
                        </div> 
                    @endif 

                    <form action="{{ route('send.email') }}" method="POST"> 
                        @csrf 
                        <div class="form-group mb-4">
                            <label for="email" class="form-label fw-semibold">Recipient Email:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" required placeholder="Enter recipient's email">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="subject" class="form-label fw-semibold">Subject:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-heading text-muted"></i>
                                </span>
                                <input type="text" class="form-control form-control-lg" id="subject" name="subject" required placeholder="Enter email subject">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="message" class="form-label fw-semibold">Message:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-comment text-muted"></i>
                                </span>
                                <textarea class="form-control form-control-lg" id="message" name="message" rows="4" required placeholder="Enter your message"></textarea>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg text-white fw-bold py-3 main-btn" 
                                style="background: linear-gradient(45deg, #5c32a3, #7b4cbf); border: none; transition: all 0.3s ease;">
                                Send Email
                                <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Card animations */
.card {
    transition: all 0.5s ease;
    opacity: 0;
    transform: translateY(20px);
}
.card-loaded {
    opacity: 1;
    transform: translateY(0);
}

/* Form styling */
.form-control:focus {
    border-color: #7b4cbf;
    box-shadow: 0 0 0 0.25rem rgba(123, 76, 191, 0.25);
}

/* Main button styling */
.main-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(92, 50, 163, 0.3);
}
.main-btn:active {
    transform: scale(0.98);
}

/* Gradient background animation */
.bg-gradient {
    background-size: 200% 200%;
    animation: gradientAnimation 5s ease infinite;
}

@keyframes gradientAnimation {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
</style>

<script>
// Add subtle animation to the card on page load
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.querySelector('.card').classList.add('card-loaded');
    }, 100);
});
</script>

@endsection