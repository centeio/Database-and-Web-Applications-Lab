<?
function getCurrentSpecialOccasions() {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"special-occasion\"
                            WHERE beginningdate <= CURRENT_DATE AND enddate >= CURRENT_DATE;");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllSpecialOccasionProducts($specialOccasionId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM product
                            WHERE availability = TRUE AND idspecialoccasion = ?
                            ORDER BY id ASC;");
    $stmt->execute(array($specialOccasionId));
    return $stmt->fetchAll();
}

function getSpecialOccasionGallery($specialOccasionId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"occasion-gallery\" JOIN image ON (idimage = image.id)
                            WHERE idspecialoccasion = ?
                            ORDER BY id ASC;");
    $stmt->execute(array($specialOccasionId));
    return $stmt->fetchAll();
}
?>