# Troubleshooting

## Changes made

1. **Welcome page** – "Dashboard" link now points to `/admin/leads` (was `/dashboard` which doesn't exist).
2. **Login & Admin views** – Added Tailwind CDN fallback when Vite build is missing, so pages render without running `npm run build`.
3. **APP_URL** – Set to `http://127.0.0.1:8000` when using `php artisan serve`. Change to `http://charsleydigital.test` when using Laragon.
4. **CORS** – Added `http://localhost:4321`, `http://127.0.0.1:8000`, `http://localhost:8000` to allowed origins so the contact form works.

## Platform (Laravel)

**If using `php artisan serve`:**
- Open: **http://127.0.0.1:8000**
- Login: **http://127.0.0.1:8000/login**
- Admin: **http://127.0.0.1:8000/admin/leads**
- Ensure `.env` has `APP_URL=http://127.0.0.1:8000`

**If using Laragon:**
- Add vhost `charsleydigital.test` → `apps/platform/public`
- Start Laragon (Apache + MySQL)
- Open: **http://charsleydigital.test**
- Set `APP_URL=http://charsleydigital.test` in `.env`

## Site (Astro)

Run in a terminal where Node is available (e.g. Laragon terminal):

```bash
cd c:\laragon\www\charsleydigital\apps\site
npm run dev
```

Then open: **http://localhost:4321**

## Contact form

- `apps/site/.env` should have `PUBLIC_API_BASE=http://127.0.0.1:8000` (or your platform URL).
- Platform and site must both be running for the form to submit.

## Login

- Email: paul@charsley.co.za
- Password: (the one you set in ADMIN_PASSWORD)
