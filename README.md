# Movie-WishHi,

This project is build using HTML, CSS, PHP(and JavaScript only for alert message) and MySQL for database.

"MOVIE-WISH", is a website in which a user can get all information about a movie that is available in this website.This project has two sides (i).Admin side, (ii).User Side. Movies that are uploaded by admins are available to user's view.

Database name is movie_wish. It consist of 8 tables, 8 views, 4 procedure and a trigger associated with movies table.Definitely each table has a primary key and few table has a relationship using foreign key(associated with ON DELETE CASCADE).

Admin side is protected by authentication using BLOWFISH encryption technique.Once admin is logged in they can alter the information about admin and other stuffs.There is a special column called active in some table that is used to specify whether a praticular movie or artist or director information is need to dispaly or not.It is used to hide few things that are need not to be delete.This website uses few google images and you tube trailer link so data is required to run this website properly.

User can just visit the website and a sideshow(carousel) will be displayed that has 3 section recent released movie,high rated according to IMDb and high rated according to Viewers. User can use search bar to search a praticular movie based on its type or hero or heroine or director etc. Further website has arranged movie based on language, Director, Actor/Actress and at the end all movie under one window.Users can rate the individual movie as well as they can rate our website too.

