# BlogHub — Full-Stack Blog Management System

Laravel 10 + MySQL | AJAX + jQuery Filtering | Responsive Design

## Quick Deploy to Railway

1. Push this repo to GitHub
2. Go to railway.app → New Project → Deploy from GitHub
3. Add MySQL database service
4. Set environment variables (see .env.example)
5. Railway auto-runs migrations and seeds via nixpacks.toml

## Environment Variables Required

```
APP_KEY=          (auto-generated on first deploy)
DB_HOST=          (from Railway MySQL service)
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=      (from Railway MySQL service)
ADMIN_EMAIL=admin@blog.com
ADMIN_PASSWORD=admin123
```

## URLs After Deploy

- Blog Site:    https://your-app.up.railway.app/
- Admin Login:  https://your-app.up.railway.app/admin/login
- Admin Panel:  https://your-app.up.railway.app/admin/dashboard

## Default Admin Credentials
- Email: admin@blog.com
- Password: admin123
