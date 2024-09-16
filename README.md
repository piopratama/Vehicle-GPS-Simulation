
# Vehicle GPS Simulation (Ragunan to Blok M)

This project simulates the movement of a vehicle using the Google Maps API and Directions API. The vehicle's GPS coordinates are sent to a MySQL database and fetched periodically to display real-time movement on the map.

## Features
- Simulates real-time GPS data for a vehicle.
- Displays the real route from Ragunan Zoo to Blok M, Jakarta, using Google Directions API.
- Sends GPS coordinates to a MySQL database via a PHP backend.
- Fetches and displays the vehicle's position on a Google Maps interface.
- Read-only setup with restricted API key for security.

## Prerequisites

1. **Google Cloud Platform**:
   - [Google Maps JavaScript API](https://developers.google.com/maps/documentation/javascript/overview)
   - [Google Directions API](https://developers.google.com/maps/documentation/directions/overview)

2. **LAMP/WAMP Stack**:
   - **Apache** or any web server
   - **PHP 7+** for backend scripts
   - **MySQL** for storing vehicle GPS data

3. **Git** (optional for cloning the repository)

## Project Setup

### Step 1: Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/vehicle-gps-simulation.git
cd vehicle-gps-simulation
```

### Step 2: Set Up the MySQL Database

1. **Create the MySQL database** and table to store vehicle GPS positions.

   ```sql
   CREATE DATABASE vehicle_db;

   CREATE TABLE vehicle_positions (
       id INT AUTO_INCREMENT PRIMARY KEY,
       vehicle_id INT,
       latitude DOUBLE,
       longitude DOUBLE,
       timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
   );
   ```

2. **Create a read-only MySQL user** (optional but recommended for security):

   ```sql
   CREATE USER 'readonly_user'@'localhost' IDENTIFIED BY 'your_password';
   GRANT SELECT ON vehicle_db.* TO 'readonly_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

### Step 3: Configure PHP Scripts

1. **Update the PHP scripts** (`addPosition.php` and `getPositions.php`) with your MySQL credentials.
   
   In `addPosition.php` and `getPositions.php`, replace the `$username`, `$password`, and `$dbname` variables with the correct values.

   ```php
   // Example configuration
   $servername = "localhost";
   $username = "root";  // Change to your MySQL username
   $password = "";      // Change to your MySQL password
   $dbname = "vehicle_db";
   ```

### Step 4: Get Your Google Maps API Key

1. Go to the [Google Cloud Console](https://console.cloud.google.com/).
2. Create a new project (if you don't have one).
3. Enable the **Google Maps JavaScript API** and **Directions API**.
4. Get your **API key** and restrict it to your domain or localhost (for local development).

   - Go to **Credentials** in the **APIs & Services** section.
   - Create a new API key or use an existing one.
   - Restrict the key to only allow requests from your domain or `localhost` for development.

### Step 5: Update the API Key

Replace `YOUR_API_KEY` in the HTML file with your Google Maps API key:

```html
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=geometry"></script>
```

### Step 6: Run the Project

1. **Start your web server** (Apache, Nginx, etc.).
2. Open the project in your browser:
   - For local development: `http://localhost/vehicle-gps-simulation/`
   - For a live server, upload the project to your web host and open the corresponding URL.

### Step 7: Simulate GPS Data

- Click the **"Start Simulation"** button to simulate vehicle movement.
- The vehicle marker will follow the route from Ragunan to Blok M, with GPS data being sent to the MySQL database and fetched in real-time to display on the map.

## Project Structure

```
vehicle-gps-simulation/
├── addPosition.php        # PHP script to insert GPS data into MySQL
├── getPositions.php       # PHP script to retrieve GPS data from MySQL
├── index.html             # Main HTML page with the Google Maps integration
└── README.md              # Project documentation
```

## Security Considerations

- **API Key Protection**: Make sure to restrict your API key by referrer to avoid abuse. Do this in the [Google Cloud Console](https://console.cloud.google.com/).
- **Read-Only MySQL User**: For better security, create a read-only user for fetching GPS data in `getPositions.php`.

## License

This project is open-source and available under the [MIT License](LICENSE).
