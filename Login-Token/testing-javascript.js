
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
