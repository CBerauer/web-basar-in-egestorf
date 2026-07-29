<?php
/**
 * Save Basar Configuration
 * Simple PHP backend to save config.js
 */

// Security headers
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

// Get JSON data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    exit;
}

// Validate required fields
$required = ['nextBasar', 'spring', 'fall'];
foreach ($required as $field) {
    if (!isset($data[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => "Missing field: $field"]);
        exit;
    }
}

// Generate config.js content
$configContent = "// Basar Configuration - Update this file twice per year\n";
$configContent .= "const basarConfig = {\n";
$configContent .= "    // Spring Basar\n";
$configContent .= "    spring: {\n";
$configContent .= "        date: \"" . addslashes($data['spring']['date']) . "\",\n";
$configContent .= "        time: \"" . addslashes($data['spring']['time']) . "\",\n";
$configContent .= "        registrationOpenDate: \"" . addslashes($data['spring']['registrationOpenDate']) . "\",\n";
$configContent .= "        registrationOpenTime: \"" . addslashes($data['spring']['registrationOpenTime']) . "\",\n";
$configContent .= "        registrationFull: " . ($data['spring']['registrationFull'] ? 'true' : 'false') . ",\n";
$configContent .= "        registrationURL: \"" . addslashes($data['spring']['registrationURL']) . "\"\n";
$configContent .= "    },\n\n";
$configContent .= "    // Fall Basar\n";
$configContent .= "    fall: {\n";
$configContent .= "        date: \"" . addslashes($data['fall']['date']) . "\",\n";
$configContent .= "        time: \"" . addslashes($data['fall']['time']) . "\",\n";
$configContent .= "        registrationOpenDate: \"" . addslashes($data['fall']['registrationOpenDate']) . "\",\n";
$configContent .= "        registrationOpenTime: \"" . addslashes($data['fall']['registrationOpenTime']) . "\",\n";
$configContent .= "        registrationFull: " . ($data['fall']['registrationFull'] ? 'true' : 'false') . ",\n";
$configContent .= "        registrationURL: \"" . addslashes($data['fall']['registrationURL']) . "\"\n";
$configContent .= "    },\n\n";
$configContent .= "    // Location info (rarely changes)\n";
$configContent .= "    location: {\n";
$configContent .= "        venue: \"Fritz-Ahrberg-Halle\",\n";
$configContent .= "        subVenue: \"(Turnhalle Ernst-Reuter-Schule)\",\n";
$configContent .= "        address: \"Nienstedter Str. 15\",\n";
$configContent .= "        city: \"Barsinghausen / Egestorf\"\n";
$configContent .= "    },\n\n";
$configContent .= "    // Which basar is next? 'spring' or 'fall'\n";
$configContent .= "    nextBasar: '" . addslashes($data['nextBasar']) . "',\n\n";
$configContent .= "    // Get current basar info\n";
$configContent .= "    getCurrent: function() {\n";
$configContent .= "        return this[this.nextBasar];\n";
$configContent .= "    }\n";
$configContent .= "};\n";

// Backup existing config.js
$configFile = __DIR__ . '/config.js';
$backupFile = __DIR__ . '/config.js.backup.' . date('Y-m-d_His');

if (file_exists($configFile)) {
    if (!copy($configFile, $backupFile)) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Failed to create backup']);
        exit;
    }
}

// Write new config.js
if (file_put_contents($configFile, $configContent) === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to write config file']);
    exit;
}

// Success
echo json_encode([
    'success' => true,
    'message' => 'Configuration saved successfully',
    'backup' => basename($backupFile)
]);
?>
