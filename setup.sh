#!/bin/bash

# Function to display the help message
show_help() {
  echo "Usage: $0 [-h] [env]"
  echo "  -h        Display this help message"
  echo "  env       Specify the environment (default: 'dev')"
}

# Function to prompt the user for database information
prompt_for_database_info() {
  read -p "Enter the database name: " db_name
  read -p "Enter the database username: " db_user
  read -s -p "Enter the database password: " db_password
  echo

  # Update the .env file with the provided information
  sed -i "s/DB_DATABASE=.*/DB_DATABASE=$db_name/" .env
  sed -i "s/DB_USERNAME=.*/DB_USERNAME=$db_user/" .env
  sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$db_password/" .env
}

# Check if the -h option is provided
if [[ $1 == "-h" || $1 == "--help" ]]; then
  show_help
  exit 0
fi

echo "Starting Task List Demo Setup..."

# Check if Composer is installed
if ! [ -x "$(command -v composer)" ]; then
  echo "Error: Composer is not installed. Please install Composer before running this script."
  exit 1
fi
echo "Composer is installed."
echo "---------------------------------------------"

# Check if npm is installed
if ! [ -x "$(command -v npm)" ]; then
  echo "Error: npm is not installed. Please install npm before running this script."
  exit 1
fi
echo "npm is installed."
echo "---------------------------------------------"

# Define the environment (default to 'dev' if not specified)
env=${1:-dev}
echo "Setting up environment: $env"

# Check if the .env file exists
if [ ! -f .env ]; then
  # If .env doesn't exist, copy the appropriate .env.example.${env} file
  cp .env.example.${env} .env
  echo ".env file does not exist, created by copying .env.example.${env}."

  # Prompt the user for database information
  prompt_for_database_info
fi

# Check if the .env file already contains an APP_KEY
if grep -q "^APP_KEY=$" .env; then
  # Generate Laravel application key
  php artisan key:generate
  echo "Generated Laravel application key."
elif ! grep -q "^APP_KEY=" .env; then
  echo "APP_KEY= is missing from .env, please fix this issue and try again."
  exit 1
else
  echo "APP_KEY already exists in .env. Skipping key generation."
fi
echo "---------------------------------------------"

# Install Composer dependencies
composer install
echo "Installed Composer dependencies."
echo "---------------------------------------------"

# Install npm dependencies (assuming you have a package.json file)
npm install
echo "Installed npm dependencies."
echo "---------------------------------------------"

# Build frontend assets
npm run build
echo "Built frontend assets."
echo "---------------------------------------------"

# Migrate database structure
php artisan migrate:fresh
echo "Migrated database structure."
echo "---------------------------------------------"

echo "Task List Demo Setup Complete."
