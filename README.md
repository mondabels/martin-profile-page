# Advance Web Development Prelim Terminal Exam

## Description
This is a CodeIgniter 4 web application demonstrating a complete CRUD module for managing records/inventory.  
The system includes user authentication, dashboard, and role-based access.

---

## Database

**Database Name:** `adminpanel`

**Tables (used in this project):**
- `users`
- `records` (inventory/grades)

## Credentials to Test Login

**Admin Account:**
- Username: `admin`
- Password: `admin123`

## Setup Steps (Short Version)

1. Clone or copy the project to your server (e.g., `htdocs` or `www`).  
2. Import the database `adminpanel.sql` in MySQL/MariaDB.  
3. Update database credentials in `.env` or `app/Config/Database.php`.  
4. Make sure `writable/` has proper write permissions.  
5. Open in browser: `http://localhost:8080/`.  
6. Login with:
   - Username: `admin`
   - Password: `admin123`  
7. Access **Inventory Management System** in the sidebar to manage records.
