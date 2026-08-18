
<?php
date_default_timezone_set('Asia/Manila');
// tell the browser we returning JSON data
header("Content-Type: application/json", "charset=utf-8");


// receives the raw JSON payload from the fetch request
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true); // true converts it  to an associative array

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid JSON received."
    ]);
    exit;
}

$filePath = 'notes.json';
$notes = [];

// Read the existing JSON file if it exists
if (file_exists($filePath)) {
    $fileData = file_get_contents($filePath);

    // Convert the existing JSON file contents back into a PHP array
    $decodedData = json_decode($fileData, true) ?? [];

    // Double check that the existing data is actually an array
    if (is_array($decodedData)) {
        $notes = $decodedData;
    }
}

if (isset($data['action']) && $data['action'] === "delete" && isset($data['id'])) {

    $index = array_search($data['id'], array_column($notes, 'id'));

    if ($index !== false) {
        unset($notes[$index]); // remove the note
        $notes = array_values($notes); // reindex array
    }

    if (file_put_contents($filePath, json_encode($notes, JSON_PRETTY_PRINT), LOCK_EX)) {
        echo json_encode([
            "status" => "success",
            "message" => "Note deleted",
            "id" => $data['id']
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to delete note"
        ]);
    }
    exit;
}

// CREATE/UPDATE
// if no id, create new one
if(!isset($data['id'])) {
    $data['id'] = uniqid();
}

// Add timestamp
$data['updated_at'] = date("Y-m-d H:i:s");



$found = false;
foreach ($notes as &$note) {
    if ((string) $note['id'] === (string) $data['id']) {
        $note['title'] = $data['title'];
        $note['content'] = $data['content'];
        $note['updated_at'] = $data['updated_at'];
        $note['isFavorite'] = $data['isFavorite'];
        $found = true;
        break;
    }
}
unset($note);

if (!$found) {
    // Append/Push the new entry into our PHP array
    $notes[] = $data;
}

// Convert the updated array back to JSON text and save it over the old file
// JSON_PRETTY_PRINT makes the file easy for humans to read
if (file_put_contents($filePath, json_encode($notes, JSON_PRETTY_PRINT), LOCK_EX)) {
    echo json_encode([
        "status" => "success", 
        "message" => "Data successfully appended to JSON file",
        "id" => $data['id']
    ]);
} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Failed to write to file"
    ]);
}


