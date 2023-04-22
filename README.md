# MLM Library for PHP and MySQL

This library offers a highly efficient solution for managing MLM (Multi-Level Marketing) clients within a PHP and MySQL environment. It streamlines the process of adding, deleting, and retrieving users by leveraging a parallel tree structure, facilitating swift querying without necessitating recursive functions.

Utilizing recursion to compute all users at the 23rd level of a binary tree requires performing a recursive traversal of the tree. In the worst-case scenario, this involves traversing all levels. The complexity of such an algorithm is approximated as O(n * h), where n represents the number of users at the level and h denotes the height of the tree. In this case, it equates to 2^23 * 24 ≈ 201,326,592 operations.

Executing this operation with recursion would take dozens of hours, even with robust servers and optimized code. However, the technique employed in this library significantly accelerates calculations, reducing the processing time to mere fractions of a second.

By diminishing the processing time required for reward accrual calculations from 50 minutes per request to 0.3 seconds, this algorithm has successfully addressed the challenges associated with computations and sampling within a large MLM company. Implementing this solution could provide you with the efficiency and performance improvements you seek.

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

Author Kirichenko Oleg Yurievich infosave@mail.ru


