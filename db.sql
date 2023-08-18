CREATE TABLE users(
	id INT (11) NOT NULL AUTO_INCREMENT,
   	username VARCHAR(30) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);


CREATE TABLE user_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(50),
    surname VARCHAR(50),
    email VARCHAR(100),
    address VARCHAR(255),
    gender ENUM('Male', 'Female', 'Other'),
    country VARCHAR(50),
    phone VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO rooms (id, name, img, num_person, size, view, num_beds, hotel_id, hotel_name, status, price, expect, wifi, min_age, pickups, airport_location, num_bedrooms, num_bathrooms, price_includes, price_excludes, complementary)
VALUES
    (1, 'Deluxe Ocean View Suite', 'deluxeOcean.jpg', 2, '50 sqm', 'Panoramic ocean view', 1, 1, 'Ocean Oasis Resort', 'Available', 300.00, 'Experience luxury and breathtaking views...', 'Yes', 18, 'Yes', '10 km from the airport', 1, 1, 'Breakfast, Access to spa', 'Mini-bar items', 'Welcome drinks, Daily newspaper'),
    (2, 'Luxury Mountain View Suite', 'luxuryMountain.jpg', 2, '60 sqm', 'Scenic mountain view', 1, 2, 'Serene Valley Retreat', 'Available', 250.00, 'Escape to tranquility and natural beauty...', 'Yes', 21, 'Yes', '20 km from the airport', 1, 1, 'Full-board meals, Yoga sessions', 'Spa treatments', 'Guided hikes'),
    (3, 'Wilderness Cabin', 'wildernessCabin.jpg', 4, '80 sqm', 'Surrounded by wilderness', 2, 3, 'Wilderness Haven Lodge', 'Available', 180.00, 'Immerse yourself in the heart of nature...', 'Yes', 16, 'No', '50 km from the airport', 2, 1, 'Nature walks, Campfire access', 'Room service', 'Outdoor equipment rental'),
    (4, 'Panoramic Suite', 'panoramicSuite.jpg', 3, '70 sqm', '360-degree city view', 2, 4, 'Panorama Heights Hotel', 'Available', 280.00, 'Indulge in the urban panorama...', 'Yes', 18, 'Yes', '5 km from the airport', 1, 1, 'Access to rooftop bar, Gym', 'Minibar items', 'City tour tickets'),
    (5, 'Snowfall Chalet', 'snowfallChalet.jpg', 6, '120 sqm', 'Winter wonderland view', 3, 5, 'Snowfall Lodge', 'Available', 400.00, 'Experience the magic of snowy landscapes...', 'Yes', 20, 'Yes', '15 km from the airport', 3, 2, 'Ski pass, Hot chocolate bar', 'Spa treatments', 'Snowshoe rental'),
    (6, 'Ocean Breeze Room', 'oceanbreeze.jpg', 2, '45 sqm', 'Partial ocean view', 1, 1, 'Ocean Oasis Resort', 'Available', 200.00, 'Relax with the gentle ocean breeze...', 'Yes', 16, 'Yes', '10 km from the airport', 1, 1, 'Buffet breakfast, Beach access', 'Mini-bar items', 'Beach towel service'),
    (7, 'Valley View Retreat', 'valleyView.jpg', 3, '55 sqm', 'Scenic valley view', 1, 2, 'Serene Valley Retreat', 'Available', 220.00, 'Discover serenity amidst lush valleys...', 'Yes', 18, 'Yes', '20 km from the airport', 1, 1, 'Gourmet dining, Spa discounts', 'Personal items', 'Guided nature walks'),
    (8, 'Riverside Cabin', 'riverside.jpg', 4, '75 sqm', 'Riverside location', 2, 3, 'Wilderness Haven Lodge', 'Available', 190.00, 'Embrace the tranquility of the river...', 'Yes', 16, 'No', '50 km from the airport', 2, 1, 'Canoe rental, Fishing gear', 'Room service', 'Bonfire nights'),
    (9, 'Cityscape Suite', 'cityscape.jpg', 3, '65 sqm', 'City skyline view', 2, 4, 'Panorama Heights Hotel', 'Available', 260.00, 'Elevate your stay with stunning cityscapes...', 'Yes', 18, 'Yes', '5 km from the airport', 1, 1, 'Access to rooftop pool, Spa', 'Snacks in minibar', 'City tour tickets'),
    (10, 'Cozy Cabin', 'cozyCabin.jpg', 2, '40 sqm', 'Woodland surroundings', 1, 5, 'Snowfall Lodge', 'Available', 180.00, 'Experience snug comfort in the midst of snow...', 'Yes', 20, 'Yes', '15 km from the airport', 1, 1, 'Hot chocolate bar, Fireplace', 'Spa treatments', 'Snowshoe rental'),
    (11, 'Family Suite', 'familySuite.jpg', 4, '85 sqm', 'Garden and pool view', 2, 1, 'Ocean Oasis Resort', 'Available', 350.00, 'Ideal for a family getaway with pool views...', 'Yes', 16, 'Yes', '10 km from the airport', 2, 2, 'Kids club access, Buffet meals', 'Alcoholic beverages', 'Welcome fruit basket'),
    (12, 'Serenity Loft', 'serenityLoft.jpg', 2, '55 sqm', 'Tranquil garden view', 1, 2, 'Serene Valley Retreat', 'Available', 230.00, 'Discover peace and serenity in a loft setting...', 'Yes', 21, 'Yes', '20 km from the airport', 1, 1, 'Daily yoga sessions, Spa discounts', 'Personal items', 'Nature-inspired bath amenities'),
    (13, 'Wildlife Suite', 'wildlifeSuite.jpg', 3, '65 sqm', 'Wildlife reserve view', 2, 3, 'Wilderness Haven Lodge', 'Available', 210.00, 'Connect with nature in the heart of a reserve...', 'Yes', 18, 'No', '50 km from the airport', 1, 1, 'Guided wildlife tours, Campfire access', 'Room service', 'Binoculars rental'),
    (14, 'Skyline Penthouse', 'skyline.jpg', 4, '120 sqm', 'Panoramic cityscape view', 3, 4, 'Panorama Heights Hotel', 'Available', 450.00, 'Experience luxury living in a cityscape oasis...', 'Yes', 21, 'Yes', '5 km from the airport', 2, 2, 'Private butler, Spa treatments', 'Premium minibar items', 'Private rooftop terrace'),
    (15, 'Snowfall Suite', 'snowfall.jpg', 4, '95 sqm', 'Spectacular snowy panorama', 2, 5, 'Snowfall Lodge', 'Available', 380.00, 'Indulge in spacious comfort amidst snow-covered landscapes...', 'Yes', 20, 'Yes', '15 km from the airport', 2, 2, 'Ski rental, Gourmet dining', 'Spa treatments', 'Snowmobile experience');

