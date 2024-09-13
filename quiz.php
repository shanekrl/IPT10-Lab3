<?php

require "helpers.php";

// Check if the HTTP method is POST, if not, redirect to index.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Retrieve POST data
$complete_name = $_POST['complete_name'] ?? '';
$email = $_POST['email'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';
$agree = $_POST['agree'] ?? '';
$answers = $_POST['answers'] ?? [];

// Retrieve all questions and options
$questions = get_questions();
$options = [];
foreach ($questions as $index => $question) {
    $options[$index] = get_options_for_question_number($index + 1);
}

// Determine the target URL
$target = 'result.php'; // Submit to results.php directly since all questions are displayed at once

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">  
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <script>
        // Auto-submit the form after 60 seconds
        setTimeout(() => {
            document.getElementById('quizForm').submit();
        }, 60000);
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>
    
    <form method="POST" id="quizForm" action="<?php echo htmlspecialchars($target); ?>">
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />
        <input type="hidden" name="agree" value="<?php echo htmlspecialchars($agree); ?>" />

        <?php foreach ($questions as $index => $question): ?>
        <div class="question">
            <h2 class="subtitle">Question <?php echo htmlspecialchars($index + 1); ?>:</h2>
            <p><?php echo htmlspecialchars($question['question']); ?></p>
            <?php
            $questionOptions = $options[$index] ?? [];
            if (empty($questionOptions)):
            ?>
            <p>No options available for this question.</p>
            <?php
            else:
                foreach ($questionOptions as $optionKey => $optionValue):
            ?>
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio"
                            name="answers[<?php echo htmlspecialchars($index); ?>]"
                            value="<?php echo htmlspecialchars($optionKey); ?>" />
                            <?php echo htmlspecialchars($optionValue); ?>
                    </label>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
        <?php endforeach; ?>

        <!-- Submit button -->
        <button type="submit" class="button">Submit</button>
    </form>
</section>
</body>
</html>