culture_api-s_server_side
=========================

For the implementation of the project code, the CodeIgniter PHP framework was used as well as Rest APIS that provide data.


The application makes use of the APIs provided by the following four sites:

-Facebook

-Foursquare

-Google+

-Europeana


The data (<optional> town, latitude, longitude, <optional> category)  are imported in json format and each one has different object structure.

We combined each one of them in order to make a final json object for the client-side to use.


The necessairy packages to run the project as a server-side application:

Linux: apt-get install apache2 php5 libapache2-mod-php5 mysql-server libapache2-mod-auth-mysql php5-mysql phpmyadmin php-soap php5-curl php-mail php5-cli

MacOS: MAMP

Windows: WAMP,XAMPP

Netbeans or any other text editor.

CodelIgniter PHP framework. (https://ellislab.com/codeigniter).

We also used the CodeIgniter Rest Server. (https://github.com/chriskacerguis/codeigniter-restserver).

To use the application just clone the project and run it locally or upload it in your own server.

The application was created as part of the EL/LAK codecamp in Octomber 2014, hosted by Harokopio University of Athens, Greece.

Contributors/Developers:
Kostas Drakonakis, Despina Giotopoulou, Leuteris Katiforis, Dimitris Kostopoulos, Dimitris Proios, Giorgos Vasalos
