// Get all users
fetch('http://localhost/antz/api/users')
	.then(response => response.json())
	.then(data => console.log(data));

// Create new user
fetch('http://localhost/antz/api/users', {
	method: 'POST',
	headers: {
		'Content-Type': 'application/json',
	},
	body: JSON.stringify({
		name: 'New User',
		email: 'newuser@example.com'
	})
})
	.then(response => response.json())
	.then(data => console.log(data));
