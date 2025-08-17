<?php
/**
 * API-Einstiegspunkt für den Voting-Chartbreaker-Executing-Server
 * Einfache Routing-Logik für verschiedene API-Endpunkte
 */

// Set content type to JSON
header('Content-Type: application/json');

// Enable CORS for development
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Autoloader für Klassen (falls Composer später hinzugefügt wird)
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}

// Manueller Autoloader für src-Verzeichnis
spl_autoload_register(function ($className) {
    $file = __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Einfache Routing-Logik
$action = $_GET['action'] ?? 'default';
$method = $_SERVER['REQUEST_METHOD'];

try {
    switch ($action) {
        case 'ping':
            handlePing();
            break;
        
        case 'dashboard':
            handleDashboard();
            break;
        
        default:
            handleDefault();
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal Server Error',
        'message' => $e->getMessage()
    ]);
}

/**
 * Health-Check-Endpunkt
 */
function handlePing()
{
    echo json_encode([
        'status' => 'ok',
        'message' => 'Voting-Chartbreaker-Executing-Server is running',
        'timestamp' => date('c'),
        'version' => '1.0.0'
    ]);
}

/**
 * Dashboard-Endpunkt
 */
function handleDashboard()
{
    require_once __DIR__ . '/../src/Controller/ChartbreakerController.php';
    
    $controller = new Controller\ChartbreakerController();
    $data = $controller->dashboardData();
    
    echo json_encode($data);
}

/**
 * Standard-Endpunkt mit verfügbaren Aktionen
 */
function handleDefault()
{
    echo json_encode([
        'message' => 'Voting-Chartbreaker-Executing-Server API',
        'version' => '1.0.0',
        'available_endpoints' => [
            'ping' => '/?action=ping',
            'dashboard' => '/?action=dashboard'
        ]
    ]);
}