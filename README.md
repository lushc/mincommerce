# MinCommerce

A super-barebones mini e-commerce website to demonstrate my ability in using Git, Symfony2, Doctrine, Vagrant and PHP5 (conforming to PSR standards).

## Prerequisites

* You have installed [VirtualBox](https://www.virtualbox.org/) and [Vagrant](http://vagrantup.com/)

## Getting Started

First, clone this repository and change directory:

```bash
$ git clone https://github.com/lushc/mincommerce
$ cd mincommerce
```

Boot up the VM and SSH in:

```bash
$ cd vagrant
$ vagrant up && vagrant ssh
```

Once in, run the post-install script to download dependencies and set up the database:

```bash
$ cd /var/www/mincommerce
$ ./postinstall.sh
```

## Usage

Navigate to [192.168.13.37](http://192.168.13.37/) to view the website, or set up `mincommerce.dev` in your hosts file.
