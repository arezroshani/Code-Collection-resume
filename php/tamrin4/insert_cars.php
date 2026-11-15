<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cars.php");
    exit;
}

$carName    = trim($_POST["car_name"] ?? "");
$carYear    = trim($_POST["car_model_year"] ?? "");
$carColor   = trim($_POST["car_color"] ?? "");
$carPrice   = trim($_POST["car_price"] ?? "");
$carStatus  = trim($_POST["car_status"] ?? "");
$carMileage = trim($_POST["car_mileage"] ?? "");

if (
    $carName === "" ||
    $carYear === "" ||
    $carColor === "" ||
    $carPrice === "" ||
    $carStatus === "" ||
    $carMileage === ""
) {
    $_SESSION["flash"] = [
        "type" => "error",
        "message" => "Please complete all fields."
    ];

    header("Location: cars.php");
    exit;
}

if (
    !preg_match('/^\d{4}$/', $carYear) ||
    (int)$carYear < 1886 ||
    (int)$carYear > (int)date("Y") + 1
) {
    $_SESSION["flash"] = [
        "type" => "error",
        "message" => "Please enter a valid model year."
    ];

    header("Location: cars.php");
    exit;
}

if (
    mb_strlen($carName) > 50 ||
    mb_strlen($carColor) > 10 ||
    !preg_match('/^\d{1,10}$/', $carPrice)
) {
    $_SESSION["flash"] = [
        "type" => "error",
        "message" => "Please check the name, color and price."
    ];

    header("Location: cars.php");
    exit;
}

if (!preg_match('/^\d+$/', $carMileage)) {
    $_SESSION["flash"] = [
        "type" => "error",
        "message" => "Please enter a valid mileage."
    ];

    header("Location: cars.php");
    exit;
}

$allowedStatuses = [
    "Available",
    "Reserved",
    "Sold",
    "In service",
    "New",
    "Used"
];

if (!in_array($carStatus, $allowedStatuses, true)) {
    $_SESSION["flash"] = [
        "type" => "error",
        "message" => "Please select a valid car status."
    ];

    header("Location: cars.php");
    exit;
}

$sql = "INSERT INTO cars
        (car_name, car_model_year, car_color, car_price,
         car_status, car_mileage)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    $_SESSION["flash"] = [
        "type" => "error",
        "message" => "Could not prepare the database query."
    ];

    header("Location: cars.php");
    exit;
}

$stmt->bind_param(
    "sssssi",
    $carName,
    $carYear,
    $carColor,
    $carPrice,
    $carStatus,
    $carMileage
);

if ($stmt->execute()) {
    $_SESSION["flash"] = [
        "type" => "success",
        "message" => "Your car has been added successfully!"
    ];
} else {
    $_SESSION["flash"] = [
        "type" => "error",
        "message" => "Something went wrong. Please try again."
    ];
}

$stmt->close();
$conn->close();

header("Location: cars.php");
exit;
?>