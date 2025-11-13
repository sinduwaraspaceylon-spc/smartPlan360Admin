<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require_once __DIR__ . '/../components/db_connection.php';

$action = $_GET['action'] ?? '';

try {
    switch ($action) {

        // Get departments
        case 'get_departments':
            $stmt = $pdo->prepare("SELECT id, department_name FROM departments ORDER BY department_name ASC");
            $stmt->execute();
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;

        // Get categories by multiple departments
        case 'get_categories':
            $department_ids = $_GET['department_ids'] ?? '';
            
            if (empty($department_ids)) {
                echo json_encode([]);
                break;
            }

            // Convert comma-separated string to array and sanitize
            $ids = array_map('intval', explode(',', $department_ids));
            $ids = array_filter($ids, function($id) { return $id > 0; });

            if (empty($ids)) {
                echo json_encode([]);
                break;
            }

            // Create placeholders for IN clause
            $placeholders = str_repeat('?,', count($ids) - 1) . '?';
            
            $sql = "SELECT id, category_name, department_id 
                    FROM categories 
                    WHERE department_id IN ($placeholders) 
                    ORDER BY category_name ASC";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($ids);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;

        // Search products with filters
        case 'search_products':
            $search = trim($_GET['search'] ?? '');
            $department_ids = $_GET['department_ids'] ?? '';
            $category_ids = $_GET['category_ids'] ?? '';

            $sql = "
                SELECT p.id, p.product_code, p.new_product_code, p.product_name
                FROM products p
                INNER JOIN categories c ON p.category_id = c.id
                INNER JOIN departments d ON c.department_id = d.id
                WHERE 1
            ";

            $params = [];

            if ($search !== '') {
                $sql .= " AND (p.product_code LIKE ? OR p.new_product_code LIKE ? OR p.product_name LIKE ?)";
                $searchParam = "%{$search}%";
                $params[] = $searchParam;
                $params[] = $searchParam;
                $params[] = $searchParam;
            }

            // Filter by multiple departments
            if (!empty($department_ids)) {
                $depIds = array_map('intval', explode(',', $department_ids));
                $depIds = array_filter($depIds, function($id) { return $id > 0; });
                
                if (!empty($depIds)) {
                    $placeholders = str_repeat('?,', count($depIds) - 1) . '?';
                    $sql .= " AND d.id IN ($placeholders)";
                    $params = array_merge($params, $depIds);
                }
            }

            // Filter by multiple categories
            if (!empty($category_ids)) {
                $catIds = array_map('intval', explode(',', $category_ids));
                $catIds = array_filter($catIds, function($id) { return $id > 0; });
                
                if (!empty($catIds)) {
                    $placeholders = str_repeat('?,', count($catIds) - 1) . '?';
                    $sql .= " AND c.id IN ($placeholders)";
                    $params = array_merge($params, $catIds);
                }
            }

            $sql .= " ORDER BY p.product_name ASC LIMIT 20";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;

        // Get all products by filters (no search query required)
        case 'get_products':
            $department_ids = $_GET['department_ids'] ?? '';
            $category_ids = $_GET['category_ids'] ?? '';
            $limit = intval($_GET['limit'] ?? 100);

            $sql = "
                SELECT p.id, p.product_code, p.new_product_code, p.product_name, 
                       c.category_name, d.department_name
                FROM products p
                INNER JOIN categories c ON p.category_id = c.id
                INNER JOIN departments d ON c.department_id = d.id
                WHERE 1
            ";

            $params = [];

            // Filter by multiple departments
            if (!empty($department_ids)) {
                $depIds = array_map('intval', explode(',', $department_ids));
                $depIds = array_filter($depIds, function($id) { return $id > 0; });
                
                if (!empty($depIds)) {
                    $placeholders = str_repeat('?,', count($depIds) - 1) . '?';
                    $sql .= " AND d.id IN ($placeholders)";
                    $params = array_merge($params, $depIds);
                }
            }

            // Filter by multiple categories
            if (!empty($category_ids)) {
                $catIds = array_map('intval', explode(',', $category_ids));
                $catIds = array_filter($catIds, function($id) { return $id > 0; });
                
                if (!empty($catIds)) {
                    $placeholders = str_repeat('?,', count($catIds) - 1) . '?';
                    $sql .= " AND c.id IN ($placeholders)";
                    $params = array_merge($params, $catIds);
                }
            }

            // Add LIMIT directly to SQL instead of as a parameter
            $sql .= " ORDER BY p.product_name ASC LIMIT " . $limit;
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;

        // invalid action
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}