<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>
<body>
<section class="section">
    <h1 class="title">User Registration</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
    </h2>
    <form method="POST" action="instructions.php">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" id="complete_name" name="complete_name" placeholder="Complete Name" oninput="validateForm()">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" id="email" name="email" type="email" oninput="validateForm()" />
            </div>
        </div>

        <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
                <input class="input" name="birthdate" type="date" />
            </div>
        </div>

        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input class="input" name="contact_number" type="number" />
            </div>
        </div>

        <!-- Next button -->
        <button type="submit" id="nextButton" class="button is-link" disabled>Proceed Next</button>
    </form>
</section>

<script>
function validateForm() {
    const name = document.getElementById('complete_name').value.trim();
    const email = document.getElementById('email').value.trim();
    const nextButton = document.getElementById('nextButton');

    // Basic email validation regex
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (name !== '' && emailPattern.test(email)) {
        nextButton.disabled = false;
    } else {
        nextButton.disabled = true;
    }
}
</script>

</body>
</html>