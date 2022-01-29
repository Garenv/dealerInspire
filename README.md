****Commands to run in the project's directory****

`php artisan serve` - This command is the Laravel version of the command `php -S localhost:8000` that you'd normally run on a vanilla PHP project. It'll navigate you to `http://127.0.0.1:8000/**`.

On the browser, make sure to modify it to `http://127.0.0.1:8000/post_data` because that's the main page.  You can find the routes in the `web.php` file.
_____
`php artisan migrate` - This will migrate the DB located at `database/migrations/2022_01_28_010019_create_form_data_table.php`.  Lines 11-16 in the `.env` located in the root directory has the DB info.  

First, manually create an empty `form_data` DB and then run **php artisan migrate**.  By running this command after manually creating the DB, it'll automatically populate the columns.
___
`npm install` - This command will spawn the `node_modules` folder. It contains all the dependencies that've been declared in the package.json file.
___
`npm install font-awesome --save` - This command will allow us to use Font Awesome's icon and font toolkit. 
___
`npm install sass-loader@^12.1.0 sass resolve-url-loader@^5.0.0 --save-dev --legacy-peer-deps` - This is to make sure that the SASS code (`.scss` code) loads and is usable in the project. 
___
`npm run dev` - This is used to compile all assets (JS and SCSS).  It's important that this command is ran.
___
`npm run watch-poll` - This is used to watch and compile the JS and SCSS in real time.  If you don't run this command, then you'd have to run `npm run dev` every single time to compile the `JS` and `SCSS`.  So run **npm run watch-poll** to avoid doing that.  This is assuming you'd like to modify the code to your liking and seeing your changes.    
___

The test file can be found in `tests/Feature/ContactFormTest.php`.

Simply modify the `$formData` variable values (only modify the value, not the keys) and then run **php artisan test** in the project's directory to see if your test passes.
___

The main files are as follows:

`app/Http/Controllers/ContactFormController.php`

`app/Models/ContactForm.php`

`tests/Feature/ContactFormTest.php`

`resources/views/index.blade.php`

`resources/js/app.js`

`resources/css/app.scss`

---
**Note:** For the email functionality, I've used my personal SMTP credentials for this coding challenge which can be found on lines 33-41 in the `.env` file located in the root directory. 
