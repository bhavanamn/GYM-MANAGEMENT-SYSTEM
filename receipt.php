<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <script>
        // add submit event listener
        form.addEventListener('submit', function (event) {
            // prevent form submission
            event.preventDefault();

            // get form fields
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const membershipType = document.querySelector('input[name="fav_language"]:checked');
            const plan = document.querySelector('input[name="age"]:checked');
            const cardNumber = document.getElementById('card-number');
            const expirationDate = document.getElementById('expiration-date');
            const cvv = document.getElementById('cvv');

            // set regular expressions for validation
            const nameRegex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const cardNumberRegex = /^\d{16}$/;
            const expirationDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
            const cvvRegex = /^\d{3}$/;

            // validate form fields
            let valid = true;

            if (!nameRegex.test(name.value)) {
                name.classList.add('invalid');
                valid = false;
            } else {
                name.classList.remove('invalid');
            }

            if (!emailRegex.test(email.value)) {
                email.classList.add('invalid');
                valid = false;
            } else {
                email.classList.remove('invalid');
            }

            if (!membershipType) {
                membershipType = document.createElement('span');
                membershipType.innerHTML = 'Not selected';
            }

            if (!plan) {
                plan = document.createElement('span');
                plan.innerHTML = 'Not selected';
            }

            if (!cardNumberRegex.test(cardNumber.value)) {
                cardNumber.classList.add('invalid');
                valid = false;
            } else {
                cardNumber.classList.remove('invalid');
            }

            if (!expirationDateRegex.test(expirationDate.value)) {
                expirationDate.classList.add('invalid');
                valid = false;
            } else {
                expirationDate.classList.remove('invalid');
            }

            if (!cvvRegex.test(cvv.value)) {
                cvv.classList.add('invalid');
                valid = false;
            } else {
                cvv.classList.remove('invalid');
            }

            // if form is valid, show receipt
            if (valid) {
                // create receipt details
                const receiptDetails = document.createElement('ul');
                receiptDetails.innerHTML = `
                        <li>Name: ${name.value}</li>
                        <li>Email: ${email.value}</li>
                        <li>Membership Type: ${membershipType.value}</li>
                        <li>Plan: ${plan.value}</li>
                        <li>Card Number: ${cardNumber.value}</li>
                        <li>Expiration Date: ${expirationDate.value}</li>
                        <li>CVV: ${cvv.value}</li>
                    `;

                // display receipt
                const receipt = document.getElementById('receipt');
                receipt.innerHTML = '';
                receipt.appendChild(receiptDetails);
                receipt.classList.add('show');
            }
        });
    </script>

</head>

<body>
    <div class="container">
        <h1>Payment Receipt</h1>
        <p>Thank you for your payment. Here are your payment details:</p>
        <ul id="receipt-details"></ul>
    </div>
    <script src="script_receipt.js"></script>
</body>

</html>