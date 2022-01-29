let fullName           = $('.fullName');
let phoneNumber        = $('.phoneNumber');
let message            = $('.message');

let fullNameError      = $('.fullNameError');
let phoneNumberError   = $('.phoneNumberError');
let messageError       = $('.messageError');

$('form').on('submit', (e) => {

    // This regex will cover a plethora of ways that'd suffice on a form in terms of how users
    // decide to input their phone number.  Of course, letters or other special characters will be rejected.
    let validatePhoneNumber = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g.test(phoneNumber.val());

    if(fullName.val().length > 20) {
        e.preventDefault();
        fullNameError.text("Too many characters!");
    }

    if(!validatePhoneNumber) {
        e.preventDefault();
        phoneNumberError.text("Invalid phone number!");
    }

    if(message.val().length < 10) {
        e.preventDefault();
        messageError.text("Please add more detail, your message is too short!");
    } else if(message.val().length > 1000) {
        e.preventDefault();
        messageError.text("Please make your message shorter.  It's too long!");
    }

});
