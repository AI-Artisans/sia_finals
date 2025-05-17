<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Banchoi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/css/tabler.min.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <style>
        /* Apply Inria Sans as the default font for the whole website */
        body {
            font-family: "Inria Sans", sans-serif;
            font-weight: 400;
            /* Normal weight (adjust as needed) */
        }

        /* Optional: Override specific elements if needed */
        h1,
        h2 {
            font-weight: 700;
            /* Bold for headings */
        }

        em,
        i {
            font-style: italic;
            /* Italic for emphasized text */
        }

        .card {
            max-width: 400px;
            /* Reduced width */
            margin: 0 auto;
            /* Center the card */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 25px;
            padding: 15px;
        }

        .already-message {
            text-align: center;
        }

        .card-head {
            font-weight: bold;
            text-align: center;
        }

        .btn {
            background-color: #3D3A3A;
        }

        body {
            background-color: #EBEBEB;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .logo {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #000000;
            text-align: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Center horizontally */
            gap: 15px;
            margin-bottom: 1.5rem;
            color: #000000;
            /* Make icon and text black */
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            stroke: #000000;
            /* Force icon stroke to black */
        }

        .logo-text {
            font-size: 3.5rem;
            font-weight: 700;
            color: #000000;
            /* Make text black */
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="logo-container">
            <svg class="logo-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M8 21h8a5 5 0 0 0 5 -5v-3a3 3 0 0 0 -3 -3h-1v-2a5 5 0 0 0 -5 -5h-4a5 5 0 0 0 -5 5v8a5 5 0 0 0 5 5z" />
                <path
                    d="M7 7m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h3a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-3a1.5 1.5 0 0 1 -1.5 -1.5z" />
                <path
                    d="M7 14m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h7a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-7a1.5 1.5 0 0 1 -1.5 -1.5z" />
            </svg>
            <div class="logo-text">Banchoi</div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-head mb-2 text-black">Welcome Back</h2>
                <h3 class="card-head text-black mb-2">Sign in to your account to continue</h3>
                
                <!-- Alert Message Container -->
                <div id="alertMessage"></div>
                
                <!-- Login Form -->
                <form id="loginForm">
                    <h3 class="text-black">Email</h3>
                    <div class="input-icon mb-3 mt-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                <path d="M3 7l9 6l9 -6" />
                            </svg>
                        </span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Input your email here" required />
                    </div>
                    <h3 class="text-black">Password</h3>
                    <div class="input-icon mb-3 mt-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-lock-password">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                                <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                <path d="M15 16h.01" />
                                <path d="M12.01 16h.01" />
                                <path d="M9.02 16h.01" />
                            </svg>
                        </span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Input your password here" required />
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <label class="form-check m-0">
                            <input class="form-check-input" type="checkbox" />
                            <span class="form-check-label">Remember me</span>
                        </label>
                        <a href="#" class="text-primary">Forgot password?</a>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" id="submitBtn" class="btn btn-dark">
                            <span id="submitText">Sign In</span>
                            <span id="loadingSpinner" style="display: none;" class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
                
                <div class="already-message mt-3">
                    <h3 class="text-black">Don't have an account yet? <a href="<?php echo base_url('register'); ?>"
                            class="text-primary">Sign Up</a></h3>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const alertDiv = document.getElementById('alertMessage');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Clear any previous alert
            alertDiv.innerHTML = '';

            // Client-side validation
            if (!email || !password) {
                alertDiv.innerHTML = '<div class="alert alert-error">Both email and password are required.</div>';
                return;
            }

            const emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
            if (!emailRegex.test(email)) {
                alertDiv.innerHTML = '<div class="alert alert-error">Please enter a valid email address.</div>';
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitText.style.display = 'none';
            loadingSpinner.style.display = 'inline-block';

            // Debug: Show payload
            console.log('Sending to:', '<?php echo base_url('api/login'); ?>');
            console.log('Payload:', JSON.stringify({
                email: email,
                password: password
            }));

            try {
                // Temporary feedback
                alertDiv.innerHTML = '<div class="alert" style="background-color: #e2e3e5; color: #41464b; border: 1px solid #d3d6d8;">Submitting login request...</div>';

                const response = await fetch('<?php echo base_url('api/login'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });

                console.log('Response Status:', response.status);
                console.log('Response Headers:', {
                    'Content-Type': response.headers.get('Content-Type')
                });

                let data;
                const contentType = response.headers.get('Content-Type');
                if (contentType && contentType.includes('application/json')) {
                    data = await response.json();
                    console.log('Response JSON Data:', data);
                } else {
                    const textData = await response.text();
                    console.log('Response Text Data:', textData);
                    try {
                        data = JSON.parse(textData);
                    } catch (e) {
                        console.error('Could not parse response as JSON:', e);
                        data = {
                            error: 'Invalid server response. Raw data: ' + (textData.length > 100 ? textData.substring(0, 100) + '...' : textData)
                        };
                    }
                }

                if (response.ok) {
                    alertDiv.innerHTML = '<div class="alert alert-success">Login successful! Redirecting...</div>';

                    // Optionally store token if returned (e.g., JWT)
                    if (data.token) {
                        localStorage.setItem('authToken', data.token);
                    }

                    // Redirect after 1-2 seconds
                    setTimeout(() => {
                        window.location.href = '<?php echo base_url('dashboard'); ?>';
                    }, 1500);
                } else {
                    const errorMessage = data.error || data.message || 'Login failed. Please check your credentials.';
                    alertDiv.innerHTML = '<div class="alert alert-error">' + errorMessage + '</div>';
                }
            } catch (error) {
                console.error('Network Error:', error);
                alertDiv.innerHTML = '<div class="alert alert-error">A network error occurred. Please try again later.</div>';
            } finally {
                submitBtn.disabled = false;
                submitText.style.display = 'inline';
                loadingSpinner.style.display = 'none';
            }
        });
    </script>


</body>