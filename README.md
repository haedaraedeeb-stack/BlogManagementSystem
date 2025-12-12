# Laravel Blog Project  
A full-featured Blog Application built with Laravel, featuring Admin Dashboard, Blog Management, Categories, Favorites System, Authentication, Soft Deletes, and a Frontend UI.

---

##  Features

### **Frontend**
- Display blog posts with categories.
- Blog filtering by multiple categories.
- Add/Remove favorite blogs (requires login).
- Blog details page with categories + content.
- Responsive Bootstrap layout.

### **Admin Panel**
Built using **AdminLTE** (sidebar + navbar).

Admin features:
- Manage Blogs (Create, Edit, Delete, Restore).
- Manage Categories.
- View Trashed Blogs.
- Authentication + Middleware Protection.

---

##  Technologies Used

- **Laravel 12**
- **AdminLTE Template**
- **Bootstrap 4**
- **MySQL Database**
- **FontAwesome Icons**
- **Laravel UI (Auth scaffolding)**

---

## 1 Installation

###  Clone the project
```bash 

git clone <https://github.com/haedaraedeeb-stack/BlogManagementSystem.git>
cd BlogsManagement

###  2 Install dependencies
composer install
npm install
npm run dev

### 3️ Configure environment
cp .env.example .env

4️ Generate Laravel app key
php artisan key:generate


4 Settings database
DB_DATABASE=blogmanagement
DB_USERNAME=root
DB_PASSWORD=


5  Import Database
The SQL dump file is included in the project root:

To import it:

1. Open **phpMyAdmin**
2. Create a database (`blogmanagement`)
3. Go to the **Import** tab
4. Select the file:


Default Admin Login:
Email: admin@example.com
Password: 12345678

Default User Login:
Email: ali@example.com
Password: 0987654321


6 Screenshots
The project contains UI screenshots inside the root folder:
/screenshots/
/screenshots/add_blog.png
/screenshots/admin_dashboard.png
/screenshots/admin_blogs_page.png
These images help preview the final application layout.



7️ Create storage link
php artisan storage:link

8️ Run the project
php artisan serve





