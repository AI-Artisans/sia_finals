<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register | Banchoi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/css/tabler.min.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <style>
        body {
            font-family: "Inria Sans", sans-serif;
            font-weight: 400;
            background-color: #EBEBEB;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .card {
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 25px;
            padding: 15px;
        }

        .card-head {
            font-weight: bold;
            text-align: center;
        }

        .btn {
            background-color: #3D3A3A;
            color: white;
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

        #responseMessage {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="logo-container">
            <svg class="logo-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 21h8a5 5 0 0 0 5 -5v-3a3 3 0 0 0 -3 -3h-1v-2a5 5 0 0 0 -5 -5h-4a5 5 0 0 0 -5 5v8a5 5 0 0 0 5 5z" />
                <path d="M7 7m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h3a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-3a1.5 1.5 0 0 1 -1.5 -1.5z" />
                <path d="M7 14m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h7a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-7a1.5 1.5 0 0 1 -1.5 -1.5z" />
            </svg>
            <div class="logo-text">Banchoi</div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-head mb-3 text-black">Register Now!</h2>
                <form id="registerForm">
                    <div class="mb-3">
                        <label class="form-label text-black">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Input your email here" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-black">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Input your username here" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-black">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Input your password here" required />
                    </div>

                    <button type="submit" class="btn w-100">Register</button>
                    <p class="text-center mt-3">
                        Already have an account? <a href="login">Login</a>
                    </p>
                </form>

                <div id="responseMessage"></div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const data = {
                username: document.getElementById('username').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            };

            fetch('http://localhost:8080/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(res => res.json())
                .then(response => {
                    const msgDiv = document.getElementById('responseMessage');
                    if (response.status) {
                        msgDiv.style.color = 'green';
                        msgDiv.textContent = response.message;
                    } else {
                        msgDiv.style.color = 'red';
                        msgDiv.textContent = response.message || 'Error occurred';
                    }
                })
                .catch(error => {
                    const msgDiv = document.getElementById('responseMessage');
                    msgDiv.style.color = 'red';
                    msgDiv.textContent = 'Network error';
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
