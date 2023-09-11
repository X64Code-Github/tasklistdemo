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

The script runs `composer install`, `npm install`, `npm run build`. If you have yet to create your .env file, this will copy the example based on the env arg sent in to .env and create an APP_KEY. Your app should be ready to serve.

### Manual App Setup

Go to your project directory.

	cd /path/to/project

Install packages necessary to run project.

	composer install
	npm install

Build your files & serve

	npm run (build|dev|watch)

## Usage Documentation



## Composer Package Information

- laravel/laravel 				V10.22.0 - [Documentation](https://laravel.com/docs/10.x)
- livewire/livewire 			V3.0.2 - [Documentation](https://livewire.laravel.com/docs/quickstart)
- robsontenorio/mary 			V0.36.0 - [Documentation](https://mary-ui.com/docs/installation)
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