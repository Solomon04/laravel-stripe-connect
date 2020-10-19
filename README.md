# Laravel Stripe Express Tutorial
This is a boilerplate repo showing how to use <a href='https://stripe.com/docs/connect/express-accounts'>Stripe Express Connect</a> with Laravel. 

## Introduction
### What Is Stripe Express?
Express accounts are a type of Stripe connect account and is generally used for two sided marketplaces where there is a seller selling services or a product and a buyer of those services/product. Examples include:
- Etsy
- Ebay
- Uber
- Lyft

Express essentially allows your platform to onboard and manage the flow of funds for your sellers. 

### What Does The Boilerplate Do?
In this boilerplate, we have two types of users. Sellers, who sell their product on the platform and customers, who purchase the products from the sellers. Sellers must create an Express account to ensure they can received payments, while customers must add a payment method to purchase a product. 

### Flow of funds with fees:
When a customer purchases a product from a seller, the charge will be collected by your platform. A separate transfer with your fees extracted will then be sent to the connected account. Reference the image below to see the flow of funds during a purchase:

![Stripe Image](https://stripe.com/img/docs/connect/charges_transfers.png "Flow of Funds")

## Getting Started

##### Clone Project
`git clone https://github.com/Solomon04/laravel-stripe-connect`

##### Install Dependencies
`cd laravel-stripe-connect`

`composer install`

##### Environment Variables
`cp .env.example .env`

Then update your env file with your database & Stripe credentials.

##### Generate application encryption key
`php artisan key:generate`

##### Link Storage
`php artisan storage:link`

##### Migrate and Seed Database (optional)
`php artisan migrate --seed`

##### Start Server
`php artisan serve`

### Questions or Concerns? 
Open a PR or contact me directly at antoinesolomon5@gmail.com