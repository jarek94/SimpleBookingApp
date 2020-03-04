# SimpleBookingApp
Simple hairdressing appointments book app. createad with Symfony.


Aby uruchomić projekt proszę uzyć:

 docker-compose up --build 
 
 
 
 Po poprawnym starcie środowiska dostępne będą porty:
 
 127.0.0.8080 -> phpmyadmin
 127.0.0.8000 -> aplikacja
 
 
 
 
 
 URL (metoda POST):
 127.0.0.1:8000/appointments
 
 przykładowe ciało zapytania:
 
 {
 	"customerEmail":"jan@kowalski.pl,
 	"workplace":"1",
 	"date":"Feb 25 2021 10:30"
 }
