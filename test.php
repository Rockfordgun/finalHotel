<!DOCTYPE html>
<html>

<head>
    <title>Leave a Review</title>
</head>

<body>
    <h1>Leave a Review</h1>
    <form method="post" action="./includes/process_review.php" enctype="multipart/form-data">
        <label for="hotelName">Select Hotel:</label>
        <select id="hotelName" name="hotelName" required>
            <option value="Ocean Oasis Resort">Ocean Oasis Resort</option>
            <option value="Mountain Lodge">Mountain Lodge</option>
            <!-- Add more hotel options as needed -->
        </select><br><br>


        <label for="clientName">Your Name:</label>
        <input type="text" id="clientName" name="clientName" required><br><br>

        <label for="clientPosition">Your Occupation:</label>
        <input type="text" id="clientPosition" name="clientPosition"><br><br>

        <label for="starRating">Star Rating:</label>
        <select id="starRating" name="starRating">
            <option value="1">1 star</option>
            <option value="2">2 stars</option>
            <option value="3">3 stars</option>
            <option value="4">4 stars</option>
            <option value="5">5 stars</option>
        </select><br><br>

        <label for="userReview">Your Review:</label><br>
        <textarea id="userReview" name="userReview" rows="4" cols="50" required></textarea><br><br>

        <label for="userImage">Upload Photo (optional):</label>
        <input type="file" id="userImage" name="userImage"><br><br>

        <input type="submit" name="submit" value="Submit Review">
    </form>
</body>

</html>