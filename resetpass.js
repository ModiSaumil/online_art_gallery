function onChange() {
    const password = document.querySelector('input[name=password]');
    const confirm = document.querySelector('input[name=confirm]');
    const curpass = document.querySelector('input[name=curpass]');

    if (curpass.value === password.value)
    {
        confirm.setCustomValidity('you can not set old password and new password same');
    } else if (confirm.value === password.value) 
    {
        confirm.setCustomValidity('');
    } else {
        confirm.setCustomValidity('Passwords do not match..');
    }


}


