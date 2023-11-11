# SUMS - The **S**imple **U**nit **M**anagement **S**ystem
#### Free and open source

## Functions
1. Quick unit editing and quantity change
2. Simple unit creation
3. Secure account system - only the root account can create other accounts
4. Changable passwords
5. Responsible UI

## Guide
1. Clone the repository.
2. Create .env file and copy the .env.example values.inside. Make sure to link your database.
3. Run `npm install` and `composer install` to supply the needed packages.
4. Run `php artisan migrate:fresh` to make sure all is fine.
3. Run `npm run dev` and `php artisan serve` to start the dev server.

## Useful info
- The logo is in the `/resources/js/Components/ApplicationMark.vue`
- Deleting the root user will cause the need for a refresh of the database

## Built with:

- Laravel
- Vue
- Inertia


# Creator
### Made by Trephy

