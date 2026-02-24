# Deploy Charsley Digital

Server: `41.72.157.26` | Path: `/opt/charsleydigital`

## First-time setup

### 1. SSH into the server

```bash
ssh root@41.72.157.26
```

### 2. Clone the repo

```bash
cd /opt
git clone https://github.com/vassago85/charsleydigital.git
cd charsleydigital
```

### 3. Create the `.env` file

```bash
cp docker/env.template .env
```

Generate passwords and paste them in:

```bash
# Generate passwords (run these, copy the output)
openssl rand -base64 32   # use for DB_ROOT_PASSWORD
openssl rand -base64 32   # use for DB_PASSWORD
openssl rand -base64 24   # use for ADMIN_PASSWORD
```

Edit `.env` and fill in the passwords + your Mailgun/Ntfy keys:

```bash
nano .env
```

### 4. Build and start

```bash
docker compose up -d --build
```

### 5. Generate the app key

```bash
docker compose exec app php artisan key:generate --force
```

### 6. Verify it's running

```bash
docker compose ps
curl -s http://localhost:8086 | head -20
```

You should see HTML from the landing page.

### 7. Set up Nginx Proxy Manager

Add a proxy host in NPM pointing to `http://41.72.157.26:8086` for your domain with SSL.

---

## Updating (after code changes)

```bash
cd /opt/charsleydigital
git pull origin master
docker compose build --no-cache app
docker compose up -d --force-recreate app
```

## Useful commands

```bash
# View logs
docker compose logs -f app

# Run artisan commands
docker compose exec app php artisan migrate --force
docker compose exec app php artisan tinker

# Restart
docker compose restart app

# Full rebuild
docker compose down && docker compose up -d --build
```
