<p align="center"><a href="https://keyword.com" target="_blank"><img src="https://keyword.com/assets/images/logo.svg" width="20"></a> Keyword.com</p>

Thanks for taking the time to complete this test, feel free to contact David Leal at david.leal@keyword.com if you have any question!

## Overview

This is a simple test to validate your comprehension and technical skills on Laravel and Vue.js, the main goal of this project is to get the right URLs based on the user input.

## Installation

- Fork this public repo
- Clone the forked repo into your computer
- Install the project and create a database for it
- Run the database migration and seeder

## Database Test Records
After running the database migration and seed, your local database should look like this:

| url                                                                        	| created_at          	| updated_at          	|
|----------------------------------------------------------------------------	|---------------------	|---------------------	|
| https://www.nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/        	| 2020-10-05 21:43:12 	| 2020-10-05 21:43:12 	|
| https://www.instash.com/best-pubic-hair-trimmers/                          	| 2020-10-05 21:43:12 	| 2020-10-05 21:43:12 	|
| https://www.hairclippersclub.com/6-best-pubic-hair-trimmers-for-men-women/ 	| 2020-10-05 21:43:12 	| 2020-10-05 21:43:12 	|
| https://care.ladieshaircaring.com/pubic-hair-trimmer/                      	| 2020-10-05 21:43:12 	| 2020-10-05 21:43:12 	|

## Retrieving the data using the REST API
With this data, users should be able to get a single record from the database when searching by URL, example:

- When searching for `www.nytimes.com`, `nytimes.com` or `nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/` user should a get database result from the API like:
```json
{
  "id": "1",
  "url": "https://www.nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/",
  "created_at": "",
  "updated_at": ""
}
``` 

## Tasks
Complete the following tasks:

- Write the necessary code in the controller [WebsiteController.php](app/Http/Controllers/API/WebsiteController.php) to make the search by domain work.
- Write JavaScript code in the Vue.js component [WebsiteSearchComponent.vue](resources/js/components/WebsiteSearchComponent.vue) for the front-end part of this task, the search bar should return a single result.
- Once your controller is ready, the tests should work.
- Push your code back to your fork and send it to us by email.

### Important points
- Your code is clean, easy to ready and documented.
- The tests pass ok. (php artisan test)
- Your commit messages are clean and well described.

### Need help?
Ping me at david.leal@keyword.com
