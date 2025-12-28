# :ferris_wheel: VentureValley Website
The official website of VentureValley, a Dutch Minecraft Theme Park server.

:globe_with_meridians: Check out the current progress of the rebuild: https://testing.venturevalleymc.nl

<details>
    <summary>Table of Contents</summary>
    <ol>
        <li><a href="#information_source-about-this-project">About this project</a></li>
        <li><a href="#sparkles-functionality">Functionality</a></li>
        <li>
            <a href="#rocket-getting-started">Getting started</a>
            <ol>
                <li><a href="#requirements">Requirements</a></li>
                <li><a href="#installation">Installation</a></li>
            </ol>
        </li>
        <li>
            <a href="#hammer_and_wrench-how-does-it-work">How does it work?</a>
            <ol>
                <li><a href="#technologies">Technologies</a></li>
                <li><a href="#entity-relationship-diagram">Entity Relationship Diagram</a></li>
                <li><a href="#usage">Usage</a></li>
            </ol>
        </li>
        <li><a href="#scroll-license">License</a></li>
    </ol>
</details>

[![Semmetje11lolly](https://img.shields.io/badge/-Semmetje11lolly-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Semmetje11lolly)



## :information_source: About this project
The VentureValley website is the place to be for everything VentureValley! From instructions on how to join to an overview of all the attractions, it's all in one place!

This project was created because the old VentureValley website was built with WordPress and Elementor, which made it difficult and costly to maintain. The goal for the new website is to gain full control over it by rebuilding it from scratch with Laravel.



## :sparkles: Functionality
W.I.P.



## :rocket: Getting started
Below are the instructions on how to get the project running on your local machine!

### Requirements
- PHP 8.2+
- Composer
- Node.js & NPM
- SQLite
- (If on Windows) Laravel Herd

### Installation
1. Clone the repository
```sh
git clone https://github.com/Semmetje11lolly/VentureValley-website.git vv-website
cd vv-website
```
2. Setup dependencies, environment, database and front-end assets
```sh
composer run setup
```
3. Setup local test server
```sh
npm run dev
```
- If you're using Windows:
    - Make sure the project is in the Laravel Herd sites directory and SSL is enabled for it
    - View the web-app by going to https://detective-green.test
- If you're not on Windows:
    - ```sh
      php artisan serve
      ```
    - View the web-app by going to http://localhost:8000



## :hammer_and_wrench: How does it work?
Below you can find the documentation of the VentureValley website codebase!

### Technologies
The VentureValley website uses the following technologies:
- [![Laravel][Laravel.com]][Laravel-url]
    - [![Blade][Blade.com]][Blade-url]
    - [![Laravel Breeze][Breeze.com]][Breeze-url]
- [![Tailwind CSS][TailwindCSS.com]][TailwindCSS-url]
- [![JavaScript][JavaScript.com]][JavaScript-url]

### Entity Relationship Diagram
W.I.P.

### Usage
W.I.P.



## :scroll: License
The source code in this repository is licensed under the MIT License.

However, all non-code assets (such as images, logos, and other media) are **not** covered by the MIT License. Unless otherwise stated, these assets may not be reused, redistributed, or modified without explicit permission from VentureValley.



[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[TailwindCSS.com]: https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white
[TailwindCSS-url]: https://tailwindcss.com
[JavaScript.com]: https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black
[JavaScript-url]: https://developer.mozilla.org/en-US/docs/Web/JavaScript
[Blade.com]: https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Blade-url]: https://laravel.com/docs/blade
[Breeze.com]: https://img.shields.io/badge/Breeze-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Breeze-url]: https://laravel.com/docs/starter-kits#laravel-breeze
