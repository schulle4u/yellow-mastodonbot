<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a></p>

# Mastodonbot 0.9.2

Automatically publish new pages on Mastodon.


## How to install an extension

[Download ZIP file](https://github.com/schulle4u/yellow-mastodonbot/archive/refs/heads/main.zip) and copy it into your `system/extensions` folder. [Learn more about extensions](https://github.com/annaesvensson/yellow-update).

## How to publish new pages to Mastodon

First create a new application in the development tab of your Mastodon instance, then insert the generated access token and your instance's hostname into your `system/extensions/yellow-system.ini`. Every new page will automatically be published on mastodon upon creation. If you don't want a page to be published, set `Mastodon: exclude` in the [page settings](https://github.com/annaesvensson/yellow-core#settings-page). 

## Examples

Content file to exclude from Mastodon publication: 

```
---
Title: This page will not be published on Mastodon
Mastodon: exclude
---
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. [--more--]

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
```

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`MastodonbotApiKey` = The access token for your Mastodon instance  
`MastodonbotInstance` = Your Mastodon instance's hostname  
`MastodonbotVisibility` = visibility of published pages (public, unlisted, or private)  
`MastodonbotMaxChars` = Maximum characters for page summary  
`MastodonbotTemplate` = Template for Mastodon posts  

The following placeholders are supported in the post template:

`@title` = page title  
`@content` = page excerpt  
`@url` = page URL  

## Acknowledgements

This extension uses [MastodonBotPHP](https://github.com/eleirbag89/mastodonbotphp) by Gabriele Grillo. Thank you for the library! 

## Developer

Steffen Schultz. [Get help](https://datenstrom.se/yellow/help/).
