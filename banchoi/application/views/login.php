<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Banchoi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/css/tabler.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Inria Sans", sans-serif;
            background-color: #EBEBEB;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }

        h1,
        h2 {
            font-weight: 700;
        }

        em,
        i {
            font-style: italic;
        }

        .card {
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            border-radius: 25px;
            padding: 15px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 1.5rem;
            color: #000000;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            stroke: #000000;
        }

        .logo-text {
            font-size: 3.5rem;
            font-weight: 700;
            color: #000000;
        }

        .btn {
            background-color: #3D3A3A;
        }

        #responseMessage {
            margin-top: 15px;
            font-weight: bold;
            text-align: center;
        }

        #responseMessage.success {
            color: green;
        }

        #responseMessage.error {
            color: red;
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
                <form id="loginForm">
                    <h2 class="text-center mb-2 text-black">Welcome Back</h2>
                    <h3 class="text-center text-black mb-3">Sign in to your account to continue</h3>

                    <label class="text-black fw-bold">Email</label>
                    <div class="input-icon mb-3 mt-1">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7l9 6 9-6" />
                                <path d="M21 7v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7" />
                            </svg>
                        </span>
                        <input type="email" id="email" class="form-control" placeholder="Input your email here"
                            required>
                    </div>

                    <label class="text-black fw-bold">Password</label>
                    <div class="input-icon mb-3 mt-1">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2H7a2 2 0 0 1 -2 -2z" />
                                <path d="M8 11V7a4 4 0 1 1 8 0v4" />
                            </svg>
                        </span>
                        <input type="password" id="password" class="form-control" placeholder="Input your password here"
                            required>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn text-white">Login</button>
                    </div>
                    <p class="text-center mt-3">
                        Don’t have an account yet? <a href="register">Sign Up</a>
                    </p>
                    <div id="responseMessage"></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const responseDiv = document.getElementById('responseMessage');

            document.getElementById('loginForm').addEventListener('submit', function (e) {
                e.preventDefault();

                responseDiv.textContent = '';
                responseDiv.className = '';

                const data = {
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value
                };

                fetch('http://localhost:8080/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok: ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status) {
                            responseDiv.textContent = 'Login successful! Redirecting...';
                            responseDiv.className = 'success';

                            fetch('http://localhost:8080/set-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    id: data.user.id,
                                    username: data.user.username
                                })
                            })
                                .then(() => {
                                    // Redirect after session is set
                                    window.location.href = data.redirect;  // <-- Use redirect URL from your API response
                                })
                                .then(res => res.json())
                                .then(sessionResult => {
                                    if (sessionResult.status) {
                                        window.location.href = 'dashboard/your_blogs';
                                    } else {
                                        responseDiv.textContent = 'Failed to set session.';
                                        responseDiv.className = 'error';
                                    }
                                });
                        } else {
                            responseDiv.textContent = 'Login failed: ' + data.message;
                            responseDiv.className = 'error';
                        }
                    })
                    .catch(error => {
                        console.error('Login error:', error);
                        responseDiv.textContent = 'Network error. Please try again.';
                        responseDiv.className = 'error';
                    });
            });
        });
    </script>
</body>

</html>