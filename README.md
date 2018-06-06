# M&K Marketing Site 2.0
- [M&K Marketing Site 2.0](#mk-marketing-site-20)
- [Overview 🔎](#overview)
- [Up and Running 🚀](#up-and-running)
  - [Prerequists](#prerequists)
  - [React App](#react-app)
  - [Wordpress CMS](#wordpress-cms)
- [Front-End Development 🎨](#front-end-development)
  - [CSS / SCSS](#css---scss)
  - [JS / TypeScript](#js---typescript)
- [Backend / CMS Development](#backend---cms-development)
  - [Wordpress](#wordpress)
    - [Login](#login)
    - [Add content](#add-content)
  - [MySql / PHPMyAdmin](#mysql---phpmyadmin)
    - [Data Export / Backup](#data-export---backup)
    - [Data Import](#data-import)
- [Docker 🐳](#docker)
# Overview 🔎

This site is a headless Wordpress CMS with a React.js front end.
  - Wordpress code is in `<project root>/cms`
  - React code is in `<project root>/client`

# Up and Running 🚀

## Prerequists
  - Docker Compose [Download URL](https://docs.docker.com/compose/install/)

## React App

```shell
  $ cd client
  $ docker-compose up 
```

Once you have the react app running in the docker container, you can visit the site at `http:localhost:3000`

## Wordpress CMS

```shell
  $ cd client
  $ docker-compose up 
```

This compose file will launch a couple docker services:
  - Wordpress website: `http://localhost:8080`
  - PHPMyAdmin: `http://localhost:8181`

# Front-End Development 🎨

## CSS / SCSS

Start the node-sass process to work on the CSS. 

To start the process, make sure to open a new shell process on you local machine.
(would be great if we could make docker build and watch the .scss files)

```shell
  $ cd <project root>/client
  $ yarn run watch:sass
```

This will watch all the files in `client/src/styles/scss` and build them into .css files in `client/src/styles/css` when there are changes. 

When it comes to writing styles, please make sure to use SASS variables for the styling of the website. These can be found in `client/src/styles/scss/theme/variables` 

## JS / TypeScript

This project uses TypeScript: 
  - [TypeScript Foundation](https://www.typescriptlang.org/)

For more resources on React / TypeScript please see:
  - [Typescript / React Cheat Sheet](https://github.com/sw-yx/react-typescript-cheatsheet)

# Backend / CMS Development

## Wordpress

In order to leverage the power of the wordpress CMS, it is important to use the administartive tools it provides.

### Login
- Go to `http://localhost:8080/wp-admin`
  - UN: root
  - PW: root

### Add content
  - Click on 'Posts' -> 'Categories'
  - Make a new category by giving it a 
    - Name
    - Slug
    - Parent Category (optional)
    - Description

Practicing this flow of adding content it crucial because this will set the endpoints of our CMS as well as make connections between the data in the DB.

Once there is some content in the CMS, we can call retrieve it from the Wordpress RESTful API. 

We call the API with the following query parameter:
  - http://localhost:8080/?rest_route=/wp/v2/ (meta data)
  - http://localhost:8080/?rest_route=/wp/v2/posts (all posts)
  - http://localhost:8080/?rest_route=/wp/v2/categories (all categories)

For more documentation on the Wordpress V2 API please see:
  - [Wordpress API V2 Docs](https://v2.wp-api.org/)

## MySql / PHPMyAdmin

The CMS is running on top of a MySQL DB. It is being built by the dockerfile directory. 

PHPMyAdmin Easy Access:
  - visit: `http://localhost:8181`

This will pull up the PHPMyAdmin interface on the docker container. Here you can easily interface with the MySQL database in the Docker container.

### Data Export / Backup

To make a dump of the data in the database run the following command from `<project root>/client` on you local machine:

```shell
$ docker exec <container> sh -c "cd /data && wp db export --path=/app --allow-root" 
```

This will generate a `.sql` file in the `<project root>/cms/data` folder. The run.sh file in `<project root>/cms/docker`. 

### Data Import

  - Visit `http://localhost:8181` 
  - Click on 'import'
  - Upload the generated .sql file in `<project root>/cms/data
  - Press the 'Go" button

This should load the sql file into the MySQL databse.

# Docker 🐳

If you make a change to the `Dockerfile` make sure to run `client git:(master) ✗ docker-compose up -d --build` to rebuild the container.

If you want to just start the container use `docker-compose up`
