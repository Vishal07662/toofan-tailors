# Toofan Tailors

- This project is used to create a basic website where admin can add/create orders and manage their statuses, so that users can view their order statuses.

## Features

### For V1:

- Role Base permission 
- Order Creation and order status management
- Payment History and payment status management

## Installation
- Update the env file to setup the database
- Run the following commands:

```bash
    php artisan migrate:seed
    php artisan serve
```

## Usage
- On installation admin will be created with credentials 
```
    email: admin@demo.com
    pass: adminadmin
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



## developer notes
List items              GET         /items                  items.index
Show create form        GET         /items/create           items.create
Store new item          POST        /items                  items.store
Show single item        GET         /items/{items}          items.show
Edit form               GET         /items/{items}/edit     items.edit
Update item             PUT/PATCH   /items/{items}          items.update
Delete item             DELETE      /items/{items}          items.destroy