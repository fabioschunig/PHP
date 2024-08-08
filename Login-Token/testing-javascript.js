
// testing token in browser console
// php -S localhost:8080

fetch('http://localhost:8080/login.php')
    .then(res => res.text())
    .then(token => console.log(token));

// using session storage
fetch('http://localhost:8080/login.php')
    .then(res => res.text())
    .then(token => sessionStorage.setItem('token', token));

// using stored token
fetch('http://localhost:8080/token.php', {
    headers: {
        Authorization: sessionStorage.getItem('token')
    }
})
    .then(res => res.text())
    .then(user => console.log(user));

// test for JWT token
fetch('http://localhost:8080/jwt.php?email=test@email.com')
    .then(res => res.text())
    .then(token => console.log(token));

// using session storage for JWT
fetch('http://localhost:8080/jwt.php?email=test@email.com')
    .then(res => res.text())
    .then(token => sessionStorage.setItem('token_jwt', token));

// using JWT token
fetch('http://localhost:8080/token-jwt.php', {
    headers: {
        Authorization: sessionStorage.getItem('token_jwt')
    }
})
    .then(res => res.text())
    .then(user => console.log(user));
