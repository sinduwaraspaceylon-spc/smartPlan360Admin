<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require_once __DIR__ . '/../components/db_connection.php';

$action = $_GET['action'] ?? '';

try {
    switch ($action) {

        /* ---------------------------------------------------------
            BRAND DROPDOWN
        --------------------------------------------------------- */
        case 'get_brands':
            $stmt = $pdo->prepare("SELECT id, brand_name FROM brands ORDER BY brand_name ASC");
            $stmt->execute();
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            DEPARTMENTS BY BRAND
        --------------------------------------------------------- */
        case 'get_departments_by_brand':
            $brand_id = intval($_GET['brand_id'] ?? 0);

            $stmt = $pdo->prepare("SELECT id, department_name 
                                   FROM departments 
                                   WHERE brand_id = ?
                                   ORDER BY department_name ASC");
            $stmt->execute([$brand_id]);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            CATEGORIES BY DEPARTMENT
        --------------------------------------------------------- */
        case 'get_categories_by_department':
            $department_id = intval($_GET['department_id'] ?? 0);

            $stmt = $pdo->prepare("SELECT id, category_name 
                                   FROM categories 
                                   WHERE department_id = ?
                                   ORDER BY category_name ASC");
            $stmt->execute([$department_id]);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            RANGES BY CATEGORY (FIXED)
        --------------------------------------------------------- */
        case 'get_ranges_by_category':
            $category_id = intval($_GET['category_id'] ?? 0);

            $stmt = $pdo->prepare("
                SELECT range_id AS id, range_name 
                FROM ranges 
                WHERE category_id = ?
                ORDER BY range_name ASC
            ");
            $stmt->execute([$category_id]);

            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            GET ALL DEPARTMENTS (No filtering)
        --------------------------------------------------------- */
        case 'get_departments':
            $stmt = $pdo->prepare("SELECT id, department_name FROM departments ORDER BY department_name ASC");
            $stmt->execute();
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            GET CATEGORIES BY MULTIPLE DEPARTMENTS
        --------------------------------------------------------- */
        case 'get_categories':
            $department_ids = $_GET['department_ids'] ?? '';
            
            if (empty($department_ids)) {
                echo json_encode([]);
                break;
            }

            $ids = array_map('intval', explode(',', $department_ids));
            $ids = array_filter($ids, fn($id) => $id > 0);

            if (empty($ids)) {
                echo json_encode([]);
                break;
            }

            $placeholders = str_repeat('?,', count($ids) - 1) . '?';
            
            $sql = "SELECT id, category_name, department_id 
                    FROM categories 
                    WHERE department_id IN ($placeholders) 
                    ORDER BY category_name ASC";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($ids);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            SEARCH PRODUCTS
        --------------------------------------------------------- */
        case 'search_products':
            $search = trim($_GET['search'] ?? '');
            $department_ids = $_GET['department_ids'] ?? '';
            $category_ids = $_GET['category_ids'] ?? '';
            $range_id = intval($_GET['range_id'] ?? 0);
            $brand_id = intval($_GET['brand_id'] ?? 0);

            $sql = "
                SELECT p.id, p.product_code, p.new_product_code, p.product_name
                FROM products p
                LEFT JOIN ranges r ON p.range_id = r.range_id
                LEFT JOIN categories c ON p.category_id = c.id
                LEFT JOIN departments d ON p.department_id = d.id
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

            /* Brand filter */
            if ($brand_id > 0) {
                $sql .= " AND p.brand_id = ?";
                $params[] = $brand_id;
            }

            /* Department filter */
            if (!empty($department_ids)) {
                $ids = array_map('intval', explode(',', $department_ids));
                $ids = array_filter($ids);
                if (!empty($ids)) {
                    $sql .= " AND p.department_id IN (" . implode(",", array_fill(0, count($ids), "?")) . ")";
                    $params = array_merge($params, $ids);
                }
            }

            /* Category filter */
            if (!empty($category_ids)) {
                $ids = array_map('intval', explode(',', $category_ids));
                $ids = array_filter($ids);
                if (!empty($ids)) {
                    $sql .= " AND p.category_id IN (" . implode(",", array_fill(0, count($ids), "?")) . ")";
                    $params = array_merge($params, $ids);
                }
            }

            /* Range filter */
            if ($range_id > 0) {
                $sql .= " AND p.range_id = ?";
                $params[] = $range_id;
            }

            $sql .= " ORDER BY p.product_name ASC LIMIT 20";

            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            GET PRODUCTS (no search required)
        --------------------------------------------------------- */
        case 'get_products':
            $department_ids = $_GET['department_ids'] ?? '';
            $category_ids = $_GET['category_ids'] ?? '';
            $range_id = intval($_GET['range_id'] ?? 0);
            $brand_id = intval($_GET['brand_id'] ?? 0);
            $limit = intval($_GET['limit'] ?? 100);

            $sql = "
                SELECT p.id, p.product_code, p.new_product_code, p.product_name,
                       c.category_name, d.department_name, r.range_name
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.id
                LEFT JOIN departments d ON p.department_id = d.id
                LEFT JOIN ranges r ON p.range_id = r.range_id
                WHERE 1
            ";

            $params = [];

            /* Brand filter */
            if ($brand_id > 0) {
                $sql .= " AND p.brand_id = ?";
                $params[] = $brand_id;
            }

            /* Department filter */
            if (!empty($department_ids)) {
                $ids = array_map('intval', explode(',', $department_ids));
                $ids = array_filter($ids);
                if (!empty($ids)) {
                    $sql .= " AND p.department_id IN (" . implode(",", array_fill(0, count($ids), "?")) . ")";
                    $params = array_merge($params, $ids);
                }
            }

            /* Category filter */
            if (!empty($category_ids)) {
                $ids = array_map('intval', explode(',', $category_ids)); 
                $ids = array_filter($ids);
                if (!empty($ids)) {
                    $sql .= " AND p.category_id IN (" . implode(",", array_fill(0, count($ids), "?")) . ")";
                    $params = array_merge($params, $ids);
                }
            }

            /* Range filter */
            if ($range_id > 0) {
                $sql .= " AND p.range_id = ?";
                $params[] = $range_id;
            }

            $sql .= " ORDER BY p.product_name ASC LIMIT $limit";

            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            break;


        /* ---------------------------------------------------------
            INVALID ACTION
        --------------------------------------------------------- */
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
