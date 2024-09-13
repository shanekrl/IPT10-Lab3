<?php

define('MAX_QUESTION_NUMBER', 50);

function retrieve_questions() {
    // Open the questions/triviaquiz.json file
    $json_string = file_get_contents("./questions/triviaquiz.json");
    
    // Convert it to an array
    $json_data = json_decode($json_string, true);
    
    // Return the trivia questions array data
    return $json_data;
}

function get_questions() {
    $questions = retrieve_questions();
    return $questions['questions'];
}

function get_options_for_question_number($number = 0) {
    $questions = retrieve_questions();
    if (isset($questions['questions'][$number - 1])) {
        $options = $questions['questions'][$number - 1]['options'] ?? [];
        $formatted_options = [];
        foreach ($options as $option) {
            $formatted_options[$option['key']] = $option['value'];
        }
        return $formatted_options;
    }
    return [];
}

function compute_score($answers = []) {
    $questions = retrieve_questions();
    $correct_answers = $questions['answers'];

    $score = 0;
    foreach ($answers as $index => $answer) {
        if (isset($correct_answers[$index]) && $correct_answers[$index] == $answer) {
            $score += 1; // 1 point per correct answer
        }
    }
    return $score;
}


function get_answers() {
    $questions = retrieve_questions();
    return $questions['answers'];
}