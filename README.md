# INFO! Dockerized version README to be updated, information below is deprecated
# Install Composer dependencies
 - composer i
 - composer dumpautoload -o
 
# Database configuration 
 - Create Database and insert itemitem.sql
 - Find constants file in /src folder and change ur credentials.
 - It's using Eloquent ORM Capsule for database control

# Selenium WebDriver
- download selenium-server-standalone-3.7.1 and put it testground folder
- Run selenium.bat

# How to start Automation
- Attach script to Bootstrap.php
- Run php ./src/Bootstrap.php
