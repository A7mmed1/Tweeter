# Tweeter

Historical PHP/Laravel web application project.

## Stack

- PHP (project requirement: `^7.1.3`)
- Laravel 5.8
- Composer and npm for dependencies
- Laravel routes, controllers, views, database migrations, and tests

## Repository layout

- `app/` — application code
- `routes/` — web and API routing
- `resources/` and `public/` — UI source and public assets
- `database/` — migrations and related database files
- `tests/` — tests
- `.env.example` — example environment configuration

## Local development (legacy)

1. Use an isolated environment compatible with the project's historical PHP/Laravel versions.
2. Review `.env.example` and create a local `.env` with development-only values.
3. Install dependencies with Composer and npm, after checking their security and compatibility.
4. Configure a local database, run migrations, and start the Laravel development server only after reviewing the configuration.

## Security and maintenance

Laravel 5.8 and PHP 7.1-era dependencies are outdated. Do not deploy this repository to production without a dependency upgrade and security review. Never commit `.env`, credentials, or database dumps.

## Status

Historical personal development project. Current deployment, tests, and compatibility are not verified.
