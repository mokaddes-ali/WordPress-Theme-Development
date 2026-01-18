<?php
/**
 * Verify OTP Form
 * 
 * @package lessonlms
 */
?>
<div class="container">
         <div id="otp-box-id" class="otp-box-container">
        <h1>Enter OTP</h1>
        <div id="otp-box-list-id" class="otp-box-list">
            <input type="text" class="otp-box" maxlength="1" />
            <input type="text" class="otp-box" maxlength="1" />
            <input type="text" class="otp-box" maxlength="1" />
            <input type="text" class="otp-box" maxlength="1" />
        </div>

        <p id="generated-otp-id" class="generated-otp">...</p>
        <!-- <button onclick="generateOTP()">Generate OTP</button> -->
         <!-- Add inside otp-box-id div -->
<button id="send-otp-btn">Send New OTP</button>
<button id="verify-otp-btn" style="display: none;">Verify OTP</button>

        <p id="result-id" class="otp-validate-message"></p>
        <p id="otp-expires-id"></p>
    </div>
</div>