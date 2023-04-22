# MLM Library for PHP and MySQL

This library provides an efficient solution for managing MLM (Multi-Level Marketing) clients in a PHP and MySQL environment. It simplifies the process of adding, deleting, and fetching users by utilizing a parallel tree structure that enables quick querying without the need for recursive functions.

## Requirements

- PHP 8
- MySQL

## Installation

1. Clone the repository or download the ZIP archive and extract it to your desired location.

```bash
git clone https://github.com/yinfosave2007/fastmlm.git
```

2. Import the `database.sql` file into your MySQL server to set up the necessary tables.

3. Edit the `config.php` file to configure the database connection settings.

## Usage

The library provides an easy-to-use API through the `UserController` class. You can create, delete, and fetch users using the provided methods. Check the `examples` folder for sample scripts demonstrating the usage of the library.

### Adding a User

```php
$userId = $userController->createUser('John', 'Doe', 'john.doe@example.com', 1);
```

### Deleting a User

```php
$userController->deleteUser($userId);
```

### Fetching Users by Level

```php
$users = $userController->getUsersByLevel($level);
```

### Fetching Users by Rek ID

```php
$users = $userController->getUsersByRekId($rekId);
```

## Running the Examples

In the command line, navigate to the `examples` folder and run the following commands:

```bash
php create_user.php
php delete_user.php
php get_users_by_level.php
php get_users_by_rek_id.php
```

This will execute the respective actions and display the results in the command line.

## Contributing

Please feel free to submit issues, fork the repository and submit pull requests.

## License

This project is licensed under the MIT License - see the `LICENSE` file for details.
