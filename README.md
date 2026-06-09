# Mt. Kinetics — Eco-Conscious Trekking Portal

**Mt. Kinetics** is a responsive, web-based trek booking and management portal designed to promote sustainable, eco-friendly trekking and local tourism. Built using PHP, HTML, CSS, JavaScript, and MySQL, the application enables adventure seekers to discover treks, manage their profiles, book hikes, and allows administrators to curate treks and oversee user reservations.

---

## 🌟 Key Features

### 👤 User Panel
- **Trek Catalog:** Browse a dynamic grid of available treks (e.g., Mullayanagiri, Ranipuram Hills, Kudremukh) fetched in real-time from the database.
- **One-Click Booking:** Select any trek to automatically prefill booking forms with the trek code, name, and user email address.
- **Bookings Management:** View your current bookings and cancel pending trips directly from your personal dashboard.
- **Dynamic Profile Updates:** View and update your profile details (Name, Email, Phone number, and Password) with automatic field population.
- **Secure Authentication:** User sign-up and log-in with secure bcrypt password hashing.

### 🔑 Admin Panel
- **Trek Curation:** Create and upload new treks with custom details (Location, Date, Price, Description) and upload cover images.
- **User Management:** Track and manage registered users, including removing accounts if necessary.
- **Booking Approvals:** View, approve, or cancel booking requests in real-time.

---

## 🛠️ Tech Stack
- **Frontend:** Semantic HTML5, Vanilla CSS3 (custom responsive styling), JavaScript (Fetch API, DOM manipulation)
- **Backend:** PHP (Session management, secure request handling)
- **Database:** MySQL / MariaDB (utilizing PDO for secure parameterized queries and `mysqli`)

---

## 🚀 Setup & Installation

Follow these steps to run the application locally using **XAMPP**:

### 1. Clone/Move Files
Ensure the project folder `trecking` is placed inside your XAMPP's document root:
`C:\xampp\htdocs\trecking`

### 2. Configure Database Port
If your MySQL server runs on a custom port (like `3307`), connection strings are already configured in:
- `php/db.php`
- `php/get_treks.php`
- `php/add_trek.php`
- `php/book_trek.php`

### 3. Initialize MySQL Database
1. Open **phpMyAdmin** (`http://localhost/phpmyadmin` or `http://localhost:8080/phpmyadmin`).
2. Create a new database named **`mt_kinetics`**.
3. Import the SQL schema file located at:
   `C:\xampp\htdocs\trecking\Z other\setup_database.sql`

---

## 🔐 Default Credentials

### 🧑‍💼 Admin Account
- **Email:** `admin@gmail.com`
- **Password:** `admin123`

### 🧑‍💻 User Accounts
- **Email:** `hari@gmail.com` (or `ravi@gmail.com`)
- **Password:** `user123`

---

## 📄 License
This project is created for educational and final project purposes. All rights reserved.
