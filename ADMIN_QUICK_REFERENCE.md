# 📋 Admin Panel - Quick Reference Guide

## 🔓 Login Credentials
```
Username: admin
Password: admin123
```

## 🌐 URLs to Access
| Page | URL |
|------|-----|
| **Admin Panel** | `http://localhost/project/admin.html` |
| **Test Page** | `http://localhost/project/test_admin.html` |
| **Verify Setup** | `http://localhost/project/verify_setup.php` |
| **Home Page** | `http://localhost/project/index.html` |

## 📊 Dashboard Sections

### 1. Dashboard (Home)
- Total Orders count
- Total Revenue
- Registered Users
- Products count
- Cities served
- Live orders table
- Payment breakdown
- Recent activity

### 2. Orders Management
- View all orders
- Filter by status (All, Pending, Delivered, Cancelled)
- View order details
- Edit orders
- Delete orders
- Export as CSV

### 3. Users Management
- View all registered users
- User details (Name, Email, Phone)
- Edit user information
- Delete users
- Add new users

### 4. Analytics
- Revenue statistics
- Payment method analysis
- Delivery locations
- Top customers
- Order timeline

### 5. Products
- Product inventory
- Categories
- Brands
- Add new products
- Edit products

### 6. Database Info
- Database name and size
- Table information
- Record counts
- Engine details

## 🗄️ Database Schema

### Orders Table
```sql
id | full_name | address | city | payment_method | total_amount | order_date
```

### Users Table
```sql
id | fullname | email | phone | address | password | created_at
```

### Products Table
```sql
id | product_name | category_id | price | stock_quantity | created_at
```

## 🔌 API Endpoints

### Orders API
```
GET  api_orders.php?action=list
GET  api_orders.php?action=stats
POST api_orders.php?action=add
```

### Users API
```
GET  api_users.php?action=list
GET  api_users.php?action=stats
POST api_users.php?action=add
```

### Products API
```
GET  api_products.php?action=list
GET  api_products.php?action=stats
```

### Status API
```
GET  api_status.php
```

## 💾 Browser Storage

The admin panel uses `localStorage` to store login status:
```javascript
localStorage.setItem('isAdmin', '1')  // Set when logged in
localStorage.removeItem('isAdmin')    // Clear when logged out
```

## 🔒 Security Features

✅ **Prepared Statements** - Prevents SQL injection
✅ **Password Hashing** - bcrypt for user passwords
✅ **Input Validation** - All inputs validated
✅ **Error Handling** - Graceful error messages
✅ **Session Management** - localStorage based authentication

## 🐛 Troubleshooting

### Login Page Appears Again After Login
- Clear browser cache (Ctrl+F5)
- Check console for errors (F12)
- Verify localStorage is enabled

### Data Not Loading
1. Visit `test_admin.html` to verify APIs
2. Check if MySQL service is running
3. Verify `electromart` database exists
4. Run `verify_setup.php` to diagnose

### Records Not Visible
- Make sure you're loggen in
- Check dashboard actually loads after login
- Verify database has data (visit verify_setup.php)

### API Errors in Console
- Check network tab (F12) to see API responses
- Verify api_*.php files exist
- Check db.php database credentials

## 👨‍💻 Data Management Tips

### Adding New Order
1. Login to admin panel
2. Click "Dashboard" or "Orders"
3. Click "+ New Order" button
4. Fill in: Name, Address, City, Payment, Amount
5. Click "📦 Place Order"

### Adding New User
1. Go to "Users" section
2. Click "+ Add User" button
3. Fill in: Name, Email, Phone, Password
4. Click "👤 Create User"

### Viewing Order Details
1. Go to "Orders" section
2. Click the "👁" (eye) button on any order
3. View complete order information
4. Click "Update" to save changes

### Exporting Data
1. Go to Dashboard or Orders
2. Click "⬇ Export CSV" button
3. Save CSV file to your computer

## 🎨 UI Elements Guide

| Icon | Meaning |
|------|---------|
| 📊 | Dashboard |
| 📦 | Orders |
| 👥 | Users |
| 📈 | Analytics |
| 🛒 | Products |
| 👁 | View Details |
| ✏️ | Edit |
| 🗑 | Delete |
| 💾 | Save |
| ⬇ | Download/Export |
| ➕ | Add New |

## ⚡ Keyboard Shortcuts

| Shortcut | Action |
|----------|--------|
| `Ctrl+K` | Search |
| `Escape` | Close modal |
| `Enter` | Submit form |
| `Ctrl+F5` | Hard refresh (clear cache) |

## 📞 Support

If something isn't working:

1. **Check Status**: Visit `verify_setup.php`
2. **Test APIs**: Visit `test_admin.html`
3. **Browser Console**: Press F12 for error messages
4. **Clear Cache**: Ctrl+F5 to refresh
5. **Restart Services**: Stop/start Apache & MySQL in XAMPP

## 🚀 Advanced Tips

### Clear All Data
```sql
DELETE FROM orders;
DELETE FROM users;
DELETE FROM products;
```

### Reset Admin Password
The admin password is checked against hardcoded credentials in admin.html:
```javascript
const ADMIN_CREDENTIALS = { user: 'admin', pass: 'admin123' };
```

### Disable Login (Development Only)
```javascript
localStorage.setItem('isAdmin', '1');  // In browser console
```

### Monitor Database Changes
Visit `verify_setup.php` anytime to see current data counts.

---

**Last Updated**: February 21, 2026
**Status**: ✅ Production Ready
