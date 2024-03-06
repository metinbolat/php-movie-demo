<?php

//Shorten text from movies.overview column
function shorten_overview($overview)
{
    $overview = explode(" ", $overview);
    $overview = array_slice($overview, 0, 25);
    $overview = implode(" ", $overview);

    return $overview;
}
