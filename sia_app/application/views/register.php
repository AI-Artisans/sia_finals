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

		/* Alert styles */
		.alert {
			padding: 10px;
			margin: 10px 0;
			border-radius: 5px;
		}

		.alert-success {
			background-color: #d4edda;
			color: #155724;
			border: 1px solid #c3e6cb;
		}

		.alert-error {
			background-color: #f8d7da;
			color: #721c24;
			border: 1px solid #f5c2c7;
		}

		/* Loading spinner */
		.spinner-border {
			display: inline-block;
			width: 1rem;
			height: 1rem;
			vertical-align: text-bottom;
			border: 0.125em solid currentColor;
			border-right-color: transparent;
			border-radius: 50%;
			animation: spinner-border 0.75s linear infinite;
		}

		@keyframes spinner-border {
			to {
				transform: rotate(360deg);
			}
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
			<h2 class="card-head mb-2 text-black">Register Now!</h2>

			<!-- Alert message container -->
			<div id="alertMessage"></div>

			<!-- Register form -->
			<form id="registerForm">
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
					<input type="email" id="email" name="email" value="" class="form-control" placeholder="Input your email here" required />
				</div>

				<h3 class="text-black">Username</h3>
				<div class="input-icon mb-3 mt-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
								 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
								 class="icon icon-tabler icons-tabler-outline icon-tabler-user-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                <path d="M15 19l2 2l4 -4" />
                            </svg>
                        </span>
					<input type="text" id="username" name="username" value="" class="form-control" placeholder="Input your username here" required />
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
					<input type="password" id="password" name="password" value="" class="form-control" placeholder="Input your password here" required />
				</div>

				<div class="d-grid gap-2 mt-4">
					<button type="submit" id="submitBtn" class="btn btn-dark btn-block">
						<span id="submitText">Sign Up</span>
						<span id="loadingSpinner" class="spinner-border" style="display: none;"></span>
					</button>
				</div>
			</form>

			<div class="already-message mt-3">
				<h3 class="text-black">Already have an account? <a href="<?php echo base_url('login'); ?>"
																   class="text-primary">Log In</a></h3>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>

<script>
	// Enhanced debug version of the registration form script

	document.getElementById('registerForm').addEventListener('submit', async function(e) {
		e.preventDefault();

		const email = document.getElementById('email').value;
		const username = document.getElementById('username').value;
		const password = document.getElementById('password').value;
		const alertDiv = document.getElementById('alertMessage');
		const submitBtn = document.getElementById('submitBtn');
		const submitText = document.getElementById('submitText');
		const loadingSpinner = document.getElementById('loadingSpinner');

		// Clear previous messages
		alertDiv.innerHTML = '';

		// Client-side validation
		if (!email || !username || !password) {
			alertDiv.innerHTML = '<div class="alert alert-error">All fields are required.</div>';
			return;
		}

		const emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
		if (!emailRegex.test(email)) {
			alertDiv.innerHTML = '<div class="alert alert-error">Please enter a valid email.</div>';
			return;
		}

		if (password.length < 6) {
			alertDiv.innerHTML = '<div class="alert alert-error">Password must be at least 6 characters long.</div>';
			return;
		}

		// Show loading state
		submitBtn.disabled = true;
		submitText.style.display = 'none';
		loadingSpinner.style.display = 'inline-block';

		// Debug: Show what we're sending
		console.log('Sending to:', '<?php echo base_url('api/register'); ?>');
		console.log('Payload:', JSON.stringify({
			email: email,
			username: username,
			password: password
		}));

		try {
			// Show a temporary message
			alertDiv.innerHTML = '<div class="alert" style="background-color: #e2e3e5; color: #41464b; border: 1px solid #d3d6d8;">Submitting registration data...</div>';

			const response = await fetch('<?php echo base_url('api/register'); ?>', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-Requested-With': 'XMLHttpRequest'
				},
				body: JSON.stringify({
					email: email,
					username: username,
					password: password
				})
			});

			console.log('Response Status:', response.status); // Log status code
			console.log('Response Headers:', {
				'Content-Type': response.headers.get('Content-Type')
			});

			let data;
			const contentType = response.headers.get('Content-Type');
			if (contentType && contentType.includes('application/json')) {
				data = await response.json();
				console.log('Response JSON Data:', data);
			} else {
				// If not JSON, get text
				const textData = await response.text();
				console.log('Response Text Data:', textData);
				// Try to parse as JSON anyway in case content type is wrong
				try {
					data = JSON.parse(textData);
				} catch (e) {
					console.error('Could not parse response as JSON:', e);
					// Create a simple object with the text data
					data = {
						error: 'Server did not return valid JSON. Raw response: ' +
							(textData.length > 100 ? textData.substring(0, 100) + '...' : textData)
					};
				}
			}

			if (response.ok) {
				// Success
				alertDiv.innerHTML = '<div class="alert alert-success">Registration successful! Redirecting to log in...</div>';

				// Clear form
				document.getElementById('registerForm').reset();

				// Redirect to login after 2 seconds
				setTimeout(() => {
					window.location.href = '<?php echo base_url('dashboard'); ?>';
				}, 2000);
			} else {
				// Error - show the actual error message from the server if available
				const errorMessage = data.error || data.message || 'Registration failed. Please try again.';
				alertDiv.innerHTML = '<div class="alert alert-error">' + errorMessage + '</div>';
			}
		} catch (error) {
			console.error('Network Error:', error);
			alertDiv.innerHTML = '<div class="alert alert-error">Network error occurred. Please check your connection and try again.</div>';
		} finally {
			// Reset loading state
			submitBtn.disabled = false;
			submitText.style.display = 'inline';
			loadingSpinner.style.display = 'none';
		}
	});

</script>
</body>

</html>