@extends('Master')
@section('title', 'Login')
@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center g-5">
            <!-- Left side image column -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="position-relative">
                    <div class="login-hero-bg">
                        <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?semt=ais_hybrid&w=740" 
                             alt="Login" class="img-fluid rounded-3 shadow-lg">
                        <div class="hero-overlay">
                            <div class="hero-content">
                                <h2 class="text-white fw-bold mb-3 display-6">Welcome Back!</h2>
                                <p class="text-white-50 mb-4 lead">Sign in to continue your amazing journey with us</p>
                                
                                <div class="feature-list">
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                        <span class="text-white">Bank-level security</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        <span class="text-white">End-to-end encryption</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                        <span class="text-white">Trusted by millions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced floating elements -->
                    <div class="floating-elements">
                        <div class="floating-element element-1"></div>
                        <div class="floating-element element-2"></div>
                        <div class="floating-element element-3"></div>
                        <div class="floating-element element-4"></div>
                        <div class="floating-element element-5"></div>
                    </div>
                </div>
            </div>
            
            <!-- Right side form column -->
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="login-card">
                    <div class="card-header-custom">
                        <div class="brand-section">
                            <div class="brand-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ __('Welcome Back') }}</h3>
                            <p class="mb-0 mt-1 opacity-75">Please sign in to your account</p>
                        </div>
                    </div>

                    <div class="card-body-custom">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <div class="form-floating-custom mb-4">
                                <div class="input-wrapper">
                                    <div class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input id="email" type="email" 
                                        class="form-control-custom @error('email') is-invalid @enderror" 
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder=" ">
                                    <label for="email" class="floating-label">{{ __('Email Address') }}</label>
                                    <div class="input-border"></div>
                                </div>
                                @error('email')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating-custom mb-4">
                                <div class="input-wrapper">
                                    <div class="input-icon">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input id="password" type="password" 
                                        class="form-control-custom @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="current-password"
                                        placeholder=" ">
                                    <label for="password" class="floating-label">{{ __('Password') }}</label>
                                    <div class="password-toggle" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </div>
                                    <div class="input-border"></div>
                                </div>
                                @error('password')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-options mb-4">
                                <div class="custom-checkbox">
                                    <input class="checkbox-input" type="checkbox" name="remember" 
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="checkbox-label" for="remember">
                                        <span class="checkbox-custom"></span>
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                
                                @if (Route::has('password.request'))
                                    <a class="forgot-password" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="login-btn" id="loginButton">
                                    <span class="btn-content">
                                        <span class="btn-text">{{ __('Log In') }}</span>
                                        <div class="btn-icon">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </span>
                                    <div class="btn-loading">
                                        <div class="spinner"></div>
                                        <span>Signing in...</span>
                                    </div>
                                </button>
                            </div>

                            <div class="signup-link">
                                <p class="mb-0">Don't have an account? 
                                    <a href="{{ route('register') }}" class="signup-btn">
                                        Create Account
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Enhanced form interactions
document.querySelectorAll('.form-control-custom').forEach(input => {
    input.addEventListener('focus', function() {
        this.closest('.input-wrapper').classList.add('focused');
    });
    
    input.addEventListener('blur', function() {
        if (!this.value) {
            this.closest('.input-wrapper').classList.remove('focused');
        }
    });
    
    // Check if input has value on page load
    if (input.value) {
        input.closest('.input-wrapper').classList.add('focused');
    }
});

