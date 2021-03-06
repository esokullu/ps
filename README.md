# Pho-Kernel

A simple microkernel implementation with Twitter-like functionality.

## Requirements

The default pho-kernel requires:

* Redis server
* PHP 7.1+
* [Composer](https://getcomposer.org/)

## Install

The recommended way to install pho-kernel is through composer. 

Let's say, you want to install a kernel under a directory called ```test-dir```. Here's what you type in the terminal:

```shell
composer create-project -s "dev" phonetworks/pho-kernel test-dir
```

This will install pho-kernel as well as its dependencies. Once installed, read/edit the bootstrapper scripts [play.php](https://github.com/phonetworks/pho-kernel/blob/master/play.php) and [play-custom.php](https://github.com/phonetworks/pho-kernel/blob/master/play-custom.php).

## Getting Started

1. Make sure your .env file is functional; addressing Redis properly.
2. Run ```php -a``` on your terminal to switch to PHP shell. Then,

```php
include("play.php"); // this will set it up.

echo $founder; // will dump the founder's ID.
echo $graph; // will dump the graph's ID.

$tweet = $founder->post("My first tweet"); // let's create a tweet.

$new_user = new \PhoNetworksAutogenerated\User($kernel, $graph, "my_password"); // let's create our first user object.
$new_user->like($tweet); // the user likes the one and only tweet in the graph.

// Now examine these:
var_dump($tweet->getLikers());
var_dump($tweet->getAuthors());
var_dump($new_user->getLikes());
var_dump($founder->getPosts());
```

## Customizing

If you are running pho-kernel on a custom set of compiled pgql files, make sure:

1. The ```default_objects``` variables in Kernel configs (as shown by ```$configs``` in [play.php](https://github.com/phonetworks/pho-kernel/blob/master/play.php)) have a proper set of "graph" and "user" classes set.
2. Before booting up the kernel, a custom founder object is initialized and passed as an argument to the ```boot``` method.

## License

MIT, see [LICENSE](https://github.com/phonetworks/pho-kernel/blob/master/LICENSE).
