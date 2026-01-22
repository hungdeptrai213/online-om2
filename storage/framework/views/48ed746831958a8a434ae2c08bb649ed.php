<style>
    body {
        background: #000;
        color: #fff;
    }
    .login-wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .home-back {
        padding: 16px 24px;
    }
    .home-back a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }
    .contain-login {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
    }
    .sign-in {
        width: 100%;
        max-width: 480px;
        background: #0c0c0c;
        border-radius: 18px;
        padding: 32px 36px;
        border: 1px solid #1f1f1f;
        box-shadow: 0 24px 64px rgba(0,0,0,0.35);
        text-align: center;
    }
    .sign-in .logo-login {
        height: 56px;
        margin-bottom: 12px;
    }
    .h2-login {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #fff;
    }
    .login__container-method {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 12px;
    }
    .login__container-item {
        padding: 12px 16px;
        width: 100%;
        font-weight: 600;
        margin: 0 auto;
        margin-top: 0;
        background-color: #fdfdfd;
        color: #000000;
        border-radius: 99px;
        border: unset;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .login__container-item:hover {
        background-color: #fdfdfdc6;
    }
    .login__container-hoac {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #c0c0c0;
        font-weight: 600;
        font-size: 13px;
        margin: 12px 0 14px;
    }
    .login__container-hoac span {
        white-space: nowrap;
    }
    .login__container-hoac:before,
    .login__container-hoac:after {
        content: '';
        flex: 1;
        height: 1px;
        background: #2a2a2a;
    }
    form {
        text-align: left;
    }
    form input[type="text"],
    form input[type="email"],
    form input[type="password"] {
        width: 100%;
        border-radius: 999px;
        border: 1px solid #333;
        background: #0f0f0f;
        color: #fff;
        padding: 12px 16px;
        margin-bottom: 10px;
        outline: none;
    }
    form input::placeholder {
        color: #a1a1a1;
    }
    .forgot-password {
        text-align: right;
        margin-bottom: 14px;
    }
    .forgot-password a {
        color: #f6a11a;
        font-weight: 600;
        text-decoration: none;
    }
    .sign-in button {
        width: 100%;
        padding: 12px;
        background: #fdfdfd;
        color: #000;
        border-radius: 999px;
        font-weight: 700;
        border: none;
        margin-bottom: 16px;
        transition: all 0.2s ease;
    }
    .sign-in button:hover {
        background: #fdfdfdc6;
    }
    .remember {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #cfcfcf;
        margin-bottom: 14px;
    }
    .login__footer {
        text-align: center;
    }
    .login__footer-register {
        color: #f6a11a;
        font-weight: 700;
        text-decoration: none;
    }
    .light-footer {
        padding: 18px 0;
        text-align: center;
        color: #cfcfcf;
        font-size: 13px;
    }
    .alert {
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 12px;
    }
    @media (max-width: 576px) {
        .sign-in {
            padding: 24px 22px;
        }
    }
</style>
<?php /**PATH C:\laragon\www\online-om\resources\views/student/auth/styles.blade.php ENDPATH**/ ?>