let generatedOTP;
let intervalId; // Interval ID স্টোর করার জন্য
let timeoutId;  // Timeout ID স্টোর করার জন্য

const otpExpireElem = document.getElementById('otp-expires-id');

const sendOTPBtn = document.getElementById("send-otp-btn");
const verifyOTPBtn = document.getElementById("verify-otp-btn");

sendOTPBtn.addEventListener("click", function () {
    generateOTP();
    sendOTPBtn.style.display = "none";       // Hide send OTP
    verifyOTPBtn.style.display = "none";     // Hide verify OTP initially
});

verifyOTPBtn.addEventListener("click", function () {
    validateOTP();
});

function expireOTP() {
    clearInterval(intervalId);
    clearTimeout(timeoutId);

    let slice = 300;

    intervalId = setInterval(function () {
        otpExpireElem.innerText = `OTP will expire in ${slice} seconds`;
        slice = slice - 1;

        if (slice < 0) {
            clearInterval(intervalId);
        }
    }, 1000);

    timeoutId = setTimeout(function () {
        otpExpireElem.innerText = "OTP Expired";

        sendOTPBtn.style.display = "inline-block";  // Show send button again
        verifyOTPBtn.style.display = "inline-block"; // Allow verify
    }, 15000);
}



function tackleOTPBoxes() {
    const boxes = document.getElementById('otp-box-list-id');
    boxes.addEventListener('input', function (e) {
        const target = e.target;
        const value = target.value;

        if (isNaN(value)) {
            target.value = "";
            return;
        }

        const nextElement = target.nextElementSibling;

        if (nextElement) {
            nextElement.focus();
        }

        validateOTP();
    });
}

function generateOTP() {
    generatedOTP = Math.floor(1000 + Math.random() * 9000);
    const otpElem = document.getElementById('generated-otp-id');
    otpElem.innerText = `Your OTP: ${generatedOTP}`;

    // Reset all input boxes
    const inputs = document.querySelectorAll('.otp-box');
    inputs.forEach(input => input.value = "");
    inputs[0].focus();

    expireOTP();
}

function validateOTP() {
    let typedNumber = "";
    const boxListElem = document.getElementById("otp-box-list-id");
    [...boxListElem.children].forEach((elem) => {
        typedNumber += elem.value;
    });

    const result = (generatedOTP === parseInt(typedNumber, 10));
    const resultElem = document.getElementById('result-id');

    if (result) {
        resultElem.innerText = "OTP is validated successfully";
        resultElem.classList.remove("fail");
        resultElem.classList.add("success");
    } else {
        resultElem.innerText = "OTP is invalid";
        resultElem.classList.remove("success");
        resultElem.classList.add("fail");
    }
}

function init() {
    console.log('JS initialization!!');
    tackleOTPBoxes();
    setTimeout(generateOTP, 2000);
}

init();
