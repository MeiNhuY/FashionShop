<?php
require_once("Model.php");
class Detail extends Model
{
    function detail_sp($id)
    {
        $query =  "SELECT * from products where ProductID = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function getReviewsByProductId($product_id) {
        $stmt = $this->conn->prepare("
            SELECT reviews.*, users.Username AS Name 
            FROM reviews 
            JOIN users ON reviews.UserID = users.UserID 
            WHERE reviews.ProductID = ? 
            ORDER BY reviews.CreatedAt DESC
        ");
        if ($stmt) {
            $stmt->bind_param("i", $product_id); // "i" là kiểu integer
            $stmt->execute();
            $result = $stmt->get_result();
            $reviews = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
    
            // Kiểm tra các bình luận đã lấy được
            if (count($reviews) > 0) {
                return $reviews;
            } else {
                return []; // Trả về mảng rỗng nếu không có bình luận
            }
        } else {
            return [];
        }
    }

    

    // Thêm đánh giá mới
    public function addReview($product_id, $user_id, $rating, $comment) {
        $stmt = $this->conn->prepare("INSERT INTO reviews (ProductID, UserID, Rating, Comment) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment); // "iiis" là kiểu: integer, integer, integer, string
            $success = $stmt->execute();
            $stmt->close();
            return $success;
        } else {
            return false;
        }
    }

    public function checkUserReviewExists($user_id, $product_id) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM reviews WHERE UserID = ? AND ProductID = ?");
        if ($stmt) {
            $stmt->bind_param("ii", $user_id, $product_id); // "ii" là kiểu integer
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
    
            // Nếu count > 0, tức là người dùng đã đánh giá sản phẩm này
            return $count > 0;
        } else {
            return false;
        }
    }
    
   
}