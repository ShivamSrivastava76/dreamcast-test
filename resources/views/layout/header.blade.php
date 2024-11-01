<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- Set the language based on the application's locale -->
    <head>
        <meta charset="utf-8"> <!-- Character set declaration -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive viewport settings -->

        <title>dreamcasttest</title> <!-- Title of the webpage displayed in the browser tab -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net"> <!-- Optimize connection to font provider -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> <!-- Link to the Figtree font -->

        <!-- Bootstrap CSS Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Bootstrap CSS for styling, with integrity and crossorigin attributes for security -->

        <!-- SweetAlert Library for Alert Dialogs -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Load SweetAlert for custom alert dialogs -->
    </head>