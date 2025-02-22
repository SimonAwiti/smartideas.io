<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: user/login.php');
    exit();
}

include('../include/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idea_id = $_POST['idea_id'];
    $phone = $_SESSION['phone'];

    // Check if the idea belongs to the user
    $stmt = $conn->prepare("SELECT * FROM posted_ideas WHERE id = :idea_id AND phone = :phone");
    $stmt->bindParam(':idea_id', $idea_id);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    $idea = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($idea) {
        // Delete the idea
        $stmt = $conn->prepare("DELETE FROM posted_ideas WHERE id = :idea_id");
        $stmt->bindParam(':idea_id', $idea_id);
        $stmt->execute();
    }

    header('Location: posted_ideas.php');
    exit();
}
?>