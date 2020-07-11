<?php

require_once 'Totals.php';

$source = new MySql();

$totals = new Totals($source);

$byDate = $totals->byDate();

$byDownloads = $totals->byDownloads();

$byCountry = $totals->byCountry();