// Enhanced form validation with better UX
document.getElementById('loginForm').addEventListener('submit', function(e) {
    let isValid = true;
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    
    // Remove previous error states
    document.querySelectorAll('.input-wrapper').forEach(wrapper => {
        wrapper.classList.remove('error');
    });
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value || !emailRegex.test(email.value)) {
        isValid = false;
        email.closest('.input-wrapper').classList.add('error');
        showInputError(email, 'Please enter a valid email address');
    }
    
    // Password validation
    if (!password.value || password.value.length < 6) {
        isValid = false;
        password.closest('.input-wrapper').classList.add('error');
        showInputError(password, 'Password must be at least 6 characters');
    }
    
    if (!isValid) {
        e.preventDefault();
        // Add shake animation to form
        document.querySelector('.login-card').classList.add('shake');
        setTimeout(() => {
            document.querySelector('.login-card').classList.remove('shake');
        }, 600);
    } else {
        // Show loading state
        const loginButton = document.getElementById('loginButton');
        loginButton.classList.add('loading');
        loginButton.disabled = true;
    }
});

function showInputError(input, message) {
    // Remove existing error message
    const existingError = input.closest('.form-floating-custom').querySelector('.error-message');
    if (existingError) {
        existingError.remove();
    }
    
    // Add new error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
    input.closest('.form-floating-custom').appendChild(errorDiv);
}

// Particle effect on successful form interaction
function createParticle(x, y) {
    const particle = document.createElement('div');
    particle.className = 'success-particle';
    particle.style.left = x + 'px';
    particle.style.top = y + 'px';
    document.body.appendChild(particle);
    
    setTimeout(() => {
        particle.remove();
    }, 1000);
}

// Add page load animation
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.querySelector('.login-card').classList.add('loaded');
    }, 100);
});
</script>

<style>
/* Enhanced base styles */
.login-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    transform: translateY(30px);
    opacity: 0;
}

.login-card.loaded {
    transform: translateY(0);
    opacity: 1;
}

.login-card.shake {
    animation: shake 0.6s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
    20%, 40%, 60%, 80% { transform: translateX(10px); }
}

/* Enhanced header */
.card-header-custom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 40px 40px 30px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.card-header-custom::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s;
}

.login-card:hover .card-header-custom::before {
    left: 100%;
}

.brand-section {
    position: relative;
    z-index: 2;
}

.brand-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 2rem;
    color: white;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.brand-section h3 {
    color: white;
    font-size: 1.8rem;
    margin-bottom: 8px;
}

.brand-section p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1rem;
}

/* Enhanced form body */
.card-body-custom {
    padding: 40px;
}

/* Floating label inputs */
.form-floating-custom {
    position: relative;
    margin-bottom: 24px;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1.1rem;
    z-index: 2;
    transition: all 0.3s ease;
}

.form-control-custom {
    width: 100%;
    padding: 20px 20px 20px 55px;
    border: 2px solid #e5e7eb;
    border-radius: 16px;
    font-size: 1rem;
    background: #f9fafb;
    transition: all 0.3s ease;
    outline: none;
}

