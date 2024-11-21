<?php 
require_once("Model.php");

class Promotion extends Model {

    public function detail_promotion($id) {
        // Sử dụng prepared statement để bảo mật
        $sql = "SELECT * FROM promotions WHERE PromotionID = ?";
        $stmt = $this->conn->prepare($sql);  // Chuẩn bị câu lệnh SQL
        $stmt->bind_param("s", $id);  // "s" là kiểu dữ liệu của $id (string)
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
