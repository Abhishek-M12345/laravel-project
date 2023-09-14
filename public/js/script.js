document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    // You can implement your login logic here.
    // For a simple example, let's assume a hardcoded username and password.
    const validUsername = 'user123';
    const validPassword = 'pass456';
    
    if (username === validUsername && password === validPassword) {
      document.getElementById('loginStatus').textContent = 'Login successful!';
    } else {
      document.getElementById('loginStatus').textContent = 'Invalid username or password.';
    }
  });
  