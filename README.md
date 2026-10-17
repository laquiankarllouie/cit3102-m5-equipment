# Equipment API

**Partners:** Laquian, Karl Louie & Talawec, Yrej Jhel
**Section:** IT1E
**Resource:** Equipment (name, category, condition, quantity, location)

## Setup

```bash
git clone https://github.com/laquiankarllouie/cit3102-m5-equipment.git
cd cit3102-m5-equipment
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

If `migrate` asks to create the SQLite database file, answer yes.
The API runs at `http://127.0.0.1:8000/api`.

## Routes

| Verb | Path | What it does | Token needed? |
|---|---|---|---|
| POST | /api/register | Creates a user and returns a token | No |
| POST | /api/login | Logs in and returns a token | No |
| POST | /api/logout | Deletes the current token | Yes |
| GET | /api/me | Shows the logged-in user | Yes |
| GET | /api/equipment | Lists equipment, with optional filters | Yes |
| POST | /api/equipment | Creates an equipment record | Yes |
| GET | /api/equipment/{equipment} | Shows one equipment record | Yes |
| PUT | /api/equipment/{equipment} | Updates an equipment record | Yes |
| DELETE | /api/equipment/{equipment} | Deletes an equipment record | Yes |

## Screenshots

![1](screenshots/1-register.png)
![2](screenshots/2-login.png)
![3](screenshots/3-list-no-token.png)
![4](screenshots/4-list-token.png)
![5](screenshots/5-create.png)
![6](screenshots/6-create-invalid.png)
![7](screenshots/7-show.png)
![8](screenshots/8-show-missing.png)
![9](screenshots/9-update.png)
![10](screenshots/10-delete.png)

## Why does DELETE return 204 and not 200?

## When we delete something, it's already gone, so there's nothing left to send back. That's why DELETE returns 204 and not 200. 204 means "No Content", which tells us the request worked but the response body is empty. A 200 usually comes with data, and a deleted record has no data to show. The status code itself is already the answer, so we don't need to add anything else.