# React / Wordpress / Docker
- [React / Wordpress / Docker](#react---wordpress---docker)
- [Overview 🔎](#overview)
- [Up and Running 🚀](#up-and-running)
  - [Prerequisites](#prerequisites)
  - [React App](#react-app)
  - [Wordpress CMS](#wordpress-cms)
    - [Services](#services)
- [Front-End Development 🎨](#front-end-development)
  - [CSS / SCSS](#css---scss)
  - [JS / TypeScript](#js---typescript)
  - [State Management](#state-management)
  - [Client Side Routing](#client-side-routing)
- [Backend / CMS Development 🗄](#backend---cms-development)
  - [Wordpress](#wordpress)
    - [Login 🔐](#login)
    - [Add content ✍️](#add-content)
    - [JSON API](#json-api)
  - [MySQL / PHPMyAdmin](#mysql---phpmyadmin)
    - [Config DB](#config-db)
    - [Data Export / Backup 🔽](#data-export---backup)
    - [Data Import 🔼](#data-import)
- [Docker 🐳](#docker)
- [TODO ✅](#todo)
  - [Deploy to AWS](#deploy-to-aws)
  - [Set up CI / CD](#set-up-ci---cd)
  - [Docker](#docker)
# Overview 🔎

This site is a headless Wordpress CMS with a React.js front end.
  - Wordpress code is in `<project root>/cms`
  - React code is in `<project root>/client`

Attribution:
  - WordPress Docker code by @[Drew Dahlman](https://github.com/DrewDahlman) 
      -  https://github.com/DrewDahlman/dockerize-all-the-things
  -  React Docker code by @[Michael Herman](https://github.com/mjhea0)
      -  http://mherman.org/blog/2017/12/07/dockerizing-a-react-app/#.Wxd-QlMvzBI

# Up and Running 🚀

## Prerequisites
  - Docker Compose [URL](https://docs.docker.com/compose/install/)

## React App

```shell
  $ cd client
  $ docker-compose up 
```

Visit the react app at [http://localhost:3000](http://localhost:3000)

## Wordpress CMS

```shell
  $ cd cms
  $ docker-compose up 
```

### Services
  - Wordpress website: [http://localhost:8080](http://localhost:8080)
  - PHPMyAdmin: [http://localhost:8181](http://localhost:8181)

# Front-End Development 🎨

## CSS / SCSS

Start the node-sass process. 

```shell
  $ cd <project root>/client
  $ yarn run watch:sass
```

This will watch all the files in `client/src/styles/scss` and build them into `.css` files in `client/src/styles/css`. 

SASS variables are in `client/src/styles/scss/theme/variables` 

## JS / TypeScript

TypeScript: 
  - [TypeScript Foundation](https://www.typescriptlang.org/)

For more resources on React / TypeScript please see:
  - [Typescript / React Cheat Sheet](https://github.com/sw-yx/react-typescript-cheatsheet
  - https://levelup.gitconnected.com/ultimate-react-component-patterns-with-typescript-2-8-82990c516935

## State Management

Redux + thunk

## Client Side Routing

None at the moment. 

# Backend / CMS Development 🗄

## Wordpress

Getting started with the administrative tools.

### Login 🔐
- Go to `http://localhost:8080/wp-admin`
  - UN: 'root'
  - PW: 'root'

### Add content ✍️
  - Click on 'Posts' -> 'Categories'
  - Make a new category by giving it a 
    - Name
    - Slug
    - Parent Category (optional)
    - Description

Practicing this flow of adding content it **crucial** because this will set the endpoints of our CMS as well as make relationships between the data in the DB. Please make sure to leverage post `categories` and `tagging` as much as possible.

Once there is some content in the CMS, we can retrieve it from the Wordpress RESTful API. 

### JSON API
Call the API: (this is not the right way to do so. See: TODO)
  - http://localhost:8080/?rest_route=/wp/v2/ (meta data)
  - http://localhost:8080/?rest_route=/wp/v2/posts (all posts)
  - http://localhost:8080/?rest_route=/wp/v2/categories (all categories)

For more documentation on the Wordpress V2 API please see:
  - [Wordpress API V2 Docs](https://v2.wp-api.org/)

## MySQL / PHPMyAdmin

The CMS is running on top of a MySQL DB.

PHPMyAdmin Easy Access:
  - visit: [http://localhost:8181](http://localhost:8181)

This will pull up the PHPMyAdmin interface on the docker container. Here you can easily interface with the MySQL database in the Docker container.

### Config DB

If you want to change the name of the database or configure it to run locally on a MAMP server you can change those configs in `<project root>/cms/wp-client.php` 

```php
define('DB_NAME', 'db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'db:3306');
define('DB_HOST', 'localhost'); // for local development
```

### Data Export / Backup 🔽

To make a dump of the data in the database run the following command from `<project root>/cms` on you local machine:

```shell
$ docker exec <container> sh -c "cd /data && wp db export --path=/app --allow-root" 
```

This will generate a `.sql` file in the `<project root>/cms/data` folder. The run.sh file in `<project root>/cms/docker`. 

### Data Import 🔼

  - Visit [http://localhost:8181](http://localhost:8181)
  - Click on 'import'
  - Upload the generated .sql file in `<project root>/cms/data
  - Press the 'Go" button

This should load the sql file into the MySQL databse.

# Docker 🐳

If you make a change to the `Dockerfile` make sure to run `docker-compose up -d --build` to rebuild the container.

If you want to just start the container use `docker-compose up`

# TODO ✅
## Deploy to AWS
  - Find a good hosting strategy that makes sense for current needs
  - t2 micros for EC2 and RDS
## Set up CI / CD
  - use AWS codepipline to store code in an S3 bucket and build it when we publish new changes
  - *Or* automate the deploy any way possible - Jenkins, travis, etc. 
## Docker 
  - Set up .env files for docker to pull from
  - build and watch the .scss files
  - Consolidate to one docker-compose.yml at root of project that builds both the react app and the wordpress cms
