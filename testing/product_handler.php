<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");

require_once __DIR__ . '/../components/db_connection.php';

$action = $_GET['action'] ?? '';

switch ($action) {


    // -------------------------------------------------------
    // 1) GET BRANDS (Single-select dropdown)
    // -------------------------------------------------------
    case "get_brands":
        try {
            $stmt = $pdo->query("SELECT id, brand_name FROM brands ORDER BY brand_name ASC");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        catch (Exception $e) { echo json_encode(["error" => $e->getMessage()]); }
        break;


    // -------------------------------------------------------
    // 2) GET DEPARTMENTS BY BRAND (Multi-select)
    // -------------------------------------------------------
    case "get_departments_by_brand":
        $brand_id = $_GET["brand_id"] ?? 0;

        try {
            $stmt = $pdo->prepare("
                SELECT id, department_name 
                FROM departments 
                WHERE brand_id = ?
                ORDER BY department_name ASC
            ");
            $stmt->execute([$brand_id]);

            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        catch (Exception $e) { echo json_encode(["error" => $e->getMessage()]); }
        break;


    // -------------------------------------------------------
    // 3) GET CATEGORIES BY SELECTED DEPARTMENTS (Multi-select)
    // -------------------------------------------------------
    case "get_categories_by_departments":
        $department_ids = $_POST["departments"] ?? [];

        if (empty($department_ids)) {
            echo json_encode([]);
            exit;
        }

        $placeholders = implode(",", array_fill(0, count($department_ids), "?"));

        try {
            $stmt = $pdo->prepare("
                SELECT id, category_name 
                FROM categories
                WHERE department_id IN ($placeholders)
                ORDER BY category_name ASC
            ");
            $stmt->execute($department_ids);

            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        catch (Exception $e) { echo json_encode(["error" => $e->getMessage()]); }
        break;


    // -------------------------------------------------------
    // 4) GET RANGES BY SELECTED CATEGORIES (Multi-select)
    // -------------------------------------------------------
    case "get_ranges_by_categories":
        $category_ids = $_POST["categories"] ?? [];

        if (empty($category_ids)) {
            echo json_encode([]);
            exit;
        }

        $placeholders = implode(",", array_fill(0, count($category_ids), "?"));

        try {
            $stmt = $pdo->prepare("
                SELECT range_id AS id, range_name 
                FROM ranges
                WHERE category_id IN ($placeholders)
                ORDER BY range_name ASC
            ");
            $stmt->execute($category_ids);

            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        catch (Exception $e) { echo json_encode(["error" => $e->getMessage()]); }
        break;


    // -------------------------------------------------------
    // 5) PRODUCT SEARCH (code, new code, or name)
    // -------------------------------------------------------
    case "search_products":
        $query = $_GET["q"] ?? "";

        try {
            $stmt = $pdo->prepare("
                SELECT id, product_code, new_product_code, product_name, uom
                FROM products
                WHERE product_code LIKE ?
                   OR new_product_code LIKE ?
                   OR product_name LIKE ?
                ORDER BY product_name ASC
            ");

            $search = "%$query%";
            $stmt->execute([$search, $search, $search]);

            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        catch (Exception $e) { echo json_encode(["error" => $e->getMessage()]); }
        break;


    default:
        echo json_encode(["error" => "Invalid API action"]);
        break;
}
?>
