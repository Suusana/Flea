function register(username, email, phone, password, Cpassword) {
    var password = document.getElementById('password').value;
    var Cpassword = document.getElementById('Cpassword').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    if (username == null || username.trim() == "" || phone == null || phone.trim() == "" || email == null || email.trim() == "" || Cpassword == null || Cpassword.trim() == "" || password == null || password.trim() == "") {
        alert('You have to complete the register form!');
        return;
    } else if (password != Cpassword) {
        alert('Your password entered twice is not same!!')
        return;
    }
    document.getElementById("registerForm").submit();
}
