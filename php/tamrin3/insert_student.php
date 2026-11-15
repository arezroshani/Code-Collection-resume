<?php

require_once __DIR__ . "/config.php";
session_start();


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: pre-registration.php");
    exit;
}


$first = trim(strip_tags($_POST['first_name'] ?? ''));
$last = trim(strip_tags($_POST['last_name'] ?? ''));
$gender = $_POST['gender'] ?? '';
$birth = trim($_POST['birth_date'] ?? '');
$grade = $_POST['grade'] ?? '';
$prev = trim(strip_tags($_POST['prev_school'] ?? ''));
$studentAddress = trim(strip_tags($_POST['address'] ?? ''));
$parent = trim(strip_tags($_POST['parent_name'] ?? ''));
$relation = $_POST['relation'] ?? '';
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$city = trim(strip_tags($_POST['city'] ?? ''));
$bus = isset($_POST['bus']) ? 1 : 0;
$heard = $_POST['heard'] ?? '';
$notes = trim(strip_tags($_POST['notes'] ?? ''));
$agree = isset($_POST['agree']);



$errors = [];

if ($first === '') {
    $errors[] = "First name is required.";
}

if ($last === '') {
    $errors[] = "Last name is required.";
}

if ($gender === '') {
    $errors[] = "Please select gender.";
}

if ($birth === '') {
    $errors[] = "Birth date is required.";
}

if ($grade === '') {
    $errors[] = "Please select a grade.";
}

if ($studentAddress === '') {
    $errors[] = "Address is required.";
}

if ($parent === '') {
    $errors[] = "Parent name is required.";
}

if ($relation === '') {
    $errors[] = "Please select your relation to the student.";
}

if ($phone === '') {
    $errors[] = "Phone number is required.";
}

if ($email === '') {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

if ($city === '') {
    $errors[] = "City is required.";
}

if (!$agree) {
    $errors[] = "You must agree before submitting the registration.";
}


$validGrades = [
    "prek4",
    "prek5",
    "prek6",
    "g1",
    "g2",
    "g3",
    "g4",
    "g5",
    "g6",
    "g7",
    "g8"
];

$gradeLabels = [
    "prek4" => "Pre-K · Age 4",
    "prek5" => "Pre-K · Age 5",
    "prek6" => "Pre-K · Age 6",
    "g1" => "1st Grade",
    "g2" => "2nd Grade",
    "g3" => "3rd Grade",
    "g4" => "4th Grade",
    "g5" => "5th Grade",
    "g6" => "6th Grade",
    "g7" => "7th Grade",
    "g8" => "8th Grade"
];

if (!in_array($grade, $validGrades, true)) {
    $errors[] = "Invalid grade selected.";
}



$relations = [
    "mother",
    "father",
    "guardian"
];

if (!in_array($relation, $relations, true)) {
    $errors[] = "Invalid relation selected.";
}

$relationLabels = [
    "mother" => "Mother",
    "father" => "Father",
    "guardian" => "Legal guardian"
];


$validHeard = [
    "",
    "friends",
    "instagram",
    "google",
    "visit",
    "other"
];

if (!in_array($heard, $validHeard, true)) {
    $errors[] = "Invalid source selected.";
}

$heardLabels = [
    "" => "",
    "friends" => "Friends or family",
    "instagram" => "Instagram / social media",
    "google" => "Google search",
    "visit" => "Passed by the school",
    "other" => "Other"
];



$csrfSession = $_SESSION['csrf'] ?? '';
$csrfPost = $_POST['csrf'] ?? '';

if (
    !$csrfSession ||
    !$csrfPost ||
    !hash_equals($csrfSession, $csrfPost)
) {
    $errors[] = "Security validation failed. Please refresh the page and try again.";
}


$website = trim($_POST['website'] ?? '');

if ($website !== '') {
    $errors[] = "Invalid submission.";
}



if (!empty($errors)) {

    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;

    header("Location: pre-registration.php#form");
    exit;
}



$trackingCode = "TF-" .
    date("Ymd") .
    "-" .
    strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));



$gradeText = $gradeLabels[$grade];

$relationText = $relationLabels[$relation];

$heardText = $heardLabels[$heard] ?? '';

$previousSchool = ($prev !== '') ? $prev : null;

$heardAbout = ($heardText !== '') ? $heardText : null;

$notesValue = ($notes !== '') ? $notes : null;



try {

    $sql = "
        INSERT INTO students (
            tracking_code,
            first_name,
            last_name,
            gender,
            birth_date,
            grade,
            previous_school,
            address,
            parent_name,
            relation,
            phone,
            email,
            city,
            bus,
            heard_about,
            notes
        )
        VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )
    ";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception(
            "Prepare failed: " . $conn->error
        );
    }


    $stmt->bind_param(
        "sssssssssssssiss",
        $trackingCode,
        $first,
        $last,
        $gender,
        $birth,
        $gradeText,
        $previousSchool,
        $studentAddress,
        $parent,
        $relationText,
        $phone,
        $email,
        $city,
        $bus,
        $heardAbout,
        $notesValue
    );



    if (!$stmt->execute()) {
        throw new Exception(
            "Insert failed: " . $stmt->error
        );
    }


    $_SESSION['done'] = true;
    $_SESSION['doneCode'] = $trackingCode;
    $_SESSION['doneName'] = $first . " " . $last;

    unset($_SESSION['old']);
    unset($_SESSION['errors']);


    $stmt->close();
    $conn->close();


   header("Location: pre-registration.php#form");
    exit;


} catch (Exception $e) {

    $_SESSION['errors'] = [
        "Database error: " . $e->getMessage()
    ];

    $_SESSION['old'] = $_POST;

    header("Location: pre-registration.php#form");
    exit;
}