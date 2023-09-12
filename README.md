<p align="center"><a href="https://x64code.com" target="_blank"><img src="https://github.com/X64Code-Github/X64Code-Github/blob/master/logos/grey_trans.png?raw=true" width="200" alt="X64Code Logo"></a></p>
<h1 align="center">Task List Demo</p>

## Table of Contents

- [Application Setup](#application-setup)
- [Usage Documentation](#usage-documentation)
- [Composer Package Information](#composer-package-information)
- [NPM Package Information](#npm-package-information)
- [Bug & Vulnerability Reports](#bug--vulnerability-reports)
- [License](#license)
- [Developed By X64Code](#developed-by-x64code)

## Application Setup

- [Automated App Setup (Linux Only)](#automated-app-setup-linux-only)
- [Manual App Setup](#manual-app-setup)

### Automated App Setup (Linux Only)

Setup can be automated via the setup.sh script I included in the base directory.

	cd /path/to/project

Script assumes you're using a local MySQL server. env can be: prod, test, dev (default).

	./setup.sh [env]

The script runs `composer install`, `npm install`, `npm run build`, `php artisan migrate:fresh`. If you have yet to create your .env file, this will copy the example based on the env arg sent in to .env and create an APP_KEY. Your app should be ready to serve.

### Manual App Setup

Go to your project directory.

	cd /path/to/project

Install packages necessary to run project.

	composer install
	npm install

Build your files & serve

	npm run (build|dev|watch)

Run your migrations

	php artisan migrate:fresh

## Usage Documentation

This is a multi-user application so you first need to register your user (No email verification required).

Head to /register in your app and register.

You should be redirected automatically to your Task list. If not, simply go to: /tasklist

Here you can create new Tasks & Projects.

You'll first need to create a new Project as Tasks require a Project to point to. This is done by filling in the text box on the top right of the Task List and clicking "Add New Project".

Once you have a Project, you can now create new Tasks by filling in the top left input with the Task Name and the dropdown selecting the Project the Task belongs to. Finalize by clicking "Add New Task".

You're now ready to use the Task list to reorder Tasks via drag and drop and removing Tasks or Projects via the red trash button.

Deletes are cascading so deleting a Project will delete any subsequent Tasks associated.

## Composer Package Information

- laravel/laravel 				V10.22.0 - [Documentation](https://laravel.com/docs/10.x)
- livewire/livewire 			V3.0.2 - [Documentation](https://livewire.laravel.com/docs/quickstart)
- laravel/breeze 				V1.23.0 - [Documentation](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)
- pestphp/pest-plugin-laravel	V2.0 - [Documentation](https://pestphp.com/)

## NPM Package Information

- tailwindcss	V3.1.0 - [Documentation](https://tailwindcss.com/docs)
- alpinejs		V3.4.2 - [Documentation](https://alpinejs.dev/start-here)

## Bug & Vulnerability Reports

If you discover any bugs or vulnerabilities, please email [bugreports@x64code.com](mailto:bugreports@x64code.com). Vulnerabilities will be dealt with as soon as possible.

## License

This Task List Demo App is open-sourced software licensed under the [MIT License](https://opensource.org/license/mit/).

## Developed By X64Code

For more information on my other projects, check out my [github](https://github.com/X64Code-Github) or email [projects@x64code.com](mailto:projects@x64code.com) for more information on this or other projects.

Feel free to check out my [portfolio](https://x64code.com) or email your work proposal to [contact@x64code.com](mailto:contact@x64code.com).