.form-control-custom:focus {
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.floating-label {
    position: absolute;
    left: 55px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1rem;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    background: transparent;
    padding: 0 8px;
}

.input-wrapper.focused .floating-label,
.form-control-custom:not(:placeholder-shown) + .floating-label {
    top: 0;
    left: 45px;
    font-size: 0.8rem;
    color: #667eea;
    background: white;
    font-weight: 600;
}

.input-wrapper.focused .input-icon {
    color: #667eea;
}

.input-wrapper.error .form-control-custom {
    border-color: #ef4444;
    background: #fef2f2;
}

.input-wrapper.error .input-icon {
    color: #ef4444;
}

.input-wrapper.error .floating-label {
    color: #ef4444;
}

/* Password toggle */
.password-toggle {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #9ca3af;
    font-size: 1.1rem;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.password-toggle:hover {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
}

/* Form options */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.custom-checkbox {
    display: flex;
    align-items: center;
}

.checkbox-input {
    display: none;
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 0.95rem;
    color: #4b5563;
}

.checkbox-custom {
    width: 20px;
    height: 20px;
    border: 2px solid #d1d5db;
    border-radius: 6px;
    margin-right: 12px;
    position: relative;
    transition: all 0.3s ease;
}

.checkbox-input:checked + .checkbox-label .checkbox-custom {
    background: #667eea;
    border-color: #667eea;
}

.checkbox-input:checked + .checkbox-label .checkbox-custom::after {
    content: '\f00c';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 0.7rem;
}

.forgot-password {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.forgot-password:hover {
    color: #4f46e5;
    text-decoration: underline;
}

/* Enhanced login button */
.login-btn {
    position: relative;
    width: 100%;
    padding: 18px 32px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 16px;
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.login-btn:active {
    transform: translateY(0);
}

.btn-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    transition: all 0.3s ease;
}

.btn-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    align-items: center;
    gap: 12px;
    opacity: 0;
    transition: all 0.3s ease;
}

.login-btn.loading .btn-content {
    opacity: 0;
}

.login-btn.loading .btn-loading {
    opacity: 1;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.btn-icon {
    transition: transform 0.3s ease;
}

.login-btn:hover .btn-icon {
    transform: translateX(4px);
}

/* Signup link */
.signup-link {
    text-align: center;
    padding-top: 24px;
    border-top: 1px solid #e5e7eb;
}

.signup-link p {
    color: #6b7280;
    font-size: 0.95rem;
}

.signup-btn {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    position: relative;
    transition: all 0.3s ease;
}

.signup-btn:hover {
    color: #4f46e5;
}

.signup-btn::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: #667eea;
    transition: width 0.3s ease;
}

.signup-btn:hover::after {
    width: 100%;
}

/* Error messages */
.error-message {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 8px;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hero section enhancements */
.login-hero-bg {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.7) 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 60px;
}

.hero-content h2 {
    font-size: 2.5rem;
    margin-bottom: 16px;
}

.feature-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-top: 32px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 16px;
}

.feature-icon {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    backdrop-filter: blur(10px);
}

/* Enhanced floating elements */
.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
}

.floating-element {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.element-1 {
    width: 80px;
    height: 80px;
    top: 15%;
    right: 15%;
    animation: float1 8s ease-in-out infinite;
}

.element-2 {
    width: 60px;
    height: 60px;
    bottom: 20%;
    right: 25%;
    animation: float2 10s ease-in-out infinite 1s;
}

.element-3 {
    width: 40px;
    height: 40px;
    top: 40%;
    right: 8%;
    animation: float3 12s ease-in-out infinite 2s;
}

.element-4 {
    width: 25px;
    height: 25px;
    top: 70%;
    right: 40%;
    animation: float1 9s ease-in-out infinite 3s;
}

.element-5 {
    width: 35px;
    height: 35px;
    top: 25%;
    right: 45%;
    animation: float2 11s ease-in-out infinite 4s;
}

@keyframes float1 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    33% { transform: translateY(-20px) rotate(120deg); }
    66% { transform: translateY(10px) rotate(240deg); }
}

@keyframes float2 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(180deg); }
}

@keyframes float3 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    25% { transform: translateY(-15px) rotate(90deg); }
    75% { transform: translateY(15px) rotate(270deg); }
}

/* Success particle effect */
.success-particle {
    position: fixed;
    width: 6px;
    height: 6px;
    background: #10b981;
    border-radius: 50%;
    pointer-events: none;
    animation: particleFloat 1s ease-out forwards;
    z-index: 9999;
}

@keyframes particleFloat {
    0% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
    100% {
        opacity: 0;
        transform: scale(0) translateY(-100px);
    }
}

/* Responsive design */
@media (max-width: 768px) {
    .card-header-custom,
    .card-body-custom {
        padding: 24px;
    }
    
    .hero-overlay {
        padding: 40px;
    }
    
    .hero-content h2 {
        font-size: 2rem;
    }
    
    .form-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
}

@media (max-width: 576px) {
    .card-header-custom,
    .card-body-custom {
        padding: 20px;
    }
    
    .form-control-custom {
        padding: 16px 16px 16px 50px;
    }
    
    .floating-label {
        left: 50px;
    }
    
    .input-wrapper.focused .floating-label {
        left: 40px;
    }
}
</style>

@endsection