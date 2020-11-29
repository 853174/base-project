# Overview
Here you can find a base project for your website on Apache server. This project offers the next advantages:

- Beautified URLs. No one likes complex and easy-to-forget links!
- Organized project. Each file is stored following a logic structure.
- Easy customizable layout. Pages are created using templates and configurations.
- From begginer no expert. The project is ready-to-go but you can change it to fit your needs.

But before you start there are some things you have to change!

# Get Started
Follow these steps to publish successfully this website on a web server.
1. Download and extract this repo on the server's public directory (usually: `/public_html`,`/html` or `/www`).
2. It's time to make some changes. Edit app's configuration and change `$path` variable (read [App configuration](#app-configuration)) to fit your environment. For example:
    - If your webpage is hosted in `www.somepage.com`, then `$path="/"`.

    - If your webpage is hosted in some subdirectory as `www.somepage.com/newProject`, then `$path="/newProject"`.
3. Edit `.htaccess` file and make the same change as in the previous step:
    ```
    RewriteBase "/"
    OR
    RewriteBase "/newProject"
    ```  
4. Add your pages! To do so, you only have to create a new file at `views/` folder (i.e. `views/cv.php`). It's important that the file contains `.php` extension because the app's controller (`controller.php`) searches for this file extension only. Feel free to change it if you want to.

Once you make those changes you should be able to use the website whitout problems. Read further to know how to customize this base project.

# App configuration
You can find the app's configuration at `/docs/php/config.php`.

|  Variable name | Details |
| ------- | ------- |
| `$app_name` | Stores the name of the website/application. It's used as default window title and navbar's home link. |
| `$path` | Stores the relative path needed to access the web/app inside the server. In most of the cases `$path="/"` is correct but it can change in other environments. |
| `$server_root` | Stores PHP's `$_SERVER["CONTEXT_DOCUMENT_ROOT"]` global variable in order to access it easily. It's not suposed to be changed. |
| `$server_path` | Stores the absolute path to the project's root directory. It's not suposed to be changed. |
| `$page_config` | Stores the default page configuration. Further reading at [Page configuration](#page-configuration) |

# Page configuration
This configuration files are used to customize webpages' design. Default page configuration is stored on the app's config but it can be overrided or completed at `/views/configs` dir.

If you want to override `somepage.php`'s page configuration you only have to create a `somepage.php` file on that directory.

|  Variable name | Accepted types | Details |
| ------- | ------- |  ------- |
| `title` | String | Window title of the web/app. Default: `$app_name`. |
| `navbar` | Array, Boolean | Information about the navbar. If you want to disable it write `"navbar" => false`. Default: `Array(navbar_properties)`.|
| `navbar.title` | String | Navbar's title. Default: `$app_name`. |
| `navbar.home` | String (URL) | Navbar's title's link. Default: `$path`. |
| `navbar.links` | Array | Navbar's other links. Each link has an ID and it can be overrided using the same ID on custom configuration. Check links format [here](#link-format) |
| `footer` | Boolean | Decides wether footer is displayed or not. Default: `true`. |

# Link format

To add a new link to the `navbar.links` array you only have to add a new entry to it following the next format: `"$id" => ["$tex","$linkg"]`. For example: `"1" => ["External Site","http://www.duckduckgo.com"]` or `"2" => ["About Us",$path . "about"]`.
