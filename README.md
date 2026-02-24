# Charsley Digital Platform

Monorepo containing the Charsley Digital marketing site and internal admin platform.

## Prerequisites

- **Laragon** (or PHP 8.3, Node 18+, MySQL 8)
- **PHP** 8.2 or 8.3
- **Node.js** 18+
- **MySQL** 8
- **Composer**

## Structure

```
/
  apps/
    site/       # Astro marketing site (charsleydigital.co.za)
    platform/   # Laravel admin + lead intake API
```

## Setup

### 1. Marketing Site (Astro)

```bash
cd apps/site
npm install
npm run dev
```

Runs at **http://localhost:4321**

Optional: create `apps/site/.env` with `PUBLIC_API_BASE=http://charsleydigital.test` (or your platform URL) so the contact form posts to the correct API.

Build for production:

```bash
npm run build
```

### 2. Platform (Laravel)

```bash
cd apps/platform
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Or use **Laragon**: add a virtual host `charsleydigital.test` pointing to `apps/platform/public`.

Configure `.env`:

- `APP_URL` — e.g. `http://charsleydigital.test` (Laragon) or `http://localhost:8000` (serve)
- `DB_*` — MySQL credentials
- `MAIL_MAILER`, `MAILGUN_DOMAIN`, `MAILGUN_SECRET`, `MAILGUN_ENDPOINT` — for lead email notifications
- `LEADS_TO_EMAIL` — where new lead notifications are sent
- `NTFY_URL`, `NTFY_TOPIC` — for push notifications (optional)
- `SITE_ORIGIN` — origin of the Astro site (e.g. `http://localhost:4321` for dev)

Create first admin (when `ADMIN_EMAIL` and `ADMIN_PASSWORD` are set):

```bash
php artisan db:seed --class=AdminUserSeeder
```

### 3. End-to-End Test (Lead Form)

1. Run site: `cd apps/site && npm run dev`
2. Run platform: `cd apps/platform && php artisan serve` (or use Laragon)
3. Open **http://localhost:4321/contact**
4. Submit the discovery form
5. Confirm: lead in DB, email sent to `LEADS_TO_EMAIL`, Ntfy notification (if configured)
6. Admin: **http://charsleydigital.test/admin/leads** (or `/admin/leads` on your platform URL)

## Deployment

See **[DEPLOY.md](DEPLOY.md)** for first-deploy checklist, DB password generation, and `.env` setup.

- **Site**: Static output in `apps/site/dist` — deploy to any static host (Netlify, Vercel, etc.)
- **Platform**: Deploy Laravel to your server; use Docker for production if preferred
